<h1 style="font-weight: normal; font-size: 28px; margin-top: 0;">Savvy darling. Very savvy. </h1>
<p style="margin-bottom: 10px; font-size: 14px; line-height: 18px; margin-top: 0;">Thank you for shopping with Fadmashion.com.  Below are the deatils of your order. We will send you an e-mail as soon as your item is shipped.</p>

    
    <table cellspacing="0" cellpadding="10" class="message" style="margin: 10px 0 25px 0; background: #ffffff; border: 1px solid #e2dcd6"><tbody>
<tr>
<td class="confirmation" colspan="2" style="vertical-align: top; background: #f8f5f2; border-bottom:1px solid #e2dcd6">Order #<b><?php print $order->order_id?></b>
</td>
        </tr>
<tr>
<td class="col1" style="width: 146px; vertical-align: top;"><a href="#" style="color: #1c7eb4;"><?php print $thumb;?></a></td>
            <td class="col2" style="vertical-align: top;">
            <div class="itemName" style="font-size: 16px; font-weight: bold; line-height: 20px; margin-bottom: 4px;"><?php print $product->title; ?></div>
        <div class="designer" style="font-size: 12px; padding-bottom: 10px; border-bottom: 1px solid #e2dcd6;"><?php print $shop->name; ?></div>
        <div class="shippingTime" style="font-size: 12px; padding: 10px 0; border-bottom: 1px solid #e2dcd6;">Shipping Time: 4-5 weeks</div>
     <?php 
$order_view = commerce_order_ui_order_view($order, 'customer');
?>    
        <div class="ships" style="color: #a4897b; font-size: 12px; font-weight: bold; margin-top: 10px;">SHIPS TO:</div>
        <p style="margin-bottom: 10px; font-size: 14px; line-height: 18px; margin-top: 0;"><?php print render($order_view['commerce_customer_shipping']);  ?></p>
        
        
            </td>
        </tr>
</tbody></table>
<p style="margin-bottom: 10px; font-size: 14px; line-height: 18px; margin-top: 0;">Sign into your account on <a href="http://www.fadmashion.com" style="color: #1c7eb4;">Fadmashion</a> to review your purchase confirmation. Thanks for shopping with us and for supporting Independent Fashion!</p>
<p class="signature" style="margin-bottom:10px;font-size:12px;line-height:18px;margin-top:0;font-style:italic;">- The Fadmashion Team</p>
<br><br>

