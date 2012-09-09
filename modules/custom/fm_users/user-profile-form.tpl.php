

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
       <?php echo $roles; ?>
       <?php echo $therest; ?>
    </div>
  </div>
</div>
<br clear="all">
  <div style="float: right; ">
  <?php echo $actions; ?>
  </div>

