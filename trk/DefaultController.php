<?php	

/**
 * trk/app/DefaultController.php
 *
 * Realise front-end logic. 
 *
 */

require "CommonController.php";

class DefaultController extends CommonController {
    
    /**
    * Constructor
    * 
    * @access public
    * @param null
    * @return null
    */
    function __construct()
	{   
        parent::__construct();
		
		if(!SHIN_Core::$_current_lang)
		{
			$_current_language = '';
			if(SHIN_Core::$_libs['session']->userdata('language')){
				$_current_language = SHIN_Core::$_libs['session']->userdata('language');
			} 
			
			if($_current_language == '') {$_current_language = SHIN_Core::$_config['lang']['language'];}
			////////////////////////////////////////////////////////////////////

			SHIN_Core::$_language->load('app', $_current_language);
			SHIN_Core::$_current_lang = $_current_language;
			SHIN_Core::log('debug', '[LANGUAGE] Current language: '.SHIN_Core::$_current_lang);
		}

		if(SHIN_Core::$_libs['session']->userdata('loginErrorMessage')){
			SHIN_Core::$_libs['templater']->assign('login_errors', SHIN_Core::$_libs['session']->userdata('loginErrorMessage'));			
			SHIN_Core::$_libs['session']->unset_userdata('loginErrorMessage');
		}
		
		$this->_getRandomPhoto();
    } // end of function
    
    /**
    * Main page
    * 
    * @access public
    * @param null
    * @return string template name
    * 
    */
    public function index()
    {
        // init search form
        $this->_initSearchForm();		
		$this->_printTopBlock();        		
		
        return 'web/index.tpl';
    }// end of function
	
    /**
    * Print page for registration
    * 
    * @access public
    * @param null
    * @return string template name
    * 
    */
	function joinUs(){
	    
		$this->_printTopBlock();        
        $this->_initSearchForm();
        
        return 'web/common/joinus.tpl';
	}
	
    /**
    * Try to registration. 
    * 
    * @access public
    * @param null
    * @return ok- template or error(refill)-if find some problem
    * 
    */
	function tryJoin()
	{		
		$this->_printTopBlock();        
        $this->_initSearchForm();

		$after_url		= NULL;
		$after_mesage	= NULL;
		
		$_tmp_arr = $this->_validate_user();
		
		$after_url = $_tmp_arr['url'];
		$after_mesage = $_tmp_arr['mess'];
		
		SHIN_Core::$_libs['templater']->assign('mess', $after_mesage);
		
        return 'web/common/'.$after_url;
	}
	
    /**
    * Main page
    * 
    * @access public
    * @param null
    * @return string template name
    * 
    */
	function _validate_user()
	{
		$errors	= array();
		$ret	= array();
		$data	= array();
		
        $nedded_libs = array('libs'=> array('SHIN_Mailer'),'models'   => array(array('trk_user_model', 'trk_user_model')));
        SHIN_Core::postInit($nedded_libs);
		
		// 1. user type 
		if(SHIN_Core::$_input->post('user-type')){
			if(SHIN_Core::$_input->post('user-type') == 'p'){
				$data['role_1'] = CT_SNAPTRACK_USERTYPE_PHOTOGRAPHER;
			} elseif(SHIN_Core::$_input->post('user-type') == 'v'){
				$data['role_1'] = CT_SNAPTRACK_USERTYPE_VIEWER;
			} else {
				$errors['usertype_err_mess'] = SHIN_Core::$_language->line('lng_label_validation_usertype_error');
			}
		} else {
			$errors['usertype_err_mess'] = SHIN_Core::$_language->line('lng_label_validation_usertype_error');
		}
		
		// 2. user-nicknamenickname
		// TODO add logic "per applications" after talk with Stefano !!!!!!
		if(SHIN_Core::$_input->post('user-nicknamenickname')){
			$uniq = TRUE;
			$query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get_where('sys_user', array('username' => SHIN_Core::$_input->post('user-nicknamenickname')));
			foreach ($query->result_array() as $row)
			{
				$uniq = FALSE;
			}
			$query->free_result();
			
			if(!$uniq){
				$errors['usernickname_err_mess'] = SHIN_Core::$_language->line('lng_label_validation_usernickname_error');
			} else {
				$data['username'] = SHIN_Core::$_input->post('user-nicknamenickname');
			}
			
		} else {
			$errors['usernickname_err_mess'] = SHIN_Core::$_language->line('lng_label_validation_usernickname_error');
		}
		
		// 3. password
		if(SHIN_Core::$_input->post('user-pwd') && SHIN_Core::$_input->post('confirm-pwd')){
			//dump(SHIN_Core::$_input->post('user-pwd'));
			if(SHIN_Core::$_input->post('user-pwd') != CT_EMPTY_STR){
				if(SHIN_Core::$_input->post('user-pwd') == SHIN_Core::$_input->post('confirm-pwd')){
					$data['pwd'] = md5(SHIN_Core::$_input->post('user-pwd'));
				} else {
					$errors['userpass_err_mess'] = SHIN_Core::$_language->line('lng_label_validation_userpass_error');
				}
			} else {
				$errors['userpass_err_mess'] = SHIN_Core::$_language->line('lng_label_validation_userpassempty_error');
			}
		} else {
			$errors['userpass_err_mess'] = SHIN_Core::$_language->line('lng_label_validation_userpassempty_error');
		}
		
		// 4. firstname, lastname
		$r = shin_validate_string(SHIN_Core::$_input->post('user-firstname'));
		if($r['result']){
			$data['name'] = SHIN_Core::$_input->post('user-firstname');
		} else {
			$errors['username_err_mess'] = SHIN_Core::$_language->line('lng_label_validation_name_error');
		}
				
		$r = shin_validate_string(SHIN_Core::$_input->post('user-surname'));
		if($r['result']){
			$data['lastname'] = SHIN_Core::$_input->post('user-surname');
		} else {
			$errors['userlastname_err_mess'] = SHIN_Core::$_language->line('lng_label_validation_lastname_error');
		}
		
		// 5. email
		if(SHIN_Core::$_input->post('email'))
		{
			$uniq = TRUE;
			$query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get_where('sys_user', array('email' => SHIN_Core::$_input->post('email')));
			foreach ($query->result_array() as $row)
			{
				$uniq = FALSE;
			}
			$query->free_result();
			
			if(!$uniq){
				$errors['useremail_err_mess'] = SHIN_Core::$_language->line('lng_label_validation_useremail_error');
			} else {
				$r = validate_email(SHIN_Core::$_input->post('email'));
				if($r['result']){
					$data['email'] = SHIN_Core::$_input->post('email');
				} else {
					$errors['useremail_err_mess'] = SHIN_Core::$_language->line('lng_label_validation_email_error');
				}
			}
			
		} else {
			$errors['useremail_err_mess'] = SHIN_Core::$_language->line('lng_label_validation_useremailzerro_error');
		}
        
        // 6. privacy & EULA
        if(!SHIN_Core::$_input->post('accept-eula')) {
            $errors['eula_err_mess']      =   SHIN_Core::$_language->line('lng_label_eula_error');  
        }
        
        if(!SHIN_Core::$_input->post('accept-privacy')) {
            $errors['privacy_err_mess']   =   SHIN_Core::$_language->line('lng_label_accept_privacy_error');
        }

		if($errors){
			
            SHIN_Core::$_libs['templater']->assign('user_nickname', SHIN_Core::$_input->post('user-nicknamenickname'));
			SHIN_Core::$_libs['templater']->assign('user_firstname', SHIN_Core::$_input->post('user-firstname'));
			SHIN_Core::$_libs['templater']->assign('user_lastname', SHIN_Core::$_input->post('user-surname'));
            SHIN_Core::$_libs['templater']->assign('user_email', SHIN_Core::$_input->post('email'));
            SHIN_Core::$_libs['templater']->assign('user_eula', SHIN_Core::$_input->post('accept-eula'));
			SHIN_Core::$_libs['templater']->assign('user_privacy', SHIN_Core::$_input->post('accept-privacy'));
			
			SHIN_Core::$_libs['templater']->assign('user_firstname', SHIN_Core::$_input->post('user-firstname'));
			SHIN_Core::$_libs['templater']->assign('user_lastname', SHIN_Core::$_input->post('user-surname'));
			
			foreach($errors as $k=>$v){
				SHIN_Core::$_libs['templater']->assign($k, $v);
			}
			$ret['url']  = 'joinus';
			$ret['mess']  = '';
		} else{

			SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->trans_begin();
		
			// insert in to sysuser
			$data['lang']		= SHIN_Core::$_config['lang']['language'];
			$data['status']		= CT_USER_WAUTH;
			$data['theme']		= SHIN_Core::$_config['theme']['default_theme'];
			
			SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert('sys_user', $data);
			$__ID = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert_id();
				
			// insert in to trk_user
			$data_2 = array(
				'userId'				=> $__ID,
				'watermarkusage'		=> CT_SNAPTRACK_WATERMARK_SYSTEM,
//				'watermark_status'		=> CT_SNAPTRACK_WATERMARK_STATUS_DISABLE,
				'watermark_position'	=> 9,
				'wtm_file_name'			=> NULL,
			);

			SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert('trk_user', $data_2);
			
			$user_folder_name  = SHIN_Core::$_config['gallery']['photo_storer_folder'].DIRECTORY_SEPARATOR.$__ID;
			$user_folder_name2 = SHIN_Core::$_config['gallery']['photo_photographer_data'].DIRECTORY_SEPARATOR.$__ID;
			
			
			if(is_dir($user_folder_name)){
				$ret['url']  = 'joinus';
				$ret['mess'] = 'General error with adding user logic';
			} else {
				if(!mkdir($user_folder_name)){
					SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->_trans_status = FALSE;
					SHIN_Core::log('error', 'Private folder 1 for user can`t create. Transaction was rollback');
				}
				if(!mkdir($user_folder_name2)){
					SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->_trans_status = FALSE;
					SHIN_Core::log('error', 'Private folder 2 for user can`t create. Transaction was rollback');
				}
				
				if (SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->trans_status() === FALSE)
				{
					SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->trans_rollback();
					$ret['mess'] = 'General error with adding user logic';
					$ret['url']  = 'successjoin';
				} else {
					SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->trans_commit();
					$ret['mess'] = 'Check your email for next step';
					$ret['url']  = 'successjoin';
					
					// send mail new user
					SHIN_Core::$_libs['mailer']->AddAddress(SHIN_Core::$_input->post('email'), 'New user');
					SHIN_Core::$_libs['mailer']->Subject = SHIN_Core::$_language->line('lng_label_wauth');
					$login	= SHIN_Core::$_input->post('user-nicknamenickname');
					$mail	= SHIN_Core::$_input->post('email');
					$pass	= SHIN_Core::$_input->post('user-pwd');
					SHIN_Core::$_libs['mailer']->MsgHTML(SHIN_Core::$_language->line('lng_label_bodyof_register_mail'). '<br/>Login='.$login.' OR '.$mail.' Password='.$pass);
					
					$result = SHIN_Core::$_libs['mailer']->Send();
					
					// send mail about new user for each admin
					$query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get_where('sys_user', array('role_1'=>CT_SNAPTRACK_USERTYPE_ADMIN));
					foreach ($query->result_array() as $row)
					{
						SHIN_Core::$_libs['mailer']->AddAddress($row['email'], 'For '.$row['name'].' '.$row['lastname']);
						SHIN_Core::$_libs['mailer']->Subject = SHIN_Core::$_language->line('lng_label_new_user_appear');
						
						$str1 = '';
						foreach($data as $k=>$v){$str1 .= " {$k}={$v} <br/>";}
						foreach($data_2 as $k=>$v){$str1 .= " {$k}={$v} <br/>";}
						$str1 .= '<br/>';
						
						SHIN_Core::$_libs['mailer']->MsgHTML('Data about new user'.$str1);
						
						$result = SHIN_Core::$_libs['mailer']->Send();
						
						SHIN_Core::$_libs['mailer']->ClearAllRecipients();
					}
					
					$query->free_result();
				}
			}
		}
		
		return $ret;
	} // end of function 
	
	
    /**
    * Just show page with success join result.
    * 
    * @access public
    * @param null
    * @return string template name
    */
	function successJoin()
	{
		$this->_printTopBlock();        
        $this->_initSearchForm();
		
        return 'web/common/successjoin.tpl';
	}

    /**
    * Main page
    * 
    * @access public
    * @param null
    * @return string template name
    * 
    */
	function forgotPasswordOk()
	{
		$this->_printTopBlock();        
        $this->_initSearchForm();

        $neededLibs = array(
                            'libs' => array(
                                'SHIN_Message',
                                'SHIN_Session'
                            ),
                          );
        SHIN_Core::postInit($neededLibs);
        
		SHIN_Core::$_libs['templater']->assign('error_msg', SHIN_Core::$_libs['session']->userdata('forgotErrorMessage'));
        SHIN_Core::$_libs['session']->unset_userdata('forgotErrorMessage');
				
        return 'web/common/forgotpassok.tpl';
	}
	
    /**
    * Main page
    * 
    * @access public
    * @param null
    * @return string template name
    * 
    */
	function forgotPassword()
	{
		$this->_printTopBlock();        
        $this->_initSearchForm();

        $neededLibs = array(
                            'libs' => array(
                                'SHIN_Message',
                                'SHIN_Session'
                            ),
                          );
        SHIN_Core::postInit($neededLibs);
        
		SHIN_Core::$_libs['templater']->assign('error_msg', SHIN_Core::$_libs['session']->userdata('forgotErrorMessage'));
        SHIN_Core::$_libs['session']->unset_userdata('forgotErrorMessage');
				
        return 'web/common/forgotpass.tpl';
	}
	
	
    /**
    * Main page
    * 
    * @access public
    * @param null
    * @return string template name
    * 
    */
	function forgotPasswordErr()
	{
		$this->_printTopBlock();        
        $this->_initSearchForm();

        $neededLibs = array(
                            'libs' => array(
                                'SHIN_Message',
                                'SHIN_Session'
                            ),
                          );
        SHIN_Core::postInit($neededLibs);
        
		SHIN_Core::$_libs['templater']->assign('error_msg', SHIN_Core::$_libs['session']->userdata('forgotErrorMessage'));
        SHIN_Core::$_libs['session']->unset_userdata('forgotErrorMessage');
				
        return 'web/common/forgotpasserr.tpl';
	}
	
	
    /**
    * Try to restore password. 
    * 
    * @access public
    * @param null
    * @return ok- send a email for customer with new password
    * 
    */
	function tryRestorePass()
	{
		$val = SHIN_Core::$_input->post('forgot-input');
		
		if($val != CT_EMPTY_STR)
		{		
			$pos = strpos($val, '@');		
			$__ID = NULL;
			if ($pos === false) {
				// nickname alorithm 
				
				$query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get_where('sys_user', array('username' => $val));				
				foreach ($query->result_array() as $row)
				{
					
					// fetch user roles .....
					//dump(SHIN_Core::$_libs['auth']);
					//SHIN_Core::$_libs['acl']->getUserRolesByID($row['idUser']);
					//dump($row);
					
					
					$__ID					= $row['idUser'];
					$data_sys_user_email	= $row['email'];
					$data_sys_user_username	= $row['name'].' '. $row['lastname'];					
				}
				$query->free_result();				
				
			} else {
				// email alorithm 
				$query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get_where('sys_user', array('email' => $val));
				foreach ($query->result_array() as $row)
				{
					$__ID = $row['idUser'];
					$data_sys_user_email	= $row['email'];
					$data_sys_user_username	= $row['name'].' '. $row['lastname'];					
				}
				$query->free_result();				
			}
			
			// update record
			if($__ID){
				$__new_password = random_string('alnum', 10);
				SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idUser', $__ID);
				SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->update('sys_user', array('pwd' => md5($__new_password))); 
				
				// send email for user with new password
				$nedded_libs = array('libs' => array('SHIN_Mailer'));
				SHIN_Core::postInit($nedded_libs);
				
				SHIN_Core::$_libs['mailer']->AddAddress($data_sys_user_email, $data_sys_user_username);
				SHIN_Core::$_libs['mailer']->Subject = SHIN_Core::$_language->line('lng_label_prifle_confirm_new_email');
				SHIN_Core::$_libs['mailer']->MsgHTML('New password for access to the Snaptrack site is:'.$__new_password);
				$result = SHIN_Core::$_libs['mailer']->Send();
				
				if($result) {
					SHIN_Core::$_libs['session']->set_userdata('forgotErrorMessage', SHIN_Core::$_language->line('lng_label_restorepass_success'));
					redirect(base_url().'/forgotpassok', 'refresh');
				} else {
					SHIN_Core::$_libs['session']->set_userdata('forgotErrorMessage', SHIN_Core::$_language->line('lng_label_restorepass_message_not_sond'));
					redirect(base_url().'/forgotpasserr', 'refresh');
				}
				
				
			} else {
				// user not found
				SHIN_Core::$_libs['session']->set_userdata('forgotErrorMessage', SHIN_Core::$_language->line('lng_label_restorepass_user_not_found'));
				redirect(base_url().'/forgotpasserr', 'refresh');
			}			
			
		} else {
			SHIN_Core::$_libs['session']->set_userdata('forgotErrorMessage', SHIN_Core::$_language->line('lng_label_restorepass_emty_str'));
			redirect(base_url().'/forgotpasserr', 'refresh');
		}
	}
	
    
    /**
    * Get images for bottom pager
    * 
    * @access public
    * @param null
    * @return 
    * 
    */
    function getImages()
	{	
		$left_direction_name_param = 'left';
		$right_direction_name_param = 'right';
	
        // init needed libs
        $nedded_libs = array(   
                                'models' => array(array('trk_photo_model', 'trk_photo_model'))
                            );		
        
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
	
		$direction	= NULL;
		$firstSetId	= NULL;
		$lastSetId	= NULL;
		
		$sight_of_end_left	= FALSE;
		$sight_of_end_right	= FALSE;
		
		$count_of_photo = SHIN_Core::$_config['gallery']['count_of_picture'];
		
		if(isset(SHIN_Core::$_input->not_touched_params['direction'])){$direction = SHIN_Core::$_input->not_touched_params['direction'];}
		if(isset(SHIN_Core::$_input->not_touched_params['firstId'])){$firstSetId = (int)SHIN_Core::$_input->not_touched_params['firstId'];}
		if(isset(SHIN_Core::$_input->not_touched_params['lastId'])){$lastSetId = (int)SHIN_Core::$_input->not_touched_params['lastId'];}
		
		if($firstSetId==NULL){
			// not all needed parameter exist
			die(1);
		} 
		
		$__where = '1=1 AND ';
		
		// main logic
		if(isset(SHIN_Core::$_libs['session']->userdata['where'])){
			$__where = SHIN_Core::$_libs['session']->userdata['where'];
		} else {
            $__where = substr($__where, 0, -5);
        }
		
		//  1. calculate total count 
		$total_request_record = 0;
		$query = SHIN_Core::$_models['trk_photo_model']->get_expanded_result(array('where' => $__where));
		
		$total_request_record = 0;
		foreach ($query->result() as $row){$total_request_record++;}		
		
        $photoList  = array();  
		$counter = 1;
        foreach ($query->result_array() as $row)
		{
			$row['counter']  = $counter;
			$photoList[$counter] = array($row['idPhoto'] => $row);
			$counter++;
		}
		
		// array is ready 
		$__LENGTH = SHIN_Core::$_config['gallery']['count_of_picture'];
		$__LENGTH_OF_REQ_ARRAY = count($photoList);
		$__OFFSET = NULL;

		//  MAIN SWITCHER //////////////////////////////////////////////////////////////////////////////
		$requested_number = NULL;
		$__FROM_INDEX = 1;
		
		if($direction == $left_direction_name_param)
		{
			foreach($photoList as $iter=>$data){						
				if($data[key($data)]['idPhoto'] == $firstSetId){
					$__FROM_INDEX = $data[key($data)]['counter'];
				}			
			}
			
			$___from = $__FROM_INDEX - $__LENGTH;
			if($___from > 0){
				$__FROM_INDEX = $___from;
			} else {
				$sight_of_end_left	= TRUE;
				$__FROM_INDEX = 0;
			} 
			$__OFFSET = $__LENGTH;
			
			
		} elseif($direction == $right_direction_name_param){
		
			foreach($photoList as $iter=>$data)
			{						
				if($data[key($data)]['idPhoto'] == $lastSetId){
					$__FROM_INDEX = $data[key($data)]['counter'];
				}			
			}
			
			if(isset($photoList[$__FROM_INDEX+$__LENGTH])){
				$__tmp = $photoList[$__FROM_INDEX+$__LENGTH];				
				foreach($__tmp as $iter=>$data)
				{
					$__OFFSET = $data['counter'];
				}
			} else {
				$__tmp = $photoList[count($photoList)];
				foreach($__tmp as $iter=>$data)
				{
					$__OFFSET = $data['counter'];
				}
				$sight_of_end_right	= TRUE;
			}
			
			$__OFFSET = $__OFFSET - $__FROM_INDEX;
				
		} else {
			
			foreach($photoList as $iter=>$data){						
				if($data[key($data)]['idPhoto'] == $firstSetId){
					$__FROM_INDEX = $data[key($data)]['counter'];
				}			
			}
			
			if($lastSetId == 0){
				
				if(isset($photoList[$__FROM_INDEX+$__LENGTH])){
					// если такой элемент есть, то 
					$__tmp = $photoList[$__FROM_INDEX+$__LENGTH];				
					foreach($__tmp as $iter=>$data)
					{
						$__OFFSET = $data['counter'];
					}
					
				} else {
					//если такого элемента нет то  установим на  последний элемент в этом наборе.
					$__tmp = $photoList[count($photoList)];
					foreach($__tmp as $iter=>$data)
					{
						$__OFFSET = $data['counter'];
					}
					$sight_of_end_right	= TRUE;
				}

				$__OFFSET = $__OFFSET - $__FROM_INDEX;
				
			} else {
				
				foreach($photoList as $iter=>$data)
				{
					if($data[key($data)]['idPhoto'] == $lastSetId){
						$__OFFSET = $data[key($data)]['counter'];
					}			
				}
			}
		} // end of "no direction else"
		//  END OF MAIN SWITCHER RELATED BY DIREXTION  ///////////////////////////////////////////////////////
		
		if($__FROM_INDEX <= 1) {$sight_of_end_left	= TRUE;}

		// make output array
		if($__LENGTH_OF_REQ_ARRAY <= $__LENGTH){
			// если выборка меньше чем кол-во кадров на экране то выведем всю выборку
			$output = $photoList;
			$sight_of_end_right	= TRUE;
			$sight_of_end_left	= TRUE;
		} else {
			$output = array_slice_assoc($photoList, $__FROM_INDEX, $__OFFSET+1);
		}
		
        $photoList  = array();  
        foreach ($output as $row)
		{
			$photoList['list'][]  =   array('idPhoto' => $row[key($row)]['idPhoto'], 
                                            'name'    => $row[key($row)]['sysname'], 
                                            'imgSrc'  => SHIN_Core::$_config['core']['app_base_url'] . '/' . SHIN_Core::$_config['gallery']['photo_storer_folder'] . '/' . $row[key($row)]['userId'] . '/' . $row[key($row)]['folder'] . '/' . SHIN_Core::$_config['store']['thumbnails_prefix'] . $row[key($row)]['sysname'],
                                            'title'   => $row[key($row)]['trk_circuits_circuit']);
		}
        
            $photoList['count']   =   isset($photoList['list']) ? count($photoList['list']) : 0;
            $photoList['isRight'] =   $sight_of_end_right;
            $photoList['isLeft']  =   $sight_of_end_left;

		echo json_encode($photoList); exit();
    }
    
    /**
    * run search mechanism
    * 
    * @access public
    * @return rendered template
    * @param null
    * 
    */
    function search()
	{
	
		// add top information
		$this->_printTopBlock();        
        
        // init needed libs
        $nedded_libs = array(
                                'libs'         => array('SHIN_Pagination',
                                                        'SHIN_Session'), 
                                'models'    => array(
                                                        array('trk_photo_model', 'trk_photo_model')
                                                    )
                             );
                             
        SHIN_Core::postInit($nedded_libs);
        
        $defaultGlue    =   ' AND ';
        $allovedGlue    =   array('AND', 'OR');
        $mappedFields   =   array(
								  'country'      =>  'trk_circuits.country',
								  'type'      	 =>  'trk_circuits.circuitType',
								  'circuit'      =>  'circuit',
                                  'raceDay'      =>  'raceday',
                                  'description'  =>  'description',
                                  'licence'      =>  'carLicensePlate',
                                  'car_number'   =>  'carNumber',
                                  'car_pilot'    =>  'carPilot',
                                  'car_brand'    =>  'carBrandName',
                                  'rate'         =>  'rate');
								  
        $searchData         =   SHIN_Core::$_input->globalarr('search');
		
        $sessionSearchData  =   SHIN_Core::$_libs['session']->userdata('search');
		//dump($searchData);
       
        if(empty($searchData)) {
            $searchData = $sessionSearchData;
        }
        
        // 1. save search conditions in session
        SHIN_Core::$_libs['session']->set_userdata(array('search' => $searchData));
		
        // 2. make where condition
        if(!empty($searchData)) {
            $whereCondition =   array();
            foreach($searchData as $key => $value) {
                if(!empty($value) && isset($mappedFields[$key])) {
                    if($key == 'raceDay') {
                        $whereCondition[]    =   'trk_photo.' . $mappedFields[$key] . '=' . '"' . fromDisplayToDb($value) . '"';    
                    } elseif($key == 'rate') {
                        $whereCondition[]    =   '(IF(trk_photo.' . $mappedFields[$key] . '/trk_photo.raters IS NULL, 0, FLOOR(trk_photo.' .  $mappedFields[$key] . '/trk_photo.raters))) =' . '"' . $value . '"';       
                    } else {
						if($key == 'type' || $key == 'country'){
							$whereCondition[]    =   $mappedFields[$key] . '=' . '"' . $value . '"';
						} else {

							if($key == 'licence' || $key == 'car_number' || $key == 'car_pilot' || $key == 'car_brand'){
								$whereCondition[]    =   'trk_photo.' . $mappedFields[$key] . ' LIKE ' . '"%' . $value . '%"';
							} else {
								$whereCondition[]    =   'trk_photo.' . $mappedFields[$key] . '=' . '"' . $value . '"';
							}
						}
                    }
                }
            }
            
            if(!empty($searchData['raceTimeFrom']) && !empty($searchData['raceTimeTo'])) {
                $whereCondition[] = 'trk_photo.racetime >= ' . '"' . $searchData['raceTimeFrom'] . '"' . ' AND trk_photo.racetime <= ' . '"' . $searchData['raceTimeTo'] . '"';     
            } elseif(!empty($searchData['raceTimeFrom']) && empty($searchData['raceTimeTo'])) {
                $whereCondition[] = 'trk_photo.racetime >= ' . '"' . $searchData['raceTimeFrom'] . '"' . ' AND trk_photo.racetime <= ' . '"' . date('H:i:s', strtotime($searchData['raceTimeFrom'] . ' +1 hour')) . '"';     
            } elseif(empty($searchData['raceTimeFrom']) && !empty($searchData['raceTimeTo'])){
                $whereCondition[] = 'trk_photo.racetime <= ' . '"' . $searchData['raceTimeTo'] . '"';     
            }
        }
		
        
        if(!empty($whereCondition)) {
            $whereCondition =   implode($defaultGlue, $whereCondition);
        } else {
            $whereCondition =   '1=1';
        }
        $whereCondition .=   ' AND trk_photo.status="show"';
        
        // 3. apply filter and get all photos 
        $gallery = SHIN_Core::$_models['trk_photo_model']->get_instance();
		
        $gallery->printCollectionObjects($whereCondition);
        
        // 4. save search condition

		
		
		if(SHIN_Core::$_input->globalarr('per_page')){
			$perPage = SHIN_Core::$_input->globalarr('per_page');
		} else {
			$perPage = SHIN_Core::$_libs['pagination']->paginator->per_page;
		}
		
		if(SHIN_Core::$_input->globalarr('cur_page')){
			$curPage = SHIN_Core::$_input->globalarr('cur_page');
		} else {
			$curPage = SHIN_Core::$_libs['pagination']->paginator->cur_page;
		}
		
        if(empty($perPage)) {
            $perPage = 0;
        }
        
        if(empty($curPage)) {
            $curPage = 0; 
        } 
        SHIN_Core::$_libs['session']->set_userdata(array('where'    => $whereCondition, 'per_page' => $perPage, 'cur_page' => $curPage)); 
        
        // 5. init search form
        $this->_initSearchForm();
        
        return 'web/photographer/search-photo.tpl';
    }
    
    /**
    * get circuits list
    * 
    * @access public
    * @return json object
    * @param null
    * 
    */
    public function getCircuitList(){
        
        $type       =   SHIN_Core::$_input->globalarr('type');
        $country    =   SHIN_Core::$_input->globalarr('country');
        
        if(!empty($type) && !empty($country)) {
            
            // init needed libs
            $nedded_libs = array('models'    => array(array('trk_circuits_model', 'trk_circuits_model')));
                                 
            SHIN_Core::postInit($nedded_libs);
            
            $circuitList    =   SHIN_Core::$_models['trk_circuits_model']->getCircuitList($type, $country);
            
            echo json_encode($circuitList); exit();        
        }
            echo json_encode(array()); exit();
    } 

	/**
    * set raiting for one photo
    * 
    * @access public
    * @return json object
    * @param null
    * 
    */
    public function setRaiting(){
        
        $score      =   SHIN_Core::$_input->globalarr('score');    
        $idPhoto    =   SHIN_Core::$_input->globalarr('photo');
        
        // init needed libs
        $nedded_libs = array('models'    => array(array('trk_photo_model', 'trk_photo_model'),
                                                  array('trk_grates_model', 'trk_grates_model')));
                             
        SHIN_Core::postInit($nedded_libs);
        
        
        if(!empty($score) && !empty($idPhoto)) {
            
            $isRate    = SHIN_Core::$_models['trk_grates_model']->isRate($idPhoto);
            
            if(!$isRate) {
                // 1. save rater
                SHIN_Core::$_models['trk_grates_model']->addRater($idPhoto);
                // 2. set new rate
                $scoreData = SHIN_Core::$_models['trk_photo_model']->setRate($idPhoto, $score);
            }
        } else {
            
            $photoData      =   SHIN_Core::$_models['trk_photo_model']->getPhotoById($idPhoto);
            $scoreData      =   array('score' => floor($photoData['rate'] / $photoData['raters']), 'raters' => $photoData['raters']);
        }
        
        echo json_encode($scoreData); exit();    
    }
	
	
    /**
    * Main page for private room 
    * 
    * @access private (only for members) 
    * @param null
    * @return string template name
    * 
    */
    function proom()
    {

        if(isset(SHIN_Core::$_libs['auth'])){
			if(!SHIN_Core::$_libs['auth']->is_present){
				redirect(base_url().'/main', 'refresh');
			}

		}

        // init needed libs
        $nedded_libs = array(
                                'libs'   => array('SHIN_Tabs',
                                                  'SHIN_Upload',
                                                  'SHIN_Dialog',
                                                  'SHIN_Text_Editor',
                                                  'SHIN_Button',
                                                  'SHIN_Datatable',
                                                  'SHIN_Message',
                                                  'SHIN_DateTimepicker'),
                                'core'   => array('SHIN_CSSManager')
                            );
        
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        // add component to the page 
        SHIN_Core::$_cssmanager->addIncludes(SHIN_Core::$_config['core']['app_base_url'] . '/css/style.css');
        SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['tabs']->render('tabs'));
        
     
    	return 'proom/index.tpl';

    }// end of function
    
    /**
    * show original photo
    * 
    * @access public
    * @return rendered template
    * @param null
    * 
    */
    public function showPhoto(){
        
        // init needed libs
        $nedded_libs = array('libs'      => array('SHIN_Session',
                                                  'SHIN_JqDoc'),
                             'models'    => array(  array('trk_grates_model', 'trk_grates_model'),
                                                    array('trk_photo_model', 'trk_photo_model'),
                                                    array('trk_circuits_model', 'trk_circuits_model'),
                                                    array('trk_user_model', 'trk_user_model'),													
                                                    ));
                             
        SHIN_Core::postInit($nedded_libs);
        
        $cart   =   SHIN_Core::$_libs['session']->userdata('cart');
        if(empty($cart)) {
            $cart = array();
        }
        
        // load external js file for CRUD screen
        SHIN_Core::$_jsmanager->insertJSFromFile(array(SHIN_Core::$_config['core']['app_base_url'] . '/js/jquery.raty.js')); 
        
        $_img = SHIN_Core::$_input->globalarr('photo');
        
        if(!$_img){redirect(SHIN_Core::$_config['core']['app_base_url'].'/index.php/main', 'refresh');}
        
        $__real_imgID = NULL;
        
        // try to find img id by img name
        $query              = SHIN_Core::$_models['trk_photo_model']->get_expanded_result(array('where' => 'sysname = "'. $_img . '"'));  
        $photoInfo          = $query->row(0, 'array');
                              $query->free_result();
        // if photo not exist - redirect.
				
        if(!$photoInfo){
            redirect(base_url().'/main', 'refresh'); die();
        }
		
		// facebook link /////////////
		$__fpath = 	SHIN_Core::$_config['core']['app_base_url'].'/'.
					SHIN_Core::$_config['gallery']['photo_storer_folder'] . '/' . 
					$photoInfo['userId'] . '/' . 
					$photoInfo['folder'] . '/prev_' . 
					$photoInfo['sysname'];
        SHIN_Core::$_libs['templater']->assign('facebook_img_url', $__fpath);

		$fc_link = base_url().'/showphoto?photo='.$photoInfo['sysname'];
        SHIN_Core::$_libs['templater']->assign('fc_link', $fc_link);
		//////////////////////////////
		
		// circuit photo /////////////////////////////////
		SHIN_Core::$_models['trk_circuits_model']->fetchByID($photoInfo['circuit']);
		$img_name = SHIN_Core::$_config['core']['shinfw_base_url'] .'/'. SHIN_Core::$_runned_application.'/'.SHIN_Core::$_config['gallery']['circuit_associate_photo'].'/'.SHIN_Core::$_models['trk_circuits_model']->association_image;		
        SHIN_Core::$_libs['templater']->assign('circuit_photo', $img_name);
		//////////////////////////////////////////////////
		
		$__path = SHIN_Core::$_config['gallery']['photo_storer_folder'] . DIRECTORY_SEPARATOR . $photoInfo['userId'] . DIRECTORY_SEPARATOR . $photoInfo['folder'] . DIRECTORY_SEPARATOR . $photoInfo['sysname'];
		
        //$_exif_data = $this->getEXIF($__path);
		$_exif_data = NULL;
        
        if($photoInfo['rate'] != 0 && $photoInfo['raters'] != 0) {
            $photoInfo['score'] = floor($photoInfo['rate'] / $photoInfo['raters']);
        } else {
            $photoInfo['score'] = 0;  
        }
		
		// fetch photographer info //////////////////////////////////////////////////////////////////
        $userModelInstance  = SHIN_Core::$_models['trk_user_model']->get_instance();
		$userModelInstance->fetchByID($photoInfo['userId']);		
		//dump($userModelInstance);
        SHIN_Core::$_libs['templater']->assign('photographer_fullname', $userModelInstance->sys_user_name.' '.$userModelInstance->sys_user_lastname);
        SHIN_Core::$_libs['templater']->assign('photographer_nick', $userModelInstance->sys_user_username);
		
            switch($userModelInstance->sys_user_role_1) {
                case CT_SNAPTRACK_USERTYPE_PHOTOGRAPHER:
					$status = SHIN_Core::$_language->line('lng_label_snaptrack_usertype_user');
                    break;
                case CT_SNAPTRACK_USERTYPE_ADMIN:
					$status = SHIN_Core::$_language->line('lng_label_snaptrack_usertype_admin');
                    break;
                case CT_SNAPTRACK_USERTYPE_VIEWER:
					$status = SHIN_Core::$_language->line('lng_label_snaptrack_usertype_viewer');
                    break;
            }
        SHIN_Core::$_libs['templater']->assign('photographer_type', $status);
		
		// 2. photo action button 
		//dump($userModelInstance->photoaction, CT_SNAPTRACK_PHOTOACTION_SELL);
		switch($userModelInstance->photoaction) {
			case CT_SNAPTRACK_PHOTOACTION_SELL:
				$photoaction = CT_SNAPTRACK_PHOTOACTION_SELL;
			break;
			case CT_SNAPTRACK_PHOTOACTION_DOWNLOAD:
				$photoaction = CT_SNAPTRACK_PHOTOACTION_DOWNLOAD;
				// TODO 
				// temporary solution !!!!!!!!!!!!!!!!!!!
				//dump($photoInfo);
		$__path = 	SHIN_Core::$_config['core']['app_base_url'].'/'.
					SHIN_Core::$_config['gallery']['photo_storer_folder'] . '/' . 
					$photoInfo['userId'] . '/' . 
					$photoInfo['folder'] . '/' . 
					$photoInfo['sysname'];

					
				
				SHIN_Core::$_libs['templater']->assign('urlfordownload', $__path);
			break;
		}
		
		//dump($photoaction);
        SHIN_Core::$_libs['templater']->assign('userphotoaction', $photoaction);
		
		/////////////////////////////////////////////////////////////////////////////////////////////
                          
        // circuit info ///////////////////
        SHIN_Core::$_models['trk_circuits_model']->fetchByID($photoInfo['circuit']);
        SHIN_Core::$_libs['templater']->assign('circuit_name', SHIN_Core::$_models['trk_circuits_model']->circuit);
        SHIN_Core::$_libs['templater']->assign('circuit_country', SHIN_Core::$_models['trk_circuits_model']->country);        
        //////////////////////////////////
          
        $__real_imgID   = isset($photoInfo['idPhoto']) ? $photoInfo['idPhoto'] : null;  
            
        if($__real_imgID == NULL){redirect(SHIN_Core::$_config['core']['app_base_url'].'/index.php/main', 'refresh');}
        
        $__real_img     = SHIN_Core::$_config['core']['app_base_url'] . '/' . SHIN_Core::$_config['gallery']['photo_storer_folder'] . '/' . $photoInfo['userId'] . '/' . $photoInfo['folder'] . '/' . SHIN_Core::$_config['store']['preview_prefix'] .  $_img;
        
        if(!empty(SHIN_Core::$_user->idUser)) {
            SHIN_Core::$_libs['templater']->assign('idUser', SHIN_Core::$_user->idUser);
            $isRate    = SHIN_Core::$_models['trk_grates_model']->isRate($photoInfo['idPhoto']);
        } else {
            SHIN_Core::$_libs['templater']->assign('idUser', null);
            $isRate    = false;    
        }
        
		$photoInfo['ainfo']     = NULL;
        $photoInfo['raceday']   = fromDbToDisplay($photoInfo['raceday']);
		if(SHIN_Core::$_user){$photoInfo['ainfo'] = SHIN_Core::$_user->idUser;}
		
        SHIN_Core::$_libs['templater']->assign('exifData',    $_exif_data);
        SHIN_Core::$_libs['templater']->assign('isRate',      $isRate);
        SHIN_Core::$_libs['templater']->assign('imgName',     substr($_img, SHIN_Core::$_config['core']['hash_langth']));
        SHIN_Core::$_libs['templater']->assign('img',         $__real_img);
        SHIN_Core::$_libs['templater']->assign('idPhoto',     $photoInfo['idPhoto']);
        SHIN_Core::$_libs['templater']->assign('photoData',   $photoInfo);
        SHIN_Core::$_libs['templater']->assign('currentPage', SHIN_Core::$_libs['session']->userdata('cur_page'));
        SHIN_Core::$_libs['templater']->assign('perPage',     SHIN_Core::$_libs['session']->userdata('per_page'));
        SHIN_Core::$_libs['templater']->assign('cart',        $cart);
        
        
        // apply search filter and get all photos
        $whereCondition =   SHIN_Core::$_libs['session']->userdata('where');
        if(empty($whereCondition)) {
            $whereCondition =   '1=1';
        }
        
		// initialize bottom pager ///////////////////////////////////////////////////////////
		$__preinit_hash = array();
				
		$query = SHIN_Core::$_models['trk_photo_model']->get_expanded_result(array('where' => $whereCondition));
		
		//$query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->query('SELECT idPhoto, sysname FROM snaptrack_photo WHERE '.$whereCondition);
		$counter = 0;
        foreach ($query->result_array() as $row)
		{
			$__preinit_hash[$row['idPhoto']] =  $counter;
			$counter++;
		}
		
		if(count($__preinit_hash) <= SHIN_Core::$_config['gallery']['count_of_picture']){
			$__limit = '0, '.count($__preinit_hash);
		} else {
			$current_index = $__preinit_hash[$photoInfo['idPhoto']];
			$__limit = $current_index.', '.SHIN_Core::$_config['gallery']['count_of_picture'];
		}
		
        $gallery = SHIN_Core::$_models['trk_photo_model']->get_instance();        
        $res = $gallery->get_expanded_result(array(
        	"where"		=> $whereCondition,
            "limit"		=> $__limit,
        ));
		
		foreach ($res->result_array() as $row)
		{
			$gallery->fetch_row($row);
			SHIN_Core::$_libs['templater']->append($gallery->write());
		}
		
        $this->_printTopBlock();
        $this->_initSearchForm();
        
        // base example
        SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['jqdoc']->render('#six-img-list'));
        
        
        return 'web/photographer/show-photo';             
    }
    
    public function getPhotoInfo(){
        
        $idPhoto    =   SHIN_Core::$_input->globalarr('idPhoto');
        
        if(!empty($idPhoto)) {
            
            // init needed libs
            $nedded_libs = array('libs'      => array('SHIN_Session'),
                                 'models'    => array(  array('trk_grates_model', 'trk_grates_model'),
                                                        array('trk_photo_model', 'trk_photo_model'),
                                                        array('trk_circuits_model', 'trk_circuits_model'),
                                                        array('trk_user_model', 'trk_user_model'),                                                    
                                                        ));
                                 
            SHIN_Core::postInit($nedded_libs);
            
            $cart   =   SHIN_Core::$_libs['session']->userdata('cart');
            if(empty($cart)) {
                $cart = array();
            }


            
            // 1. get photo information by id
            $query              = SHIN_Core::$_models['trk_photo_model']->get_expanded_result(array('where' => 'idPhoto = "'. $idPhoto . '"'));  
            $photoInfo          = $query->row(0, 'array');
                                  $query->free_result();

			$fc_link = base_url().'/showphoto?photo='.$photoInfo['sysname'];
	        SHIN_Core::$_libs['templater']->assign('fc_link', $fc_link);
		$__fpath = 	SHIN_Core::$_config['core']['app_base_url'].'/'.
					SHIN_Core::$_config['gallery']['photo_storer_folder'] . '/' . 
					$photoInfo['userId'] . '/' . 
					$photoInfo['folder'] . '/prev_' . 
					$photoInfo['sysname'];
        SHIN_Core::$_libs['templater']->assign('facebook_img_url', $__fpath);

            
            // 2. get circuit information
            SHIN_Core::$_models['trk_circuits_model']->fetchByID($photoInfo['circuit']);
            $img_name = SHIN_Core::$_config['core']['shinfw_base_url'] .'/'. SHIN_Core::$_runned_application.'/'.SHIN_Core::$_config['gallery']['circuit_associate_photo'].'/'.SHIN_Core::$_models['trk_circuits_model']->association_image;        
//            dump($img_name);
            SHIN_Core::$_libs['templater']->assign('circuit_photo', $img_name);
            //////////////////////////////////////////////////
            
            $__path = SHIN_Core::$_config['gallery']['photo_storer_folder'] . DIRECTORY_SEPARATOR . $photoInfo['userId'] . DIRECTORY_SEPARATOR . $photoInfo['folder'] . DIRECTORY_SEPARATOR . $photoInfo['sysname'];
            
            //$_exif_data = $this->getEXIF($__path);
            $_exif_data = NULL;
            
            if($photoInfo['rate'] != 0 && $photoInfo['raters'] != 0) {
                $photoInfo['score'] = floor($photoInfo['rate'] / $photoInfo['raters']);
            } else {
                $photoInfo['score'] = 0;  
            }
            
            // 3. get photographer information
            $userModelInstance  = SHIN_Core::$_models['trk_user_model']->get_instance();
            $userModelInstance->fetchByID($photoInfo['userId']);        
            
            SHIN_Core::$_libs['templater']->assign('photographer_fullname', $userModelInstance->sys_user_name.' '.$userModelInstance->sys_user_lastname);
            SHIN_Core::$_libs['templater']->assign('photographer_nick', $userModelInstance->sys_user_username);
            
                switch($userModelInstance->sys_user_role_1) {
                    case CT_SNAPTRACK_USERTYPE_PHOTOGRAPHER:
                        $status = SHIN_Core::$_language->line('lng_label_snaptrack_usertype_user');
                        break;
                    case CT_SNAPTRACK_USERTYPE_ADMIN:
                        $status = SHIN_Core::$_language->line('lng_label_snaptrack_usertype_admin');
                        break;
                    case CT_SNAPTRACK_USERTYPE_VIEWER:
                        $status = SHIN_Core::$_language->line('lng_label_snaptrack_usertype_viewer');
                        break;
                }
            SHIN_Core::$_libs['templater']->assign('photographer_type', $status);
            
            switch($userModelInstance->photoaction) {
                case CT_SNAPTRACK_PHOTOACTION_SELL:
                    $photoaction = CT_SNAPTRACK_PHOTOACTION_SELL;
                break;
                case CT_SNAPTRACK_PHOTOACTION_DOWNLOAD:
                    $photoaction = CT_SNAPTRACK_PHOTOACTION_DOWNLOAD;
                    // TODO 
                    // temporary solution !!!!!!!!!!!!!!!!!!!
                    //dump($photoInfo);
                    $__path =     SHIN_Core::$_config['core']['app_base_url'].'/'. 
                                  SHIN_Core::$_config['gallery']['photo_storer_folder'] . '/' . 
                                  $photoInfo['userId'] . '/' . 
                                  $photoInfo['folder'] . '/' . 
                                  $photoInfo['sysname'];
                        
                    
                    SHIN_Core::$_libs['templater']->assign('urlfordownload', $__path);
                break;
            }
            
            SHIN_Core::$_libs['templater']->assign('userphotoaction', $photoaction);
            
            // 4. transfer to template circuit information
            SHIN_Core::$_models['trk_circuits_model']->fetchByID($photoInfo['circuit']);
			if(SHIN_Core::$_models['trk_circuits_model']->isDefinite()){
				SHIN_Core::$_libs['templater']->assign('circuit_name', SHIN_Core::$_models['trk_circuits_model']->circuit);
				SHIN_Core::$_libs['templater']->assign('circuit_country', SHIN_Core::$_models['trk_circuits_model']->country);        
			}
              
            $__real_img     = SHIN_Core::$_config['core']['app_base_url'] . '/' . SHIN_Core::$_config['gallery']['photo_storer_folder'] . '/' . $photoInfo['userId'] . '/' . $photoInfo['folder'] . '/' . SHIN_Core::$_config['store']['preview_prefix'] .  $photoInfo['sysname'];
            
            if(!empty(SHIN_Core::$_user->idUser)) {
                SHIN_Core::$_libs['templater']->assign('idUser', SHIN_Core::$_user->idUser);
                $isRate    = SHIN_Core::$_models['trk_grates_model']->isRate($photoInfo['idPhoto']);
            } else {
                SHIN_Core::$_libs['templater']->assign('idUser', null);
                $isRate    = false;    
            }
            
            $photoInfo['ainfo']     = NULL;
            $photoInfo['raceday']   = fromDbToDisplay($photoInfo['raceday']);
            if(SHIN_Core::$_user){$photoInfo['ainfo'] = SHIN_Core::$_user->idUser;}
            
            // 5. transfer to template all other information
            SHIN_Core::$_libs['templater']->assign('exifData',    $_exif_data);
            SHIN_Core::$_libs['templater']->assign('isRate',      $isRate);
            SHIN_Core::$_libs['templater']->assign('imgName',     $photoInfo['sysname']);
            SHIN_Core::$_libs['templater']->assign('img',         $__real_img);
            SHIN_Core::$_libs['templater']->assign('idPhoto',     $photoInfo['idPhoto']);
            SHIN_Core::$_libs['templater']->assign('photoData',   $photoInfo);
            SHIN_Core::$_libs['templater']->assign('cart',        $cart);
        }
        
        return 'web/photographer/photo-info';    
        
    }
	
	
    /**
    * Download picture for logged user.
    * 
    * @access public but only for members
    * @param string filename
    * @return force download action if file exist and user logged in to system
    * 
    */
	function downloadPicture()
	{
        // if user not exist - die.				
		if(!SHIN_Core::$_user){die();}
	
        $photo_id = SHIN_Core::$_input->globalarr('photoid');
        $nedded_libs = array('help' => array('download'), 'models'    => array(  array('trk_photo_model', 'trk_photo_model'), array('trk_user_model','trk_user_model')));
        SHIN_Core::postInit($nedded_libs);
        
        // try to find img id by img id
        SHIN_Core::$_models['trk_photo_model']->fetchByID($photo_id);
		$__path = 	SHIN_Core::$_config['core']['base_path'].
					SHIN_Core::$_runned_application.DIRECTORY_SEPARATOR.
					SHIN_Core::$_config['gallery']['photo_storer_folder'] . DIRECTORY_SEPARATOR . 
					SHIN_Core::$_models['trk_photo_model']->userId . DIRECTORY_SEPARATOR . 
					SHIN_Core::$_models['trk_photo_model']->folder . DIRECTORY_SEPARATOR . 
					SHIN_Core::$_models['trk_photo_model']->sysname;
					
        // if photo not exist - die.				
        if(!SHIN_Core::$_models['trk_photo_model']){die();}
		
		// check if user have approve for download
        $userModelInstance  = SHIN_Core::$_models['trk_user_model']->get_instance();
		$userModelInstance->fetchByID(SHIN_Core::$_models['trk_photo_model']->userId);		
		if($userModelInstance->photoaction != CT_SNAPTRACK_PHOTOACTION_DOWNLOAD){die();}
		
		
#header("Expires: Mon, 26 Jul 1997 05:00:00 GMT\n");
#header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
#header("Content-type: application/octet-stream;\n");
#$len = filesize($__path);
#header("Content-Length: $len;\n");
#header("Content-Disposition: attachment; filename=\"".SHIN_Core::$_models['snaptrack_photo_model']->sysname."\";\n\n");
#echo readfile($__path);

		
		
		force_download($__path, file_get_contents($__path));
		exit;
	}
    
    /**
     * Try login to us system.
     *
     * @access public
     * @return void redirects if not auth.
     */
    function trylogin()
    {	
		$ret_url = base_url();

		$tmp = SHIN_Core::$_libs['auth']->trylogin();

		$neededLibs = array('libs' => array('SHIN_Session'));
		SHIN_Core::postInit($neededLibs);
            
        redirect('/main', 'refresh');
    }
	
    /**
    * Try to read EXIF information from this photo 
    * 
    * @access private
    * @param $path for needed picture
    * @return $array with data OR false
    * 
    */
	private function getEXIF($real_file_path)
	{
		$needed_names = array('Height', 'Width', 'ApertureFNumber', 'Thumbnail.MimeType', 'Make', 'Model', 'XResolution', 'YResolution', 'DateTime'	, 'ExposureTime', 'FNumber', 'ExposureProgram', 'CompressedBitsPerPixel', 'ExposureBiasValue', 'MaxApertureValue', 'MeteringMode', 'LightSource', 'Flash', 'FocalLength', 'FocalLengthIn35mmFilm');
	
		$ret_dataarray = array();
        
        if(!is_file($real_file_path)){ return FALSE;}
		
		$exif = exif_read_data($real_file_path, 0, true);
		foreach ($exif as $key => $section) {
			foreach ($section as $name => $val) {
				if(in_array($name, $needed_names)){
					$ret_dataarray[$name] = $val;
				}
			}
		}
	
        return $ret_dataarray;
	}
	

} // end of class
