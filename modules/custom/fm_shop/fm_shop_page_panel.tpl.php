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
      
      switch(count($products)) {
      	case 2:
      		$height = 229;
      		$width = 157;
      	case 3:
      		$height = 229;
      		$width = 157;
      	case 4:
      		$height = 229;
      		$width = 157;
      	case 5:
      		$height = 229;
      		$width = 157;
      }
      
      $i = 0;
      foreach($products as $product) {
      	
      	print '<div style="float: left;">';
        print theme('fm_shop_page_panel_thumb', array('product' => $product, 'height' => $height, 'width' => $width));
        print '</div>';
        
      	$i++;
      }
      
      ?>
    </tr></tr>
    </tbody></table>
  
  <!-- End of Table Content -->
               
 </div>    
</div><img class="frameBottom" src="<?php print pp();?>frame_bottom.png">
</div>