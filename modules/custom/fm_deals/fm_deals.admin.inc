<?php



function fm_deals_admin_page() {
  return fm_deals_list();	
}

function fm_deals_generate_auto_schedule() {
	$query = new EntityFieldQuery();
  
	$entities = $query->entityCondition('entity_type', 'node')
                    ->entityCondition('bundle', 'fm_group_buying')
                    ->propertyCondition('status', 1)
                    ->execute();  
  
}

function fm_deals_list() {
	$query = new EntityFieldQuery();
  
	$entities = $query->entityCondition('entity_type', 'node')
                    ->entityCondition('bundle', 'fm_group_buying')
                    ->propertyCondition('status', 1)
                    ->execute();  
                    
  $header = array('Product Name',  'Qty Min', 'Store Name', 'Operations' );
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
    $rows[] = array(l($product->title, 'node/' . $node->nid),
      $qty_min,
      $store->name,
      l('edit', 'node/'.$node->nid.'/edit') 
		);
  }
	
  $output = '<ul class="action-links"><li>' . l('Add a Deal', 'node/add/fm-group-buying') .'</li></ul>';
	$output .= theme ('table', array('header' => $header, 'rows' => $rows));
	
	return $output;
}