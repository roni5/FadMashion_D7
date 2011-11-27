
<div class="owners-admin-section paypal-wrapper">
	  <div id="paypal_header">
  	  <div>
	      <img  class="paypal_logo" src=" <?php print pp(); ?>paypal_logo.gif">
	    </div>
	   <div> Business Email Address</div>
	 </div>
	  <div id="paypal_subheader">(Where You Want to get Paid)</div>
	  <?php print render(drupal_get_form('fm_commerce_store_owners_admin_form')); ?>
	  <div class="error_container"></div>
	</div>
</div>

