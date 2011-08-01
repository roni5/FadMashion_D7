<div id="header">
 <div class="notMember">
   <?php 
   global $user;
   if($user->uid) {
   	  $output = l('Continue Shopping', 'deals', array('attributes' => array('class' => array('button') ) ));
   }
   else {
   	  $output = 'Not a member yet?';
   	  $output .= l('Sign Up', 'intro/sign-up/email', array('attributes' => array('class' => array('button', 'red') ) ));
   }
   print $output;
   ?>
   
 </div>
 
   <div class="row2">
       <a class="logo" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" >
         <img src="<?php print drupal_get_path("theme","fadmashion_commerce");?>/images/logo_fadmashion.png" alt="<?php print t('fadmashion'); ?>" />
      </a>
    </div>
 </div>