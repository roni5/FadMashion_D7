<?php
function fadmashion_commerce_preprocess_node(&$variables) {
	$node_type = str_replace('-', '_', $variables['node']->type);
  $variables['theme_hook_suggestions'][] = 'node__' . $node_type;
  
}

/*
 * CSS & JS files to load up on each page request.  
 */
function fadmashion_commerce_preload() {
	
	drupal_add_library('jquery_plugin', 'validate');
	drupal_add_library('system', 'jquery.form');
	drupal_add_js(path_to_theme() . '/js/jquery.titlealert.js');
	drupal_add_js(path_to_theme() . '/js/FM_form.js');
	drupal_add_js(drupal_get_path('module', 'fm_commerce_orders') . '/fm_commerce_orders.js');
	drupal_add_js(drupal_get_path('module', 'fm_invite') . '/fm_invite.js');
	drupal_add_js(drupal_get_path('module', 'fm_deals') . '/fm_deals.js');
	drupal_add_js(path_to_theme() . '/js/jquery.cookie.js');
	drupal_add_js(drupal_get_path('module', 'fm_commerce_store_owners') . '/fm_commerce_store_owners.js');
	
}

function fadmashion_commerce_preprocess_page(&$variables) {
	
	//Add Global javascript and CSS
	fadmashion_commerce_preload();
	
	
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
    drupal_add_css(path_to_theme().'/css/supersized.css');
    drupal_add_css(path_to_theme().'/css/front.css');  
    
    $variables['front_intro'] = false;
    if(count($split_url) == 1) {
    	$variables['front_intro'] = true;
    }
  }
  
  $static_pages = fadmashion_commerce_static_pages();
  if(in_array($split_url[0], $static_pages)) {
  	drupal_add_css(path_to_theme().'/css/static.css');  
    $variables['theme_hook_suggestions'][] = 'page__static';
  }
  
  
  // Add template suggestions based on content type
  if (isset($variables['node'])) { 
  	$node_type = str_replace('-', '_', $variables['node']->type);
    $variables['theme_hook_suggestions'][] = "page__type__" . $node_type;
    $variables['menu_active'] = 'featured';
  }
  //Manual header ACTIVE state
  if($split_url[0] == 'deals') {
  	//Add How it Works carousel drop-down 
  	drupal_add_js(drupal_get_path('module', 'fm_carousel').'/fm_carousel.js');
  	if($split_url[1] == 'preview') {
  	  $variables['menu_active'] = 'preview';
  	} else if(fm_deals_states_get_status($variables['node'])  != 'active') {
  		$variables['menu_active'] = '';
  	}
  	
  }
  
    
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
  $static_pages = fadmashion_commerce_static_pages();
  if(in_array($split_url[0], $static_pages)) {
  	unset($css[path_to_theme().'/css/style.css']);
  }
  
}

function fadmashion_commerce_static_pages() {
	return array('faq', 'about', 'not-authorized', 'access-denied', 'story', 'people', 'terms-use', 'privacy', 'contact');
}



?>