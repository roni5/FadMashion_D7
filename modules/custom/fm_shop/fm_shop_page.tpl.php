
<div class="col1">
  <div class="pad">
  <?php foreach($filters as  $filter_group) {
    print '<h1>' . $filter_group['title'] . '</h1>';
    print '<ul>';
    foreach($filter_group['links'] as $id => $link) {
    	print '<li>' . l($link, '') . '</li>';
    }
    print '</ul>';
  }?>
  </div>
</div>
<div class="col2">
	<div class="pad">
     <?php foreach($content as $content_group) {
     	 foreach($content_group as $content) {
     	 	 print $content;
     	 }
     }
      
      ?>
  </div>
</div>