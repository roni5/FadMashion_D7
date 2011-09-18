<div align="center" id="wrapper">
	<div id="static" class="container" >
<?php include('header-static.tpl.php');?>
  <div id="static">
	 <div id="content" class="sidebarLeft" >
	   <div class="column1">
	     <div class="pad">
	       <?php print l('Our Story', 'story');?>
	       <?php print l('About Us', 'about');?>
	       <?php print l('FAQ', 'faq');?>
	     </div>
	   </div> <!-- end column1 -->
	   <div class="column2">
	     <?php if ($messages): ?>
       <div id="messages"><div class="section clearfix">
         <?php print $messages; ?>
       </div></div> <!-- /.section, /#messages -->
       <?php endif; ?>
       <?php print render($page['content']); ?>
	   </div> <!-- end column2 -->
	   
	 </div>
</div>
</div><!--wrapper-->
</div><!--container-->

<br clear="all">
<?php include('footer.tpl.php');?>
