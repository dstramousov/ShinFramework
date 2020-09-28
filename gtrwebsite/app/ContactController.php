<?php

require "CommonController.php";

class ContactController extends CommonController {
    
    function __construct() {
        parent::__construct();
    }

    public function index(){
        
        // init needed libs
        $nedded_libs = array(
                                'libs'     => array('SHIN_Datatable',
                                                    'SHIN_Dialog', 'SHIN_Tooltip'), 
                                'models'   => array(array('gtrwebsite_contact_model', 'gtrwebsite_contact_model'))
                            );
        
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        // init ddatatable for drawing ticket list
        $dt             = SHIN_Core::$_libs['datatable']->get_instance();
        
        $_tableclass    = 'display';
        $_css_column    = 'gradeC';
        $_element_id    = 'dataListContact';    
        $_dom_element   = 'ssstylemustbehere';
        $_display_data  = array();
        $_table_data    = array(SHIN_Core::$_language->line('lng_label_contact_id'),
                                SHIN_Core::$_language->line('lng_label_contact_stored'),
                                SHIN_Core::$_language->line('lng_label_contact_name'),
                                SHIN_Core::$_language->line('lng_label_contact_surname'),
                                SHIN_Core::$_language->line('lng_label_contact_address'),
                                SHIN_Core::$_language->line('lng_label_contact_city'),
                                SHIN_Core::$_language->line('lng_label_contact_provincia'),
                                SHIN_Core::$_language->line('lng_label_contact_postCode'),
                                SHIN_Core::$_language->line('lng_label_contact_tel'),
                                SHIN_Core::$_language->line('lng_label_contact_email'),
                                SHIN_Core::$_language->line('lng_label_contact_info'),
                                SHIN_Core::$_language->line('lng_label_contact_action'),
                                SHIN_Core::$_language->line('lng_label_contact_keepUpdated'),
                                SHIN_Core::$_language->line('lng_label_contact_barrier'),
                                SHIN_Core::$_language->line('lng_label_contact_bathroom'),
                                SHIN_Core::$_language->line('lng_label_contact_kitchen'),
                                SHIN_Core::$_language->line('lng_label_contact_comfort'),
                                SHIN_Core::$_language->line('lng_label_contact_sense'),
                                '');
        
        // initialize ajax type of datatable                                                             
        $fnServerData = 'function ( sSource, aoData, fnCallback ) {
                                            /* Add some extra data to the sender */
                                            aoData.push( { "name": "model_name",      "value": "gtrwebsite_contact_model|gtrwebsite_contact_model" } ),
                                            aoData.push( { "name": "needed_column",   "value": "id,stored,name,surname,address,city,provincia,postCode,tel,email,info,action,keepUpdated,barrier,bathroom,kitchen,comfort,sense" } ),
                                            aoData.push( { "name": "custom_column",   "value": "edit" } ),
                                            aoData.push( { "name": "crud_obj_name",   "value": "contactCrudObj" } ),
                                            
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
                                 'aoColumns'    => '[null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,{"bSortable":false}]',
                                 'sAjaxSource'  => "'" . SHIN_Core::$_config['core']['app_base_url'] . '/connectors/SHIN_CorrectConnectorJoin.php'."'");
        $dt->init($init_options);
        
        // initialize datatable with events, selected fields, etc
        $dt->setLanguage(SHIN_Core::$_current_lang);
        $dt->init($init_options);
        $data_inject = $dt->initSSStyle($_dom_element, $_element_id, $_tableclass, $_display_data, $_table_data);
        SHIN_Core::$_jsmanager->addComponent($dt->render($_element_id));
        SHIN_Core::$_libs['templater']->assign('datatbleName', $_element_id);
        
        // init edit dialog
        SHIN_Core::$_libs['dialog']->init(array('width' => 500));
        SHIN_Core::$_libs['dialog']->confirm_dialog_correct('contact-edit-dialog', SHIN_Core::$_language->line('lng_label_contact_edit'), null, Array(SHIN_Core::$_language->line('lng_label_sys_user_edit_cancel') => 'contactCrudObj.params.general.dialogObj.close("edit-dialog")'));
        SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['dialog']->render('contact-edit-dialog'));
        
        
        // init JS CRUD object
        $crudInitData   =   array('tab_name'            =>   'contact',
                                  'dialog_css_class'    =>   'crud-dialog-class',
                                  'label_delete_action' =>   'lng_label_sys_user_delete_really',
                                  'crud_obj_name'       =>   'contactCrudObj',
                                  'datatable_name'      =>   $_element_id,
                                  'message_block'       =>   'contact-js-message',
                                  'error_block'         =>   'contact-js-error',
                                  'error_prefix'        =>   '_error',
                                  'validation_class'    =>   '.validatetion-error',
                                  'controller'          =>   'contact');
        
        SHIN_Core::$_libs['templater']->assign('crudData', SHIN_Core::$_models['gtrwebsite_contact_model']->prepareCodeforCRUD($crudInitData));
        
        return 'contact/contact-list.tpl';     
    }
    
    public function save(){
        
        // init needed libs
        $nedded_libs = array(   'help'   => array('form', 'validate', 'array', 'date'),
                                'models' => array(array('gtrwebsite_contact_model', 'gtrwebsite_contact_model'))
                             );
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        SHIN_Core::$_models['gtrwebsite_contact_model']->read_form();
		
        $result = SHIN_Core::$_models['gtrwebsite_contact_model']->save();
		
        echo SHIN_Core::$_input->globalarr('callback') . '(' . json_encode(array('result' => $result)) . ')'; exit();
    }
    
    /**
    * read data
    * 
    * @access public
    * @param null
    * @return rendered template
    * 
    */
    public function read(){
        
        // init needed libs
        $nedded_libs = array(	'help'   => array('form', 'date'),
                                'models' => array(array('gtrwebsite_contact_model', 'gtrwebsite_contact_model'))
                             );
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        if(is_array(SHIN_Core::$_models['gtrwebsite_contact_model']->primary_key)) {
            $where  =   array();
            foreach(SHIN_Core::$_models['gtrwebsite_contact_model']->primary_key as $key) {
                $keyValue   =   SHIN_Core::$_input->post($key);
                if(!empty($keyValue)) {
                    $where[$key]    =   $keyValue;
                }    
            }
        } else {
            $where  =   SHIN_Core::$_input->post(SHIN_Core::$_models['gtrwebsite_contact_model']->primary_key);   
        }
        
        SHIN_Core::$_models['gtrwebsite_contact_model']->fetchByID($where);
        SHIN_Core::$_libs['templater']->assign(SHIN_Core::$_models['gtrwebsite_contact_model']->write_form());
        
        return 'contact/contact-info.tpl';
    }
    
    public function test(){
        
        // init needed libs
        $nedded_libs = array(   'libs'   => array('SHIN_Button', 'SHIN_Message','SHIN_Tooltip'),   
                                'help'   => array('form', 'date'),
                                'models' => array(array('gtrwebsite_contact_model', 'gtrwebsite_contact_model'))
                             );
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        SHIN_Core::$_models['gtrwebsite_contact_model']->fetchByID(null);
        SHIN_Core::$_libs['templater']->assign(SHIN_Core::$_models['gtrwebsite_contact_model']->write_form());
        
        
         // init messages and errors blocks
        SHIN_Core::$_libs['templater']->assign('jsMessages',  SHIN_Core::$_libs['message']->getMessageBlock('contact-js-message'));
        SHIN_Core::$_libs['templater']->assign('jsErrors',    SHIN_Core::$_libs['message']->getErrorBlock('contact-js-error'));
        
        
        // init add button
        $options    = array('click' => 'addContact(); return false;',
                            'label' => '"' . SHIN_Core::$_language->line('lng_label_contact_add') . '"');
        // init component using needed options
        SHIN_Core::$_libs['button']->init($options);
        
        // add component to the page
        SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['button']->render('#add-contact-button'));
        
        return 'contact/contact-test.tpl';
    }
}