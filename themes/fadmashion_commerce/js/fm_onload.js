/**
 *  Javascript Tools to handle Forms in FAdmashion 
 */

jQuery(document).ready(function() {
	

	jQuery('#block-views-nodequeue-2-block  .views-slideshow-cycle-main-frame-row').each( function () {
	  var body_html = jQuery('.views-field-body', this).html();
	  jQuery(' .views-field-title', this).append(body_html);
	  jQuery('.views-field-body', this).html('');
	});
	
	//HowItWorks
	if(!howItWorks) {
	  jQuery.colorbox({ 
	      opacity: '.9',
	      innerWidth: '930px', innerHeight: '560px', 
	      inline: true, 
	      href:"#block-views-nodequeue-2-block"
	    });
	  jQuery('#colorbox').addClass('blankBox');
	  
	  fmUsersOpened(1);
	}
	
	//Show a Non-Closeable registration pop-up if the user is not authenticated.
	if(!uid) {
		jQuery.colorbox({ 
		      opacity: '.9',
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

});

function fmUsersOpened(item_id) {
	jQuery.ajax({
		   type: "GET",
		   url: "?q=fm_users_opened/" + item_id,
		   dataType: "script"
		 });
}