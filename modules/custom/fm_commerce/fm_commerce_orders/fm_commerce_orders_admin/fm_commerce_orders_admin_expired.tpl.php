<?php 
  $product = fm_commerce_get_order_product($order);
	$image = fm_commerce_product_image_thumb($product, 'fm_product_confirm', array('style' => "border: 1px solid #e2dcd6; width: 142px;"));
	$row_info = fm_commerce_orders_row_info($order);
	$order_details = theme('fm_commerce_orders_extra_info', array('color' => $row_info['color'], 'size' => $row_info['size']));
  $order_view = commerce_order_ui_order_view($order, 'customer');
  
  $user = user_load($order->uid);
  
?>

<div class="orders_admin_wrapper">
<h2> Deal Expired, No Checkout </h2>

<div style="margin: 10px 0; overflow: hidden;">
<div class="image" style="float: left; width: 146px; margin-right: 10px;">
<?php print $image;?>
</div>

<div style="float: left; width: 170px;">
<h3><?php print $product->title?></h3>
<p>Possibly contact <?php print fm_users_firstname($uid); ?> at <a href="mailto:<?php print $user->mail ?>"><?php print $user->mail;?></a> to ask why</p>

</div>
</div>
</div>