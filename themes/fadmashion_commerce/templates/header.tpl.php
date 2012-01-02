<div id="header">
            <div class="row2"> 
              <div id="accountNav">
                <ul class="tree">
            <?php global $user;
            $status = fm_users_register_sessions_status();
            if ($user->uid) { ?>
                
                <li ><?php if(module_exists('fm_commerce_store_owners')) {
                             $store = fm_commerce_store_owners_get_store();
                             if($store) { 
                               $url = '/?width=620&inline=true#block-quicktabs-store-owners-admin';
                               print '<a title="'.$store->name.'" class="colorbox-inline" href="' . $url . '">' . $store->name . '</a>';
                             }
                           }
                        ?>
                </li>
                <li><?php 
                      $url = '/?width=620&inline=true#block-fm-users-fm-users-orders';
                			print '<a title="' . t('My Purchases') . '" class="colorbox-inline" href="' . $url . '">' . t('My Purchases') . '</a>'; ?>
                </li>
                <li><?php 
                      $url = '/?inline=true#block-fm-users-fm-users-invite&blankBox=1';
                			print '<a  class="colorbox-inline" href="' . $url . '">' . t('+ Invite Friends') . '</a>'; ?>
                </li>
                <li ><?php print l('Logout', 'user/logout');?></li>
                
               
             <?php } else if($status == 'member'){ ?>
               <li><a href="javascript:void(0);" onClick="jQuery('.state1').hide();jQuery('.state3').show();fmForceRegister();fmClearRegisterTimeout();">Login</a></li>
                <li><?php 
                      $url = '/?inline=true#block-fm-users-fm-users-invite&blankBox=1';
                			print '<a  class="colorbox-inline" href="' . $url . '">' . t('+ Invite Friends') . '</a>'; ?>
                </li>
             <?php } else if($status == 'non_member'){ ?>
               <li><a href="javascript:void(0);" onClick="jQuery('.state1').show();jQuery('.state3').hide();fmForceRegister();fmClearRegisterTimeout();">Sign Up</a></li>
               <li><?php 
                      $url = '/?inline=true#block-fm-users-fm-users-invite&blankBox=1';
                			print '<a  class="colorbox-inline" href="' . $url . '">' . t('+ Invite Friends') . '</a>'; ?>
                </li>
             <?php } else{ ?>
               <li><a href="javascript:void(0);" onClick="fmUserStateRestart(); jQuery('.state1').show();fmForceRegister();fmClearRegisterTimeout();">Sign Up</a></li>
               <li><a href="javascript:void(0);" onClick="fmUserStateRestart();j Query('.state3').show();fmForceRegister();fmClearRegisterTimeout();">Login</a></li>
             <?php } ?>
             
                	</ul> 
               </div>
             
	        	    <a class="logo" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" >
        			    <img src="<?php print pp();?>logo_fadmashion.png" alt="<?php print t('fadmashion'); ?>" />
      			    </a>
              <div class="navBox">
                    <ul class="nav">
                        <li  <?php ($menu_active == 'featured' ? print 'class="active"' : '' )?> ><?php print l('Live Deal', ''); ?></li>
                        <li <?php ($menu_active == 'preview' ? print 'class="active"' : '' )?> ><?php print l('Upcoming Deals', 'deals/preview'); ?></li>
                        <li><?php print l('Blog', 'http://blog.fadmashion.com', array('absolute' => true)); ?></li>
                        <!-- <li class="beautytips" id="voting-header" title="Coming Soon"><a href="#">Voting Booth</a>  -->
                        </li>
                        </ul></div>
            </div>
	 </div><!--header-->