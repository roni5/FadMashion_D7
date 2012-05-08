<div id="footer_credits_promo">
<div class="credits">
<h1>You have<span><?php print $credits?></span></h1>
<div style="font-size: 11px; color: rgb(255, 255, 255); margin-top: -6px;"> worth of credits</div>


</div>
<div class="invite_friends">
  <div class="text">1 Friend's Purchase = $10 worth of credits
  <?php $url = '/?inline=true#block-fm-users-fm-users-invite&blankBox=1';
  print '<div><a onClick="fmUserStateRestart(); fmInviteReset(); jQuery(\'.state2\').show();fmClearRegisterTimeout();" class="colorbox-inline invite" href="' . $url . '">' . t('Recommend to Friends') . '</a></div>'; 
  ?></div> 
  <div class="signup_count">
    <div><label>Signup Count: </label><span>0</span></div>
    <div><label>Quick Share: </label></div>
  </div>
</div>
<div class="limited_offer">
  <div class="promo_text">Special Offer<div class="limited_time">Available only for aLimited Time*</div></div>
  <div class="text">Get 5% back on every purchase
  <div><a href="javascript: void(0)">Learn More</a></div>
  </div>



</div>