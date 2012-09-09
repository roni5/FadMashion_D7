<?php

/**
 * @file
 * Template when sending a message to friends.
 */
?>

<div class="wrapper" align="center" style="height: 100%; background-color: #221e1b; padding: 20px 0 ;">
<table cellpadding="0" cellspacing="0" width="600" style="margin: 0 auto;">
<tr>
<td colspan="2" style="color: #fff; font-size: 18px;"><img src="<?php print $theme_url?>/images/emails/template2/header.jpg" alt="Fadmashion" style="border: none; display: block;"></td>
</tr>
<tr>
<td class="content" valign="top" style="background-color: #f0f0e8;">

<div class="pad" style="padding: 24px 15px 10px 50px">
<h1 style="font-size:18px;width:auto;margin:9px 0;">Insider Access</h1>
<p style="margin: 0 0 10px 0; font-size: 14px;color: #221e1b; font-family: Arial, Helvetica, sans-serif; text-align:left;"><?php print $body;?></p>

<div class="signUp" style="float: left; display: block; margin: 20px 0;">
<img src="<?php print $theme_url?>/images/emails/b_left.jpg" class="buttonEdge" style="border:none;display:block;float:left;"><a href="<?php print $params['reg_url'];?>" class="button" style="color:#fff;height:54px;font-size:19px;line-height:54px;padding:0 20px;background:#937c72;text-decoration:none;float:left;">Open Invitation</a><img src="<?php print $theme_url?>/images/emails/b_right.jpg" class="buttonEdge" style="border:none;display:block;float:left;">
</div>
<br clear="all"><p style="margin: 0 0 10px 0; font-size: 14px;color: #221e1b; font-family: Arial, Helvetica, sans-serif; text-align:left;">- <?php print $params['fromName'];?></p>

<div class="quote" style='padding: 80px 0 0 0; color: #796155; font-family:Georgia, "Times New Roman", Times, serif; font-style:italic; font-size: 13px; line-height: 20px;'>
 "Fadmashion.com has changed, and so has the way you'll shop for independent fashion from now on."
 <img src="<?php print $theme_url?>/images/emails/myfashionlife.jpg" alt="-myfashionlife" align="right" style="display:block;margin-top:14px;border:none;">
</div>



</div>
</td>

<td width="237"><img src="<?php print $theme_url?>/images/emails/template2/model.jpg" style="border: none; display: block;"></td>
</tr>
<tr>
<td colspan="2"><img src="<?php print $theme_url?>/images/emails/template2/footer.jpg" style="border: none; display: block;"></td>

</tr>
</table>
</div>

