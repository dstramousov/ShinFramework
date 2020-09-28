<?php

/**
 * system\application\models\filetracking_model.php
 *
 * Model Tag. (tagcloud)
 *
 */

class Examples_file_tracking_data_model extends SHIN_Model {

    /**
     * Physical tablename.
     */
    var $table_name = 'examples_file_tracking_data';

    function __construct($id=NULL)
    {
        parent::__construct($this->table_name);
		
		// PK Index definition
        $this->primary_key   = 'id';
		
		// Fields definition
		$this->insert_field(array(
			"column" => "id",
			"type"   => "integer",
			"attr"   => "auto_increment",			
		));
		
        $this->insert_field(array(
            'column' => 'file_id',
            'type'   => 'integer',
			'value'  => 0,
        ));
		
        $this->insert_field(array(
            'column' => 'description',
            'type'   => 'varchar',
			'value'  => 0,
        ));
		
    }

    /**
     * Prepare SQL statement and fetch data for Datatables widget.
     *
     * @access public
     * @param:  NULL
     * @return: $ret array with prepared data
     */
    function fetchCorrectPagingData($customization_fields = NULL, $where_condition = NULL,  $return_answer_type = DB_FETCH_ANSWER_TYPE_JSON)
    {
        $array_data = parent::fetchCorrectPagingData($customization_fields, $where_condition, DB_FETCH_ANSWER_TYPE_ARRAY);
        
//        foreach($array_data['data'] as &$data) {
//            $data['count'] = '"<a href=javascript:void(0); onclick=loadItems(' . trim($data['id'], '"') . ')>' . trim($data['count'], '"') . '</a>"';
//        }
        
        return $this->packToJSONData($array_data);
    }


} // end of class

/* End of file FileTracking_model.php */
/* Location: ./system/application/models/filetracking_model.php */