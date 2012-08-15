<div class="block">

<?php 
  $img =  fm_commerce_product_image_thumb($product, 'fm_product_grid_view', array('style' => 'height: '. $height . 'px; width: ' . $width . 'px;'));
  $node = fm_commerce_get_display_node($product);  
  if(isset($node)) {
    $shop = fm_commerce_get_store($product);
    
    $query_array = array_merge($argument ,array('nid' => $node->nid));
    $link = l($img, 'node/' . $node->nid, array('html' => true, 'attributes' => array('id' => $node->nid, 'class' => 'thumb_link'), 'query' => $query_array ));
    print $link;
    
    $result = db_query('SELECT count(*) as count FROM fm_social_favorite WHERE product_id = :product_id', array(':product_id' => $product->product_id));
  $obj = $result->fetchObject();
  
  ?>       	  
    <h1><?php print l($node->title, 'node/' . $node->nid, array('query' => $query_array ));?></h1>
   <h2><span><?php node_build_content($node); print render($node->content['field_sale_price']); ?></span></h2>
   <?php print ($obj->count ? '<h3>' . $obj->count . '</h3>': ''); ?>
<?php } ?>
</div>