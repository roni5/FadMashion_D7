/**
 * 
 */

jQuery(document).ready(function() {
	// Pause & play on hover
	// Cycle plugin
	jQuery('.slides').cycle({
	    fx:     'fade',
	    speed:   750,
	}).cycle("pause");
	
	jQuery('.panel-block').hover(function(){
		jQuery(this).find('.overlay .shopLink').slideDown();
		jQuery(this).find('.slides').cycle('resume')
	}, function(){
		jQuery(this).find('.slides')).cycle('stop').cycle({
			startingSlide: 1
	    });
		jQuery(this).find('.overlay .shopLink').slideUp();
     });
	
})