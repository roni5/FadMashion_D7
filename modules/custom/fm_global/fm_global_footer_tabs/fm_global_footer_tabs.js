/**
 * Favorites Frontend AJAX functionality
 * TODO:  Eventually replace with Backbone.js Event & Bind.  
 */

jQuery(document).ready(function() {


	  var tabs_content = jQuery('.footer_tabs_content');
	  var tabs_links = jQuery('.footer_tabs_links');
	  tabs_content.resize( function() {
		  if(tabs_content.is(':visible')) {
             var height = tabs_content.outerHeight() - 13;
		     tabs_links.css('bottom', height + 'px');
		  }
	  });
	 
	jQuery('.footer_tabs_closes').once('init-closed-processed').click(function (e){
		  e.preventDefault();
		  
			  
		  tabs_content.slideToggle('5000', function() {
			  if(!tabs_links.hasClass('collapsed') && !tabs_content.is(':visible')) {
			    tabs_links.addClass('collapsed'); 
		     }
		  });
		  


		  if(tabs_links.hasClass('collapsed')) {
			  tabs_links.removeClass('collapsed');
		  } 

	  });
	
	jQuery('.footer_tabs_links li a').once().click(function (e) {
		if(tabs_links.hasClass('collapsed')) {
			jQuery('.footer_tabs_closes').trigger('click');
		}
	});
	
});
