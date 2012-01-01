<?php
// $Id: page.tpl.php,v 1.9 2010/11/07 21:48:56 dries Exp $

/**
 * @file
 * FadMashion Commerce Splash page implementation.
 */

global $user;
if(!user_access('view splash page')) {
	drupal_goto('deals');
}

?>

<script>

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
      <div id="invite" class="pad extend">
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



