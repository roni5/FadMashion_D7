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
		transition_speed : 1000,
		slideshow : 1, 
		navigation              :   1,		//Slideshow controls on/off
		thumbnail_navigation    :   1,		//Thumbnail navigation
		slide_counter           :   1,		//Display slide numbers
		slide_captions          :   1,		//Slide caption (Pull from "title" in slides array)
		slides 					:  	[		//Slideshow Images
											{//Slide 1
												image : '/<?php print drupal_get_path("theme","fadmashion_commerce");?>/images/front-page/two_gowns.jpg', 
											  title: 'Designer: <a target="_blank"  style="font-style: normal; font-family:\'museo-sans-1\',\'museo-sans-2\',Helvetica;" href="http://www.daniellakallmeyer.com/"> Daniella Kallmeyer</a>'
											},	
											{//Slide 2
												image : '/<?php print drupal_get_path("theme","fadmashion_commerce");?>/images/front-page/splash_photo.jpg',
                        title: 'Designer: <a target="_blank" href="http://www.jonathansimkhai.com/jonathan.html" style="font-style: normal; font-family:\'museo-sans-1\',\'museo-sans-2\',Helvetica;" >Jonathan Simkhai</a>'
											},
											{//Slide 3
												image : '/<?php print drupal_get_path("theme","fadmashion_commerce");?>/images/front-page/de_lingerie.jpg',
                        title: 'Designer: <a target="_blank" href="http://www.daisyandelizabeth.com/" style="font-style: normal; font-family:\'museo-sans-1\',\'museo-sans-2\',Helvetica;" >Daisy & Elizabeth</a>'
											},
											{//Slide 4
												image : '/<?php print drupal_get_path("theme","fadmashion_commerce");?>/images/front-page/image1.jpg',
                        title: 'Designer: <a target="_blank" href="http://www.thevisiontrain.com" style="font-style: normal; font-family:\'museo-sans-1\',\'museo-sans-2\',Helvetica;" >Nicole Baker</a>'
											},
											{//Slide 5
												image : '/<?php print drupal_get_path("theme","fadmashion_commerce");?>/images/front-page/kent_2.jpg',
                        title: 'Designer: <a target="_blank" href="http://nettiekent.com/home.html" style="font-style: normal; font-family:\'museo-sans-1\',\'museo-sans-2\',Helvetica;" >Nettie Kent</a>'
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
	        	<a  href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" >
        			    <img src="/<?php print drupal_get_path("theme","fadmashion_commerce");?>/images/logo_fadmashion.png" alt="<?php print t('fadmashion'); ?>" />
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



