/**
 * 
 */

jQuery(document).ready(function() {
	// Pause & play on hover
	jQuery('.panel-block').hover(function(){
		jQuery(this).find('.overlay .shopLink').slideDown();
	}, function(){
		//$(this).find('.slides').removeClass('active').cycle('pause');
		jQuery(this).find('.overlay .shopLink').slideUp();
     });
	
})