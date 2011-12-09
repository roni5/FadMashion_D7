<?php 
  $product = fm_commerce_get_order_product($order);
  $store = fm_commerce_get_store($product);
	$image = fm_commerce_product_image_thumb($product, 'fm_product_confirm', array('style' => "border: 1px solid #e2dcd6; width: 142px;"));
	$row_info = fm_commerce_orders_row_info($order);
	$order_details = theme('fm_commerce_orders_extra_info', array('color' => $row_info['color'], 'size' => $row_info['size']));
  $order_view = commerce_order_ui_order_view($order, 'customer');
  
  $payout = fm_commerce_store_order_payout_value($order, $store);
  $payout = commerce_currency_format($payout, 'USD', NULL, true);
  
  $order_wrapper = entity_metadata_wrapper('commerce_order', $order);
  $tracking_id = $order_wrapper->field_tracking_id->value();
  $tracking_company = $order_wrapper->field_tracking_company->value();
  $opts = fm_commerce_store_owners_shipping_company_opts();
?>

<div style="width: 400px; " class="orders_admin_wrapper">
<h1>Cha-Ching!</h1>
<p>We have credited your Paypal business account.  </p>

<div style="margin: 10px 0; overflow: hidden;">
<div class="image" style="float: left; width: 146px; margin-right: 10px;">
<?php print $image;?>
</div>

<div style="float: left; width: 240px;">

<?php print fm_commerce_store_order_display_commission($order, $store);  ?>

<br clear="all">
<div style="margin-top: 10px;font-size: 13px; m"><?php print $opts[$tracking_company] . ': ' . $tracking_id;?></div>




</div>



</div></div>