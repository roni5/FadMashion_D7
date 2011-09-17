
<div class="bar" style="background: #A5332C; height: 36px; line-height: 36px; font-size: 18px; font-weight:bold; color: #fff; position: relative; top: -18px; padding-left: 8px;">
<img align="absmiddle" src="<?php print url('', array('absolute' => true)) . drupal_get_path("theme","fadmashion_commerce"); ?>/images/bar_timer_icon.jpg"> Deal Reminder</div>

	<table cellspacing="0" cellpadding="0" class="message" style="margin: 10px 0 25px 0;  "><tbody><tr>
<td class="col1" style="width: 146px; vertical-align: top;"><a href="#" style="color: #1c7eb4;"><?php print $thumb; ?><img src="<?php print url('', array('absolute' => true)) . drupal_get_path("theme","fadmashion_commerce"); ?>/images/mail_view_item.jpg"></a></td>
    <td class="col2" style="vertical-align: top;padding-left: 25px; ">
    <div class="itemName" style="font-size: 16px; font-weight: bold; line-height: 20px; margin-bottom: 4px;"><?php print $product->title; ?></div>
<div class="designer" style="font-size: 12px; padding-bottom: 10px; border-bottom: 1px solid #e2dcd6;">by <?php print $shop->name; ?></div>
<p style="margin-bottom: 10px;  font-size: 14px; line-height: 18px; margin-top: 0;">This is a reminder that in 15 minutes, the deal you were interested in on Fadmashion will start. Check out the <?php print l('preview page', 'deals/preview', array('absolute' => true));?> and get ready to shop!</p>
<p style="margin-bottom: 10px; font-size: 14px; line-height: 18px; margin-top: 0;">Enjoy!</p>
<p class="signature" style="margin-bottom:10px;font-size:12px;line-height:18px;margin-top:0;font-style:italic;">- The Fadmashion Team</p>
</td>
    </tr></tbody></table>



