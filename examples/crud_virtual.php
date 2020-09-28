<?php

/**
 * ShinPHP Demo part
 *
 * This demo show how work with CRUD virtual.
 *
 * @package       ShinPHP framework
 * @subpackage    Example
 * @category      CRUD virtual 
 * @author        
 */
    
    require_once("../shinfw/shinfw.php");

    $nedded_libs = array(
                            'help' => array(
                                'dump', 'url', 'date', 'array', 'validate', 'form'
                            ),

                            'core' => array(
                                'SHIN_Log',    
                                'SHIN_Benchmark',
                                'SHIN_JSManager',
                                'SHIN_CSSManager',
                                'SHIN_Database',
                                'SHIN_Input',
                                'SHIN_Language'
                            ),
                        
                            'libs' => array(
                                array('SHIN_Templater'=>'examples'),
                                'SHIN_Datatable',
                                'SHIN_Constants',
                                'SHIN_Session',
                                'SHIN_Message',
								'SHIN_Dialog',
                                'SHIN_Button'
                            ),
                            
                            'models' => array(
                                array('examples_user_model', 'examples_user_model'),
                            )
                         );
    
    // init fw core using needed components
    SHIN_Core::init($nedded_libs);
    
    // load external js file for CRUD screen
    SHIN_Core::$_jsmanager->insertJSFromFile(array(shinfw_base_url() . '/' . shinfw_folder() . '/js/crud/crud.class.js'));
    
    // init language
    SHIN_Core::$_language->load('app', 'en');
    SHIN_Core::$_current_lang = 'en';
    
    // manage user action
    $action =   SHIN_Core::$_input->globalarr('action');
    if(!empty($action)) {
        switch($action) {
            case 'read':
                $userId =   SHIN_Core::$_input->globalarr('userId');
                
                if(!empty($userId)) {
                    // retrive data from db and send using json
                    SHIN_Core::$_models['examples_user_model']->fetchByID($userId);
                }
                    SHIN_Core::$_libs['templater']->assign(SHIN_Core::$_models['examples_user_model']->write_form());
       
                    SHIN_Core::finalrender('virtual/user-info');
                
                break;
            
            case 'write':
                SHIN_Core::$_models['examples_user_model']->read_form();
                SHIN_Core::$_models['examples_user_model']->save();
                
                echo json_encode(array('result' => true, 'message' => 'Create/Edit done.')); exit();
                break;
            
            case 'validate':
                SHIN_Core::$_models['examples_user_model']->read_form();
                $result = SHIN_Core::$_models['examples_user_model']->validate_form();
                
                if(empty($result)) {
                    echo json_encode(array('result'  => true,
                                           'errors'  => null));    
                } else {
                    echo json_encode(array('result'  => false,
                                           'errors'  => $result));    
                }
                break;
        }
        
        exit();
    }
    
    
    
    // init ddatatable for drawing ticket list
    $dt             = SHIN_Core::$_libs['datatable']->get_instance();
    
    $_tableclass    = 'display';
    $_css_column    = 'gradeC';
    $_element_id    = 'eventList';    
    $_dom_element   = 'ssstylemustbehere';
    $_display_data  = array();
    $_table_data    = array('ID', 'Lang', 'Status', 'Name', 'Last Name', 'Email', 'User Name', 'Pwd', 'Theme', '');
    
    // initialize ajax type of datatable                                                             
    
    $modelName = 'snaptrack_circuits_model';
    $fnServerData = 'function ( sSource, aoData, fnCallback ) {
                                        /* Add some extra data to the sender */
                                        aoData.push( { "name": "model_name",      "value": "examples_user_model|examples_user_model" } ),
                                        aoData.push( { "name": "needed_column",   "value": "userId,sys_user_lang,sys_user_status,sys_user_name,sys_user_lastname,sys_user_email,sys_user_username,sys_user_pwd,sys_user_theme" } ),
                                        aoData.push( { "name": "custom_column",   "value": "edit" } ),
                                        aoData.push( { "name": "crud_obj_name",   "value": "virtualCrudObj" } ),
                                        
                                        $.ajax( {
                                            "dataType": \'json\', 
                                            "type": "POST", 
                                            "url": sSource, 
                                            "data": aoData,
                                            "success": fnCallback
                                        } );
                                    }';

    
    $init_options    = array('bProcessing'  => 'true', 
                             'bServerSide'  => 'true', 
                             'fnServerData' => $fnServerData,
                             'aoColumns'    => '[null,null,null,null,null,null,null,null,null,{"bSortable":false}]',
                             'sAjaxSource'  => "'" . shinfw_base_url() . '/' . shinfw_folder() . '/connectors/SHIN_CorrectConnectorJoin.php'."'");
    $dt->init($init_options);
    
    // initialize datatable with events, selected fields, etc
    $dt->setLanguage(SHIN_Core::$_current_lang);
    $dt->init($init_options);
    $data_inject = $dt->initSSStyle($_dom_element, $_element_id, $_tableclass, $_display_data, $_table_data);
    SHIN_Core::$_jsmanager->addComponent($dt->render($_element_id));
    SHIN_Core::$_libs['templater']->assign('datatbleName', $_element_id);
    
    // init add dialog
    SHIN_Core::$_libs['dialog']->init(array('width' => 400));
    SHIN_Core::$_libs['dialog']->confirm_dialog_correct('userManage-add-dialog', 'Add user', null, Array('Cancel' => 'virtualCrudObj.params.general.dialogObj.close("add-dialog")', 'Ok' => 'virtualCrudObj.write("add-dialog")'));
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['dialog']->render('userManage-add-dialog'));
    
    // init edit dialog
    SHIN_Core::$_libs['dialog']->init(array('width' => 400));
    SHIN_Core::$_libs['dialog']->confirm_dialog_correct('userManage-edit-dialog', 'Edit user', null, Array('Cancel' => 'virtualCrudObj.params.general.dialogObj.close("edit-dialog")', 'Ok' => 'virtualCrudObj.write("edit-dialog")'));
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['dialog']->render('userManage-edit-dialog'));
        
    
    // init messages and errors blocks
    SHIN_Core::$_libs['templater']->assign('jsMessages',  SHIN_Core::$_libs['message']->getMessageBlock('application-js-message'));
    SHIN_Core::$_libs['templater']->assign('jsErrors',    SHIN_Core::$_libs['message']->getErrorBlock('application-js-error'));
    
    // init add button
    $options    = array('click' => 'virtualCrudObj.openDialog(null, "add"); return false;',
                        'label' => '"Add User"');
    // init component using needed options
    SHIN_Core::$_libs['button']->init($options);
    
    // add component to the page
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['button']->render('#add_user_button'));
    
    // init JS CRUD object
    $crudInitData   =   array('tab_name'            =>   'userManage',
                              'dialog_css_class'    =>   'crud-dialog-class',
                              'label_delete_action' =>   'lng_label_event_delete_really',
                              'crud_obj_name'       =>   'virtualCrudObj',
                              'datatable_name'      =>   $_element_id,
                              'message_block'       =>   'application-js-message',
                              'error_block'         =>   'application-js-error',
                              'error_prefix'        =>   '_error',
                              'validation_class'    =>   '.validatetion-error',
                              'controller'          =>   'admineventcontroller',
                              'custom_url'          =>   array('read'       =>  '/crud_virtual.php?action=read',
                                                               'validate'   =>  '/crud_virtual.php?action=validate',
                                                               'write'      =>  '/crud_virtual.php?action=write',
                                                               'del'        =>  '/crud_virtual.php?action=del'));
    
    SHIN_Core::$_libs['templater']->assign('crudData', SHIN_Core::$_models['examples_user_model']->prepareCodeforCRUD($crudInitData));
    
    //render main example template
    SHIN_Core::finalrender('crud_virtual');    

/* End of file crud_virtual.php */
/* Location: example/crud_virtual.php */
