
<h1>You're In!</h1>
<p>Lorem ipsum dolor n for a unique shopping experience th dolor n for a unique shopp dolor n for a unique shoppat opens your world to the best independent designers 
</p>

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

<?php print l('Skip invites and continue', 'new-user/confirmation', array('attributes' => array('class' => array('skipInvites')) ) ); ?>
