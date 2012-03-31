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
function theme_fm_image_slider_nivo_formatter($variables) {
	
	drupal_add_js(drupal_get_path('module', 'fm_image_slider').'/fm_image_slider_nivo.js');
	drupal_add_js(drupal_get_path('theme', 'fadmashion_commerce').'/js/jquery.nivo.slider.pack.js');
	drupal_add_css(drupal_get_path('theme', 'fadmashion_commerce').'/css/nivo-slider.css');
	
  $pictures = $variables['pictures'];
  $image_style = $variables['image_style'];
  $thumb_style = $variables['thumb_style'];
  
  //show thumbs or not
  drupal_add_js('var showThumbs = ' . (count($pictures) > 1 ? true : 0) . ';', 'inline');
  
  
  $output = '<div id="slider" class="nivoSlider">';
  foreach($pictures as $picture) {

  	$picture = node_load($picture['nid']);
  	$picture = field_get_items('node', $picture, 'field_product_image');
    $picture = $picture[0];
    
    $image = array(
      'path' => $picture['uri'],
      'alt' => $picture['alt'],
      'title' => $picture['title'],
      'style_name' => $image_style
    );
    
    if ($thumb_style) {
      $image['attributes']['rel'] = image_style_url($thumb_style, $image['path']);
    }
    else {
      $image['attributes']['rel'] = file_create_url($image['path']);
    }
   
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
function theme_fm_image_slider_slides_formatter($variables) {

	
	drupal_add_library('system', 'ui.slider');
	
  $pictures = $variables['pictures'];
  $product = $variables['product'];
  $image_style = $variables['image_style'];
  $thumb_style = $variables['thumb_style'];
  $zoom_style = $variables['zoom_style'];
  
  //show thumbs or not
  $show_thumbs = (count($pictures) > 1 ? true : 0);
  
  //Zoom Colorbox Url
  $url = '/?height=80%&width=840&inline=true#zoomed';
  drupal_add_js('var zoomUrl = "' . $url . '";', 'inline');
  
  
  $i = 0;
  $images = $zooms = $thumbs = ''; 
  foreach($pictures as $picture) {

  	$picture = node_load($picture['nid']);
  	$picture = field_get_items('node', $picture, 'field_product_image');
    $picture = $picture[0];
    
    $image = array(
      'path' => $picture['uri'],
      'alt' =>$i,
      'title' => $picture['title'],
      'style_name' => $image_style
    );
    
    $images .= '<a class="colorbox-inline" href="' . $url . '"><div class="zoom01" class="zoom">';
    $images .= theme('image_style', $image);
    $images .= '</div></a>';
    
    $image = array(
      'path' => $picture['uri'],
      'alt' => $i,
      'title' => $picture['title'],
      'style_name' => $zoom_style
    );
    
    $zooms .= '<div class="zoom02">';
    $zooms .= theme('image_style', $image);
    $zooms .= '</div>';
    
    $image = array(
      'path' => $picture['uri'],
      'alt' => $i,
      'title' => $picture['title'],
      'style_name' => $thumb_style
    );
    
    $thumbs .= '<li><a href="#">' . theme('image_style', $image) . '</a></li>';
    
	  $i++;
  }
  
  $output = '<div id="product" style="position: relative;">';
  $output .= '<div class="slides_container">';
  $output .= $images;
  $output .= '</div>';
  if($show_thumbs) {
    $output .= '<ul class="pagination">';
    $output .= $thumbs;
    $output .= '</ul>';
  }
  $output .= '</div>';
  
  
  $store = fm_commerce_get_store($product);
  $logo = field_view_field('fm_commerce_store', $store, 'field_logo', 'node_full');
	
  $output .= '<div style="display:none">';
  $output .= '<div id="zoomed">';
   
  //$output .= '<div id="zoom_photo_tooltip">hover to view more of the image</div>';
  
  $output .= '<div class="slides_container">';
  $output .= $zooms;
  $output .= '</div>';
  if($show_thumbs) {
    $output .= '<ul class="pagination">';
    $output .= $thumbs;
    $output .= '</ul>';
  }
  $output .= '<div class="logo">';
  $output .= render($logo);
  $output .= '</div>';
  
  $output .= '</div>';
  $output .= '</div>';
  
  
  return $output;
}