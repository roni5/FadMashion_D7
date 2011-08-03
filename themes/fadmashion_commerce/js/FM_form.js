/**
 *  Javascript Tools to handle Forms in FAdmashion 
 */

jQuery(document).ready(function() {
	clearAllForms();
	
	if (!jQuery.isFunction(jQuery.validator)) {
	      return;
	}
	

	jQuery(".jumpList a").click(function (e){
	  var val = jQuery(this).attr('href');
	  jQuery.scrollTo('.' + val, 800);
	  return false;
	});

	
	//ADD validator for clear forms 
    jQuery.validator.addMethod("notEqual", function(value, element, param) {
	  return this.optional(element) || value !== param; alert('test');
	}, "This field is required");
});

/*
 * Code for clearing defaults in forms
 */
function clearAllForms() {
  //Call the Form clear and restore
  jQuery("input.clear-defaults").cleardefault();
  jQuery("textarea.clear-defaults").cleardefault();
  jQuery(".clear-defaults input").cleardefault();
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
 * Function to add Validate support with Colorbox
 */
function showErrorsColorbox() {
	//Copied from Source files defaultShowErrors function. Added Colorbox functionality --START
	
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
	//END OF COPY
}


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


function fmPasswordClearDefaults(actualPassword, fakePassword) {
	fakePassword.show();
	actualPassword.hide();
	fakePassword.focus(function() {
		fakePassword.hide();
		actualPassword.show();
		actualPassword.focus();
    });
	actualPassword.blur(function() {
		if(actualPassword.val() == '') {
			fakePassword.show();
		        actualPassword.hide();
		    }
		});
}




