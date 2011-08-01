<div align="center" id="wrapper">
	<div class="container">
<?php include('header.tpl.php');?>

            
    <?php if(!empty($page['featured'])): ?>
      <div id="sectionHeader">
      <div class="pad">
  			  <?php print render($page['featured']);?>
  			  </div>
  			  <div class="shadow">&nbsp;</div>
  	</div>
  	  
      <?php endif;  ?> 
      
      
	 <div id="content" class="sidebarRight">

	   <div class="column1">   
	   <?php if ($messages): ?>
      <div id="messages"><div class="section clearfix">
         <?php print $messages; ?>
       </div></div> <!-- /.section, /#messages -->
       <?php endif; ?>
       
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