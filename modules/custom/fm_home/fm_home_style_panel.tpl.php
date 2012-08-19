<?php 

$url = url('shop', array('alias' => true, 'fragment' => '!'));
$url2 = url($term->name, array('query' => array('term' => $term->tid)));
$url = $url . $url2;

$default_image = array_shift($images);
?>
<div id="" class="panel big">
  <div style="background: url(<?php print $default_image;?>)" class="panel-block" >
    <a href="<?php print $url?>"class="link">
      <div class="overlay">
        <?php print $title?>
        <div class="shopLink"><img src="<?php print pp();?>b_shopstyle.jpg" /></div>
      </div><!-- overlay-->		
    </a>
  </div>
</div><!-- panel-->