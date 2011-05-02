/**
 * 
 */

function fm_invite_facebookshare() {
	 FB.ui(
			   {
			     method: 'feed',
			     app_id: '213872101957329',
			     name: 'Facebook Dialogs',
			     link: 'http://www.fadmashion.com/',
			     picture: 'http://fbrell.com/f8.jpg',
			     caption: 'Reference Documentation',
			     description: 'Dialogs provide a simple, consistent interface for applications to interface with users.',
			     message: 'Facebook Dialogs are easy!'
			   },
			   function(response) {
				     if (response && response.post_id) {
				       alert('Post was published.');
				     } else {
				       alert('Post was not published.');
				     }
				   }
			 );

}