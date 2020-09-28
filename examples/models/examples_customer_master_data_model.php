<?php

class Examples_customer_master_data_model extends SHIN_Model {

    /**
     * Physical tablename.
     */
    var $table_name = 'examples_customer_master_data';

    function __construct()
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
            'column'    => 'name',
            'type'      => 'varchar',
            'width'     => 255,
            'null'      => 0,
            'validate' => 'sanitize_string'
        ));
        
        $this->insert_field(array(
            'column'    => 'surname',
            'type'      => 'varchar',
            'width'     => 255,
            'null'      => 0,
            'validate' => 'sanitize_string'
        ));
        
        $this->insert_field(array(
            'column'    => 'company',
            'type'      => 'varchar',
            'width'     => 255,
            'null'      => 0,
            'validate'  => 'sanitize_string'
        ));
        
        $this->insert_field(array(
            'column'    => 'address',
            'type'      => 'varchar',
            'width'     => 255,
            'null'      => 0,
            'validate' => 'sanitize_string'
        ));
        
        $this->insert_field(array(
            'column'    => 'city',
            'type'      => 'varchar',
            'width'     => 255,
            'null'      => 0,
            'validate' => 'sanitize_string'
        ));
        
        $this->insert_field(array(
            'column'    => 'birth_date',
            'type'      => 'date',
            'null'      => 0,
            'validate'  => 'validate_date'
        ));
        
        $this->insert_field(array(
            'column'    => 'telefon_number',
            'type'      => 'varchar',
            'width'     => 20,
            'null'      => 0,
            'input_mask'=> '(999)-(999-99-99)',
        ));

        $this->insert_field(array(
            'column'   => 'credit_card_number',
            'type'     => 'varchar',
            'width'    => 20,
            'null'     => 0,
			'dom_width'  => 'width:130px;',
            'input_mask'=> '9999 9999 9999 9999',
        ));
        
        $this->insert_field(array(
            'column'   => 'special_number',
            'type'     => 'varchar',
            'width'    => 255,
            'null'     => 0,
            'validate' => 'examples_customer_master_data_special_number_validate'
        ));
        
        $this->insert_field(array(
            'column'   => 'debit',
            'type'     => 'float',
            'null'     => 0,
            'validate' => 'validate_float'
        ));
        
        $this->insert_field(array(
            'column' => 'type',
            'type'   => 'enum',
            'width'  => 1,
            "values" => array(
                'a'        => "lng_label_entry_type_admin",
                'u'        => "lng_label_entry_type_user",
            ),
            "value" => 'u',
            'null'   => 0
        ));

        $this->insert_field(array(
            'column'   => 'note',
            'type'     => 'text',
            'null'     => 1,
            'input'  => array(
                'type'     => 'tinymce',
            ),
        ));

    }
    
    function examples_customer_master_data_special_number_validate($data)
    {
        $data   = (int)$data;
        
        if(empty($data)) {
            return array('result'=>FALSE, 'value'=> 'lng_label_validation_int_error');    
        }
        
        
        if($data % 2 != 0) {
            return array('result'=>FALSE, 'value'=> 'lng_label_validation_even');        
        }
        
        return array('result' => true, 'value' => '');
    }
    
    /**
    * delete record by id
    * 
    * @param in $id
    * @return boolean
    */
    function delete($id){
        return  SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->delete($this->table_name, array('id' => $id));
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
        
        foreach($array_data['data'] as &$data) {
            $data['birth_date'] = '"' . fromDbToDisplay(trim($data['birth_date'], '"')) . '"';
        }
        
        // costomization logic 

        // end of customization logic 

        return $this->packToJSONData($array_data);
    }
} // end of class

/* End of file examples_customer_master_data_model.php */