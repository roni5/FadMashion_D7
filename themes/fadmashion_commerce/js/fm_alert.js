/**
 * fm_alert.js - Provides functioality for the Alert box at top of 
 */

/**
 *  Javascript Tools to handle Forms in FAdmashion 
 */

jQuery(document).ready(function() {
	
	jQuery("a.alert").click(function (e){
		e.preventDefault();
		jQuery("body").jAlert('Hold on for a sec...', "warning", "body", 'none');
		var href_val = jQuery(this).attr('href');
		jQuery.ajax({
			type: "POST", 
			url: href_val ,
			complete: function(data){  
				jQuery(".msg-text").html(data.msg);
				timeout = setTimeout('fm_clearAlertBox()', "2000");
			}  
		});
	});

});

function fm_clearAlertBox() {
	if($(".msg-box-cont").length){
		clearTimeout(timeout);
		$(".msg-box-cont").fadeOut('fast',function(){
			$(this).remove();
		});
	}	
}