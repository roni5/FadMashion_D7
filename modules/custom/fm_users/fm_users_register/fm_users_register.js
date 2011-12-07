/**
 * 
 */


var blockName = 'block-fm-users-register-fm-users-register-block';
var forceRegisterTimeout;

jQuery(document).ready(function() {
	//Show a Non-Closeable registration pop-up if the user is not authenticated.
	if(jQuery("#" + blockName).length) {
		forceRegisterTimeout = setTimeout("fmForceRegister();",8500);
	}
	  jQuery('.form-type-password-confirm .description ').html('');
	 
	  /* 
	  if(jQuery('#user-login-form').length) {
		   
		  //Do Password Clear Defaults
		  fmPasswordClearDefaults(jQuery("#user-login-form .form-item-pass input"), 
				  jQuery("#user-login-form .form-item-pass-clear input"));
		  
		jQuery('#user-login-form').validate({
	    	errorClass: 'invalid',
	  	    onkeyup: false,
	  	    wrapper: 'div id="message_box"',
	     });
	  
	    jQuery("#user-login-form #edit-name").rules("add", {
	 	   notEqual: "Email"
	     });
	    jQuery("#user-login-form .form-item-pass input").rules("add", {
	  	   remote: {
	  		   url: base_path + "?q=fm_users/auth",
	  		   type: "post",
	  		   data: {username: function(){return  jQuery("#user-login-form #edit-name").val(); }}
	  	   },
	       messages: { 
	           remote: jQuery.format("Wrong password or username")
	       },
	    
	  	 });
		  
	   }*/
	  
	  //Validate Registration page
	  if(jQuery('#user-register-form').length) {
	   
	    jQuery('#user-register-form').validate({
	    	errorClass: 'invalid',
	  	    onkeyup: false,
	  	    wrapper: 'div id="message_box"',
	  	    submitHandler: function(form) {
				jQuery(form).ajaxSubmit({
			        beforeSubmit:  regSlideConfirmation,  // pre-submit callback 
			        success:       regFormSuccess  // post-submit callback 
				});
			},
	  	  });
	  
	    jQuery("#user-register-form  #edit-field-first-name-und-0-value").rules("add", {
	 	    notEqual: "First Name"
	     });
	    jQuery("#user-register-form  #edit-field-last-name-und-0-value").rules("add", {
		 	 notEqual: "Last Name"
		});
	    jQuery("#user-register-form  #edit-mail").rules("add", {
		 	 notEqual: "Email",
		     email: true,
		     remote: {
		  		   url: base_path + "?q=fm_users/email-verify",
		  		   type: "post",
		  	 },
		     messages: { 
		           remote: jQuery.format('E-mail registered already.')
		     },
		});
	    jQuery("#user-register-form  #edit-field-tos-und").rules("add", {
		 	 required: true,
		 	 messages: { required: 'Terms of Service must be agreed to!' }
		});
	    
	    jQuery("#user-register-form #edit-pass-pass1").rules("add", {
	    	minlength:5,
	    	maxlength:14,
		});
	    jQuery("#user-register-form #edit-pass-pass2").rules("add", {
		 	 equalTo: "#user-register-form #edit-pass-pass1",
		 	 messages: { equalTo: 'Password Doesn\'t match' }
		});
	    
	    
	    fmPasswordClearDefaults(jQuery("#user-register-form #edit-pass-pass1"), 
				  jQuery("#user-register-form  #edit-pass-clear"));
	    
	    fmPasswordClearDefaults(jQuery("#user-register-form #edit-pass-pass2"), 
				  jQuery("#user-register-form  #edit-pass-confirm-clear"));
	   } //End registration VAlidate

});

function regFormSuccess(responseText, statusText, xhr, $form) {
	formSuccess();
	
	
	alert('test');
}

function regSlideConfirmation() {
	jQuery('#signup').hide();
	jQuery('#confirmation').fadeIn();
}

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

function fmClearRegisterTimeout() {
	clearTimeout(forceRegisterTimeout);
}

function fmShowLogin(){
	jQuery('#login-form').show();
	jQuery('#intro').hide();
}
function fmFadeRegisterBlock() {
	jQuery('#cboxOverlay').fadeTo(1000, .75, function() {
		
	});
	setTimeout("jQuery('#" + blockName + "').fadeIn(1000);",700);
	
	
}