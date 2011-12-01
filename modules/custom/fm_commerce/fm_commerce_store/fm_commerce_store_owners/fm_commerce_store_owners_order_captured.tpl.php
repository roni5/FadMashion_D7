
<?php 
  $product = fm_commerce_get_order_product($order);
	$image = fm_commerce_product_image_thumb($product, 'fm_product_confirm', array('style' => "border: 1px solid #e2dcd6; width: 142px;"));
	$row_info = fm_commerce_orders_row_info($order);
	$order_details = theme('fm_commerce_orders_extra_info', array('color' => $row_info['color'], 'size' => $row_info['size']));
  $order_view = commerce_order_ui_order_view($order, 'customer');
?>

<div class="orders_admin_wrapper">
<h1>Prepare Item for Shipping</h1>

<div class="orders_shippment_form">

<div class="step1">
<h2>Step #1: Ship It</h2>
<h3><?php print $product->title; ?></h3>
<div><?php print $order_details; ?></div>
<div class="image" style="width: 146px;">
<?php print $image;?>
</div>
<div class="details">
<?php print render($order_view['commerce_customer_shipping']); ?>
</div>
</div>

<div class="step2">
<h2>Step #2: Get Payed!</h2>
<p>Enter your shipping confirmation number, so we can verify and release payment</p>
<?php print render(drupal_get_form('fm_commerce_store_owners_shippment_form', $order)); ?>
</div>


</div> <!-- End orders_shippement_form -->

</div>