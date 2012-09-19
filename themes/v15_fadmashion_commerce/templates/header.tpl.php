
	 
	 
<div id="header">
  <div class="right">
    <div class="links">
    <div class="static_links">
    <?php  $url = url('static', array('alias' => true, 'fragment' => '!')); ?>
    <?php  $url2 =  url('for-designers', array('query' => array('page' => 'designers'))); 
           $designers = $url . $url2;
           
           if(!fm_commerce_store_owners_is_admin() ) {
           	print '<a id="designer_header" href="' . $designers . '">For Designers</a>';
           } else {
           	$store = fm_commerce_store_owners_get_store();
           	print  l($store->name, 'user/store_owners/orders', array('attributes' => array('id' => 'designer_header')));
           }
     ?>
        
   
        </div>
        
        <?php global $user;
            if ($user->uid) { ?>
                
                <?php print l('Logout', 'user/logout');?>
               <?php //print l('+ Invite Friends', 'user/share-with-friends');?>
             <?php } else{ ?>
               <a  id="sign_up" href="javascript:void(0);" onClick="fmUserStateRestart(); jQuery('.state1').show();fmForceRegister();fmClearRegisterTimeout();">Sign Up</a>
               <a id="login"  href="javascript:void(0);" onClick="fmUserStateRestart(); jQuery('.state3').show();fmForceRegister();fmClearRegisterTimeout();">Login</a>
             <?php } ?>
             <a href="http://blog.fadmashion.com">Blog</a>
             <a href="<?php print $url?>/about-us">About</a>
    </div><!-- links-->
    <div class="shipping"><p><span>Free shipping & hassle-free returns</p></div></div>
        
    <a class="logo" href="<?php print $front_page; ?>" title="<?php print t('Fadmashion'); ?>" rel="home" >
        			    <img src="<?php print pp();?>logo_fm.png" alt="<?php print t('Fadmashion'); ?>" />
    </a>
    <div class="nav">
      <ul>
        <li class="<?php $is_front ? print 'active' : ''?>"><?php print l('Home', 'home', array('attributes' => array('class' => array('home') )));?></li>
        <li class="<?php arg(0) == 'shop' ? print 'active' : ''?>"><a href="/shop" class="tooltipBtn">Shop</a></li>
         <?php print fm_shop_subnav_items();?>
         <?php global $user;
            if ($user->uid) { ?>
         <li class="<?php (arg(0) == 'user' && arg(1) == 'share-with-friends') ? print 'active' : ''?>"><?php print l('Share', 'user/share-with-friends')?></li>
          <?php } else {?>        
          <li class=""><a onClick="jQuery('#sign_up').trigger('click');" href="javascript: void(0)">Join</a></li>
          <?php }?>                                             
        <li> </li>             
      </ul>
    </div>
</div>

<div id="subHeader">
      
<div class="press">
        	<a target="_blank" href="http://nymag.com/tags/fadmashion/"><img src="<?php print pp();?>logo_ny.jpg"></a>
        	<a target="_blank" href="http://bit.ly/n9H1YF"><img src="<?php print pp();?>logo_fashionindie.jpg"></a>
        	<a target="_blank" href="http://www.thefashionspot.com/runway-news/news/110425-alex-a-eli-emerging-designer-spotlight"><img src="<?php print pp();?>logo_tfs.jpg"></a>
        	<a target="_blank" href="http://bit.ly/iQfNCD "><img src="<?php print pp();?>logo_prcouture.jpg"></a>
        	</div>
        <h1 class="slogan" style="float: left">A <span>New York</span> Style Collective & Boutique </h1>
        <div style="float: left; margin: 10px 20px; "><iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2Ffadmashion&amp;send=false&amp;layout=button_count&amp;width=450&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:21px;" allowTransparency="true"></iframe>
        </div>
 </div>