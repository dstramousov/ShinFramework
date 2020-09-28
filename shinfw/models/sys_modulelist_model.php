<?php

class Sys_ModuleList_model extends SHIN_Model {

    /**
     * Physical tablename.
     */
    var $table_name = 'sys_modulelist';

    function __construct() 
	{
        parent::__construct($this->table_name);
		
		// PK Index definition
        $this->primary_key   = 'idModule';
		
		// Fields definition
		$this->insert_field(array(
			"column"    => "idModule",
			"type"      => "tinyint",
            'value'     => '',
		));

        $this->insert_field(array(
            'column' => 'applicationName',
            'type'   => 'varchar',
            'width'  => 50,
			'title'  => 'lng_label_sys_applicationlist_name',
			'value'  => '',
        ));
		
        $this->insert_field(array(
            'column'    => 'applicationFolder',
            'type'      => 'varchar',
            'width'  	=> 255,
			'title'     => 'lng_label_sys_applicationlist_folder',
			'value'     => '',
            'validate'  => 'sanitize_string'
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
    
    /**
    * get application list
    * 
    * @access public
    * @param null
    * @return array
    * 
    */
    function getApplicationList()
	{
		$ret = array();
                    
                    SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('idModule, applicationFolder');
                    SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from($this->table_name);
                    SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->order_by('applicationFolder', 'asc');
		$query     = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
        
		foreach ($query->result_array() as $row){
			$ret[$row['idModule']] = $row['applicationFolder'];
		}       
	   
       return $ret;
    }
    

} // end of class

/* End of file Sys_ModuleList_model.php */