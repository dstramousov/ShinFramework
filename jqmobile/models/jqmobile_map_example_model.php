<?php

class Jqmobile_Map_Example_model extends SHIN_Model {

    /**
     * Physical tablename.
     */
    var $table_name = 'jqmobile_map_example';

    function __construct()
    {
        parent::__construct($this->table_name);
        
        // PK Index definition
        $this->primary_key   = 'id';
        
        // Fields definition
        $this->insert_field(array(
            "column"    => "id",
            "type"      => "integer",
            "null"      => 0,
            "attr"      => "auto_increment",
        ));

        $this->insert_field(array(
            "column"            => "customer",
            'type'              => 'varchar',
            'width'             => CT_VARCHAR_200,
            'title'             => '',
            'null'              => 1,
        ));
        
        $this->insert_field(array(
            'column'    => 'lat',
            'type'      => 'double',
            'width'     => 10,
            'prec'      => 2,
            'value'     => 0,
            'null'      => 1,
        ));
        
        $this->insert_field(array(
            'column'    => 'lng',
            'type'      => 'double',
            'width'     => 10,
            'prec'      => 2,
            'value'     => 0,
            'null'      => 1,
        ));
        
        
    }
    
    /**
    * fetch all data
    * 
    * @access public
    * @return array
    * @param null
    * 
    */
    public function fetchAll(){
        $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get($this->table_name);
        return $query->result_array();
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
        // right now connector work with config file well.
        $array_data = parent::fetchCorrectPagingData($customization_fields, $where_condition, DB_FETCH_ANSWER_TYPE_ARRAY);
        
        foreach($array_data['data'] as &$data) {
            $data['customer']    =   '"<a href=javascript:void(0); onclick=openDialog(' . trim($data['lat'], '"') . ',' . trim($data['lat'], '"') . ',' . str_replace('"', '\'', $data['customer']) . ')>' . trim($data['customer'], '"') . '</a>"';    
        }
        
        // costomization logic 

        // end of customization logic 

        return $this->packToJSONData($array_data);
    }
    
} // end of class

/* End of file Jqmobile_Map_Example_model.php */
