
    
    <div id="authenticate" class="checkoutPanel">
    <div class="header rounded-top"><div class="pad">
    Member Sign-in
    </div>
    <div class="form">
    <div class="login-form">
    
    <div class="login_col">
     <h3>Existing Customers</h3>
              <div style="width: auto; margin-top: 15px" class="register_button fb-auth">Login With Facebook</div>
        <div class="facebook_connecting" style="display: none;">
<div id="facebook_loader"><img src="<?php print pp()?>loader-red.gif"></div>
<div style="margin-top: 10px;" >Connecting with Facebook</div>
</div>  
     
     <img style="margin: 10px 0" src="<?php print pp();?>divider_or.png">
    <div style="margin-top: 10px;"><?php print render(drupal_get_form('user_login_block'));?></div>
    </div>
    <div style="display: none;" class="forgot_password">
    <h3>Forgot your Password?</h3>
    <?php print render($forgot_password);?>
    </div>    
    
    
    </div>
    <div class="new-form">
    <h3>New to Fadmashion?</h3>
    <div style="margin-top: 20px;"><?php print l('Continue', 'express-checkout', array('query' => array('guest' => 1), 'attributes' => array('class' => array('red', 'button') ) ) );?></div>
    </div>
    </div>
    </div>
    </div>