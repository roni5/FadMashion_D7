<?php
/**
 * Field handler to present a link to delete a product.
 */
class fm_commerce_store_handler_field_owner_link extends fm_commerce_store_handler_field_store_link {
  function construct() {
    parent::construct();
  }

  function render($values) {
    $store_id = $this->get_value($values, 'store_id');
    $store = fm_commerce_store_load($store_id);
    $loaded_user = fm_commerce_store_owners_get_user($store);

    if(!isset( $loaded_user)) {
    	return '<span style="color: red;">No Shop Owner has been Added.  Please add.</span>';
    }
    $text = $loaded_user->name . ' (' . $loaded_user->mail . ')';

    return l($text, 'user/' . $loaded_user->uid . '/edit', array('query' => drupal_get_destination()));
  }
}