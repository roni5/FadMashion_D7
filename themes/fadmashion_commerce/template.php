<?php

function fadmashion_commerce_preprocess_page(&$vars, $hook) {
	
  if (isset($vars['node'])) {
    // If the node type is "blog" the template suggestion will be "page--blog.tpl.php".
   $vars['theme_hook_suggestions'][] = 'page__'. str_replace('_', '--', $vars['node']->type);
  }
  
}


?>