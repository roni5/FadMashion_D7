
<h1>You're In!</h1>
<p style="width: 460px; margin: 0 auto;">As a member, we have provided you with a <b>private invite code</b></b> that gives <b>insider access</b> on Fadmashion.com to your friends, family and biggest fans.  </p>

<table cellspacing="0" cellpadding="0" class="rounded-top" id="inviteCode">
<tbody><tr>
<th>Your Invite Code:</th>
<td><input onClick="this.select()" type="text" id="" name="" value="<?php print $invite_url;?>" class="form-text required urlCode"></td>
<td><a class="btnFacebook" href="javascript:void(0);" onClick="javascript:fm_invite_facebookshare( '<?php print fm_invite_get_invite_url();?>', '<?php print $social_info['image_path']; ?>');">Facebook</a></td>
<td><a class="btnTwitter" target="_blank" href="http://twitter.com/intent/tweet?text=<?php print fm_invite_twitter_text()?>">Twitter</a></td>
</tr></tbody></table>

<div class="sendFields rounded-bottom">

<div class="invite_state2"><?php print theme('fm_invite_ajax_sending_email'); ?></div>
<div class="invite_state3"><p>Invitations Sent!</p><?php print l('Start Shopping', 'var/confirmation'); ?></div>
<div class="invite_state1">
<p>Send Directly to Friend's Inbox.</p>
<?php print render($invite_form); ?>
<script>clearAllForms();fmValidateInviteForm();</script>
</div>
</div>

<div class="skip-link"><?php print l('Skip invites and continue', 'var/confirmation', array('attributes' => array('class' => array('skipInvites')) ) ); ?></div>
