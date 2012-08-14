<?php 

$url = url('shop', array('alias' => true, 'fragment' => '!'));
$url2 = url($term->name, array('query' => array('term' => $term->tid)));
$url = $url . $url2;
?>


<div class="panel" id="">
  <div style="background: url(<?php print $image;?>)" class="panel-block">
    <a class="link" href="<?php print $url?>">
      <div class="overlay">
        <?php print $title?>
        <div class="shopLink" style="display: none;"><img src="<?php print pp();?>b_shopcategory.jpg"></div>
      </div><!-- overlay-->		
		</a>
  </div>
</div>