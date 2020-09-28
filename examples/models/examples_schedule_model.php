<?php

class Examples_schedule_model extends SHIN_Model {

    /**
     * Physical tablename.
     */
    var $table_name = 'examples_schedule';

    function __construct()
	{
        parent::__construct($this->table_name);
		
		// PK Index definition
        $this->primary_key   = 'id';
		
		// Fields definition
		$this->insert_field(array(
			"column" => "id",
			"type"   => "integer",
			"attr"   => "auto_increment",			
		));
		
        $this->insert_field(array(
			'column' => 'startdate',
            'type'   => 'date',
            'value'  => $this->db_now_date(),
        ));

        $this->insert_field(array(
			'column' => 'finishdate',
            'type'   => 'date',
            'value'  => $this->db_now_date(),
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

/* End of file examples_schedule_model.php */