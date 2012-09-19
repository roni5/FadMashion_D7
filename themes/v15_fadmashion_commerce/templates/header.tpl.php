
	 
	 
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
<fb:like href="http://www.facebook.com/Fadmashion" send="false" width="450" show_faces="true"></fb:like>
        	</div>
        <h1 class="slogan">A <span>New York</span> Style Collective & Boutique </h1>
        
        </div>