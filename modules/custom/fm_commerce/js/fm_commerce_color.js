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
	 
	 var sizes = jQuery("#commerce-cart-add-to-cart-form #edit-sizes")
	 if(sizes.length) {
		 sizes.rules("add", {
    	   required: true,
    	   messages: {
    		   required: "Select a size",
            }
        });
     }
	 
	 var colors = jQuery("#commerce-cart-add-to-cart-form #edit-colors");
	 if(colors.length) {
		 colors.rules("add", {
    	   required: true,
    	   messages: {
    		   required: "Select a Color",
            }
        });
     }
	 

		//Enable Javascript Color functionality for Fadmashion sizes
		//jQuery('.form-item-sizes select').selectBox();
		
	//Enable Javascript Color functionality for Fadmashion Commerce
		//jQuery('.form-item-colors select').selectBox();
	
		
		//Change color options to div structures
		jQuery('.form-item-colors .selectBox-options li a').each(function() {
			var vals = jQuery(this).attr('rel').split('_');
			var code = vals[0];
			var title = vals[1];
			var val = jQuery(this).html();
			var qty_info = jQuery('#qty-' + jQuery(this).attr('rel'));
			
			if(qty_info.attr('val') == '' || qty_info.attr('val') == 0) {
				jQuery(this).parent().addClass('selectBox-disabled');
			}
			
			jQuery(this).attr('style', 'background-color: #' + code);
			jQuery(this).attr('title', qty_info.html()  + ' (' + title + ')');
			jQuery(this).attr('pos', val);
			jQuery(this).html('');
		});
		jQuery('.form-item-sizes .selectBox-options li a').each(function() {
		
			var qty_info = jQuery('#qty-' + jQuery(this).attr('rel'));
			
			if(qty_info.attr('val') == '' || qty_info.attr('val') == '0') {
				jQuery(this).parent().addClass('selectBox-disabled');
			}
			
			jQuery(this).attr('title', qty_info.html());
		});
		
		
		
		
		jQuery('.selectBox-selected').each(function() {
		  if(jQuery(this).hasClass('selectBox-disabled')) {
			  jQuery(this).removeClass('selectBox-selected');
			  var parent = jQuery(this).parent();
			  //find the next one and add the class there
			  jQuery('li:not(.selectBox-disabled)', parent).first().addClass('selectBox-selected');
		  }
		});
		
		/*jQuery('.form-item-colors li a').click(function() {
			var title = jQuery('.form-item-colors .selectBox-selected a').attr('title');
			jQuery('.form-item-colors .selectBox-options .colorName').html(title);
		});
		
		var title = jQuery('.form-item-colors .selectBox-selected a').attr('title');
		jQuery('.form-item-colors .selectBox-options').before('<div class="colorName">' + title + '</div>');
		*/
});


