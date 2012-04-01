/**
 * Javascript Tools to handle Forms in FAdmashion 
 */

jQuery(document).ready(function() {
	
	//ADD deep linking, 
	 jQuery.address.crawlable(true).init(function(event) {

         // Initializes plugin support for links
		 jQuery('.page-shop .col2 .designerPanel a, .page-shop .col1 a').address();


     }).change(function(event) {

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
           id = 'a';
        	 jQuery('.page-shop .col1 a').each(function() {
    			 if (jQuery(this).attr('id') == 'all') {
 			    jQuery(this).addClass('active').focus();
               } else {
             	jQuery(this).removeClass('active');
               }
             });
    	 }


         var handler = function(data, id) {
        	jQuery('.shopAjaxLoader').fadeOut();
        	jQuery('.page-shop .col2 .pad ').hide();
        	jQuery('.page-shop .col2 .pad ').html(data);
        	jQuery('.page-shop .col2 .pad ').fadeTo('slow', 1);

         	Drupal.attachBehaviors();
         	

         	//add Address functionality to the collection viewer thumbnails
         	//first, select the 
           	jQuery('ul.ad-thumb-list li a').each(function() {
    		  if (jQuery(this).attr('id') == id) {
    			 // jQuery(this).trigger('click', [true]);
    		  }
            });
         };
         
         var q = '/';
         var qParam = '?';
         if(event.parameters.q) {
        	  q = '?q=shop/';
        	  qParam = '&';
         }


         // Loads the page content and inserts it into the content area
         jQuery.ajax({
             url: location.pathname + q + 'ajax/' + type + '/' + id + qParam + 'store_id=' + store_id,
             beforeSend: function() {
            	 jQuery("html, body").animate({ scrollTop: 0 }, "slow");
                 jQuery('.shopAjaxLoader').show();
                 jQuery('.page-shop .col2 .pad').fadeTo('fast', .33);
              },

             error: function(XMLHttpRequest, textStatus, errorThrown) {
                 handler(XMLHttpRequest.responseText);
             },
             success: function(data, textStatus, XMLHttpRequest) {
                 handler(data, id);
             }
         });

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
		 if(jQuery("#gallery").length) {
		   return;
		 }

       	jQuery('.ad-thumb-list img').each(function() {
       		var src = jQuery(this).attr('src');
       		var parentLink = jQuery(this).parent('a');
       		parentLink.attr('href', src);
       	});
       	
       	var galleries = jQuery('.ad-gallery').adGallery();
       	
       	
	  }
	};
})(jQuery);
