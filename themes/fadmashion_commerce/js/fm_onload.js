/**
 *  Javascript Tools to handle Forms in FAdmashion 
 */

jQuery(document).ready(function() {
	

	jQuery('#block-views-nodequeue-2-block,  #block-views-nodequeue-3-block').addClass('basicPagePopUp');
	
	//TODO: Re-arrange body so it is in the title Div.  CSS ISSUE
	jQuery('.basicPagePopUp .views-row').each( function () {
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
	if(!uid && !front_intro) {
		setTimeout("fmForceRegister();",2000);
	}
	
	if(jQuery.browser.msie) {
	//Remove Arrows if it is msie because the fading doesn't work well for it.
		jQuery('.views-slideshow-controls-text-previous, .views-slideshow-controls-text-next').hide();
	}

});

(function ($) {
	Drupal.behaviors.colorboxFullHeight = {
	  attach: function (context, settings) {
	    if (!$.isFunction($.colorbox)) {
	      return;
	    }
	    if(!jQuery("#cboxOverlay").length) {
	    	return;
	    }
	    
		//Set overlay height to full document height
		var fullHeight = jQuery(document).height();
		jQuery("#cboxOverlay").height(fullHeight);
	  }
	};
})(jQuery);


function fmForceRegister() {
	
	jQuery.colorbox({ 
	      opacity: '0',
	      innerWidth: '930px', innerHeight: '560px', 
	      inline: true, 
	      overlayClose: false, 
	      href:"#block-views-nodequeue-3-block",
	      onComplete: fmFadeRegisterBlock
	    });
	 jQuery('#colorbox').addClass('blankBox');
	 jQuery('#cboxClose, #block-views-nodequeue-3-block h2').hide();
	 jQuery('#block-views-nodequeue-3-block').hide();
	 
	 
}

function fmFadeRegisterBlock() {
	jQuery('#cboxOverlay').fadeTo('slow', .9);
	jQuery('#block-views-nodequeue-3-block').fadeIn(2000);
}

function fmUsersOpened(item_id) {
	jQuery.ajax({
		   type: "GET",
		   url: "?q=fm_users_opened/" + item_id,
		   dataType: "script"
		 });
}