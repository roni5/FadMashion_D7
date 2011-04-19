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
		slides 					:  	[		//Slideshow Images
											{image : '<?php print drupal_get_path("theme","fadmashion_commerce");?>/images/front-page/image1.jpg'},
											{image : '<?php print drupal_get_path("theme","fadmashion_commerce");?>/images/front-page/image3.jpg'}  
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
        			<img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
      			</a>
        </div>
        <?php if ($messages): ?>
    			<div id="messages"><div class="section clearfix">
      			<?php print $messages; ?>
    			</div></div> <!-- /.section, /#messages -->
  			<?php endif; ?>
        <?php print render($page['content']); ?>
        
      </div>
		</div>
	</div>
</div>
<div id="footer">
    <?php print render($page['footer']); ?>
</div>
