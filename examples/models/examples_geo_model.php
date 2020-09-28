<?php

class Examples_geo_model extends SHIN_Model {

    /**
     * Physical tablename.
     */
    var $table_name = 'examples_geo';

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
            'column' => 'lat',
            'type'   => 'float',
			'width'  => 10,
			'prec'   => 3,
        ));
		
        $this->insert_field(array(
            'column' => 'lng',
            'type'   => 'float',
			'width'  => 7,
			'prec'   => 3,
        ));
		
        $this->insert_field(array(
            'column' => 'username',
            'type'   => 'varchar',
            'width'  => 50,
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
	function fetchLatestIntervals()
	{
    	return $this->getLastRec(100);
	}
	
	
    /**
     * Insert one record.
     *
     * @access public
     * @input:  array
     * @output: null
     */
	function insertOneRec($data)
	{
		/*  for example
		$data = array(
               'lat' => 34,3847837 ,
               'lng' => 34,3847837
            );
	*/
		SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert($this->table_name, $data); 
		
		return;
	}
	

} // end of class

/* End of file Tag_model.php */