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

