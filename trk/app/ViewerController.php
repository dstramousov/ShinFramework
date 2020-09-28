<?php

require "CommonController.php";

class ViewerController extends CommonController {
    
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

        if(isset(SHIN_Core::$_libs['auth'])){
			if(!SHIN_Core::$_libs['auth']->is_present){
				redirect(base_url().'/main', 'refresh');
			}
		}                                                                                               
    }

    /**
    * Default and main function
    * 
    * @access public
    * @param null
    * @return json result
    */
    public function index(){
        // init needed libs
        $nedded_libs = array(
                                'libs'   => array('SHIN_Tabs',
                                                  'SHIN_Upload',
                                                  'SHIN_Dialog',
                                                  'SHIN_Text_Editor',
                                                  'SHIN_Button',
                                                  'SHIN_Datatable',
                                                  'SHIN_Message'),
                                'core'   => array('SHIN_CSSManager')
                            );
        
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        // add component to the page 
        SHIN_Core::$_cssmanager->addIncludes(SHIN_Core::$_config['core']['app_base_url'] . '/css/style.css');
        SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['tabs']->render('tabs'));
        
        
        return 'viewer/index.tpl';
    }

    /**
    * Try to save profile. 
    * 
    * @access public
    * @param null
    * @return ok- send a email for customer with new password if it`s needed
    */
    public function saveProfile()
	{
        
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


} // end of class

?>
