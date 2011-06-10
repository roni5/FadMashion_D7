
<h2>WEEK OF <?php print date('n/j/Y' ,strtotime($date)); ?></h2>
<?php 

foreach($items as $item) {
	print $item;
}

?>