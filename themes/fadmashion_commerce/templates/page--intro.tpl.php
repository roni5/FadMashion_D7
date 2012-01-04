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

<script>

jQuery(function($){
	$.supersized({
		start_slide				:	0,
		vertical_center   : 0,
		slide_interval : 7800,
		transition_speed : 1000,
		slideshow : 1, 
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

<div id="wrap">
  <div id="main">
    <div id="box">
      <div class="pad">
        <div class="logo">
	        	<a  href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" >
        			    <img src="<?php print pp();?>logo_fadmashion.png" alt="<?php print t('fadmashion'); ?>" />
      			    </a>
      			 <div class="slogan"><?php //print $site_slogan; ?></div>   
        </div>
        <?php if ($messages): ?>
          <div id="messages"><div class="section clearfix">
          <?php print $messages; ?>
          </div></div> <!-- /.section, /#messages -->
       <?php endif; ?>
       
        <?php print render($page['content']); ?>
        <?php print render($page['featured']);?>
      </div>
      
      
      <?php if(!empty($page['triptych_first'])): ?>
      <div id="invite" class="pad extend rounded-top rounded-bottom">
  			  <?php print render($page['triptych_first']);?>
  			  </div>
      <?php endif;  ?> 
      
  			<?php if(!empty($page['triptych_middle'])): ?>
  			<div class="login">
  			  <div class="pad"> 
  			 <?php print render($page['triptych_middle']);?></div>
        
        </div>
        
        <?php endif;  ?>
        
        
        <?php if(!empty($page['triptych_last'])): ?>
  			<div class="quote">
  			 <?php print render($page['triptych_last']);?>
        </div>
        <?php endif;  ?>
        </div>
			 
      
		</div>
	</div>
</div>



<?php if(!empty($page['footer'])): ?>
<div id="footer">
<?php print render($page['footer']); ?>
</div>
<?php endif;  ?>



