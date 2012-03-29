<div class="designerPanel">
  <div class="designerPanelTop">
  	<div class="pad">
  
  <!-- Start of Table Content -->
  <table width="" cellspacing="1" cellpadding="0">
    <tbody><tr>
       <td align="center" width="471px" > 
       <div class="info">
       <?php $logo = field_view_field('fm_commerce_store', $shop, 'field_logo', 'node_full');
	       print render($logo);
	     ?>
       <div class="quote">
         <div class="quoteOpen">
           <div class="quoteClose">
            <?php $quote = field_view_field('fm_commerce_store', $shop, 'field_quote', 'node_full');
	                 print render($quote);
	           ?>
           </div>
         </div>
       </div><!-- quote-->
       <a class="buttonShop" href="##">Shop this Collection</a>
      </div><!-- info--></td>
      <td >
        <div class="demo">
        <?php $first_product = array_shift($products);
              print theme('fm_shop_page_panel_thumb', array('product' => $first_product, 'height' => 446, 'width' => 315));
        ?>
        
        </div>
      </td>
    </tr>
    
    <tr><td colspan="2">
      <?php 
      
      $max_products = 8;
      $min_products = 3;
      
      $row_width = 786;
      $default_height = 229;
      $default_width = 157;
      
      $product_count = count($products);
      if($product_count > $max_products) {$product_count = $max_products; }
      if($product_count < $min_products) {$product_count = $min_products; }
      
      $width = $row_width/$product_count;
      $height = ($width * $default_height) / $default_width;
      
      $i = 0;
      foreach($products as $product) {
      	
      	print '<div style="float: left;">';
        print theme('fm_shop_page_panel_thumb', array('product' => $product, 'height' => $height, 'width' => $width));
        
        print '</div>';
        
      	$i++;
      	if(i >= $max_products) { break;}
      }
      
      ?>
    </tr></tr>
    </tbody></table>
  
  <!-- End of Table Content -->
               
 </div>    
</div><img class="frameBottom" src="<?php print pp();?>frame_bottom.png">
</div>