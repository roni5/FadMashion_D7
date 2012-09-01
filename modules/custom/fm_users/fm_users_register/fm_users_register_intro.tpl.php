<div style="width: 930px; height: 529px;" id="signup">
<div class="state1">
<div class="box">

<div class="form">
<h1>Become a Member</h1>

<div class="fieldsRequired">all fields required</div>
<?php print render($register_form);?>

</div><!-- form-->



<div id="intro" class="pad">
	<div class="text">
   <?php //<h1>print $node->title;</h1>?>
   <p><?php $nodeView = node_view($node, 'full'); print render($nodeView['body']); ?></p>

<p class="loginHere rounded-top rounded-bottom">Already a member? <a href="javascript:void(0);" onClick="fmShowLogin();">Log In Here</a></p>
</div>



</div><!-- pad-->

</div><!-- box-->
</div><!-- state1 -->



<!-- Confirmation Page -->
<div style="display: none;"  class="state2">
<div class="box">

<div class="generatingCode">
<p>Requesting Membership...</p>
<img src="<?php print pp();?>confirm-ajax-loader.gif">

</div>       
     
</div><!-- box-->
</div>

<!-- Login Page -->
<div style="display: none;"  class="state3">
<div class="box"><div class="pad">


<div class="login" style="display: none;">
<h2>MEMBER LOGIN</h2>
<h1>Welcome Back!</h1>
<div id="fb-auth">Login With Facebook</div>
<br>
OR
<br>
<div class="loginErrorText">Wrong Username or Password</div>
<?php print render($login_form);?>
</div>  
        
        <div class="facebook_connecting" style="display: none;">
<h2>MEMBER LOGIN</h2>
<h1>Welcome Back!</h1>
<div id="facebook_loader"><img src="<?php print pp()?>loader-red.gif"></div>
<div style="margin-top: 10px;" >Connecting with Facebook</div>
</div>  
         
<div style="display: none;" class="forgot_password">
<h2>MEMBER LOGIN</h2>
<h1>Forgot your Password?</h1>
<div class="pass-form">
<div class="loginErrorText">E-mail Address not Found</div>
<?php print render($forgot_password_form);?>
</div>
<div style="display:none; width: 80%;margin: auto;" class="pass-text">
<div>An email with your new password has been sent to your inbox. </div>
</div>
</div>

      
<div class="backSignup">Not a Member? <a  href="javascript:void(0);" onClick="fmShowSignup();">Sign Up</a></div>   
     
</div><!-- pad-->
</div><!-- box-->
</div>


</div><!-- #signup -->

<!-- Invitations sent -->
<div style="display: none;"  class="state4">
<div class="box"><div class="pad">

<div class="emailsConfirmation">
<h1>Your Invitations have been Sent!</h1>
<div class="backSignup"><?php print l('Start Shopping', 'var/confirmation'); ?></div>   
     
</div><!-- pad-->
</div><!-- box-->
</div>


</div><!-- #signup -->



