
	 
	 
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
        <a href="<?php print $url?>/about-us">About</a>
    </div><!-- links-->
    <div class="shipping"><p><span>Free shipping & hassle-free returns</p></div></div>
        
    <a class="logo" href="<?php print $front_page; ?>" title="<?php print t('Fadmashion'); ?>" rel="home" >
        			    <img src="<?php print pp();?>logo_fm.png" alt="<?php print t('Fadmashion'); ?>" />
    </a>
    <div class="nav">
      <ul>
        <li class="<?php $is_front ? print 'active' : ''?>"><?php print l('Home', 'home', array('attributes' => array('class' => array('home') )));?></li>
        <li class="<?php arg(0) == 'shop' ? print 'active' : ''?>"><?php print l('Shop', 'shop', array('attributes' => array('class' => array('tooltipBtn', 'not-active') )));?></li>
         <div class="shop_subnav">
            <div class="pad">
              <div class="column">
                <div class="block"><img class="title" alt="Styles" src="<?php print pp();?>title_small_styles.png"><ul><li><a href="/Bedford%20Avenue%20Bedlam?term=6" >Bedford Avenue Bedlam</a></li><li class="trends "><a href="/Bold%20as%20BedStuy?term=7" id="term_7">Bold as BedStuy</a></li><li class="trends "><a href="/Chelsea%20Class?term=8" id="term_8">Chelsea Class</a></li><li class="trends "><a href="/Hamptons%20Resort?term=50" id="term_50">Hamptons Resort</a></li><li class="trends "><a href="/Soho%20Chic?term=51" id="term_51">Soho Chic</a></li><li class="trends "><a href="/Upper%20West%20Side%20Lux?term=10" id="term_10">Upper West Side Lux</a></li><li class="trends "><a href="/West%20Village%20Vibe?term=9" id="term_9">West Village Vibe</a></li><li class="trends "><a href="/Working%20It%20%40%20Midtown?term=49" id="term_49">Working It @ Midtown</a></li></ul></div>
              </div><!-- column-->
              <div class="column"> 
                <div class="block"><img class="title" alt="New Arrivals" src="<?php print pp();?>title_small_newarrivals.png"><ul><li class="product_type "><a href="/Jewelry?term=2" id="term_2">Jewelry</a></li><li class="product_type "><a href="/Apparel?term=3" id="term_3">Apparel</a></li><li class="product_type child"><a href="/Dresses?term=13" id="term_13">Dresses</a></li><li class="product_type child"><a href="/Tops?term=11" id="term_11">Tops</a></li><li class="product_type child"><a href="/Bottoms?term=12" id="term_12">Bottoms</a></li><li class="product_type "><a href="/Bags?term=1" id="term_1">Bags</a></li><li class="product_type "><a href="/Shoes?term=4" id="term_4">Shoes</a></li></ul></div>
                <div class="block"><img class="title" alt="Browse By" src="<?php print pp();?>title_small_browse.png"><ul><li class="browse_by "><a href="/Most%20Loved?favorites=all-time" id="all-time">Most Loved</a></li><li class="browse_by "><a href="/My%20Favorites?favorites=my-favorites" id="my-favorites">My Favorites</a></li><li class="browse_by "><a href="/Designers?store_id=all" id="all">Designers</a></li></ul></div> 
              </div><!-- column-->
             </div><!-- pad-->
           </div><!-- tooltip balloon-->
                                                            
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