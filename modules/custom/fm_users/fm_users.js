/**
 * 
 */

jQuery(document).ready(function() {
 
	//Call the main AJAXY functionality for registration and login workflow
  //fmConfigRegAjaxy();

  

  
});

/* Ajaxy content for Login-Registration Pages
function fmConfigRegAjaxy() {
(function($){
    var $body = $(document.body),
         $menu = $('#menu'),
         $content = $('#content'),
         $current = $('#current');
       
     $.Ajaxy.configure({
    	 'method': 'get',
         'Controllers': {
             '_generic': {
                 request: function(){
                     // Loading
                     $body.prepend('<div id="current"></div>');
                     $current = $('#current');
                     // Done
                     return true;
                 },
                 response: function(){
                     // Prepare
                     var Ajaxy = $.Ajaxy; var data = this.State.Response.data; var state = this.state||'unknown';
                     // Title
                     var title = data.title||false; // if we have a title in the response JSON
                     if ( !title && this.state||false ) title = 'jQuery Ajaxy - '+this.state; // if not use the state as the title
                     if ( title ) document.title = title; // if we have a new title use it
                     // Loaded
                     $current.text('response: Our current state is: ['+state+']');
                     // Return true
                     return true;
                 },
                 error: function(){
                     // Prepare
                     var Ajaxy = $.Ajaxy; var data = this.State.Error.data||this.State.Response.data; var state = this.state||'unknown';
                     // Error
                     var error = data.error||data.responseText||'Unknown Error.';
                     var error_message = data.content||error;
                     // Log what is happening
                     window.console.error('$.Ajaxy.Controllers._generic.error', [this, arguments], error_message);
                     // Loaded
                     $body.removeClass('loading');
                     // Display State
                     $current.text('error: Our current state is: ['+state+']');
                     // Done
                     return true;
                 }
             },
	        }
	     });
})(jQuery);
}*/


	     // All don})(jQuery);
	 // Back to global scope

