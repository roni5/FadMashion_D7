/**
 * 
 */

var howitworks_block;
var default_block; 

jQuery(document).ready(function() {

	howitworks_block = jQuery('#block-views-nodequeue-2-block');
    default_block = jQuery('#block-block-7');
    howitworks_block.hide();
    howitworks_block.css('width', 'auto');
    
	if(howitworks_block.length) {
		
		/*if(jQuery.cookie('carousel') != 'true') {
		  jQuery.cookie('carousel', 'true');
		  fmDisplayDropDown();
		} */
		
		//add close button 
		howitworks_block.prepend('<a class="close" href="javascript:fmCloseDropDown()">&nbsp;</a>');
	}
	
});

function fmDisplayDropDown() {
	default_block.hide();
	jQuery('.shadow').show();
	howitworks_block.slideDown();
	jQuery('#sectionHeader').addClass('dropped');
	
	jQuery(document).click(function() {
		fmCloseDropDown();
	});
	
	jQuery(".content", howitworks_block).bind('click', false);

	

	
	
}

function fmCloseDropDown() {
	howitworks_block.hide();
	jQuery('.shadow').hide();
	default_block.show();
	jQuery('#sectionHeader').removeClass('dropped');
	
	//jQuery(document).unbind('click');
	jQuery("#block-views-nodequeue-2-block .content").unbind('click', false);
}