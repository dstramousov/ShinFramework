<?php
                  
define('CT_EXAMPLES_USERTYPE_PHOTOGRAPHER', 'rSKup');
define('CT_EXAMPLES_USERTYPE_ADMIN', 'rSKad');
define('CT_EXAMPLES_USERTYPE_VIEWER', 'rSKvw');


define('CT_EXAMPLES_WATERMARK_SYSTEM', 's');
define('CT_EXAMPLES_WATERMARK_CUSTOM', 'c');
define('CT_EXAMPLES_WATERMARK_OFF', 'o');

define('CT_EXAMPLES_WATERMARK_STATUS_ENABLE', '1');
define('CT_EXAMPLES_WATERMARK_STATUS_DISABLE', '0');

class Examples_User_model extends SHIN_Model {

    /**
     * Physical tablename.
     */
    var $table_name = 'examples_user';
    
    function __construct()
    {
        parent::__construct($this->table_name);
        
        // PK Index definition
        $this->primary_key  = 'userId';
		
        $this->insert_field(array(
            'column' => 'userId',
            'type'   => 'integer',
            'join'   => array(
                'mode'   => 'left',
                'table'  => 'sys_user',
                'column' => 'idUser',
            ),
			
            'input'  => array(
                'type'          => 'select',
                'from'          => 'sys_user',
                'data'          => 'idUser',
                'caption'       => 'name',
                'nonset_id'     => '',
                'nonset_name'   => '',
            ),
						
            'info_field_txt'    => false,
            'info_field_ico'    => false,
        ));
        
        $this->insert_field(array(
            'table'             => 'sys_user',
            'column'            => 'lang',
            'virtual'           => TRUE,
            'info_field_ico'    => 'images/help.png',
            'info_field_txt'    => 'lang_label_gtrwebsite_answers_idnode',
        ));
        
        $this->insert_field(array(
            'table'     => 'sys_user',
            'column'    => 'status',
            'virtual'	=> TRUE,
        ));

        $this->insert_field(array(
            'table'     => 'sys_user',
            'column'    => 'name',
            'virtual'    => TRUE,
        ));
		
        $this->insert_field(array(
            "column"    => "role_1",
            'table'     => 'sys_user',
            'virtual'   => TRUE,
            'validate'  => FALSE
        ));
        
        $this->insert_field(array(
            "column"    => "role_2",
            'table'     => 'sys_user',
            'virtual'   => TRUE,
        ));
        
        $this->insert_field(array(
            "column"    => "role_3",
            'table'     => 'sys_user',
            'virtual'   => TRUE,
        ));
        
        $this->insert_field(array(
            "column"    => "role_4",
            'table'     => 'sys_user',
            'virtual'   => TRUE,
        ));
        
        $this->insert_field(array(
            "column"    => "role_5",
            'table'     => 'sys_user',
            'virtual'   => TRUE,
        ));
        
        $this->insert_field(array(
            "column"    => "role_6",
            'table'     => 'sys_user',
            'virtual'   => TRUE,
        ));
        
        $this->insert_field(array(
            "column"    => "role_7",
            'table'     => 'sys_user',
            'virtual'   => TRUE,
        ));
        
        $this->insert_field(array(
            "column"    => "role_8",
            'table'     => 'sys_user',
            'virtual'   => TRUE,
        ));
        
        $this->insert_field(array(
            "column"    => "role_9",
            'table'     => 'sys_user',
            'virtual'   => TRUE,
        ));
        
        $this->insert_field(array(
            "column"    => "role_10",
            'table'     => 'sys_user',
            'virtual'	=> TRUE,
        ));
        
        $this->insert_field(array(
            'table'     => 'sys_user',
            "column"    => "lastname",
            'virtual'   => TRUE,
        ));
        
        $this->insert_field(array(
            'table'     => 'sys_user',
            "column"    => "email",
            'virtual'   => TRUE,
        ));
        
        $this->insert_field(array(
            'table'     => 'sys_user',
            "column"    => "username",
            'virtual'	=> TRUE,
        ));
        
        $this->insert_field(array(
            'table'     => 'sys_user',
            "column"    => "pwd",
            'virtual'    => TRUE,
        ));
        
        $this->insert_field(array(
            'table'     => 'sys_user',
            "column"    => "theme",
            'virtual'	=> TRUE,
        ));

		
    } // end of function
		
	function customPwdCheck($data){
		return array('result' => true, 'value' => '');
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
    } // end of function 

    /**
    * Prepare html for edit/add current object information.
    *
    * @access public
    * @param $fields needed fields for write to template. By default - ALL.
    * @return $h hash.
    * @sa SHIN_Model::write_form()
     */
    function write_form($fields_to_validate = null, $mode=WRITE_NORMAL)
    {
        $h = parent::write_form($fields_to_validate);

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
    
    /**
    * Call save
    *
    * @access public
    * @param $fields needed fields for validation. By default - all with properties [validate].
    * @return $h hash.
    * @sa SHIN_Model::validate_form()
     */
    function save($fields_to_validate = null)
    {
        
        $is_definite = $this->isDefinite();
        
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->trans_begin();
        
        if($is_definite){        
            // update                        
            // 1. table sys_user
            $data = array(
                'lang'          => $this->sys_user_lang,
                'status'        => $this->sys_user_status,
                'name'          => $this->sys_user_name,
                'role_1'        => $this->sys_user_role_1,
                'role_2'        => $this->sys_user_role_2,
                'role_3'        => $this->sys_user_role_3,
                'role_4'        => $this->sys_user_role_4,
                'role_5'        => $this->sys_user_role_5,
                'role_6'        => $this->sys_user_role_6,
                'role_7'        => $this->sys_user_role_7,
                'role_8'        => $this->sys_user_role_8,
                'role_9'        => $this->sys_user_role_9,
                'role_10'       => $this->sys_user_role_10,
                'lastname'      => $this->sys_user_lastname,
                'email'         => $this->sys_user_email,
                'username'      => $this->sys_user_username,
                'pwd'           => md5($this->sys_user_pwd),
                'theme'         => $this->sys_user_theme,
            );                
                
            if($this->sys_user_pwd == CT_EMPTY_STR){
                unset($data['pwd']);
            }

            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idUser', $this->userId);
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->update('sys_user', $data);
            
            
        } else {
            // insert
            
            // 1. table sys_user
            $data = array(
                'lang'          => $this->sys_user_lang,
                'status'        => $this->sys_user_status,
                'name'          => $this->sys_user_name,
                'role_1'        => $this->sys_user_role_1,
                'role_2'        => $this->sys_user_role_2,
                'role_3'        => $this->sys_user_role_3,
                'role_4'        => $this->sys_user_role_4,
                'role_5'        => $this->sys_user_role_5,
                'role_6'        => $this->sys_user_role_6,
                'role_7'        => $this->sys_user_role_7,
                'role_8'        => $this->sys_user_role_8,
                'role_9'        => $this->sys_user_role_9,
                'role_10'       => $this->sys_user_role_10,
                'lastname'      => $this->sys_user_lastname,
                'email'         => $this->sys_user_email,
                'username'      => $this->sys_user_username,
                'pwd'           => md5($this->sys_user_pwd),
                'theme'         => $this->sys_user_theme,
            );

            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert('sys_user', $data);
            $__ID = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert_id();
            
            // 2. table examples_user            
            $data = array(
                'userId'                => $__ID,
            );

            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert($this->table_name, $data);
            
        } //insert or update
                
        if (SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->trans_status() === FALSE)
        {
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->trans_rollback();
            $ret = FALSE;
        } else {
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->trans_commit();
            $ret = TRUE;
        }
        
        return $ret;
            
    }
	

} // end of class

/* End of file Examples_User_model.php */
