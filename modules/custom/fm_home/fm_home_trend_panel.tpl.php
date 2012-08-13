<?php 

$url = url('shop', array('alias' => true, 'fragment' => '!'));
$url2 = url($term->name, array('query' => array('term' => $term->tid)));
$url = $url . $url2;
?>
<div id="" class="panel">
  <div class="panel-block" >
    <a href="<?php print $url?>"class="link">
      <div class="overlay">
        <?php print $title?>
        <div class="shopLink"><img src="<?php print pp();?>b_shopTrend.jpg" /></div>
      </div><!-- overlay-->		
    </a>
  </div>
</div><!-- panel-->