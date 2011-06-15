<h1 class="itemName"><?php print $node->title; ?></h1>
<h3 style="padding-bottom: 10px"> <?php print l($store->name, 'test'); ?></h3>

<a href="#"><?php print l($image, 'node/'.$node->nid, array('html' => true));?></a>
<div class="button"><?php print l('Preview More Deals', 'deals_preview', array('query' => array('width' => '910px'),  'attributes' => array('class' => 'colorbox-load')) ); ?></div>