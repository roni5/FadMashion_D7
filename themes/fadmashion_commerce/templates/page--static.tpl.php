<div align="center" id="wrapper">
	<div class="container" style="width: 680px;">
<?php include('header-static.tpl.php');?>
  <div id="static">
	 <div id="content" class="sidebarRight" style="margin-top: 20px; background: none repeat scroll 0% 0% transparent;">
	   <div class="column1">
	     
<?php if ($messages): ?>
      <div id="messages"><div class="section clearfix">
         <?php print $messages; ?>
       </div></div> <!-- /.section, /#messages -->
       <?php endif; ?>
  
	        <?php print render($page['content']); ?>
	   </div> <!-- end column1 -->
	   <?php /* <div class="column2">
	     <div class="sidebar">
	       <?php print render($page['sidebar_second']); ?>
	     </div>
	   </div> */?>
	   
	 </div>
</div>
</div><!--wrapper-->
</div><!--container-->
