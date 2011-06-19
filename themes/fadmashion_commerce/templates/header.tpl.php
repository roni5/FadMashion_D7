<div id="header">
        	<div class="row1">
            	<div id="accountNav">
                <ul class="tree">
                <li class="menu"><a href="#"></a> <?php print $user_first_name; ?></a></li>
                <li class="menu"><a href="#"><img class="flag" src="images/icon_flag_usa.png">My Orders</a></li>
                <li><a href="#">Invite Friends</a></li>
               </ul> </div>
                <p>Fresh Design Inspirations Every Hour! <a class="learnMore" href="#">Learn More</a></p>
            </div>
            <div class="row2"> 
	        	    <a class="logo" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" >
        			    <img src="/<?php print drupal_get_path("theme","fadmashion_commerce");?>/images/logo_fadmashion.png" alt="<?php print t('Home'); ?>" />
      			    </a>
              <div class="navBox"><img src="/<?php print drupal_get_path("theme","fadmashion_commerce");?>/images/bg_nav_left.png">
                    <ul class="nav">
                        <li><?php print l('1-Hour Deals', 'deals'); ?></li>
                        <li><?php print l('Voting Booth', 'voting'); ?></li>
                        </ul><img src="/<?php print drupal_get_path("theme","fadmashion_commerce");?>/images/bg_nav_right.png"></div>
            </div>
	 </div><!--header-->