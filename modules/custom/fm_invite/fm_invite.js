/**
 * 
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
	jQuery('#cboxTitle').html('Thank You! Your e-mail has been sent.');
	jQuery('#cboxLoadedContent').html('<div></div>');
	jQuery.colorbox.resize();
}


