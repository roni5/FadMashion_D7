<div style="width: 930px; height: 529px;" id="signup">
<div class="state1">
<div class="box">

<div class="form">
<h1>Member Signup</h1>

<div class="fieldsRequired">all fields required</div>
<?php print render($register_form);?>

</div><!-- form-->



<div id="intro" class="pad">
	<div class="text">
   <h2>WELCOME TO FADMASHION</h2>
   <h1><?php print $node->title;?></h1>
   <p><?php $nodeView = node_view($node, 'full'); print render($nodeView['body']); ?></p>

<p class="loginHere">Already a member? <a href="javascript:void(0);" onClick="fmShowLogin();">Log In Here</a></p>
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

<div class="login">
<h2>MEMBER LOGIN</h2>
<h1>Welcome Back!</h1>
<div class="loginErrorText">Wrong Username or Password</div>
<?php print render($login_form);?>
</div>           
<div style="display: none;" class="forgot_password">
<h2>MEMBER LOGIN</h2>
<h1>Forgot your Password?</h1>
<div class="pass-form">
<div class="loginErrorText">E-mail Address not Found</div>
<?php print render($forgot_password_form);?>
</div>
<div style="display:none; width: 80%;margin: auto;" class="pass-text">
<div>An E-mail has been sent to your Inbox.  Check it now to get your new password</div>
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
<div class="backSignup"><?php l('Start Shopping', ''); ?></div>   
     
</div><!-- pad-->
</div><!-- box-->
</div>


</div><!-- #signup -->



