<div class="designerPanel">
  <div class="designerPanelTop">
  	<div class="pad">
  
  <!-- Start of Table Content -->
  <table width="" cellspacing="1" cellpadding="0">
    <tbody><tr>
       <td align="center" colspan="3"> 
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
      <td colspan="2">
        <div class="demo">
        <?php $first_product = array_shift($products);
              print theme('fm_shop_page_panel_thumb', array('product' => $first_product, 'height' => 446, 'width' => 315));
        ?>
        
        </div>
      </td>
    </tr>
      <?php 
      $i = 0;
      foreach($products as $product) {
      	if ($i%5 == 0) {
      		print '<tr>';
      	}
      	
      	print '<td>';
        print theme('fm_shop_page_panel_thumb', array('product' => $product, 'height' => 229, 'width' => 157));
        print '</td>';
        
        if ($i%5 == 4 ) {
      		print '</tr>';
      	}
      	$i++;
      }
      if($i%5 < 4) {print '</tr>';}
      ?>
    
    </tbody></table>
  
  <!-- End of Table Content -->
               
 </div>    
</div><img class="frameBottom" src="<?php print pp();?>frame_bottom.png">
</div>