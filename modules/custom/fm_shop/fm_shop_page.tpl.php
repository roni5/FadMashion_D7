
<div class="col1">
  <div class="pad">
  <ul style="overflow: hidden;">
    <li><?php  print l('Home', 'shop/all', array('attributes' => array('id' => 'all', 'class' => array('active', 'viewAll')))) ?></li>
    <li><img style="float: left" src="<?php print pp()?>icon_star.png"><?php $id = 'all-time'; print l('Most Loved', 'shop', array('attributes' =>  array('id' => $id, 'class' => array('')), 'query' => array('favorites' => $id)) ) ?></li>
  </ul>
  <?php foreach($filters as  $filter_group) {
  	if(!empty($filter_group['title'] )) {
      print '<h1>' . $filter_group['title'] . '</h1>';
  	}
    print '<ul>';
    foreach($filter_group['links'] as $id => $link) {
    	print '<li>' . l($link, check_plain($link), array('attributes' => array('id' => $id), 'query' => array($filter_group['arg'] => $id))) . '</li>';
    }
    print '</ul>';
  }?>
  </div>
  <?php //print theme('fm_social_favorite_most_loved'); ?>
</div>
<div class="col2">
  <div class="shopAjaxLoader rounded-top rounded-bottom"><img src="<?php print pp()?>loader-red.gif"></div>
  <div class="pad"><?php print $content;?></div>
</div>

<div id="cache"  style="display:none;">
  
</div>