<?php

class Gtrwebsite_Contact_model extends SHIN_Model {

    /**
     * Physical tablename.
     */
    var $table_name = 'gtrwebsite_contact';

    function __construct()
    {
        parent::__construct($this->table_name);
        
        // PK Index definition
        $this->primary_key   = 'id';

		// Index definition
        $this->insert_index('id');
        
        // Fields definition
        $this->insert_field(array(
            "column" => "id",
            "type"   => "integer",
            "attr"   => "auto_increment",            
        ));

        $this->insert_field(array(
            'column'	=> 'stored',
            'type'		=> 'datetime',
			'value'		=> $this->db_now_datetime(),
            'null'		=> FALSE,
            'info_field_txt' => FALSE,
            'info_field_ico' => FALSE,			
        ));
		
        $this->insert_field(array(
            'column'    => 'name',
            'type'      => 'varchar',
            'width'     => 100,
            'value'     => '',
            'null'		=> TRUE,
            'info_field_txt' => FALSE,
            'info_field_ico' => FALSE,			
        ));
		
        $this->insert_field(array(
            'column'    => 'surname',
            'type'      => 'varchar',
            'width'     => 100,
            'value'     => '',
            'null'		=> TRUE,
            'info_field_ico'	=> 'images/help.png',
            'info_field_txt'	=> 'lang_label_gtrwebsite_contact_surname',
        ));

        $this->insert_field(array(
            'column'    => 'address',
            'type'      => 'varchar',
            'width'     => 250,
            'value'     => '',
            'null'		=> TRUE,
            'info_field_txt' => FALSE,
            'info_field_ico' => FALSE,			
        ));
		
        $this->insert_field(array(
            'column'    => 'city',
            'type'      => 'varchar',
            'width'     => 100,
            'value'     => '',
            'null'		=> TRUE,
            'info_field_txt' => FALSE,
            'info_field_ico' => FALSE,			
        ));
		
        $this->insert_field(array(
            'column'    => 'provincia',
            'type'      => 'varchar',
            'width'     => 10,
            'value'     => '',
            'null'		=> TRUE,
            'info_field_txt' => FALSE,
            'info_field_ico' => FALSE,			
        ));
		
        $this->insert_field(array(
            'column'    => 'postCode',
            'type'      => 'varchar',
            'width'     => 5,
            'value'     => '',
            'null'		=> TRUE,
            'info_field_txt' => FALSE,
            'info_field_ico' => FALSE,			
        ));
		
        $this->insert_field(array(
            'column'    => 'tel',
            'type'      => 'varchar',
            'width'     => 50,
            'value'     => '',
            'null'		=> TRUE,
            'info_field_txt' => FALSE,
            'info_field_ico' => FALSE,			
        ));
		
        $this->insert_field(array(
            'column'    => 'email',
            'type'      => 'varchar',
            'width'     => 100,
            'value'     => '',
            'null'		=> TRUE,
            'info_field_txt' => FALSE,
            'info_field_ico' => FALSE,			
        ));

        $this->insert_field(array(
            'column'    => 'info',
            'type'      => 'tinytext',
            'value'     => '',
            'input'     => array(
				'type'		=> 'tinymce',
			),
            'null'      => TRUE,
            'info_field_txt' => FALSE,
            'info_field_ico' => FALSE,			
        ));
		
        $this->insert_field(array(
            "column" => "action",
            "type"   => "enum",
            "values" => array(
                'call'		=> "lng_label_contact_call",
                'visit'		=> "lng_label_contact_visit",
                'showroom'	=> "lng_label_contact_showroom",
            ),
            "value"  => 'call',
            'info_field_txt' => FALSE,
            'info_field_ico' => FALSE,			
        ));
		
        $this->insert_field(array(
            'column'    => 'keepUpdated',
            'type'      => 'bool',
            'value'     => 1,
            "values" => array(
                1		=> "lng_label_contact_yes_keepUpdated",
                0		=> "lng_label_contact_no_keepUpdated",
            ),
            'null'		=> TRUE,
            'info_field_txt' => FALSE,
            'info_field_ico' => FALSE,			
        ));
		
        $this->insert_field(array(
            'column'    => 'barrier',
            'type'      => 'bool',
            'value'     => 1,
            "values" => array(
                1		=> "lng_label_contact_yes_barrier",
                0		=> "lng_label_contact_no_barrier",
            ),
            'null'		=> TRUE,
            'info_field_txt' => FALSE,
            'info_field_ico' => FALSE,			
        ));
		
        $this->insert_field(array(
            'column'    => 'bathroom',
            'type'      => 'bool',
            'value'     => 1,
            "values" => array(
                1		=> "lng_label_contact_yes_bathroom",
                0		=> "lng_label_contact_no_bathroom",
            ),
            'null'		=> TRUE,
            'info_field_txt' => FALSE,
            'info_field_ico' => FALSE,			
        ));
		
        $this->insert_field(array(
            'column'    => 'kitchen',
            'type'      => 'bool',
            'value'     => 1,
            "values" => array(
                1		=> "lng_label_contact_yes_kitchen",
                0		=> "lng_label_contact_no_kitchen",
            ),
            'null'		=> TRUE,
            'info_field_txt' => FALSE,
            'info_field_ico' => FALSE,			
        ));
		
        $this->insert_field(array(
            'column'    => 'comfort',
            'type'      => 'bool',
            'value'     => 1,
            "values" => array(
                1		=> "lng_label_contact_yes_comfort",
                0		=> "lng_label_contact_no_comfort",
            ),
            'null'		=> TRUE,
            'info_field_txt' => FALSE,
            'info_field_ico' => FALSE,			
        ));

        $this->insert_field(array(
            'column'    => 'sense',
            'type'      => 'bool',
            'value'     => 1,
            "values" => array(
                1		=> "lng_label_contact_yes_sense",
                0		=> "lng_label_contact_no_sense",
            ),
            'null'        => TRUE,
            'info_field_txt' => FALSE,
            'info_field_ico' => FALSE,			
        ));		
	}
    
    /**
    * Call Validation
    *
    * @access public
    * @param $fields needed fields for validation. By default - all with properties [validate].
    * @return $h hash.
    * @sa SHIN_Model::validate_form()
     */
    function validate_form($fields_to_validate = null)
    {
        $h = parent::validate_form($fields_to_validate);

        return $h;
    }

    /**
    * Prepare html for edit/add current object information.
    *
    * @access public
    * @param $fields needed fields for write to template. By default - ALL.
    * @return $h hash.
    * @sa SHIN_Model::write_form()
     */
    function write_form($fields_to_write = null, $mode=WRITE_NORMAL)
    {
        $h = parent::write_form($fields_to_write, $mode);
		
		// stored value /////////////////////////////
		$__val = date('Y-m-d H:i');
//		$h['gtrwebsite_contact_stored_input'] = date('Y-m-d H:i');
		
					$tmp_data = array(
										'name'        => 'gtrwebsite_contact_stored_input',
										'id'          => 'gtrwebsite_contact_stored_input',
										'value'       => $__val,
									);
			
//		$h['gtrwebsite_contact_stored_input'] = form_input($tmp_data);
		
        return $h;
    }

    /**
    * Read given fields from CGI query.
    *
    * @access public
    * @param $fields needed fields for reading from form. 
    * @return NULL
    * @sa SHIN_Model::read_form()
     */
    function read_form($fields_to_read = null)
    {
        $h = parent::read_form($fields_to_read);

        return $h;
    }
    
    /**
    * Save given fields from CGI query.
    *
    * @access public
    * @param $fields needed fields for saving from form. 
    * @return NULL
    * @sa SHIN_Model::save()
     */
    function save($fields_to_save = null) {
        
        $h = parent::save($fields_to_save);
        
        return $h;    
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
            $data['keepUpdated']    =   $data['keepUpdated'] ?  '"' . SHIN_Core::$_language->line('lng_label_contact_yes_keepUpdated') . '"' : '"' . SHIN_Core::$_language->line('lng_label_contact_no_keepUpdated') . '"'; 
            $data['barrier']        =   $data['barrier']     ?  '"' . SHIN_Core::$_language->line('lng_label_contact_yes_barrier') . '"'     : '"' . SHIN_Core::$_language->line('lng_label_contact_no_barrier') . '"'; 
            $data['bathroom']       =   $data['bathroom']    ?  '"' . SHIN_Core::$_language->line('lng_label_contact_yes_bathroom') . '"'    : '"' . SHIN_Core::$_language->line('lng_label_contact_no_bathroom') . '"'; 
            $data['kitchen']        =   $data['kitchen']     ?  '"' . SHIN_Core::$_language->line('lng_label_contact_yes_kitchen') . '"'     : '"' . SHIN_Core::$_language->line('lng_label_contact_no_kitchen') . '"'; 
            $data['comfort']        =   $data['comfort']     ?  '"' . SHIN_Core::$_language->line('lng_label_contact_yes_comfort') . '"'     : '"' . SHIN_Core::$_language->line('lng_label_contact_no_comfort') . '"'; 
            $data['sense']          =   $data['sense']       ?  '"' . SHIN_Core::$_language->line('lng_label_contact_yes_sense') . '"'       : '"' . SHIN_Core::$_language->line('lng_label_contact_yes_sense') . '"'; 
        }                                                                    
        
        // costomization logic 

        // end of customization logic 

        return $this->packToJSONData($array_data);
    }
    
    

} // end of class

/* End of file Gtrwebsite_Contact_model.php */
