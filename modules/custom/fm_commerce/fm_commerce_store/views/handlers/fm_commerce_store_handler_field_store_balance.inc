<?php
/**
 * Field handler to present a link to delete a product.
 */
class fm_commerce_store_handler_field_store_balance extends fm_commerce_store_handler_field_store_link {
  function construct() {
    parent::construct();
  }

  function render($values) {
    $store_id = $this->get_value($values, 'store_id');
    $store = fm_commerce_store_load($store_id);
    $balance = fm_commerce_store_balance_value($store);

    return  commerce_currency_format($balance, 'USD');
  }
}