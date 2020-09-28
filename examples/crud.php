<?php

/**
 * ShinPHP Demo part
 *
 * This demo show how work with CRUD.
 *
 * @package       ShinPHP framework
 * @subpackage    Example
 * @category      CRUD
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
                                'SHIN_Message',
								'SHIN_Text_Editor',
                                'SHIN_Masked_Input',
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
        case 'Read':
            $id =   SHIN_Core::$_input->post('record_id');
            
            // retrive data from db write to the template
            SHIN_Core::$_models['examples_customer_master_data_model']->fetchByID($id);
            SHIN_Core::$_libs['templater']->assign(SHIN_Core::$_models['examples_customer_master_data_model']->write_form());
            break;
        
        case 'Write':
            $id =   SHIN_Core::$_input->post('record_id');
            
            // read form                                                     
            SHIN_Core::$_models['examples_customer_master_data_model']->read_form();

            // validate form and check result
            $result = SHIN_Core::$_models['examples_customer_master_data_model']->validate_form();
            
            if(empty($result)) {
                SHIN_Core::$_models['examples_customer_master_data_model']->save();
                $message->addMessage('<strong>Success</strong> update.');
            } else {
                $message->addError('<strong>Error</strong> occure while update');   
            }
            
            SHIN_Core::$_libs['templater']->assign('errorResult', $result);
        
        default:
            SHIN_Core::$_libs['templater']->assign(SHIN_Core::$_models['examples_customer_master_data_model']->write_form());        
    }
    
    // get instance of datatable component
    $dt = SHIN_Core::$_libs['datatable']->get_instance();
    
    // datatable events, fields, etc
    $_element_id    = 'sample_element';
    $_tableclass    = 'display';
    $_dom_element   = 'domstylemustbehere';
    $_css_column    = 'gradeC';
    $_display_data  = array();
    $_table_data    = array('Record ID', 'Name', 'Surname', 'Company', 'Address', 'City', 'Birth Date', 'Telephone', 'Credit Card Number', 'Special Number', 'Debid', 'Type');
    
    // fetch needed data for visualization 
    $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get('examples_customer_master_data');
    foreach ($query->result_array() as $row)
    {
        array_push($_display_data, array('csscolumn'=>$_css_column, 'datacolumn'=>array($row['id'], $row['name'], $row['surname'], $row['company'], $row['address'],
                                                                                        $row['city'], fromDbToDisplay($row['birth_date']), $row['telefon_number'], $row['credit_card_number'],
                                                                                        $row['special_number'], $row['debit'], $row['type'])));
    }
    $query->free_result();
    
    // initialize datatable with events, selected fields, etc
    $dt->initDOMStyle($_dom_element, $_element_id, $_tableclass, $_display_data, $_table_data);    
    SHIN_Core::$_jsmanager->addComponent($dt->render($_element_id));
    
    // transfer parameter to the view
    SHIN_Core::$_libs['templater']->assign('action',    $action);
    SHIN_Core::$_libs['templater']->assign('record_id', $id);
    
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['message']->render('message'));
    
    //render main example template
    SHIN_Core::finalrender('crud');    

/* End of file crud.php */
/* Location: example/crud.php */
