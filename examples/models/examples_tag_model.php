<?php

class Examples_tag_model extends SHIN_Model {

    /**
     * Physical tablename.
     */
    var $table_name = 'examples_tags';

    function __construct() 
	{
        parent::__construct($this->table_name);
		
		// PK Index definition
        $this->primary_key   = 'id';
		
		// Index definition
        $this->insert_index('file_id');
        $this->insert_index('item');
				
		// Fields definition
		$this->insert_field(array(
			"column" => "id",
			"type"   => "integer",
			"attr"   => "auto_increment",			
		));
		
        $this->insert_field(array(
            'column' => 'file_id',
            'type'   => 'integer',
            'value'  => 0,
        ));
        
        $this->insert_field(array(
            'column' => 'tag',
            'type'   => 'char',
            'width'  => 50,
			'value'  => '',
            "mull"   => 0
        ));
		
        $this->insert_field(array(
            'column' => 'item',
            'type'   => 'char',
            'width'  => '50',
			'value'  => '',
			"null"	 => 0,
        ));
    }

    /**
     * Fetch all tags.
     *
     * @access public
     * @input:  null
     * @output: array
     */
	function fetchAllTags()
	{
        $_ret = array();
    	return $_ret;
	}

} // end of class

/* End of file Tag_model.php */