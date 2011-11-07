
<div class="owners-admin-wrapper">
	
	<div class="owners-admin-section paypal-wrapper">
	  <div id="paypal_header">
  	  <div>
	      <img  class="paypal_logo" src="/<?php print drupal_get_path("theme","fadmashion_commerce"); ?>/images/paypal_logo.gif">
	    </div>
	   <div> Business Email Address</div>
	 </div>
	  <div id="paypal_subheader">(Where You Want to get Paid)</div>
	  <?php print render(drupal_get_form('fm_commerce_store_owners_admin_form')); ?>
	  <div class="error_container"></div>
	</div>
	
	<div class="owners-admin-section orders-wrapper">
	  <div id="orders_header">
	    Orders for <span><?php $store = fm_commerce_store_owners_get_store();
	          print $store->name;
	    ?></span>
	  </div>
	</div>
	
	
	
	
</div>

