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
                                'SHIN_Message'
                            ),
                            
                            'models' => array(
                                array('examples_customer_master_data_model', 'examples_customer_master_data_model'),
                            )
                         );
    
    // init fw core using needed components                 
    SHIN_Core::init($nedded_libs);
    
    // get instance of message component
    $message = SHIN_Core::$_libs['message']->get_instance();
               SHIN_Core::$_language->load('app');
    
    // get user action
    $action = SHIN_Core::$_input->post('action');
    $id     = null;
    
    switch($action) {
        case 'read':
            $id =   SHIN_Core::$_input->post('id');
            
            // retrive data from db and send using json
            $result = SHIN_Core::$_models['examples_customer_master_data_model']->fetchByID($id);
            
            echo json_encode(array('type'               => SHIN_Core::$_models['examples_customer_master_data_model']->type,
                                   'name'               => SHIN_Core::$_models['examples_customer_master_data_model']->name,
                                   'surname'            => SHIN_Core::$_models['examples_customer_master_data_model']->surname,
                                   'company'            => SHIN_Core::$_models['examples_customer_master_data_model']->company,
                                   'address'            => SHIN_Core::$_models['examples_customer_master_data_model']->address,
                                   'city'               => SHIN_Core::$_models['examples_customer_master_data_model']->city,
                                   'birth_date'         => fromDbToDisplay(SHIN_Core::$_models['examples_customer_master_data_model']->birth_date),
                                   'telefon_number'     => SHIN_Core::$_models['examples_customer_master_data_model']->telefon_number,
                                   'credit_card_number' => SHIN_Core::$_models['examples_customer_master_data_model']->credit_card_number,
                                   'special_number'     => SHIN_Core::$_models['examples_customer_master_data_model']->special_number,
                                   'debit'              => SHIN_Core::$_models['examples_customer_master_data_model']->debit,
                                   'id'                 => SHIN_Core::$_models['examples_customer_master_data_model']->id,
                                   'note'                 => SHIN_Core::$_models['examples_customer_master_data_model']->note)
								   );
            exit();
            
            break;
        
        case 'Write':
            $id =   SHIN_Core::$_input->post('id');
            
            // read data from form
                      SHIN_Core::$_models['examples_customer_master_data_model']->read_form();
            // validate form and check result
            $result = SHIN_Core::$_models['examples_customer_master_data_model']->validate_form();
            
            if(empty($result)) {
               // save form data into db 
               SHIN_Core::$_models['examples_customer_master_data_model']->save();
               
               echo json_encode(array('result'  => true,
                                      'errors'  => null,
                                      'message' => 'Record was successfully updated.'));
               exit();
            } else {
               echo json_encode(array('result'  => false,
                                      'errors'  => $result,  
                                      'message' => ''));
               exit();
            }
            
            SHIN_Core::$_libs['templater']->assign('errorResult', $result);
        
        default:
            SHIN_Core::$_libs['templater']->assign(SHIN_Core::$_models['examples_customer_master_data_model']->write_form());        
    }
    
    // get instance of datatable component
    $dt = SHIN_Core::$_libs['datatable']->get_instance();
    
    // datatable events, fields, etc
    $_element_id    = 'sample_element';
    $_dom_element   = 'ssstylemustbehere';
    $_table_data    = array('Record ID', 'Name', 'Surname', 'Company', 'Address', 'City', 'Birth Date', 'Telephone', 'Credit Card Number', 'Special Number', 'Debid', 'Type', 'Note');
    $_tableclass    = 'display';
    $_display_data  = array();
    
    // initialize ajax type of datatable
    $fnServerData = 'function ( sSource, aoData, fnCallback ) {
                                        /* Add some extra data to the sender */
                                        aoData.push( { "name": "model_name",    "value": "examples_customer_master_data_model|examples_customer_master_data_model" } ),
                                        aoData.push( { "name": "needed_column", "value": "id,name,surname,company,address,city,birth_date,telefon_number,credit_card_number,special_number,debit,type,note" } ),
                                            
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
                             'aoColumns'    => '[null,null,null,null,null,null,null,null,null,null,null,null,{"bVisible":false}]',
                             'sAjaxSource'  => "'" . shinfw_base_url() . '/' . shinfw_folder() . '/connectors/SHIN_CorrectConnectorJoin.php'."'");
    $dt->init($init_options);
    
    // initialize datatable with events, selected fields, etc
    $data_inject = $dt->initSSStyle($_dom_element, $_element_id, $_tableclass, $_display_data, $_table_data);
    SHIN_Core::$_jsmanager->addComponent($dt->render($_element_id));
    
    // transfer parameter to the view
    SHIN_Core::$_libs['templater']->assign('action',    $action);
    SHIN_Core::$_libs['templater']->assign('record_id', $id);
    SHIN_Core::$_libs['templater']->assign('basePath',  base_url());
    
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['message']->render('message'));
    
    //render main example template
    SHIN_Core::finalrender('crud_ajax');    

/* End of file crud_ajax.php */
/* Location: example/crud_ajax.php */
