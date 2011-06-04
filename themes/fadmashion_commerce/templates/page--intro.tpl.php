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
		slideshow : 0, 
		navigation              :   1,		//Slideshow controls on/off
		thumbnail_navigation    :   1,		//Thumbnail navigation
		slide_counter           :   1,		//Display slide numbers
		slide_captions          :   1,		//Slide caption (Pull from "title" in slides array)
		slides 					:  	[		//Slideshow Images
											{//Slide 1
												image : '/<?php print drupal_get_path("theme","fadmashion_commerce");?>/images/front-page/two_gowns.jpg', 
											  title: 'Designer: <a target="_blank"  style="font-style: normal; font-family:\'museo-sans-1\',\'museo-sans-2\',Helvetica;" href="http://www.daniellakallmeyer.com/?width=600&height=400&iframe=true"> Daniella Kallmeyer</a>'
											},	

											{//Slide 2
												image : '/<?php print drupal_get_path("theme","fadmashion_commerce");?>/images/front-page/splash_photo.jpg',
                        title: 'Designer: <a target="_blank" href="http://www.jonathansimkhai.com/jonathan.html?width=600&height=400&iframe=true" style="font-style: normal; font-family:\'museo-sans-1\',\'museo-sans-2\',Helvetica;" >Jonathan Simkhai</a>'
											}	  
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
<p style="font-size: 15px; line-height: 22px;">"Fadmashion.com has changed, and so has the way you'll shop for independent fashion from now on."</p>
<a class="colorbox-load" title="myfashionlife" href="http://www.myfashionlife.com/archives/2011/05/05/get-priority-access-to-a-new-independent-shopping-site-with-mfl/?width=700&height=500&iframe=true">Read Full Article</a><div class="byline">- myfashionlife</div>
</div> 
        <?php endif;  ?>
			 
      
		</div>
	</div>
</div>
<div id="footer">
    <?php print render($page['footer']); ?>
</div>
