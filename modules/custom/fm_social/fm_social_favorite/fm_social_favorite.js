/**
 * Favorites Frontend AJAX functionality
 * TODO:  Eventually replace with Backbone.js Event & Bind.  
 */

(function ($) {
	Drupal.behaviors.socialFavorites = {
	  attach: function (context, settings) {
		  
		  jQuery(".social_favorites a").once('init-social-favorites-processed').click(function (e){
				e.preventDefault();
				var href_val = jQuery(this).attr('href');
				var product_id = jQuery(this).attr('id');
				var imgObj = jQuery('img', jQuery(this));
				
				jQuery.ajax({
					type: "POST", 
					url: href_val,
					beforeSend: function() {
		            	 var alt = imgObj.attr('alt');
		            	 var imgSrc = imgObj.attr('src');
		            	 imgObj.attr('alt', imgSrc);
		            	 imgObj.attr('src', alt);
					},
					success: function(data){  
						
					},
					error: function() {
						
					}  
				});
			});
	  }
	};
})(jQuery);
