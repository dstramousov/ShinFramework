<?php

class Sys_StructApplicationAttr_model extends SHIN_Model {

    /**
     * Physical tablename.
     */
    var $table_name = 'sys_structapplicationattr';

    function __construct() 
	{
        parent::__construct($this->table_name);
		
		// PK Index definition
        $this->primary_key   = 'idAttrib';
		
		// Index definition
        // $this->insert_index('index(idArea)');
				
		// Fields definition
		$this->insert_field(array(
			"column" => "idAttrib",
			"type"   => "varchar",
            'width'  => CT_VARCHAR_25,
            'value'  => '',
            'null'	 => 0,
		));

        $this->insert_field(array(
            "column"            => "description",
            'type'              => 'varchar',
            'width'             => CT_VARCHAR_200,
            'title'             => '',
            'null'              => 0,
            'info_field_txt'    => false,
            'info_field_ico'    => false,
            'null'	 => 0,
        ));

        $this->insert_field(array(
            'table'             => 'attribute',
            'column'            => 'name',
            'type'              => 'varchar',
            'width'             => CT_VARCHAR_50,
            'title'             => '',
            'null'              => 0,
            'info_field_txt'    => null,
            'info_field_ico'    => null,
            'virtual'           => true,
        ));

        $this->insert_field(array(
            "column" => "used",
            "type"   => "enum",
            "values" => array(
                'y'  => "lng_label_structapplicationattr_used_y",
                'n'  => "lng_label_structapplicationattr_used_n",
            ),
            "value"  => 'y'
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

} // end of class

/* End of file Sys_StructApplicationAttr_model.php */
