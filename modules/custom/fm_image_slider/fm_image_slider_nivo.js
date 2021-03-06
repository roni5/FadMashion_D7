
/**
 *  Javascript Tools to add Nivo Slider
 */

jQuery(document).ready(function() {
	jQuery('#slider').nivoSlider({
        effect:'fade', // Specify sets like: 'fold,fade,sliceDown'
        startSlide:0, // Set starting Slide (0 index)
        directionNav:false, // Next & Prev navigation
        directionNavHide:true, // Only show on hover
        controlNav:showThumbs, // 1,2,3... navigation
        controlNavThumbs: showThumbs, // Use thumbnails for Control Nav
        controlNavThumbsFromRel:showThumbs, // Use image rel for thumbs
        keyboardNav:true, // Use left & right arrows
        manualAdvance:true,
        pauseTime:6000, 
    });
	
	if(!showThumbs) {
		jQuery('.photos').addClass('no-thumbs');
	}

});
