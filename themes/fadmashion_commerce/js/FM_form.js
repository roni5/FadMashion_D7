/**
 * 
 */

jQuery(document).ready(function() {
	clearAllForms();
});

function clearAllForms() {
  //Call the Form clear and restore
  jQuery("input.form-text").cleardefault();
  jQuery("input.form-textarea").cleardefault();
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



