<?php



function fm_deals_admin_page() {
	
	$output = '<ul class="action-links"><li>' . l('Add a Deal', 'node/add/fm-group-buying') .'</li></ul>';
	
	$query = new EntityFieldQuery();
  
 $entities = $query->entityCondition('entity_type', 'node')
                    ->entityCondition('bundle', 'fm_group_buying')
                    ->propertyCondition('status', 1)
                    ->execute(); 
                    
  $output .= '<h1>Active Deals</h1>';
  $output .= fm_deals_list($entities);
  
  
  $query = new EntityFieldQuery();
  $entities = $query->entityCondition('entity_type', 'node')
                    ->entityCondition('bundle', 'fm_group_buying')
                    ->propertyCondition('status', 0)
                    ->execute(); 
  $output .= '<h1>Not-Active Deals</h1>';
  $output .= fm_deals_list($entities);
              
  return $output;	
}

function fm_deals_list($entities) {
	 
  $header = array('# Rotated', 'Product Name',  'Images',  'Orders', 'Stock', 'Store Name', 'Operations' );
  $rows = array();
  foreach($entities['node'] as $node) {
  	try{
  	$node = node_load($node->nid);
  
    $product = fm_commerce_get_product($node);
    $store = fm_commerce_get_store($product);
    
    $images = field_get_items('commerce_product', $product, 'field_product_images');
    $product_name = field_get_items('commerce_product', $product, 'name');
   
    //$start_time = format_date(strtotime($node->field_start_time['und'][0]['value'] ), 'custom', "F j, Y, g:i a", $node->field_start_time['und'][0]['timezone']);
    //$end_time = format_date(strtotime($node->field_start_time['und'][0]['value2'] ), 'custom', "F j, Y, g:i a", $node->field_start_time['und'][0]['timezone']);
    
    //var_dump($node->field_start_time['und'][0]['timezone']);
    $orders = fm_deals_orders($node->nid);
    $qty_purchased = fm_deals_qty_purchased($node->nid);
    $num = db_query("SELECT COUNT(*) FROM {fm_deals_schedule} WHERE nid = :nid", array(':nid' => $node->nid))->fetchField();
    
    $rows[] = array($num, l($product->title, 'node/' . $node->nid),
       '<div ref="'. $node->nid .'" class="image-link" style="cursor: pointer; border-bottom: 1px dotted #444;">' . count($images) . ' images</div>', 
      (count($orders) > 0 ? l('View orders', 'admin/fadmashion/deals/orders/' . $node->nid) . ' (' . $qty_purchased .  ')' : t('No Orders Placed')), 
      t ? 'Has Stock' : '<span style="color: red;">Out of Stock</span>',
      $store->name,
      l('edit deal', 'node/'.$node->nid.'/edit') . ' | ' . l('edit product', 'admin/commerce/products/' . $product->product_id  . '/edit' )
		);
  	}
  	catch(Exception $e) {
  		drupal_set_message('Error loading Node w/ nid: ' . $node->nid);
  		//var_dump($node);
  		//exit();
  	}
  }
	
	$output =  theme ('table', array('header' => $header, 'rows' => $rows));
	
		
	/*$options['bt_admin_store_name'] = array(
      'cssSelect' => '.image-link',
      'trigger' => array('mouseover', 'click'),
	    'positions' => array('bottom'),
	    'fill' =>  "rgb(255, 255, 255)",
	    'ajaxPath' => array("'?q=admin/fadmashion/deals/images/' + jQuery(this).attr('ref')", '.images'),
	    'ajaxError' => "<strong>Egads!</strong> There was a problem getting this content. Here's what we know: <em>%error</em>.",
	    //'contentSelector' => " $('#' + $(this).attr('ref')).html()",
	    'width' => '800px',
      'style' => 'hulu',
      );
    beautytips_add_beautytips($options);*/
	
	return $output;
}


function fm_deals_admin_images($node_id) {
	
	$node = node_load($node_id);
	$product = fm_commerce_get_product($node);
	
	$images = field_get_items('commerce_product', $product, 'field_product_images');
    
	foreach($images as $image) {
	  $node_image = node_load($image['nid']);
    $node_image = field_get_items('node', $node_image, 'field_product_image');
    $node_image = $node_image[0];
     
    $node_image = array(
      'path' => $node_image['uri'],
      'alt' => $node_image['alt'],
      'title' => $node_image['title'],
      'attributes' => array('style' => 'width: 150px;'),
      'style_name' => 'fm_main_product_image'
    );
  
    $output .= '<div class="images" style="float:left; ">' . theme('image_style', $node_image) . '</div>';
	}

	print $output;
	exit();
   
}


function fm_deals_admin_orders($nid = '') {
	$statuses = fm_commerce_orders_commerce_order_status_info();
	if(!empty($nid)) {
		$orders = fm_deals_orders($nid);
	  $deal_node = node_load($nid);
	  $output = '<h1>' . $deal_node->title . '</h1>';
	}
	else {
		$orders = fm_deals_orders($nid, array('fm_orders_authorized', 'fm_orders_captured', 'cart'));
		$output = '<h1>' . t('All Deals') . '</h1>';
	}
	
	$orders = array_reverse($orders);
	
	if(count($orders)) {
	  $header = array('Order Id',  'Name', 'Product Name', 'Order Status', 'Time', ' Balance');
	  
    $rows = array();
    $order_type = '';
    foreach ($orders as $order) {
    	$status = $order->status;
    	$deal_node = fm_commerce_get_order_node($order);
    	$actions = '';
    	switch ($status) {
    		case 'fm_orders_authorized':
    			$qty_purchased = fm_deals_qty_purchased($deal_node->nid);
    			if(fm_deals_states_status($deal_node, $qty_purchased)) {
    		  		$actions .= '<div> Deal is On! </div>';
    				  $actions .= l('Capture', 'admin/fadmashion/wpp/capture/' . $order->order_id, array('query' => drupal_get_destination()) );
    		  		$actions .= ' | ' . l('Void', 'admin/fadmashion/wpp/void/' . $order->order_id, array('query' => drupal_get_destination()) );
    			} else {
    				$actions .= '<div> Deal is Off </div>';
    		  	$actions .=  l('Void Payment', 'admin/fadmashion/wpp/void/' . $order->order_id, array('query' => drupal_get_destination()) );
    			}
    			$order_type = 'Authorized Payment';
    		  break;
    		case 'fm_orders_captured':
    			$order_type = '<div style="color: green;">Authorized & Captured Payment</div>';
    			break;
    		case 'cart':
    			$order_type = '<div style="color: red;">In Cart</div>';
    			break;
    		default:
    			$order_type = '';
    			break;
    	}
    	$balance = commerce_payment_order_balance($order);
    	$balance = commerce_currency_format($balance['amount'], $balance['currency_code']);
  	  $rows[] = array(
  	    l($order->order_id, 'admin/commerce/orders/' . $order->order_id),
  	    fm_users_fullname($order->uid),
  	    $deal_node->title, 
  	    $order_type,
  	    date('M j Y, g:ia', $order->changed),
  	    $balance. ' (' .l('payment history', 'admin/commerce/orders/' . $order->order_id . '/payment') . ')',
  	    //$actions
   	  );
    }
   	
   	$output .=  theme ('table', array('header' => $header, 'rows' => $rows));
  } else {
  	$output .= t('No Orders Have Been Placed Yet for this Deal');
  }
  
	return $output;
	
}