<?php

require "CommonController.php";

class ProfileController extends CommonController  {
    
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
        
    }
    
    /**
    * Default and main function for manage profile
    * 
    * @access public
    * @param null
    * @return json result
    */
    public function index(){
        
        // init needed libs
        $nedded_libs = array('help'     => array('form', 'validate', 'array', 'date'),
                             'libs'     => array('SHIN_Message', 'SHIN_Dialog'), 
                             'models'   => array(array('trk_user_model', 'trk_user_model')));
        
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
         
        // init messages and errors blocks
        SHIN_Core::$_libs['templater']->assign('jsMessages',  SHIN_Core::$_libs['message']->getMessageBlock('message'));
        SHIN_Core::$_libs['templater']->assign('jsErrors',    SHIN_Core::$_libs['message']->getErrorBlock('error'));
        
        SHIN_Core::$_libs['templater']->assign('jsDialogMessages',  SHIN_Core::$_libs['message']->getMessageBlock('dialogMessage'));
        SHIN_Core::$_libs['templater']->assign('jsDialogErrors',    SHIN_Core::$_libs['message']->getErrorBlock('dialogError'));
        
        // init add dialog
        SHIN_Core::$_libs['dialog']->init(array('width' => 400));
        SHIN_Core::$_libs['dialog']->confirm_dialog_correct('change-pwd-dialog', SHIN_Core::$_language->line('lng_label_prifle_change_pwd_title'), null, Array(SHIN_Core::$_language->line('lng_label_prifle_change_pwd_cancel') => 'closeDialog()', SHIN_Core::$_language->line('lng_label_prifle_change_pwd_save') => 'savePwd()'));
        SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['dialog']->render('change-pwd-dialog'));
        
        SHIN_Core::$_models['trk_user_model']->fetchByID(SHIN_Core::$_user->idUser);
        SHIN_Core::$_libs['templater']->assign(SHIN_Core::$_models['trk_user_model']->write_form());
        
        return 'proom/profile/index.tpl';     
    }
    
    /**
    * save profile information
    * 
    * @access public
    * @return json object
    * @param null
    * 
    */
    public function saveInfo(){
        
        // init needed libs
        $nedded_libs = array('libs' => array('SHIN_Mailer'), 'models'    =>  array(array('trk_user_model', 'trk_user_model'),
                                                                                   array('trk_email_confirm_model', 'trk_email_confirm_model')));
        
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        // 1. get old data from db
        $data   =   SHIN_Core::$_models['trk_user_model']->getUserData();
        
        // 2. read new data
        $userModelInstance  = SHIN_Core::$_models['trk_user_model']->get_instance();
        $userModelInstance->read_form();

        // 1!!!!!  need check email unique.
		$query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->query(
										'SELECT * FROM sys_user'.
										' WHERE email = '.SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->escape($userModelInstance->sys_user_email));
        
		$row = $query->row();
		if($row){
			// email is not unique
			$message[]  =   SHIN_Core::$_language->line('lng_label_email_not_unique');
			echo json_encode(array('result' => FALSE, 'message' => $message)); exit();
		} 

        
        // 3. if user change email make confirmation action
        if($userModelInstance->sys_user_email != $data['sys_user_email']) {
            $confirmCode    =   SHIN_Core::$_models['trk_email_confirm_model']->generateCode($userModelInstance->sys_user_email);
            
            // 1. send email to old email
            SHIN_Core::$_libs['mailer']->AddAddress($data['sys_user_email'], $data['sys_user_username']);
            SHIN_Core::$_libs['mailer']->Subject = SHIN_Core::$_language->line('lng_label_prifle_confirm_new_email');
            SHIN_Core::$_libs['mailer']->MsgHTML('Confirm link:' . '<a href="' . prep_url(base_url().'/profile/confirm?code=' . $confirmCode) . '">Confirm link</a>');
            
            // send mail
            $result = SHIN_Core::$_libs['mailer']->Send();
            
            if($result) {
                $message[] = SHIN_Core::$_language->line('lng_label_prifle_email_success');     
            } else {
                $message[] = SHIN_Core::$_language->line('lng_label_prifle_email_error') . ':' . SHIN_Core::$_libs['mailer']->ErrorInfo;    
            }
        }
        
        // 4. save new data in db but befor remove old email from object which prepared for saving
        
        // 5. save data in db
        $result      =  $userModelInstance->updateUser(array('name' => $userModelInstance->sys_user_name, 'lastname' => $userModelInstance->sys_user_lastname));
        
        if($result) {
            $message[]  =   SHIN_Core::$_language->line('lng_label_prifle_save_seccessfully');   
        } else {
            $message[]  =   SHIN_Core::$_language->line('lng_label_prifle_save_error');
        }
        echo json_encode(array('result' => $result, 'message' => $message)); exit();    
    }
    
    /**
    * save password
    * 
    * @access public
    * @return json object
    * @param null
    * 
    */
    public function savePass(){
        
        // init needed libs
        $nedded_libs = array('libs' => array('SHIN_Mailer'), 'models'    =>  array(array('trk_user_model', 'trk_user_model')));
        
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        $oldPassword    =   SHIN_Core::$_input->globalarr('old-password');
        $confirm        =   SHIN_Core::$_input->globalarr('confirm-password');
        $password       =   SHIN_Core::$_input->globalarr('new-password');
        
        // 1. if user specify new password send email with this new password
        if(md5($oldPassword) == SHIN_Core::$_user->pwd) {
            if(!empty($password) && md5($password) != SHIN_Core::$_user->pwd) {
                if(!empty($confirm) && $confirm == $password) {
                    
                    SHIN_Core::$_libs['mailer']->AddAddress(SHIN_Core::$_user->email, SHIN_Core::$_user->username);
                    SHIN_Core::$_libs['mailer']->Subject = SHIN_Core::$_language->line('lng_label_prifle_password_new');
                    SHIN_Core::$_libs['mailer']->MsgHTML('New password is:' . $password);                    
                    
                    // send mail
                    $result = SHIN_Core::$_libs['mailer']->Send();
                    
                    if($result) {
                        $message[]              =   SHIN_Core::$_language->line('lng_label_prifle_password_success');     
                    } else {
                        $message[] = SHIN_Core::$_language->line('lng_label_prifle_password_error') . ':' . SHIN_Core::$_libs['mailer']->ErrorInfo;    
                    }
                    
                    // 2. save new pass
                    $result      =   SHIN_Core::$_models['trk_user_model']->updateUser(array('pwd' => md5($password)));
                
                    
                } else {
                    $result     = false;
                    $message[]  = SHIN_Core::$_language->line('lng_label_prifle_password_incorrect');
                }
            } else {
                $result     =   false;
                $message[]  =   SHIN_Core::$_language->line('lng_label_prifle_password_empty');
            }
        } else {
            $result     =   false;
            $message[]  =   SHIN_Core::$_language->line('lng_label_prifle_password_old_incorrect');  
        }
        
        echo json_encode(array('result' => $result, 'message' => $message)); exit();  
    }
    
    /**
    * confirm new email
    * 
    * @access public
    * @return null
    * @param null
    * 
    */
    public function confirmEmail(){
        
        // init needed libs
        $nedded_libs = array('libs' => array('SHIN_Mailer'), 'models'    =>  array(array('trk_user_model', 'trk_user_model'),
                                                                                   array('trk_email_confirm_model', 'trk_email_confirm_model')));
        
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        $confirmCode    =   SHIN_Core::$_input->globalarr('code');
        if(!empty($confirmCode)) {
            $confirmData =   SHIN_Core::$_models['trk_email_confirm_model']->getConfirmData($confirmCode);
            if(!empty($confirData)) {
                $result = SHIN_Core::$_models['trk_user_model']->updateUser(array('email' => $confirmData['new_email']), $confirmData['userId']);    
                if($result) {
                    echo 'Email was seccessfully changed.'; exit();    
                } else {
                    echo 'Error occure while change email.'; exit();    
                }
            } else {
                echo 'Incorrect confirmation code.'; exit();    
            }
        } else {
            echo 'Empty confirmation code.'; exit();
        }
        
            
    }
    
}