/**
 * fm_alert.js - Provides functioality for the Alert box at top of 
 */

/**
 *  Javascript Tools to handle Forms in FAdmashion 
 */

jQuery(document).ready(function() {
	
	jQuery("a.alert").click(function (){
		jQuery("a.alert").jAlert('Processing Request...', "warning");
		var href_val = this.attr('href');
		jQuery.ajax({
			type: "POST", 
			url: href_val ,
			complete: function(data){  
			       alert(data);
			}  
		});
		return false;
	});

});