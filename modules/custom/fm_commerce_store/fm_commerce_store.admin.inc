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
  entity_get_controller($entity_type)->delete($store);

  drupal_set_message(t('The store %name has been deleted.', array('%name' => $store->name)));
  watchdog('commerce_offer', 'Deleted store %name.', array('%name' => $store->name), WATCHDOG_NOTICE);
  $form_state['redirect'] = 'admin/commerce/stores/';
}