<?php 
  $product = fm_commerce_get_order_product($order);
	$image = fm_commerce_product_image_thumb($product, 'fm_product_confirm', array('style' => "border: 1px solid #e2dcd6; width: 142px;"));
	$row_info = fm_commerce_orders_row_info($order);
	$order_details = theme('fm_commerce_orders_extra_info', array('color' => $row_info['color'], 'size' => $row_info['size']));
  $order_view = commerce_order_ui_order_view($order, 'customer');
  
?>


<div  class="orders_admin_wrapper">
<h1>Shipped</h1>
<p>We will be in touch shortly to process payment once we have confirmed the item has been shipped.  Thank you for your patience.</p>

<div style="margin: 10px 0; overflow: hidden;">
<div class="image" style="float: left; width: 146px; margin-right: 10px;">
<?php print $image;?>
</div>

<div style="float: left;">
<h3><?php print $product->title; ?></h3>
<div><?php print $order_details; ?></div>

<div class="details">
<?php print render($order_view['commerce_customer_shipping']); ?>
</div>

<h2>Tracking Info:</h2>
<?php print render(drupal_get_form('fm_commerce_store_owners_shippment_form', $order)); ?>
</div>

</div>



</div>


</div>