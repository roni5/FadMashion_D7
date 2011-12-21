 <?php
  $product = fm_commerce_get_product($node);
  $store = fm_commerce_get_store($product);  
  $themed_image = fm_deals_preview_get_image($product);
		
	node_build_content($node);
		
	//Add the percentage savings
  $node->sale_percentage = fm_deals_percentage($node);
    
  //Check for what state the item is in and attach to node
  $status = fm_deals_states_get_status($node);
  $node->deal_status = $status;
  
  $start_time = fm_deals_time($node->nid);
  $start_time = $start_time['start'];
  $end_time = $start_time['end'];
  
	$description = field_get_items('commerce_product', $product, 'field_description');
	$description = $description[0]['value'];
	
	$full_url = fm_newsletters_image_path();
	
	$image = fm_newsletters_deals_generate_url($product);
    
?>
 
 <div>
           <?php print l($image, 'node/' . $node->nid, array('html' => true) );?>
                    <table cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="time"><?php print '<b>' . date("g:ia", $start_time);?></td><td class="savings"><?php print $node->sale_percentage;?> off</td></tr></tbody></table><img src="<?php print $full_url?>shadow-small.jpg">
                    </div><h1> <?php print $product->title;?></h1>
    <h2>by <?php print $store->name;?></h2>