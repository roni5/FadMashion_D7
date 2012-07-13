<div id="invite_block">
<div class="box">

<h1>Share with Friends, Get Rewarded</h1>
<div id="explanation">
<div id="col1">
  <h2>Friends with Benefits</h2>
  <p>Invite 10 friends to join, and we will give you $10 worth of free credits for any purchases in our boutique.  As more of your friends join, we will give you more credits as a thank you for helping us grow.</p>
</div>
<div id="col2">
  <p>Some Graphic</p>
</div>
</div>
<div id="email">
<h2>eMail</h2>
<h3>Invite friends & family by sending them an invitation to their Inbox</h3>
<?php print render($invite_form); ?>
<script>fmValidateInviteForm();</script>
</div>

<div id="share_link">
<h2>Share Using Your Personal Invite Link</h2>
<h3>Copy & Paste the link in an E-mail, IM Message, Facebook or Twitter to invite your friends</h3>
<div style="margin-top: 10px;">
<input onClick="this.select()" type="text" id="" name="" value="<?php print $invite_url;?>" class="form-text required urlCode">
<a class="btnFacebook" href="javascript:void(0);" onClick="javascript:fm_invite_facebookshare( '<?php print fm_invite_get_invite_url();?>', '<?php print $social_info['image_path']; ?>');">Facebook</a>
<a class="btnTwitter" target="_blank" href="http://twitter.com/intent/tweet?text=<?php print fm_invite_twitter_text()?>">Twitter</a>
</div>
</div>



</div> <!-- box -->
</div> <!-- signup -->