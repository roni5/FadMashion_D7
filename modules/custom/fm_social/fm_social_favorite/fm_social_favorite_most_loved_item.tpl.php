<?php 
$product = commerce_product_load($product_id);
$img =  fm_commerce_product_image_thumb($product, 'fm_thumb_product_image');
$node = fm_commerce_get_display_node($product);
$shop = fm_commerce_get_store($product);
$img_link = l($img, 'node/' . $node->nid, array('html' => true,  'query' => array('store_id' => $shop->store_id, 'nid' => $node->nid) ));
$title_link = l('<h1 class="itemName">' . $product->title . '</h1>', 'node/' . $node->nid, array('html' => true, 'attributes' => array('id' => $node->nid), 'query' => array('store_id' => $shop->store_id, 'nid' => $node->nid) ));
$shop_link = l($shop->name, $shop->name, array( 'query' => array('store_id' => $shop->store_id) ));
?>

<div class="itemLoved">
            <?php print $img_link;?>
            <div class="text">
            <a href="#"><?php print $title_link;?></a>
    <h2 class="designer"><?php print $shop_link;?></h2>
    <h3><?php print $favorite_count;?></h3></div>
		</div>