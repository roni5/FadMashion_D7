
    
    <div id="authenticate" class="checkoutPanel">
    <div class="header rounded-top"><div class="pad">
    Member Sign-in
    </div>
    <div class="form">
    <div class="login-form">
     <h3>Existing Customers</h3>
    <div style="margin-top: 10px;"><?php print render(drupal_get_form('user_login_block'));?></div>
    </div>
    <div class="new-form">
    <h3>New to Fadmashion?</h3>
    <div style="margin-top: 20px;"><?php print l('Continue', 'express-checkout', array('query' => array('guest' => 1), 'attributes' => array('class' => array('red', 'button') ) ) );?></div>
    </div>
    </div>
    </div>
    </div>