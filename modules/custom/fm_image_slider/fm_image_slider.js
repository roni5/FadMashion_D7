
/**
 *  Javascript Tools to add Nivo Slider
 */

jQuery(document).ready(function() {
	jQuery('#slider').nivoSlider({
        effect:'fade', // Specify sets like: 'fold,fade,sliceDown'
        startSlide:0, // Set starting Slide (0 index)
        controlNav:true, // 1,2,3... navigation
        controlNavThumbs:true, // Use thumbnails for Control Nav
        controlNavThumbsFromRel:true, // Use image rel for thumbs
        keyboardNav:true, // Use left & right arrows
        manualAdvance:true, // Force manual transitions
    });

});
