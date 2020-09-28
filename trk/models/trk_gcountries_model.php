<?php

class Trk_GCountries_model extends SHIN_Model {

    /**
     * Physical tablename.
     */
    var $table_name = 'trk_gcountries';
    
    function __construct()
    {
        parent::__construct($this->table_name);

        
        // PK Index definition
        $this->primary_key  = 'idCountry2';

        $this->insert_index('fullname');

		$this->insert_field(array(
			"column"	=> "idCountry2",
			"type"		=> "char",
            'width'		=> 2,
            'null'              => 0,
            'info_field_txt'    => null,
            'info_field_ico'    => null,
		));

		$this->insert_field(array(
			"column"	=> "idCountry3",
			"type"		=> "char",
            'width'		=> 3,
            'null'              => 0,
            'info_field_txt'    => null,
            'info_field_ico'    => null,
		));

		$this->insert_field(array(
			"column"	=> "isonumber",
			"type"		=> "integer",
            'null'              => 0,
            'info_field_txt'    => null,
            'info_field_ico'    => null,
		));

        $this->insert_field(array(
            'column'            => 'fullname',
            'type'              => 'varchar',
            'width'             => CT_VARCHAR_50,
            'title'             => '',
            'null'              => 0,
            'info_field_txt'    => null,
            'info_field_ico'    => null,
        ));
        
        $this->insert_field(array(
            'column'            => 'active',
            'type'              => 'enum',
            "values" => array(
                CT_SHOW        => "lng_label_news_show",
                CT_HIDE        => "lng_label_news_hide",
            ),
            'null'      => 1,
            'value'     => 0,
        ));

    } // end of function
    
    
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
    } // end of function 

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
    } // end of function
    
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
    } // end of function
    
    
    /**
    * 
    * get country list
    * 
    * @access public
    * @return array
    * @param null
    * 
    */
    function getCountryList(){
                  
                  SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('idCountry2'); 
                  SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('fullname'); 
                  SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->order_by('fullname'); 
       $query  =  SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get_where($this->table_name);
       $result = $query->result_array();
        
       $list    =   array('' => '');
       foreach($result as $item) {
            $list[$item['idCountry2']]   =   $item['fullname'];     
       }
       $query->free_result();
       
       return $list;
        
    }
    
} // end of class

/* End of file Snaptrack_GCountries_model.php */