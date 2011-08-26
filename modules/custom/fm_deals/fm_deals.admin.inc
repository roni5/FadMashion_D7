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
	 
  $header = array('Product Name',  'Qty Min', 'Qty Purchased','Deal Status', 'Stock' ,'Store Name', 'Operations' );
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
    $qty = fm_deals_qty_purchased($node->nid);
    $rows[] = array(l($product->title, 'node/' . $node->nid),
      $qty_min, $qty, fm_deals_states_status_msg($node, $qty),
      fm_deals_has_stock($node->nid) ? 'Has Stock' : '<span style="color: red;">Out of Stock</span>',
      $store->name,
      l('edit deal', 'node/'.$node->nid.'/edit') . ' | ' . l('edit product', 'admin/commerce/products/' . $product->product_id  . '/edit' )
		);
  }
	
  
	$output = theme ('table', array('header' => $header, 'rows' => $rows));
	
	return $output;
}