<?php

/**
 * ShinPHP Demo part
 *
 * This demo show how work with CRUD.
 *
 * @package       ShinPHP framework
 * @subpackage    Example
 * @category      CRUD Ajax
 * @author        
 */
    
    // include main fw file
    require_once("../shinfw/shinfw.php");
    // array of libs, models, helpers, core components
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
                                'SHIN_Session',
                                'SHIN_Text_Editor',
                                'SHIN_Message',
                                'SHIN_Dialog',
                                'SHIN_Datepicker',
                                'SHIN_Button'
                            ),
                            
                            'models' => array(
                                array('examples_customer_master_data_model', 'examples_customer_master_data_model'),
                            )
                         );
    
    // init fw core using needed components                 
    SHIN_Core::init($nedded_libs);
    
    // load external js file for CRUD screen
    SHIN_Core::$_jsmanager->insertJSFromFile(array(shinfw_base_url() . '/' . shinfw_folder() . '/' . '/js/crud/crud.class.js'));
    
    // get info about user action.
    $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;
    
    // load languages
    SHIN_Core::$_language->load('app', 'en');
    
    switch($action) {
        case 'read':
            if(is_array(SHIN_Core::$_models['examples_customer_master_data_model']->primary_key)) {
                $where  =   array();
                foreach(SHIN_Core::$_models['examples_customer_master_data_model']->primary_key as $key) {
                    $where[$key]    =   SHIN_Core::$_input->post($key);    
                }
            } else {
                $where  =   SHIN_Core::$_input->post(SHIN_Core::$_models['examples_customer_master_data_model']->primary_key);   
            }
            
            
            SHIN_Core::$_models['examples_customer_master_data_model']->fetchByID($where);
            SHIN_Core::$_libs['templater']->assign(SHIN_Core::$_models['examples_customer_master_data_model']->write_form());
            
            SHIN_Core::finalrender('ajax_datatable_managment'.DIRECTORY_SEPARATOR.'dialog'); exit();
            
            
            break;
        case 'validate':
                      SHIN_Core::$_models['examples_customer_master_data_model']->read_form();
            $result = SHIN_Core::$_models['examples_customer_master_data_model']->validate_form();
            
            if(empty($result)) {
                echo json_encode(array('result'  => true,
                                       'errors'  => null));    
            } else {
                echo json_encode(array('result'  => false,
                                       'errors'  => $result));    
            }
            exit();
            break;
        case 'create':
            
            SHIN_Core::$_models['examples_customer_master_data_model']->read_form();
            SHIN_Core::$_models['examples_customer_master_data_model']->save();
            
            echo json_encode(array('result' => true, 'message' => 'Record was successfully created/edited')); exit();
            break;
        
        case 'delete':
        
            $keys   =   !is_array(SHIN_Core::$_models['examples_customer_master_data_model']->primary_key) ? (array)SHIN_Core::$_models['examples_customer_master_data_model']->primary_key : SHIN_Core::$_models['examples_customer_master_data_model']->primary_key;
            $where  =   array();
            foreach($keys as $key) {
                $where[$key]    =   SHIN_Core::$_input->post($key);    
            }
            
            $result = SHIN_Core::$_models['examples_customer_master_data_model']->deleteRec($where);
            
            echo json_encode(array('result' => $result, 'message' => 'Record was successfully deleted')); exit();
            break;
    }
    
    // get instance of datatable component
    $dt = SHIN_Core::$_libs['datatable']->get_instance();
    
    // datatable events, fields, etc
    $_element_id    = 'sample_element';
    $_dom_element   = 'ssstylemustbehere';
    $_table_data    = array('Record ID', 'Name', 'Surname', 'Company', 'Address', 'City', 'Birth Date', 'Telephone', 'Credit Card Number', 'Special Number', 'Debid', 'Type', 'Note' , '', '');
    $_tableclass    = 'display';
    $_display_data  = array();
    
    // initialize ajax type of datatable
    $fnServerData = 'function ( sSource, aoData, fnCallback ) {
                                        /* Add some extra data to the sender */
                                        aoData.push( { "name": "model_name", "value": "examples_customer_master_data_model|examples_customer_master_data_model" } ),
                                        aoData.push( { "name": "custom_column", "value": "edit,delete" } ),
                                        aoData.push( { "name": "needed_column", "value": "id,name,surname,company,address,city,birth_date,telefon_number,credit_card_number,special_number,debit,type,note" } ),
                                        aoData.push( { "name": "crud_obj_name",   "value": "exampleCrudObj" } ),
                                        
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
                             'aoColumns'    => '[null,null,null,null,null,null,null,null,null,null,null,null,{"bVisible":false},{"bSortable": false},{"bSortable": false}]',
                             'sAjaxSource'  => "'".SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'].'/connectors/SHIN_CorrectConnectorJoin.php'."'");
    $dt->init($init_options);
    
    // initialize datatable with events, selected fields, etc
    $data_inject = $dt->initSSStyle($_dom_element, $_element_id, $_tableclass, $_display_data, $_table_data);
    SHIN_Core::$_jsmanager->addComponent($dt->render($_element_id));
    
    // init notify dialog for delete action
    SHIN_Core::$_libs['dialog']->set_title('Delete this record?');
    SHIN_Core::$_libs['dialog']->confirm_dialog_correct('example-delete-dialog', 'Delete this record?', 'Content', Array('Cnacel' => 'exampleCrudObj.params.general.dialogObj.close("delete-dialog")', 'Ok' => 'exampleCrudObj.del(null, null)'));
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['dialog']->render('example-delete-dialog'));
    
    // init edit dialog
    SHIN_Core::$_libs['dialog']->init(array('width' => 500));
    SHIN_Core::$_libs['dialog']->confirm_dialog_correct('example-edit-dialog', 'Edit record', null, Array('Cancel' => 'exampleCrudObj.params.general.dialogObj.close("edit-dialog")', 'Save' => 'exampleCrudObj.write("edit-dialog")'));
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['dialog']->render('example-edit-dialog'));
    
    // init add dialog
    SHIN_Core::$_libs['dialog']->init(array('width' => 450));
    SHIN_Core::$_libs['dialog']->confirm_dialog_correct('example-add-dialog', 'Add new record', null, Array('Cancel' => 'exampleCrudObj.params.general.dialogObj.close("add-dialog")', 'Add' => 'exampleCrudObj.write("add-dialog")'));
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['dialog']->render('example-add-dialog'));

    // init messages and errors blocks
    SHIN_Core::$_libs['templater']->assign('jsMessages',  SHIN_Core::$_libs['message']->getMessageBlock());
    SHIN_Core::$_libs['templater']->assign('jsErrors',    SHIN_Core::$_libs['message']->getErrorBlock());
    
     // add note message
    SHIN_Core::$_libs['message']->addMessage(SHIN_Core::$_language->line('lng_label_category_note'));
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['message']->render('message'));
    
    // init add button
    $options    = array('click' => 'exampleCrudObj.openDialog(null, "edit"); return false;',
                        'label' => '"Add new record"');
    // init component using needed options
    SHIN_Core::$_libs['button']->init($options);
    
    // add component to the page
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['button']->render('#add_example_button'));
    
    // init JS CRUD object
    $crudInitData   =   array('tab_name'            =>   'example',
                              'dialog_css_class'    =>   'crud-dialog-class',
                              'label_delete_action' =>   'lng_label_delete_really',
                              'crud_obj_name'       =>   'exampleCrudObj',
                              'datatable_name'      =>   'sample_element',
                              'message_block'       =>   'js-message',
                              'error_block'         =>   'js-error',
                              'error_prefix'        =>   '_error',
                              'validation_class'    =>   '.validation-error',
                              'custom_url'          =>   array('read'       =>  'ajax_datatable_managment.php/?action=read',
                                                               'validate'   =>  'ajax_datatable_managment.php/?action=validate',
                                                               'write'      =>  'ajax_datatable_managment.php/?action=create',
                                                               'del'        =>  'ajax_datatable_managment.php/?action=delete'));
    SHIN_Core::$_libs['templater']->assign('crudData', SHIN_Core::$_models['examples_customer_master_data_model']->prepareCodeforCRUD($crudInitData));
    
    //render main example template
    SHIN_Core::finalrender('ajax_datatable_managment');    

/* End of file ajax_datatable_managment.php */
/* Location: example/ajax_datatable_managment.php */
