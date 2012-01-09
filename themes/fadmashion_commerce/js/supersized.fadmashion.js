

(function($){
	
	theme = {
	 	
	 	
	 	/* Initial Placement
		----------------------------*/
	 	_init : function(){
	 		//alert('test');
								
	 	},
	 	
	 	
	 	/* Before Slide Transition
		----------------------------*/
	 	beforeAnimation : function(direction){
	 		var url = api.getField('url');
	 		$('.supersized-img').click(function() {
	 			window.location.href = url;
	 		});
		    //alert(url);
	 	},
	 
	 };
	 
	
})(jQuery);