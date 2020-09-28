<?php

require "CommonController.php";

class RegisterController extends CommonController {
    
    function __construct()
	{	
        parent::__construct();
		
		$nedded_libs = array(
                            'help' => array(
                                'date', 'form', 'validate'
                            ),
							'models' => array(
								array('ppfm_holder_model', 'ppfm_holder_model'),
                                array('ppfm_category_model', 'ppfm_category_model'),
                                array('ppfm_account_model', 'ppfm_account_model'),
                                array('ppfm_v_entry_objects_model', 'ppfm_v_entry_objects_model'),
                            ),
							
                            'libs' => array(
	                            'SHIN_Datatable',								
								'SHIN_Dialog',
                                'SHIN_Datepicker',
                                'SHIN_BlockUI',
                                'SHIN_Message'
                            ),
                         );

		SHIN_Core::postInit($nedded_libs);
        
        SHIN_Core::$_libs['templater']->assign('currencySymbol', SHIN_Core::$_config['lang']['currency']);
        
        SHIN_Core::$_libs['seo']->addToTitle(SHIN_Core::$_language->line('lng_label_ppfm_registration'));
	}
	
    function index()
	{
		$_element_id	= 'entry_listing';
		$_dom_element	= 'etrylist';
		$_table_data	= array(SHIN_Core::$_language->line('lng_label_managment_entry_date'),
                                SHIN_Core::$_language->line('lng_label_managment_entry_id'),
                                SHIN_Core::$_language->line('lng_label_managment_entry_type'), 
                                SHIN_Core::$_language->line('lng_label_managment_entry_holder_id'),
                                SHIN_Core::$_language->line('lng_label_managment_entry_category_id'), 
                                SHIN_Core::$_language->line('lng_label_managment_entry_text'), 
                                SHIN_Core::$_language->line('lng_label_managment_entry_account_id'), 
                                SHIN_Core::$_language->line('lng_label_managment_entry_amount'), 
                                SHIN_Core::$_language->line('lng_label_managment_entry_user_id'), '', '');
		
        $_tableclass	= 'display';
		$_display_data	= array();
		$_css_column	= 'gradeC';
		
		$fnServerData = 'function ( sSource, aoData, fnCallback ) {
										aoData.push( { "name": "model_name", "value": "ppfm_v_entry_objects_model|ppfm_v_entry_objects_model" } ),
										aoData.push( { "name": "custom_column", "value": "edit,delete" } ),
										aoData.push( { "name": "needed_column", "value": "date,idEntry,type,holder,cat,text,account,amount,name"} ),
										
										$.ajax( {
											"dataType": \'json\', 
											"type": "POST", 
											"url": sSource, 
											"data": aoData,
											"success": fnCallback
										} ); 
									}';
									
		$init_options = array(
									'sAjaxSource'	=> "'".SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'].'/connectors/SHIN_ConnectorJoin.php'."'",
									'bProcessing'	=> 'true',
									'bServerSide'	=> 'true',
									'fnServerData'	=> $fnServerData,
									'aoColumns'		=> '[null,null,null,null,null,null,null,null,null,{ "bSortable": false },{ "bSortable": false }]',
									'oLanguage'		=> '{"sUrl": "'.SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'].'/js/datatables/dataTables.'.SHIN_Core::$_current_lang.'.txt"}'
								);
								
		$dt = SHIN_Core::$_libs['datatable']->get_instance();
		$dt->init($init_options);
	
		$_display_data = array();
		$data_inject = $dt->initSSStyle($_dom_element, $_element_id, $_tableclass, $_display_data, $_table_data);
		SHIN_Core::$_jsmanager->addComponent($dt->render($_element_id));
        
        // add blockUI
        $css        = "'margin-top': '-250px'";
        $overlayCSS = "
                        backgroundColor: '#ffffff', 
                        opacity:         0 
                       ";
        SHIN_Core::$_jsmanager->addOutDomReadyComponent(SHIN_Core::$_libs['blockui']->bindByFunction('tabs', 'blockUI', 'unBlockUI', "lng_label_please_whait", $css, $overlayCSS));
        
        // dialog edit
        SHIN_Core::$_libs['dialog']->confirm_dialog('edit-dialog', SHIN_Core::$_language->line('lng_label_managment_edit_dialog'), null, array(SHIN_Core::$_language->line('lng_label_registration_page_cancel_button_text') => 'closeEditDialog', SHIN_Core::$_language->line('lng_label_registration_page_edit_button_text') => 'saveChanges'));   
        SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['dialog']->render('edit-dialog'));
        
        // dialog add
        SHIN_Core::$_libs['dialog']->confirm_dialog('add-dialog', SHIN_Core::$_language->line('lng_label_managment_add_dialog'), null, array(SHIN_Core::$_language->line('lng_label_registration_page_cancel_button_text') => 'closeAddDialog', SHIN_Core::$_language->line('lng_label_registration_page_add_button_text') => 'saveNewRecord'));   
        SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['dialog']->render('add-dialog'));
     
        // dialog delete
        SHIN_Core::$_libs['dialog']->confirm_dialog('delete-dialog', SHIN_Core::$_language->line('lng_label_managment_delete_dialog'), null, array(SHIN_Core::$_language->line('lng_label_registration_page_delete_no_button_text') => 'closeDeleteDialog', SHIN_Core::$_language->line('lng_label_registration_page_delete_yes_button_text') => 'deleteRecord'));   
        SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['dialog']->render('delete-dialog'));    

        // error and success messages block
        SHIN_Core::$_libs['templater']->assign('jsMessages',  SHIN_Core::$_libs['message']->getMessageBlock());
        SHIN_Core::$_libs['templater']->assign('jsErrors',    SHIN_Core::$_libs['message']->getErrorBlock());
        
        return 'entry.tpl';
    }

    function ajaxNewEntry(){
        
        $table      =  SHIN_Core::$_input->post('active_table');
        
        SHIN_Core::$_libs['templater']->assign(SHIN_Core::$_models[$table . '_model']->write_form());
        
        $datePicker =   SHIN_Core::$_libs['datepicker']->get_instance();
        SHIN_Core::$_libs['templater']->assign('datepickerJsCode', $datePicker->render('ppfm_entry_date'));
        SHIN_Core::$_libs['templater']->assign('ppfm_entry_idUser_hidden', '<input type="hidden" name="ppfm_entry_idUser" value="' . SHIN_Core::$_libs['auth']->user->idUser . '">');
    
        
        return 'dialogs/entry_dialog.tpl';
        
        exit();
    }
    
    function ajaxSaveNew(){
        
        $table     =  SHIN_Core::$_input->post('active_table');
        $accountId =  SHIN_Core::$_input->post('ppfm_entry_idAccount');
        $type      =  SHIN_Core::$_input->post('ppfm_entry_type');
        $amount    =  SHIN_Core::$_input->post('ppfm_entry_amount');
        
        SHIN_Core::$_models[$table . '_model']->read_form();
        
        $result = SHIN_Core::$_models[$table . '_model']->validate_form();
        
        if(empty($result)) {
            SHIN_Core::$_models[$table . '_model']->save();
            
            SHIN_Core::$_models['ppfm_account_model']->recalculate($accountId, $type, $amount);
            
            echo json_encode(array('result'  => true,
                                   'errors'  => null,
                                   'message' => SHIN_Core::$_language->line('lng_label_managment_add_success')));
        } else {
            echo json_encode(array('result'  => false,
                                   'errors'  => $result,  
                                   'message' => ''));
        }
        
        exit();
    }
    
    function ajaxGetEntry(){
        
        $id         =  SHIN_Core::$_input->post('active_record_id');
        $table      =  SHIN_Core::$_input->post('active_table');
        
        SHIN_Core::$_models[$table . '_model']->fetchByID($id);
        
        SHIN_Core::$_libs['templater']->assign('datepickerJsCode', SHIN_Core::$_libs['datepicker']->render('ppfm_entry_date'));
        SHIN_Core::$_libs['templater']->assign(SHIN_Core::$_models[$table . '_model']->write_form());
        
        return 'dialogs/entry_dialog.tpl';    
    }
    
    function ajaxUpdateEntry(){
        
        $table      =  SHIN_Core::$_input->post('active_table');
        $accountId  =  SHIN_Core::$_input->post('ppfm_entry_idAccount');
        $type       =  SHIN_Core::$_input->post('ppfm_entry_type');
        $amount     =  SHIN_Core::$_input->post('ppfm_entry_amount');
        
        SHIN_Core::$_models[$table . '_model']->read_form();
        
        $result = SHIN_Core::$_models[$table . '_model']->validate_form(array('idEntry', 'type', 'idHolder', 'idCat', 'text', 'idAccount', 'amount', 'date'));
        
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
    
    function ajaxDeleteEntry(){
        
        $id     =  SHIN_Core::$_input->post('active_record_id');
        $table  =  SHIN_Core::$_input->post('active_table');
        
        $result =  SHIN_Core::$_models[$table . '_model']->deleteRec($id);
        
        if($result) {
            $response['result']     =   true;
            $response['message']    =   '';
        } else {
            $response['result']     =   false;
            $response['message']    =   '';    
        }
        
        echo json_encode($response);
        exit();    
    } 

}


?>