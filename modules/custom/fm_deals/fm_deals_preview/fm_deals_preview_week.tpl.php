<div id="dealPreview">
<h1 class="pageTitle">Preview Monday's Exclusive Deal Events</h1>
<h2><?php print date("F d, Y", strtotime($date)) ?></h2>
<div id="preview-content">
<?php 
foreach($items as $item) {
	print $item;
}
?>
</div>

</div>