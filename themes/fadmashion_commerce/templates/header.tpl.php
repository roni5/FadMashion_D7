<div id="header">
            <div class="row2"> 
            <div id="accountNav">
                <ul class="tree">
                
                <li><?php print l('My Orders', 'my-orders', array('query' => array('width' => '700px'),  'attributes' => array('class' => array('colorbox-load') )) ); ?></li>
                <li> <?php print l('+ Invite Friends, Earn Rewards', 'invite/rewards', array( 'html' => true, 'query' => array( 'width' => 600), 'attributes' => array('style' => '', 'class' => 'colorbox-load', 'title' => 'Invite Friends and Earn Rewards') )  ); ?></li>
                
                <li ><?php print l('Logout', 'user/logout')?></li>
               </ul> 
             </div>
	        	    <a class="logo" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" >
        			    <img src="/<?php print drupal_get_path("theme","fadmashion_commerce");?>/images/logo_fadmashion.png" alt="<?php print t('fadmashion'); ?>" />
      			    </a>
              <div class="navBox">
                    <ul class="nav">
                        <li  <?php ($menu_active == 'featured' ? print 'class="active"' : '' )?> ><?php print l('Featured Deal', 'deals'); ?></li>
                        <li <?php ($menu_active == 'preview' ? print 'class="active"' : '' )?> ><?php print l('More Deals', 'deals/preview'); ?></li>
                        <!-- <li class="beautytips" id="voting-header" title="Coming Soon"><a href="#">Voting Booth</a>  -->
                        </li>
                        </ul></div>
            </div>
	 </div><!--header-->