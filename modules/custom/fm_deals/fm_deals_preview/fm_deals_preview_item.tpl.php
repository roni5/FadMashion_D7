
<?php //Get unix start time

$start_time = fm_deals_time($node->nid);
$start_time = $start_time['start'];
?>

<div class="dealFrame rounded-top rounded-bottom <?php print ($node->deal_status == 'active' ? 'onSale' : '');?>">
  <div class="dealHeader <?php print ($node->deal_status == 'ended' ? 'ended' : '');?>"><?php ($node->deal_status == 'upcoming' ?  print '<b>' . date("g:ia", $start_time) . '</b>' : ($node->deal_status == 'active' ? print t('On Sale Now') : print t('This sale has ended'))) ?></div>
    
    <div class="pricing">
      <div class="original">Original<br>Price<h3><?php print render($node->content['product:commerce_price']); ?></h3></div>
      <div class="exclusive">Exclusive<br>Price<h3><?php print render($node->content['field_sale_price']); ?></h3></div>
      <div class="savings">Savings<h3><?php print $node->sale_percentage; ?></h3></div>
    </div><!--pricing--> 
    <?php print l($image, 'node/' . $node->nid, array('html' => true)); ?>
    <h1 class="itemName"><?php print $product->title; ?></h1>
    <h2>by <?php print theme('fm_commerce_store_name', array('store' => $store)); ?></h2>
    <div class="buttons">
    <?php if($node->deal_status == 'active') { ?>
    <div><?php print l('View Now', 'node/' . $node->nid, array('attributes' => array('class' => array( 'button'))) );?></div>
    <?php } else if($node->deal_status == 'upcoming') { ?>
    <div ><?php print l('Preview', 'node/' . $node->nid, array('attributes' => array('class' => array( 'button'))) );?></div>
     <?php }  ?>
     </div>
 </div>