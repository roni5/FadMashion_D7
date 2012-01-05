/**
 * 
 */
jQuery(document).ready(function() {
	
	  if(jQuery('#fm-users-register-intro-form').length) {
		   
		jQuery('#fm-users-register-intro-form').validate({
			errorClass: 'invalid',
	    	errorContainer: jQuery(".errorSplashBox"),
	  	    onkeyup: false,
	  	    wrapper: 'div id="message_box"',
	     });
	  
	    jQuery("#fm-users-register-intro-form #edit-mail").rules("add", {
	 	   notEqual: "you@email.com",
	 	   email: true,
	     });
		  
	 }
	  

});