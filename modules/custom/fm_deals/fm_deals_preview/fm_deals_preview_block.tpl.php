<h1 class="itemName"><?php print $product->title; ?></h1>
<h3 style="padding-bottom: 10px"> <?php print theme('fm_commerce_store_name', array('store' => $store)); ?></h3>

<a href="#"><?php print l($image, 'node/'.$node->nid, array('html' => true));?></a>
<div id="upNext"><?php print l('Preview More Deals', 'deals_preview', array('query' => array('width' => '910px'),  'attributes' => array('class' => array('colorbox-load', 'button'))) ); ?></div>