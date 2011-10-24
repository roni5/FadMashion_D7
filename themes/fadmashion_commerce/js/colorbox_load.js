(function ($) {

Drupal.behaviors.initColorboxLoad = {
  attach: function (context, settings) {
    if (!$.isFunction($.colorbox)) {
      return;
    }
    $.urlParam = function(name, url){
      var results = new RegExp('[\\?&]' + name + '=([^&#]*)').exec(url);
      if (!results) { return ''; }
      return results[1] || '';
    };
    $('a, area, input', context).filter('.colorbox-load').once('init-colorbox-load-processed').colorbox({
      transition:settings.colorbox.transition,
      speed:settings.colorbox.speed,
      opacity:settings.colorbox.opacity,
      close:settings.colorbox.close,
      overlayClose:settings.colorbox.overlayClose,
      maxWidth:settings.colorbox.maxWidth,
      maxHeight:settings.colorbox.maxHeight,
      initialWidth: settings.colorbox.initialWidth,
      initialHeight: settings.colorbox.initialHeight,
      width:function(){
          return $.urlParam('width', $(this).attr('href'));
        },
      height:function(){
            return $.urlParam('height', $(this).attr('href'));
          },
      innerWidth:function(){
        return $.urlParam('innerWidth', $(this).attr('href'));
      },
      innerHeight:function(){
        return $.urlParam('innerHeight', $(this).attr('href'));
      },
      iframe:function(){
        return $.urlParam('iframe', $(this).attr('href'));
      }
      
    });
    
    $('a, area, input', context).filter('.colorbox-load').click(function(){
    	if($.urlParam('blankBox', $(this).attr('href'))) {
    		$('#colorbox').addClass('blankBox');
    	} else {
    		$('#colorbox').removeClass('blankBox');
    	}
    });
    
    $('a, area, input', context).filter('.colorbox-inline').click(function(){
    	if($.urlParam('blankBox', $(this).attr('href'))) {
    		$('#colorbox').addClass('blankBox');
    	} else {
    		$('#colorbox').removeClass('blankBox');
    	}
    });
    
   
    
    //Hide title if it doesn't exist
    if($('#cboxTitle').html() == '') {
      $('#cboxTitle').hide();
    }
  }
};

})(jQuery);
