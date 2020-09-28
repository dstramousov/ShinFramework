<?php

/**
 * ShinPHP Demo part
 *
 * This demo show how work with Datatables.
 *
 * @package		ShinPHP framework
 * @subpackage	Example
 * @category		Datatble
 * @author		
 * @link		All examples you can find there: http://datatables.net/examples/
 */
	// include main fw file
	require_once("../shinfw/shinfw.php");
	// array of libs, models, helpers, core components
    $nedded_libs = array(
    	                    'help' => array(
	                            'dump', 'url', 'form', 'date', 'array'
	                        ),

	                        'core' => array(
	                            'SHIN_Log',	
//	                            'SHIN_Benchmark',
	                            'SHIN_JSManager',
	                            'SHIN_CSSManager',
	                            'SHIN_Database',
                                'SHIN_Language',
                                'SHIN_Input'
	                        ),
                        
    	                    'libs' => array(
        	                    array('SHIN_Templater'=>'examples'),
	                            'SHIN_Datatable',
                                'SHIN_Dialog',
                                'SHIN_Message',
                                'SHIN_Button'
	                        ),
                             'models' => array(array('examples_file_tracking_model', 'examples_file_tracking_model'))
	                     );
    
    // init fw core using needed components                 
    SHIN_Core::init($nedded_libs);
    
    // get info about user action.
    $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;
    
    // manage actions
    switch($action) {
        case 'read':
            if(is_array(SHIN_Core::$_models['examples_file_tracking_model']->primary_key)) {
                $where  =   array();
                foreach(SHIN_Core::$_models['examples_file_tracking_model']->primary_key as $key) {
                    $where[$key]    =   SHIN_Core::$_input->globalarr($key);    
                }
            } else {
                $where  =   SHIN_Core::$_input->globalarr(SHIN_Core::$_models['examples_file_tracking_model']->primary_key);   
            }
            
            
            SHIN_Core::$_models['examples_file_tracking_model']->fetchByID($where);
            SHIN_Core::$_libs['templater']->assign(SHIN_Core::$_models['examples_file_tracking_model']->write_form());

           dump(SHIN_Core::finalrender('datatable_smartinit'.DIRECTORY_SEPARATOR.'dialog')) ;
            SHIN_Core::finalrender('datatable_smartinit'.DIRECTORY_SEPARATOR.'dialog'); exit();
            
            
            break;
        case 'validate':
                      SHIN_Core::$_models['examples_file_tracking_model']->read_form();
            $result = SHIN_Core::$_models['examples_file_tracking_model']->validate_form();
            
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
            
            SHIN_Core::$_models['examples_file_tracking_model']->read_form();
            SHIN_Core::$_models['examples_file_tracking_model']->save();
            
            echo json_encode(array('result' => true, 'message' => 'Record was successfully created/edited')); exit();
            break;
        
        case 'delete':
        
            $keys   =   !is_array(SHIN_Core::$_models['examples_file_tracking_model']->primary_key) ? (array)SHIN_Core::$_models['examples_file_tracking_model']->primary_key : SHIN_Core::$_models['examples_file_tracking_model']->primary_key;
            $where  =   array();
            foreach($keys as $key) {
                $where[$key]    =   SHIN_Core::$_input->globalarr($key);    
            }
            
            $result = SHIN_Core::$_models['examples_file_tracking_model']->deleteRec($where);
            
            echo json_encode(array('result' => $result, 'message' => 'Record was successfully deleted')); exit();
            break;
    }
    
    // load languages
    SHIN_Core::$_current_lang = 'en';
    SHIN_Core::$_language->load('app', 'en');
        

	// ALL NEEDED LOGIC THERE /////////////////////////////////////////////////////////////////////////////////////////////////
	$init_data = array(
						'tab_name'      => 'examples_file_tracking',
						'model_name'    => 'examples_file_tracking',
                        'dom_element'   => 'domelement',
                        'crud_edit'     => true,
                        'crud_delete'   => true,
                        'crud_name'     => 'crudObj',
                        'connector'     => '"' . SHIN_Core::$_config['core']['shinfw_base_url'] . '/' . shinfw_folder()  . '/connectors/SHIN_CorrectConnectorJoin.php' . '"',
						'display_data'	=> array('id', 'file_id', 'count', 'created'),
                        'table_labels'  => array('ID', 'File', 'Count', 'Created')
	);
    
	$crud_data = array( 'tab_name'				=> 'example',
                        'label_delete_action'   => 'lng_label_delete_really',
                        'custom_url'            => array('read'       =>  'datatables_smartinit.php/?action=read',
                                                         'validate'   =>  'datatables_smartinit.php/?action=validate',
                                                         'write'      =>  'datatables_smartinit.php/?action=create',
                                                         'del'        =>  'datatables_smartinit.php/?action=delete'),
						'lng_for_delete'		=> 'lng_label_delete_really',
						'lng_for_edit'			=> 'lng_label_edit_really',
						'lng_for_add'			=> 'lng_label_add_really',						
					   );
	
    SHIN_Core::$_libs['datatable']->smartInit($init_data, $crud_data);
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    //render main example template
	SHIN_Core::finalrender('datatables_smartinit');	

/* End of file datatbles.php */
/* Location: example/datatbles.php */
