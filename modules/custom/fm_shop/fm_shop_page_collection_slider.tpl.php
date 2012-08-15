
<?php 
  $more_query_array = array_merge($argument, array('page' => $pager));
  print  l(t('Prev'), 'more', array('attributes' => array('id' => 'collection_viewer_prev'), 'query' => $more_query_array));
 ?>
<div id="gallery" class="ad-gallery">
<div class="ad-image-wrapper" style="display: none;">

      </div>
      <div class="ad-nav">
        <div class="ad-thumbs">
          
          
            <ul class="ad-thumb-list">
            <?php 
            foreach($products as $product) {
            	$img =  fm_commerce_product_image_thumb($product, 'fm_thumb_product_image', array('style' => 'height: '. $height . 'px; width: ' . $width . 'px;'));
            	$node = fm_commerce_get_display_node($product);  
            	if(isset($node)) {
            	  $shop = fm_commerce_get_store($product);
            	  $query_array = array_merge($argument ,array('nid' => $node->nid));
            	  $link = l($img, 'node/' . $node->nid, array('html' => true, 'attributes' => array('id' => $node->nid, 'class' => 'thumb_link'), 'query' => $query_array ));
            	  $link .= '<div class="social_favorites">' . fm_social_favorite_get_button($product->product_id, false) . '</div>'; 
             	//$link = l($img, '', array('html' => true, 'attributes' => array('id' => $node->nid), 'absolute' => true));
            	  print '<li id="collection_viewer_' . $node->nid .'">' . $link . '</li>';
            	}
            }
             ?>     
           </ul>
           
        </div>
      </div>

</div>

      
<?php 
 $more_query_array = array_merge($argument, array('page' => $pager));
 print  l(t('Next'), 'more', array('attributes' => array('id' => 'collection_viewer_next'), 'query' => $more_query_array));
?>

