
<div class="col1">
  <div class="pad">
  <img src="<?php print pp();?>title_small_about.jpg"></img>
  <ul>
  <?php foreach($pages as  $alias => $page) {
  	
    print '<li><a id="' . $alias . '" href="#!/?page=' . $alias . '">' . $page . '</a></li>';
  }?>
  </ul>
  </div>
</div>
<div class="col2">
  <div class="pad rounded-top rounded-bottom"></div>
</div>

<div id="cache"  style="display:none;">
  <?php 
  foreach ($content as $alias => $content_piece) {
    print $content_piece;
  }?>
</div>