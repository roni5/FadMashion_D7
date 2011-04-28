<?php
/**
 * @file
 * Formats and sends mail using the MailMIME class.
 *
 * @see http://drupal.org/node/900794
 * @see http://api.drupal.org/api/drupal/includes--mail.inc/interface/MailSystemInterface/7
 * @see http://drupal.org/project/mailmime
 */

/**
 * Implements MailSystemInterface.
 */
class HTMLMailSystem implements MailSystemInterface {
  /**
   * Format emails according to module settings.
   *
   * Parses the message headers and body into a MailMIME object.  If another module
   * subsequently modifies the body, then format() should be called again before
   * sending.  This is safe because the $message['body'] is not modified.
   *
   * @param $message
   *   An associative array with at least the following parts:
   *   - headers: An array of (name => value) email headers.
   *   - body: The text/plain or text/html message part.
   *
   * @return
   *   The formatted $message, ready for sending.
   */
  public function format(array $message) {
    $eol = variable_get('mail_line_endings', MAIL_LINE_ENDINGS);
    // Collapse the message body array.
    if (module_exists('mailmime')) {
      $body = $this->formatMailMIME($message);
      $plain = $message['MailMIME']->getTXTBody();
    }
    else {
      if (is_array($message['body'])) {
        $message['body'] = implode("$eol$eol", $message['body']);
      }
      $body = theme('htmlmail', $message);
      // @todo Change to drupal_html_to_text when issue #299138 gets resolved.
      $plain = mailsystem_html_to_text($body);
    }
    // Check to see whether recipient allows non-plaintext.
    if (htmlmail_is_allowed($message['to'])) {
      // Optionally apply the selected web theme.
      if (module_exists('echo') && $theme = htmlmail_get_selected_theme($message)) {
        $body = echo_themed_page($message['subject'], $body, $theme);
      }
      // Optionally apply the selected output filter.
      if ($filter = variable_get('htmlmail_postfilter')) {
        $body = check_markup($body, $filter);
      }
      // Store the fully-themed HTML body.
      if (isset($message['MailMIME'])) {
        $mime = &$message['MailMIME'];
        $message['MailMIME']->setHTMLBody($body);
        list($message['headers'], $message['body']) = $mime->toEmail($message['headers']);
      }
      else {
        $message['headers']['Content-Type'] = 'text/html; charset=utf-8';
        $message['body'] = $body;
      }
    }
    else {
      if (isset($message['MailMIME'])) {
        $mime = &$message['MailMIME'];
        $mime->setHTMLBody('');
        $mime->setContentType('text/plain', array('charset' => 'utf-8'));
        list($message['headers'], $message['body']) = $mime->toEmail($message['headers']);
      }
      else {
        $message['body'] = $plain;
        $message['headers']['Content-Type'] = 'text/plain; charset=utf-8';
      }
    }
    return $message;
  }

  /**
   * Use the MailMime class to format the message body.
   *
   * @see http://drupal.org/project/mailmime
   */
  public function formatMailMIME(array &$message) {
    $message['body'] = MailMIME::concat($message['body']);
    // Build a full email message string.
    $email = MailMIME::encodeEmail($message['headers'], $message['body']);
    // Parse it into MIME parts.
    if (!($mime = MailMIME::parse($email))) {
      watchdog(
        'HTMLMailSystem',
        'Could not parse email message.',
        array(),
        WATCHDOG_ERROR
      );
      return $message;
    }
    // Work on a copy so that the original $message['body'] remains unchanged.
    $email = $message;
    if ( !($email['body'] = $mime->getHTMLBody())
      && !($email['body'] = $mime->getTXTBody())
    ) {
      $email['body'] = '';
    }
    // Theme with htmlmail.tpl.php.
    $body = theme('htmlmail', $email);
    $mime->setHTMLBody($body);
    // @todo Change to drupal_html_to_text when issue #299138 gets resolved.
    $mime->setTXTBody(mailsystem_html_to_text($body));
    $message['MailMIME'] = &$mime;
    return $body;
  }

  /**
   * Send an email message.
   *
   * @param $message
   *   An associative array containing at least:
   *   - headers: An associative array of (name => value) email headers.
   *   - body: The text/plain or text/html message body.
   *   - MailMIME: The message, parsed into a MailMIME object.
   */
  public function mail(array $message) {
    $eol = variable_get('mail_line_endings', MAIL_LINE_ENDINGS);
    // Ensure that subject is non-null.
    $message += array('subject' => t('(No subject)'));
    // Check for empty recipient.
    if (empty($message['to'])) {
      if (empty($message['headers']['To'])) {
        watchdog(
          'HTMLMailSystem',
          'Cannot send email about %subject without a recipient.',
          array('subject' => $message['subject']),
          WATCHDOG_ERROR
        );
        return FALSE;
      }
      $message['to'] = $message['headers']['To'];
    }
    if (class_exists('MailMIME')) {
      $mime = new MailMIME();
      $to = $mime->encodeHeader('to', $message['to']);
      $subject = $mime->encodeHeader('subject', $message['subject']);
      $headers = $mime->txtHeaders($message['headers']);
    }
    else {
      $to = mime_header_encode($message['to']);
      $subject = mime_header_encode($message['subject']);
      $headers = $this->txtHeaders($message['headers']);
    }
    $body = preg_replace('#(\r\n|\r|\n)#s', $eol, $message['body']);
    // Check for empty body.
    if (empty($body)) {
      watchdog(
        'HTMLMailSystem',
        'Refusing to send a blank email to %recipient about %subject.',
        array('%recipient' => $message['to'], '%subject' => $message['subject']),
        WATCHDOG_WARNING
      );
      return FALSE;
    }
    $extra = (
      isset($headers['Return-Path'])
      && !ini_get('safe_mode')
      && !strpos(ini_get('sendmail_path'), ' -f')
    ) ? '-f ' . $headers['Return-Path']
      : '';
    return mail($to, $subject, $body, $headers, $extra);
  }

  /**
   * Converts an array of email headers to a text string.
   *
   * @param $headers
   *   An associative array of ('HeaderName' => 'header value') pairs.
   *
   * @return
   *   The concatenated headers as a single string.
   */
  public function txtHeaders(array $headers) {
    $output = array();
    foreach ($headers as $name => $value) {
      if (is_array($value)) {
        foreach ($value as $val) {
          $output[] = "$name: $val";
        }
      }
      else {
        $output[] = "$name: $value";
      }
    }
    return implode("\n", $output);
  }
}
