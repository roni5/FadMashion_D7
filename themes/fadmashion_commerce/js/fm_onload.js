/**
 *  Javascript Tools to handle Forms in FAdmashion 
 */

jQuery(document).ready(function() {
	
	//HowItWorks
	if(!howItWorks) {
	  jQuery.colorbox({ 
	      opacity: '.1',
	      innerWidth: '930px', innerHeight: '560px', 
	      inline: true, 
	      href:"#block-views-nodequeue-2-block"
	    });
	  jQuery('#colorbox').addClass('blankBox');
	}
	if(jQuery.browser.msie) {
	//Remove Arrows if it is msie because the fading doesn't work well for it.
		jQuery('.views-slideshow-controls-text-previous, .views-slideshow-controls-text-next').hide();
	}
	var body_html = jQuery('#block-views-nodequeue-2-block .views-field-body').html();
	jQuery('#block-views-nodequeue-2-block .views-field-title').append(body_html);
	jQuery('#block-views-nodequeue-2-block .views-field-body').html('');
	
	
	
});