<?php 
  $product = fm_commerce_get_order_product($order);
  $store = fm_commerce_get_store($product);
	$image = fm_commerce_product_image_thumb($product, 'fm_product_confirm', array('style' => "border: 1px solid #e2dcd6; width: 142px;"));
	$row_info = fm_commerce_orders_row_info($order);
	$order_details = theme('fm_commerce_orders_extra_info', array('color' => $row_info['color'], 'size' => $row_info['size']));
  $order_view = commerce_order_ui_order_view($order, 'customer');
  
  $logo = field_view_field('fm_commerce_store', $store, 'field_logo', 'node_full');
  
?>
<div  class="orders_admin_wrapper">

<p><?php print $store->name; ?> is preparing your shippment.  We will notify you by e-mail when your order has been shipped. </p>
<div style="margin: 10px 0; overflow: hidden;">
<div class="image" style="float: left; width: 146px; margin-right: 10px;">
<?php print $image;?>


</div>

<div style="float: left; width: 170px;">
<h3><?php print $product->title; ?></h3>
<div><?php print $order_details; ?></div>

<div style="margin-top: 10px;" class="details">
<?php print render($order_view['commerce_customer_shipping']); ?>
</div>
<div style="margin-top:10px; "><?php print render($logo);?></div>

</div>

</div>

</div>