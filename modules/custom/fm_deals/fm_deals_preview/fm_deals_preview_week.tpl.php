<div id="dealPreview">
<h1>Preview Monday's Exclusive Deal Events</h1>
<h2><?php print date("F d, Y", strtotime($date)) ?></h2>
<div id="dealPreview">
<?php 
foreach($items as $item) {
	print $item;
}
?>
</div>

</div>