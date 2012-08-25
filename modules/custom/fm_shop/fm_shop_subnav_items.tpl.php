<div class="shop_subnav">
  <div class="pad">
   <div class="leftColumn">
     <div class="block">
<?php
     $filter_group = $filters['trends'];
     print  $filter_group['title'];
     print '<ul>';
     print fm_shop_subnav_items_links($filter_group);
    print '</ul>';
?>
 <div class="block">
<?php
     $filter_group = $filters['browse_by'];
     print  $filter_group['title'];
     print '<ul>';
     print fm_shop_subnav_items_links($filter_group, false);
    print '</ul>';
?>
 </div>
 
   </div>
    </div>
    <div class="rightColumn"> 
       <div class="block">
    <?php
     $filter_group = $filters['product_type'];
     print  $filter_group['title'];
     print '<ul>';
     print fm_shop_subnav_items_links($filter_group);
    print '</ul>';
?>
 </div>

    </div>
</div>
</div>