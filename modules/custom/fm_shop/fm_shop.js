/**
 * Javascript Tools to handle Forms in FAdmashion 
 */

//global variables for Drupal.behaviors functions
var contentSelector;

jQuery(document).ready(function() {
	
	//ADD deep linking, 
	 jQuery.address.crawlable(true).init(function(event) {

         // Initializes plugin support for links
		 jQuery('.page-shop .col2 .designerPanel a, .page-shop .col1 a').address();


     })
     .change(function(event) {

         // Identifies the page selection
    	 var type, id, nid;
    	 var store_id;
    	 if(event.parameters.store_id) {
    		 store_id = event.parameters.store_id;
    		 type = 'shop';
    		 
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
    	 
    	 if(event.parameters.nid) {
    		 nid = event.parameters.nid;
    	 } else {
    		 nid = '';
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
     	cacheType = 'store';
     	cacheId = store_id;
     	var cacheClass = 'store_' + store_id ;
     	
     	if(type == 'all') {
     		cacheClass = 'all';
     	}
     	

     	/*
     	 * Start of Handler function for data handling
     	 */
        var handler = function(data, newContent) {
          jQuery('.shopAjaxLoader').fadeOut();
         
          if(data != '') {
            dataPage.hide();
      	    dataPage.html(data);
          }

          
          if(nid == '') {
        	  nid = jQuery('ul.ad-thumb-list li a').first().attr('id');
          }
          
          var collectionPanels = jQuery('.col2 .product_content .collectionPanel');
          if(cacheClass != 'all') {
        	  if(nid == '') {
        		  var j = 0;
        		  collectionPanels.each(function() {
                    if(j == 0) {
                	  jQuery(this).show();
                	  j++;
                    } else {
                	  jQuery(this).hide();
                    }
               }); 
        	  } else{
        	  
        	  collectionPanels.each(function() {
          		if(jQuery(this).attr('id') == 'node_' + nid) {
          			jQuery(this).show();
          		} else {
          			jQuery(this).hide();
          		}
          	   });  
        	 }
           }
          
          if(newContent) {
        	dataPage.fadeTo('slow', 1);
          } else {
            dataPage.show();
          }
        	
          var newClass;
        	
          
        	
          Drupal.attachBehaviors();
          jQuery('.quoteClose .field-items').textfill({ maxFontPixels: 22, innerTag: 'div' }); 
          //add Address functionality to the collection viewer thumbnails
          //first, select the 
          jQuery('ul.ad-thumb-list li a').each(function() {
    		if (jQuery(this).attr('id') == nid) {
    	     jQuery(this).trigger('click', [true]);
    		}
          });
          jQuery('.ad-nav .ad-thumbs li a.thumb_link').address();
       };
         /*
    	 * End of Handler
    	 */


         var q = '/';
         var qParam = '?';
         if(event.parameters.q) {
        	  q = '?q=shop/';
        	  qParam = '&';
         }

         var dataPage;
         if(!jQuery('.col2 #collection_store_' + store_id).length) {
        	 dataPage = jQuery('.page-shop .col2 .pad');
         } else {
        	 dataPage = jQuery('.page-shop .col2 .pad .product_content');
         }
         
         var fullPath = '';
         if(location.pathname == '/') {
        	 fullPath = 'http://' + location.host + location.pathname + '/shop';
         } else {
        	 fullPath =  location.pathname ;
         }
         
         // Loads the page content and inserts it into the content area
         if(!jQuery('#cache .' + cacheClass).length) { 
           jQuery.ajax({
             url:  fullPath + q + 'ajax/' + type + qParam + 'store_id=' + store_id,
             beforeSend: function() {
            	 jQuery("html, body").animate({ scrollTop: 0 }, 'slow', "easeOutCubic");
                 jQuery('.shopAjaxLoader').show();
                 dataPage.fadeTo('fast', .33);
                
              },

             error: function(XMLHttpRequest, textStatus, errorThrown) {
                 handler(XMLHttpRequest.responseText);
             },
             success: function(data, textStatus, XMLHttpRequest) {
            	 
            	 //Add to Cache
                 if(!jQuery('#cache .' + cacheClass).length) {
               	   newClass =  '<div class="' + cacheClass + '"></div>';
                   jQuery('#cache').html(newClass);
                   jQuery('#cache .' + cacheClass).html(data);
                 }
                 
                 handler(data, true);
             }
           });
         } else {
        	 var data;
        	 if(!jQuery('.col2 #collection_store_' + store_id).length ) {
        		 data = jQuery('#cache .' + cacheClass).html();
        	 } else {
        		 data = '';
        	 }
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
       	var links = jQuery('.col2 .ad-thumb-list li a');
       	links.each(function() {
       		jQuery(this).bind('click', function() {
       			jQuery('.col2 .ad-active').each(function() {
       				jQuery(this).removeClass('ad-active');
       			});
       			jQuery(this).addClass('ad-active');
                
       		});
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
       	var links = jQuery('.col2 .ad-thumb-list li');
       	links.each(function() {
       		jQuery(this).bind('click', function() {
       			jQuery('.col2 .ad-active').each(function() {
       				jQuery(this).removeClass('ad-active');
       			});
       			jQuery(this).addClass('ad-active');
                
       		});
       		jQuery(this).hover(
       			function() {
       			  var thisId = jQuery(this).attr('id');
       			  jQuery('.social_favorites img', jQuery(this)).show();
       			  links.each(function() {
       				  if(jQuery(this).attr('id') != thisId) {
       				    jQuery(this).addClass('ad-hovered');
       				  }
       			  })
       			},
       			function() {
       		      jQuery('.ad-hovered').each(function() {
     			      jQuery(this).removeClass('ad-hovered');
     			     jQuery('.social_favorites img', jQuery(this)).hide();
    			  })
       			}
       		);
       		
       	});
	  }
	};
})(jQuery);

(function ($) {
	Drupal.behaviors.productOptions = {
	  attach: function (context, settings) {
		  
		  if(!jQuery("#commerce-cart-add-to-cart-form").length) {
			  return;
		  }
		  
		 jQuery('#commerce-cart-add-to-cart-form').validate({
			 	errorClass: 'invalid',
			   	onkeyup: false,
			   	wrapper: 'div id="message_box"',
		  });
		 /* 	 
		 var sizes = jQuery("#commerce-cart-add-to-cart-form #edit-sizes")
		  if(sizes.length) {
			 sizes.rules("add", {
		       required: true,
		       messages: {
		    	   required: "Select a size",
		           }
		       });
		  }
			 
	     var colors = jQuery("#commerce-cart-add-to-cart-form #edit-colors");
		 if(colors.length) {
			 colors.rules("add", {
		   	   required: true,
		   	   messages: {
		   		   required: "Select a Color",
		           }
		       });
		    }*/
		 

		//Enable Javascript Color functionality for Fadmashion sizes
		jQuery('.form-item-sizes select').selectBox();
		
		//Enable Javascript Color functionality for Fadmashion Commerce
		jQuery('.form-item-colors select').selectBox();
				
		//Change color options to div structures
		jQuery('.form-item-colors .selectBox-options li a').each(function() {
		  var vals = jQuery(this).attr('rel').split('_');
			var code = vals[0];
			var title = vals[1];
			var val = jQuery(this).html();
			var qty_info = jQuery('#qty-' + jQuery(this).attr('rel'));
					
			if(qty_info.attr('val') == '' || qty_info.attr('val') == 0) {
			  jQuery(this).parent().addClass('selectBox-disabled');
			}
			
			jQuery(this).attr('style', 'background-color: #' + code);
			jQuery(this).attr('title', qty_info.html()  + ' (' + title + ')');
			jQuery(this).attr('pos', val);
			jQuery(this).html('');
		});
		
		jQuery('.form-item-sizes .selectBox-options li a').each(function() {
				
		  var qty_info = jQuery('#qty-' + jQuery(this).attr('rel'));
			
			if(qty_info.attr('val') == '' || qty_info.attr('val') == '0') {
				jQuery(this).parent().addClass('selectBox-disabled');
			}
					
			jQuery(this).attr('title', qty_info.html());
		});
				
		jQuery('.selectBox-selected').each(function() {
		  if(jQuery(this).hasClass('selectBox-disabled')) {
			jQuery(this).removeClass('selectBox-selected');
			var parent = jQuery(this).parent();
			//find the next one and add the class there
			jQuery('li:not(.selectBox-disabled)', parent).first().addClass('selectBox-selected');
		  }
		});
	  }
	};
})(jQuery);

