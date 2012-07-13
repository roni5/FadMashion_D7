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
	   <div id="fm_user_edit_form">
	     <div class="column1">
          <?php if ($messages): ?>
           <div id="messages"><div class="section clearfix">
           <?php print $messages; ?>
          </div></div> <!-- /.section, /#messages -->
           <?php endif; ?>
          <?php print render($page['content']); ?>
       </div>
       
			<div class="column2">
			<div class="checkoutPanel" id="quicklinks_information">
			  <div class="header rounded-top">
			    <div class="pad">
			       Quick Links
			    </div>
			  </div>
			  <div id="quicklinks_info">
			    <div class="form">
			      <div><?php print l('Order History', 'user/orders');?></div>
			      <div><?php global $user; print l('Settings', 'user/'  . $user->uid . '/edit');?></div>
			      <div><?php print l('Recommend to Friends', 'user/share-with-friends');?><span style ="color: #777777;font-size: 11px;font-style: italic;padding-left: 10px;">(Get $10 in Credits)</span></div>
			      <div><?php print l('Logout', 'user/logout');?></div>
			      <?php  $url = url('static', array('alias' => true, 'fragment' => '!')); ?>
			      <div style="width: 248px; margin-top: 10px; padding-top: 10px; border-top: 1px solid #eee"><a href="<?php print $url?>/returns">Shipping & Returns</a></div>
			      <div><a href="<?php print $url?>/contact-us">Have a Question?</a></div>
			    </div>
			  </div>
			</div>
			<div class="checkoutPanel" id="quicklinks_information">
			  <div class="header rounded-top">
			    <div class="pad">
			       Follow Fadmashion
			    </div>
			  </div>
			  <div class="form">
            <fb:like  href="http://www.facebook.com/Fadmashion" send="true" width="220" show_faces="false"></fb:like>
        </div>
      </div>
			<?php print theme('fm_social_favorite_most_loved'); ?>
			</div>
				   
	 </div>

<?php include('footer.tpl.php');?>
</div><!--wrapper-->
</div><!--container-->


<?php print theme('fm_global_footer_tabs');?>

<br clear="all">
<br clear="all">
<br clear="all">