
<div class="share">

	<div class="social">
  <a class="socialIcon" href="javascript:void(0);" onClick="javascript:fm_invite_facebookshare();"><img src="/<?php print drupal_get_path("theme","fadmashion_commerce");?>/images/icon_facebook_white.jpg"></a>
  <a class="socialIcon" href="target="_blank" href="http://twitter.com/home?status=@Fadmashion offering hourly deals on independent fashion.  Sign up and we both get priority access <?php print $url;?>"><img src="/<?php print drupal_get_path("theme","fadmashion_commerce");?>/images/icon_twitter_white.jpg"></a>
  <?php 
    $image = '<img src="/' . drupal_get_path("theme","fadmashion_commerce") . '/images/icon_mail_white.jpg"><br>Email';
    print l($image, 'colorbox/form/fm_invite_send_email_form', array( 'html' => true, 'query' => array('id' => $_GET['id']), 'attributes' => array('class' => 'colorbox-load socialIcon', 'title' => 'Spread the love') )  ); 
   ?>
   </div>

    <div class="rewards_link"><input type="text" readonly="readonly" name="share_url" style="width: 250px; border: 1px solid rgb(197, 189, 182); color: rgb(114, 101, 92); float: left; margin: 0pt; padding: 2px 0pt 0pt 2px; height: 22px;" autocomplete="off" class="form-text-readonly" onclick="this.select()" id="share_url" value="http://exp.fadmashion.com/invite/U3E8dyHk">
    <input type="submit" style="float: left; position: relative; left: -5px;" class="form-submit" value="Copy" name="op" id="edit-submit"></div>
</div>

<br clear="all">
<div class="signupBox" id="signup5">
<h1>5</h1>
<h2>SIGN-UPS</h2>
<p>Priority Access and Free shipping for first purchase</p>
<p class="value">A $10 value</p>
</div>

<div class="signupBox" id="signup15">
<h1>15</h1>
<h2>SIGN-UPS</h2>
<p>Priority Access and Free shipping for first 10 purchases</p>
<p class="value">A $100 value</p>
</div>

<div class="signupBox" id="signup25">
<h1>25</h1>
<h2>SIGN-UPS</h2>
<p>Priority Access and Free shipping for first 20 purchases</p>
<p class="value">A $200 value</p>
</div>


</div>