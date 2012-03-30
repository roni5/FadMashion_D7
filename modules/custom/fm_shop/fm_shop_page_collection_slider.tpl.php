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
            	$link = l($img, '', array('html' => true));
            	print '<li>' . $link . '</li>';
            }
            ?>
            <li>

              <a href="images/9.jpg">
                <img src="images/thumbs/t9.jpg" title="A title for 9.jpg" alt="This is a nice, and incredibly descriptive, description of the image 9.jpg" class="image13">
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>

