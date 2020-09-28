<?php

class Examples_crmmasterdata_model extends SHIN_Model {

    /**
     * Physical tablename.
     */
    var $table_name = 'examples_crmmasterdata';

    function __construct()
    {
        parent::__construct($this->table_name);
        
        // PK Index definition
        $this->primary_key   = 'idCustomer';
        
        // Fields definition
        $this->insert_field(array(
            "column" => "idCustomer",
            "type"   => "integer",
            "attr"   => "auto_increment"
        ));
        
        $this->insert_field(array(
            'column'    => 'company',
            'type'      => 'varchar',
            'width'     => 80,
            'null'      => 1,
            'validate' => 'sanitize_string',
            'info_field_ico' => 'images/star.png',
            'info_field_txt' => 'lang_label_sys_user_lang_mandatory',
        ));
        
        $this->insert_field(array(
            'column'    => 'vat',
            'type'      => 'varchar',
            'width'     => 16,
            'null'      => 1,
			'unique'	=> 1,
            'validate' => 'sanitize_string',
            'info_field_txt' => 'This is a test :))))))))))))))',
            'info_field_ico' => 'images/star.png',
        ));
		
        $this->insert_field(array(
            'column'    => 'nin',
            'type'      => 'varchar',
            'width'     => 20,
            'null'      => 1,
			'unique'	=> 1,
            'validate' => 'sanitize_string',
            'info_field_txt' => 'lang_label_sys_user_lastname_mandatory',
            'info_field_ico' => 'images/exclamation.png',
        ));
		
        $this->insert_field(array(
            'column'    => 'contactName',
            'type'      => 'varchar',
            'width'     => 50,
            'null'      => 1,
            'validate' => 'sanitize_string',
            'info_field_txt' => 'lang_label_sys_user_theme_mandatory',
            'info_field_ico' => 'images/help.png',
        ));
		
        $this->insert_field(array(
            'column'    => 'contactSurname',
            'type'      => 'varchar',
            'width'     => 50,
            'null'      => 1,
            'validate' => 'sanitize_string',
            'info_field_txt' => 'lang_label_sys_user_theme_mandatory',
            'info_field_ico' => 'images/help.png',
        ));
		
        $this->insert_field(array(
            'column'    => 'address',
            'type'      => 'varchar',
            'width'     => 80,
            'null'      => 1,
            'validate' => 'sanitize_string',
            'info_field_txt' => 'lang_label_sys_user_theme_mandatory',
            'info_field_ico' => 'images/help.png',
        ));
		
        $this->insert_field(array(
            'column'    => 'postalCode',
            'type'      => 'varchar',
            'width'     => 10,
            'null'      => 1,
            'validate' => 'sanitize_string',
            'info_field_txt' => 'lang_label_sys_user_theme_mandatory',
            'info_field_ico' => 'images/help.png',
        ));
		
        $this->insert_field(array(
            'column' => 'province',
            'type'   => 'char',
            'width'     => 2,
            
            'join'   => array(
                'mode'   => 'left',
                'table'  => 'examples_geoprovince',
                'column' => 'idProvince',
            ),

            'input'  => array(
                'type'     => 'select',
                'from'     => 'examples_geoprovince',
                'data'     => 'idProvince',
                'caption'  => 'lng_label_province',
                'nonset_id'     => '',
                'nonset_name'   => '---',
            ),
            'null'     => 1,
            'info_field_txt' => 'lang_label_sys_user_theme_mandatory',
            'info_field_ico' => 'images/help.png',
        ));
        
        $this->insert_field(array(
            'table'  => 'examples_geoprovince',
            'column' => 'province',
            'type'   => 'varchar',
            'width'  => 15,
            'title'  => 'lng_label_country',
            'null'     => 0,
            'info_field_txt' => 'lang_label_sys_user_theme_mandatory',
            'info_field_ico' => 'images/help.png',
        ));
		
        $this->insert_field(array(
            'column' => 'city',
            'type'   => 'varchar',
            'width'     => 80,
            
            'join'   => array(
                'mode'   => 'left',
                'table'  => 'examples_geocity',
                'column' => 'idCity',
            ),

            'input'  => array(
                'type'     => 'select',
                'from'     => 'examples_geocity',
                'data'     => 'idCity',
                'caption'  => 'lng_label_city',
                'nonset_id'     => '',
                'nonset_name'   => '---',
            ),
            'null'     => 0,
            'info_field_txt' => 'lang_label_sys_user_theme_mandatory',
            'info_field_ico' => 'images/help.png',
        ));
		
        $this->insert_field(array(
            'column' => 'country',
            'type'   => 'char',
            'width'     => 3,
            
            'join'   => array(
                'mode'   => 'left',
                'table'  => 'examples_geocountry',
                'column' => 'idCountry',
            ),

            'input'  => array(
                'type'     => 'select',
                'from'     => 'examples_geocountry',
                'data'     => 'idCountry',
                'caption'  => 'lng_label_country',
                'nonset_id'     => '',
                'nonset_name'   => '---',
            ),
            'null'     => 1,
            'info_field_txt' => 'lang_label_sys_user_theme_mandatory',
            'info_field_ico' => 'images/help.png',
        ));
        
        $this->insert_field(array(
            'table'  => 'examples_geocountry',
            'column' => 'country',
            'type'   => 'varchar',
            'width'  => 15,
            'title'  => 'lng_label_country',
            'null'     => 0,
            'info_field_txt' => 'lang_label_sys_user_theme_mandatory',
            'info_field_ico' => 'images/help.png',
        ));
		
        $this->insert_field(array(
            'column'    => 'tel',
            'type'      => 'varchar',
            'width'     => 20,
            'null'      => 1,
            'validate' => 'sanitize_string',
            'input_mask'=> '(999)-(999-99-99)',
            'info_field_txt' => 'lang_label_sys_user_theme_mandatory',
            'info_field_ico' => 'images/help.png',
        ));
		
        $this->insert_field(array(
            'column'    => 'fax',
            'type'      => 'varchar',
            'width'     => 20,
            'null'      => 1,
            'store'     => 0,
            'update'    => 0,
            'input_mask'=> '(999)-(999-99-99)',
            'info_field_txt' => 'lang_label_sys_user_email_mandatory',
            'info_field_ico' => 'images/exclamation.png',
        ));
		
        $this->insert_field(array(
            'column'    => 'mobile',
            'type'      => 'varchar',
            'width'     => 20,
            'null'      => 1,
            'store'     => 0,
            'update'    => 0,
            'input_mask'=> '(999)-(999-99-99)',
            'info_field_txt' => 'lang_label_sys_user_email_mandatory',
            'info_field_ico' => 'images/exclamation.png',
        ));
		
        $this->insert_field(array(
            'column'    => 'email',
            'type'      => 'varchar',
            'width'     => 100,
            'null'      => 1,
            'validate' => 'validate_email',
            'info_field_txt' => 'lang_label_sys_user_email_mandatory',
            'info_field_ico' => 'images/exclamation.png',
        ));
		
        $this->insert_field(array(
            'column'    => 'website',
            'type'      => 'varchar',
            'width'     => 100,
            'null'      => 1,
            'store'     => 0,
            'update'    => 0,
            'input_mask'=> 'http://',
            'info_field_txt' => 'lang_label_sys_user_email_mandatory',
            'info_field_ico' => 'images/exclamation.png',
        ));
		
        $this->insert_field(array(
            'column'    => 'addInfo',
            'type'      => 'tinytext',
            'null'      => 1,
            'store'     => 0,
            'update'    => 0,
            'info_field_txt' => 'lang_label_sys_user_email_mandatory',
            'info_field_ico' => 'images/exclamation.png',
        ));
        
        $this->insert_field(array(
            'column'    => 'userInsert',
            'type'      => 'smallint',
            'width'     => 6,
            'null'      => 1,
            'update'    => 0,
            'info_field_txt' => 'lang_label_sys_user_email_mandatory',
            'info_field_ico' => 'images/exclamation.png',
        ));
        
        $this->insert_field(array(
            'column'    => 'userMod',
            'type'      => 'smallint',
            'width'     => 6,
            'null'      => 1,
            'store'     => 0,
            'info_field_txt' => 'lang_label_sys_user_email_mandatory',
            'info_field_ico' => 'images/exclamation.png',
        ));
        
        $this->insert_field(array(
            'column'    => 'dataMod',
            'type'      => 'timestamp',
            'store'	    => 0,
            'info_field_txt' => 'lang_label_sys_user_email_mandatory',
            'info_field_ico' => 'images/exclamation.png',
        ));
    
        $this->insert_field(array(
            'column'    => 'dataInsert',
            'type'      => 'timestamp',
            'update'	=> 0,
			'value'		=> unix_to_human(now(), true, 'euro'),
            'info_field_txt' => 'lang_label_sys_user_email_mandatory',
            'info_field_ico' => 'images/exclamation.png',
        ));  

        $this->insert_field(array(
            'column' => 'testdatetimefield',
            'type'   => 'datetime',
            'read'   => 0,
            'update' => 0,
            'null'   => 1,
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
	function save($fields_to_save = null)
	{
        
        $is_definite = $this->isDefinite();
        if ($is_definite) {
            $this->userMod     =   14;
        } else {
            $this->userInsert  =   13;
        }
        
        /* 
        $city   =   $this->city;
        if($city) {
            $ifCityExists = SHIN_Core::$_models['examples_geocity_model']->getCityByName($this->city);
                    
            if(!$ifCityExists) {
                SHIN_Core::$_models['examples_geocity_model']->addNewCity($this->country, $this->city, $this->province, $this->postalCode);    
            }
        }
        */
        
        $h = parent::save();
        
        

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
    * get record by id
    * 
    * @param int $idCustomer - record id
    */
    function getRecordById($idCustomer) {
                 SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from($this->table_name);    
                 SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idCustomer', $idCustomer);
        $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
        
        return $query->row(0, 'array');
    }
    
    /**
    * get data for VAT autocompelete
    * 
    * @param string $searchedTerm searched VAT
    * @return array
    */
    function autocompleteVat($searchedTerm) {
                 SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from($this->table_name);    
                 SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('vat', $searchedTerm);
        $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
        
        return $query->result_array();    
    }
    
    /**
    * get data for NIN autocomplete
    * 
    * @param string $searchedTerm searched NIN
    * @return array
    */
    function autocompleteNin($searchedTerm) {
                 SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from($this->table_name);    
                 SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('nin', $searchedTerm);
        $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
        
        return $query->result_array();    
    }
    
    /**
    * delete record by id
    * 
    * @param in $id
    * @return boolean
    */
    function delete($id){
        return  SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->delete($this->table_name, array('idCustomer' => $id));
    }
} // end of class

/* End of file examples_customer_master_data_model.php */
