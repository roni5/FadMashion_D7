
/**
 *  Javascript Tools to add Nivo Slider
 */

var slideSpeed = 430;
var fadeSpeed = 500;
jQuery(document).ready(function() {
	
		jQuery('#product').slides({
			preload: true,
			preloadImage: loadingImagePath,
			effect: 'slide, fade',
			crossfade: true,
			slideSpeed: slideSpeed,
			fadeSpeed: fadeSpeed,
			generateNextPrev: true,
			generatePagination: false
		});
		
		/*jQuery(".photos .slides_container img").mousemove(function(e){
			jQuery("#photo_tooltip").fadeIn();
	    });
	    jQuery(".photos .slides_container img").mouseout(function(e){
	    	jQuery("#photo_tooltip").hide();
	    });*/

		
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
		  
		  var padding = 18;
		  //Set overlay height to full document height
		  var fullHeight = jQuery(document).height();
		  jQuery("#cboxOverlay").height(fullHeight);
		  
		  //Make changes to Colorbox Panel for Zoom pane
		  jQuery('#cboxClose').css('top', '-5px');
		  jQuery('#cboxClose').css('right', '-5px');
		  jQuery('#cboxContent').css('width','780px');
		  jQuery('#cboxTopCenter').css('width','780px');
		  jQuery('#cboxBottomCenter').css('width','780px');
		  jQuery('#cboxLoadedContent').css('margin-top', '0px');
		  jQuery('#cboxLoadedContent').css('padding', padding.toString() + 'px');
		  
		  var boxHeight = jQuery('#cboxContent').height();
		  jQuery("#cboxLoadedContent").height(boxHeight);
		  var middle = boxHeight/2;
		  jQuery(".zoom02 img").panFullSize(588, boxHeight);
		  
		  if(!jQuery('#zoomed .slides_control').length) {
			  jQuery('#zoomed').slides({
					preload: true,
					preloadImage: loadingImagePath,
					effect: 'slide, fade',
					crossfade: true,
					slideSpeed: slideSpeed,
					fadeSpeed: fadeSpeed,
					generateNextPrev: true,
					generatePagination: false,
					animationComplete: function() {
						//Reset Pan
						jQuery(".zoom02 .panFullSize").css( {backgroundPosition:  "0px 0px"} )
					}
				});
		  }
		  
		  jQuery("#zoomed .slides_container").height(boxHeight);
		  jQuery("#zoomed .prev, #zoomed .next").css('top', middle.toString() + 'px');
		  
		  
		 
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
