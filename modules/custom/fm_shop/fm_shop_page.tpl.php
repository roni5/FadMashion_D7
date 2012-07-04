
<div class="col1">
  <div class="pad">
  <ul><li><?php  print l('Browse All', 'shop/all', array('attributes' => array('id' => 'all', 'class' => array('active', 'viewAll')))) ?></li></ul>
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
  <?php print theme('fm_social_favorite_most_loved'); ?>
</div>
<div class="col2">
  <div class="shopAjaxLoader rounded-top rounded-bottom">Loading...</div>
  <div class="pad"><?php print $content;?></div>
</div>

<div id="cache"  style="display:none;">
  
</div>