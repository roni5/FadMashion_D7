/**
 * 
 */


/**
 * Submit Invitation E-mail form
 */
(function ($) {

Drupal.behaviors.addFMOrderSupportForm= {
  attach: function (context, settings) {
    if (!$.isFunction($.colorbox)) {
      return;
    }
    if(!jQuery('#fm-commerce-orders-support-form').length) {
    	return;
    }
    
    jQuery('#fm-commerce-orders-support-form').validate({
    	errorClass: 'invalid',
    	onkeyup: false,
    	wrapper: 'div id="message_box"',
    	submitHandler: function(form) {
			jQuery(form).ajaxSubmit({
		        beforeSubmit:  formPreLoader,  // pre-submit callback 
		        success:       supportFormSuccess  // post-submit callback 
			});
		},
		
		//showErrors: showErrorsColorbox
    });
    
    $("#fm-commerce-orders-support-form #edit-message").rules("add", {
   	  minlength: 10,
    });
   
  } 
};

})(jQuery);

function supportFormSuccess(responseText, statusText, xhr, $form) {
	
	formSuccess();
	jQuery('.support-form').before('<div id="support-success-message">Thank You! An E-mail Has been Sent to our Customer Service Team - we\'ll be in touch!</span>');
	
}