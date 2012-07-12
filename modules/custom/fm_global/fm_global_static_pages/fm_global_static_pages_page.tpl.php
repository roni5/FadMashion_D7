
<div class="col1">
  <div class="pad">
  <h1 style="border: none; margin-top: 0; padding-top: 0px;">ABOUT</h1>
  <ul>
  <?php foreach($pages as  $alias => $page) {
    print '<li><a id="' . $alias . '" href="' . $alias . '">' . $page . '</a></li>';
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