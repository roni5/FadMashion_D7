<h1 style="font-weight: normal; font-size: 28px; margin-top: 0;">Savvy darling. Very savvy. </h1>
<p style="margin-bottom: 10px; font-size: 14px; line-height: 18px; margin-top: 0;">If your deal is "on" you will be notified, and your designer will ship your item as described under the product description on their deal page. Thank you for shopping with Fadmashion, the best way to shop Independent Fashion online. </p>

    
    <table cellspacing="0" cellpadding="10" class="message" style="margin: 10px 0 25px 0; background: #ffffff; border: 1px solid #e2dcd6"><tbody>
<tr>
<td class="confirmation" colspan="2" style="vertical-align: top; background: #f8f5f2; border-bottom:1px solid #e2dcd6">Confirmation Number :   <b><?php print $order->order_id?></b>
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


//////////

http://www.fadmashion.com/sites/default/files/styles/fm_main_product_image/public/Look2_0.jpg

<?php $deals_url = url('deals', array('absolute' => true)); $theme_path = drupal_get_path("theme","fadmashion_commerce");?>

<div class="tweet">Discover beautiful contemporary dresses, bags and accessories at exclusive prices, one designer at a time.  <a href="javascript:fmDisplayDropDown()">How it Works.</a></div>

<div class="icons">
<a href="javascript:void(0);" onClick="javascript:fm_deals_facebookshare( '<?php print $deals_url?>', '<?php print $theme_path?>');"><img src="/<?php print $theme_path?>/images/icon_share_facebook.jpg"></a>
<a href="#"><img src="/<?php print $theme_path;?>/images/icon_share_twitter.jpg"></a></div> 

<div class="text">Share deal with friends!</div>

<?php drupal_add_js(drupal_get_path('module', 'fm_carousel').'/fm_carousel.js'); ?>