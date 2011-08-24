<div class="col1">
     <?php print $thumb;?>
</div><!-- col1-->
   <div class="col2">
      <div class="price"><?php print $price?></div>     
         <div class="itemName"><?php print $title?></div>
         <?php if(!empty($color)) {?><div class="option"><span>Color:</span>  <?php print $color;?></div> <?php }?>
         <?php if(!empty($size)) {?><div class="option"><span>Size:</span>  <?php print $size;?></div> <?php }?>
				 <?php if(!empty($qty)) {?><div class="option"><span>Quantity:</span>  <?php print $qty;?></div> <?php }?>
     </div><!-- col2-->