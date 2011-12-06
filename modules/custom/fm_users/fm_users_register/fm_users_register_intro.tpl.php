<div style="width: 930px; height: 529px;" id="signup">
<div class="box">

<div class="form">
<h1>Member Signup</h1>
<div class="fieldsRequired">all fields required</div>
<?php print render(drupal_get_form('user_register_form'));?>

</div><!-- form-->



<div class="pad">
	<div class="text">
                <h2>WELCOME TO FADMASHION</h2>
                <h1><?php print $node->title;?></h1>
                <p><?php $nodeView = node_view($node, 'full'); 
                 print render($nodeView['body']); ?></p>

<p class="loginHere">Already a member? <a href="#">Login Here</a></p>
            </div>    
            
     
</div><!-- box-->
</div><!-- form-->
</div>