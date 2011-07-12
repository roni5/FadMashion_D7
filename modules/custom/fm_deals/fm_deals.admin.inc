<?php

function fm_deals_list() {
	$query = new EntityFieldQuery();
  
	$entities = $query->entityCondition('entity_type', 'node')
                    ->entityCondition('bundle', 'fm_group_buying')
                    ->propertyCondition('status', 1)
                    ->fieldCondition('field_start_time', 'value', REQUEST_TIME, '>')
                    ->fieldOrderBy('field_start_time', 'value', 'ASC')
                    ->execute();  
                    
  $header = array('Product Name', 'Start time', 'End Time', 'Qty Min', 'Store Name', 'Operations' );
  $rows = array();
  foreach($entities['node'] as $node) {
  	$node = node_load($node->nid);
  
    $product = fm_commerce_get_product($node);
    $store = fm_commerce_get_store($product);
    
    $product_name = field_get_items('commerce_product', $product, 'name');
   
    $qty_min = $node->field_quantity_min['und'][0]['value'];
    $start_time = format_date(strtotime($node->field_start_time['und'][0]['value'] ), 'custom', "F j, Y, g:i a", $node->field_start_time['und'][0]['timezone']);
    $end_time = format_date(strtotime($node->field_start_time['und'][0]['value2'] ), 'custom', "F j, Y, g:i a", $node->field_start_time['und'][0]['timezone']);
    
    var_dump($node->field_start_time['und'][0]['timezone']);
    $rows[] = array(l($product->title, 'node/' . $node->nid),
      $start_time, 
      $end_time,
      $qty_min,
      $store->name,
      l('edit', 'node/'.$node->nid.'/edit') 
		);
  }
	
  $output = '<ul class="action-links"><li>' . l('Add a Deal', 'node/add/fm-group-buying') .'</li></ul>';
	$output .= theme ('table', array('header' => $header, 'rows' => $rows));
	
	return $output;
}