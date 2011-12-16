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
    
?>

<table width="100%" cellspacing="0" cellpadding="0" border="0">

  <tbody><tr>
    <td class="side1">&nbsp;</td>
    <td>&nbsp;</td>
    <td width="246" valign="top" class="photo" rowspan="5"><div class="mainPhoto"><img src="photo-main.jpg"></div>
      <img class="shadow" src="shadow.jpg"></td>
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
    <p class="description">A black silk chiffon racer bank tank delicately adorned with row upon row of silver sequined stripes, perfect for tucking into a high waisted skirt or just letting it all drape over a pair of tiny leather shorts. </p>
    <a class="button" href="#">Save <?php print $node->sale_percentage;?> Now</a>
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

</tbody></table>
<table width="100%" cellspacing="0" cellpadding="0" border="0">

 <tbody><tr>
    <td class="side5">&nbsp;</td>
    <td width="676" class="side5">
        
        <!-- begin logo and quote-->
        <table width="100%" cellspacing="0" cellpadding="0" border="0">
        <tbody><tr>
        <td class="designerLogo"><div><img style="display: block;" src="designer-logo.jpg"><img style="display: block;" src="logo-shadow.jpg"></div></td>
        <td class="quoteNub"><img src="quote-nub.jpg"></td>
        
        <td class="designerQuote"><div class="box">
        <img src="quote-top.jpg"><div class="pad">"My goal is to make easy, modern, understated, beautifully crafted clothing that feel as comfortable as wearing jeans and a T-shirt."</div><img src="quote-bottom.jpg"></div>
     </td>
</tr></tbody></table><!-- end logo and quote-->


     <!-- begin press and bio-->
        <table width="100%" cellspacing="0" cellpadding="0" border="0">
        <tbody><tr>
        <td valign="top" class="bio">
        <h1>About Jonathan Simkahi</h1>
        <p>New York native Jonathan Simkhai gravitated toward the fashion industry as a young teen, when he realized his remarkable sales skills and renowned fashion insight.</p>
<p>After honing in on his retail sales abilities, Simkhai pursued buying, which ultimately allowed him to see a void in the women's contemporary market.
 </p>
  <a href="#">More about Jonathan Simkhai</a>      
</td>
        <td valign="top" class="press">
        <h1>Designer Press</h1>
        <div>"Innocent school girl crossed with menswear was the mash-up brought to Fall 2011 Collections by up-and-coming designer, Jonathan Simkhai, who never fails to give us a fresh take on feminine masculinity."
<a class="source" href="#">PoshGlam</a></div>

<div>"We at T couldn't help but notice Jonathan Simkhai."

<a class="source" href="#">The New York Times</a></div>


    </td>
</tr></tbody></table><!-- end press and bio-->



    </td>
    <td class="side5">&nbsp;</td>
  </tr>
</tbody></table>