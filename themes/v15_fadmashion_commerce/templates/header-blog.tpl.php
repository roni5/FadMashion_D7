
	 
	 
<div id="header">
  <div class="right">
    <div class="links">
    
        <?php global $user;
            if ($user->uid) { ?>
                
                <?php print l('Logout', 'user/logout', array('attributes' => array('parent' => '_target')));?>
             <?php } else{ ?>
               <a  href="javascript:void(0);" onClick="fmUserStateRestart(); jQuery('.state1').show();fmForceRegister();fmClearRegisterTimeout();">Sign Up</a>
               <a href="javascript:void(0);" onClick="fmUserStateRestart(); jQuery('.state3').show();fmForceRegister();fmClearRegisterTimeout();">Login</a>
             <?php } ?>
    </div><!-- links-->
    <div class="shipping"><p><span>Free shipping</span> on orders of $150 or more, plus hassle-free returns</p></div></div>
        
    <a target="_parent" class="logo" href="<?php print $front_page; ?>" title="<?php print t('Fadmashion'); ?>" rel="home" >
        			    <img src="<?php print pp();?>logo_fm.png" alt="<?php print t('Fadmashion'); ?>" />
    </a>
    <div class="nav">
     <?php  // print l('Shop', 'shop', array('absolute' => true, 'attributes' => array('target' => '_parent') ));?>
      <a target="_parent" href="http://www.fadmashion.com" >Shop</a>
      <a target="_parent" href="http://blog.fadmashion.com" class="active">Discover</a>              
    </div>
</div>

<div id="subHeader">
        <div class="press">
        	<a class="press1" href="#">NY Mag</a>
        	<a class="press3" href="#">FashionSpot</a>
            </div>
        <div class="slogan"><span>Browse</span> designer collections.&nbsp;&nbsp;&nbsp;<span>Shop</span> private sales.&nbsp;&nbsp;&nbsp;<span>Love</span> your new style.</div>
        </div>