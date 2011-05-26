<?php

/**
 * Export Fadmashion Store to Views.
 */

/**
 * Implements hook_views_data()
 */
function fm_commerce_store_views_data() {
	
  $data = array();

	drupal_set_message('test:'.function_exists('fm_commerce_store_views_data'));
	
  $data['fm_commerce_store']['table']['group']  = t('FM Commerce Store');

  $data['fm_commerce_store']['table']['base'] = array(
    'field' => 'store_id',
    'title' => t('FM Commerce Store'),
    'help' => t('Full Store Information'),
  );

  // Expose the store ID.
  $data['fm_commerce_store']['store_id'] = array(
    'title' => t('Store ID'),
    'help' => t('The unique internal identifier of the Store.'),
    'field' => array(
      'handler' => 'fm_commerce_store_handler_field_store',
      'click sortable' => TRUE,
    ),
    'filter' => array(
      'handler' => 'views_handler_filter_numeric',
    ),
    'sort' => array(
      'handler' => 'views_handler_sort',
    ),
    'argument' => array(
      'handler' => 'fm_commerce_store_handler_argument_store_id',
    ),
  );


  // Expose the Store Name.
  $data['fm_commerce_store']['name'] = array(
    'title' => t('Name'),
    'help' => t('The title of the Store used for administrative display.'),
    'field' => array(
      'handler' => 'views_handler_field',
      'click sortable' => TRUE,
    ),
    'filter' => array(
      'handler' => 'views_handler_filter_string',
    ),
    'sort' => array(
      'handler' => 'views_handler_sort',
    ),
    'argument' => array(
      'handler' => 'views_handler_argument_string',
    ),
  );

  // Expose the creator uid.
  $data['fm_commerce_store']['uid'] = array(
    'title' => t('Creator'),
    'help' => t('Relate a product to the user who created it.'),
    'relationship' => array(
      'handler' => 'views_handler_relationship',
      'base' => 'users',
      'field' => 'uid',
      'label' => t('Store creator'),
    ),
  );

  // Expose the product status.
  $data['fm_commerce_store']['status'] = array(
    'title' => t('Status'),
    'help' => t('Whether or not the product is active.'),
    'field' => array(
      'handler' => 'views_handler_field_boolean',
      'click sortable' => TRUE,
      'output formats' => array(
        'active-disabled' => array(t('Active'), t('Disabled')),
      ),
    ),
    'filter' => array(
      'handler' => 'views_handler_filter_boolean_operator',
      'label' => t('Active'),
      'type' => 'yes-no',
    ),
    'sort' => array(
      'handler' => 'views_handler_sort',
    ),
  );

  // Expose the created and changed timestamps.
  $data['fm_commerce_store']['created'] = array(
    'title' => t('Created date'),
    'help' => t('The date the product was created.'),
    'field' => array(
      'handler' => 'views_handler_field_date',
      'click sortable' => TRUE,
    ),
    'sort' => array(
      'handler' => 'views_handler_sort_date',
    ),
    'filter' => array(
      'handler' => 'views_handler_filter_date',
    ),
  );
  
  // Expose links to operate on the product.
  $data['fm_commerce_store']['view_store'] = array(
    'field' => array(
      'title' => t('Link'),
      'help' => t('Provide a simple link to the administrator view of the product.'),
      'handler' => 'fm_commerce_store_handler_field_store_link',
    ),
  );
  $data['fm_commerce_store']['edit_store'] = array(
    'field' => array(
      'title' => t('Edit link'),
      'help' => t('Provide a simple link to edit the Store.'),
      'handler' => 'fm_commerce_store_handler_field_store_link_edit',
    ),
  );
  $data['fm_commerce_store']['delete_store'] = array(
    'field' => array(
      'title' => t('Delete link'),
      'help' => t('Provide a simple link to delete the Store.'),
      'handler' => 'fm_commerce_store_handler_field_store_link_delete',
    ),
  );

  $data['fm_commerce_store']['operations'] = array(
    'field' => array(
      'title' => t('Operations links'),
      'help' => t('Display all the available operations links for the Store.'),
      'handler' => 'fm_commerce_store_handler_field_store_link_operations',
    ),
  );

  return $data;
}
