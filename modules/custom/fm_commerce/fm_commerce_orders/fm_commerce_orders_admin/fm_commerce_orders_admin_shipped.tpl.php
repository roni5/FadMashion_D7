<?php 
  $product = fm_commerce_get_order_product($order);
  $store = fm_commerce_get_store($product);
	$image = fm_commerce_product_image_thumb($product, 'fm_product_confirm', array('style' => "border: 1px solid #e2dcd6; width: 142px;"));
	$row_info = fm_commerce_orders_row_info($order);
	$order_details = theme('fm_commerce_orders_extra_info', array('color' => $row_info['color'], 'size' => $row_info['size']));
  $order_view = commerce_order_ui_order_view($order, 'customer');
  
  $payment_amount = fm_commerce_store_order_display_commission($order, $store);
  
  $store_wrapper = entity_metadata_wrapper('fm_commerce_store', $store);
  $commission = $store_wrapper->field_fm_commission->value();
  
  $order_wrapper = entity_metadata_wrapper('commerce_order', $order);
  $tracking_id = $order_wrapper->field_tracking_id->value();
  $tracking_company = $order_wrapper->field_tracking_company->value();
  $opts = fm_commerce_store_owners_shipping_company_opts();
?>

<div style="width: 500px;" class="orders_admin_wrapper">
<h2 style="color: red">Designer Needs Paypal Payment</h2>


<div style="margin: 10px 0; overflow: hidden;">
<div class="image" style="float: left; width: 146px; margin-right: 10px;">
<?php print $image;?>
</div>

<div style="float: left; width: 335px;">
<h2><?php print $product->title;?></h2>
<h3>Payment Calculations:</h3>
<?php print $payment_amount; ?>

<br clear="all">

<div style="float: left; width: 160px;">
<h3>Verify Shipping:</h3>
<div style="margin-top: 10px;">Tracking Company: <?php print $opts[$tracking_company];?></div>
<div>ID #: <?php print $tracking_id;?></div>


<div style="margin-top: 10px; width: 170px;" class="details">
<?php print render($order_view['commerce_customer_shipping']); ?>
</div>
</div>
<div style="float: left;">
<h3>Paypal Business E-mail:</h3>
<strong><?php 
  $store_wrapper = entity_metadata_wrapper('fm_commerce_store', $store);
  $mail = $store_wrapper->field_paypal_email->value(); 
  if(isset($mail)) { print $mail; }
  else { print '<span style="color: red">No Paypal E-mail Added.  Please Add!</span>';}
?>
</strong>
<br><br>
<?php print render(drupal_get_form(fm_commerce_orders_admin_paid_form, $order)); ?>
</div>


</div>
</div>
</div>