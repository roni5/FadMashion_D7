
<h1>Sorry, Not Yet.</h1>
<p>Fadmashion is only opening its doors to a select few to ensure we offer the best quality and customer services for our members.  Jump the line by inviting some friends.  Below is a code you can share that will give them and you instant access once they sign up.</p>

<table cellspacing="0" cellpadding="0" class="rounded-top" id="inviteCode">
<tbody><tr>
<th>Your Invite Code:</th>
<td><input onClick="this.select()" type="text" id="" name="" value="<?php print $invite_url;?>" class="form-text required urlCode"></td>
<td><a class="btnFacebook" href="javascript:void(0);" onClick="javascript:fm_invite_facebookshare( '<?php print fm_invite_get_invite_url();?>', '<?php print $social_info['image_path']; ?>');">Facebook</a></td>
<td><a class="btnTwitter" target="_blank" href="http://twitter.com/intent/tweet?text=<?php print fm_invite_twitter_text()?>">Twitter</a></td>
</tr></tbody></table>

<div class="sendFields rounded-bottom">
<p>Share your code with your friends</p>
<?php print render($invite_form); ?>
<script>clearAllForms();fmValidateInviteForm();</script>

</div>
