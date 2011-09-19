<?php


/**
 * Implements hook_rules_action_info().
 *
 * Provides an action to adjust stock level of a certain product
 * by a certain quantity.
 */
function fm_commerce_stock_rules_action_info() {
  $actions = array();

  $actions['fm_commerce_stock_decrease_by_line_item'] = array(
    'label' => t('Decrease the product stock level, given a line item'),
    'group' => t('Commerce Stock'),
    'parameter' => array(
      'commerce_line_item' => array(
        'type' => 'commerce_line_item',
        'label' => t('Line item')
      ),
    ),
  );
  $actions['fm_commerce_stock_increase_by_line_item'] = array(
    'label' => t('Increase the product stock level, given a line item'),
    'group' => t('Commerce Stock'),
    'parameter' => array(
      'commerce_line_item' => array(
        'type' => 'commerce_line_item',
        'label' => t('Line item')
      ),
    ),
  );

  return $actions;
}

/**
 * If the line item is stock-enabled, subtract the sold amount in a line item
 * from stock.
 *
 * @param $line_item
 *   A line item object.
 */
function fm_commerce_stock_decrease_by_line_item($line_item) {
	
  if ($line_item->type == 'product') {
  	
	  $line_item_wrapper = entity_metadata_wrapper('commerce_line_item', $line_item);
	  
	  $color = $line_item_wrapper->field_order_color->value();
	  $size = $line_item_wrapper->field_order_size->value();
	  
	
    // The product SKU that will have its stock level adjusted.
    $sku = $line_item->line_item_label;
    $product = commerce_product_load_by_sku($sku);
    $qty = (int) $line_item->quantity;
    if(empty($color) && empty($size)) { 
      fm_commerce_stock_adjust($product, array('none' => array('qty' => -$qty) ));
    }
    else { 
    	// Subtract the sold amount from the available stock level.
      fm_commerce_stock_adjust($product, array('color' => array('value' => $color, 'qty' => -$qty), 'size' => array('value' => $size, 'qty' => -$qty)) );
    }
    
  }
}

/**
 * If the line item is stock-enabled, subtract the sold amount in a line item
 * from stock.
 *
 * @param $line_item
 *   A line item object.
 */
function fm_commerce_stock_increase_by_line_item($line_item) {
  if ($line_item->type == 'product') {
    // The product SKU that will have its stock level adjusted.
    $sku = $line_item->line_item_label;
    $product = commerce_product_load_by_sku($sku);
    $qty = (int) $line_item->quantity;
    // Subtract the sold amount from the available stock level.
    fm_commerce_stock_adjust($product, $qty);
  }
}

