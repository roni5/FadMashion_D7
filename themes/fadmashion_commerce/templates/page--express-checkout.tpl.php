<div align="center" id="wrapper">
	<div class="container">
<?php include('header-checkout.tpl.php');?>
	 <div id="content" class="sidebarRight">
	   <div class="column1">
	     <div class="mainContent">
	        <?php print render($page['content']); ?>
	     </div><!-- end mainContent -->
	   </div> <!-- end column1 -->
	   <div class="column2">
	     <div class="sidebar">
	       <?php print render($page['sidebar_second']); ?>
	     </div>
	   </div>
	 </div>

</div><!--wrapper-->
</div><!--container-->

<br clear="all">
<?php include('footer.tpl.php');?>