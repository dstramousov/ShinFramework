<?php

class SolutionManagmentController {
   
    /**
    * tab name
    */
    protected $tabName  =   'solution';
    
    /**
    * model name
    */
    protected $modelName = 'gtrwebsite_solution_model';
    
   
    /**
    * show policy application list
    * 
    * @access public
    * @param null
    * @return rendered template
    * 
    */
    public function index(){
        
        // init needed libs
        $nedded_libs = array(   
                                'help'   => array('form', 'date'),
                                'libs'   => array('SHIN_Datatable',
                                                  'SHIN_Dialog',
                                                  'SHIN_Button',
                                                  'SHIN_Message'),
                                'models' => array(array($this->modelName, $this->modelName))
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
        $_table_data    = array(SHIN_Core::$_language->line('lng_label_solution_id'),
                                SHIN_Core::$_language->line('lng_label_solution_description'),
                                SHIN_Core::$_language->line('lng_label_solution_posx'),
                                SHIN_Core::$_language->line('lng_label_solution_posy'),
                                SHIN_Core::$_language->line('lng_label_solution_level'),
                                SHIN_Core::$_language->line('lng_label_solution_img'),
                                SHIN_Core::$_language->line('lng_label_solution_user_insert'),
                                SHIN_Core::$_language->line('lng_label_solution_date_insert'),
                                SHIN_Core::$_language->line('lng_label_solution_user_mod'),
                                SHIN_Core::$_language->line('lng_label_solution_date_modifiy'),
                                '', '');
        
        // initialize ajax type of datatable                                                             
        $fnServerData = 'function ( sSource, aoData, fnCallback ) {
                                            /* Add some extra data to the sender */
                                            aoData.push( { "name": "model_name",      "value": "' . $this->modelName . '|' . $this->modelName . '" } ),
                                            aoData.push( { "name": "needed_column",   "value": "idSolution,description,posX,posY,level,img,sys_user_ins_name,dataIns,sys_user_mod_name,dataMod" } ),
                                            aoData.push( { "name": "custom_column",   "value": "edit,delete" } ),
                                            aoData.push( { "name": "crud_obj_name",   "value": "solutionCrudObj" } ),
                                            
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
                                 'aoColumns'    => '[null,null,null,null,null,null,null,null,null,null,{"bSortable":false},{"bSortable":false}]',
                                 'sAjaxSource'  => "'" . SHIN_Core::$_config['core']['app_base_url'] . '/connectors/SHIN_CorrectConnectorJoin.php'."'");
        $dt->init($init_options);
        
        // initialize datatable with events, selected fields, etc
        $dt->setLanguage(SHIN_Core::$_current_lang);
        $dt->init($init_options);
        $data_inject = $dt->initSSStyle($_dom_element, $_element_id, $_tableclass, $_display_data, $_table_data);
        SHIN_Core::$_jsmanager->addComponent($dt->render($_element_id));
        SHIN_Core::$_libs['templater']->assign('datatbleName', $_element_id);
        
        // init notify dialog for delete action
        SHIN_Core::$_libs['dialog']->set_title(SHIN_Core::$_language->line('lng_label_' . $this->tabName . '_delete'));
        SHIN_Core::$_libs['dialog']->confirm_dialog_correct($this->tabName . '-delete-dialog', SHIN_Core::$_language->line('lng_label_delete_really'), 'Content', Array(SHIN_Core::$_language->line('lng_label_' . $this->tabName . '_delete_cancel') => 'solutionCrudObj.params.general.dialogObj.close("delete-dialog")', SHIN_Core::$_language->line('lng_label_' . $this->tabName . '_delete_ok') => 'solutionCrudObj.del(null, null)'));
        SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['dialog']->render($this->tabName . '-delete-dialog'));
        
        // init edit dialog
        SHIN_Core::$_libs['dialog']->init(array('width' => 500));
        SHIN_Core::$_libs['dialog']->confirm_dialog_correct($this->tabName . '-edit-dialog', SHIN_Core::$_language->line('lng_label_' . $this->tabName . '_edit_title'), null, Array(SHIN_Core::$_language->line('lng_label_' . $this->tabName . '_edit_cancel') => 'solutionCrudObj.params.general.dialogObj.close("edit-dialog")', SHIN_Core::$_language->line('lng_label_' . $this->tabName . '_edit') => 'solutionCrudObj.write("edit-dialog", collectAdditionalData, uploadCallback)'));
        SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['dialog']->render($this->tabName . '-edit-dialog'));
        
        // init add dialog
        SHIN_Core::$_libs['dialog']->init(array('width' => 450));
        SHIN_Core::$_libs['dialog']->confirm_dialog_correct($this->tabName . '-add-dialog', SHIN_Core::$_language->line('lng_label_' . $this->tabName . '_add_title'), null, Array(SHIN_Core::$_language->line('lng_label_' . $this->tabName . '_add_cancel') => 'solutionCrudObj.params.general.dialogObj.close("add-dialog")', SHIN_Core::$_language->line('lng_label_' . $this->tabName . '_add') => 'solutionCrudObj.write("add-dialog", collectAdditionalData, uploadCallback)'));
        SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['dialog']->render($this->tabName . '-add-dialog'));

        // init messages and errors blocks
        SHIN_Core::$_libs['templater']->assign('jsMessages',  SHIN_Core::$_libs['message']->getMessageBlock());
        SHIN_Core::$_libs['templater']->assign('jsErrors',    SHIN_Core::$_libs['message']->getErrorBlock());
        
         // add note message
        SHIN_Core::$_libs['message']->addMessage(SHIN_Core::$_language->line('lng_label_category_note'));
        SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['message']->render('message'));
        
        // init add button
        $options    = array('click' => 'solutionCrudObj.openDialog(null, "add"); return false;',
                            'label' => '"' . SHIN_Core::$_language->line('lng_label_' . $this->tabName . '_add_button_label') . '"');
        // init component using needed options
        SHIN_Core::$_libs['button']->init($options);
        
        // add component to the page
        SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['button']->render('#add_' . $this->tabName .'_button'));
        
        // transfer some base params to the view
        SHIN_Core::$_libs['templater']->assign('tabName', $this->tabName);
        
        // init JS CRUD object
        $crudInitData   =   array('tab_name'            =>   $this->tabName,
                                  'dialog_css_class'    =>   'crud-dialog-class',
                                  'label_delete_action' =>   'lng_label_delete_really',
                                  'crud_obj_name'       =>   'solutionCrudObj',
                                  'datatable_name'      =>   $_element_id,
                                  'message_block'       =>   'js-message',
                                  'error_block'         =>   'js-error',
                                  'error_prefix'        =>   '_error',
                                  'validation_class'    =>   '.validatetion-error',
                                  'controller'          =>   'solutionmanagment');
        SHIN_Core::$_libs['templater']->assign('crudData', SHIN_Core::$_models[$this->modelName]->prepareCodeforCRUD($crudInitData));
        
        
        
        return 'managment/solution/solution/solution-list.tpl'; 
    
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
                                'models' => array(array($this->modelName, $this->modelName))
                             );
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        $keys   =   !is_array(SHIN_Core::$_models[$this->modelName]->primary_key) ? (array)SHIN_Core::$_models[$this->modelName]->primary_key : SHIN_Core::$_models[$this->modelName]->primary_key;
        $where  =   array();
        foreach($keys as $key) {
            $where[$key]    =   SHIN_Core::$_input->post($key);    
        }
        
        $result = SHIN_Core::$_models[$this->modelName]->deleteRec($where);
        
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
        SHIN_Core::$_libs['templater']->assign(SHIN_Core::$_models[$this->modelName]->write_form());
        
        $uploaderOptions = array('fileDataName'     => '"gtrwebsite_solution_img"',
                                 'multi'            => 'false',
                                 'auto'             => 'false',
                                 'queueSizeLimit'   => 1,
                                 'script'           => "'" . prep_url(base_url().'/solutionmanagment/upload') . "'",
                                 'fileExt'          => "'*.jpg;*.gif;*.png;'",
                                 'onSelect'         => 'onSelect',
                                 'onCancel'         => 'onCancel',
                                 'onAllComplete'    => 'onAllComplete');
    
        // init uploader first button                         
        SHIN_Core::$_libs['upload']->init($uploaderOptions);
        SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['upload']->render('imgUploader'));
        
        return 'managment/solution/solution/solution-info.tpl';
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
        $nedded_libs = array(   'help'   => array('form', 'validate', 'array', 'date'),
                                'models' => array(array($this->modelName, $this->modelName))
                             );
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        SHIN_Core::$_models[$this->modelName]->read_form();
        SHIN_Core::$_models[$this->modelName]->save();
        
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
    public function validate(){
        
        // init needed libs
        $nedded_libs = array(   'help'   => array('form', 'validate', 'array', 'date'),
                                'models' => array(array('gtrwebsite_base_model', null, CT_BASE_CLASS),
                                                  array($this->modelName, $this->modelName))
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
                                'models' => array(array('gtrwebsite_base_model', null, CT_BASE_CLASS),
                                                  array($this->modelName, $this->modelName))
                             );
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        SHIN_Core::$_models[$this->modelName]->uploadImg();
    }
    
    public function countItems(){
        
         // init needed libs
        $nedded_libs = array(   'help'   => array('form', 'validate', 'array', 'date'),
                                'models' => array(array('gtrwebsite_base_model', null, CT_BASE_CLASS),
                                                  array($this->modelName, $this->modelName))
                             );
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        $idSolution  =  isset($_REQUEST['idSolution']) ? $_REQUEST['idSolution'] : null;
        
        echo json_encode(array('count' => SHIN_Core::$_models[$this->modelName]->getCountItems($idSolution))); exit();
    }

}

?>
