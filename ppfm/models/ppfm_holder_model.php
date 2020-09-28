<?php

class Ppfm_Holder_model extends SHIN_Model {

    /**
     * Physical tablename.
     */
    var $table_name = 'ppfm_holder';

    function __construct()
	{
        parent::__construct($this->table_name);
		
		// PK Index definition
        $this->primary_key   = 'idHolder';
		
		// Index definition
        //$this->insert_index('holder');
		
		// Fields definition
		$this->insert_field(array(
			"column" => "idHolder",
			"type"   => "tinyint",
			"attr"   => "auto_increment",			
		));
		
        $this->insert_field(array(
            "column"    => "holder",
            "type"      => "varchar",
            'width'     => 45,
            "value"     => '',
            "null"      => 1,
            "title"     => 'lng_label_holder_name',
            'validate'  => 'sanitize_string',
            'unique'    => 1
        ));		
    }
	
	function getHolders()
	{
		$ret = array();
		
		$query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get($this->table_name);
		foreach ($query->result_array() as $row)
		{
			$ret[$row['idHolder']] = $row['holder'];
		}
		
		return $ret;
	}
    
    /**
    * delete one record by PK
    * 
    * @param int $id
    */
    function deleteRecordById($id){
        
        $where  = array($this->pk => $id);  
        
        return SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->delete($this->table_name, $where);
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

/* End of file Holder_model.php */