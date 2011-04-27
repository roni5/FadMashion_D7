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
		slides 					:  	[		//Slideshow Images
											{image : '/<?php print drupal_get_path("theme","fadmashion_commerce");?>/images/front-page/two_gowns.jpg'},
											
											  
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
      
      <?php if($is_front): ?>
	      <div class="pad" id="invite"><p>Request an invintation to our <br>upcoming private launch</p>
				<?php 
	 			    print $request_form;
	       ?>
	       <?php if ($messages): ?>
    			<div id="message_box"><div class="section clearfix">
      			<?php print $messages; ?>
    			</div></div> <!-- /.section, /#messages -->
  			<?php endif; ?>
  			
			 <?php endif; ?>
      </div>
		</div>
	</div>
</div>
<div id="footer">
    <?php print render($page['footer']); ?>
</div>
