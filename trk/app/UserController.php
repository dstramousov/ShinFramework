<?php

require "CommonController.php"; 

class UserController extends CommonController {
   
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
        
    }
    
    /**
    * tab name
    */
    protected $tabName  =   'user';
    
    /**
    * model name
    */
    protected $modelName = 'trk_user_model';
    
   
    /**
    * show policy application list
    * 
    * @access public
    * @param null
    * @return rendered template
    * 
    */
    public function index(){
        
        // load external js file for CRUD screen
        SHIN_Core::$_jsmanager->insertJSFromFile(array(SHIN_Core::$_config['core']['shinfw_base_url'] . '/' . shinfw_folder() . '/' . '/js/crud/crud.class.js'));
        
        // init needed libs
        $nedded_libs = array(   
                                'help'   => array('form', 'date'),
                                'libs'   => array('SHIN_Datatable',
                                                  'SHIN_Dialog',
                                                  'SHIN_Button',
                                                  'SHIN_Message',
                                                  'SHIN_Session',
                                                  'SHIN_DateTimepicker'),
                                'models' => array(array('sys_user_model', null, CT_BASE_CLASS),
                                                  array($this->modelName, $this->modelName))
                            );

        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        // init ddatatable for drawing ticket list
        $dt             = SHIN_Core::$_libs['datatable']->get_instance();
        
        $_tableclass    = 'display';
        $_css_column    = 'gradeC';
        $_element_id    = 'dataList' . ucfirst($this->tabName);    
        $_dom_element   = 'ssstylemustbehere';
        $_display_data  = array();
        $_table_data    = array(SHIN_Core::$_language->line('lng_label_datatable_user_name'),
                                SHIN_Core::$_language->line('lng_label_sys_user_lastname'),
                                '',
//                                SHIN_Core::$_language->line('lng_label_datatable_user_type'),
                                SHIN_Core::$_language->line('lng_label_datatable_user_wm_usage'),
                                SHIN_Core::$_language->line('lng_label_datatable_user_wm_file'),
//                                SHIN_Core::$_language->line('lng_label_datatable_user_wm_status'),
                                SHIN_Core::$_language->line('lng_label_datatable_user_wm_position'),
                                SHIN_Core::$_language->line('lng_label_sys_user_lang'),
                                SHIN_Core::$_language->line('lng_label_sys_user_status'),
                                SHIN_Core::$_language->line('lng_label_sys_user_email'),
                                SHIN_Core::$_language->line('lng_label_sys_user_username'),
                                SHIN_Core::$_language->line('lng_label_sys_user_pass'),
                                SHIN_Core::$_language->line('lng_label_sys_user_theme'),
                                SHIN_Core::$_language->line('lng_label_sys_user_role'),
                                '','','','','','','','','',
                                '', '');
        
        // initialize ajax type of datatable                                                             
        $fnServerData = 'function ( sSource, aoData, fnCallback ) {
                                            /* Add some extra data to the sender */
                                            aoData.push( { "name": "model_name",        "value": "' . $this->modelName . '|' . $this->modelName . '" } ),
                                            aoData.push( { "name": "needed_column",     "value": "sys_user_name,sys_user_lastname,userId,watermarkusage,wtm_file_name,watermark_position,sys_user_lang,sys_user_status,sys_user_email,sys_user_username,sys_user_pwd,sys_user_theme,sys_user_role_1,sys_user_role_2,sys_user_role_3,sys_user_role_4,sys_user_role_5,sys_user_role_6,sys_user_role_7,sys_user_role_8,sys_user_role_9,sys_user_role_10"} ),
                                            aoData.push( { "name": "custom_column",     "value": "edit,delete" } ),
//                                            aoData.push( { "name": "where_condition",   "value": "sys_user.role_1 IN(' . CT_SNAPTRACK_USERTYPE_PHOTOGRAPHER . ', '. CT_SNAPTRACK_USERTYPE_ADMIN . ', '.CT_SNAPTRACK_USERTYPE_VIEWER .' " } ),
                                            aoData.push( { "name": "crud_obj_name",     "value": "userCrudObj" } ),
                                            
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
                                 'aoColumns'    => '[null,null,{"bVisible":false},null,null,null,null,null,null,null,null,null,null,{"bVisible":false},{"bVisible":false},{"bVisible":false},{"bVisible":false},{"bVisible":false},{"bVisible":false},{"bVisible":false},{"bVisible":false},{"bVisible":false},{"bSortable":false},{"bSortable":false}]',
                                 'sAjaxSource'  => "'".SHIN_Core::$_config['core']['app_base_url'].'/connectors/SHIN_CorrectConnectorJoin.php'."'");
        $dt->init($init_options);
        
        // initialize datatable with events, selected fields, etc
        $dt->setLanguage(SHIN_Core::$_current_lang);
        $dt->init($init_options);
        $data_inject = $dt->initSSStyle($_dom_element, $_element_id, $_tableclass, $_display_data, $_table_data);
        SHIN_Core::$_jsmanager->addComponent($dt->render($_element_id));
        SHIN_Core::$_libs['templater']->assign('datatbleName', $_element_id);
        
        // init notify dialog for delete action
        SHIN_Core::$_libs['dialog']->set_title(SHIN_Core::$_language->line('lng_label_' . $this->tabName . '_delete'));
        SHIN_Core::$_libs['dialog']->confirm_dialog_correct($this->tabName . '-delete-dialog', SHIN_Core::$_language->line('lng_label_delete_really'), 'Content', Array(SHIN_Core::$_language->line('lng_label_' . $this->tabName . '_delete_cancel') => 'userCrudObj.params.general.dialogObj.close("delete-dialog")', SHIN_Core::$_language->line('lng_label_' . $this->tabName . '_delete_ok') => 'userCrudObj.del(null, null)'));
        SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['dialog']->render($this->tabName . '-delete-dialog'));
        
        // init edit dialog
        SHIN_Core::$_libs['dialog']->init(array('width' => 500));
        SHIN_Core::$_libs['dialog']->confirm_dialog_correct($this->tabName . '-edit-dialog', SHIN_Core::$_language->line('lng_label_' . $this->tabName . '_edit_title'), null, Array(SHIN_Core::$_language->line('lng_label_' . $this->tabName . '_edit_cancel') => 'userCrudObj.params.general.dialogObj.close("edit-dialog")', SHIN_Core::$_language->line('lng_label_' . $this->tabName . '_edit') => 'userCrudObj.write("edit-dialog", collectAdditionalData, uploadCallback)'));
        SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['dialog']->render($this->tabName . '-edit-dialog'));
        
        // init add dialog
        SHIN_Core::$_libs['dialog']->init(array('width' => 450));
        SHIN_Core::$_libs['dialog']->confirm_dialog_correct($this->tabName . '-add-dialog', SHIN_Core::$_language->line('lng_label_' . $this->tabName . '_add_title'), null, Array(SHIN_Core::$_language->line('lng_label_' . $this->tabName . '_add_cancel') => 'userCrudObj.params.general.dialogObj.close("add-dialog")', SHIN_Core::$_language->line('lng_label_' . $this->tabName . '_add') => 'userCrudObj.write("add-dialog", collectAdditionalData, uploadCallback)'));
        SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['dialog']->render($this->tabName . '-add-dialog'));

        // init messages and errors blocks
        SHIN_Core::$_libs['templater']->assign('jsMessages',  SHIN_Core::$_libs['message']->getMessageBlock());
        SHIN_Core::$_libs['templater']->assign('jsErrors',    SHIN_Core::$_libs['message']->getErrorBlock());
        
        // init add button
        $options    = array('click' => 'userCrudObj.openDialog(null, "add"); return false;',
                            'label' => '"' . SHIN_Core::$_language->line('lng_label_' . $this->tabName . '_add_button_label') . '"');
        // init component using needed options
        SHIN_Core::$_libs['button']->init($options);
        
        // add component to the page
        SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['button']->render('#add_' . $this->tabName .'_button'));
        
        // init JS CRUD object
        $crudInitData   =   array('tab_name'            =>   'user',
                                  'dialog_css_class'    =>   'crud-dialog-class',
                                  'label_delete_action' =>   'lng_label_gallery_delete_really',
                                  'crud_obj_name'       =>   'userCrudObj',
                                  'datatable_name'      =>   $_element_id,
                                  'message_block'       =>   'picture-js-message',
                                  'error_block'         =>   'picture-js-error',
                                  'error_prefix'        =>   '_error',
                                  'validation_class'    =>   '.validatetion-error',
                                  'controller'          =>   'user');
        
        SHIN_Core::$_libs['templater']->assign('crudData', SHIN_Core::$_models['trk_user_model']->prepareCodeforCRUD($crudInitData));
        
        return 'admin/user/user-list.tpl'; 
    
    } 
    
    /**
    * delete struct application
    * 
    * @access public
    * @param null
    * @return redirect
    * 
    */
    public function delete(){
        
        // init needed libs
        $nedded_libs = array(
                                'models' => array(array($this->modelName, $this->modelName),
                                                  array('sys_user_model', 'sys_user_model'))
                             );
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        $keys   =   !is_array(SHIN_Core::$_models[$this->modelName]->primary_key) ? (array)SHIN_Core::$_models[$this->modelName]->primary_key : SHIN_Core::$_models[$this->modelName]->primary_key;
        $where  =   array();
        foreach($keys as $key) {
            $where[$key]    =   SHIN_Core::$_input->post($key);    
        }
        
		/*  
		$this->sendAdminActionsMail(
									SHIN_Core::$_models[$this->modelName]->name . ' ' . SHIN_Core::$_models[$this->modelName]->lastname,
									SHIN_Core::$_models[$this->modelName]->email,
									SHIN_Core::$_language->line('lng_label_dltuser_body'), 
									SHIN_Core::$_language->line('lng_label_dltguser_sbj')
								   );
		*/
        $result = SHIN_Core::$_models[$this->modelName]->delete($where);
		
		
        
        echo json_encode(array('result' => $result, 'message' => SHIN_Core::$_language->line('lng_label_delete_success'))); exit();
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
        $nedded_libs = array(   'help'   => array('form', 'date'),
                                'models' => array(array($this->modelName, $this->modelName)),
                                'libs'   => array('SHIN_Upload')         
                             );
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        if(is_array(SHIN_Core::$_models[$this->modelName]->primary_key)) {
            $where  =   array();
            foreach(SHIN_Core::$_models[$this->modelName]->primary_key as $key) {
                $where[$key]    =   SHIN_Core::$_input->post($key);    
            }
        } else {
            $where  =   SHIN_Core::$_input->post(SHIN_Core::$_models[$this->modelName]->primary_key);   
        }
        
        
        SHIN_Core::$_models[$this->modelName]->fetchByID($where);
		//dump(SHIN_Core::$_models[$this->modelName]->write_form());
        SHIN_Core::$_libs['templater']->assign(SHIN_Core::$_models[$this->modelName]->write_form());
        
        // init additional components
        $uploaderOptions = array('fileDataName'     => '"trk_user_wtm_file_name"',
                                 'multi'            => 'false',
                                 'auto'             => 'false',
                                 'queueSizeLimit'   => 1,
                                 'script'           => "'" . prep_url(base_url().'/user/upload') . "'",
                                 'fileExt'          => "'*.jpg;*.gif;*.png;'",
                                 'onSelect'         => 'onSelectCallback',
                                 'onCancel'         => 'onCancelCallback');
    
        // init uploader first button                         
        SHIN_Core::$_libs['upload']->init($uploaderOptions);
        SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['upload']->render('imgUploader'));
        
        return 'admin/user/user-info.tpl';
    }
    
    /**
    * save user information
    * 
    * @access public
    * @param null
    * @return json result
    * 
    */
    public function create(){
        
        // init needed libs
        $nedded_libs = array(
								'help'   => array('form', 'validate', 'array', 'date'),
                                'models' => array(array($this->modelName, $this->modelName)), 
								'libs' => array('SHIN_Mailer'),
                             );
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        SHIN_Core::$_models[$this->modelName]->read_form();
        $result = SHIN_Core::$_models[$this->modelName]->save();
			
		/*
		dump(SHIN_Core::$_models[$this->modelName]);
		$this->sendAdminActionsMail(
									SHIN_Core::$_models[$this->modelName]->sys_user_name . ' ' . SHIN_Core::$_models[$this->modelName]->sys_user_lastname,
									SHIN_Core::$_models[$this->modelName]->email,
									SHIN_Core::$_language->line('lng_label_chnguser_body'), 
									SHIN_Core::$_language->line('lng_label_chnguser_sbj')
								   );
		*/
        echo json_encode(array('result' => true, 'message' => SHIN_Core::$_language->line('lng_label_create_success'))); exit();
    
    }
    
    /**
    * save user information
    * 
    * @access public
    * @param null
    * @return json result
    * 
    */
    public function validate()
    {
        // init needed libs
        $nedded_libs = array(   'help'   => array('form', 'validate', 'array', 'date'),
                                'models' => array(array($this->modelName, $this->modelName))
                             );
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
		SHIN_Core::$_models[$this->modelName]->read_form();
        $result = SHIN_Core::$_models[$this->modelName]->validate_form();
        
        if(empty($result)) {
            echo json_encode(array('result'  => true,
                                   'errors'  => null));    
        } else {
            echo json_encode(array('result'  => false,
                                   'errors'  => $result));    
        }
        exit();
        
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
                                'models' => array(array($this->modelName, $this->modelName))
                             );
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        SHIN_Core::$_models[$this->modelName]->uploadImg();
    }
}

?>
