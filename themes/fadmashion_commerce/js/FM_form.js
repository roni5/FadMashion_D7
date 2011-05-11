/**
 *  Javascript Tools to handle Forms in FAdmashion 
 */

jQuery(document).ready(function() {
	clearAllForms();
});

/*
 * Code for clearing defaults in forms
 */
function clearAllForms() {
  //Call the Form clear and restore
  jQuery("input.clear-defaults").cleardefault();
};

jQuery.fn.cleardefault = function() {
    return this.focus(function() {
	if( this.value == this.defaultValue ) {
		this.value = "";
	}
}).blur(function() {
	if( !this.value.length ) {
		this.value = this.defaultValue;
	}
});
};

(function ($) {
	Drupal.behaviors.addClearForms = {
	  attach: function (context, settings) {
	    if (!$.isFunction($.colorbox)) {
	      return;
	    }
	    clearAllForms();
	  }
	};
})(jQuery);


/*
 * Functions to add AJAX loaders and submit
 */
//Show a loader
function formPreLoader(formData, jqForm, options) {
	jQuery('.ajax-button').after('<div id="submitLoader"></div>');
}
function formSuccess(responseText, statusText, xhr, $form)  {
	jQuery('#submitLoader').remove();
}




