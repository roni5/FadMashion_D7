<div id="footer_credits_promo">

<div class="quick_links">

<div class="col">
<?php global $user; print $picture = theme('user_picture', array('account' => $user)) ;?></div>
<div class="col">
<div>Welcome, <?php print fm_users_firstname();?>!</div>
<div><?php print l('(Logout)', 'user/logout');?></div>
</div>

<div class="col">
<div><?php print l('Order Status', 'user/orders');?></div>
<div><?php print l('Settings', 'user/' . $user->uid . '/edit');?></div>
</div>
</div>


<div class="credits">
<h1>You have<span><?php print $credits?></span></h1>
<div style="font-size: 11px; color: rgb(255, 255, 255); margin-top: -6px;"> worth of credits</div>
</div>

<div class="invite_friends">
  <div class="text">1 Friend's Purchase = $10 worth of credits
  <div><?php print l('Recommend to Friends', 'user/share-with-friends'); ?></div>
  </div> 
  
<?php /* <div class="signup_count">
    <div><label>Signup Count: </label><span>0</span></div>
    <div><label>Quick Share: </label></div>
  </div> */?>
  
</div>
<div class="limited_offer">
  <div class="promo_text">Special Offer<div class="limited_time">Available only for aLimited Time*</div></div>
  <div class="text">Get 5% back on every purchase
  <div><a href="javascript: void(0)">Learn More</a></div>
  </div>

</div>

</div>