

<div id="order-detail">
<div id="col1">
<div class="order-status-detail">Order Status: <?php fm_commerce_orders_status(array('status' => $status)) ?></div>
<br>
<?php print render($content);?>
</div><!--  end col 1 -->
<div id="col2"><h1>Need Assistance?</h1>
<div class="support-form"><?php print render($customer_service_form);?></div>
</div><!--  end col 2 -->
</div>