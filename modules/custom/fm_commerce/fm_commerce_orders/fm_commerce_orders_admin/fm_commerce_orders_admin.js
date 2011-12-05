/**
 * 
 */


jQuery(document).ready(function() {
 
	//Default Shoing
	jQuery('.orders-admin-table tbody tr').hide();
    jQuery('.orders-admin-table .admin-action-needed').show();
    
	jQuery('.orders-filter-list li a').click(function() {
		  var filterClass = jQuery(this).attr('class');
		  if(filterClass == 'all') {
			  jQuery('.orders-admin-table tbody tr').show();
		  } else {
	        jQuery('.orders-admin-table tbody tr').hide();
	        jQuery('.orders-admin-table .' + filterClass).show();
		  }
		  jQuery('.orders-filter-list li a').css('font-weight', 'normal');
		  jQuery(this).css('font-weight', 'bold'); 
	});
	
	jQuery('.orders-filter-list li a').each(function() {
		var filterClass = jQuery(this).attr('class');
		var count = 0;
		if(filterClass == 'all') {
			jQuery('.orders-admin-table tbody tr').each(function() { 
			    count++;
			  });
		} else {
		  jQuery('.orders-admin-table .' + filterClass).each(function() { 
		    count++;
		  });
	    }
		jQuery(this).append(' (' + count + ')');
	})
	
	//Add Store Admin - Orders Beautitps
	jQuery('.dotted-hover').bt({ 
		contentSelector: "$('#content-' + $(this).attr('ref')).html()", 
		trigger: ['mouseover', 'click'],
		fill: 'white', 
		positions: [ 'left', 'bottom'],
		clickAnywhereToClose: true,              // clicking anywhere outside of the tip will close it 
		  closeWhenOthersOpen: true, 
		width: "$('#content-' + $(this).attr('ref')).width();",
		style: 'hulu',
	    strokeStyle: '#666666', 
	    spikeLength: 8, spikeGirth: 5, 
	    overlap: 0, centerPointY: 1, cornerRadius: 0, 
	    cssStyles: { fontFamily: '"Lucida Grande",Helvetica,Arial,Verdana,sans-serif', fontSize: '12px', padding: '10px 14px' }, 
	    shadow: true, shadowColor: 'rgba(0,0,0,.5)', shadowBlur: 8, shadowOffsetX: 4, shadowOffsetY: 4 
    });
	
	
});