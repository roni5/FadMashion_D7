
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
		jQuery('.photos .prev').after('<a class="zoom" href="#">Enlarge</a>');
});
