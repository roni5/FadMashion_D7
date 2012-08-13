
<div id="grid_view">
<div class="banner">
  <?php print $title; ?>
  <p class="description"><?php print $description; ?></p>
  <img src="<?php print pp();?>divider_large.jpg">
</div>
<div id="grid">

  <?php 
  $row_num = 4;
  $rows = array();
  $i = 0; $j = 0;
  foreach($products as $product) {
  	if(!($i % 4)) {
  		$j++;
  	}
    $rows[$j][] = $product;
  }
  foreach($rows as $row) {
  	print '<div class="row">';
  	foreach($row as $product) {
  		print theme('fm_shop_page_grid_view_item', array('product' => $product, 'argument' => $argument));
  	}
  	print '</div>';
  }
  
  ?>
</div>
</div>