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
		        beforeSubmit:  inviteEmailPreLoader,  // pre-submit callback 
		        success:       inviteEmailSuccess  // post-submit callback 
			});
		},
		
		//Copied from Source files defaultShowErrors function. Added Colorbox functionality --START
		showErrors: function() {
			for ( var i = 0; this.errorList[i]; i++ ) {
				var error = this.errorList[i];
				this.settings.highlight && this.settings.highlight.call( this, error.element, this.settings.errorClass, this.settings.validClass );
				
				//ADDED Colorbox functionality
				var resizeColorbox = false;
				var errlabel = this.errorsFor( error.element );
				if(!errlabel.length) {
					resizeColorbox = true;
				}
				
				this.showLabel( error.element, error.message );
				
				if(resizeColorbox) {
					jQuery.colorbox.resize();
				}
			}
			if( this.errorList.length ) {
				this.toShow = this.toShow.add( this.containers );
			}
			
			if (this.settings.success) {
				for ( var i = 0; this.successList[i]; i++ ) {
					this.showLabel( this.successList[i] );
				}
			}
			if (this.settings.unhighlight) {
				for ( var i = 0, elements = this.validElements(); elements[i]; i++ ) {
					this.settings.unhighlight.call( this, elements[i], this.settings.errorClass, this.settings.validClass );
				}
			}
			this.toHide = this.toHide.not( this.toShow );
			this.hideErrors();
			this.addWrapper( this.toShow ).show();
		},
		//END OF COPY

		
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

//Show a loader
function inviteEmailPreLoader() {
	jQuery.colorbox({inline:true, href:"#submittingEmail"});
	
}
function inviteEmailSuccess() {
	jQuery.colorbox({inline:true, href:"#confirmedEmail"});
}
