/**
 * 
 */

/* Share functions */
function fm_deals_facebookshare( url, thumb_path, description, name, message) {
	 FB.ui({
       method: 'send',
	   app_id: Drupal.settings.fb.fb_init_settings.appId,
	   name: name,
	   link: url,
	   picture: thumb_path,
	   description: description,
	   message: message
	  },
	  function(response) {
      }
    );
}

jQuery(document).ready(function() {
  /*Disable The "RemindMe" Button */
  if(jQuery('.notify a.alert').length) {
    if(notify_show_register) {
	  jQuery('.notify a.alert').unbind('click');
	  jQuery('.notify a.alert').click(function() {
		fmUserStateRestart(); 
		jQuery('.state1').show();
		fmForceRegister();
		fmClearRegisterTimeout();
	    return false;
	  });
    }
  }
});

/**
 *  Javascript Tools to handle Forms in FAdmashion 
 */

var WindowHasFocus = false;
jQuery(document).ready(function() {
	
	//dealTitleNotify();
});

function dealExpired() {
  window.location = Drupal.settings.basePath;	
}

function dealTitleNotify() {
	if(newTitle == null) {
		newTitle = 'test';
	}
	if(!document.hasFocus()) {
	  jQuery.titleAlert(newTitle, {
	     interval:900,
	     requireBlur: true
	  });
	}
}



