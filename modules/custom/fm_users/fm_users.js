/**
 * 
 */

jQuery(document).ready(function() {
 
	//Call the main AJAXY functionality for registration and login workflow
  //fmConfigRegAjaxy();
	
  jQuery('.password-strength').prepend('<div class="password-min">5-14 characters</div>');
 
  jQuery('.form-type-password-confirm .description ').html('');
 
  
  //Validate User Login page
  if(jQuery('#user-login-form').length) {
   
	  //Do Password Clear Defaults
	  fmPasswordClearDefaults(jQuery("#user-login-form #edit-pass"), 
			  jQuery("#user-login-form #edit-pass-clear"));
	  
    jQuery('#user-login-form').validate({
    	errorClass: 'invalid',
  	    onkeyup: false,
  	    wrapper: 'div id="message_box"',
     });
  
    jQuery("#user-login-form #edit-name").rules("add", {
 	   notEqual: "Email"
     });
    jQuery("#user-login-form #edit-pass").rules("add", {
  	   remote: {
  		   url: base_path + "?q=fm_users/auth",
  		   type: "post",
  		   data: {username: function(){return  jQuery("#user-login-form #edit-name").val(); }}
  	   },
       messages: { 
           remote: jQuery.format("Wrong password")
       },
    
  	 });
   }
   //End Login VAlidate
  
  //Validate Registration page
  if(jQuery('#user-register-form').length) {
   
    jQuery('#user-register-form').validate({
    	errorClass: 'invalid',
  	    onkeyup: false,
  	    wrapper: 'div id="message_box"',
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
	           remote: jQuery.format('E-mail registered already.  <div><a href="#">Forgot your Password?</a></div>')
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

/* Ajaxy content for Login-Registration Pages
function fmConfigRegAjaxy() {
(function($){
    var $body = $(document.body),
         $menu = $('#menu'),
         $content = $('#content'),
         $current = $('#current');
       
     $.Ajaxy.configure({
    	 'method': 'get',
         'Controllers': {
             '_generic': {
                 request: function(){
                     // Loading
                     $body.prepend('<div id="current"></div>');
                     $current = $('#current');
                     // Done
                     return true;
                 },
                 response: function(){
                     // Prepare
                     var Ajaxy = $.Ajaxy; var data = this.State.Response.data; var state = this.state||'unknown';
                     // Title
                     var title = data.title||false; // if we have a title in the response JSON
                     if ( !title && this.state||false ) title = 'jQuery Ajaxy - '+this.state; // if not use the state as the title
                     if ( title ) document.title = title; // if we have a new title use it
                     // Loaded
                     $current.text('response: Our current state is: ['+state+']');
                     // Return true
                     return true;
                 },
                 error: function(){
                     // Prepare
                     var Ajaxy = $.Ajaxy; var data = this.State.Error.data||this.State.Response.data; var state = this.state||'unknown';
                     // Error
                     var error = data.error||data.responseText||'Unknown Error.';
                     var error_message = data.content||error;
                     // Log what is happening
                     window.console.error('$.Ajaxy.Controllers._generic.error', [this, arguments], error_message);
                     // Loaded
                     $body.removeClass('loading');
                     // Display State
                     $current.text('error: Our current state is: ['+state+']');
                     // Done
                     return true;
                 }
             },
	        }
	     });
})(jQuery);
}*/


	     // All don})(jQuery);
	 // Back to global scope

