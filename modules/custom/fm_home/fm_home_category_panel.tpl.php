<?php 
$category_label = field_get_items('taxonomy_term', $term, 'field_category_home_label');
if($category_label) {
$category_label = $category_label[0];
			
$label = array(
  'path' => $category_label['uri'],
  'alt' => $category_label['alt'],
  'title' => $category_label['title'],
    'attributes' => array('class' => 'title'),
   );
$title =  theme('image', $label);
}

$url = url('shop', array('absolute' => true, 'query' => array('term' => $term->tid) ))
?>


<div class="panel" id="">
  <div style="" class="panel-block">
    <a class="link" href="<?php print $url?>">
      <div class="overlay">
        <?php print $title?>
        <div class="shopLink" style="display: none;"><img src="<?php print pp();?>b_shopcategory.jpg"></div>
      </div><!-- overlay-->		
		</a>
  </div>
</div>