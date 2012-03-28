<?php
// $Id: page.tpl.php,v 1.9 2010/11/07 21:48:56 dries Exp $

/**
 * @file
 * FadMashion Commerce Splash page implementation.
 */

global $user;
$mail = fm_users_register_session_email();
if(!user_access('view splash page') || (isset($mail) && !empty($mail)) ) {
//if(!user_access('view splash page')) {	
  drupal_goto('deals');
}

?>

<script type="text/javascript">  
			


			jQuery(function($){
				$.supersized({
					start_slide				:	0,
					vertical_center   : 0,
					slide_interval : 7800,
					transition_speed : 2500,
					slideshow : 1, 
					//Size & Position
					min_width		        :   1024,		//Min width allowed (in pixels)
					min_height		        :   300,		//Min height allowed (in pixels)
					vertical_center         :   1,		//Vertically center background
					horizontal_center       :   1,		//Horizontally center background
					fit_portrait         	:   1,		//Portrait images will not exceed browser height
					fit_landscape			:   0,		//Landscape images will not exceed browser width

					slide_links				:	0,			// Individual links for each slide (Options: false, 'num', 'name', 'blank')
					thumb_links				:	0,			// Individual thumb links for each slide
					
					//Components
					navigation              :   0,		//Slideshow controls on/off
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
    
    <img src="<?php print pp();?>logo_black.png" alt="Fadmashion.com" />
    <?php print render($page['content']); ?>
    
    <div class="email">

      <?php if(!empty($page['triptych_first'])): ?>
  			  <?php print render($page['triptych_first']);?>
      <?php endif;  ?> 
    </div>
   
    </div><!--pad--> 
    </div><!--content-->  <br clear="all"></td>
    <td class="supersized-img" width="50%">&nbsp;</td>

    </tr>
</table>

<?php if(!empty($page['footer'])): ?>
<div id="footer">
<?php print render($page['footer']); ?>
</div>
<?php endif;  ?>
