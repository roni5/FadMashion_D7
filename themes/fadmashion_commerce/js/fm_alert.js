/**
 * fm_alert.js - Provides functioality for the Alert box at top of 
 */

/**
 *  Javascript Tools to handle Forms in FAdmashion 
 */

jQuery(document).ready(function() {
	
	jQuery("a.alert").click(function (e){
		e.preventDefault();
		jQuery("body").jAlert('Processing Request...', "warning", "body", 'none');
		var href_val = jQuery(this).attr('href');
		jQuery.ajax({
			type: "POST", 
			url: href_val ,
			complete: function(data){  
			       alert('done');
			}  
		});
	});

});