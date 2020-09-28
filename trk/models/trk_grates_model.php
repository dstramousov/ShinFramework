<?php

class Trk_GRates_model extends SHIN_Model {

    /**
     * Physical tablename.
     */
    var $table_name = 'trk_grates';
    
    function __construct()
    {
        parent::__construct($this->table_name);
        
        // PK Index definition
        $this->primary_key  = 'idRate';
        $this->insert_index('idPhoto');

		$this->insert_field(array(
			"column"	=> "idRate",
			"type"   => "integer",
			"attr"   => "auto_increment",			
		));

		$this->insert_field(array(
			"column"	=> "idPhoto",
			"type"		=> "integer",
            'null'              => 0,
            'info_field_txt'    => null,
            'info_field_ico'    => null,
		));

		$this->insert_field(array(
			"column"	=> "userId",
			"type"		=> "integer",
            'null'              => 0,
            'info_field_txt'    => null,
            'info_field_ico'    => null,
		));

    } // end of function
    
    /**
    * add new reater
    * 
    * @param int $userId
    * @param int $photoId
    * @access public
    * @return boolean
    */
    function addRater($photoId, $userId = null){
        
        if(is_null($userId)) {
            $userId =   SHIN_Core::$_user->idUser;
        }
        
        return SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert($this->table_name, array('idPhoto' => $photoId, 'userId'  => $userId));      
    }
    

    /**
    * Check if user(userid) rate photo with photoid
    *
    * @access public
    * @param $
    * @return $h hash.
    * @sa SHIN_Model::validate_form()
     */
    function isRate($_photoid, $_userid = null)
    {
        if(is_null($_userid)) {
            $_userid    =   SHIN_Core::$_user->idUser;
        }
        
    	$where =    array('idPhoto' => $_photoid, 'userId' => $_userid);
        $query =    SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get_where($this->table_name, $where);

        $ret =   $query->result_array();
    
        if(!empty($ret)) {
	        $query->free_result();
	         return true;
        }
	        $query->free_result();
            return false;
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
    } // end of function 

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
    } // end of function
    
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
    } // end of function
    
} // end of class

/* End of file Snaptrack_GRates_model.php */