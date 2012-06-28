<div id="fm_user_edit_form">
<div class="column1">
<?php print $form_processing;?>
<div class="checkoutPanel" id="profile_information">
  <div class="header rounded-top">
    <div class="pad">
                  About You
    </div>
  </div>
  <div id="profile_info">
    <div class="form">
      <div id="avatar"><?php echo $picture; ?>
      <?php echo $picture_current; ?></div>
      <div id="upload">
      <?php echo $picture_delete; ?>
       <?php echo $picture_upload; ?></div>
      
      <?php echo $first_name; ?>
      <?php echo $last_name; ?>
    </div>
  </div>
</div>
<div class="checkoutPanel" id="account_information">
  <div class="header rounded-top">
    <div class="pad">
       Account Information
    </div>
  </div>
  <div id="profile_info">
    <div class="form">
      <?php echo $current_pass; ?>
      <?php echo $pass; ?>
       <?php echo $mail; ?>
    </div>
  </div>
</div>
<br clear="all">
  <div style="float: right; ">
  <?php echo $actions; ?>
  </div>
 </div>

<div class="column2">
<div class="checkoutPanel" id="quicklinks_information">
  <div class="header rounded-top">
    <div class="pad">
       Quick Links
    </div>
  </div>
  <div id="quicklinks_info">
    <div class="form">
      <div><?php print l('Order History');?></div>
      <div><?php print l('Shipping & Returns');?></div>
      <div><?php print l('Recommend to Friends');?></div>
      <div><?php print l('Contact us');?></div>
      <div><?php print l('Logout');?></div>
    </div>
  </div>
</div>
<?php print theme('fm_social_favorite_most_loved'); ?>
</div>

</div>