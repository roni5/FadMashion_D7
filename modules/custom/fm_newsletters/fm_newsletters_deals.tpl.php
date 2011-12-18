<style>
*{font-family: Helvetica, Arial, sans-serif; text-decoration:none; margin: 0; padding: 0; border: none;}
a{color: #0373a7; font-family:Georgia, "Times New Roman", Times, serif; font-style:italic;}
.side1{background: #fff; height: 18px;}
.side2{background: #a02b24; height: 43px;}
.side3{background: #f4f0ed; }
.side4{background: #e9e3de; height: 24px;}
.side5{background: #e9e3de; border-bottom: 3px solid #a02b24; padding-bottom: 14px;}

.logo{padding: 20px 0 14px 0;}
.header{text-align: right; font-size: 18px; color: #a02b24}

.featureHead{background: #a02b24; line-height: 43px; color: #fff; text-align:center}
.featureInfo{background: #f4f0ed; height: 280px; text-align:center; }
.featureInfo .pad{padding: 22px 24px 0 24px;}

h1{font-size: 22px; font-weight:normal; margin: 0 0 9px 0;}
h2{font-family:Georgia, "Times New Roman", Times, serif; font-style:italic; font-weight:normal; color: #89786f; font-size: 15px; border-bottom: 1px solid #e9e3de; margin-bottom: 15px; padding-bottom: 15px;}
.featureInfo  p{font-size: 14px; margin-bottom: 12px; line-height: 18px;}
.finePrint{padding-top: 12px; font-size: 12px; color: #89786f; text-align:center; }

.designerInfo{background: #e9e3de;}

.photo{background: #e9e3de;}
.mainPhoto{background: #fff; padding: 9px;}
.shadow_newsletter{display: block;}
.designerLogo{width: 118px;}

.designerQuote .box{background: #f8f6f4; width: 510px;}
.designerQuote img{display: block;}
.designerQuote .pad{padding: 12px 24px; text-align:center; font-family:Georgia, "Times New Roman", Times, serif; font-style:italic; font-weight:normal; color: #89786f; line-height: 22px;}
.quoteNub{width: 40px; text-align:right;}
.button{background-color: #ba443d; background-image: url(bg-button.jpg); background-position: top left; background-repeat:repeat-x; display: block; line-height: 37px; height: 37px; color: #fff; text-align:center;border-radius:5px; -webkit-border-radius: 5px; -moz-border-radius: 5px; padding: 0 15px; width: 120px; margin-left: 118px; }

.bio h1, .press h1{font-size: 16px; margin: 15px 0 10px 0; color: #89786f; font-weight:normal;}
.bio {padding-right: 50px;}
.bio, .press{font-size: 13px; line-height:18px;}
p{margin-bottom: 8px;}
.press div{margin: 0 0 16px 0; font-style:italic; font-family:Georgia, "Times New Roman", Times, serif; line-height: 19px;}
.press .source{display: block;}

.upcoming {width: 171px; padding-top: 30px;}
.upcoming  img{display: block;}
.upcoming table{width: 171px;}
.upcoming h1, .upcoming h2{text-align: center; border: none; padding: 0;}
.upcoming h1{font-size: 16px; margin: 6px 0;}
.upcoming h2{font-size: 14px;}
.upcomingRowDivider{padding: 10px; border-bottom: 1px solid #e9e3de; height: 20px; }

.moreDealsHeader{text-align: center; padding: 20px 0 0 0; color: #a02b24; font-size: 21px;}
.time{color: #89786f; background: #eee9e5; border-right: 1px solid #d5cdc4;text-align:center; padding: 8px 0;}
.savings{color: #a02b24;background: #eee9e5; border-left: 1px solid #fff; text-align:center; padding: 8px 0;}

.field-name-field-quick-facts .field-items div {margin-bott: 8px;}

</style>



<?php
	$full_url = fm_newsletters_image_path();
    
?>

<table width="100%" cellspacing="0" cellpadding="0" border="0">
<tbody><tr>
<td class="">&nbsp;</td>
<td width="400" class="logo"><a href="http://www.fadmashion.com"><img alt="Fadmashion.com | Choose Independent Fashion" src="<?php print $full_url;?>logo_black.jpg"></a></td>
<td width="276" class="header">Today's Exclusive Deals</td>
<td class="">&nbsp;</td>
</tr>
</tbody></table>
            
            
<?php print $featured; ?>
<?php print $more; ?>