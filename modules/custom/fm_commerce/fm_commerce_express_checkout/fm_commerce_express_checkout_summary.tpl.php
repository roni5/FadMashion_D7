

              
<div class="form"> 
<div id="billing_info">
<h3>Billing Information:</h3>
<br>
<div><b>Name: </b> <?php print $credit_card['owner'];?></div>
<div><b>CC #: </b> <?php print $credit_card['number'];?> </div>
<div><b>Exp.: </b> <?php print $credit_card['exp_month'];?>/<?php print $credit_card['exp_year'];?></div>
<br><div><b>Address:</b></div>
<div><?php print $billing_address['thoroughfare']?></div>
<div><?php print $billing_address['locality']?>, <?php print $billing_address['administrative_area']?> <?php print $billing_address['postal_code']?></div>
</div>
<div id="shipping_info">
<h3>Shipping Address:</h3>
<br>
<div><?php print $shipping_address['name_line']?></div>
<div><?php print $shipping_address['thoroughfare']?></div>
<div><?php print $shipping_address['locality']?>, <?php print $shipping_address['administrative_area']?> <?php print $shipping_address['postal_code']?></div>
</div>
</div>   

