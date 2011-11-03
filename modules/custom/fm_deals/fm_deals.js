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
	
	dealTitleNotify();
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


/**
 * get the time from server
 */
function serverSync() {
  var time = null;
  // try to get the servertime, if false we provide the current client time..
  jQuery.ajax({
    url: Drupal.settings.basePath + 'jquery_countdown/serversync',
    async: false,
    dataType: 'text',
    success: function(text) {
      time = new Date(text);
    },
    error: function(http, message, exc) {
      time = new Date();
    }
  });
  return time;
};

