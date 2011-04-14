/**
 * 
 */

jQuery(document).ready(function() {

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


//Call the Form clear and restore
jQuery("input.form-text").cleardefault();

});