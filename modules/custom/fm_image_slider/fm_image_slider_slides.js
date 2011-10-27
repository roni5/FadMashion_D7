
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
		
		jQuery(".zoom01").gzoom({sW: 372,
			sH: 474,
			lW: 586,
			lH: 747,
			step: 10,
			frameColor: "#F0EEEA",
			lighbox : false
			});
		jQuery('.photos .prev').after('<a class="zoom colorbox-inline" href="/?height=880&width=828&inline=true#zoomed">Enlarge</a>');
		Drupal.attachBehaviors();

});

(function ($) {
	Drupal.behaviors.zoomedBox = {
	  attach: function (context, settings) {
		  if(!jQuery('#zoomed').length || !jQuery('#zoomed').is(":visible")) {
		    	return;
		  }
		  if(jQuery('#zoomed .slides_control').length) {
		    	return;
		  }
		  
		 jQuery('#zoomed').slides({
				preload: true,
				preloadImage: 'img/loading.gif',
				effect: 'slide, fade',
				crossfade: true,
				slideSpeed: 350,
				fadeSpeed: 500,
				generateNextPrev: true,
				generatePagination: false
			});
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
