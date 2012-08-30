/**
 * Javascript Tools to handle Forms in FAdmashion 
 */

//global variables for Drupal.behaviors functions
var contentSelector;
var request;
var requestCounter=0;
var carouselRequest;

var ajaxPath, carouselPath;
var carouselSize;

var carouselLoader = '';
jQuery(document).ready(function() {
	
	carouselLoader = jQuery('carouselLoader').html();
  
	
  if(jQuery('.page-shop').length) {
	//ADD deep linking, 
	 jQuery.address.crawlable(true).init(function(event) {

         // Initializes plugin support for links
		 jQuery('.page-shop .col2 .designerPanel a, .page-shop .col1 a').address();


     })
     .change(function(event) {

    	 //turn off BT
    	  jQuery('.nav .tooltipBtn').btOff();
    			
         // Identifies the page selection
    	 var type, id, nid;
    	 var store_id, term, param;
    	 var cacheId, cacheType;
      	
      	
    	 if(event.parameters.store_id) {
    		 store_id = event.parameters.store_id;
    		 type = 'shop';
    		 id = store_id;
    		 
    		 cacheType = 'store';
    	     cacheId = store_id;
    	     
    	     jQuery('.browse_by.child').fadeIn();
    	      	
    	 } else {
    		 store_id = '';
    		 jQuery('.browse_by.child').hide();
    	 }
    	 
    	 if(event.parameters.nid) {
    		 nid = event.parameters.nid;
    	 } else {
    		 nid = '';
    	 }
    	 
    	 if(event.parameters.term) {
    		 term = event.parameters.term;
    		 type = 'term';
    		 id = 'term_' + term; 
    		 
    		 cacheType = 'term';
    	     cacheId = term;
    	 } else {
    		 term = '';
    	 }
    	 
    	 if(event.parameters.favorites) {
    		 param = event.parameters.favorites;
    		 type = 'favorites';
    		 id = param; 
    		 
    		 cacheType = 'favorites';
    	     cacheId = param;
    	 } else {
    		 param = '';
    	 }
    	 
    	 
    	 //Default shows all-time favorites
    	 if((!event.parameters.nid  && !event.parameters.store_id && !event.parameters.term && !event.parameters.favorites) ) {
      
  	       store_id = 'all';
		   type = 'shop';
		   id = store_id;
		 
		   cacheType = 'store';
	       cacheId = store_id;
	     
    	 }
    	 

    	 jQuery('.page-shop .col1 a').each(function() {
			 if (jQuery(this).attr('id') == id) {
			    jQuery(this).addClass('active').focus();
           } else {
         	jQuery(this).removeClass('active');
           }
         });
    	 
    	//Set Cache Class name to retrieve/store from
    	 var cacheClass = cacheType + cacheId ;
     	
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
        	
          var newClass;
          
          jQuery('.contentPanel .ad-active').each(function() {
				jQuery(this).removeClass('ad-active');
		  });
		  jQuery('.contentPanel #collection_viewer_' + nid + ' a.thumb_link').addClass('ad-active');
        

          

          
          if(newContent) {
            jQuery('.thumb_link img').hide()
            .load(function () {
          	  jQuery(this).fadeIn('slow');
            });
            
            
          } else {
        	  
          }
          dataPage.fadeTo('fast', 1);
          
          try {
            Drupal.attachBehaviors();
          } catch(err) {
        	 //alert('error');
          }
          

          if(jQuery('#grid_view').length) {
        	  if(!event.parameters.nid) {
        		  jQuery('.contentPanel #grid_view').show();
        		  jQuery('.contentPanel .collection_viewer').hide();
        		  jQuery('.contentPanel .product_content').hide();
        	  } else {
        		  jQuery('.contentPanel #grid_view').hide();
        		  jQuery('.contentPanel .collection_viewer').fadeIn();
        		  jQuery('.contentPanel .product_content').fadeIn();
        		  
        		  var position = jQuery('.collection_viewer').position();
                  //jQuery("html, body").animate({ scrollTop: 220 }, 'slow', "easeOutCubic");
        	  }
          }

          
          //THIS SHOULDNT BE HERE BUT I NEED IT TO SHOW NEXT PREV ITEM 
          //TODO:  Find where it is being disabled.  Something to do with the fact there aren't more than one image
          jQuery('#item_nav a').show();
          //Do nav items bt logic.
          
          
          //jQuery('.quoteClose .field-items').textfill({ maxFontPixels: 22, innerTag: 'div' }); 
          //add Address functionality to the collection viewer thumbnails
          //first, select the 
        

          
          jQuery('.ad-nav .ad-thumbs li a.thumb_link').address();
          jQuery('#grid h1 a, #grid a.thumb_link').address();
          
          //Make all press links open in new window
          jQuery('.press .source a').attr('target', '_blank');
          
       };
         /*
    	 * End of Handler
    	 */


         var page;
         if(event.parameters.page) {
        	 page = event.parameters.page;
         } else {
        	 page = '';
         }
         var q = '/';
         var qParam = '?';
         if(event.parameters.q) {
        	  q = '?q=shop/';
        	  qParam = '&';
         }

         var dataPage;
         if(page || (!jQuery('.col2 #collection_store_' + store_id).length && !jQuery('.col2 #collection_term_' + term).length && !jQuery('.col2 #collection_favorites_' + param).length)) {
        	 dataPage = jQuery('.page-shop .col2 .contentPanel');
         } else {
        	 dataPage = jQuery('.page-shop .col2 .contentPanel .product_content');
         }
         
         var fullPath = '';
         if(location.pathname == '/') {
        	 fullPath = 'http://' + location.host + location.pathname + '/shop';
         } else {
        	 fullPath =  location.pathname ;
         }
         
         var args = '';
         if(store_id) {
        	 args = 'store_id=' + store_id;
         } else if(term) {
        	 args = 'term=' + term;
         } else if(param) {
        	 args = 'favorites=' + param;
         }
         
         if(page) {args = args + '&page=' + page;}
        	 
         // Loads the page content and inserts it into the content area
         if(page || !jQuery('#cache .' + cacheClass).length) { 
           if(request) {request.abort();}
           var token = ++requestCounter;
           ajaxPath = fullPath + q + 'ajax/' + qParam + args;
           carouselPath = fullPath + q + 'ajax/carousel' + qParam + args;
        	   
           request = jQuery.ajax({
             url:  ajaxPath,
             beforeSend: function() {
 
            	 jQuery("html, body").animate({ scrollTop: 0 }, 'slow', "easeOutCubic");
                 jQuery('.shopAjaxLoader').show();
                 if(dataPage.html()) {
                   dataPage.fadeTo('fast', .33);
                 } else {
                	 dataPage.hide(); 
                 }
                 
              },
             error: function(XMLHttpRequest, textStatus, errorThrown) {
                 handler(XMLHttpRequest.responseText);
             },
             success: function(data, textStatus, XMLHttpRequest) {
            	 if (token != requestCounter) return;
            	 //Add to Cache
                 if(!jQuery('#cache .' + cacheClass).length) {
               	   newClass =  '<div class="' + cacheClass + '"></div>';
                   jQuery('#cache').html(newClass);
                   jQuery('#cache .' + cacheClass).html(data.content);
                 }
                 
                 carouselSize = data.totalCount;
                 
                 handler(data.content, true);
             }
           });
         } else {
        	 var data;
        	 if(!jQuery('.col2 #collection_store_' + store_id).length && !jQuery('.col2 #collection_term_' + term).length &&  !jQuery('.col2 #collection_favorites_' + param).length) {
        		 data = jQuery('#cache .' + cacheClass).html();
        	 } else {
        		 data = '';
        	 }
        	 dataPage.fadeTo('fast', .33);
        	 jQuery('.shopAjaxLoader').show();
        	 handler(data, false);
         }
     });
   }
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
	Drupal.behaviors.sliderFunctionality = {
	  attach: function (context, settings) {
		  if(!jQuery(".ad-thumb-list").length) {
		    	return;
		  }

          var slider = jQuery('.ad-thumb-list').once('slider_proccessed').jcarousel({
        	  initCallback: mycarousel_initCallback,
        	  itemLoadCallback: mycarousel_itemLoadCallback,
        	  size: carouselSize,
        	  scroll: 7,
        	  easing: 'easeInOutCubic'
          });
          
		  
       	
	  }
	};
})(jQuery);

var pagerCount = 0;

function mycarousel_initCallback(carousel) {
	 jQuery('#collection_viewer_next').bind('click', function() {
	        carousel.next();
	        return false;
	    });

	    jQuery('#collection_viewer_prev').bind('click', function() {
	        carousel.prev();
	        return false;
	    });
	    
	    pagerCount = 1;
}

var loaderCount;

function mycarousel_itemLoadCallback(carousel, state)
{
    // Check if the requested items already exist
    if (carousel.has(carousel.first, carousel.last) || carousel.first == carousel.last) {
        return;
    }

    if(carouselRequest) {
      if(carouselRequest.readyState != carouselRequest.DONE) {return;}
    }
    
    carouselRequest = jQuery.ajax({
        url:  carouselPath + '&page=' + pagerCount,
        beforeSend: function() {
        	jQuery("#slider_loader").show();
         },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            
        },
        success: function(data, textStatus, XMLHttpRequest) {
        	jQuery("#slider_loader").fadeOut();
        	mycarousel_itemAddCallback(carousel, carousel.first, carousel.last, data);
        	pagerCount++;
        }
      });
};

function mycarousel_itemAddCallback(carousel, first, last, json)
{
    // Set the size of the carousel
    //carousel.size(parseInt(jQuery('total', xml).text()));
	
	//Find the last number
	var count = 1;
	while(carousel.has(count)) {
		count++;
	}
	
    jQuery('li', json.collection_viewer).each(function(i) {
        carousel.add(count + i, jQuery(this).html());
    });
    jQuery('.contentPanel .product_content').append(json.node_content);
    
    jQuery('.col2 .ad-thumb-list li a').live('click', function() {
			jQuery('.col2 .ad-active').each(function() {
				jQuery(this).removeClass('ad-active');
			});
			jQuery(this).addClass('ad-active');
        
		});
    
};


(function ($) {
	Drupal.behaviors.collectionViewer = {
	  attach: function (context, settings) {
		 if(!jQuery("#gallery").length) {
		   return;
		 }
       		jQuery('.col2 .ad-thumb-list li a').live('click', function() {
       			jQuery('.col2 .ad-active').each(function() {
       				jQuery(this).removeClass('ad-active');
       			});
       			jQuery(this).addClass('ad-active');
                
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
       		/*jQuery('a.thumb_link', jQuery(this)).bind('click', function() {
       			jQuery('.col2 .ad-active').each(function() {
       				jQuery(this).removeClass('ad-active');
       			});
       			jQuery(this).addClass('ad-active');
                
       		});*/
       		/*jQuery(this).hover(
       			function() {
       			  jQuery('.social_favorites img', jQuery(this)).fadeIn('normal'); 
       			},
       			function() {
       		      jQuery('.social_favorites img', jQuery(this)).hide();
       			}
       		);*/
       		
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
			jQuery(this).attr('title', title + ' - ' +qty_info.html());
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
		
		jQuery('.form-item-sizes .selectBox-options li a').bt({
			  contentSelector: "jQuery(this).attr('title')",
			  fill: 'rgb(35, 35, 35)',
			  cssStyles: {color: 'white', fontWeight: 'bold', fontSize: '10px'},
			  shrinkToFit: true,
			  padding: 5,
			  spikeLength: 6,
			  positions: ['top']
		});
		jQuery('.form-item-colors .selectBox-options li a').bt({
			  contentSelector: "jQuery(this).attr('title')",
			  fill: 'rgb(35, 35, 35)',
			  cssStyles: {color: 'white', fontWeight: 'bold', fontSize: '10px'},
			  shrinkToFit: true,
			  padding: 5,
			  spikeLength: 6,
			  positions: ['top']
		});
				
		jQuery('.selectBox-selected').each(function() {
		  if(jQuery(this).hasClass('selectBox-disabled')) {
			jQuery(this).removeClass('selectBox-selected');
			var parent = jQuery(this).parent();
			//find the next one and add the class there
			jQuery('li:not(.selectBox-disabled)', parent).first().addClass('selectBox-selected');
		  }
		});
		
		//Header Beautytips
		jQuery('#item_nav a').bt({
	      contentSelector: "item_content(jQuery(this));",
		  trigger: 'hover',
		  positions: ['top'],
		  fill: "rgb(34, 34, 34)", 
	      shadow: true,
		  shadowOffsetX: 3,
		  shadowOffsetY: 3,
		  shadowBlur: 8,
		  shadowColor: 'rgba(0,0,0,.3)',
		  shadowOverlap: false,
		  strokeWidth: 2,
		  spikeLength: 6,
	      padding: '8px',
		  shrinkToFit: true,
		  width: '180px',
		  cssClass: 'next_prev_tooltip',
		  
		});
		
	  }
	};
})(jQuery);

function item_next() {
	var active_link = jQuery('.ad-active');
	var active_item = active_link.parent();
	var next_item = active_item.next();
	if(next_item.length) {
		jQuery('a.thumb_link', next_item).trigger('click');
	} else {
		//Check to see if next pager button is active. If it is, than click it.
		if(!jQuery('#collection_viewer_next').hasClass('disabled')) {
			jQuery('#collection_viewer_next').trigger('click');
        //Else Disable this button
		} else {
			
		}
		
		
	}
	
}

function item_prev() {
	var active_link = jQuery('.contentPanel .ad-active');
	var active_item = active_link.parent();
	var prev_item = active_item.prev();
	if(prev_item.length) {
		jQuery('a.thumb_link', prev_item).trigger('click');
	} else {
		//Check to see if prev pager button is active. If it is, than click it.
		if(!jQuery('#collection_viewer_prev').hasClass('disabled')) {
			jQuery('#collection_viewer_prev').trigger('click');
        //Else Disable this button
		} 
	}
}

function item_content(thisNav) {
	var active_link = jQuery('.contentPanel .ad-active');
	var active_item = active_link.parent();
	
	var item;
	var title;
	if(thisNav.hasClass('prev')) {
		item = active_item.prev();
		title = "Previous"
	} else {
	    item = active_item.next();
	    title = "Next";
	}
	
	if(item.length) {
	  nid = jQuery('a.thumb_link', item).attr('id');
	
	  var nodeContent = jQuery('.product_content #node_' + nid);
	  var itemName = jQuery('.itemName', nodeContent).html();
	
	  return '<div>' + itemName + '</div>';
	} else {
		if(thisNav.hasClass('prev')) {
			return '<span>The Start.</span>';
		} else {
		    return '<span>The End!</span>';
		}
		return '';
	}
	
}

function autoPagerLoad() {
	Drupal.attachBehaviors();
	jQuery('#loading_more').hide();
}

function autoPagerStart() {
  jQuery('#loading_more').show();
}
