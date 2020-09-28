<?php

class Sys_UserRole_model extends SHIN_MPKModel {

    /**
     * Physical tablename.
     */
    var $table_name = 'sys_userrole';

    function __construct() 
	{
        parent::__construct($this->table_name);
		
		// PK Index definition
        $this->primary_key   = array('idRole');
		
		// Index definition
        //$this->insert_index('idRole');
				
		// Fields definition
        $this->insert_field(array(
			"column"    => "idRole",
			"type"      => "varchar",
            'width'     => 5,
            'value'     => '',
			'null'      => 0,
            'validate'  => 'custom_role_validate',
            'unique'    => 1
        ));
		
        $this->insert_field(array(
            'column'    => 'role',
            'type'      => 'varchar',
            'width'     => 30,
			'title'     => 'lng_label_sys_userrole',
			'value'     => '',
            'validate'  => 'sanitize_string'
        ));
		
        $this->insert_field(array(
            "column"    => "grp",
            "type"      => "enum",
            "values"    => array(
                    'base'	=> "lng_label_sys_userrole_grp_base",
                    'acc'	=> "lng_label_sys_userrole_grp_acc",
                ),
            "value"     => 'base',
            "null"      => 0,
            "title"     => 'lng_label_sys_userrole_grp',
        ));		
	}
    
    /**
    * custom validate for idRole field
    * 
    * @param mixed $data
    * @access public
    * @return array
    */
    function custom_role_validate($data){
       
        if(!empty($data)) {
            
           if(!isset($this->oldRoleId) || $this->oldRoleId != $data) { 
                            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('COUNT(*) as count');
                            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from($this->table_name);
                            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idRole', $data);
               $query     = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
               $result    = $query->row(0, 'array');
               
               if($result['count'] > 0) {
                   return array('result' => false, 'value' => 'lng_label_sys_role_id_unique_validation');
               }
           }
               return array('result' => true, 'value' => '');
        }
    
        return array('result' => false, 'value' => 'lng_label_sys_role_id_empty_validation');    
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
    
    function save($fields_to_save = null) {
        
        $h = parent::save($fields_to_save);
        
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
    * get roles list for DD
    * 
    * @access public
    * @param null
    * @return array
    * 
    */
    public function getRolesListForDD(){
                    SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('idRole');
                    SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('role');
                    SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from($this->table_name);
       $query     = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
       $result    = $query->result_array();
       $rolesList = array();  
       foreach($result as $value) {
        $rolesList[$value['idRole']]    =  $value['role'];    
       }  
       
       return $rolesList;
    }
    
    /**
    * get roles list
    * 
    * @access public
    * @param null
    * @return array
    * 
    */
    public function getSysUserList(){
                    
                    SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from($this->table_name);
       $query     = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
       
       return $query->result_array();     
    }
} // end of class

/* End of file Panel_model.php */