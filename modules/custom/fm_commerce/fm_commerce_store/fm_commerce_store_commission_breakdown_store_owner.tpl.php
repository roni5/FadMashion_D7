<div class="commission-details">
    <div class="before-commission">
      <?php foreach($before_commission as $before_commission_item) {print $before_commission_item;} ?>
    </div>
    <div class="commission">
      <div class="sub-total"><div class="col1"></div><div class="col2"> <?php print $commission['sub-total']['price'];?></div></div>
      <div class="commission-val"><div class="col1"><?php print $commission['commission']['title']?></div><div class="col2"> <?php print $commission['commission']['price']?></div></div>
     <div class="after-commission"><div class="col1"><?php print $commission['after_commission']['title']?></div><div class="col2"> <?php print $commission['after_commission']['price']?></div></div>
    </div>
     <div class="after-commission-items">
       <?php foreach($after_commission as $after_commission_item) {print $after_commission_item; } ?>
     </div>  
     <div class="total-payments">
        <?php foreach($total_payment as $total_payment_item) {print $total_payment_item; } ?>
     </div>  
 </div>  