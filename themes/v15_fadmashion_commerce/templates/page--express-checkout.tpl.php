<div align="center" id="wrapper">
	<div class="container">
<?php include('header-checkout.tpl.php');?>
	 <div id="content" class="sidebarRight">
	   <div class="column1">
	     
<?php if ($messages): ?>
      <div id="messages"><div class="section clearfix">
         <?php print $messages; ?>
       </div></div> <!-- /.section, /#messages -->
       <?php endif; ?>
  
	        <?php print render($page['content']); ?>
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