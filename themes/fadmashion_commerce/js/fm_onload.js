/**
 *  Javascript Tools to handle Forms in FAdmashion 
 */

jQuery(document).ready(function() {
	

	jQuery('#block-views-nodequeue-2-block,  #block-views-nodequeue-3-block').addClass('basicPagePopUp');
	
	//TODO: Re-arrange body so it is in the title Div.  CSS ISSUE
	jQuery('.basicPagePopUp .views-row').each( function () {
	  var body_html = jQuery('.views-field-body', this).html();
	  jQuery(' .views-field-title', this).append(body_html);
	  jQuery('.views-field-body', this).html('');
	});
	
	//HowItWorks
	if(!howItWorks) {
	  jQuery.colorbox({ 
	      opacity: '.9',
	      innerWidth: '930px', innerHeight: '560px', 
	      inline: true, 
	      href:"#block-views-nodequeue-2-block"
	    });
	  jQuery('#colorbox').addClass('blankBox');
	  
	  fmUsersOpened(1);
	}
	
	//Show a Non-Closeable registration pop-up if the user is not authenticated.
	if(jQuery("#block-views-nodequeue-3-block").length) {
		setTimeout("fmForceRegister();",1500);
	}
	
	if(jQuery.browser.msie) {
	//Remove Arrows if it is msie because the fading doesn't work well for it.
		jQuery('.views-slideshow-controls-text-previous, .views-slideshow-controls-text-next').hide();
	}
	
	//Add Store Admin - Orders Beautitps
	jQuery('.order-link').bt({ 
		contentSelector: "$('#content-' + $(this).attr('ref')).html()", 
		trigger: ['mouseover', 'click'],
		fill: 'white', 
		positions: ['bottom'],
		clickAnywhereToClose: true,              // clicking anywhere outside of the tip will close it 
		  closeWhenOthersOpen: true, 
		width: "$('#content-' + $(this).attr('ref')).width();",
		style: 'hulu',
		postShow: function(box) { fmAdminBTPreShow();},
	    strokeStyle: '#666666', 
	    spikeLength: 20, spikeGirth: 5, 
	    overlap: 0, centerPointY: 1, cornerRadius: 0, 
	    cssStyles: { fontFamily: '"Lucida Grande",Helvetica,Arial,Verdana,sans-serif', fontSize: '12px', padding: '10px 14px' }, 
	    shadow: true, shadowColor: 'rgba(0,0,0,.5)', shadowBlur: 8, shadowOffsetX: 4, shadowOffsetY: 4 
    });

});

(function ($) {
	Drupal.behaviors.colorboxFullHeight = {
	  attach: function (context, settings) {
	    if (!$.isFunction($.colorbox)) {
	      return;
	    }
	    if(!jQuery("#cboxOverlay").length) {
	    	return;
	    }
	    
		//Set overlay height to full document height
		var fullHeight = jQuery(document).height();
		jQuery("#cboxOverlay").height(fullHeight);
	  }
	};
})(jQuery);

function fmAdminBTPreShow() {
	clearAllForms();
	fmBTResizeColorbox();
}

//Check to see if Beautytip goes outside of colorbox and resize.  
function fmBTResizeColorbox() {
  //height of BT canvas
  var bt_height = jQuery('.bt-wrapper canvas').height() ; 
  var position = jQuery('.bt-wrapper').position();
  var bt_y = position.top;

  var cb_height = jQuery('#cboxContent').height();
  
  
  //if the height + positioning is bigger than box, than it is outside and needs to be resized
  var diff = bt_y + bt_height - cb_height;
  if(diff > 0) {
	var theDiv = jQuery("#colorbox");
	var totalHeight = theDiv.height();
	totalHeight += parseInt(theDiv.css("padding-top"), 10) + parseInt(theDiv.css("padding-bottom"), 10); //Total Padding Width
	totalHeight += parseInt(theDiv.css("margin-top"), 10) + parseInt(theDiv.css("margin-bottom"), 10); //Total Margin Width
	totalHeight += parseInt(theDiv.css("borderTopWidth"), 10) + parseInt(theDiv.css("borderBottomWidth"), 10); //Total Border Width

	console.log(totalHeight);
	jQuery.colorbox.resize({height: totalHeight + diff + 5});
  }
}


function fmForceRegister() {
	
	jQuery.colorbox({ 
	      opacity: '0',
	      innerWidth: '930px', innerHeight: '560px', 
	      inline: true, 
	      overlayClose: false, 
	      escKey: false, 
	      href:"#block-views-nodequeue-3-block",
	      onComplete: fmFadeRegisterBlock
	    });
	 jQuery('#colorbox').addClass('blankBox');
	 jQuery('#cboxClose, #block-views-nodequeue-3-block h2').hide();
	 jQuery('#block-views-nodequeue-3-block').hide();
	 
	 
}

function fmFadeRegisterBlock() {
	jQuery('#cboxOverlay').fadeTo(1000, .75, function() {
		
	});
	setTimeout("jQuery('#block-views-nodequeue-3-block').fadeIn(1000);",700);
	
	
}

function fmUsersOpened(item_id) {
	jQuery.ajax({
		   type: "GET",
		   url: "?q=fm_users_opened/" + item_id,
		   dataType: "script"
		 });
}