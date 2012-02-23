<div id="header">
 
   <div class="row2">
          <?php 
              global $user;
              if($user->uid) {
   	             print $output = l('View Live Deal', 'deals', array('attributes' => array('class' => array('button', 'red') ) ));
              }
              else {
   	      ?>
   	      
              	<a class="button red" href="javascript:void(0);" onClick="fmForceRegister();fmClearRegisterTimeout();">Sign up for Membership</a>
                <a href="javascript:void(0);" class="login" onClick="jQuery('.state1').hide();jQuery('.state3').show();fmForceRegister();fmClearRegisterTimeout();">Login</a>
          <?php 
   	          }
          ?>
   
       <a class="logo" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" >
         <img  src="<?php print pp();?>logo_fadmashion.png?v2" alt="<?php print t('fadmashion'); ?>" />
      </a>
    </div>
 </div>