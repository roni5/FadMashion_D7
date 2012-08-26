<div id="invite_block">
<div class="box">

<h1>Share with Friends, Get Rewarded</h1>
<div id="explanation">
<div id="col1">
   <h2>Friends with Benefits</h2>
  <p>Invite 10 friends to join, and we will give you $30 worth of free credits for any purchases in our boutique.  As more of your friends join, we will give you more credits as a thank you for helping us grow.</p>
  
<div id="col2">
<h2>Invite More Earn More</h2>
  <div class="progressWrapper">
  <div class="count"><?php $count = 37; print $count; $percent = ($count/50) * 100;?></div>
  <div class="progressBarOuter">
    <div class="progressBarInner" <?php print 'style="width:' . $percent . '%"'?>>
    </div>
  </div>
  <div class="labels">
        	<div class="step1">New York Local</div>
        	<div class="step2">Fashion Insider</div>
        	<div class="step3">Front Row Seats</div>
        </div>
  </div>
  <br>
  <br>
        
  <div class="column">
  <h3>New York Local</h3>
  <p>10 friends have joined. $30 credit.</p>
  <h3>Fashion Insider</h3>
    <p>25 friends have joined. $30 more credit.</p>

  </div>
  <div class="column">
      <h3>Front Row Seats</h3>
  <p>50 friends have joined. $50 more credit.</p>
  </div>
 </div>

</div>
</div>
<div id="email">
<h2>eMail</h2>
<h3>Invite friends & family by sending them an invitation to their Inbox</h3>
<?php print render($invite_form); ?>
<script>fmValidateInviteForm();</script>
</div>

<div id="share_link">
<h2>Invite Using Your Personal Invite Link</h2>
<h3>Copy & Paste the link in an E-mail, IM Message, Facebook or Twitter to invite your friends</h3>
<div style="margin-top: 10px;">
<input onClick="this.select()" type="text" id="" name="" value="<?php print $invite_url;?>" class="form-text required urlCode">
<a class="btnFacebook" href="javascript:void(0);" onClick="javascript:fm_invite_facebookshare( '<?php print fm_invite_get_invite_url();?>', '<?php print $social_info['image_path']; ?>');">Facebook</a>
<a class="btnTwitter" target="_blank" href="http://twitter.com/intent/tweet?text=<?php print fm_invite_twitter_text()?>">Twitter</a>
</div>
</div>



</div> <!-- box -->
</div> <!-- signup -->