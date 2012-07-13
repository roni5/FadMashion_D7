/**
 * Favorites Frontend AJAX functionality
 * TODO:  Eventually replace with Backbone.js Event & Bind.  
 */

jQuery(document).ready(function() {

	jQuery('.my_favorites_link').once('init-open-processed').click(function (e){
		  /*e.preventDefault();
		  
		  jQuery('.my_favorites_list ul').toggle();
		  
		  if(jQuery('.my_favorites_link').hasClass('collapsed')) {
		    jQuery('.my_favorites_link').removeClass('collapsed');
		  } 
			  
		  jQuery('.my_favorites_list').slideToggle('5000', function() {
			  if(!jQuery('.my_favorites_link').hasClass('collapsed') && !jQuery('.my_favorites_list').is(':visible')) {
					  jQuery('.my_favorites_link').addClass('collapsed'); 
			  }
			  
		  });*/

		  if(jQuery('.my_favorites li').length) {
				jQuery('#zero_favorites').hide();
		 } else {
			 jQuery('#zero_favorites').show();
		 }
	  });
	  
	
	  if(jQuery('.my_favorites li').length) {
		jQuery('#zero_favorites').hide();
		jQuery(".my_favorites_link").trigger('click');
	 } else {
		 jQuery('#zero_favorites').show();
	 }
	  

	  if(jQuery('.page-shop').length) {
	    jQuery('.my_favorites li a').address();
	  }
	  
});


(function ($) {
	Drupal.behaviors.socialFavorites = {
	  attach: function (context, settings) {
		  
		  
		  
		  jQuery('.itemLoved a').once('init-link-processed').click(function (e){
			  jQuery("html, body").animate({ scrollTop: 0 }, 'slow', "easeOutCubic");
		  });
		  
		  jQuery(".favorite_button").once('init-social-favorites-processed').click(function (e){
			  
				e.preventDefault();
				var href_val = jQuery(this).attr('href');
				var product_id = jQuery(this).attr('id');
				var imgObj = jQuery('img', jQuery(this));
				var alt, imgObj, imgSrc;
				
				//Change the "love" button to the alternate state
				jQuery('.favorite_button').each(function() {
					if(jQuery(this).attr('id') == product_id) {	
				     imgObj = jQuery('img', jQuery(this));
	                 alt = imgObj.attr('alt');
	                 imgSrc = imgObj.attr('src');
	                 imgObj.attr('alt', imgSrc);
	                 imgObj.attr('src', alt);
				   }
				});
				
				jQuery.ajax({
					type: "POST", 
					url: href_val,
					beforeSend: function() {
						
		            	 if(alt.indexOf("love_on") != -1) {
		            	   //Add Placeholder for image thumb
		            		if(!jQuery('.my_favorites_list').is(':visible')) {
		            		 jQuery(".my_favorites_link").trigger('click');
		            		}
		            	   jQuery('.my_favorites').prepend('<li class="empty_thumb"></li>');
		            	 }
		            	 
		            	 if(jQuery('.my_favorites li').length) {
								jQuery('#zero_favorites').hide();
						 }
					},
					success: function(data){  
						if(data.deleteAction) {
							jQuery('#my_favorites_product_id_' + data.product_id).fadeOut(function() {
								jQuery(this).remove();
								if(!jQuery('.my_favorites li').length && jQuery('.my_favorites').is(':visible')) {
									jQuery('.footer_tabs_closes').trigger('click');
								}
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

function save_for_later(varThis) {
	alt = jQuery('img', varThis).attr('alt');
	if(alt.indexOf("love_on") != -1) {
 	   //Add Placeholder for image thumb
		return 'Save for Later';
	} else {
		return '';
	}
}
