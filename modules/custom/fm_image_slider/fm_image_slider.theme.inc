<?php
/**
 * Returns HTML for an Colorbox image field formatter.
 *
 * @param $variables
 *   An associative array containing:
 *   - item: An array of image data.
 *   - image_style: An optional image style.
 *   - path: An array containing the link 'path' and link 'options'.
 *
 * @ingroup themeable
 */
function theme_fm_image_slider_formatter($variables) {
	
	drupal_add_js(drupal_get_path('module', 'fm_image_slider').'/fm_image_slider.js');
	drupal_add_js(drupal_get_path('theme', 'fadmashion_commerce').'/js/jquery.nivo.slider.pack.js');
	drupal_add_css(drupal_get_path('theme', 'fadmashion_commerce').'/css/nivo-slider.css');
	
  $pictures = $variables['pictures'];
  $image_style = $variables['image_style'];
  
  $output = '<div id="slider" class="nivoSlider">';
  foreach($pictures as $picture) {
    $image = array(
      'path' => $picture['uri'],
      'alt' => $picture['alt'],
      'title' => $picture['title'],
      'style_name' => $image_style
    );
    
    // If the title is empty use alt or the node title in that order.
    if (empty($image['title'])) {
      if (!empty($image['alt'])) {
        $image['title'] = $image['alt'];
      }
      elseif (!empty($node->title)) {
        $image['title'] = $node->title;
      }
    }
    
    $output .= theme('image_style', $image); 
  }
  $output .= '</div>';
  
  return $output;
}