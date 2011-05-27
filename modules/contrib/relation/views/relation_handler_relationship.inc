<?php


class relation_handler_relationship extends views_handler_relationship {
}

class relation_handler_join extends views_join {
  /**
   * Build the SQL for the join this object represents.
   */
  function build_join($select_query, $table, $view_query) {
    $field = field_info_field('endpoints');
    $relation_data_table_name = _field_sql_storage_tablename($field);
    $entity_id_field_name = _field_sql_storage_columnname('endpoints', 'entity_id');
    $entity_type_field_name = _field_sql_storage_columnname('endpoints', 'entity_type');
    $r_index_field_name = _field_sql_storage_columnname('endpoints', 'r_index');
    $directional = $this->definition['directional'];
    // Join the left table with the entity type to the relation_data table.
    $left = $view_query->get_table_info($this->left_table);
    $entity_type_left = $this->definition['entity_type_left'];
    $conditions = "$left[alias].$this->left_field = %alias.$entity_id_field_name AND %alias.$entity_type_field_name = '$entity_type_left'";
    if ($directional) {
      $conditions .= " AND %alias.$r_index_field_name = 0";
    }
    // Left join alias.
    $l = $select_query->innerJoin($relation_data_table_name, NULL, $conditions);

    // Execute a self-join.
    $entity_type_right = $this->definition['entity_type_right'];
    // entity_id here is the ID of the relation entity. delta or
    // $r_index_field_name does not matter.
    $conditions = "%alias.entity_id = $l.entity_id AND %alias.delta != $l.delta AND %alias.$entity_type_field_name = '$entity_type_right'";
    // Right join alias.
    $r = $select_query->innerJoin($relation_data_table_name, NULL, $conditions);

    // Join the right table to the relation_data table.
    $conditions = "%alias.$this->field = $r.$entity_id_field_name";
    $select_query->innerJoin($table['table'], $table['alias'], $conditions);
  }
}
