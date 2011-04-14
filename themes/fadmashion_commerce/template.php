<?php
function fadmashion_commerce_preprocess_node(&$variables) {
	$path = drupal_lookup_path('alias', 'node/'.$variables['node']->nid);
  $variables['theme_hook_suggestion'] = 'node__'.$path;
}


?>