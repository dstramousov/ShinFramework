<?php

class Jqmobile_Example_model extends SHIN_Model {

    /**
     * Physical tablename.
     */
    var $table_name = 'jqmobile_example';

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
            'validate'          => 'sanitize_string'
        ));
        
         $this->insert_field(array(
            'column'    => 'bill',
            'type'      => 'double',
            'width'     => 10,
            'prec'      => 2,
            'value'     => 0,
            'null'      => 1,
            'validate'  => 'validate_float'
        ));
        
        $this->insert_field(array(
            'column'    => 'note',
            'type'      => 'tinytext',
            'value'     => '',
            'null'      => 0,
            'validate'  => 'sanitize_string'
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
    * add new customer
    * 
    * @param array $data
    * @access public
    * @return null
    */
    public function addCustomer($data){
        return SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert($this->table_name, $data);     
    }
} // end of class

/* End of file Jqmobile_Example_model.php */
