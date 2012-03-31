
	 
	 
<div id="header">
  <div class="right">
    <div class="links">
        <?php global $user;
            $status = fm_users_register_sessions_status();
            if ($user->uid) { ?>
                
                <?php if(module_exists('fm_commerce_store_owners')) {
                             $store = fm_commerce_store_owners_get_store();
                             if($store) { 
                               $url = '/?width=620&inline=true#block-quicktabs-store-owners-admin';
                               print '<a title="'.$store->name.'" class="colorbox-inline" href="' . $url . '">' . $store->name . '</a>';
                             }
                           }
                        ?>
                <?php 
                      $url = '/?width=620&inline=true#block-fm-users-fm-users-orders';
                			print '<a title="' . t('My Purchases') . '" class="colorbox-inline" href="' . $url . '">' . t('My Purchases') . '</a>'; ?>
               
                <?php 
                      $url = '/?inline=true#block-fm-users-fm-users-invite&blankBox=1';
                			print '<a  class="colorbox-inline invite" href="' . $url . '">' . t('+ Invite Friends') . '</a>'; ?>
                
                <?php print l('Logout', 'user/logout');?>
                
               
             <?php } else if($status == 'member'){ ?>
               <a href="javascript:void(0);" onClick="fmUserStateRestart();jQuery('.state3').show();fmForceRegister();fmClearRegisterTimeout();">Login</a>
                <?php 
                      $url = '/?inline=true#block-fm-users-fm-users-invite&blankBox=1';
                			print '<a  onClick="fmUserStateRestart(); fmInviteReset(); jQuery(\'.state2\').show();fmClearRegisterTimeout();" class="colorbox-inline invite" href="' . $url . '">' . t('Invite Friends') . '</a>'; ?>
                
             <?php } elseif($status == 'non_member' || $status == 'non_member_first_time'){ ?>
               <a href="javascript:void(0);" class="button"  onClick="fmUserStateRestart();jQuery('.state1').show();fmForceRegister();fmClearRegisterTimeout();">Sign Up</a>
               <?php 
                      $url = '/?inline=true#block-fm-users-fm-users-invite&blankBox=1';
                			print '<a onClick="fmUserStateRestart(); fmInviteReset(); jQuery(\'.state2\').show();fmClearRegisterTimeout();" class="colorbox-inline invite" href="' . $url . '">' . t('Invite Friends') . '</a>'; ?>
                
             <?php } else{ ?>
               <a class="button" href="javascript:void(0);" onClick="fmUserStateRestart(); jQuery('.state1').show();fmForceRegister();fmClearRegisterTimeout();">Sign Up</a>
               <a href="javascript:void(0);" onClick="fmUserStateRestart(); jQuery('.state3').show();fmForceRegister();fmClearRegisterTimeout();">Login</a>
             <?php } ?>
    </div><!-- links-->
    <div class="shipping"><p><span>Free shipping</span> on orders of $150 or more, plus <span>hassle-free returns</span></p></div></div>
        
    <a class="logo" href="<?php print $front_page; ?>" title="<?php print t('Fadmashion'); ?>" rel="home" >
        			    <img src="<?php print pp();?>logo_fadmashion.png?v2" alt="<?php print t('Fadmashion'); ?>" />
    </a>
    <div class="nav">
      <?php print l('Shop', 'shop', array('attributes' => array('class' => array('acitve'))));?>
      <a href="#">Explore</a>              
    </div>
</div>

<div id="subHeader">
        <div class="press">
        	<a class="press1" href="#">NY Mag</a>
        	<a class="press2" href="#">My Fashion Life</a>
        	<a class="press3" href="#">FashionSpot</a>
            </div>
        <div class="slogan"><span>Browse</span> designer collections.&nbsp;&nbsp;&nbsp;<span>Shop</span> private sales.&nbsp;&nbsp;&nbsp;<span>Love</span> your new look.</div>
        </div>