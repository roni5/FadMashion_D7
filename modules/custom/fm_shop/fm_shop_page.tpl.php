
<div class="col1">
  <div class="pad">
  <ul><li><?php  print l('View All', 'shop/all', array('attributes' => array('id' => 'all', 'class' => array('active')))) ?></li></ul>
  <?php foreach($filters as  $filter_group) {
    print '<h1>' . $filter_group['title'] . '</h1>';
    print '<ul>';
    foreach($filter_group['links'] as $id => $link) {
    	print '<li>' . l($link, check_plain($link), array('attributes' => array('id' => $id), 'query' => array('store_id' => $id))) . '</li>';
    }
    print '</ul>';
  }?>
  </div>
</div>
<div class="col2">
  <div class="shopAjaxLoader rounded-top rounded-bottom">Loading...</div>
  <div class="pad"></div>
</div>