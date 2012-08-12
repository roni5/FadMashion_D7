<div class="block">

<?php 
  $img =  fm_commerce_product_image_thumb($product, 'fm_thumb_product_image', array('style' => 'height: '. $height . 'px; width: ' . $width . 'px;'));
  $node = fm_commerce_get_display_node($product);  
  if(isset($node)) {
    $shop = fm_commerce_get_store($product);
    $query_array = array_merge($argument ,array('nid' => $node->nid));
    $link = l($img, 'node/' . $node->nid, array('html' => true, 'attributes' => array('id' => $node->nid, 'class' => 'thumb_link'), 'query' => $query_array ));
    print $link;
  }
?>       	  
    <h1><?php print $node->title?></h1>
   <h2><?php print render($node->content['product:commerce_price']); ?><?php print render($node->content['field_sale_price']); ?></h2>
</div>