<div id="promoTop" class="panel">
  <div class="panel-block">
    <img src="<?php print pp();?>panel_label_whats.png" alt="What's your New York style?" class="label">
    <p>Fadmashion introduces you to the unique styles of New York City.</p>
    <?php global $user; 
       if(!$user->uid) {?>
      <a href="javascript: void(0);" onClick="jQuery('#sign_up').trigger('click')" class="join">Join Free</a>
    <?php }else {
       print l('Get Inspired', 'shop', array('attributes' => array('class' => array('button'))));
     }?>
  </div>
</div>