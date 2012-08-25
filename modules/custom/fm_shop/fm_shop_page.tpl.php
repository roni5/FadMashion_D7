
<div class="col1">
  <div class="pad">
  
  <?php 
  
   foreach($filters as  $filter_id => $filter_group) {
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
    	print '<li class="' . $filter_id . ' ' . ($link['depth'] ? 'child' : '') . '">' . l($link['title'], check_plain($link['title']), array('attributes' => array('id' => $id), 'html' => true,  'query' => array($link['arg'] => $arg))) . '</li>';
    	
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
  <div style="display:none" class="contentPanel"><?php print $content;?></div>
</div>

<div id="cache"  style="display:none;">
  
</div>