<div id="gallery" class="ad-gallery">
 <div class="ad-image-wrapper" style="display: none;">

      </div>
      <div class="ad-controls" style="display: none;">
      </div>
      <div class="ad-nav">
        <div class="ad-thumbs">
          <ul class="ad-thumb-list">
            <?php 
            foreach($products as $product) {
            	$img =  fm_commerce_product_image_thumb($product, 'fm_thumb_product_image', array('style' => 'height: '. $height . 'px; width: ' . $width . 'px;'));
            	$node = fm_commerce_get_display_node($product);
            	$shop = fm_commerce_get_store($product);
            	$link = l($img, 'node/' . $node->nid, array('html' => true, 'query' => array('store_id' => $shop->store_id, 'nid' => $node->nid) ));
            	
            	//$link = l($img, '', array('html' => true, 'attributes' => array('id' => $node->nid), 'absolute' => true));
            	print '<li>' . $link . '</li>';
            }
            ?>
           
          </ul>
        </div>
      </div>
    </div>

