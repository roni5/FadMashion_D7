<div id="header">
        	<div class="row1">
            	<div id="accountNav">
                <ul class="tree">
                <li class="menu"></li>
                <li><?php print l('My Orders', 'my-orders', array('query' => array('width' => '700px'),  'attributes' => array('class' => array('colorbox-load') )) ); ?></li>
                <li> <?php print l('+ Invite Friends, Earn Rewards', 'invite/rewards', array( 'html' => true, 'query' => array( 'width' => 600, 'height' => 450), 'attributes' => array('style' => '', 'class' => 'colorbox-load', 'title' => 'Invite Friends and Earn Rewards') )  ); ?></li>
               </ul> </div>
                <p>We're in Alpha! <a class="learnMore" href="#">Learn More</a></p>
            </div>
            <div class="row2"> 
	        	    <a class="logo" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" >
        			    <img src="/<?php print drupal_get_path("theme","fadmashion_commerce");?>/images/logo_fadmashion.png" alt="<?php print t('fadmashion'); ?>" />
      			    </a>
              <div class="navBox"><img src="/<?php print drupal_get_path("theme","fadmashion_commerce");?>/images/bg_nav_left.png">
                    <ul class="nav">
                        <li><?php print l('1-Hour Deals', 'deals'); ?></li>
                        <li><?php print l('Voting Booth', 'voting'); ?></li>
                        </ul><img src="/<?php print drupal_get_path("theme","fadmashion_commerce");?>/images/bg_nav_right.png"></div>
            </div>
	 </div><!--header-->