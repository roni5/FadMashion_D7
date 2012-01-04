<?php
// $Id: page.tpl.php,v 1.9 2010/11/07 21:48:56 dries Exp $

/**
 * @file
 * FadMashion Commerce Splash page implementation.
 */

global $user;
$mail = fm_users_register_session_email();
if(!user_access('view splash page') || (isset($mail) && !empty($mail)) ) {
	drupal_goto('deals');
}

?>

<script type="text/javascript">  
			

jQuery(function($){
	$.supersized({
		start_slide				:	0,
		vertical_center   : 0,
		slide_interval : 7800,
		transition_speed : 3000,
		slideshow : 1, 
		navigation              :   1,		//Slideshow controls on/off
		thumbnail_navigation    :   1,		//Thumbnail navigation
		slide_counter           :   1,		//Display slide numbers
		slide_captions          :   1,		//Slide caption (Pull from "title" in slides array)
		slides 					:  	[		//Slideshow Images
										<?php print fadmashion_commerce_intro_supersize_images();?>	  	  
									]
	}); 
});
</script>

    <table id="wrapper" cellpadding="0" cellspacing="0" width="100%" height="100%">
    <tr>
    <td valign="middle" align="center" width="50%"> <div class="content">
    <div class="pad">
    
    <img src="<?php print pp();?>logo_black.png" alt="Fadmashion.com" />
    <h1>Everything you need to<br /> fall in love with a new <br />independent designer.</h1>

    <ul>
    <li>Inspiration Behind the Designs</li>
	<li>High Quality Images</li>
	<li>Press Coverage</li>
	<li>Exclusive Prices</li>
    </ul>
    
    <div class="email">

    <p>Enter your email to start browsing instantly.</p>
                    <input type="text" class="form-text required" value="Enter email address" name="" id="" >
                  <a href="#" class="buttonSmall">Continue</a>
                  <br clear="all">
</div>
   
    </div><!--pad--> 
    </div><!--content-->  <br clear="all"></td>
    <td width="50%">&nbsp;</td>

    </tr>
</table>

<?php if(!empty($page['footer'])): ?>
<div id="footer">
<?php print render($page['footer']); ?>
</div>
<?php endif;  ?>
