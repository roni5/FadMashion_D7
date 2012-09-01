<div id="fb-root"></div>
        
        <br />
        <div id="user-info"></div>
        <br />
        <div id="debug"></div>
        
        <div id="other" style="display:none">
            <a href="#" onclick="showStream(); return false;">Publish Wall Post</a> |
            <a href="#" onclick="share(); return false;">Share With Your Friends</a> |
            <a href="#" onclick="graphStreamPublish(); return false;">Publish Stream Using Graph API</a> |
            <a href="#" onclick="fqlQuery(); return false;">FQL Query Example</a>
            
            <br />
            <textarea id="status" cols="50" rows="5">Write your status here and click 'Status Set Using Legacy Api Call'</textarea>
            <br />
            <a href="#" onclick="setStatus(); return false;">Status Set Using Legacy Api Call</a>
        </div>
        
        
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

<?php include('footer.tpl.php');?>
</div><!--wrapper-->
</div><!--container-->


<?php print theme('fm_global_footer_tabs');?>

<br clear="all">
<br clear="all">
<br clear="all">