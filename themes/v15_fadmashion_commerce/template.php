<?php


define('INTRO_IMAGES_NODEQUEUE', 4);

function v15_fadmashion_commerce_preprocess_node(&$variables) {
	$node_type = str_replace('-', '_', $variables['node']->type);
  $variables['theme_hook_suggestions'][] = 'node__' . $node_type;
  
}

//Get the Image path for this theme.
function pp($absolute = false) {
	$path = drupal_get_path("theme","v15_fadmashion_commerce") . '/images/';
	
	if($absolute) {
		$path = url('/', array('absolute' => true)) . $path;
		return $path;
	} else{
	  //True for live server, else localhost remove the preceding slash
	  if(true) {
  		return '/' . $path; 
  	} else {
		  return $path;
	  }
	}
}


/*
 * Implements hook_colorbox_settings_alter()
 */
function v15_fadmashion_commerce_colorbox_settings_alter(&$settings) {
	$settings['initialWidth'] = 350;
	$settings['initialHeight'] = 200;
	$settings['close'] = '<img src="' . pp().'b_close.jpg' . '">';
}

/*
 * CSS & JS files to load up on each page request.  
 */
function v15_fadmashion_commerce_preload() {
	
	drupal_add_library('jquery_plugin', 'validate');
	drupal_add_library('system', 'jquery.form');
	drupal_add_js(drupal_get_path('module', 'fm_commerce_orders') . '/fm_commerce_orders.js');
	drupal_add_js(drupal_get_path('module', 'fm_invite') . '/fm_invite.js');
	drupal_add_js(drupal_get_path('module', 'fm_deals') . '/fm_deals.js');;
	drupal_add_js(drupal_get_path('module', 'fm_commerce_store_owners') . '/fm_commerce_store_owners.js');
	drupal_add_js(path_to_theme() . '/js/jquery.address.js');
	
	//For Image viewer on products
	drupal_add_js(drupal_get_path('module', 'fm_image_slider').'/fm_image_slider_slides.js');
	drupal_add_js(drupal_get_path('theme', 'v15_fadmashion_commerce').'/js/slides.jquery.js');
	
	//Add Zoom JS
	drupal_add_js(drupal_get_path('theme', 'v15_fadmashion_commerce').'/js/jquery.gzoom.js');
	drupal_add_css(drupal_get_path('theme', 'v15_fadmashion_commerce').'/css/jquery.gzoom.css');
	//drupal_add_js(drupal_get_path('theme', 'fadmashion_commerce').'/js/featuredimagezoomer.js');
	drupal_add_js(drupal_get_path('theme', 'v15_fadmashion_commerce').'/js/jquery.mousewheel.min.js');
	drupal_add_js(drupal_get_path('theme', 'v15_fadmashion_commerce').'/js/jquery.panFullSize.js');  
	
  //Zoom Colorbox Url
  $url = '/?height=80%&width=840&inline=true#zoomed';
  drupal_add_js('var zoomUrl = "' . $url . '";', 'inline');
  
  //SimpleTabs
  drupal_add_js(drupal_get_path('theme', 'v15_fadmashion_commerce').'/js/simpletabs_1.3.js');
	drupal_add_css(drupal_get_path('theme', 'v15_fadmashion_commerce').'/css/simpletabs.css');

	drupal_add_js(drupal_get_path('theme', 'v15_fadmashion_commerce').'/js/jquery.selectBox.min.js'); 
	
	drupal_add_js(drupal_get_path('theme', 'v15_fadmashion_commerce').'/js/jquery.imgpreload.min.js');  
	$image_paths = v15_fadmashion_commerce_preload_image_paths();
  drupal_add_js('var preload_image_paths = [' . implode(',', $image_paths) . '];', 'inline');
	
	drupal_add_js(drupal_get_path('theme', 'v15_fadmashion_commerce').'/js/jquery.autopager.js');
	
	
	global $status;
	$status = fm_users_register_sessions_status();
	
	global $user;
	drupal_add_js('var uid = ' . $user->uid . ';', 'inline');
	drupal_add_js('var user_status = \'' . $status . '\';', 'inline');
	
	drupal_add_library('system', 'effects');
	drupal_add_library('system', 'ui.tabs');
	
}

function v15_fadmashion_commerce_preprocess_page(&$variables) {
	
	//Add Global javascript and CSS
	v15_fadmashion_commerce_preload();
	
	
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
  $front_intro = 0;
  if($split_url[0] == 'intro') {
    drupal_add_js(path_to_theme() . '/js/supersized.min.js');
    drupal_add_js(path_to_theme() . '/js/supersized.fadmashion.js');
    drupal_add_css(path_to_theme() . '/css/supersized.css');
    drupal_add_css(path_to_theme() . '/css/splash.css');  
    
    $variables['front_intro'] = false;
    if(count($split_url) == 1) {
    	$variables['front_intro'] = true;
    }
    $front_intro = 1;
  }
  drupal_add_js('var front_intro = ' . $front_intro . ';', 'inline');
  
  $static_pages = fadmashion_commerce_static_pages();
  if(in_array($split_url[0], $static_pages)) {
  	drupal_add_css(path_to_theme().'/css/static.css');  
    $variables['theme_hook_suggestions'][] = 'page__static';
  }
  
  
  $variables['menu_active'] = '';
  // Add template suggestions based on content type
  if (isset($variables['node']) ) { 
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
  if(arg(0) == 'var') {$variables['menu_active'] = 'featured';}
  
    
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

function v15_fadmashion_commerce_css_alter(&$css) {
	$url_alias = drupal_get_path_alias($_GET['q']);
  $split_url = explode('/', $url_alias);
  
  //Use splash template only for URL's that have a splash as the first item in the URL
  if($split_url[0] == 'intro')
  {
    unset($css[path_to_theme().'/css/style.css']);
  }
  $static_pages = fadmashion_commerce_static_pages();
  if(in_array($split_url[0], $static_pages)) {
  	//unset($css[path_to_theme().'/css/style.css']);
  }
  
  unset($css['misc/ui/jquery.ui.tabs.css']);
  unset($css['misc/ui/jquery.ui.core.css']);
   unset($css['misc/ui/jquery.ui.theme.css']);
  
}

function fadmashion_commerce_static_pages() {
	return array('faq', 'about', 'not-authorized', 'access-denied', 'story', 'people', 'terms-use', 'privacy', 'contact');
}

function fadmashion_commerce_intro_supersize_images() {
	$nq = nodequeue_nids_visible(INTRO_IMAGES_NODEQUEUE);
	$output = '';
  $images_array = array();
	foreach($nq as $nid) {
		$node = node_load($nid);
		$picture = field_get_items('node', $node, 'field_splash_image');
    $picture = $picture[0];
    
    
    $path = file_create_url($picture['uri']);
    //$path .= '?fm_main_product_image';
    
    //Supersize output
    $url = field_get_items('node', $node, 'field_splash_link'); 
    $url = $url[0]['url'];
    
		$image = '{';
		$image .= 'image : \'' . $path . '\'' . ', ';
		$image .= 'url : \'' . ($url) . '\'';
		//$output .= 'title: Designer: <a target="_blank"  style="font-style: normal; font-family:\'museo-sans-1\',\'museo-sans-2\',Helvetica;" href="http://www.daniellakallmeyer.com/"> Daniella Kallmeyer</a>'; 
		$image .= '}';
		$images_array[] = $image;
	}								

	$output .= implode(', ', $images_array);
	
	return $output;
}


function v15_fadmashion_commerce_preload_image_paths() {
	return array( '"' . pp() . 'bg_panel.png' . '"' , 
	           '"' . pp() . 'bg_model_2.png' . '"', 
	           '"' . pp() . 'frame_top_featured.png' . '"',
	           '"' . pp() . 'bg_model_1.png' . '"', 
	           '"' . pp() . 'frame_bg.png' . '"',
	           '"' . pp() . 'tab_inactive_over.jpg' . '"'
	  );
}

?>