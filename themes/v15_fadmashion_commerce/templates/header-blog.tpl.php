
	 
	 
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
               <a  target="_parent" id="sign_up" href="/home">Sign Up</a>
               <a target="_parent" id="login"  href="/home">Login</a>
             <?php } ?>
             <a href="http://blog.fadmashion.com">Blog</a>
             <a href="<?php print $url?>/about-us">About</a>
    </div><!-- links-->
    <div class="shipping"><p><span>Free shipping & hassle-free returns</p></div></div>
        
    <a target="_parent" class="logo" href="<?php print $front_page; ?>" title="<?php print t('Fadmashion'); ?>" rel="home" >
        			    <img src="<?php print pp();?>logo_fm.png" alt="<?php print t('Fadmashion'); ?>" />
    </a>
    <div class="nav">
      <ul>
        <li><a href="/home" target="_parent" class="home">Home</a></li>
        <li><a target="_parent" href="/shop" class="tooltipBtn">Shop</a></li>
         <?php //print fm_shop_subnav_items();?>
         <?php global $user;
            if ($user->uid) { ?>
         <li ><?php print l('Share', 'user/share-with-friends')?></li>
          <?php } else {?>        
          <li class=""><a href="/shop" target="_parent">Join</a></li>
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
        <h1 class="slogan">A <span>New York</span> Style Collective & Boutique </h1>
        
        </div>