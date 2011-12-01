<?php 
  $product = fm_commerce_get_order_product($order);
	$image = fm_commerce_product_image_thumb($product, 'fm_product_confirm', array('style' => "border: 1px solid #e2dcd6; width: 142px;"));
	$row_info = fm_commerce_orders_row_info($order);
	$order_details = theme('fm_commerce_orders_extra_info', array('color' => $row_info['color'], 'size' => $row_info['size']));
  $order_view = commerce_order_ui_order_view($order, 'customer');
  
  
  
  $order_wrapper = entity_metadata_wrapper('commerce_order', $order);
  $tracking_id = $order_wrapper->field_tracking_id->value();
  $tracking_company = $order_wrapper->field_tracking_company->value();
  $opts = fm_commerce_store_owners_shipping_company_opts();
?>


<h2><?php print $product->title; ?> Shipped!</h2>
<div style="margin: 10px 0; overflow: hidden;">
<div class="image" style="float: left; width: 146px; margin-right: 10px;">
<?php print $image;?>
</div>

<div style="float: left;">
<h3>Tracking Info</h3>
<div style="margin-top: 10px;">Service: <?php print $opts[$tracking_company];?></div>
<div>ID #: <?php print $tracking_id;?></div>


<div style="margin-top: 10px;" class="details">
<?php print render($order_view['commerce_customer_shipping']); ?>
</div>


</div>

</div>


