<?php

class Sys_User_model extends SHIN_Model {

    /**
     * Physical tablename.
     */
    var $table_name = 'sys_user';

    function __construct() 
	{
        parent::__construct($this->table_name);
				
		// PK Index definition
        $this->primary_key   = 'idUser';
		
		// Index definition
        $this->insert_index(array('username'=>'UNIQUE'));
        $this->insert_index(array('email'=>'UNIQUE'));

		// Fields definition
		$this->insert_field(array(
			"column" => "idUser",
			"type"   => "integer",
			"attr"   => "auto_increment"
		));
		
        $this->insert_field(array(
            'column' => "lang",
            'type'   => "enum",
            'width'  => 2,
            'values' => array(
                'it'        => "lng_label_lang_it",
                'ru'        => "lng_label_lang_ru",
                'en'        => "lng_label_lang_en",
            ),
            'value'  => 'it',
            'null'   => 0,
            'info_field_ico' => 'images/star.png',
            'info_field_txt' => 'lang_label_sys_user_lang_mandatory',
			'dom_width'  => 'width:40px;',
            'title'  => 'lng_label_lang'
        ));

        $this->insert_field(array(
            'column' => "status",
            'type'   => "enum",
            'width'  => 1,
            'values' => array(
                CT_USER_ACTIVE	=> "lng_label_lang_user_active",
                CT_USER_SUSPENDED	=> "lng_label_lang_user_suspend",
                CT_USER_WAUTH	=> "lng_label_lang_user_wauth",
                CT_USER_CLOSED	=> "lng_label_lang_user_closed",
            ),
            'value'  => CT_USER_WAUTH,
            'null'   => 0,
            'info_field_txt' => FALSE,
            'info_field_ico' => FALSE,
			'dom_width'  => 'width:40px;',
            'title'  => 'lng_label_lang_user_status'
        ));

		
        $this->insert_field(array(
            "column"    => "name",
            "type"      => "varchar",
            'width'     => 45,
            "value"     => "",
            "null"      => 0,
			'dom_width'  => 'width:200px;',
            'info_field_txt' => 'lang_label_sys_user_name_mandatory',
            "title"     => 'lng_label_username',
            'validate'  => 'sanitize_string',
        ));

        $this->insert_field(array(
            "column"    => "role_1",
            "type"      => "char",
            'width'     => 5,
            "value"     => "",
            "null"      => 0,
			'dom_width'  => 'width:40px;',
            'validate'  => 'sanitize_string'
        ));
		
        $this->insert_field(array(
            "column"    => "role_2",
            "type"      => "char",
            'width'     => 5,
            "value"     => "",
			'dom_width'  => 'width:40px;',
            "null"      => 1,
            'validate'  => '',
            'info_field_txt' => 'This is a test :))))))))))))))',
            'info_field_ico' => 'images/star.png',
        ));

        $this->insert_field(array(
            "column"    => "role_3",
            "type"      => "char",
//			"table"   => $this->table_name,
            'width'     => 5,
            "value"     => "",
			'dom_width'  => 'width:40px;',
            "null"      => 1,
            'validate'  => '',
            'info_field_txt' => FALSE,
            'info_field_ico' => FALSE,
        ));

        $this->insert_field(array(
            "column"    => "role_4",
            "type"      => "char",
            'width'     => 5,
            "value"     => "",
            "null"      => 1,
			'dom_width'  => 'width:40px;',
            'validate'  => '',
            'info_field_txt' => FALSE,
            'info_field_ico' => FALSE,
        ));

        $this->insert_field(array(
            "column"    => "role_5",
            "type"      => "char",
            'width'     => 5,
            "value"     => "",
            "null"      => 1,
			'dom_width'  => 'width:40px;',
            'validate'  => '',
            'info_field_txt' => FALSE,
            'info_field_ico' => FALSE,
        ));

        $this->insert_field(array(
            "column"    => "role_6",
            "type"      => "char",
            'width'     => 5,
            "value"     => "",
            "null"      => 1,
			'dom_width'  => 'width:40px;',
            'validate'  => '',
            'info_field_txt' => FALSE,
            'info_field_ico' => FALSE,
        ));

        $this->insert_field(array(
            "column"    => "role_7",
            "type"      => "char",
            'width'     => 5,
            "value"     => "",
            "null"      => 1,
			'dom_width'  => 'width:40px;',
            'validate'  => '',
            'info_field_txt' => FALSE,
            'info_field_ico' => FALSE,
        ));

        $this->insert_field(array(
            "column"    => "role_8",
            "type"      => "char",
            'width'     => 5,
            "value"     => "",
            "null"      => 1,
			'dom_width'  => 'width:40px;',
            'validate'  => '',
            'info_field_txt' => FALSE,
            'info_field_ico' => FALSE,
        ));

        $this->insert_field(array(
            "column"    => "role_9",
            "type"      => "char",
            'width'     => 5,
            "value"     => "",
            "null"      => 1,
			'dom_width'  => 'width:40px;',
            'validate'  => '',
            'info_field_txt' => FALSE,
            'info_field_ico' => FALSE,
        ));


        $this->insert_field(array(
            "column"    => "role_10",
            "type"      => "char",
            'width'     => 5,
            "value"     => "",
            "null"      => 1,
			'dom_width'  => 'width:40px;',
            'validate'  => '',
            'info_field_txt' => FALSE,
            'info_field_ico' => FALSE,
        ));
        

        $this->insert_field(array(
            "column"    => "lastname",
            "type"      => "varchar",
            'width'     => 45,
            "value"     => "",
            "null"      => 0,
            'info_field_txt' => 'lang_label_sys_user_lastname_mandatory',
            'info_field_ico' => 'images/exclamation.png',
            "title"     => 'lng_label_lastname',
            'validate'  => 'sanitize_string',
			'dom_width'  => 'width:200px;',
        ));
		
        $this->insert_field(array(
            "column"    => "email",
            "type"      => "varchar",
            'width'     => 45,
            "value"     => "",
            "null"      => 0,
            'info_field_txt' => 'lang_label_sys_user_email_mandatory',
            'info_field_ico' => 'images/exclamation.png',
            "title"     => 'lng_label_email',
            'validate'  => 'validate_email',
			'dom_width'  => 'width:200px;',
        ));
		
        $this->insert_field(array(
            "column"    => "username",
            "type"      => "varchar",
            'width'     => 45,
            "value"     => "",
            "null"      => 0,
            'info_field_txt' => 'lang_label_sys_user_username_mandatory',
            'info_field_ico' => 'images/exclamation.png',
            "title"     => 'lng_label_username',
            'validate'  => 'sanitize_string',
			'dom_width'  => 'width:200px;',
        ));
		
        $this->insert_field(array(
            "column"    => "pwd",
            "type"      => "varchar",
			'password' 	=> TRUE,
            'width'     => 32,
            "value"     => "",
            "null"      => 0,
            'info_field_txt' => 'lang_label_sys_user_pwd_mandatory',
            "title"     => 'lng_label_pwd',
            'validate'  => 'customPwdCheck',
			'dom_width' => 'width:235px;',
        ));             
        
        $this->insert_field(array(
            "column" => "theme",
            "type"   => "varchar",
            'width'  => 20,
            "value"  => "",
            "values" => array(
                'lightness'       => "lightness",
                'darkness'        => "darkness",
                'smoothness'      => 'smoothness',
                'redmond'         => 'redmond'  
            ),
            "null"   => 0,
            'info_field_txt' => 'lang_label_sys_user_theme_mandatory',
            'info_field_ico' => 'images/help.png',
            "title"  => 'theme',
			'dom_width'  => 'width:100px;',
        ));
		
        $this->insert_field(array(
            'column' => 'host',
            'type'   => 'varchar',
            'with'   => 15,
			'title'  => 'Host',
            'null'   => 1,
			'read'	 => 0,
        ));
		
        $this->insert_field(array(
            'column' => 'updated',
            'type'   => 'datetime',
            'null'   => 1,
			'read'	 => 0,
        ));
		
        $this->insert_field(array(
            'column' => 'added',
            'type'   => 'datetime',
            'null'   => 0,
			'update' => 0,
			'read'	 => 0,
			'value'  => date('Y-m-d H:i:s')
        ));
		
        $this->insert_field(array(
            'column' => 'lastlogin',
            'type'   => 'datetime',
            'null'   => 1,
			'update' => 0,
			'read'	 => 0,
        ));
		
    } // end of function 
    
    /**
    * custom password check for update action and add action
    * 
    * @param mixed $data
    * @access public
    * @return array
    */
    public function customPwdCheck($data){
	
        if($this->isDefinite()) {
            if(!empty($this->pwd)) {
                if($this->pwd != $this->sys_user_pwd_confirm) {
                    return array('result' => false, 'value' => 'lng_label_user_pwd_validation');
                } elseif(strlen($this->pwd) < 8) {
                    return array('result' => false, 'value' => 'lng_label_user_pwd_len_validation');    
                }  
            }
        } else {
            
            if(empty($this->pwd)) {
                return array('result' => false, 'value' => 'lng_label_user_pwd_empty_validation');    
            } elseif($this->pwd != $this->sys_user_pwd_confirm) {
                return array('result' => false, 'value' => 'lng_label_user_pwd_validation');    
            } elseif(strlen($this->pwd) < 8) {
                return array('result' => false, 'value' => 'lng_label_user_pwd_len_validation');    
            } 
        }
            return array('result' => true, 'value' => '');
    }
	
	public function createUser($_data, $mail_sign=1)
	{		
		$__ret = $this->_is_unique_user($_data['nickname'], $_data['email']);
		
		if(!$__ret){$ret = ERR29;}

		if(!$ret){
			$inserted_users_ID = $this->_insert_data($_data);
		}
		
		return $this->lang->getMessage($ret);
	}

    /**
     * Try login.
     *
     * @access public
     * @input:  $_POST(user_login), $_POST(user_password)
     * @output: string or empty
     */
    function login()
    {
        $login    = SHIN_Core::$_input->get_post('user_login');
        $password = SHIN_Core::$_input->get_post('user_password');
		
        if(!$login || !$password) {
			redirect(base_url().'/start', 'refresh');
        }


        $this->login = $login;
		$query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->query(
										'SELECT * 
                                         FROM '.$this->table_name.
										' WHERE username = '.SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->escape($login).
										' OR email = '.SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->escape($login)
										);
        
		$row = $query->row();
        $ret = 'lng_label_zero_string';
		if($row){
			if(md5($password) == $row->pwd) {
            	$this->_mapper($row);
			} else {
				$ret = 'lng_label_incorrect_password';
            }
		} else {
			$ret = 'lng_label_user_not_found';
		}
		
		// Additional check for new statuses of user 
		if($row){
	        switch($row->status){
	         case CT_USER_SUSPENDED:
						$ret = 'lng_label_user_suspended';
	                    break;
	         case CT_USER_WAUTH:
						$ret = 'lng_label_user_wauth';
	                    break;
	         case CT_USER_CLOSED:
						$ret = 'lng_label_user_closed';
	                    break;
    	    }
		}        
		////////////////////////////////////////////
		$query->free_result();
		
        return $ret;
    }

	
	function _delete_data($data){
		SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->delete($this->table_name, array('id' => $data['id'])); 
	}
	
	function _insert_data($data){
		SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert($this->table_name, $data);
		return SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert_id();
	}

	function _update_data($data){
		SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('id', $data['id']);
		SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->update($this->table_name, $data); 	
	}
    
    /**
    * get sys user list
    * 
    * @access public
    * @param null
    * @return array
    * 
    */
    function getSysUserList() {
        
                      SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from($this->table_name);
        $query      = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
        
        $rolesList  = SHIN_Core::$_models['sys_userrole_model']->getRolesListForDD();
        $userList   = $query->result_array();
        
        foreach($userList as &$user) {
            $currentRole = array();
            for($i=1; $i<=10; $i++) {
                if(array_key_exists($user['role_' . $i], $rolesList)) {
                    $currentRole[]  =   $rolesList[$user['role_' . $i]]; 
                }        
            }
            $user['role']   =   implode(',', $currentRole);
        }
        
        return $userList;
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
		$h          = parent::write_form($fields_to_write, $mode);
		if(!isset(SHIN_Core::$_models['sys_userrole_model']))
		{
	        $nedded_libs = array('models' => array(array('sys_userrole_model', 'sys_userrole_model')));
    	    SHIN_Core::postInit($nedded_libs);
		}

        $rolesList  = SHIN_Core::$_models['sys_userrole_model']->getRolesListForDD();   
        
        for($i=1; $i<=10; $i++) {
            $currentRole    =   $h[$this->table_name . '_role_' . $i];
            $currentRoleId  =   $this->table_name . '_role_' . $i;
            
            $h[$this->table_name . '_role_' . $i. '_input'] =   '<select name="' . $currentRoleId . '" id="' . $currentRoleId . '"><option value=""></option>';
                foreach($rolesList as $key => $value) {
                    if($key ==  $currentRole) {
                        $h[$this->table_name . '_role_' . $i. '_input'] .= '<option value="' . $key . '" selected="selected">' . $key . '-' . $value . '</option>';    
                    } else {
                        $h[$this->table_name . '_role_' . $i. '_input'] .= '<option value="' . $key . '">' . $key . '-' . $value . '</option>';    
                    }
                }
            $h[$this->table_name . '_role_' . $i. '_input'].=   '</select>'; 
            
        }
        
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
        
        // save password in md5
        if($this->isDefinite()) {
            if(!empty($this->pwd)) {
                $this->pwd  =   md5($this->pwd);
                $fields_to_save = array('lang', 'status', 'name', 'role_1', 'role_2', 'role_3', 'role_4', 'role_5', 'role_6', 'role_7', 'role_8', 'role_9', 'role_10', 'lastname', 'email', 'username', 'pwd', 'theme');
            } else {
                // don't save pwd
                $fields_to_save = array('lang', 'status', 'name', 'role_1', 'role_2', 'role_3', 'role_4', 'role_5', 'role_6', 'role_7', 'role_8', 'role_9', 'role_10', 'lastname', 'email', 'username', 'theme');
            }
        } else {
            $this->pwd  =   md5($this->pwd);
        }
        
        $h = parent::save($fields_to_save);
        
        return $h;    
    }
    
    /**
     * Prepare SQL statement and fetch data for Datatables widget.
     *
     * @access public
     * @param:  NULL
     * @return: $ret array with prepared data
     */
    function fetchCorrectPagingData($customization_fields = NULL, $where_condition = NULL,  $return_answer_type = DB_FETCH_ANSWER_TYPE_JSON)
    {
        
        
        
        // init needed libs
        $nedded_libs = array(   
                                'models' => array(array('sys_userrole_model', 'sys_userrole_model'))
                            );

        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
                      SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from($this->table_name);
        $query      = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
        
        $rolesList  = SHIN_Core::$_models['sys_userrole_model']->getRolesListForDD();
        $userList   = $query->result_array();
        $array_data = parent::fetchCorrectPagingData($customization_fields, $where_condition, DB_FETCH_ANSWER_TYPE_ARRAY);
        
        foreach($array_data['data'] as &$data) {
            $currentRole = array();
            for($i=1; $i<=10; $i++) {
                if(array_key_exists(trim($data['role_' . $i],'"'), $rolesList)) {
                    $currentRole[]  =   $rolesList[trim($data['role_' . $i],'"')]; 
                }        
            }
            
            $data['role_1']   =   '"' . implode(',', $currentRole) . '"';
            
            switch(trim($data['status'], '"')) {
                case CT_USER_ACTIVE:
                    $data['status'] = '"' . SHIN_Core::$_language->line('lng_label_lang_user_active') . '"';
                    break;
                case CT_USER_SUSPENDED:
                    $data['status'] = '"' . SHIN_Core::$_language->line('lng_label_lang_user_suspend') . '"';;
                    break;
                case CT_USER_WAUTH:
                    $data['status'] = '"' . SHIN_Core::$_language->line('lng_label_lang_user_wauth') . '"';;
                    break;
                case CT_USER_CLOSED:
                    $data['status'] = '"' . SHIN_Core::$_language->line('lng_label_lang_user_closed') . '"';; 
                    break;
            }    
        }
        
        return $this->packToJSONData($array_data);
    }
	
	
	

} // end of class

/* End of file Holder_model.php */
