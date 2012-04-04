/**
 * Javascript Tools to handle Forms in FAdmashion 
 */

jQuery(document).ready(function() {
	
	//ADD deep linking, 
	 jQuery.address.crawlable(true).init(function(event) {

         // Initializes plugin support for links
		 jQuery('.page-shop .col2 .designerPanel a, .page-shop .col1 a').address();


     })
     .change(function(event) {

         // Identifies the page selection
    	 var type, id;
    	 var store_id;
    	 if(event.parameters.store_id) {
    		 store_id = event.parameters.store_id;
    		 type = 'node';
    		 
    		 jQuery('.page-shop .col1 a').each(function() {
    			 if (jQuery(this).attr('id') == store_id) {
 			    jQuery(this).addClass('active').focus();
               } else {
             	jQuery(this).removeClass('active');
               }
             });
    	 } else {
    		 store_id = '';
    	 }
    	 
    	 id = 'empty';
    	 if(event.parameters.nid) {
    		 type = 'node';
    		 id = event.parameters.nid;
    	 }
    	 
    	 if((!event.parameters.nid  && !event.parameters.store_id) ) {
           type = 'all';
           id = 'all';
        	 jQuery('.page-shop .col1 a').each(function() {
    			 if (jQuery(this).attr('id') == 'all') {
 			    jQuery(this).addClass('active').focus();
               } else {
             	jQuery(this).removeClass('active');
               }
             });
    	 }
    	 
    	//Set Cache Class name to retrieve/store from
     	var cacheId, cacheType;
     	if(id != 'empty') {
     		cacheId = id;
     		cacheType = 'node';
     	} else {
     		cacheId = store_id;
     		cacheType = 'store';
     	}
     	var cacheClass = cacheType + '_' + cacheId ;

         
         var q = '/';
         var qParam = '?';
         if(event.parameters.q) {
        	  q = '?q=shop/';
        	  qParam = '&';
         }

         var dataPage;
         jQuery('#collection_store_' + store_id).addClass('test');
         if(!jQuery('#collection_store_' + store_id).length) {
        	 dataPage = jQuery('.page-shop .col2 .pad');
         } else {
        	 dataPage = jQuery('.page-shop .col2 .pad .product_content');
        	 store_id = '';
         }


         var handler = function(data, newContent) {
        	jQuery('.shopAjaxLoader').fadeOut();
        	
        	if(newContent) {
        	  dataPage.hide();
        	  dataPage.html(data);
        	  dataPage.fadeTo('slow', 1);
        	} else {
        	  dataPage.fadeOut('slow', function() {
        		  dataPage.html(data);
            	  dataPage.fadeTo('slow', 1);
        	  });
        	}
        	
        	var newClass;
        	
        	if(!jQuery('#cache .' + cacheClass).length) {
        	  newClass =  '<div class="' + cacheClass + '"></div>';
              jQuery('#cache').prepend(newClass);
              jQuery('#cache .' + cacheClass).html(data);
        	}
        	
        	
        	
        	Drupal.attachBehaviors();
        	
        	jQuery('.quoteClose .field-items').textfill({ maxFontPixels: 22, innerTag: 'div' }); 
    		
         	//add Address functionality to the collection viewer thumbnails
         	//first, select the 
           	jQuery('ul.ad-thumb-list li a').each(function() {
    		  if (jQuery(this).attr('id') == id) {
    			 jQuery(this).trigger('click', [true]);
    		  }
            });

            jQuery('.ad-nav .ad-thumbs li a').address();
         };


         // Loads the page content and inserts it into the content area
         if(!jQuery('#cache .' + cacheClass).length) { 
           jQuery.ajax({
             url: location.pathname + q + 'ajax/' + type + '/' + id + qParam + 'store_id=' + store_id,
             beforeSend: function() {
            	 jQuery("html, body").animate({ scrollTop: 0 }, "slow");
                 jQuery('.shopAjaxLoader').show();
                 dataPage.fadeTo('fast', .33);
              },

             error: function(XMLHttpRequest, textStatus, errorThrown) {
                 handler(XMLHttpRequest.responseText);
             },
             success: function(data, textStatus, XMLHttpRequest) {
                 handler(data, true);
             }
           });
         } else {
             
        	 var data = jQuery('#cache .' + cacheClass).html();
        	 handler(data, false);
         }
         
         
         
     });
 });

(function ($) {
	Drupal.behaviors.addCapSlide = {
	  attach: function (context, settings) {
		  if(!jQuery(".designerPanel").length) {
		    	return;
		  }
		  
		  jQuery(".capslide_img_cont").capslide({
                caption_color	: 'white',
                caption_bgcolor	: 'black',
                overlay_bgcolor : 'black',
                border			: '',
                showcaption	    : false
            });
       	
       	
       	
	  }
	};
})(jQuery);

(function ($) {
	Drupal.behaviors.collectionViewer = {
	  attach: function (context, settings) {
		 if(!jQuery("#gallery").length) {
		   return;
		 }
		 /*
		 var thumbs_wrapper = jQuery("#gallery");
		 jQuery('.ad-thumb-list img').each(function() {
	       	   
	       		jQuery(this).click(
	       	            function() {
	       	            	jQuery(this).addClass('active');
	       	            	thumbs_wrapper.find('.ad-active').removeClass('ad-active');
	       	            }
	       	     ).hover(
		            function() {
		              if(!jQuery(this).is('.ad-active') ) {
		            	  jQuery(this).find('img').fadeTo(300, 1);
		              };
		              context.preloadImage(i);
		            },
		            function() {
		              if(!jQuery(this).is('.ad-active')) {
		            	  jQuery(this).find('img').fadeTo(300, .7);
		              };
		            }
		         );
		 
		 });
		 */
		 
		 
       	jQuery('.ad-thumb-list img').each(function() {
       		var src = jQuery(this).attr('src');
       		var parentLink = jQuery(this).parent('a');
       		//parentLink.attr('href', src);
       	});
       	
       	var galleries = jQuery('.ad-gallery').adGallery();
       	
       	
	  }
	};
})(jQuery);
