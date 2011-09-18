
<div id="footer">
    <div class="container">
    <div class="box">
    <div class="subCol"><h1>Have a question?</h1><a href="mailto:support@fadmashion.com">Contact us anytime</a></div> 
    <div class="subCol"><h1>Share the deals</h1>
    
      <?php $social_info = fm_deals_fb_social_info();?>
      <a href="javascript:void(0);" onClick="javascript:fm_invite_facebookshare( '<?php print fm_invite_get_invite_url();?>', '<?php print $social_info['image_path']; ?>');"><img src="/<?php print drupal_get_path("theme","fadmashion_commerce");?>/images/icon_share_facebook.jpg"></a>
      <a target="_blank" href="http://twitter.com/intent/tweet?text=<?php print fm_invite_twitter_text()?>"><img src="/<?php print drupal_get_path("theme","fadmashion_commerce");?>/images/icon_share_twitter.jpg"></a>
    </div>
</div>
    
        <div class="links"><?php print l('Our Story', 'story');?><a href="http://blog.fadmashion.com" >Blog</a><a href="mailto:info@fadmashion.com" >Contact Us</a><?php print l('FAQ', 'faq' ); ?></div>
        <div class="copyright">Copyright &copy; 2011, Fadmashion</div>
        <br clear="all">
    </div>
</div>