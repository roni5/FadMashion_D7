
<?php 
  $more_query_array = array_merge($argument, array('page' => $pager['next']));
  $prev_query_array = array_merge($argument, array('page' => $pager['prev']));
  print  l(t('Prev'), 'more', array('attributes' => array('id' => 'collection_viewer_prev', 'class' => array(), 'query' => $prev_query_array)));
?>

<div id="gallery" class="ad-gallery">
<div id="slider_loader" style="display: none;"><img src="<?php print pp()?>loader-red.gif"></div>
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
 print  l(t('Next'), 'more', array('attributes' => array('id' => 'collection_viewer_next', 'class' => array()), 'query' => $more_query_array));
?>

