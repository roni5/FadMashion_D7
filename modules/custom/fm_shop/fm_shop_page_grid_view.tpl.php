<div class="banner">
  <?php print $title; ?>
  <p class="description"><?php print $description; ?></p>
  <img src="<?php print pp();?>divider_large.jpg">
</div>
<div id="grid">
  <?php foreach($products as $product) {
    print theme('fm_shop_page_grid_view_item', array('product' => $product));
  }?>
</div>