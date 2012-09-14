

<?php if(!empty($page['footer'])): ?>
<div class="rounded-top" id="footer">

<div class="copyright">
 ©  <img height="40px" src="<?php print pp();?>logo.png" alt="<?php print t('Fadmashion'); ?>" />
</div>			  
<?php //print render($page['footer']);?>
<?php  $url = url('static', array('alias' => true, 'fragment' => '!')) . '?page='; ?>
<div class="links">
<a href="<?php print $url?>/about-us">We ♥ New York</a>
<a href="<?php print $url?>/faq">What is Fadmashion?</a>
<a href="<?php print $url?>/faq">Returns & Exchanges</a>
<a href="<?php print $url?>/faq">Shipping Info</a>
<a href="<?php print $url?>/contact-us">Contact Us</a>
<a href="http://blog.fadmashion.com">Blog</a>
</div>

</div>
<?php endif;  ?> 
 

<?php if(!empty($page['hidden'])): ?>
<div style="display:none">
  			  <?php print render($page['hidden']);?>
  	  
  	  </div>
<?php endif;  ?> 
 