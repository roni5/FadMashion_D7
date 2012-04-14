<div id="" class="capslide_img_cont ic_container" style= "height: <?php print $height ?>px; width: <?php print $width ?>px">
  
  
  <?php 
  
  $node = fm_commerce_get_display_node($product);
  node_build_content($node);
  
     $img =  fm_commerce_product_image_thumb($product, 'fm_main_product_image', array('style' => 'height: auto; width: ' . $width . 'px;')); 
     $img .= '<div class="overlay" style="display:none;"></div>';
     $img .= '<div class="ic_caption">';
     $img .= '<p class="ic_category">' . $product->title . '</p>';
    
     
     $img .= '<h3>' . render($node->content['product:commerce_price']) . '</h3><h2>' . render($node->content['field_sale_price']) . '</h2>';
     $img .= '</div>';
     
     print l($img, 'node/' . $node->nid, array('html' => true, 'query' => array('store_id' => $shop->store_id, 'nid' => $node->nid) ));
  ?>
</div>
