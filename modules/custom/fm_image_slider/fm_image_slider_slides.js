
/**
 *  Javascript Tools to add Nivo Slider
 */

jQuery(document).ready(function() {
	
		jQuery('#product').slides({
			preload: true,
			preloadImage: 'img/loading.gif',
			effect: 'slide, fade',
			crossfade: true,
			slideSpeed: 350,
			fadeSpeed: 500,
			generateNextPrev: true,
			generatePagination: false
		});
		
		jQuery(".photos .slides_container img").mousemove(function(e){
			jQuery("#photo_tooltip").fadeIn();
	    });
	    jQuery(".photos .slides_container img").mouseout(function(e){
	    	jQuery("#photo_tooltip").hide();
	    });

		
		jQuery(".zoom01").gzoom({sW: 372,
			sH: 474,
			lW: 586,
			lH: 747,
			step: 10,
			frameColor: "#F0EEEA",
			lighbox : false
			});
		jQuery('.photos .prev').after('<a class="zoom colorbox-inline" href="' + zoomUrl + '">Enlarge</a>');
		Drupal.attachBehaviors();

});

(function ($) {
	Drupal.behaviors.zoomedBox = {
	  attach: function (context, settings) {

		  if(!jQuery('#zoomed').length || !jQuery('#cboxLoadedContent').length || !jQuery('#zoomed').is(":visible")) {
		    	return;
		  }
		  
		  if(!jQuery('#zoomed .slides_control').length) {
			  jQuery('#zoomed').slides({
					preload: true,
					preloadImage: 'img/loading.gif',
					effect: 'slide, fade',
					crossfade: true,
					slideSpeed: 350,
					fadeSpeed: 500,
					generateNextPrev: true,
					generatePagination: false,
					animationStart: function() {
						//Reset Pan
						jQuery(".zoom02 .panFullSize").css( {backgroundPosition:  "0px " + posY.toString() + "px"} )
					}
				});
		  }
		  var boxHeight = jQuery('#cboxLoadedContent').height();
		  var middle = boxHeight/2;
		  jQuery("#zoomed .slides_container").height(boxHeight);
		  jQuery("#zoomed .prev, #zoomed .next").css('top', middle.toString() + 'px');
		  
		  jQuery(".zoom02 img").panFullSize(588, boxHeight);
		  
		 
		 /* jQuery(".zoom02").gzoom({sW: 586,
				sH: 747,
				lW: 586,
				lH: 747,
				step: 10,
				frameWidth: 0,
				lighbox : false
				});
		  */
	  }
	};
})(jQuery);
