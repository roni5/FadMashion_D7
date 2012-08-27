<?php 

$url = url('shop', array('alias' => true, 'fragment' => '!'));
$url2 = url($term->name, array('query' => array('term' => $term->tid)));
$url = $url . $url2;

$slides = $images; 

shuffle($images);
$default_image = array_shift($images);

?>
<div id="" class="panel big">
  <div style="background: url(<?php print $default_image;?>)" class="panel-block" >
    <a href="<?php print $url?>"class="link">
      <div class="overlay">
        <?php print $title?>
        <div class="shopLink"><img src="<?php print pp();?>b_shopstyle.jpg" /></div>
      </div><!-- overlay-->		
      
      <ul class="slides">
      <?php foreach ($slides as $slide) {
      	print '<li>';
      	print '<img src="' . $slide . '">';
        print '</li>';
       }?>
     </ul>
                
    </a>
  </div>
</div><!-- panel-->