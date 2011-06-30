<?php

/**
 * Field handler to present a product edit link.
 */
class fm_commerce_store_handler_field_store_link_edit extends fm_commerce_store_handler_field_store_link {
  function construct() {
    parent::construct();

    $this->additional_fields['uid'] = 'uid';
  }

  function render($values) {
    // Ensure the user has access to edit this product.
    $store = entity_get_controller('fm_commerce_store')->create();
    $store->store_id = $this->get_value($values, 'store_id');
    $store->uid = $this->get_value($values, 'uid');

    /*if (!commerce_product_access('update', $product)) {
      return;
    }*/

    $text = !empty($this->options['text']) ? $this->options['text'] : t('edit');

    return l($text, 'admin/commerce/stores/' . $store->store_id . '/edit', array('query' => drupal_get_destination()));
  }
}
