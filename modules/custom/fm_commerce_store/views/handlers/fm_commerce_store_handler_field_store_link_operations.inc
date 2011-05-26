<?php

/**
 * Field handler to present a product's operations links.
 */
class fm_commerce_store_handler_field_store_link_operations extends views_handler_field {
  function construct() {
    parent::construct();

    $this->additional_fields['store_id'] = 'store_id';
  }

  function query() {
    $this->ensure_my_table();
    $this->add_additional_fields();
  }

  function render($values) {
    $product_id = $this->get_value($values, 'store_id');

    $links = menu_contextual_links('fm-commerce-store', 'admin/commerce/store', array(store_id));

    if (!empty($links)) {
      //drupal_add_css(drupal_get_path('module', 'commerce_product') . '/theme/commerce_product_views.css');

      return theme('links', array('links' => $links, 'attributes' => array('class' => array('links', 'inline', 'operations'))));
    }
  }
}
