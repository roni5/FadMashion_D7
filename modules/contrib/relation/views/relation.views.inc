<?php

/**
 * Implements hook_views_data_alter().
 */
function relation_views_data_alter(&$data) {
  // Find out which entity type has which base table.
  $entity_infos = module_invoke_all('entity_info');
  $entity_tables = array();
  foreach ($entity_infos as $entity_type => $entity_info) {
    if (isset($entity_info['base table'])) {
      $entity_tables[$entity_type] = $entity_info['base table'];
    }
  }

  // Build the relations between the different tables.
  $types = relation_get_types();
  foreach ($types as $predicate => $relation_type) {
    if ($relation_type->max_arity != 2) {
      continue;
    }
    $target_index = $relation_type->directional ? 'target_bundles' : 'source_bundles';
    foreach ($relation_type->source_bundles as $source_bundle) {
      $source_bundle = explode(':', $source_bundle, 2);
      $entity_type_left = $source_bundle[0];
      foreach ($relation_type->$target_index as $target_bundle) {
        $target_bundle = explode(':', $target_bundle, 2);
        $entity_type_right = $target_bundle[0];
        $base_table_left = $entity_tables[$entity_type_left];
        $base_table_right = $entity_tables[$entity_type_right];

        $t_arguments = array(
          '@left' => $entity_type_left,
          '@right' => $entity_type_right,
          '@predicate_label' => $relation_type->label,
        );
        $data[$base_table_left]['relation_' . $predicate . '_' . $entity_type_right] = array(
          'title' => t('Relation: @predicate_label (@left <-> @right)', $t_arguments),
          'help' => t('Provides a relationship from @left to @right via the relation @predicate_label', $t_arguments),
          'relationship' => array(
            'label' => check_plain($relation_type->label),
            'base' => $base_table_right,
            'base field' => $entity_infos[$entity_type_right]['entity keys']['id'],
            'relationship field' => $entity_infos[$entity_type_left]['entity keys']['id'],
            'handler' => 'relation_handler_relationship',
            'predicate' => $predicate,
            'entity_type_left' => $entity_type_left,
            'entity_type_right' => $entity_type_right,
            'directional' => $relation_type->directional,
            'join_handler' => 'relation_handler_join',
          ),
        );
      }
    }
  }
}
