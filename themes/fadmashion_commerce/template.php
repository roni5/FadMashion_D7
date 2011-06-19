<?php
function fadmashion_commerce_preprocess_node(&$variables) {
	$node_type = str_replace('-', '_', $variables['node']->type);
  $variables['theme_hook_suggestions'][] = 'node__' . $node_type;
  
}


function fadmashion_commerce_preprocess_page(&$variables) {
	
	global $user;
	
	if($user->uid) {
  	//Add user Variables
  	$loaded_user = user_load($user->uid);
  	$variables['user'] = $loaded_user;
	  if(!empty($loaded_user->field_first_name)) {
	  	$first_name = $loaded_user->field_first_name['und'][0]['value'];
	    $variables['user_first_name'] = $first_name;
	  }
	}

	
  $url_alias = drupal_get_path_alias($_GET['q']);
  $split_url = explode('/', $url_alias);
  
  //Use splash template only for URL's that have a splash as the first item in the URL
  if($split_url[0] == 'intro') {
    drupal_add_js(path_to_theme().'/js/supersized.min.js');
    drupal_add_js(path_to_theme().'/js/FM_form.js');
    drupal_add_css(path_to_theme().'/css/supersized.css');
    drupal_add_css(path_to_theme().'/css/front.css');
    $variables['theme_hook_suggestions'][] = 'page__'.$split_url[0];
  }
  
  // Add template suggestions based on content type
  if (isset($variables['node'])) { 
  	$node_type = str_replace('-', '_', $variables['node']->type);
    $variables['theme_hook_suggestions'][] = "page__type__" . $node_type;
  }
  if($split_url[0] == 'deals') {
  	$variables['theme_hook_suggestions'][] = "page__type__fm_group_buying" ;
  }
  
}

function fadmashion_commerce_css_alter(&$css) {
	$url_alias = drupal_get_path_alias($_GET['q']);
  $split_url = explode('/', $url_alias);
  
  //Use splash template only for URL's that have a splash as the first item in the URL
  if($split_url[0] == 'intro')
  {
    unset($css[path_to_theme().'/css/style.css']);
  }
}



?>