

<?php if(!empty($page['footer'])): ?>
<div id="footer">
  			  <?php print render($page['footer']);?>
</div>
<?php endif;  ?> 
 

<?php if(!empty($page['hidden'])): ?>
<div style="display:none">
  			  <?php print render($page['hidden']);?>
  	  
  	  </div>
<?php endif;  ?> 
 