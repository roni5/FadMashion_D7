<h1 class="itemName"><?php print $node->title; ?></h1>
<h3 style="padding-bottom: 10px"> <?php print l($store->name, 'test'); ?></h3>

<a href="#"><?php print l($image, 'node/'.$node->nid, array('html' => true));?></a>
<div class="button"><?php print l('Preview Upcoming Deals', 'deals_preview', array('query' => array('top' => '10px',  'fixed' => true, 'scrolling' => 0,'height' => '900px', 'width' => '850px'),  'attributes' => array('class' => 'colorbox-load')) ); ?></div>