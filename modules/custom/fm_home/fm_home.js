/**
 * 
 */

jQuery(document).ready(function() {
	// Pause & play on hover
	// Cycle plugin
	jQuery('.slides').cycle({
	    fx:     'fade',
	    speed:   800,
	    timeout: 70
	}).cycle("pause");
	
	jQuery('.panel-block').hover(function(){
		jQuery(this).find('.overlay .shopLink').slideDown();
		jQuery(this).find('.slides').show().cycle('resume');
	}, function(){
		jQuery(this).find('.slides').fadeOut(800).cycle('stop').cycle({
			startingSlide: 1
	    });
		jQuery(this).find('.overlay .shopLink').slideUp();
     });
	
})