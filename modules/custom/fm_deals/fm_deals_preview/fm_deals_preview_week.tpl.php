<div id="dealPreview">
<h1>Preview Monday's Exclusive Deals</h1>
<h2><?php print date("F d, Y", strtotime($date)) ?></h2>
<?php 
foreach($items as $item) {
	print $item;
}
?>
</div>