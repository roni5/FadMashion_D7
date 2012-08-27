/**
 * 
 */

jQuery(document).ready(function() {
	// Pause & play on hover
	// Cycle plugin
	jQuery('.slides').cycle({
	    fx:     'fade',
	    speed:   700,
	    timeout: 70
	}).cycle("pause");
	
	jQuery('.panel-block').hover(function(){
		jQuery(this).find('.overlay .shopLink').slideDown();
		jQuery(this).find('.slides').addClass('active').cycle('resume');
	}, function(){
		jQuery(this).find('.slides').removeClass('active').cycle('stop').cycle({
			startingSlide: 1
	    });
		jQuery(this).find('.overlay .shopLink').slideUp();
     });
	
})