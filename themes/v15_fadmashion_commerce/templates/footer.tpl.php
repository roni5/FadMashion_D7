

<?php if(!empty($page['footer'])): ?>
<div id="footer rounded-top">
  			  <?php print render($page['footer']);?>
</div>
<?php endif;  ?> 
 

<?php if(!empty($page['hidden'])): ?>
<div style="display:none">
  			  <?php print render($page['hidden']);?>
  	  
  	  </div>
<?php endif;  ?> 
 