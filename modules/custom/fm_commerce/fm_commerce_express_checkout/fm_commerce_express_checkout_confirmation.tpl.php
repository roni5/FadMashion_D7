

<div class="header">
   <a class="print" href="javascript:window.print();">PRINT THIS PAGE</a>
   <h1>Thank You!</h1>
   <h2>Your order has been successfully placed.</h2>
</div>

<?php $url = url('static', array('alias' => true, 'fragment' => '!'));
$url2 = url('contact-us', array('query' => array('page' => 'contact-us')));
$url = $url . $url2;
?>
<div class="orderNumber"><span>Order #<?php print $order->order_id; ?></span>  View the status of your order <?php print l('here', 'user/orders');?>, or <a href="<?php print $url; ?>">contact us</a> anytime.</div>

<div class="orderDetails">
     <?php foreach($product_line_items as $product_line_item) {print $product_line_item; print '<br clear="all">'; } ?>
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
            <?php print render($order_view['commerce_order'][$order->order_id]['commerce_customer_billing']); ?>
            </div>
            
               <div class="shipping">
            <h1>Shipping</h1>
            <?php print render($order_view['commerce_order'][$order->order_id]['commerce_customer_shipping']); ?>
            </div>
            
            <div class="back"><?php print l('Continue', 'shop', array('attributes' => array('class' => array('button'))));?></div>
</div>