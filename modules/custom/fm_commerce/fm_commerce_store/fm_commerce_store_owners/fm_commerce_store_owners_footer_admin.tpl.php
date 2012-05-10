<?php 
$logo = field_view_field('fm_commerce_store', $store, 'field_logo', 'node_full');
$logo = render($logo);

?>

<div id="footer_store_owners">

<div class="quick_links">

<div class="col">
<?php print $logo?>
<div class="col">
<div><?php print l('Visit Store');?></div>
<div><?php print l('Store Settings', 'user/logout');?></div>
</div>

<div class="col">
<div><?php print l('Customer Orders', '');?></div>
<div><?php print l('Ask Us', '');?></div>
</div>
</div>

</div>



<div class="designer_promotions">
<div class="text">Drive Traffic, Increase Sales
  <?php $url = '/?inline=true#block-fm-users-fm-users-invite&blankBox=1';
  print '<div><a onClick="fmUserStateRestart(); fmInviteReset(); jQuery(\'.state2\').show();fmClearRegisterTimeout();" class="colorbox-inline invite" href="' . $url . '">' . t('Promote My Shop') . '</a></div>'; 
  ?></div> 
  <div class="designer_stats">
    <div class="store_loves">Loves: <span>15</span> </div>
    <div class="store_pageviews">Pageviews: <span>534</span> </div>
  </div>
</div>

