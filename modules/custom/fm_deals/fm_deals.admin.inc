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
	 
  $header = array('Product Name',  'Qty Min', 'Deal Status', 'Orders', 'Stock' ,'Store Name', 'Operations' );
  $rows = array();
  foreach($entities['node'] as $node) {
  	$node = node_load($node->nid);
  
    $product = fm_commerce_get_product($node);
    $store = fm_commerce_get_store($product);
    
    $product_name = field_get_items('commerce_product', $product, 'name');
   
    $qty_min = $node->field_quantity_min['und'][0]['value'];
    //$start_time = format_date(strtotime($node->field_start_time['und'][0]['value'] ), 'custom', "F j, Y, g:i a", $node->field_start_time['und'][0]['timezone']);
    //$end_time = format_date(strtotime($node->field_start_time['und'][0]['value2'] ), 'custom', "F j, Y, g:i a", $node->field_start_time['und'][0]['timezone']);
    
    //var_dump($node->field_start_time['und'][0]['timezone']);
    $orders = fm_deals_orders($node->nid);
    $qty_purchased = fm_deals_qty_purchased($node->nid);
    
    $rows[] = array(l($product->title, 'node/' . $node->nid),
      $qty_min, 
      fm_deals_states_status_msg($node, $qty_purchased),
      (count($orders) > 0 ? l('View orders', 'admin/fadmashion/deals/orders/' . $node->nid) . ' (' . $qty_purchased .  ')' : t('No Orders Placed')), 
      fm_deals_has_stock($node->nid) ? 'Has Stock' : '<span style="color: red;">Out of Stock</span>',
      $store->name,
      l('edit deal', 'node/'.$node->nid.'/edit') . ' | ' . l('edit product', 'admin/commerce/products/' . $product->product_id  . '/edit' )
		);
  }
	
	$output =  theme ('table', array('header' => $header, 'rows' => $rows));
	
	return $output;
}

function fm_deals_admin_orders($nid) {
	$orders = fm_deals_orders($nid);
	$deal_node = node_load($nid);
	$orders = array_reverse($orders);
	$statuses = fm_commerce_orders_commerce_order_status_info();
	
	$output = '<h1>' . $deal_node->title . '</h1>';
	
	if(count($orders)) {
	  $header = array('Order Id',  'Name', 'Time', 'Payment Status', 'Unpaid Balance', 'Actions');
	  
    $rows = array();
    foreach ($orders as $order) {
    	$status = $order->status;
    	$actions = '';
    	switch ($status) {
    		case 'fm_orders_authorized':
    		  $actions = l('Capture', 'admin/fadmashion/wpp/capture/' . $order->order_id, array('query' => drupal_get_destination()) );
    		  $actions .= ' | ' . l('Void', 'admin/fadmashion/wpp/void/' . $order->order_id, array('query' => drupal_get_destination()) );
    		  break; 
    		default:
    			break;
    	}
    	$balance = commerce_payment_order_balance($order);
    	$balance = commerce_currency_format($balance['amount'], $balance['currency_code']);
  	  $rows[] = array(
  	    l($order->order_id, 'admin/commerce/orders/' . $order->order_id),
  	    fm_users_fullname($order->uid),
  	    date('M D Y', $order->changed),
  	    $statuses[$status]['title'],
  	    $balance. ' (' .l('payment history', 'admin/commerce/orders/' . $order->order_id . '/payment') . ')',
  	    $actions
   	  );
    }
   	
   	$output .=  theme ('table', array('header' => $header, 'rows' => $rows));
  } else {
  	$output .= t('No Orders Have Been Placed Yet for this Deal');
  }
  
	return $output;
	
}