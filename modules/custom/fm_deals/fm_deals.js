/**
 * 
 */

/* Share functions */
function fm_deals_facebookshare( url, thumb_path, description, name, message) {
	 FB.ui({
       method: 'feed',
	   app_id: '213872101957329',
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



