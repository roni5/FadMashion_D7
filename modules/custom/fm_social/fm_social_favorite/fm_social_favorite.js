/**
 * Favorites Frontend AJAX functionality
 * TODO:  Eventually replace with Backbone.js Event & Bind.  
 */

(function ($) {
	Drupal.behaviors.socialFavorites = {
	  attach: function (context, settings) {
		  
		  jQuery('.my_favorites li a').address();
		  
		  jQuery('.my_favorites_containter .close').once('init-closed-processed').click(function (e){
			  jQuery('.my_favorites_containter').slideToggle('5000', function() {
				  jQuery('.my_favorites_link').fadeIn();
			  });
		  });
		  jQuery('.my_favorites_link a').once('init-open-processed').click(function (e){
			  e.preventDefault();
			  jQuery('.my_favorites_link').fadeOut('slow');
				  jQuery('.my_favorites_containter').slideToggle('5000');
		  });
		  
		  jQuery(".favorite_button").once('init-social-favorites-processed').click(function (e){
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
