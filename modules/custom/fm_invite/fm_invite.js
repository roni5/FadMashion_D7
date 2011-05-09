/**
 * 
 */
(function ($) {

Drupal.behaviors.addFMEmailInviteValidation = {
  attach: function (context, settings) {
    if (!$.isFunction($.colorbox)) {
      return;
    }
    if(!jQuery('#fm-invite-send-email-form').length) {
    	return;
    }
    jQuery.validator.addMethod("multiemail", function(value, element) {
        if (this.optional(element)) {
            return true;
        }
        var emails = value.split(new RegExp( "\\s*;\\s*", "gi" ));
        valid = true;
        for(var i in emails) {
            value = emails[i];
            valid=valid && jQuery.validator.methods.email.call(this, value,element);
        }
        return valid;}, "Invalid email format");
    
    jQuery('#fm-invite-send-email-form').validate({
    	errorClass:'invalid', 
    	wrapper: 'div id="message_box"',
    	submitHandler: function(form) {
			jQuery(form).ajaxSubmit({
				target: "#result"
			});
		}
    });
    
    $("#edit-message").rules("add", {
    	 minlength: 2
    });
    $("#edit-to").rules("add", {
    	multiemail: true,
   });
    
  } 
};

})(jQuery);


