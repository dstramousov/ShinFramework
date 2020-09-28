<?php

require "CommonController.php";

class AdminEventController extends CommonController {
    
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
    * Default and main function for manage circuit/events
    * 
    * @access public
    * @param null
    * @return json result
    */
    public function index()
	{
        // init needed libs
        $nedded_libs = array(   
                                'help'   => array('form', 'date'),
                                'libs'   => array('SHIN_Datatable',
                                                  'SHIN_Dialog',
                                                  'SHIN_Button',
                                                  'SHIN_Message',
                                                  'SHIN_Upload'),
                                'models' => array(array('trk_circuits_model', 'trk_circuits_model'))
                            );
		
        
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
		
        // init ddatatable for drawing ticket list
        $dt             = SHIN_Core::$_libs['datatable']->get_instance();
        
        $_tableclass    = 'display';
        $_css_column    = 'gradeC';
        $_element_id    = 'eventList';    
        $_dom_element   = 'ssstylemustbehere';
        $_display_data  = array();
        $_table_data    = array(SHIN_Core::$_language->line('lng_label_circuit_management_id'),
                                SHIN_Core::$_language->line('lng_label_circuit_management_name'),
                                SHIN_Core::$_language->line('lng_label_circuit_management_type'),
                                SHIN_Core::$_language->line('lng_label_circuit_management_country'),
                                SHIN_Core::$_language->line('lng_label_lang_img_circuit'),
                                '', '');
        
        // initialize ajax type of datatable                                                             
		
		$modelName = 'trk_circuits_model';
        $fnServerData = 'function ( sSource, aoData, fnCallback ) {
                                            /* Add some extra data to the sender */
                                            aoData.push( { "name": "model_name",      "value": "' . $modelName . '|' . $modelName . '" } ),
                                            aoData.push( { "name": "needed_column",   "value": "idCircuit,circuit,circuitType,country,association_image" } ),
                                            aoData.push( { "name": "custom_column",   "value": "edit,delete" } ),
                                            aoData.push( { "name": "crud_obj_name",   "value": "snptCircuitCrudObj" } ),
                                            
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
                                 'aoColumns'    => '[null,null,null,null,null,{"bSortable":false},{"bSortable":false}]',
                                 'sAjaxSource'      => "'" . SHIN_Core::$_config['core']['app_base_url'] . '/connectors/SHIN_CorrectConnectorJoin.php'."'");
        $dt->init($init_options);
        
        // initialize datatable with events, selected fields, etc
        $dt->setLanguage(SHIN_Core::$_current_lang);
        $dt->init($init_options);
        $data_inject = $dt->initSSStyle($_dom_element, $_element_id, $_tableclass, $_display_data, $_table_data);
        SHIN_Core::$_jsmanager->addComponent($dt->render($_element_id));
        SHIN_Core::$_libs['templater']->assign('datatbleName', $_element_id);
        
        // init notify dialog for delete action
        SHIN_Core::$_libs['dialog']->set_title(SHIN_Core::$_language->line('lng_label_event_delete'));
        SHIN_Core::$_libs['dialog']->confirm_dialog_correct('circuitManage-delete-dialog', SHIN_Core::$_language->line('lng_label_event_delete_title'), 'Content', Array(SHIN_Core::$_language->line('lng_label_sys_user_cancel') => 'snptCircuitCrudObj.params.general.dialogObj.close("delete-dialog")', SHIN_Core::$_language->line('lng_label_sys_user_delete_ok') => '$("#circuitManage-delete-dialog").dialog("close"); $("#sure-dialog").dialog("open");'));
        SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['dialog']->render('circuitManage-delete-dialog'));
        
        // init 'are you sure dialog'
        SHIN_Core::$_libs['dialog']->set_title(SHIN_Core::$_language->line('lng_label_event_delete'));
        SHIN_Core::$_libs['dialog']->confirm_dialog_correct('sure-dialog', SHIN_Core::$_language->line('lng_label_event_delete_title'), 'Content', Array(SHIN_Core::$_language->line('lng_label_sys_user_cancel') => '$("#sure-dialog").dialog("close");', SHIN_Core::$_language->line('lng_label_sys_user_delete_ok') => 'snptCircuitCrudObj.del(null, null); $("#sure-dialog").dialog("close");'));
        SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['dialog']->render('sure-dialog'));
        
        // init edit dialog
        SHIN_Core::$_libs['dialog']->init(array('width' => 500));
        SHIN_Core::$_libs['dialog']->confirm_dialog_correct('circuitManage-edit-dialog', SHIN_Core::$_language->line('lng_label_event_edit'), null, Array(SHIN_Core::$_language->line('lng_label_sys_user_edit_cancel') => 'snptCircuitCrudObj.params.general.dialogObj.close("edit-dialog")', SHIN_Core::$_language->line('lng_label_sys_user_edit_ok') => 'snptCircuitCrudObj.write("edit-dialog", collectAdditionalData, uploadCallback)'));
        SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['dialog']->render('circuitManage-edit-dialog'));
        
        // init add dialog
        SHIN_Core::$_libs['dialog']->init(array('width' => 450));
        SHIN_Core::$_libs['dialog']->confirm_dialog_correct('circuitManage-add-dialog', SHIN_Core::$_language->line('lng_label_event_add_title'), null, Array(SHIN_Core::$_language->line('lng_label_sys_user_add_cancel') => 'snptCircuitCrudObj.params.general.dialogObj.close("add-dialog")', SHIN_Core::$_language->line('lng_label_sys_user_add_ok') => 'snptCircuitCrudObj.write("add-dialog", collectAdditionalData, uploadCallback)'));
        SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['dialog']->render('circuitManage-add-dialog'));

        // init messages and errors blocks
        SHIN_Core::$_libs['templater']->assign('jsMessages',  SHIN_Core::$_libs['message']->getMessageBlock('application-js-message'));
        SHIN_Core::$_libs['templater']->assign('jsErrors',    SHIN_Core::$_libs['message']->getErrorBlock('application-js-error'));
        
        // init add button
        $options    = array('click' => 'snptCircuitCrudObj.openDialog(null, "add"); return false;',
                            'label' => '"' . SHIN_Core::$_language->line('lng_label_add_event') . '"');
        // init component using needed options
        SHIN_Core::$_libs['button']->init($options);
        
        // add component to the page
        SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['button']->render('#add_circuit_button'));
        
        // transfer some base params to the view
        //SHIN_Core::$_libs['templater']->assign('tabName', $this->tabName);
        
        // init JS CRUD object
        $crudInitData   =   array('tab_name'            =>   'circuitManage',
                                  'dialog_css_class'    =>   'crud-dialog-class',
                                  'label_delete_action' =>   'lng_label_event_delete_really',
                                  'crud_obj_name'       =>   'snptCircuitCrudObj',
                                  'datatable_name'      =>   $_element_id,
                                  'message_block'       =>   'application-js-message',
                                  'error_block'         =>   'application-js-error',
                                  'error_prefix'        =>   '_error',
                                  'validation_class'    =>   '.validatetion-error',
                                  'controller'          =>   'admineventcontroller');
        SHIN_Core::$_libs['templater']->assign('crudData', SHIN_Core::$_models[$modelName]->prepareCodeforCRUD($crudInitData));
        
        return 'admin/event/index.tpl';
    } // end of function 
	
    /**
    * Add Circuit/Event information
    * 
    * @access public
    * @param null
    * @return json result
    */
    public function create()
	{
        // init needed libs
        $nedded_libs = array(   'help'   => array('form', 'validate', 'array', 'date'),
                                'models' => array(array('trk_circuits_model', 'trk_circuits_model'))
                             );
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        SHIN_Core::$_models['trk_circuits_model']->read_form();
        SHIN_Core::$_models['trk_circuits_model']->save();
        
        echo json_encode(array('result' => true, 'message' => SHIN_Core::$_language->line('lng_label_create_success'))); exit();
    } // end of function 
    
    /**
    * Validate Circuit/Event information
    * 
    * @access public
    * @param null
    * @return json result
    */
    public function validate()
	{        
        // init needed libs
        $nedded_libs = array(   'help'   => array('form', 'validate', 'array', 'date'),
                                'models' => array(array('trk_circuits_model','trk_circuits_model'))
                             );
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        SHIN_Core::$_models['trk_circuits_model']->read_form();
        $result = SHIN_Core::$_models['trk_circuits_model']->validate_form();
        
        if(empty($result)) {
            echo json_encode(array('result'  => true,
                                   'errors'  => null));    
        } else {
            echo json_encode(array('result'  => false,
                                   'errors'  => $result));    
        }
        exit();
    } // end of function 
	
    /**
    * Delete Circuit/Event struct
    * 
    * @access public
    * @param null
    * @return redirect
    */
    public function delete()
	{
        // init needed libs
        $nedded_libs = array(
                                'models' => array(
													array('trk_photo_model', 'trk_photo_model'),
													array('trk_circuits_model', 'trk_circuits_model'),								
													array('trk_uploadactivity_model', 'trk_uploadactivity_model'),
												  )
                             );
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
		
		if(SHIN_Core::$_input->post('idCircuit')){
			$where = SHIN_Core::$_input->post('idCircuit');
		} else {
			echo json_encode(array('result' => FALSE, 'message' => SHIN_Core::$_language->line('lng_label_delete_error'))); 
			exit(); // !!!!!!!!!!!!!!!  
		}
        
		//SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->delete('snaptrack_circuits', array('id' => $id));
        $result = SHIN_Core::$_models['trk_circuits_model']->deleteRec($where);
        
        echo json_encode(array('result' => $result, 'message' => SHIN_Core::$_language->line('lng_label_delete_success'))); exit();
    } // end of function 
    
    /**
    * Read Circuit/Event data
    * 
    * @access public
    * @param null
    * @return rendered template
    * 
    */
    public function read()
	{
        // init needed libs
        $nedded_libs = array(   'help'   => array('form', 'date'),
                                'models' => array(array('trk_circuits_model','trk_circuits_model')),
                                'libs'   => array('SHIN_Upload')
                             );
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        if(is_array(SHIN_Core::$_models['trk_circuits_model']->primary_key)) {
            $where  =   array();
            foreach(SHIN_Core::$_models['trk_circuits_model']->primary_key as $key) {
                $where[$key]    =   SHIN_Core::$_input->post($key);    
            }
        } else {
            $where  =   SHIN_Core::$_input->post(SHIN_Core::$_models['trk_circuits_model']->primary_key);   
        }
                
        SHIN_Core::$_models['trk_circuits_model']->fetchByID($where);
        SHIN_Core::$_libs['templater']->assign(SHIN_Core::$_models['trk_circuits_model']->write_form());
//		dump(SHIN_Core::$_models['trk_circuits_model']->write_form());
        
        // init additional components
        $uploaderOptions = array('fileDataName'     => '"trk_circuit_image"',
                                 'auto'             => 'false',
                                 'queueSizeLimit'   => 1,
                                 'simUploadLimit'   => 1,
                                 'script'           => "'" . prep_url(base_url().'/adminevent/upload') . "'",
                                 'onSelect'         => 'onSelectCallback',
                                 'onCancel'         => 'onCancelCallback',
                                 'onComplete'       => 'onComplete');
    
        // init uploader first button                         
        SHIN_Core::$_libs['upload']->init($uploaderOptions);
        SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['upload']->render('imgUploader'));
        
        return 'admin/event/circuit-info.tpl';
    } // end of function
    
    
    /**
    * get image count by cirsuit id
    * 
    * @access public
    * @return json object
    * @param null 
    * 
    */
    public function getImgCount(){
        
        // init needed libs
        $nedded_libs = array('models' => array(array('trk_circuits_model','trk_circuits_model')));
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        $idCircuit  =   SHIN_Core::$_input->globalarr('idCircuit');
        $count      =   0;
        
        if(!empty($idCircuit)) {
            $idCircuit  =   SHIN_Core::$_input->globalarr('idCircuit');
            $count      =   SHIN_Core::$_models['trk_circuits_model']->getImgCountByCircuit($idCircuit);
        } 
        
        echo json_encode(array('result' => true, 'count' => $count)); exit();
    }
    
    /**
    * upload files
    * 
    * @access public
    * @param null
    * @return null
    * 
    */
    public function upload(){
        
         // init needed libs
        $nedded_libs = array(   'libs'   => array('SHIN_Upload'),
                                'help'   => array('form', 'validate', 'array', 'date'),
                                'models' => array(array('trk_circuits_model', 'trk_circuits_model'))
                             );
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        SHIN_Core::$_models['trk_circuits_model']->upload();
        
    } 

} // end of class

?>