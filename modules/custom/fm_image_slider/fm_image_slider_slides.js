
/**
 *  Javascript Tools to add Nivo Slider
 */

var slideSpeed = 600;
var fadeSpeed = 500;
jQuery(document).ready(function() {
	
		jQuery('#product').slides({
			preload: true,
			preloadImage: loadingImagePath,
			effect: 'fade',
			crossfade: true,
			slideSpeed: slideSpeed,
			fadeSpeed: fadeSpeed,
			generateNextPrev: true,
			generatePagination: false
		});
		jQuery('#product').show();
		
		/*Mousewheel zoom for main product image
		jQuery(".photos .slides_container img").mousemove(function(e){
			jQuery("#photo_tooltip").show();
	    });
	    jQuery(".photos .slides_container img").mouseout(function(e){
	    	jQuery("#photo_tooltip").hide();
	    });*/

		/*jQuery(".zoom01").gzoom({sW: 372,
			sH: 474,
			lW: 650,
			lH: 828,
			step: 10,
			frameColor: "#F0EEEA",
			re : /fm_main_product_image\//, 
  	        replace : 'fm_zoom_product_image/',  
			lighbox : false
	     });*/
		 $('.zoom01').addimagezoom({
			  zoomrange: [3, 10],
			  magnifiersize: [300,300],
			  magnifierpos: 'right',
			  cursorshade: true,
			  largeimage: 'hayden.jpg' //<-- No comma after last option!
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
		  var border = 1;
		  var zoomed_width = 650;
		  var total_width = 840;
		  var max_picture_height = 828;
		  
		  //Make changes to Colorbox Panel for Zoom pane
		  jQuery('#cboxClose').css('top', '-5px');
		  jQuery('#cboxClose').css('right', '-5px');
		  jQuery('#cboxContent').css('width',total_width + 'px');
		  jQuery('#cboxTopCenter').css('width',total_width + 'px');
		  jQuery('#cboxBottomCenter').css('width',total_width + 'px');
		  jQuery('#cboxLoadedContent').css('margin-top', '0px');
		  jQuery('#cboxLoadedContent').css('padding', padding.toString() + 'px');
		  
		  var boxHeight = jQuery('#cboxContent').height() - padding;
		  jQuery("#cboxLoadedContent").height(boxHeight);
		  boxHeight = boxHeight - padding - (2*border);
		  
		  if(boxHeight > max_picture_height) {
			  boxHeight = max_picture_height;
			  jQuery.colorbox.resize({height: max_picture_height + 130 });
			  jQuery('#zoom_photo_tooltip').hide();
		  }
		  var middle = boxHeight/2;
		  jQuery(".zoom02 img").panFullSize(zoomed_width, boxHeight);
		  
		  if(!jQuery('#zoomed .slides_control').length) {
			  jQuery('#zoomed').slides({
					preload: true,
					preloadImage: loadingImagePath,
					effect: 'fade',
					crossfade: true,
					slideSpeed: 80,
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
