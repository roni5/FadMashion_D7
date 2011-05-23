<?php
// $Id: page.tpl.php,v 1.9 2010/11/07 21:48:56 dries Exp $

/**
 * @file
 * FadMashion Commerce Splash page implementation.
 */
?>

<script>

jQuery(function($){
	$.supersized({
		start_slide				:	0,
		vertical_center   : 0, 
		navigation              :   1,		//Slideshow controls on/off
		thumbnail_navigation    :   1,		//Thumbnail navigation
		slide_counter           :   1,		//Display slide numbers
		slide_captions          :   1,		//Slide caption (Pull from "title" in slides array)
		slides 					:  	[		//Slideshow Images
											{image : '/<?php print drupal_get_path("theme","fadmashion_commerce");?>/images/front-page/two_gowns.jpg', title: 'test1'},	
											{image : '/<?php print drupal_get_path("theme","fadmashion_commerce");?>/images/front-page/model_glasses.jpg', title: 'test2'},	  
									]
	}); 
});

</script>


<div id="wrap">
  <div id="main">
    <div id="box">
      <div class="pad">
        <div class="logo">
	        	<a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
        			<img src="/<?php print drupal_get_path("theme","fadmashion_commerce");?>/images/logo_slogan.png" alt="<?php print t('Home'); ?>" />
      			</a>
        </div>
        <?php print render($page['content']); ?>
      </div>
      
      
	     <div class="pad <?php $is_front ? print 'extend' : ''?>" id="invite">
					<?php print render($page['featured']);?>
		       <?php if ($messages): ?>
	    			<div id="message_box"><div class="section clearfix">
	      			<?php print $messages; ?>
	    			</div></div> <!-- /.section, /#messages -->
	  			<?php endif; ?>
  			</div>
  			
  			<?php if($is_front): ?>
  			<div class="quote">
<p style="font-size: 15px; line-height: 22px;">"Sign-up now, tell your friends, beat the line and be the first inside!"</p>
<a class="colorbox-load" title="PRCouture" href="http://www.prcouture.com/2011/05/03/fadmashion-gives-pr-couture-priority-access-to-new-independent-fashion-shopping-site/?width=700&height=500&iframe=true">Read Full Article</a><div class="byline">- PRCouture</div>
</div> 
        <?php endif;  ?>
			 
      
		</div>
	</div>
</div>
<div id="footer">
    <?php print render($page['footer']); ?>
</div>
