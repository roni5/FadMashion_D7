<?php 
$product = commerce_product_load($product_id);
$img =  fm_commerce_product_image_thumb($product, 'fm_thumb_product_image');
$node = fm_commerce_get_display_node($product);
$shop = fm_commerce_get_store($product);
$url = url('shop', array('alias' => true));
$url .= '#!';
$url2 = url('node/' . $node->nid, array('query' => array('store_id' => $shop->store_id, 'nid' => $node->nid)));
$url = $url . $url2;
//$img_link = l($img, $url, array('html' => true, 'absolute' => true));
//$title_link = l('<h1 class="itemName">' . $product->title . '</h1>', 'shop#', array('html' => true, 'absolute' => 'true', 'attributes' => array('id' => $node->nid), 'query' => array('store_id' => $shop->store_id, 'nid' => $node->nid) ));
$img_link = '<a href="' . $url . '">' . $img . '</a>';
$title_link = '<a href="' . $url . '">' . '<h1 class="itemName">' . $product->title . '</h1>' . '</a>';
$shop_link = '<a href="' . $url . '">' . $shop->name. '</a>';
?>

<div class="itemLoved">
            <?php print $img_link;?>
            <div class="text">
            <a href="#"><?php print $title_link;?></a>
    <h2 class="designer"><?php print $shop_link;?></h2>
    <h3><?php print $favorite_count;?></h3></div>
		</div>