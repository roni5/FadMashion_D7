
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
			lW: 372,
			lH: 474,
			step: 10,
			lighbox : false
			});

		
		/*jQuery('#zoomed').slides({
			preload: true,
			preloadImage: 'img/loading.gif',
			effect: 'slide, fade',
			crossfade: true,
			slideSpeed: 350,
			fadeSpeed: 500,
			generateNextPrev: true,
			generatePagination: false
		});*/
		jQuery('.photos .prev').after('<a class="zoom colorbox-inline" href="/?width=930&height=560&inline=true#zoomed&blankBox=1">Enlarge</a>');
		Drupal.attachBehaviors();
});
