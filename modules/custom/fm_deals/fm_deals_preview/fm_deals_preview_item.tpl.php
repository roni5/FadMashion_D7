
<div class="dealFrame">
        <div class="dealHeader ended">This sale has ended</div>
        <div class="pricing">
              <div class="original">Original<br>Price<h3><?php print render($node->content['product:commerce_price']); ?></h3></div>
              <div class="exclusive">Exclusive<br>Deal<h3><?php print render($node->content['field_sale_price']); ?></h3></div>
              <div class="savings">Savings<h3><?php print $node->sale_percentage; ?></h3></div>
        </div><!--pricing--> 
        <?php print $image; ?>
        <h1 class="itemName"><?php print $node->title; ?></h1>
        <h2>by <a href="#"><?php print l($store->name, 'test'); ?></a></h2>
       
    </div>