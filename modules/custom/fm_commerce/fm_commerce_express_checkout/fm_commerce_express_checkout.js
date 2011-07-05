/**
 * 
 * EXPRESS CHECKout FORM VALIDATION AND JS
 * 
 */


var address1, address1_bill;
var address2, address2_bill;
var city, city_bill;
var state, state_bill;
var zip, zip_bill;
var full_name, full_name_bill;

jQuery(document).ready(function() {
	 setCheckoutFormVariables();
	 
	 jQuery('#fm-commerce-express-checkout-form').validate({
	    	errorClass: 'invalid',
	    	onkeyup: false,
	    	wrapper: 'div class="message_box"',
	 });
	 
	 addBillingCheckedEvents();
	 if(!jQuery('#edit-billing-info').hasClass("checked")) {
		 billingCheckedEvent();
	 }
	 
	 addFullNameEvent();
	 
	 jQuery('#block-fm-commerce-cart-fm-commerce-cart').scrollFollow({
		 speed: 500,
		 offset: 20,
		 container: 'content'
	 });
});

function setCheckoutFormVariables() {
	full_name = jQuery('#shipping #edit-field-shipping-address-und-0-name-line');
	full_name_bill = jQuery('#billing #edit-credit-card-owner');
	 
	 address1 = jQuery('#shipping #edit-field-shipping-address-und-0-thoroughfare');
	 address1_bill = jQuery('.billingAddress #edit-commerce-customer-address-und-0-thoroughfare');

	 address2 = jQuery('#shipping #edit-field-shipping-address-und-0-premise');
	 address2_bill = jQuery('.billingAddress #edit-commerce-customer-address-und-0-premise');

	 city = jQuery('#shipping #edit-field-shipping-address-und-0-locality');
	 city_bill = jQuery('.billingAddress #edit-commerce-customer-address-und-0-locality');

	 state = jQuery('#shipping #edit-field-shipping-address-und-0-administrative-area');
	 state_bill = jQuery('.billingAddress #edit-commerce-customer-address-und-0-administrative-area');

	 zip = jQuery('#shipping #edit-field-shipping-address-und-0-postal-code');
	 zip_bill = jQuery('.billingAddress #edit-commerce-customer-address-und-0-postal-code');
}

function addFullNameEvent() {
	full_name_bill.val(full_name.val());
	full_name.keyup (function() {
		full_name_bill.val(jQuery(this).val());
	});
	
	full_name_bill.keyup(function() {
		full_name.unbind("keyup");
	});
}

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
	state.change (function() {
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
	state.unbind("change");
	zip.unbind("keyup");

}
