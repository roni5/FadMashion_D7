<?php

/**
 * @file
 * Sample template for HTML Mail test messages.
 */
?>
<table cellspacing="0" cellpadding="0" class="main" style="margin-left: 50px; width: 500px; background: #fff;"><tbody><tr><td style="padding; 10px; background: #fff; border-top: 5px solid #bdb6af; border-bottom: 5px solid #bdb6af; text-align:left;">


<div class="logo" style="padding: 0 0 12px 0; margin-top: 25px;"><a href="http://www.fadmashion.com" style='font-size: 20px; font-family: Georgia, "Times New Roman", Times, serif; font-style:italic;'><img style=" border: 0px solid #000;" title="fadmashion" src="<?php print $theme_url?>/logo_black.jpg"></a></div>


<p style="font-size:13px;margin-bottom:7px;">
We have received your request to shop up to 60% off the best independent designers worldwide and will be in touch with you following our launch.  To be one of the first members inside, take a moment to learn about FadMashion Social Shopping Rewards.</p>	

<h1 style="font-size: 16px; margin: 20px 0 6px 0;">Your <span style="margin-left: 3px; color: #7b6858; font-size: 16px;">Social Shopping Rewards</span> Link</h1> 
<p style="margin-bottom: 7px; font-size: 13px;">The link below is your very own, and it will <b>earn you Social Shopping Rewards</b> - share your link with friends and earn priority access to new discounts, exclusive parties and much more.  Keep your link safe, and share it often. </p> 	
<p style="margin-bottom: 7px; font-size: 13px;">Your first reward opportunity lets you jump the line. Share the link below with <b>5 friends</b> who sign up and you'll be among the first to step inside.</p>
	
<div class="url" style="padding: 13px; margin: 25px 0; background: #000; color: #fff;">
<p style="margin-bottom:7px;margin-top: 0px; font-size:12px;">Copy and paste this URL in Twitter, Facebook, or in an Email to invite friends.</p>
<input type="text" style="padding: 4px 0pt 0pt 4px; width: 300px; margin-right: 10px;" value="<?php print $body; ?>" name="">	
	</div>

<?php 
$image = '<img src=/"' . drupal_get_path("theme","fadmashion_commerce") . '/images/icon_email_brown.png"><br>Email';
print l($image, 'colorbox/form/fm_invite_send_email_form', array('query' => 'id=' . $_GET['id'], 'html' => true, 'attributes' => array('class' => 'colorbox-load', 'title' => 'Send an e-mail to your friend') )  ); 
?>

</td></tr></tbody></table>