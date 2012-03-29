<div id="" class="capslide_img_cont ic_container" style= "height: <?php print $height ?>px; width: <?php print $width ?>px">
  
  
  <?php 
     $img =  fm_commerce_product_image_thumb($product, 'fm_main_product_image', array('style' => 'height: '. $height . 'px; width: ' . $width . 'px;')); 
     $img .= '<div class="overlay" style="display:none;"></div>';
     $img .= '<div class="ic_caption">';
     $img .= '<p class="ic_category">' . $product->title . '</p>';
     $img .= '<h3>$299</h3><h2>$175</h2>';
     $img .= '</div>';
     
     $node = fm_commerce_get_display_node($product);
     print l($img, 'node/' . $node->nid, array('html' => true));
  ?>
</div>
