<?php
                  
define('CT_SNAPTRACK_USERTYPE_PHOTOGRAPHER', 'rSKup');
define('CT_SNAPTRACK_USERTYPE_ADMIN', 'rSKad');
define('CT_SNAPTRACK_USERTYPE_VIEWER', 'rSKvw');


define('CT_SNAPTRACK_WATERMARK_SYSTEM', 's');
define('CT_SNAPTRACK_WATERMARK_CUSTOM', 'c');
define('CT_SNAPTRACK_WATERMARK_OFF', 'o');

#define('CT_SNAPTRACK_WATERMARK_STATUS_ENABLE', '1');
#define('CT_SNAPTRACK_WATERMARK_STATUS_DISABLE', '0');


define('CT_SNAPTRACK_PHOTOACTION_SELL', 'sell');
define('CT_SNAPTRACK_PHOTOACTION_DOWNLOAD', 'download');
                
class Trk_User_model extends SHIN_Model {

    /**
     * Physical tablename.
     */
    var $table_name = 'trk_user';
    
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
            'table'     => 'sys_user',
            'column'    => 'lang',
            'virtual'    => TRUE,
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
		
        $this->insert_field(array(
            "column"    => "host",
            'table'     => 'sys_user',
            'virtual'   => TRUE,
        ));
		
        $this->insert_field(array(
            "column"    => "host",
            'table'     => 'sys_user',
            'virtual'   => TRUE,
        ));

        $this->insert_field(array(
            "column"    => "updated",
            'table'     => 'sys_user',
            'virtual'   => TRUE,
        ));
		
        $this->insert_field(array(
            "column"    => "added",
            'table'     => 'sys_user',
            'virtual'   => TRUE,
        ));

        $this->insert_field(array(
            "column"    => "lastlogin",
            'table'     => 'sys_user',
            'virtual'   => TRUE,
        ));
		
        /*
        $this->insert_field(array(
            "column"    => "usertype",
            "type"       => "enum",
            "values"     => array(
                CT_SNAPTRACK_USERTYPE_ADMIN		=> "lng_label_snaptrack_usertype_admin",
                CT_SNAPTRACK_USERTYPE_USER		=> "lng_label_snaptrack_usertype_user",
                CT_SNAPTRACK_USERTYPE_VIEWER	=> "lng_label_snaptrack_usertype_viewer",
            ),
            "value"  => 'u',
            "null"   => 0,
            'title'  => 'lng_label_snaptrack_usertype'
        ));
        */

        $this->insert_field(array(
            "column"    => "photoaction",
            "type"   => "enum",
            "values" => array(
                CT_SNAPTRACK_PHOTOACTION_SELL		=> "lng_label_snaptrack_photosell",
                CT_SNAPTRACK_PHOTOACTION_DOWNLOAD	=> "lng_label_snaptrack_photodownload",
            ),
            "value"  => CT_SNAPTRACK_PHOTOACTION_DOWNLOAD,
            "null"   => 0,
            'title'  => 'lng_label_snaptrack_photo'
        ));

        $this->insert_field(array(
            "column"    => "watermarkusage",
            "type"   => "enum",
            "values" => array(
                CT_SNAPTRACK_WATERMARK_SYSTEM	=> "lng_label_snaptrack_watermarkusage_system",
                CT_SNAPTRACK_WATERMARK_CUSTOM	=> "lng_label_snaptrack_watermarkusage_custom",
                CT_SNAPTRACK_WATERMARK_OFF		=> "lng_label_snaptrack_watermarkusage_off",
            ),
            "value"  => CT_SNAPTRACK_WATERMARK_SYSTEM,
            "null"   => 0,
            'title'  => 'lng_label_snaptrack_watermarkusage'
        ));

        $this->insert_field(array(
            'column'            => 'wtm_file_name',
            'type'              => 'varchar',
            'width'             => CT_VARCHAR_255,
            'title'             => '',
            'null'              => 1,
            'info_field_txt'    => null,
            'info_field_ico'    => null,
            'virtual'           => true,
        ));

        /*
        $this->insert_field(array(
            'column' => 'watermark_status',
            "type"   => "enum",
            "values" => array(
                CT_SNAPTRACK_WATERMARK_STATUS_ENABLE    => "lng_label_snaptrack_watermark_enabled",
                CT_SNAPTRACK_WATERMARK_STATUS_DISABLE    => "lng_label_snaptrack_watermark_disabled",
            ),
            "value"  => '0',
            "null"   => 0,
            'title'  => 'lng_label_snaptrack_watermarkusage'
        ));
        */
        
        $this->insert_field(array(
            'column'            => 'watermark_position',
            'type'              => 'enum',
            "values" => array(
                '1'    => "lng_label_prifle_watermark_position_t_l",
                '2'    => "lng_label_prifle_watermark_position_t_c",
                '3'    => "lng_label_prifle_watermark_position_t_r",
                '4'    => "lng_label_prifle_watermark_position_c_l",
                '5'    => "lng_label_prifle_watermark_position_c_c",
                '6'    => "lng_label_prifle_watermark_position_c_r",
                '7'    => "lng_label_prifle_watermark_position_b_l",
                '8'    => "lng_label_prifle_watermark_position_b_c",
                '9'    => "lng_label_prifle_watermark_position_b_r",
            ),
            "value"             => '9',
            'title'             => '',
            'null'              => 1,
            'info_field_txt'    => null,
            'info_field_ico'    => null,
        ));
		
    } // end of function
		
	function customPwdCheck($data){
		return array('result' => true, 'value' => '');
	}
	
    /**
    * Update Snaptrack User logic.
    *
    * @access public
    * @param $data array with needed data for updating
    * @return $ret bool
    */
    public function updateSnaptrackUser($data, $id = null){
        
        if(is_null($id)) {
            $id = SHIN_Core::$_user->idUser;
        }

		SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('userId', $id);    
        $result = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->update($this->table_name, $data);
        
        return $result;    
    }
    
    /**
    * Update Sys User logic.
    *
    * @access public
    * @param $data array with needed data for updating
    * @return $ret bool
    */
    public function updateUser($data, $id = null) {
        
        if(is_null($id)) {
            $id =   SHIN_Core::$_user->idUser;
        }
                  SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idUser', $id);    
        $result = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->update('sys_user', $data);
        
        return $result;    
    } 
    
    /**
    * Update User logic.
    *
    * @access public
    * @param $input_data array with needed data for updating
    * @return $ret bool
    */
    /*
    public function updateUser($input_data)
    {
        $update_arr = array();
        
        if($input_data['uid']){
            $__id = $input_data['uid'];
        } else {
            $__id = SHIN_Core::$_user->id;
        }
        
        $this->fetchByID($__id);
        
        // 1 if it`s needed upload new watermark
        if($input_data['wtm_file'])
        {
            $__destination = SHIN_Core::$_config['core']['base_path'].DIRECTORY_SEPARATOR.SHIN_Core::$_config['gallery']['photo_storer_folder'].SHIN_Core::$_user->nickname.DIRECTORY_SEPARATOR;
            copy($data['tmp_filename'], $__destination.SHIN_Core::$_config['gallery']['prefix_for_watermark'].$input_data['wtm_file']);
            
            $update_arr['wtm_file_name'] = SHIN_Core::$_config['gallery']['prefix_for_watermark'].$input_data['wtm_file'];
        } else {
            $update_arr['wtm_file_name'] = $this->wtm_file_name;
        }
        
        $update_arr['watermarkusage'] = $input_data['watermarkusage'];
        
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->update($this->snaptrack_user, $update_arr);
    }
    */
    /**
    * CreateUser logic.
    *
    * @access public
    * @param $input_data array with needed data
    * @return $ret bool
     */
     /*
    public function createUser($input_data)
    {
        $ret = SHIN_Core::$_language->line('lng_label_empty_str');
        
        // 1. check if user uniq
        $ret = $this->is_unique_user($input_data['nickname'], $input_data['mail']);
        if($ret){return $ret;}
        
        // 2. create phys folder 
        $_target_folder = $config['core']['base_path'].DIRECTORY_SEPARATOR.SHIN_Core::$_config['gallery']['photostorer'].DIRECTORY_SEPARATOR.$input_data['nickname'];
        if(is_file($_target_folder)){
            SHIN_Core::show_error('Nickname '.$input_data['nickname'].' not exits but folder in this name exist. Pls remove this folder from server');
        }
        mkdir($_target_folder);
        
        // 3. create new record in to database.
        // 3.1 insert in to "snaptrack_user"
        $insert_arr = array(
               'usertype'        => $input_data['usertype'],
               'watermarkusage'    => $input_data['watermarkusage'],
            );
        
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert($this->table_name, $insert_arr);
        
        // 3.2 insert in to "sys_user"
        $insert_arr = array(
               'usertype'        => $input_data['usertype'],
               'watermarkusage'    => $input_data['watermarkusage'],
            );
        
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert('sys_user', $insert_arr);
        
        // 4. send confirmation email.
        $to_address = $input_data['to']; //SHIN_Core::$_input->post('to', true);
        $body       = $input_data['body']; // SHIN_Core::$_input->post('body', true);
        $to_name    = $input_data['toname'];
        $subject    = $input_data['subj'];
        
        // initialize component by needed parameters
        SHIN_Core::$_libs['mailer']->AddAddress($to_address, $to_name);
        SHIN_Core::$_libs['mailer']->Subject = $subject;
        SHIN_Core::$_libs['mailer']->MsgHTML($body);                    
        
        // 5. Send mail
        $result = SHIN_Core::$_libs['mailer']->Send();
        
        return $ret;
    }
    */
        
    /**
    * Check in to database if mail is uniq.
    *
    * @access private
    * @param $mail string to check
    * @return $ret bool
     */
    private function _is_unique_user_mail($mail)
    {
        $ret = true;
        $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get_where($this->table_name, array('email'=>$mail));
        $row = $query->row();

        if($row){ $ret = false;}
        $query->free_result();

        return $ret;        
    } // end of function 

    /**
    * Check in to database if nickname is uniq.
    *
    * @access private
    * @param $mail string to check
    * @return $ret bool
     */
    private function _is_unique_user_nick($nick)
    {
        $ret  = true;
        $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get_where($this->table_name, array('nickname'=>$nick));
        $row = $query->row();

        if($row){ $ret = false;}
        $query->free_result();

        return $ret;        
    } // end of function 

    /**
    * Check if users parameters is uniq
    *
    * @access public
    * @param $nick string with nickname information
    * @param $mail string with mail information
    * @return $ret bool 
     */
    function is_unique_user($nick, $mail)
    {
        $ret = false;

        if($this->is_unique_user_nick($nick) && $this->is_unique_user_mail($mail)){ $ret = true; }

        return $ret;
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
		
		// add check for unique email / nickname  /////////////////////////////////////////
		// 1. email
		$query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->query(
										'SELECT * FROM sys_user'.
										' WHERE email = '.SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->escape(SHIN_Core::$_input->post('trk_user_sys_user_email')));
		$row = $query->row();
		if($row){
			if($this->userId != $row->idUser){
				$h['trk_user_sys_user_email'] = 'Not Unique!';
			}
		}
        
        // free result
        $query->free_result(); 
		
		// 2. nickname
		$query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->query(
										'SELECT * FROM sys_user'.
										' WHERE username = '.SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->escape(SHIN_Core::$_input->post('trk_user_sys_user_name')));
        
		$row = $query->row();
		if($row){
			if($this->userId != $row->idUser){
				$h['trk_user_sys_user_username'] = 'Not Unique!';
			}
		}
        
        // free result
        $query->free_result(); 
				
		//////////////////////////////////////////////////////////////////////////////////		
        
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
        // init needed libs
        $nedded_libs = array(   
                                'models' => array(array('sys_userrole_model', 'sys_userrole_model'))
                            );

        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
		if(!SHIN_Core::$_user){die();}
        $h = parent::write_form($fields_to_write, $mode);
        $h['trk_user_wtm_file_img']  = prep_url(SHIN_Core::$_config['core']['app_base_url'] . '/' . SHIN_Core::$_config['gallery']['photo_storer_folder'] . '/' . SHIN_Core::$_user->name . '/') . $h['trk_user_wtm_file_name'];    
        $h          = parent::write_form($fields_to_write, $mode);
		
        $userModelInstance  = SHIN_Core::$_models['trk_user_model']->get_instance();
		$userModelInstance->fetchByID(SHIN_Core::$_input->post('userId'));

		
		$h['trk_user_usertype_input'] = form_dropdown(
															'trk_user_usertype', 
															array('rSKad'=>'Snaptrack Administrator', 'rSKup'=>'Snaptrack Photographer','rSKvw'=>'Snaptrack Viewer'),
															$userModelInstance->sys_user_role_1, 
															'id="trk_user_usertype"'
															);
		
		//foreach($rolesList as $k=>$v){
			//dump($v, $k);
		//}
        
		/*
        for($i=1; $i<=10; $i++) {
            $currentRole    =   $h['snaptrack_user_sys_user_role_' . $i];
            $currentRoleId  =   'snaptrack_user_sys_user_role_' . $i;
            
            $h['snaptrack_user_sys_user_role_' . $i. '_input'] =   '<select name="' . $currentRoleId . '" id="' . $currentRoleId . '"><option value=""></option>';
                foreach($rolesList as $key => $value) {
                    if($key ==  $currentRole) {
                        $h['snaptrack_user_sys_user_role_' . $i. '_input'] .= '<option value="' . $key . '" selected="selected">' . $key . '-' . $value . '</option>';    
                    } else {
                        $h['snaptrack_user_sys_user_role_' . $i. '_input'] .= '<option value="' . $key . '">' . $key . '-' . $value . '</option>';    
                    }
                }
            $h['snaptrack_user_sys_user_role_' . $i. '_input'].=   '</select>'; 
            
        }
		*/
		//dump($h);
        
        return $h;
    } // end of function
    
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
        
        // check for Dmitriy
        // right now connector work with config file well.
        $array_data = parent::fetchCorrectPagingData($customization_fields, $where_condition, DB_FETCH_ANSWER_TYPE_ARRAY);
        $rolesList  = SHIN_Core::$_models['sys_userrole_model']->getRolesListForDD();
        
        foreach($array_data['data'] as &$data) {
            $currentRole = array();
            for($i=1; $i<=10; $i++) {
                if(array_key_exists(trim($data['sys_user_role_' . $i],'"'), $rolesList)) {
                    $currentRole[]  =   $rolesList[trim($data['sys_user_role_' . $i],'"')]; 
                }        
            }
            
            $data['sys_user_role_1']   =   '"' . implode(',', $currentRole) . '"';
            
            switch(trim($data['sys_user_status'], '"')) {
                case CT_USER_ACTIVE:
                    $data['sys_user_status'] = '"' . SHIN_Core::$_language->line('lng_label_lang_user_active') . '"';
                    break;
                case CT_USER_SUSPENDED:
                    $data['sys_user_status'] = '"' . SHIN_Core::$_language->line('lng_label_lang_user_suspend') . '"';;
                    break;
                case CT_USER_WAUTH:
                    $data['sys_user_status'] = '"' . SHIN_Core::$_language->line('lng_label_lang_user_wauth') . '"';;
                    break;
                case CT_USER_CLOSED:
                    $data['sys_user_status'] = '"' . SHIN_Core::$_language->line('lng_label_lang_user_closed') . '"';; 
                    break;
            }
            
            switch(trim($data['watermarkusage'], '"')) {
                case 's':
                    $data['watermarkusage']	=   '"' . SHIN_Core::$_language->line('lng_label_snaptrack_watermarkusage_system') . '"';   
		            $data['wtm_file_name']	=   '"<img src=\'' . prep_url(SHIN_Core::$_config['core']['app_base_url'] . '/' . SHIN_Core::$_config['gallery']['photo_photographer_data'] . '/') . trim($data['wtm_file_name'], '"')   . '\'/>"';
                    break;
                case 'c':
                    $data['watermarkusage'] =   '"' . SHIN_Core::$_language->line('lng_label_snaptrack_watermarkusage_custom') . '"';
		            $data['wtm_file_name'] =   '"<img src=\'' . prep_url(SHIN_Core::$_config['core']['app_base_url'] . '/' . SHIN_Core::$_config['gallery']['photo_photographer_data'] . '/' . trim($data['userId'], '"') . '/') . trim($data['wtm_file_name'], '"')   . '\'/>"';     
                    break;
                case 'o':
                    $data['watermarkusage'] =   '"' . SHIN_Core::$_language->line('lng_label_snaptrack_watermarkusage_off') . '"';
		            $data['wtm_file_name'] =   '"<img src=\'' . prep_url(SHIN_Core::$_config['core']['app_base_url'] . '/' . SHIN_Core::$_config['gallery']['photo_photographer_data'] . '/' . trim($data['userId'], '"') . '/') . trim($data['wtm_file_name'], '"')   . '\'/>"';     
                    break; 
            }            
        }
        
        // costomization logic 

        // end of customization logic 

        return $this->packToJSONData($array_data);
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
    } // end of function
	
	
    /**
	* Call Validation
	*
	* @access public
	* @param $fields needed fields for validation. By default - all with properties [validate].
	* @return $h hash.
	* @sa SHIN_Model::validate_form()
     */
	function save($fields_to_validate = null)
	{
		// there we are need pprocess in hand way 
		// booth of 2 objects 
		
		// check old status ///////////////////////		
		$um = new Trk_User_model();
		$um->fetchByID($this->userId);
		$__old_status	= $um->sys_user_status;
		$__old_pwd		= $um->sys_user_pwd;
		$__old_type		= $um->sys_user_role_1;		
		///////////////////////////////////////////
				
        $is_definite = $this->isDefinite();
		
		$_usertype = param('trk_user_usertype');
		if($_usertype == CT_SNAPTRACK_USERTYPE_PHOTOGRAPHER){
			$__role = 'rSKup';
		} elseif($_usertype == CT_SNAPTRACK_USERTYPE_ADMIN){
			$__role = 'rSKad';
		} elseif($_usertype == CT_SNAPTRACK_USERTYPE_VIEWER){
			$__role = 'rSKvw';
		} else {
			SHIN_Core::show_error('Invalid user type definition.');			
		}
		
		SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->trans_begin();
				
		
		if($is_definite){		
			// update						
			// 1. table sys_user
				$data = array(
					'lang'		=> $this->sys_user_lang,
					'status'	=> $this->sys_user_status,
					'name'		=> $this->sys_user_name,
					'role_1'	=> $__role,
					'lastname'	=> $this->sys_user_lastname,
					'email'		=> $this->sys_user_email,
					'username'	=> $this->sys_user_username,
					'pwd'		=> md5($this->sys_user_pwd),
                    'theme'     => 'snaptrack',
					'updated'	=> date('Y-m-d H:i:s'),
				);				
				
			if($this->sys_user_pwd == CT_EMPTY_STR){
				unset($data['pwd']);
			}

			SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idUser', $this->userId);
			SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->update('sys_user', $data);
			
			// 1.1  send mail if user status was changed 
			if($__old_status != $this->sys_user_status || $this->sys_user_pwd || $__old_type != $__role)
			{
                $body   = 'Administrator was changed your personal data: <br /><br />';
				$body  .= 'Current status: '.$this->sys_user_status.', Current pssworrd: '.$this->sys_user_pwd.', Current account type: '.$__role;
                SHIN_Core::$_libs['mailer']->AddAddress($this->sys_user_email, 'Photographer');
                SHIN_Core::$_libs['mailer']->Subject = 'Your account info was changed by Administrator';
                SHIN_Core::$_libs['mailer']->MsgHTML($body);                    
                
                $result = SHIN_Core::$_libs['mailer']->Send();
			}
			//////////////////////////////////////////////////////////////
			
			// 2. table trk_user
			$_wtm_file = '';
			if($this->watermarkusage == CT_SNAPTRACK_WATERMARK_SYSTEM){
				// SYSTEM
				$_wtm_file = SHIN_Core::$_config['gallery']['system_watermark'];
			} elseif($this->watermarkusage == CT_SNAPTRACK_WATERMARK_CUSTOM){
				// CUSTOM
				$_wtm_file = $this->wtm_file_name;
			} else {
				// OFF
				$_wtm_file = NULL;
			}
			
			$data = array(
				'watermarkusage'		=> $this->watermarkusage,
//				'watermark_status'		=> $this->watermark_status,
				'watermark_position'	=> $this->watermark_position,
				'wtm_file_name'			=> $_wtm_file,
			);
			
			if($this->watermarkusage == CT_SNAPTRACK_WATERMARK_CUSTOM && $_wtm_file == CT_EMPTY_STR){
				unset($data['wtm_file_name']);
			} 
			
			SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('userId', $this->userId);
			SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->update($this->table_name, $data);
			
		} else {
			// insert
			
			// 1. table sys_user
				$data = array(
					'lang'		=> $this->sys_user_lang,
					'status'	=> $this->sys_user_status,
					'name'		=> $this->sys_user_name,
					'role_1'	=> $__role,
					'lastname'	=> $this->sys_user_lastname,
					'email'		=> $this->sys_user_email,
					'username'	=> $this->sys_user_username,
					'pwd'		=> md5($this->sys_user_pwd),
					'theme'		=> 'snaptrack',
					'added'		=> date('Y-m-d H:i:s'),
				);

			SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert('sys_user', $data);
			$__ID = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert_id();
						
			// 2. table trk_user
			$_wtm_file = '';
			if($this->watermarkusage == CT_SNAPTRACK_WATERMARK_SYSTEM){
				// SYSTEM
				$_wtm_file = SHIN_Core::$_config['gallery']['system_watermark'];
			} elseif($this->watermarkusage == CT_SNAPTRACK_WATERMARK_CUSTOM){
				// CUSTOM
				$_wtm_file = $this->wtm_file_name;
			} else {
				// OFF
				$_wtm_file = NULL;
			}
				
			$data = array(
				'userId'				=> $__ID,
				'watermarkusage'		=> $this->watermarkusage,
//				'watermark_status'		=> $this->watermark_status,
				'watermark_position'	=> $this->watermark_position,
				'wtm_file_name'			=> $_wtm_file,
			);

			SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert($this->table_name, $data);
			
			// after all db actions need add phys folder for this user, upload watermark (if it`s needed)
			// folder name for new user this is SHIN_Core::$_config['gallery']['photo_storer_folder'].DIRECTORY_SEPARATOR.$__USER_ID
			
			$user_folder_name  = SHIN_Core::$_config['gallery']['photo_storer_folder'].DIRECTORY_SEPARATOR.$__ID;
			$user_folder_name2 = SHIN_Core::$_config['gallery']['photo_photographer_data'].DIRECTORY_SEPARATOR.$__ID;
			
			if(is_dir($user_folder_name)){
					SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->_trans_status = FALSE;
					SHIN_Core::log('error', 'Private folder 1 for user can`t create. Transaction was rollback');
			} else {			
				if(!mkdir($user_folder_name)){
					SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->_trans_status = FALSE;
					SHIN_Core::log('error', 'Private folder 1 for user can`t create. Transaction was rollback');
				}
			}
			
			if(is_dir($user_folder_name2)){
					SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->_trans_status = FALSE;
					SHIN_Core::log('error', 'Private folder 1 for user can`t create. Transaction was rollback');
			} else {
			
				if(!mkdir($user_folder_name2)){
					SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->_trans_status = FALSE;
					SHIN_Core::log('error', 'Private folder 2 for user can`t create. Transaction was rollback');
				}
			}
			
			
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
	
    
    
    /**
    * get user data
    * 
    * @access public
    * @return array
    * @paramnull
    * 
    */
    function getUserData(){
        
        $query = $this->get_expanded_result(array("where" => 'userId = ' . SHIN_Core::$_user->idUser));
    
        $row   = $query->row(0, 'array');
		
        if($row['watermarkusage'] == CT_SNAPTRACK_WATERMARK_SYSTEM){
	        if(!empty($row['wtm_file_name'])) {
				$row['wtm_file_name'] = SHIN_Core::$_config['core']['app_base_url'] . '/' . SHIN_Core::$_config['gallery']['photo_photographer_data'] . '/' . SHIN_Core::$_config['gallery']['system_watermark'];
	        } else {
				$row['wtm_file_name'] = SHIN_Core::$_config['core']['app_base_url'] . '/' . SHIN_Core::$_config['gallery']['photo_photographer_data'] . '/' . SHIN_Core::$_config['gallery']['system_watermark'];
			}
        } elseif($row['watermarkusage'] == CT_SNAPTRACK_WATERMARK_CUSTOM){
	        if(!empty($row['wtm_file_name'])) {
	            $row['file_name']     = $row['wtm_file_name']; 
	            $row['wtm_file_name'] = SHIN_Core::$_config['core']['app_base_url'] . '/' . SHIN_Core::$_config['gallery']['photo_photographer_data'] . '/' . SHIN_Core::$_user->idUser . '/' . $row['wtm_file_name']; 
	        } else {
				$row['wtm_file_name'] = SHIN_Core::$_config['core']['app_base_url'] . '/' . SHIN_Core::$_config['gallery']['photo_photographer_data'] . '/' . SHIN_Core::$_config['gallery']['system_watermark'];
			}
        } else {
			$row['wtm_file_name'] = SHIN_Core::$_config['core']['app_base_url'] . '/' . SHIN_Core::$_config['gallery']['photo_photographer_data'] . '/' . SHIN_Core::$_config['gallery']['system_watermark'];
		}
        
        return $row;    
    }
    
    /**
    * get snaptrak user list
    * 
    * @access public
    * @return mixed array
    * @param null
    * 
    */
    function getUserList(){
    
        $query = $this->get_expanded_result();
    
        return $query->result_array();    
            
    }
    
    /**
    * transform wt position from ENUM to String
    * 
    * @access public
    * @return array
    * @param null 
    * 
    */
    function getWtPosition(){
        
        $userData   =   $this->getUserData();
        
        switch($userData['watermark_position']) {
            case 1: 
                $position = array('left', 'top');
                break;
            case 2:
                $position = array('center', 'top');
                break;
            case 3:
                $position = array('right', 'top');
                break;
            case 4:
                $position = array('left', 'center');
                break;
            case 5:
                $position = array('center', 'center');
                break;
            case 6:
                $position = array('right', 'center');
                break;
            case 7:
                $position = array('left', 'bottom');
                break;
            case 8:
                $position = array('center', 'bottom');
                break;
            case 9:
                $position = array('right', 'bottom');
                break;
            default:
                $position = array(SHIN_Core::$_config['gallery']['system_watermark_left'], SHIN_Core::$_config['gallery']['system_watermark_top']);
        }
        
        return $position;
    }
    
    /**
    * delete record from both sys_user and trk_user tables
    * 
    * @param array $where
    * @access public
    * @return boolean
    */
    public function delete($where){
        
        // 1. delete from trk_user table
        $result = SHIN_Core::$_models['trk_user_model']->deleteRec($where);
        
        // 2. delete from sys_user table
        $result = $result && SHIN_Core::$_models['sys_user_model']->deleteRec(array('idUser' => $where[SHIN_Core::$_models['trk_user_model']->primary_key]));
    
        return $result;
    } 

} // end of class

/* End of file Snaptrack_User_model.php */
