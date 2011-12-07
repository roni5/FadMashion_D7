<div style="width: 930px; height: 529px;" id="signup">
<div class="box">

<div class="form">
<h1>Member Signup</h1>
<div class="fieldsRequired">all fields required</div>
<?php print render(drupal_get_form('user_register_form'));?>

</div><!-- form-->



<div id="intro" class="pad">
	<div class="text">
   <h2>WELCOME TO FADMASHION</h2>
   <h1><?php print $node->title;?></h1>
   <p><?php $nodeView = node_view($node, 'full'); print render($nodeView['body']); ?></p>

<p class="loginHere">Already a member? <a href="javascript:void(0);" onClick="fmShowLogin();">Login Here</a></p>
</div>
</div><!-- pad-->

<div id="login-form" style="display: none;">
<h1>Welcome Back</h1>
<?php print render(drupal_get_form('user_login_block'));?>
</div>

</div><!-- box-->
</div>


<!-- Confirmation Page -->
<div style="display: none;width: 930px; height: 529px;" id="confirmation">
<div class="box">
test

</div>
</div>


