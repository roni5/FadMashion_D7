/**
 * 
 */

jQuery(document).ready(function() {
	
	if(jQuery('.page-static').length > 0) {
	//ADD deep linking, 
	 jQuery.address.crawlable(true).init(function(event) {

         // Initializes plugin support for links
		 jQuery('.page-static .col1 ul a').address();


     })
     .change(function(event) {

         // Identifies the page selection
    	 var static_id = 'about-us';
    	 if(event.parameters.page) {
		   static_id = event.parameters.page;
	     }
    	 
    	 jQuery('.page-static .col1 a').each(function() {
			 if (jQuery(this).attr('id') == static_id) {
			    jQuery(this).addClass('active').focus();
           } else {
         	jQuery(this).removeClass('active');
           }
         });
    	 
    	 if(event.parameters.jump) {
        	 jump = event.parameters.jump;
        	 jQuery.scrollTo('#' + jump);
         } else {
        	 jump = '';
         }
    	 
    	 data = jQuery('#cache .' + static_id).html();
     	
    	 if(!jump) {
    	   jQuery("html, body").animate({ scrollTop: 0 }, 'slow', "easeOutCubic");
    	 }
      	
    	 dataPage = jQuery('.page-static .col2 .pad');
      	dataPage.hide();
     	dataPage.html(data);
     	dataPage.fadeTo('fast', 1);
    	 
     	
     });
   }
 });