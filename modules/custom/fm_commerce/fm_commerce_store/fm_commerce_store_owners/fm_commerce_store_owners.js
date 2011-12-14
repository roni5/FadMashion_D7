/**
 * 
 */
/**
 * Paypal Email Validation form
 */
(function ($) {

Drupal.behaviors.addFMPaymentEmailForm= {
  attach: function (context, settings) {
    if (!$.isFunction($.colorbox)) {
      return;
    }
    if(!jQuery('#fm-commerce-store-owners-admin-form').length) {
    	return;
    }
    

    jQuery('#fm-commerce-store-owners-admin-form').validate({
    	errorLabelContainer: ".error_container",
    	wrapper: "div",
    	errorClass: 'invalid',
    	onkeyup: false,
    	wrapper: 'div id="message_box"',
    	submitHandler: function(form) {
			jQuery(form).ajaxSubmit({
		        beforeSubmit:  paymentEmailFormPreLoader,  // pre-submit callback 
		        success:       paymentEmailFormSuccess  // post-submit callback 
			});
		},
		
		//Copied from Source files defaultShowErrors function. Added Colorbox functionality --START
		//showErrors: showErrorsColorbox
    });
    
    $("#fm-commerce-store-owners-admin-form #edit-mail").rules("add", {
    	 required: true, 
    	 email: true
    });
    
    var needsAction = jQuery('#orders-list .needs-action').length;
    if(needsAction && !jQuery('.action-alert').length) {
    	jQuery('#orders-list').before('<div class="action-alert needs-action">' + needsAction + ' Orders Require your Immediate Attention.</div>');
    	jQuery.colorbox.resize();
    }
    
  } 
};

})(jQuery);

function paymentEmailFormPreLoader(formData, jqForm, options) {
	var button = jQuery('#fm-commerce-store-owners-admin-form .form-submit');
	button.attr('disabled', true);
	button.attr('value', 'Saving...');
}

function paymentEmailFormSuccess(responseText, statusText, xhr, $form) {
	formSuccess();
	var button = jQuery('#fm-commerce-store-owners-admin-form .form-submit');
	button.attr('disabled', false);
	button.attr('value', 'Saved');
	
}
