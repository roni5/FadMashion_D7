<?php 
$url = url('shop', array('alias' => true, 'fragment' => '!'));
$url2 = url('Designers', array('query' => array('store_id' => 'all')));
$url = $url . $url2;
?>

<div class="panel" id="browse">
            <div class="panel-block">
            <div class="pad">
            <a class="browseDesigners" href="<?php print $url;?>">Browse Designers</a>
                <img src="<?php print pp();?>p_divider_dark.png">
            <?php print l('Browse Most Loved', 'shop', array('attributes' => array('class' => 'browseMostLoved') ));?>
            </div></div>
            </div>