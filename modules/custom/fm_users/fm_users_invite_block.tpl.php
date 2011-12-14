<div style="width: 930px; height: 529px;" id="signup">
<div class="state2">
<div class="box">


<h1>Invite Friends</h1>
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
<div class="invite_state3"><p>Invitations Sent!</p><a href="javascript:void(0);" onClick="jQuery.colorbox.close(); ">Close</a></div>
<div class="invite_state1">
<p>Share your code with your friends</p>
<?php print render($invite_form); ?>
<script>fmValidateInviteForm();</script>
</div>

</div>

</div> <!-- box -->
</div> <!-- state2 -->
</div> <!-- signup -->