<?php

require "CommonController.php";

class UserManageController extends CommonController {
    
    private $redirectUrl = null;
    
    function __construct() {
        
        parent::__construct();
        
        $nedded_libs = array(
                            'models' => array(
                                array('ppfm_category_model', 'ppfm_category_model'),
                                array('ppfm_entry_model', 'ppfm_entry_model'),
                                array('ppfm_account_model', 'ppfm_account_model'),
                                array('ppfm_holder_model', 'ppfm_holder_model'),
                                array('sys_user_model', 'sys_user_model'),            
								array('sys_userrole_model', 'sys_userrole_model'),			
                            ),
							
                            'libs' => array(
                                'SHIN_Datatable',                                
                                'SHIN_Tabs',
                                'SHIN_Dialog',
                                'SHIN_BlockUI',
                                'SHIN_Message',
                                'SHIN_Mailer',
                                'SHIN_Datepicker'
                            ),
                            
                            'help' => array('date', 'form', 'validate')
                         );
                         
        SHIN_Core::postInit($nedded_libs);
        
        $this->redirectUrl  =   shinfw_base_url().'/main';
        
        SHIN_Core::$_libs['templater']->assign('currencySymbol', SHIN_Core::$_config['lang']['currency']);

        SHIN_Core::$_libs['seo']->addToTitle(SHIN_Core::$_language->line('lng_label_ppfm_usermanage'));
    }

    function index(){
        
        $userFieldsNames     =  array(array('data'      =>  array(SHIN_Core::$_language->line('lng_label_managment_account_id'), 
                                                                  SHIN_Core::$_language->line('lng_label_managment_account_account'), 
                                                                  SHIN_Core::$_language->line('lng_label_managment_account_amount'),
                                                                  SHIN_Core::$_language->line('lng_label_managment_account_last_update'), '', ''),
                                            'c_model'   =>  'ppfm_account_model',
                                            'd_model'   =>  'ppfm_account_model|ppfm_account_model'),
                                      array('data'      =>  array(SHIN_Core::$_language->line('lng_label_managment_category_id'), 
                                                                  SHIN_Core::$_language->line('lng_label_managment_category_category'), '', ''),
                                            'c_model'   =>  'ppfm_category_model',
                                            'd_model'   =>  'ppfm_category_model|ppfm_category_model'),
                                      array('data'      =>  array(SHIN_Core::$_language->line('lng_label_managment_holder_id'),
                                                                  SHIN_Core::$_language->line('lng_label_managment_holder_holder'), '', ''),
                                            'c_model'   =>  'ppfm_holder_model',
                                            'd_model'   =>  'ppfm_holder_model|ppfm_holder_model'),
                                      array('data'      =>  array(SHIN_Core::$_language->line('lng_label_managment_user_id'),
                                                                  SHIN_Core::$_language->line('lng_label_managment_user_lang'),
                                                                  SHIN_Core::$_language->line('lng_label_managment_user_name'),
                                                                  SHIN_Core::$_language->line('lng_label_managment_user_last_name'),
                                                                  SHIN_Core::$_language->line('lng_label_managment_user_email'),
                                                                  SHIN_Core::$_language->line('lng_label_managment_user_user_name'),
                                                                  SHIN_Core::$_language->line('lng_label_managment_user_pass'), '', ''),
                                            'c_model'   =>  'sys_user_model',
                                            'd_model'   =>  'sys_user_model|sys_user_model'));
        
        $tableFieldsNames    =  array(array('idAccount', 'account', 'curAmount', 'lastUpdate'),
                                      array('idCat', 'cat'),
                                      array('idHolder', 'holder'),
                                      array('idUser', 'lang', 'name', 'lastname', 'email', 'username', 'pwd'));
        
        foreach($userFieldsNames as $key => $value)
		{   
            $_element_id    = $value['c_model'];
            $_dom_element   = $value['c_model'];
            $_table_data    = $value['data'];
            $_tableclass    = 'display';
            $_display_data  = array();
            $_css_column    = 'gradeC';
            
            $fnServerData = 'function ( sSource, aoData, fnCallback ) {
                                        aoData.push( { "name": "model_name", "value": "' . $value['d_model'] . '" } ),
                                        aoData.push( { "name": "custom_column", "value": "edit, delete" } ),
                                        aoData.push( { "name": "needed_column", "value": "' . implode(',' , $tableFieldsNames[$key]) . '" } ),
                                        $.ajax( {
                                            "dataType": \'json\', 
                                            "type": "POST", 
                                            "url": sSource, 
                                            "data": aoData,
                                            "success": fnCallback
                                        } ); 
                                    }';
                                    
            $init_options = array(
                                    'sAjaxSource'    => "'".SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'].'/connectors/SHIN_ConnectorJoin.php'."'",
                                    'bProcessing'    => 'true',
                                    'bServerSide'    => 'true',
                                    'fnServerData'   => $fnServerData,
                                    'aoColumns'      => '[{ "bVisible":    false }, ' . str_repeat('null,', count($value['data']) - 3) . ' { "bSortable": false },{ "bSortable": false }]',
                                    'oLanguage'      => '{"sUrl": "'.SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'].'/js/datatables/dataTables.'.SHIN_Core::$_current_lang.'.txt"}'
                                );
            
            
            // fetch needed data for visualization 
            $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get(SHIN_Core::$_models[$value['c_model']]->table_name);
            foreach ($query->result_array() as $row)
            {   
                $temp   =   array();
                foreach($tableFieldsNames[$key] as $arrayIndex) {
                    @array_push($temp, $row[$arrayIndex]);    
                } 
                    
                    array_push($_display_data, array(
                                                        'csscolumn'  => $_css_column, 
                                                        'datacolumn' => $temp)
                                                    );
            }
            $query->free_result();
        
            $dt = SHIN_Core::$_libs['datatable']->get_instance();
            $dt->init($init_options);
        
            $data_inject = $dt->initSSStyle($_dom_element, $_element_id, $_tableclass, $_display_data, $_table_data);
            
            SHIN_Core::$_jsmanager->addComponent($dt->render($_element_id));
            
            }
            
            // dialog edit
            SHIN_Core::$_libs['dialog']->confirm_dialog('edit-dialog', SHIN_Core::$_language->line('lng_label_managment_edit_dialog'), null, array(SHIN_Core::$_language->line('lng_label_usermanage_page_cancel_btn') => 'closeEditDialog', SHIN_Core::$_language->line('lng_label_usermanage_page_edit_new_btn') => 'saveChanges'));   
            SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['dialog']->render('edit-dialog'));
            
            // dialog add
            SHIN_Core::$_libs['dialog']->confirm_dialog('add-dialog', SHIN_Core::$_language->line('lng_label_managment_add_dialog'), null, array(SHIN_Core::$_language->line('lng_label_usermanage_page_cancel_btn') => 'closeAddDialog', SHIN_Core::$_language->line('lng_label_usermanage_page_add_new_btn') => 'saveNewRecord'));   
            SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['dialog']->render('add-dialog'));
         
            // dialog delete
            SHIN_Core::$_libs['dialog']->confirm_dialog('delete-dialog', SHIN_Core::$_language->line('lng_label_managment_delete_dialog'), null, array(SHIN_Core::$_language->line('lng_label_usermanage_page_no_btn') => 'closeDeleteDialog', SHIN_Core::$_language->line('lng_label_usermanage_page_yes_btn') => 'deleteRecord'));   
            SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['dialog']->render('delete-dialog'));
            
            SHIN_Core::$_libs['templater']->assign('tableList', $userFieldsNames);
            SHIN_Core::$_libs['templater']->assign('tableFiledsList', $tableFieldsNames);
         
            // add tabs
            SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['tabs']->render('tabs'));
            
            // add blockUI
            $css        = "'margin-top': '-250px'";
            $overlayCSS = "
                            backgroundColor: '#ffffff', 
                            opacity:         0 
                           ";
            SHIN_Core::$_jsmanager->addOutDomReadyComponent(SHIN_Core::$_libs['blockui']->bindByFunction('tabs', 'blockUI', 'unBlockUI', "lng_label_please_whait", $css, $overlayCSS));
            
            
            // add user data to view
            SHIN_Core::$_libs['templater']->assign('user',    SHIN_Core::$_libs['auth']->user);
            SHIN_Core::$_libs['templater']->assign('langs',   SHIN_Core::$_config['lang']['available_language']);
            SHIN_Core::$_libs['templater']->assign('themes',  SHIN_Core::$_config['theme']['theme_available']);
            
            // add external JS plugin
            SHIN_Core::$_jsmanager->addIncludes(SHIN_Core::$_config['core']['shinfw_base_url'] . '/' . SHIN_Core::$_config['core']['shinfw_folder'] . '/js/validate/' . 'jquery.validate.min.js');
            
            $errors     =   array();
            $messages   =   null;
            
            $action     =   SHIN_Core::$_input->post('action');
            if(isset($action)) {
                
                $id     = SHIN_Core::$_models['sys_user_model']->primary_key; 
                
                switch($action) {
                    case 'general-info':
                        
                        $theme   = SHIN_Core::$_input->post('user_theme');
                        $lang    = SHIN_Core::$_input->post('user_lang');
                        
                        if(!in_array($lang, SHIN_Core::$_config['lang']['available_language'])) {
                            $lang   = SHIN_Core::$_config['lang']['language'];       
                        }
                        
                        if(!in_array($theme, SHIN_Core::$_config['theme']['theme_available'])) {
                            $theme   = SHIN_Core::$_config['theme']['default_theme'];       
                        }
                        
                        $result = SHIN_Core::$_models['sys_user_model']->updateRec(array('lang'     => $lang,
                                                                                         'theme'    => $theme,
                                                                                         $id        => SHIN_Core::$_libs['auth']->user->idUser));
                        if($result) {
                            $messages   =   SHIN_Core::$_language->line('lng_label_managment_edit_success');
                            
                            SHIN_Core::$_libs['session']->set_flashdata(array('messages' => $messages));    
                        
                            redirect($this->redirectUrl . 'usermanage', 'refresh');
                        } else {
                            $errors[]   =   SHIN_Core::$_language->line('lng_label_managment_edit_error');    
                        }
                          
                        break;
                    
                    case 'user-pass':
                        
                        $pass    = SHIN_Core::$_input->post('user_new_pass');
                        $rePass  = SHIN_Core::$_input->post('user_re_pass');
                        $oldPass = SHIN_Core::$_input->post('user_old_pass');
                        
                        
                        if(!empty($oldPass) && md5($oldPass) == SHIN_Core::$_libs['auth']->user->pwd) {
                        
                            if(!empty($pass) && !empty($rePass) && $pass == $rePass) {
                                $result = SHIN_Core::$_models['sys_user_model']->updateRec(array('pwd'     => md5($pass),
                                                                                                  $id      => SHIN_Core::$_libs['auth']->user->idUser));
                                
                                if($result) {
                                    // send pass  to the user with new email
                                    $messages[] =   SHIN_Core::$_language->line('lng_label_managment_edit_pass_success');
                                    
                                    $userEmail =  SHIN_Core::$_libs['auth']->user->email;
                                    $userName  =  SHIN_Core::$_libs['auth']->user->username;
                                    
                                    SHIN_Core::$_libs['mailer']->AddAddress($userEmail, $userName);
                                    SHIN_Core::$_libs['mailer']->Subject = SHIN_Core::$_language->line('lng_label_managment_pwd_send_email');;
                                    SHIN_Core::$_libs['mailer']->MsgHTML('New pass is: ' . $pass);
                                    
                                    $result = SHIN_Core::$_libs['mailer']->Send();
                                    
                                    if($result) {
                                        $messages[] =   SHIN_Core::$_language->line('lng_label_managment_mail_pass_success');
                                                        
                                                        SHIN_Core::$_libs['session']->set_flashdata(array('messages' => $messages));
                                
                                        redirect($this->redirectUrl . 'usermanage', 'refresh');
                                    } else {
                                        $errors[]   =   SHIN_Core::$_language->line('lng_label_managment_mail_pass_error');     
                                    }
                                    
                                } else {
                                    $errors[]   =   SHIN_Core::$_language->line('lng_label_managment_edit_pass_error');    
                                }
                            } else {
                                $errors[]   =   SHIN_Core::$_language->line('lng_label_managment_edit_pass_equal_error');
                            }
                        } else {
                            $errors[]   =   SHIN_Core::$_language->line('lng_label_managment_old_pass_error');  
                        }
                        
                        break;
                }
            }
            
            SHIN_Core::$_libs['message']->addError($errors);
            SHIN_Core::$_libs['message']->addMessage(SHIN_Core::$_libs['session']->flashdata('messages'));
            
            SHIN_Core::$_libs['templater']->assign('jsMessages',  SHIN_Core::$_libs['message']->getMessageBlock());
            SHIN_Core::$_libs['templater']->assign('jsErrors',    SHIN_Core::$_libs['message']->getErrorBlock());
            
            SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['message']->render('message')); 
            
    	    return 'usermanage.tpl';
        }
    
    function ajaxUpdate()
	{
    	$table      =  SHIN_Core::$_input->post('active_table');
        
                  SHIN_Core::$_models[$table . '_model']->read_form();
        $result = SHIN_Core::$_models[$table . '_model']->validate_form();
        
        
		
        if(empty($result)) {
            SHIN_Core::$_models[$table . '_model']->save();
            
            echo json_encode(array('result'  => true,
                                   'errors'  => null,
                                   'message' => SHIN_Core::$_language->line('lng_label_managment_update_success')));    
        } else {
            echo json_encode(array('result'  => false,
                                   'errors'  => $result,  
                                   'message' => ''));    
        }
        exit();    
    }
    
    function ajaxGet(){
        
        $templates  =  array('ppfm_account'   =>  'account_dialog.tpl',
                             'ppfm_category'  =>  'category_dialog.tpl',
                             'ppfm_holder'    =>  'holder_dialog.tpl',
                             'sys_user'       =>  'user_dialog.tpl');
                              
        $id         =  SHIN_Core::$_input->post('active_record_id');
        $table      =  SHIN_Core::$_input->post('active_table');
        
        SHIN_Core::$_models[$table . '_model']->fetchByID($id);
        
        SHIN_Core::$_libs['templater']->assign(SHIN_Core::$_models[$table . '_model']->write_form());
        
        $datepicker1 = SHIN_Core::$_libs['datepicker']->get_instance(); 
        SHIN_Core::$_libs['templater']->assign('datepickerJsCode', $datepicker1->render('ppfm_entry_date'));
        
        $datepicker2 = SHIN_Core::$_libs['datepicker']->get_instance(); 
        SHIN_Core::$_libs['templater']->assign('datepickerJsCode2', $datepicker2->render('ppfm_account_lastUpdate'));
        
        return 'dialogs/' . $templates[$table];    
    }
    
    function ajaxDelete(){
        
        $id     =  SHIN_Core::$_input->post('active_record_id');
        $table  =  SHIN_Core::$_input->post('active_table');
        
        $result =  SHIN_Core::$_models[$table . '_model']->deleteRec($id);
        
        if($result) {
            $response['result']     =   true;
            $response['message']    =   SHIN_Core::$_language->line('lng_label_managment_delete_success');
        } else {
            $response['result']     =   false;
            $response['message']    =   SHIN_Core::$_language->line('lng_label_managment_delete_error');    
        }
        
        echo json_encode($response);
        exit();    
    }
    
    function ajaxNew(){
        
        $templates  =  array('ppfm_account'   =>  'account_dialog.tpl',
                             'ppfm_category'  =>  'category_dialog.tpl',
                             'ppfm_entry'     =>  'entry_dialog',
                             'ppfm_holder'    =>  'holder_dialog.tpl',
                             'sys_user'       =>  'user_dialog.tpl');
                              
        $table      =  SHIN_Core::$_input->post('active_table');
        
        $datePicker =   SHIN_Core::$_libs['datepicker']->get_instance();   
        SHIN_Core::$_libs['templater']->assign('datepickerJsCode', $datePicker->render('ppfm_entry_date'));
        
        $datePicker =   SHIN_Core::$_libs['datepicker']->get_instance();   
        SHIN_Core::$_libs['templater']->assign('datepickerJsCode2', $datePicker->render('ppfm_account_lastUpdate'));
        
        SHIN_Core::$_libs['templater']->assign(SHIN_Core::$_models[$table . '_model']->write_form());
        
        SHIN_Core::$_libs['templater']->assign('jsMessages',  SHIN_Core::$_libs['message']->getMessageBlock());
        SHIN_Core::$_libs['templater']->assign('jsErrors',    SHIN_Core::$_libs['message']->getErrorBlock());
            
        
        return 'dialogs/' . $templates[$table];
        
        exit();
    }
    
    function ajaxSaveNew(){
        
        $table                          =   SHIN_Core::$_input->post('active_table');
        
                                            SHIN_Core::$_models[$table . '_model']->read_form();
        $result                         =   SHIN_Core::$_models[$table . '_model']->validate_form();
        list($uniqueResult, $message)   =   $this->checkUnique($table);
        
        if($uniqueResult) {
            if(empty($result)) {
                SHIN_Core::$_models[$table . '_model']->save();
                
                echo json_encode(array('result'  => true,
                                       'errors'  => null,
                                       'message' => SHIN_Core::$_language->line('lng_label_managment_add_success')));    
            } else {
                echo json_encode(array('result'  => false,
                                       'errors'  => $result,  
                                       'message' => ''));    
            }
        } else {
            echo json_encode(array('result'         => false,
                                   'generalErrors'  => $message,  
                                   'message'        => ''));    
        }
        exit();   
    }
    
    protected function checkUnique($tableName) {
        $fields =   array();
        switch($tableName) {
            case 'ppfm_account':
                $fields =   array('account' => SHIN_Core::$_input->post('ppfm_account_account'));
                $message=   SHIN_Core::$_language->line('lng_label_managment_account_unique'); 
                break;
            case 'ppfm_category':
                $fields =   array('cat' => SHIN_Core::$_input->post('ppfm_category_cat'));
                $message=   SHIN_Core::$_language->line('lng_label_managment_category_unique');
                break;
            case 'ppfm_holder':
                $fields =   array('holder' => SHIN_Core::$_input->post('ppfm_holder_holder'));
                $message=   SHIN_Core::$_language->line('lng_label_managment_holder_unique');
                break;
        }
        
        return array(SHIN_Core::$_models[$tableName . '_model']->isUnique($fields), $message);
    }
}


?>
