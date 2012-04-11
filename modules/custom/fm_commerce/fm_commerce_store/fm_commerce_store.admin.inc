<?php

/**
 * @file
 * Provides forms for creating, updating, and deleting stores.
 */

/**
 * Form callback wrapper: create a store.
 *
 * @see commerce_offer_store_form()
 */
function fm_commerce_store_add_page() {
  drupal_set_title(t('Create a store'));
  
  // Initialize a store.
  $store = entity_get_controller('fm_commerce_store')->create();

  return drupal_get_form('fm_commerce_store_form', $store);
}

/**
 * Form callback wrapper: edit a store.
 *
 * @param $store The store entity.
 *
 * @see commerce_offer_store_form()
 */
function fm_commerce_store_edit_page($store) {
  return drupal_get_form('fm_commerce_store_form', $store);
}

/**
 * Form callback: create or edit a store.
 *
 * @param $form
 * @param $form_state
 * @param $store The store entity, if an edit action is happening.
 */
function fm_commerce_store_form($form, &$form_state, $store) {
  $form_state['store'] = $store;

  $form['name'] = array(
    '#type' => 'textfield',
    '#title' => t('Name'),
    '#default_value' => $store->name,
    '#required' => TRUE,
  );

  // Give other modules a chance to add some fields to the form.
  field_attach_form('fm_commerce_store', $store, $form, $form_state);

  $form['actions'] = array(
    '#type' => 'container',
    '#weight' => 1000,
    '#attributes' => array('class' => array('form-actions')),
  );
  $form['actions']['submit'] = array(
    '#type' => 'submit',
    '#value' => t('Save store'),
    '#suffix' => l('Cancel', 'admin/commerce/stores/'),
  );

  return $form;
}

/**
 * Form submit handler: save the store.
 */
function fm_commerce_store_form_submit($form, &$form_state) {
  $store = $form_state['store'];

  $store->name = $form_state['values']['name'];
  // Notify field widgets.
  field_attach_submit('fm_commerce_store', $store, $form, $form_state);

  fm_commerce_store_save($store);
  drupal_set_message(t('Your store has been saved.'));
  $form_state['redirect'] = 'admin/commerce/stores/';
}

/**
 * Form callback wrapper: delete a store.
 *
 * @param $store The store entity.
 *
 * @see commerce_offer_store_delete_form()
 */
function fm_commerce_store_form_delete_page($store) {
  return drupal_get_form('commerce_offer_store_delete_form', $store);
}


/*
 * Form callback to rearrange forms
 */

function fm_commerce_store_rearrange_form($form) {
  // Overview of all formats.
  $query = new EntityFieldQuery();
	$query->entityCondition('entity_type', 'fm_commerce_store');
	$query->propertyOrderBy('weight', 'asc');
	$query->propertyCondition('status', 1);
	$query->fieldCondition('field_featured', 'value', 1);
	$result = $query->execute();
	
  $form['#tree'] = TRUE;
  
  $region = 'featured';
  
  foreach ($result['fm_commerce_store'] as $store_id => $store) {
    $shop = fm_commerce_store_load($store_id);
    $form['stores'][$region][$store_id]['name'] = array('#markup' => drupal_placeholder($shop->name));
    $form['stores'][$region][$store_id]['weight'] = array(
      '#type' => 'weight',
      '#title' => t('Weight for @title', array('@title' => $shop->name)),
      '#title_display' => 'invisible',
      '#default_value' => $shop->weight,
    );
    $form['stores'][$region][$store_id]['featured'] = array(
      '#type' =>'checkbox', 
      '#title' => t('Featured'),
      '#attributes' => array('checked' => 'checked')
     );
    $form['stores'][$region][$store_id]['disabled'] = array(
        '#type' =>'checkbox', 
        '#title' => t('Disabled'),
      );
  }
  
  $query = new EntityFieldQuery();
	$query->entityCondition('entity_type', 'fm_commerce_store');
	$query->propertyOrderBy('weight', 'asc');
	$query->propertyCondition('status', 1);
	$result = $query->execute();
	
  $region = 'all';
  foreach ($result['fm_commerce_store'] as $store_id => $store) {
    $shop = fm_commerce_store_load($store_id);
    if(!isset($form['stores']['featured'][$store_id])) {
      $form['stores'][$region][$store_id]['name'] = array('#markup' => drupal_placeholder($shop->name));
      $form['stores'][$region][$store_id]['weight'] = array(
        '#type' => 'weight',
        '#title' => t('Weight for @title', array('@title' => $shop->name)),
        '#title_display' => 'invisible',
        '#default_value' => $shop->weight,
      );
      $form['stores'][$region][$store_id]['featured'] = array(
        '#type' =>'checkbox', 
        '#title' => t('Featured'),
     );
      $form['stores'][$region][$store_id]['disabled'] = array(
        '#type' =>'checkbox', 
        '#title' => t('Disabled'),
      );
    }
  }
  
  $query = new EntityFieldQuery();
	$query->entityCondition('entity_type', 'fm_commerce_store');
	$query->propertyOrderBy('weight', 'asc');
	$query->propertyCondition('status', 0);
	$result = $query->execute();
  
  $region = 'disabled';
  foreach ($result['fm_commerce_store'] as $store_id => $store) {
    $shop = fm_commerce_store_load($store_id);
    if(!isset($form['stores']['featured'][$store_id])) {
      $form['stores'][$region][$store_id]['name'] = array('#markup' => drupal_placeholder($shop->name));
      $form['stores'][$region][$store_id]['weight'] = array(
        '#type' => 'weight',
        '#title' => t('Weight for @title', array('@title' => $shop->name)),
        '#title_display' => 'invisible',
        '#default_value' => $shop->weight,
      );
      $form['stores'][$region][$store_id]['featured'] = array(
        '#type' =>'checkbox', 
        '#title' => t('Featured'),
      );
      $form['stores'][$region][$store_id]['disabled'] = array(
        '#type' =>'checkbox', 
        '#title' => t('Disabled'),
        '#attributes' => array('checked' => 'checked')
      );
    }
  }

	
  $form['actions'] = array('#type' => 'actions');
  $form['actions']['submit'] = array('#type' => 'submit', '#value' => t('Save changes'));
  return $form;
}

function fm_commerce_store_rearrange_form_submit($form, &$form_state) {

	foreach($form_state['values']['stores'] as $region => $rows){
    foreach ($rows as $store_id => $data) {
      if (is_array($data) && isset($data['weight'])) {
      //   Only update if this is a form element with weight.
      $fields = array('weight' => $data['weight']);
      if(isset($data['disabled'])) {
      	 $fields['status'] =  0;
      }
        db_update('fm_commerce_store')
          ->fields($fields)
          ->condition('store_id', $store_id)
          ->execute();
      }
      
      if(isset($data['featured'])) {
      	$store = fm_commerce_store_load($store_id);
      	$store_wrapper = entity_metadata_wrapper('fm_commerce_store', $store);
      	$store_wrapper->field_featured = $data['featured'];
      	fm_commerce_store_save($store);
      }
    }
  }
  drupal_set_message(t('The shops ordering has been saved.'));
}

/**
 * Returns HTML for the text format administration overview form.
 *
 * @param $variables
 *   An associative array containing:
 *   - form: A render element representing the form.
 *
 * @ingroup themeable
 */
function theme_fm_commerce_store_rearrange_form($variables) {
  $form = $variables['form'];

  $rows = array();
  foreach (element_children($form['stores']) as $id => $region) {
  	
  	$rows[] = array(
      'data' => array(
        $region,
        '', '', ''
      ),
    );
    foreach(element_children($form['stores'][$region]) as $id2 => $store_id) {
    	
      $form['stores'][$region][$store_id]['weight']['#attributes']['class'] = array('stores-order-weight', 'stores-order-' . $region);
      
      $rows[] = array(
        'data' => array(
          drupal_render($form['stores'][$region][$store_id]['name']),
          drupal_render($form['stores'][$region][$store_id]['weight']),
          drupal_render($form['stores'][$region][$store_id]['featured']),
          drupal_render($form['stores'][$region][$store_id]['disabled'])
        ),
        'class' => array('draggable'),
      );
    }
  }
  $header = array(t('Name'), t('Weight'), '', '');
  $output = theme('table', array('header' => $header, 'rows' => $rows, 'attributes' => array('id' => 'stores-order')));
  $output .= drupal_render_children($form);

  drupal_add_tabledrag('stores-order', 'order', 'sibling', 'stores-order-weight', 'stores-order-featured');
  drupal_add_tabledrag('stores-order', 'order', 'sibling', 'stores-order-weight', 'stores-order-all');
 
 
  return $output;
}






/**
 * Confirmation form for deleting a store.
 */
function commerce_offer_store_delete_form($form, &$form_state, $store) {
  $form_state['store'] = $store;

  $form = confirm_form($form,
    t('Are you sure you want to delete the %name store?', array('%name' => $store->name)),
    'admin/commerce/stores/',
    '<p>' . t('This action cannot be undone.') . '</p>',
    t('Delete'),
    t('Cancel'),
    'confirm'
  );

  return $form;
}

/**
 * Form submit handler: delete the store.
 */
function commerce_offer_store_delete_form_submit($form, &$form_state) {
  $store = $form_state['store'];
  entity_get_controller('fm_commerce_store')->delete($store->store_id);

  drupal_set_message(t('The store %name has been deleted.', array('%name' => $store->name)));
  watchdog('commerce_offer', 'Deleted store %name.', array('%name' => $store->name), WATCHDOG_NOTICE);
  $form_state['redirect'] = 'admin/commerce/stores/';
}