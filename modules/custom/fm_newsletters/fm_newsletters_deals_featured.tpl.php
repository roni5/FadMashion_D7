<?php
  $product = fm_commerce_get_product($node);
  $store = fm_commerce_get_store($product);  
  $themed_image = fm_deals_preview_get_image($product);
		
	node_build_content($node);
		
	//Add the percentage savings
  $node->sale_percentage = fm_deals_percentage($node);
    
  //Check for what state the item is in and attach to node
  $status = fm_deals_states_get_status($node);
  $node->deal_status = $status;
  
  $start_time = fm_deals_time($node->nid);
  $start_time = $start_time['start'];
  $end_time = $start_time['end'];
  
	$description = field_get_items('commerce_product', $product, 'field_description');
	$description = $description[0]['value'];
	
	$full_url = fm_newsletters_image_path();
	
	$image = fm_newsletters_deals_generate_url($product, 'fm_deals_newsletter_featured');
    
?>

<table width="100%" cellspacing="0" cellpadding="0" border="0">

  <tr>
    <td class="side1">&nbsp;</td>
    <td>&nbsp;</td>
    <td width="246" valign="top" class="photo" rowspan="5">
      <div class="mainPhoto"><?php print l($image, 'node/' . $node->nid, array('html' => true, 'absolute' => true) );?></div>
      <img class="shadow_newsletter" src="<?php print $full_url?>shadow.jpg"></td>
    <td class="side1">&nbsp;</td>
  </tr>
  <tr>
    <td class="side2">&nbsp;</td>
    <td width="430" class="featureHead">On Sale Today @ <?php print '<b>' . date("ga", $start_time);?> EST</td>
    <td class="side2">&nbsp;</td>
  </tr>
  <tr>
    <td class="side3">&nbsp;</td>
    <td width="430" valign="top" class="featureInfo">
    <div class="pad">
    <h1><?php print $product->title; ?></h1>
    <h2>by <?php print $store->name; ?></h2>
    <p class="description"><?php print $description;?></p>
    <?php print l('Save ' .  $node->sale_percentage . ' Now', 'node/' . $node->nid, array('absolute' => true,  'attributes' => array('class' => array('button'))) ); ?>
    <div class="finePrint">This deal ends <?php print '<b>' . date("g:i a", $end_time);?> EST</div>
    </div>
    </td>
    <td class="side3">&nbsp;</td>
  </tr>
  <tr>
    <td class="side4">&nbsp;</td>
    <td width="430" class="side4"></td>
    <td class="side4">&nbsp;</td>
  </tr>
</table>
<table width="100%" cellspacing="0" cellpadding="0" border="0">
<tr>
    <td class="side5">&nbsp;</td>
    <td width="676" class="side5">
        
        <!-- begin logo and quote-->
        <table width="100%" cellspacing="0" cellpadding="0" border="0">
        <tbody><tr>
        <td class="designerLogo"><div><?php print render($node->content['store:field_logo']); ?><img style="display: block;" src="<?php print $full_url;?>newsletter-logo-shadow.jpg"></div></td>
        <td class="quoteNub"><img src="<?php print $full_url;?>quote-nub.jpg"></td>
        
        <td class="designerQuote"><div class="box">
        <img src="<?php print $full_url;?>quote-top.jpg"><div class="pad">"<?php print render($node->content['store:field_quote']); ?>"</div><img src="<?php print $full_url;?>quote-bottom.jpg"></div>
     </td>
</tr></table><!-- end logo and quote-->


     <!-- begin press and bio-->
        <table width="100%" cellspacing="0" cellpadding="0" border="0">
        <tbody><tr>
        <td valign="top" class="bio">
        <h1>About <?php print $store->name; ?></h1>
        <?php print render($node->content['store:field_quick_facts']); ?>  
</td>
        <td valign="top" class="press">
        <h1>Designer Press</h1>
         <?php print render($node->content['store:field_press']); ?>
    </td>
</tr></tbody></table><!-- end press and bio-->



    </td>
    <td class="side5">&nbsp;</td>
  </tr>
</tbody></table>