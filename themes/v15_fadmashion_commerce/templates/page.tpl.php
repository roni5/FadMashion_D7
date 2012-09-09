<div id="wrapper">
	<div id="container">
<?php include('header.tpl.php');?>
      
    <?php if(!empty($page['featured'])): ?>
      <div id="sectionHeader">
      <div class="pad">
  			  <?php print render($page['featured']);?>
  	  </div><div class="shadow">&nbsp;</div>
  	  </div>
      <?php endif;  ?>  
      
      
	 <div id="content" class="sidebarRight">
     <?php if ($messages): ?>
      <div id="messages"><div class="section clearfix">
         <?php print $messages; ?>
       </div></div> <!-- /.section, /#messages -->
       <?php endif; ?>
       <?php print render($page['content']); ?>
	   
	 </div>
<div style="display: none"><div style="width: 400px; margin: 20px;" class="fb_connected"></div></div>
<?php include('footer.tpl.php');?>
</div><!--wrapper-->
</div><!--container-->


<?php print theme('fm_global_footer_tabs');?>

<br clear="all">
<br clear="all">
<br clear="all">