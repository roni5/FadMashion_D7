<?php 
  $product = fm_commerce_get_order_product($order);
  $store = fm_commerce_get_store($product);
	$image = fm_commerce_product_image_thumb($product, 'fm_product_confirm', array('style' => "border: 1px solid #e2dcd6; width: 142px;"));
	$row_info = fm_commerce_orders_row_info($order);
	$order_details = theme('fm_commerce_orders_extra_info', array('color' => $row_info['color'], 'size' => $row_info['size']));
  $order_view = commerce_order_ui_order_view($order, 'customer');
  
  $commission = fm_commerce_store_order_commission_value($order, $store) ;
  $payout = fm_commerce_store_order_payout_value($order, $store);
  
  
  $order_wrapper = entity_metadata_wrapper('commerce_order', $order);
  $tracking_id = $order_wrapper->field_tracking_id->value();
  $tracking_company = $order_wrapper->field_tracking_company->value();
  $opts = fm_commerce_store_owners_shipping_company_opts();
?>

<div class="orders_admin_wrapper">
<h1>Order Details</h1>

<div style="margin: 10px 0; overflow: hidden;">
<div class="image" style="float: left; width: 146px; margin-right: 10px;">
<?php print $image;?>
</div>

<div style="float: left;">
<div>FM Commission Value: <?php print commerce_currency_format($commission, 'USD'); ?></div>
<div>Payout to Designer: <?php print commerce_currency_format($payout, 'USD'); ?></div>

<div style="margin-top: 10px;">Tracking Company: <?php print $opts[$tracking_company];?></div>
<div>ID #: <?php print $tracking_id;?></div>

<h3><?php print $product->title; ?></h3>
<div><?php print $order_details; ?></div>

<div style="margin-top: 10px;" class="details">
<?php print render($order_view['commerce_customer_shipping']); ?>
</div>

</div>



</div></div>