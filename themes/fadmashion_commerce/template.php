<?php
function fadmashion_commerce_preprocess_node(&$variables) {
	//$path = drupal_lookup_path('alias', 'node/'.$variables['node']->nid);
  //$variables['theme_hook_suggestion'] = 'node__'.$path;
}

function fadmashion_commerce_preprocess_page(&$variables) {
	
  $url_alias = drupal_get_path_alias($_GET['q']);
  $split_url = explode('/', $url_alias);
  
  //Use splash template only for URL's that have a splash as the first item in the URL
  if($split_url[0] == 'intro')
  {
    drupal_add_js(path_to_theme().'/js/supersized.3.1.3.core.min.js');
    drupal_add_js(path_to_theme().'/js/FM_form.js');
    drupal_add_css(path_to_theme().'/css/supersized.core.css');
    drupal_add_css(path_to_theme().'/css/front.css');
    $variables['theme_hook_suggestion'] = 'page__'.$split_url[0] ;
    
    if($variables['is_front']) {
    	$form = drupal_get_form('fm_invite_request_form');  
	    $variables['request_form'] = drupal_render($form);
	    $variables['form_desc'] ='<p>Request an invintation to our <br>upcoming private launch</p>';
    }
    else {
    	$variables['form_desc'] ='<p>Post the link below into Twitter, Facebook or paste in an Email.</p>';
	    $variables['request_form'] = fm_invite_share_info(); 
    }
    
  }
}


?>