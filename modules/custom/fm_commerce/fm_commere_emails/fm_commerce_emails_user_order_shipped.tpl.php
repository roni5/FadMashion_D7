<?php 
  $order_wrapper = entity_metadata_wrapper('commerce_order', $order);
  $tracking_id = $order_wrapper->field_tracking_id->value(); 
  $tracking_company = $order_wrapper->field_tracking_company->value();
  $opts = fm_commerce_store_owners_shipping_company_opts();
  
  $payout = fm_commerce_store_order_payout_value($order, $shop);
  $commission = fm_commerce_store_order_commission_value($order, $shop);
?>

<h1 style="font-weight: normal; font-size: 28px; margin-top: 0;">Your order is on its way! </h1>
<p style="margin-bottom: 10px; font-size: 14px; line-height: 18px; margin-top: 0;"><?php print $shop->name?> has confirmed shipping.  It should be arriving to you shortly.  If you have issues, please contact us.   </p>

    
    <table cellspacing="0" cellpadding="10" class="message" style="margin: 10px 0 25px 0; background: #ffffff; border: 1px solid #e2dcd6"><tbody>
<tr>
<td class="confirmation" colspan="2" style="vertical-align: top; background: #f8f5f2; border-bottom:1px solid #e2dcd6">Order # :   <b><?php print $order->order_id?></b>
</td>
        </tr>
<tr>
<td class="col1" style="width: 146px; vertical-align: top;"><a href="#" style="color: #1c7eb4;"><?php print $thumb;?></a></td>
            <td class="col2" style="vertical-align: top;">
            <div class="itemName" style="font-size: 16px; font-weight: bold; line-height: 20px; margin-bottom: 4px;"><?php print $product->title; ?></div>
        <div class="tracking_info" style="font-size: 12px; padding: 10px 0; border-bottom: 1px solid #e2dcd6;">Tracking: <?php print $opts[$tracking_company] . ': ' . $tracking_id;?></div>
     <?php 
$order_view = commerce_order_ui_order_view($order, 'customer');
?>    
        <div class="ships" style="color: #a4897b; font-size: 12px; font-weight: bold; margin-top: 10px;">SHIPS TO:</div>
        <p style="margin-bottom: 10px; font-size: 14px; line-height: 18px; margin-top: 0;"><?php print render($order_view['commerce_customer_shipping']);  ?></p>
        
        
            </td>
        </tr>
</tbody></table>
<p style="margin-bottom: 10px; font-size: 14px; line-height: 18px; margin-top: 0;"><?php print l('Login to your Fadmashion account', '', array('absolute' => true, 'query' => array('login' => 1) ));?> to check the status of your order at anytime. Enjoy your purchase!</p>
<p class="signature" style="margin-bottom:10px;font-size:12px;line-height:18px;margin-top:0;font-style:italic;">- The Fadmashion Team</p>
<br><br>

