<?php
function fadmashion_commerce_preprocess_node(&$variables) {
	$path = drupal_lookup_path('alias', 'node/'.$variables['node']->nid);
  $variables['theme_hook_suggestion'] = 'node__'.$path;
}

function fadmashion_commerce_preprocess_page(&$variables) {
	
  $url_alias = drupal_get_path_alias($_GET['q']);
  $split_url = explode('/', $url_alias);
  
  //Use splash template only for URL's that have a splash as the first item in the URL
  if($split_url[0] == 'splash')
  {
    drupal_add_js(path_to_theme().'/js/supersized.3.1.3.core.min.js');
    drupal_add_js(path_to_theme().'/js/FM_form.js');
    drupal_add_css(path_to_theme().'/css/supersized.core.css');
    drupal_add_css(path_to_theme().'/css/front.css');
    $variables['theme_hook_suggestion'] = 'page__splash';
  }
}


?>