<div style="width: 930px; height: 529px;" id="signup">
<div class="state2">
<div class="box">

<div class="old_signup">
<h1>Invite Friends</h1>
<p style="width: 460px; margin: 0 auto; font-weight: 500">We have provided you with a private invite code that gives insider access for your <b>friends, family and biggest fans</b>.  </p>
</div>

<div class="new_signup" style="display:none;">
<h1>Welcome to Fadmashion!</h1>
<p style="width: 480px; margin: -15px auto 0; font-weight: 500"> Below is your personal invite code that you can <b>share on Facebook, Twitter or send directly to your friend's inbox</b>.  We keep track of each friend who signs up and will be offering loyalty benefits for fashion show VIP tix, parties, exclusive discounts and much more.</p>

</div>


<table cellspacing="0" cellpadding="0" class="rounded-top" id="inviteCode">
<tbody><tr>
<th>Your Invite Code:</th>
<td><input onClick="this.select()" type="text" id="" name="" value="<?php print $invite_url;?>" class="form-text required urlCode"></td>
<td><a class="btnFacebook" href="javascript:void(0);" onClick="javascript:fm_invite_facebookshare( '<?php print fm_invite_get_invite_url();?>', '<?php print $social_info['image_path']; ?>');">Facebook</a></td>
<td><a class="btnTwitter" target="_blank" href="http://twitter.com/intent/tweet?text=<?php print fm_invite_twitter_text()?>">Twitter</a></td>
</tr></tbody></table>

<div class="sendFields rounded-bottom">
<div class="invite_state2"><?php print theme('fm_invite_ajax_sending_email'); ?></div>
<div class="invite_state3"><p>Invitations Sent!</p><a href="javascript:void(0);" onClick="jQuery.colorbox.close(); ">Close</a></div>
<div class="invite_state1">
<p>Send Directly to Friend's Inbox.</p>
<?php print render($invite_form); ?>
<script>fmValidateInviteForm();</script>
</div>

</div>

<fb:like style="margin-top: 10px;" href="http://www.facebook.com/pages/FadMashion/8251371790" send="true" width="300" show_faces="false"></fb:like>

</div> <!-- box -->
</div> <!-- state2 -->
</div> <!-- signup -->