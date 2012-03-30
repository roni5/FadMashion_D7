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
            	$link = l($img, '', array('html' => true, 'absolute' => true));
            	print '<li>' . $link . '</li>';
            }
            ?>
           
          </ul>
        </div>
      </div>
    </div>

