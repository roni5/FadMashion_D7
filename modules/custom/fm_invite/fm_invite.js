/*
 * E-mail gathering form - Add e-mail jquery validation


//TODO: use jquery validate on e-mail signup form
(function ($) {

Drupal.behaviors.addFMRequestEmail= {
  attach: function (context, settings) {
    if(!jQuery('#fm-invite-request-form').length) {
    	return;
    }
    
    jQuery('#fm-invite-request-form').validate({
    	errorClass: 'invalid',
    	onkeyup: false,
    	wrapper: 'div id="message_box"',
    });
    
    $("#fm-invite-request-form #edit-mail").rules("add", {
    	 minlength: 2,
    	 email: true
    });
  } 
};

})(jQuery);
 */

jQuery(document).ready(function() {
  /*if (document.cookie.indexOf('visited=true') === -1) {
      var expires = new Date();
      expires.setDate(expires.getDate()+30);
      document.cookie = "visited=true; expires="+expires.toUTCString();
 
      jQuery.colorbox({title:'Invite Friends and Earn Rewards', href:"/invite/rewards?id=" + invite_id, width: 600, height: 450});
  }*/
});

/**
 * Submit Invitation E-mail form
 */
(function ($) {

Drupal.behaviors.addFMInviteSendEmail= {
  attach: function (context, settings) {
    if (!$.isFunction($.colorbox)) {
      return;
    }
    if(!jQuery('#fm-invite-send-email-form').length) {
    	return;
    }
    
    //Add Multi-email validation to jQuery Validate plugin
    jQuery.validator.addMethod("multiemail", function(value, element) {
        if (this.optional(element)) {
            return true;
        }
        var emails = value.split(new RegExp( "\\s*,\\s*", "gi" ));
        valid = true;
        for(var i in emails) {
            value = emails[i];
            if(value.length > 0) {
            	valid=valid && jQuery.validator.methods.email.call(this, value,element);
            }
        }
        return valid;}, "Oops! One of the e-mails is not valid"
    );
    
    jQuery('#fm-invite-send-email-form').validate({
    	errorClass: 'invalid',
    	onkeyup: false,
    	wrapper: 'div id="message_box"',
    	submitHandler: function(form) {
			jQuery(form).ajaxSubmit({
		        beforeSubmit:  formPreLoader,  // pre-submit callback 
		        success:       inviteFormSuccess  // post-submit callback 
			});
		},
		
		//Copied from Source files defaultShowErrors function. Added Colorbox functionality --START
		showErrors: showErrorsColorbox
    });
    
    $("#fm-invite-send-email-form #edit-message").rules("add", {
    	 minlength: 10
    });
    $("#fm-invite-send-email-form  #edit-to").rules("add", {
    	multiemail: true,
   });
    
  } 
};

})(jQuery);


function inviteFormSuccess(responseText, statusText, xhr, $form) {
	formSuccess();
	jQuery('#cboxTitle').html('<span style="font-size: 16px; color: #1D1C1A">Thank You! Your e-mail has been sent.</span>');
	jQuery('#cboxLoadedContent').html('<div></div>');
	jQuery.colorbox.resize();
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
			     message: 'Just joined FadMashion for up to 60% off Independent Designs! Check it out and share your own link so we can both earn Social Shopping Rewards.'
			   },
			   function(response) {
			   }
			 );

}



