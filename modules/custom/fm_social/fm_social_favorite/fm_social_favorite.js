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
		  
		  jQuery('.itemLoved a').once('init-link-processed').click(function (e){
			  jQuery("html, body").animate({ scrollTop: 0 }, 'slow', "easeOutCubic");
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
		            	 
		            	 if(alt.indexOf("love_on") != -1) {
		            	   //Add Placeholder for image thumb
		            	   jQuery('.my_favorites').prepend('<li class="empty_thumb"></li>');
		            	 }
					},
					success: function(data){  
						if(data.deleteAction) {
							jQuery('#my_favorites_product_id_' + data.product_id).fadeOut(function() {
								jQuery(this).remove();
							});
						} else {
                          var thumb = data.thumb;
					      jQuery('.my_favorites .empty_thumb').remove();
						  jQuery('.my_favorites').prepend(thumb);
						  jQuery('#my_favorites_product_id_' + data.product_id).hide();
						  jQuery('#my_favorites_product_id_' + data.product_id).fadeIn();
						  
						  jQuery('.my_favorites li a').address();
						}
					},
					error: function() {
						
					}  
				});
			});
		
	  }
	};
})(jQuery);
