<?php
// $Id: page.tpl.php,v 1.9 2010/11/07 21:48:56 dries Exp $

/**
 * @file
 * FadMashion Commerce Splash page implementation.
 */
?>

<script type="text/javascript">  
			
jQuery(function($){
	$.supersized({
		start_slide				:	0,
		slides 					:  	[		//Slideshow Images
											{image : '<?php print path_to_theme()?>/images/front-page/image1.jpg'},  
											{image : '<?php print path_to_theme()?>/images/front-page/image2.jpg'},  
											{image : '<?php print path_to_theme()?>/images/front-page/image3.jpg'}  
									]
									
	}); 
});
</script>

<div id="containter">
  <div id="content">
    <div id="box">
      <div class="pad">
        <div class="logo">
	        	<img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
	        	<h1> <?php print $site_slogan; ?> </h1>
        </div>
          <?php print render($page['content']); ?>
      </div>
		</div>
	</div>
</div>
<div id="footer">
  <?php print render($page['footer']); ?>
</div>
