<h1 class="itemName"><?php print $product->title; ?></h1>
<h3 style="padding-bottom: 10px"> <?php print theme('fm_commerce_store_name', array('store' => $store)); ?></h3>

<a href="#"><?php print l($image, 'node/'.$node->nid, array('html' => true));?></a>
