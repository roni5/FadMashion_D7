/**
 * 
 * EXPRESS CHECKout FORM VALIDATION AND JS
 * 
 */

jQuery(document).ready(function() {
	
	 jQuery('#fm-commerce-express-checkout-form').validate({
	    	errorClass: 'invalid',
	    	onkeyup: false,
	    	wrapper: 'div class="message_box"',
	 });
	 
	 addBillingCheckedEvents();
	 if(!jQuery('#edit-billing-info').hasClass("checked")) {
		 billingCheckedEvent();
	 }
});

function addBillingCheckedEvents() {
  var box = jQuery('#edit-billing-info');
  
  box.change(function () {
	if(!jQuery(this).hasClass("checked")) {
		
		billingUnCheckedEvent()
		jQuery(this).addClass("checked");
		return;
    }
	billingCheckedEvent();
	jQuery(this).removeClass('checked');
	
  });

}

var address1 = jQuery('#shipping #edit-field-shipping-address-und-0-thoroughfare');
var address1_bill = jQuery('.billingAddress #edit-commerce-customer-address-und-0-thoroughfare');

var address2 = jQuery('#shipping #edit-field-shipping-address-und-0-premise');
var address2_bill = jQuery('.billingAddress #edit-commerce-customer-address-und-0-premise');

var city = jQuery('#shipping #edit-field-shipping-address-und-0-locality');
var city_bill = jQuery('.billingAddress #edit-commerce-customer-address-und-0-locality');

var state = jQuery('#shipping #edit-field-shipping-address-und-0-administrative-area');
var state_bill = jQuery('.billingAddress #edit-commerce-customer-address-und-0-administrative-area');

var zip = jQuery('#shipping #edit-field-shipping-address-und-0-postal-code');
var zip_bill = jQuery('.billingAddress #edit-commerce-customer-address-und-0-postal-code');


function billingCheckedEvent() {
	jQuery('.billingAddress .form-text, .billingAddress .form-select').each(function(index) {
		  jQuery(this).attr( 'disabled', 'disabled' );
	  });
	
	//ADD individual form events to attach to shipping fields
	address1_bill.val(address1.val());
	address1.keyup (function() {
		address1_bill.val(jQuery(this).val());
	});
	address2_bill.val(address2.val());
	address2.keyup (function() {
		address2_bill.val(jQuery(this).val());
	});
	city_bill.val(city.val());
	city.keyup (function() {
		city_bill.val(jQuery(this).val());
	});
	state_bill.val(state.val());
	state.keyup (function() {
		state_bill.val(jQuery(this).val());
	});
	zip_bill.val(zip.val());
	zip.keyup (function() {
		zip_bill.val(jQuery(this).val());
	});

}

function billingUnCheckedEvent() {
	jQuery('.billingAddress .form-text, .billingAddress .form-select').each(function(index) {
		  jQuery(this).attr( 'disabled', '' );
	});
	address1.unbind("keyup");
	address2.unbind("keyup");
	city.unbind("keyup");
	state.unbind("keyup");
	zip.unbind("keyup");

}
