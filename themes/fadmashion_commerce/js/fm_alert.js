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
				jQuery(".msg-text").html(data.responseText);
				fm_alignAlertCenter(jQuery("body"));
				timeout = setTimeout('fm_clearAlertBox()', "3000");
			}  
		});
	});

});

function fm_clearAlertBox() {
	if(jQuery(".msg-box-cont").length){
		clearTimeout(timeout);
		jQuery(".msg-box-cont").fadeOut('fast',function(){
			jQuery(this).remove();
		});
	}	
}

function fm_alignAlertCenter(containterObj) {
	var alert_box_width = jQuery(".msg-box-cont").width();
    //get the width of the container
    var container_width = containterObj.innerWidth();
    // get the x position of the container
    var container_left = containterObj.x();
    //get the center position of the alert box within the container
    var actual_left = ((container_width-alert_box_width)/2)+container_left;
    //get the y (top) position of the container
    jQuery(".msg-box-cont").css("left",actual_left+"px");
	
}