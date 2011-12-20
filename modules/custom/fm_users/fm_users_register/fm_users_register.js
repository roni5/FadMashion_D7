/**
 * 
 */

var forceRegisterTimeout;

jQuery(document).ready(function() {
	
	
	
	//Show a Non-Closeable registration pop-up if the user is not authenticated.
	var delay = 1500;
	if(jQuery("#" + regBlockId).length) {
		if(typeof Drupal.settings.fm_users_register != 'undefined') {
			
		  if(Drupal.settings.fm_users_register.login) {
			//Show login Block
		    jQuery('.state1').hide();jQuery('.state3').show();
		    delay = 0;
		    forceRegisterTimeout = setTimeout("fmForceRegister();", delay);
		  } else if(Drupal.settings.fm_users_register.register) {
               if(typeof Drupal.settings.fm_users_register.delay != 'undefined') {
				 //Control the delay of the pop-up
				  delay = Drupal.settings.fm_users_register.delay ;
			     }
			  
				//Force Register 
				//forceRegisterTimeout = setTimeout("fmForceRegister();", delay);
		  }
		  
		}
		
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
	 	   notEqual: "Email",
	 	   email: true,
	     });
	    jQuery("#user-login-form .form-item-pass input").rules("add", {
	  	   remote: {
	  		   url: base_path + "?q=fm_users/auth",
	  		   type: "post",
	  		   beforeSend: function() { jQuery('#login_loader').show();},
	  		   complete: function(data) { if(data.responseText != "true") {jQuery('#login_loader').hide();}},
	  		   data: {username: function(){return  jQuery("#user-login-form #edit-name").val(); }}
	  	   },
	       messages: { 
	           remote: jQuery.format("Wrong password or username")
	       },
	    
	  	 });
		  
	   }
	  
	//Validate Password Form
	  if(jQuery('#user-pass').length) {
		   
		    jQuery('#user-pass').validate({
		    	errorClass: 'invalid',
		    	errorContainer: jQuery(".loginErrorText"),
		  	    onkeyup: false,
		  	    wrapper: 'div id="message_box"',
		  	    submitHandler: function(form) {
					jQuery(form).ajaxSubmit({
				        beforeSubmit:  passConfirmation,  // pre-submit callback 
					});
				},
		  	  });
		    
		    jQuery("#user-pass  .form-text").rules("add", {
			 	 notEqual: "Enter E-maill Address",
			     email: true,
			     remote: {
			  		   url: base_path + "?q=fm_users/email-verify/1",
			  		   type: "post",
			  	 },
			     messages: { 
			           remote: jQuery.format('E-mail registered already.')
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
		  		   url: base_path + "?q=fm_users/email-verify/0",
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
	  
	  

		//Disable The "Buy It Button
	  /*if(!user_status) {
		jQuery('#commerce-cart-add-to-cart-form #edit-submit').click(function() {
			fmForceRegister();
			fmClearRegisterTimeout();
		    return false;
		});
	  }*/

});

function regFormSuccess(responseText, statusText, xhr, $form) {
	formSuccess();
	jQuery('.state2 .box').hide();
	jQuery('.state2 .box').html(responseText);
	
	if ( jQuery.browser.msie ) {
		jQuery('.state2 .box').show();
	} else {
		jQuery('.state2 .box').fadeIn('slow');
	}
	
	//Track the Registration Conversion in Google Web Optimizer. JS Code in Configuration
	fmWebOptimizerDoGoal();
	
}

function regSlideConfirmation() {
	if ( jQuery.browser.msie ) {
		jQuery('.state1').hide();
		jQuery('.state2').show();
	} else {
         jQuery('.state1').fadeOut('fast', function(){
			  jQuery('.state2').fadeIn('slow');
		});
	}
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

function passConfirmation() {
	jQuery('.pass-form').hide();
	jQuery('.pass-text').show();
	jQuery('.backSignup').hide();
}


/*
 * Show Register
 */
function fmFadeRegisterBlock() {
	
   jQuery('#cboxOverlay').fadeTo(1000, .75, function() {
   });

   if ( jQuery.browser.msie ) {
    	setTimeout("jQuery('#" + regBlockId + "').show();",700);	
    } else {
    	setTimeout("jQuery('#" + regBlockId + "').fadeIn(1000);",700);	
    }	
   
   
}


function fmClearRegisterTimeout() {
	clearTimeout(forceRegisterTimeout);
}

function fmShowLogin(){
	jQuery('.pass-form').show();
	jQuery('.pass-text').hide();
	
	if ( jQuery.browser.msie ) {
		jQuery('.state1').hide();
		jQuery('.state3').show();
	} else {
        jQuery('.state1').fadeOut('slow', function(){
			  jQuery('.state3').fadeIn('slow');
		});
	}
}
function fmShowSignup(){
	if ( jQuery.browser.msie ) {
		jQuery('.state3').hide();
		jQuery('.state1').show();
	} else {
        jQuery('.state3').fadeOut('slow', function(){
			  jQuery('.state1').fadeIn('slow');
		});
	}
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

