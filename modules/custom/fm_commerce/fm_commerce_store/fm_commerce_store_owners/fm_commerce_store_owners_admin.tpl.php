
<div class="owners-admin-wrapper">
	
	<div id="paypal_header">
	  <div>
	    <img  class="paypal_logo" src="/<?php print drupal_get_path("theme","fadmashion_commerce"); ?>/images/paypal_logo.gif">
	  </div>
	  <div> Business Email Address</div>
	</div>
	<?php print render(drupal_get_form('fm_commerce_store_owners_admin_form')); ?>
	<div class="error_container"></div>
</div>

