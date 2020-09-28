<?php

class SHINTicket_RelAppCus_model extends SHIN_Model {

    /**
     * Physical tablename.
     */
    var $table_name = 'shinticket_relappcus';

    function __construct()
	{
        parent::__construct($this->table_name);
		
		// PK Index definition
        $this->primary_key   = 'id';
		
		// Fields definition
		$this->insert_field(array(
			"column" => "id",
			"type"   => "tinyint",
			"attr"   => "auto_increment",			
		));

        $this->insert_field(array(
            'column' => 'idApplication',
            'type'   => 'integer',
            
            'join'   => array(
                'mode'   => 'left',
                'table'  => 'shinticket_applicationlist',
                'column' => 'idApplication',
	            'as'     => 'shinticket_applicationlist_idApplication'
            ),

			'validate' => 'validate_int',
            'null'     => 0,
            'info_field_txt' => FALSE,
            'info_field_ico' => FALSE,
        ));

        $this->insert_field(array(
            'column' => 'idCustomer',
            'type'   => 'integer',
            
            'join'   => array(
                'mode'   => 'left',
                'table'  => 'shinticket_customerlist',
                'column' => 'idCustomer',
	            'as'     => 'shinticket_customerlist_idCustomer'
            ),

            'null'     => 0,
            'info_field_txt' => FALSE,
            'info_field_ico' => FALSE,
        ));
    }
	
	
    /**
	* Get application list by customer id.
	*
	* @access public
	* @param void
	* @return $h hash.
	* @sa SHIN_Model::validate_form()
     */
	function getInfoByCustomerID()
	{
		$app_data = array();
		
		$query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get_where('shinticket_relappcus', array('idCustomer' => SHIN_Core::$_models['shinticket_user_model']->_shticket_idCustomer));
		foreach ($query->result_array() as $row)
		{		
			$query2 = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get_where('shinticket_applicationlist', array('idApplication' => $row['idApplication']), 1);
			$row2 = $query2->result_array();
		
			$app_data[$row['idApplication']] = $row2[0]['applicationName'];
		}		
		
		return $app_data;
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


} // end of class

/* End of file SHINTicket_RelAppCus_model.php */