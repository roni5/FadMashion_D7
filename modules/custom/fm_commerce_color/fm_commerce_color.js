/**
 * fm_commerce_color.js - Provides functioality for the Alert box at top of 
 */

/**
 *  Javascript Tools to handle Forms in FAdmashion 
 */

jQuery(document).ready(function() {
	
	 jQuery('#commerce-cart-add-to-cart-form').validate({
	    	errorClass: 'invalid',
	    	onkeyup: false,
	    	wrapper: 'div id="message_box"',
	 });
	 jQuery("#commerce-cart-add-to-cart-form #edit-sizes").rules("add", {
    	 required: true,
    	 messages: {
    		   required: "Select a size",
        }
    });
	 jQuery("#commerce-cart-add-to-cart-form #edit-colors").rules("add", {
    	 required: true,
    	 messages: {
  		   required: "Select a Color",
          }
    });
	    
	    
	//Enable Javascript Color functionality for Fadmashion Commerce
	jQuery('.form-item-colors select').selectBox();
	
	//Change color options to div structures
	jQuery('.form-item-colors .selectBox-options li a').each(function() {
		var code = jQuery(this).attr('rel');
		var val = jQuery(this).html();
		jQuery(this).attr('style', 'background-color: #' + code);
		jQuery(this).attr('pos', val);
		jQuery(this).html('');
	});
	
	//Enable Javascript Color functionality for Fadmashion sizes
	jQuery('.form-item-sizes select').selectBox();
	
});