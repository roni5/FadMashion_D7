<?php

/**
 * Field handler to present a link to delete a product.
 */
class fm_commerce_store_handler_field_store_link_delete extends commerce_product_handler_field_product_link {
  function construct() {
    parent::construct();

    $this->additional_fields['uid'] = 'uid';
  }

  function render($values) {
    // Ensure the user has access to delete this store.
    $store = entity_get_controller('fm_commerce_store')->create();
    $store->store_id = $this->get_value($values, 'store_id');
    $store->uid = $this->get_value($values, 'uid');

    /*if (!commerce_product_access('update', $product)) {
      return;
    }*/

    $text = !empty($this->options['text']) ? $this->options['text'] : t('edit');

    return l($text, 'admin/commerce/store/' . $store->store_id . '/delete', array('query' => drupal_get_destination()));
  }
}
