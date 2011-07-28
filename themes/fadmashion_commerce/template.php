<?php
function fadmashion_commerce_preprocess_node(&$variables) {
	$node_type = str_replace('-', '_', $variables['node']->type);
  $variables['theme_hook_suggestions'][] = 'node__' . $node_type;
  
}


function fadmashion_commerce_preprocess_page(&$variables) {
	
	//Add Global javascript and CSS
	drupal_add_library('jquery_plugin', 'validate');
	drupal_add_library('system', 'jquery.form');
	drupal_add_js(drupal_get_path('module', 'fm_commerce_orders').'/fm_commerce_orders.js');
	
	
	global $user;
	
	if($user->uid) {
  	//Add user Variables
  	$loaded_user = user_load($user->uid);
  	$variables['user'] = $loaded_user;
  	$user_wrapper = entity_metadata_wrapper('user', $loaded_user);
	  if(!empty($loaded_user->field_first_name)) { 
	    $variables['user_first_name'] = $user_wrapper->field_first_name->value();
	  }
	  
	  //Clean Expired Orders for user
	  if(module_exists('fm_deals_states')) {
	    fm_deals_states_clean_expired_deals();
	  }
	}
	
  $url_alias = drupal_get_path_alias($_GET['q']);
  $split_url = explode('/', $url_alias);
  $variables['theme_hook_suggestions'][] = 'page__'.$split_url[0];
  
  //Use splash template only for URL's that have a splash as the first item in the URL
  if($split_url[0] == 'intro') {
    drupal_add_js(path_to_theme().'/js/supersized.min.js');
    drupal_add_js(path_to_theme().'/js/FM_form.js');
    drupal_add_css(path_to_theme().'/css/supersized.css');
    drupal_add_css(path_to_theme().'/css/front.css');  
    
    
    
    $variables['front_intro'] = false;
    if(count($split_url) == 1) {
    	$variables['front_intro'] = true;
    }
  }
  
  // Add template suggestions based on content type
  if (isset($variables['node'])) { 
  	$node_type = str_replace('-', '_', $variables['node']->type);
    $variables['theme_hook_suggestions'][] = "page__type__" . $node_type;
    $variables['menu_active'] = 'featured';
  }
  /*if($split_url[0] == 'deals') {
  	$variables['theme_hook_suggestions'][] = "page__type__fm_group_buying" ;
  }*/
  
  //Manual header ACTIVE state
  if($split_url[0] == 'deals') {
  	if($split_url[1] == 'preview') {
  	  $variables['menu_active'] = 'preview';
  	}
  }
  
  var_dump($split_url[0]);
  
    
  if(module_exists('beautytips')) {
    //Nave Tool Tips
    $options['voting-header'] = array(
      'cssSelect' => '#voting-header',
      'trigger' => array('hover'),
	    'positions' => array('bottom'),
	    'fill' =>  "rgb(255, 255, 255)",
	    'width' => '100px',
      'style' => 'hulu',
      'spikeLength' => 5,
       'spikeGirth' => 10,
      'overlap' => 15,
    );
    beautytips_add_beautytips($options);
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