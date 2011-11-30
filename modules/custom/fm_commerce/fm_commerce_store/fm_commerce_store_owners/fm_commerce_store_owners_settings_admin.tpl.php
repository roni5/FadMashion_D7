

<div class="owners-admin-settings ">

     <!-- Paypal Business E-mail -->
     <table style="width: 100%">
       <tr style="height: 80px;">
         <td style="width: 270px;" >
	        <div id="paypal_header">
      	    <div>
	            <img  class="paypal_logo" src=" <?php print pp(); ?>paypal_logo.gif">
	          </div>
	         <div> Business Email Address:</div>
	        </div>
	       </td>
	   
	      <td style="float: left; padding-top: 19px; ">
    	    <?php print render(drupal_get_form('fm_commerce_store_owners_admin_form')); ?>
	        <div class="error_container"></div>
	      </td>
	    </tr>
	    
	    <!-- Logo Settings-->
	    <tr >
         <td>
	         <div>Brand Label:</div>
	       </td>
	   
	      <td style="float: left; padding-top: 5px; ">
	        <?php $logo = field_view_field('fm_commerce_store', $store, 'field_logo', 'node_full');
	        print render($logo);?>
	      </td>
	    </tr>
	  
	  </table>
	</div>
</div>

