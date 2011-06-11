<div id="dealPreview">
<h1>Preview Exclusive Group Deals</h1>
<h2>WEEK OF <?php print date('n/j/Y' ,strtotime($date)); ?></h2>
<?php 
foreach($items as $item) {
	print $item;
}
?>
</div>