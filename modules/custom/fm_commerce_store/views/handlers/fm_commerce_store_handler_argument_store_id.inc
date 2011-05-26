<?php

/**
 * Argument handler to display product titles in View using product arguments.
 */
class fm_commerce_store_handler_argument_store_id extends views_handler_argument_numeric {
  function title_query() {
    $titles = array();
    $result = db_select('fm_commerce_store', 'cs')
      ->fields('cs', array('title'))
      ->condition('cs.store_id', $this->value)
      ->execute();
    foreach ($result as $store) {
      $titles[] = check_plain($store->title);
    }
    return $titles;
  }
}
