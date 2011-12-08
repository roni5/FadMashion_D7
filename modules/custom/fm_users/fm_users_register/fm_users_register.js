/**
 * 
 */

var forceRegisterTimeout;

jQuery(document).ready(function() {
	//Show a Non-Closeable registration pop-up if the user is not authenticated.
	if(jQuery("#" + regBlockId).length) {
		forceRegisterTimeout = setTimeout("fmForceRegister();",8500);
	}
	  jQuery('.form-type-password-confirm .description ').html('');
	 
	
	  if(jQuery('#user-login-form').length) {
		   
		  //Do Password Clear Defaults
		  fmPasswordClearDefaults(jQuery("#user-login-form .form-item-pass input"), 
				  jQuery("#user-login-form .form-item-pass-clear input"));
		  
		jQuery('#user-login-form').validate({
	    	errorClass: 'invalid',
	  	    onkeyup: false,
	  	    wrapper: 'div id="message_box"',
	  	    errorContainer: jQuery(".loginErrorText"),
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
		  
	   }
	  
	  //Validate Registration page
	  if(jQuery('#user-register-form').length) {
	   
	    jQuery('#user-register-form').validate({
	    	errorClass: 'invalid',
	    	errorContainer: jQuery(".errorText"),
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
	jQuery('.state2 .box').hide();
	jQuery('.state2 .box').html(responseText);
	jQuery('.state2 .box').fadeIn('slow');
}

function regSlideConfirmation() {
	jQuery('.state1').fadeOut('fast', function(){
		  jQuery('.state2').fadeIn('slow');
	});
}

function fmForceRegister() {
	jQuery.colorbox({ 
	      opacity: '0',
	      innerWidth: '930px', innerHeight: '560px', 
	      inline: true, 
	      overlayClose: false, 
	      escKey: false, 
	      href:"#" + regBlockId,
	      onComplete: fmFadeRegisterBlock
	    });
	 jQuery('#colorbox').addClass('blankBox');
	 jQuery('#cboxClose').hide();
	 jQuery('#' + regBlockId).hide();	 
}

function fmClearRegisterTimeout() {
	clearTimeout(forceRegisterTimeout);
}

function fmShowLogin(){
	jQuery('.state1').fadeOut('slow', function(){
		  jQuery('.state3').fadeIn('slow');
	});
}
function fmShowSignup(){
	jQuery('.state3').fadeOut('slow', function(){
		  jQuery('.state1').fadeIn('slow');
	});
}

function fmFadeRegisterBlock() {
	jQuery('#cboxOverlay').fadeTo(1000, .75, function() {
		
	});
	setTimeout("jQuery('#" + regBlockId + "').fadeIn(1000);",700);	
}

function fm_invite_facebookshare( url, thumb_path) {
	var details = 'hello';
	
	 FB.ui({
			     method: 'feed',
			     app_id: '213872101957329',
			     name: 'Fadmashion Priority Access',
			     link: url,
			     picture: thumb_path,
			     description: 'Fadmashion offers Independent fashion designs at up to %60 off retail price with fresh new deals every hour!  Request an invitation today and get your own social rewards link to invite friends and earn priority access',
			     message: 'Just joined FadMashion for up to 60% off Independent Designs! .'
			   },
			   function(response) {
			   }
			 );
}

