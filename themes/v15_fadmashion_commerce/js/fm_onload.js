/**
 *  Javascript Tools to handle Forms in FAdmashion 
 */

//Global Variables
var regBlockId = 'block-fm-users-register-fm-users-register-block';
var inviteBlockId = 'block-fm-users-fm-users-invite';

jQuery(document).ready(function() {
	

	jQuery('#block-views-nodequeue-2-block,  #block-views-nodequeue-3-block').addClass('basicPagePopUp');
	
	//TODO: Re-arrange body so it is in the title Div.  CSS ISSUE
	jQuery('.basicPagePopUp .views-row').each( function () {
	  var body_html = jQuery('.views-field-body', this).html();
	  jQuery(' .views-field-title', this).append(body_html);
	  jQuery('.views-field-body', this).html('');
	});
	

	
	//ADD deep linking, 
	 jQuery.address.crawlable(true).init(function(event) {

         // Initializes plugin support for links
		 jQuery('.page-shop .col2 .designerPanel a, .page-shop .col1 a').address();


     }).change(function(event) {

         // Identifies the page selection
    	 var type, id;
    	 if(event.parameters.store_id) {
        	 type = 'store';
        	 id = event.parameters.store_id;

    		 jQuery('.page-shop .col1 a').each(function() {
    			 if (jQuery(this).attr('id') == id) {
 			    jQuery(this).addClass('active').focus();
               } else {
             	jQuery(this).removeClass('active');
               }
             });
	 
	 
         } else {
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
    	 
    	 if(event.parameters.nid) {
    		 type = 'node';
    		 id = event.parameters.nid
    	 }
    	 
        

         var handler = function(data) {
        	jQuery('.shopAjaxLoader').fadeOut();
        	jQuery('.page-shop .col2 .pad ').hide();
        	jQuery('.page-shop .col2 .pad ').html(data);
        	jQuery('.page-shop .col2 .pad ').fadeIn();

         	jQuery(".capslide_img_cont").capslide({
                 caption_color	: 'white',
                 caption_bgcolor	: 'black',
                 overlay_bgcolor : 'black',
                 border			: '',
                 showcaption	    : false
             });
         };
         
         


         // Loads the page content and inserts it into the content area
         jQuery.ajax({
             url: location.pathname + '?q=shop/ajax/' + type + '/' + id,
             beforeSend: function() {
            	 jQuery("html, body").animate({ scrollTop: 0 }, "slow");
                 jQuery('.shopAjaxLoader').show();
                 //jQuery('.page-shop .col2 .pad .shopContent').hide();
              },

             error: function(XMLHttpRequest, textStatus, errorThrown) {
                 handler(XMLHttpRequest.responseText);
             },
             success: function(data, textStatus, XMLHttpRequest) {
                 handler(data);
             }
         });

     });
     

	
	if(jQuery.browser.msie) {
	//Remove Arrows if it is msie because the fading doesn't work well for it.
		jQuery('.views-slideshow-controls-text-previous, .views-slideshow-controls-text-next').hide();
	}
	
	//Add Store Admin - Orders Beautitps
	jQuery('.order-link .dotted-hover').bt({ 
		contentSelector: "$('#content-' + $(this).attr('ref')).html()", 
		trigger: ['mouseover', 'click'],
		fill: 'white', 
		positions: [ 'left', 'bottom'],
		clickAnywhereToClose: true,              // clicking anywhere outside of the tip will close it 
		  closeWhenOthersOpen: true, 
		width: "$('#content-' + $(this).attr('ref')).width();",
		style: 'hulu',
		postShow: function(box) { fmAdminBTPreShow();},
	    strokeStyle: '#666666', 
	    spikeLength: 8, spikeGirth: 5, 
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

  var cb_height = jQuery('#cboxLoadedContent').height();
  
  
  //if the height + positioning is bigger than box, than it is outside and needs to be resized
  var diff = bt_y + bt_height - cb_height;
  if(diff > 0) {
	var theDiv = jQuery("#colorbox");
	var totalHeight = theDiv.height();
	totalHeight += parseInt(theDiv.css("padding-top"), 10) + parseInt(theDiv.css("padding-bottom"), 10); //Total Padding Width
	totalHeight += parseInt(theDiv.css("margin-top"), 10) + parseInt(theDiv.css("margin-bottom"), 10); //Total Margin Width
	totalHeight += parseInt(theDiv.css("borderTopWidth"), 10) + parseInt(theDiv.css("borderBottomWidth"), 10); //Total Border Width

	  console.log(bt_y + ', ' + bt_height + ', ' + cb_height);
	  console.log(diff);
	console.log(totalHeight);
	jQuery.colorbox.resize({height: totalHeight + diff + 5});
  }
}



function fmUsersOpened(item_id) {
	jQuery.ajax({
		   type: "GET",
		   url: "?q=fm_users_opened/" + item_id,
		   dataType: "script"
		 });
}

function fmValidateInviteForm() {
	jQuery('#fm-invite-send-email-form').validate({
    	errorClass: 'invalid',
    	onkeyup: false,
    	wrapper: 'div id="message_box"',
    	submitHandler: function(form) {
			jQuery(form).ajaxSubmit({
		        beforeSubmit:  fmInvitesBefore,  // pre-submit callback 
		        success:       fmIvitesAfter  // post-submit callback 
			});
		},
		//Copied from Source files defaultShowErrors function. Added Colorbox functionality --START
		showErrors: showErrorsColorbox
    });
	
	var num = 4;

	jQuery("#fm-invite-send-email-form  #edit-to0").rules("add", {
   	   required: true,
   	   email: true
     });
}

function fmInvitesBefore() {
	jQuery('.skip-link').hide();
	jQuery('.invite_state1').hide();
	jQuery('.invite_state2').show();
}

function fmIvitesAfter(responseText, statusText, xhr, $form) {
		jQuery('.invite_state1').hide();
		jQuery('.invite_state2').hide();
		jQuery('.invite_state3').show();
}

function fmInvitesRestoreForm() {
	jQuery('.invite_state1').show();
	jQuery('.invite_state2').hide();
	jQuery('.invite_state3').hide();
}


/**
 * get the time from server
 */
function serverSync() {
  var time = null;
  // try to get the servertime, if false we provide the current client time..
  jQuery.ajax({
    url: Drupal.settings.basePath + 'jquery_countdown/serversync',
    async: false,
    dataType: 'text',
    success: function(text) {
      time = new Date(text);
    },
    error: function(http, message, exc) {
      time = new Date();
    }
  });
  return time;
};