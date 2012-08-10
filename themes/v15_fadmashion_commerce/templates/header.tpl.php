
	 
	 
<div id="header">
  <div class="right">
    <div class="links">
        <?php global $user;
            if ($user->uid) { ?>
                
                <?php print l('Logout', 'user/logout');?>
             <?php } else{ ?>
               <a  href="javascript:void(0);" onClick="fmUserStateRestart(); jQuery('.state1').show();fmForceRegister();fmClearRegisterTimeout();">Sign Up</a>
               <a href="javascript:void(0);" onClick="fmUserStateRestart(); jQuery('.state3').show();fmForceRegister();fmClearRegisterTimeout();">Login</a>
             <?php } ?>
             
        <?php  $url = url('static', array('alias' => true, 'fragment' => '!')); ?>
        <a href="<?php print $url?>/about-us">About</a>
    </div><!-- links-->
    <div class="shipping"><p><span>Free shipping & hassle-free returns</p></div></div>
        
    <a class="logo" href="<?php print $front_page; ?>" title="<?php print t('Fadmashion'); ?>" rel="home" >
        			    <img src="<?php print pp();?>logo_fm.png" alt="<?php print t('Fadmashion'); ?>" />
    </a>
    <div class="nav">
    <a class="home" href="#">Home</a>
     <?php print l('Shop', 'shop', array('attributes' => array('class' => array($is_front ? 'active' : '') )));?>
      <a href="http://blog.fadmashion.com">Blog</a>              
    </div>
</div>

<div id="subHeader">
        <div class="press">
            </div>
        <h1 class="slogan">A <span>New York</span> Fashion Collective & Boutique </h1>
        </div>