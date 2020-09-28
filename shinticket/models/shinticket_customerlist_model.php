<?php

class SHINTicket_CustomerList_model extends SHIN_Model {

    /**
     * Physical tablename.
     */
    var $table_name = 'shinticket_customerlist';

    function __construct()
	{
        parent::__construct($this->table_name);
		
		// PK Index definition.
        $this->primary_key   = 'idCustomer';
		
		// Fields definition
		$this->insert_field(array(
			"column" => "idCustomer",
			"type"   => "tinyint",
			"attr"   => "auto_increment",			
		));

        $this->insert_field(array(
            'column' => 'customerName',
            'type'   => 'varchar',
            'width'  => 100,
			'title'  => 'lng_label_shinticket_customerlist_customername',
			'value'  => '',
	        "null"   => 0,
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
    * Get application for .
    *
    * @access public
    * @param $fields needed fields for reading from form. 
    * @return NULL
    * @sa SHIN_Model::read_form()
     */
    function getCustomerAppLication($_idCustomer)
    {
        $_ret = array();
        
        $resApplicationList = SHIN_Core::$_models['shinticket_relappcus_model']->get_expanded_result(array(
            "where" => 'shinticket_relappcus.idCustomer='.$_idCustomer,
        ));
        $applicationList =   $resApplicationList->result_array(); 
        foreach($applicationList as $id=>$data)
        {
            array_push($_ret, $data['idApplication']);
        }
        return $_ret;
    }
    
    /**
	* Get application for autocomplete action .
	*
	* @access public
	* @param $like - application name 
	* @return NULL
	*/
	function getAutocompleteCustomerAppLication($like)
	{
		$result = array();
		
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('applicationName');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from('shinticket_applicationlist');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->join('shinticket_relappcus', 'shinticket_relappcus.idApplication = shinticket_applicationlist.idApplication');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idCustomer', SHIN_Core::$_libs['auth']->user->idUser);
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('applicationName LIKE "%' . $like . '%"');
        
        $query  = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
        $result = $query->result_array();
        
		return $result;
	}
} // end of class

/* End of file SHINTicket_CustomerList_model.php */