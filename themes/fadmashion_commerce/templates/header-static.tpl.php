<div id="header">
 
   <div class="row2">
          <?php 
              global $user;
              if($user->uid) {
   	             $output = l('View Live Deal', 'deals', array('attributes' => array('class' => array('button', 'red') ) ));
              }
              else {
   	             
   	             $output .= l('Create my free account', 'intro/sign-up/email', array('attributes' => array('class' => array('button', 'red') ) ));
   	             $output .= l('Login', '', array('attributes' => array('class' => 'login') ));
               }
              print $output;
          ?>
   
       <a class="logo" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" >
         <img src="<?php print drupal_get_path("theme","fadmashion_commerce");?>/images/logo_fadmashion.png" alt="<?php print t('fadmashion'); ?>" />
      </a>
    </div>
 </div>