/**
 * 
 */


var blockName = 'block-fm-users-register-fm-users-register-block';
jQuery(document).ready(function() {
	//Show a Non-Closeable registration pop-up if the user is not authenticated.
	if(jQuery("#" + blockName).length) {
		setTimeout("fmForceRegister();",1500);
	}

});


function fmForceRegister() {
	
	jQuery.colorbox({ 
	      opacity: '0',
	      innerWidth: '930px', innerHeight: '560px', 
	      inline: true, 
	      overlayClose: false, 
	      escKey: false, 
	      href:"#" + blockName,
	      onComplete: fmFadeRegisterBlock
	    });
	 jQuery('#colorbox').addClass('blankBox');
	 jQuery('#cboxClose').hide();
	 jQuery('#' + blockName).hide();
	 
	 
}

function fmFadeRegisterBlock() {
	jQuery('#cboxOverlay').fadeTo(1000, .75, function() {
		
	});
	setTimeout("jQuery('#" + blockName + "').fadeIn(1000);",700);
	
	
}