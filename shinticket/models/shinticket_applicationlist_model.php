<?php

class SHINTicket_ApplicationList_model extends SHIN_Model {

    /**
     * Physical tablename.
     */
    var $table_name = 'shinticket_applicationlist';

    function __construct()
	{
        parent::__construct($this->table_name);
		
		// PK Index definition
        $this->primary_key   = 'idApplication';
		
		// Fields definition
		$this->insert_field(array(
			"column" => "idApplication",
			"type"   => "integer",
			"attr"   => "auto_increment",			
		));

        $this->insert_field(array(
            'column' => 'applicationName',
            'type'   => 'varchar',
            'width'  => 50,
			'title'  => 'lng_label_shinticket_applicationlist_applicationname',
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


} // end of class

/* End of file SHINTicket_ApplicationList_model.php */