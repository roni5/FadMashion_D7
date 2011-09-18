/**
 * 
 */

/* Share functions */
function fm_deals_facebookshare( url, thumb_path) {
	 FB.ui({
       method: 'feed',
	   app_id: '213872101957329',
	   name: 'Here\'s the Deal....',
	   link: url,
	   picture: thumb_path,
	   description: 'Fadmashion offers Independent fashion designs at up to %60 off retail price with fresh new deals every hour!  Request an invitation today and get your own social rewards link to invite friends and earn priority access',
	   message: 'Just joined FadMashion for up to 60% off Independent Designs! .'
	  },
	  function(response) {
      }
    );
}

