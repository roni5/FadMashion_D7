/**
 * 
 */

jQuery(document).ready(function() {
	 
	 jQuery('#fm-commerce-express-checkout-form').validate({
	    	errorClass: 'invalid',
	    	onkeyup: false,
	    	wrapper: 'div class="message_box"',
	    	submitHandler: function(form) {
	    	    var $this = jQuery('input#edit-complete-purchase');
	    	    $this.attr('disabled', true);
	    	    $this.attr('value', 'Purchasing...');
	    		
	    		form.submit();
			},
	 });
});