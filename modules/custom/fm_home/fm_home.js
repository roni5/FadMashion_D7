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
		jQuery('.slides', jQuery(this)).cycle('resume').cycle(1);
	}, function(){
		jQuery('.slides', jQuery(this)).cycle('pause').cycle(0);
		jQuery(this).find('.overlay .shopLink').slideUp();
     });
	
})