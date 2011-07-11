
<?php //Get unix start time
$start_time = $node->field_start_time['und'][0]['value'];
$unixStartTime = strtotime($start_time);	
?>

<div class="dealFrame <?php print ($node->deal_status == 'active' ? 'onSale' : '');?>">
  <div class="dealHeader <?php print ($node->deal_status == 'ended' ? 'ended' : '');?>"><?php ($node->deal_status == 'upcoming' ? print t('Starts @') . '<b>' . date(" ga T", strtotime($node->field_start_time['und'][0]['value'])) . '</b>' : ($node->deal_status == 'active' ? print t('On Sale Now') : print t('This sale has ended'))) ?></div>
    <h1 class="itemName"><?php print $node->title; ?></h1>
    <h2>by <?php print l($store->name, 'test'); ?></h2>
    <?php print l($image, 'node/' . $node->nid, array('html' => true)); ?>
    <div class="pricing">
      <div class="original">Original<br>Price<h3><?php print render($node->content['product:commerce_price']); ?></h3></div>
      <div class="exclusive">Exclusive<br>Deal<h3><?php print render($node->content['field_sale_price']); ?></h3></div>
      <div class="savings">Savings<h3><?php print $node->sale_percentage; ?></h3></div>
    </div><!--pricing--> 
    <div class="buttons">
    <?php if($node->deal_status == 'active') { ?>
    <div class="button"><?php print l('View Now', 'node/' . $node->nid );?></div>
    <?php } else if($node->deal_status == 'upcoming') { ?>
    <div class="button"><?php print l('Preview', 'node/' . $node->nid );?></div>
     <?php }  ?>
     </div>
 </div>