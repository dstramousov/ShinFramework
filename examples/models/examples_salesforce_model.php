<?php

class Examples_SalesForce_model extends SHIN_MPKModel
{
    /**
     * Physical tablename.
     */
    var $table_name = 'examples_salesforce';

    function __construct()
	{
        parent::__construct($this->table_name);
		
		// PK Index definition
        $this->primary_key   = array('year', 'idNetwork', 'idSalesman');
		
		// Fields definition
		$this->insert_field(array(
			"column"	=> "year",
			"type"		=> "smallint",
            'width'     => 5,
			"unsigned"	=> 1,			
			"null"		=> 0,
			'dom_width'  => 'width:40px;',
		));
		
        $this->insert_field(array(
			'column' => 'idNetwork',
			"type"		=> "int",
            'width'     => 5,
			"unsigned"	=> 1,
			"null"		=> 0,
			'dom_width'  => 'width:70px;',
        ));

        $this->insert_field(array(
			'column' => 'idSalesman',
			"type"		=> "int",
            'width'     => 6,
			"unsigned"	=> 1,
			"null"		=> 0,
			'dom_width'  => 'width:70px;',
        ));
		
        $this->insert_field(array(
            'column'    => 'label',
            'type'      => 'varchar',
            'width'     => 30,
            'null'      => 1,
			'dom_width'  => 'width:280px;',
        ));
		
        $this->insert_field(array(
			'column' => 'sort',
			"type"		=> "smallint",
            'width'     => 3,
			"unsigned"	=> 1,
			"null"		=> 1,
			'dom_width'  => 'width:40px;',
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
		
//		dump(params());
/*
 [examples_salesforce_year_old] => "2004" (string)
  [examples_salesforce_idNetwork_old] => "987" (string)
  [examples_salesforce_idSalesman_old] => "2" (string)
  [examples_salesforce_year] => "1987" (string)
  [examples_salesforce_idNetwork] => "626" (string)
  [examples_salesforce_idSalesman] => "6" (string)
  [examples_salesforce_label] => "Next label" (string)
  [examples_salesforce_sort] => "1" (string)
*/

		$new_data = array(
							'year'			=> SHIN_Core::$_input->post('examples_salesforce_year'),
							'idNetwork'		=> SHIN_Core::$_input->post('examples_salesforce_idNetwork'),
							'idSalesman'	=> SHIN_Core::$_input->post('examples_salesforce_idSalesman'),
							'label'			=> SHIN_Core::$_input->post('examples_salesforce_label'),
							'sort'			=> SHIN_Core::$_input->post('examples_salesforce_sort'),
							);

		SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('year', SHIN_Core::$_input->post('examples_salesforce_year_old'));
		SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idNetwork', SHIN_Core::$_input->post('examples_salesforce_idNetwork_old'));
		SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idSalesman', SHIN_Core::$_input->post('examples_salesforce_idSalesman_old'));
		SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->update('examples_salesforce', $new_data);

		return;
	}
	
	
    /**
	* Delete object from DB (with related data).
	*
	* @access public
	* @param NULL.
	* @return NULL.
	* @sa SHIN_Model::del()
     */
	function del() 
	{
		parent::del();
	}
	
	
} // end of class

/* End of file Examples_SalesForce_model.php */