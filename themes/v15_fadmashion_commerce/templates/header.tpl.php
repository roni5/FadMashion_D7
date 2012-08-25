
	 
	 
<div id="header">
  <div class="right">
    <div class="links">
        <?php global $user;
            if ($user->uid) { ?>
                
                <?php print l('Logout', 'user/logout');?>
               <?php print l('+ Invite Friends', 'user/share-with-friends');?>
             <?php } else{ ?>
               <a  id="sign_up" href="javascript:void(0);" onClick="fmUserStateRestart(); jQuery('.state1').show();fmForceRegister();fmClearRegisterTimeout();">Sign Up</a>
               <a id="login"  href="javascript:void(0);" onClick="fmUserStateRestart(); jQuery('.state3').show();fmForceRegister();fmClearRegisterTimeout();">Login</a>
             <?php } ?>
             
        <?php  $url = url('static', array('alias' => true, 'fragment' => '!')); ?>
        <div class="static_links">
        <a href="<?php print $url?>/about-us">FOR DESIGNERS</a>
        <a href="<?php print $url?>/about-us">About</a>
        </div>
    </div><!-- links-->
    <div class="shipping"><p><span>Free shipping & hassle-free returns</p></div></div>
        
    <a class="logo" href="<?php print $front_page; ?>" title="<?php print t('Fadmashion'); ?>" rel="home" >
        			    <img src="<?php print pp();?>logo_fm.png" alt="<?php print t('Fadmashion'); ?>" />
    </a>
    <div class="nav">
      <ul>
        <li class="<?php $is_front ? print 'active' : ''?>"><?php print l('Home', 'home', array('attributes' => array('class' => array('home') )));?></li>
        <li class="<?php arg(0) == 'shop' ? print 'active' : ''?>"><a href="javascript: void(0)" class="tooltipBtn">Shop</a></li>
         <?php print fm_shop_subnav_items();?>
                                                            
        <li><a href="http://blog.fadmashion.com">Blog</a> </li>             
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
        <h1 class="slogan">A <span>New York</span> Style Collective & Boutique </h1>
        
        </div>