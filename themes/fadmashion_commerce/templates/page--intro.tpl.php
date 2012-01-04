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
				
					//Functionality
					slideshow               :   1,		//Slideshow on/off
					autoplay				:	0,		//Slideshow starts playing automatically
					start_slide             :   1,		//Start slide (0 is random)
					random					: 	0,		//Randomize slide order (Ignores start slide)
					slide_interval          :   6000,	//Length between transitions
					transition              :   1, 		//0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
					transition_speed		:	2000,	//Speed of transition
					new_window				:	1,		//Image links open in new window/tab
					pause_hover             :   0,		//Pause slideshow on hover
					keyboard_nav            :   1,		//Keyboard navigation on/off
					performance				:	2,		//0-Normal, 1-Hybrid speed/quality, 2-Optimizes image quality, 3-Optimizes transition speed // (Only works for Firefox/IE, not Webkit)
					image_protect			:	1,		//Disables image dragging and right click with Javascript
					image_path				:	'img/', //Default image path

					//Size & Position
					min_width		        :   1024,		//Min width allowed (in pixels)
					min_height		        :   300,		//Min height allowed (in pixels)
					vertical_center         :   1,		//Vertically center background
					horizontal_center       :   1,		//Horizontally center background
					fit_portrait         	:   1,		//Portrait images will not exceed browser height
					fit_landscape			:   0,		//Landscape images will not exceed browser width
					
					//Components
					navigation              :   0,		//Slideshow controls on/off
					thumbnail_navigation    :   0,		//Thumbnail navigation
					slide_counter           :   0,		//Display slide numbers
					slide_captions          :   0,		//Slide caption (Pull from "title" in slides array)
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
    
    <img src="images/logo.png" alt="Fadmashion.com" />
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
