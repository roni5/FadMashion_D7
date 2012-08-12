
<div class="col1">
  <div class="pad">
  
    <div class="sideNavBlock">
    <?php $id = 'all-time'; $img = '<img style="margin: 0;" class="title" alt="Most Loved" src="' . pp() . 'title_small_mostloved.png">'; print l($img, 'shop/favorites', array('attributes' =>  array('id' => $id), 'html' => true, 'query' => array('favorites' => $id)) ) ?>

    </div>
 
  <?php 
  
   foreach($filters as  $filter_group) {
   	print '<div class="sideNavBlock">';
  	if(!empty($filter_group['title'] )) {
      print  $filter_group['title'];
  	}
    print '<ul>';
    foreach($filter_group['links'] as $id => $link) {
    	$arg_array = explode("_", $id);
    	if($arg_array[0] != 'term') {
    		$arg = $id;
    	} else {
    		$arg = $arg_array[1];
    	}
    	print '<li>' . l($link, check_plain($link), array('attributes' => array('id' => $id), 'query' => array($filter_group['arg'] => $arg))) . '</li>';
    }
    print '</ul>';
    print '</div>';
  }
  ?>
  </div>
  <?php //print theme('fm_social_favorite_most_loved'); ?>
</div>
<div class="col2">
  <div class="shopAjaxLoader rounded-top rounded-bottom"><img src="<?php print pp()?>loader-red.gif"></div>
  <div style="display:none" id="contentPanel"><?php print $content;?></div>
</div>

<div id="cache"  style="display:none;">
  
</div>