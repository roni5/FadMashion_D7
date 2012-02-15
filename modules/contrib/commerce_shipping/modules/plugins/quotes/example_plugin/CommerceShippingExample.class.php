<?php

class CommerceShippingExample extends CommerceShippingQuote {
  public function settings_form(&$form, $rules_settings) {
    $form['shipping_price'] = array(
      '#type' => 'textfield',
      '#title' => t('Shipping price'),
      '#description' => t('Configure what the shipping price per order should be.'),
      '#default_value' => is_array($rules_settings) && isset($rules_settings['shipping_price']) ? $rules_settings['shipping_price'] : 42,
      '#element_validate' => array('rules_ui_element_decimal_validate'),
    );
  }

  // Form adding when selecting the quote.
  public function submit_form($pane_values, $checkout_pane, $order = NULL) {
    if (empty($order)) {
      $order = $this->order;
    }
    $form = parent::submit_form($pane_values, $checkout_pane, $order);

    // Merge in values from the order.
    if (!empty($order->data['commerce_shipping_example'])) {
      $pane_values += $order->data['commerce_shipping_example'];
    }

    // Merge in default values.
    $pane_values += array(
      'express' => 0,
      'name' => '',
    );

    $form['express'] = array(
      '#type' => 'checkbox',
      '#title' => t('Express delivery'),
      '#description' => t('Express delivery cost twice the normal amount.'),
      '#default_value' => $pane_values['express'],
    );

    $form['name'] = array(
      '#type' => 'textfield',
      '#title' => t('Name'),
      '#description' => t('This is a demonstration field coded to fail validation for single character values.'),
      '#default_value' => $pane_values['name'],
      '#required' => TRUE,
    );

    return $form;
  }

  public function submit_form_validate($pane_form, $pane_values, $form_parents = array(), $order = NULL) {
    // Throw an error if a long enough name was not provided.
    if (strlen($pane_values['name']) < 2) {
      form_set_error(implode('][', array_merge($form_parents, array('name'))), t('You must enter a name two or more characters long.'));

      // Even though the form error is enough to stop the submission of the form,
      // it's not enough to stop it from a Commerce standpoint because of the
      // combined validation / submission going on per-pane in the checkout form.
      return FALSE;
    }
  }

  public function calculate_quote($currency_code, $form_values = array(), $order = NULL) {
    if (empty($order)) {
      $order = $this->order;
    }
    $settings = $this->settings;
    // For this simple method, the price is always 42.
    $shipping_line_items = array();
    $amount = isset($settings['shipping_price']) ? $settings['shipping_price'] : 42;
    $shipping_line_items[] = array(
      'amount' => commerce_currency_decimal_to_amount($amount, $currency_code),
      'currency_code' => $currency_code,
      'label' => t('Normal shipping'),
    );
    if (isset($form_values['express']) && $form_values['express']) {
      $amount = isset($settings['shipping_price']) ? $settings['shipping_price'] : 42;
      $shipping_line_items[] = array(
        'amount' => commerce_currency_decimal_to_amount($amount, $currency_code),
        'currency_code' => $currency_code,
        'label' => t('Express fee'),
      );
    }
    return $shipping_line_items;
  }
}