
<?php print l('Back to My Orders','my-orders', array('query' => array('width' => '700px'),  'attributes' => array('class' => array('colorbox-load', 'back') )) );?>

<div class="orderDetails-col1" >
<div class="orderNumber"><span>Order #<?php print $order->order_id; ?></span>  </div><br>
<div class="orderDetails">
     <?php foreach($product_line_items as $product_line_item) {print $product_line_item; print '<br clear="all">';} ?>
     <br clear="all">
     <div class="totals">
     <?php foreach($totals_line_items as $total_line_item) {print $total_line_item; } ?>
     </div><!-- totals-->     
 </div>  
<?php 
$order_view = commerce_order_ui_order_view($order, 'customer');
?> 
 <div class="addresses">
            <div class="billing">
            <h1>Billing</h1>
            <?php print render($order_view['commerce_customer_billing']); ?>
            </div>
            
               <div class="shipping">
            <h1>Shipping</h1>
            <?php print render($order_view['commerce_customer_shipping']); ?>
            </div>
</div>

</div>


<div class="assistance">
 <div class="pad">
<?php print render($customer_service_form);?>
 </div>
</div>


