/**
 * 
 * EXPRESS CHECKout FORM VALIDATION AND JS
 * 
 */


var first_name, last_name;
var address1, address1_bill;
var address2, address2_bill;
var city, city_bill;
var state, state_bill;
var zip, zip_bill;
var full_name, full_name_card, full_name_bill;

jQuery(document).ready(function() {
	 setCheckoutFormVariables();
	 
	 jQuery('#fm-commerce-express-checkout-form').validate({
	    	errorClass: 'invalid',
	    	onkeyup: false,
	    	wrapper: 'div class="message_box"',
	    	submitHandler: function(form) {
	    		billingUnCheckedEvent(false);
	    		
	    	    var $this = jQuery('input.form-submit');
	    	    $this.attr('disabled', true);
	    	    $this.attr('value', 'Continuing...');
	    		
	    		form.submit();
			},
	 });
	 
	if(jQuery('#about-you').length) {
	   jQuery("#edit-mail").rules("add", {
	       email: true,
	       remote: {
	  		     url: base_path + "?q=fm_users/email-verify/0",
	  		     type: "post",
	  	   },
	       messages: { 
	             remote: jQuery.format('E-mail registered already.')
	       },
	   });
	 
	   jQuery("#edit-pass-pass1").rules("add", {
	    	  minlength:5,
	    	  maxlength:14,
	  });
	  jQuery("#edit-pass-pass2").rules("add", {
		 	   equalTo: " #edit-pass-pass1",
		 	   messages: { equalTo: 'Password Doesn\'t match' }
	  });
	}
	
    if(isEdit) {
    	if(address1.val() != address1_bill.val()) {
    		jQuery('#edit-billing-info').attr("checked", false)
    	}
    } else {
    	addFullNameEvent();
    }
    
	 addBillingCheckedEvents();
	 if(jQuery('#edit-billing-info').attr("checked") == true) {
		billingCheckedEvent();
	 }
	 
	 
	 
	 //Right column follow
	 var cart = jQuery(".column2")
	 /*if(cart.length) {
	   cart.scrollFollow({
		 speed: 500,
		 offset: 20,
		 container: 'content'
	   });
	 }*/
	 
	 jQuery(".shipping_address_select").change(function() {
		 window.location.href = full_path + '?shipping=' + this.value;
	 });
});

function checkoutFormSuccess(responseText, statusText, xhr, $form) {
	formSuccess();
	jQuery('#cboxTitle').html('<span style="font-size: 16px; color: #1D1C1A">Thank You! Your e-mail has been sent.</span>');
	jQuery('#cboxLoadedContent').html('<div></div>');
	jQuery.colorbox.resize();
}

function setCheckoutFormVariables() {
	full_name = jQuery('#shipping #edit-field-shipping-address-und-0-name-line');
	full_name_bill = jQuery('#billing #edit-commerce-customer-address-und-0-name-line');
	full_name_card = jQuery('#billing #edit-credit-card-owner');
	 
	first_name = jQuery('#edit-first-name');
	last_name = jQuery('#edit-last-name');
	
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
	full_name.val(full_name_card.val());
	full_name_bill.val(full_name_card.val());
	
	full_name_card.keyup (function() {
		if(first_name.length) {
		  first_name.unbind("keyup");
		  last_name.unbind("keyup");
		}
		full_name.val(jQuery(this).val());
		full_name_bill.val(jQuery(this).val());
	});
	
	if(first_name.length) {
	  first_name.keyup(function() {
		full_name.val(first_name.val() + ' ' + last_name.val());
		full_name_card.val(first_name.val() + ' ' + last_name.val());
		full_name_bill.val(first_name.val() + ' ' + last_name.val());
	  });
	  last_name.keyup(function() {
		full_name.val(first_name.val() + ' ' + last_name.val());
		full_name_card.val(first_name.val() + ' ' + last_name.val());
		full_name_bill.val(first_name.val() + ' ' + last_name.val());
	  });
	}
	
}

function addBillingCheckedEvents() {
  var box = jQuery('#edit-billing-info');
  
  box.change(function () {
	if(jQuery(this).attr("checked") != true) {
		
		billingUnCheckedEvent(true);
		return;
    }
	billingCheckedEvent();
	
  });

}



function billingCheckedEvent() {
	jQuery('#shipping  .form-text, #shipping  .form-select').each(function(index) {
		  jQuery(this).attr( 'disabled', 'disabled' );
	  });
	
	//ADD individual form events to attach to shipping fields
	address1.val(address1_bill.val());
	address1_bill.keyup (function() {
		address1.val(jQuery(this).val());
	});
	address2.val(address2_bill.val());
	address2_bill.keyup (function() {
		address2.val(jQuery(this).val());
	});
	city.val(city_bill.val());
	city_bill.keyup (function() {
		city.val(jQuery(this).val());
	});
	state.val(state_bill.val());
	state_bill.change (function() {
		state.val(jQuery(this).val());
	});
	zip.val(zip_bill.val());
	zip_bill.keyup (function() {
		zip.val(jQuery(this).val());
	});

}

function billingUnCheckedEvent(clear) {
	jQuery('#shipping .form-text, #shipping .form-select').each(function(index) {
		  jQuery(this).attr( 'disabled', '' );
		  if(clear) {
			  jQuery(this).val('' );
		  }
	});
	address1_bill.unbind("keyup");
	address2_bill.unbind("keyup");
	city_bill.unbind("keyup");
	state_bill.unbind("change");
	zip_bill.unbind("keyup");

}
