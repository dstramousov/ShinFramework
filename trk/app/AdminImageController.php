<?php

require "CommonController.php";

class AdminImageController extends CommonController  {
    
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
    * Default and main function for manage images
    * 
    * @access public
    * @param null
    * @return json result
    */
    public function index(){
        
        // load external js file for CRUD screen
        SHIN_Core::$_jsmanager->insertJSFromFile(array(SHIN_Core::$_config['core']['shinfw_base_url'] . '/' . shinfw_folder() . '/' . '/js/crud/crud.class.js'));
        
        // init needed libs
        $nedded_libs = array('libs'     => array('SHIN_Upload', 
                                                 'SHIN_Datatable',
                                                 'SHIN_Dialog', 
                                                 'SHIN_Message', 
                                                 'SHIN_Session', 
                                                 'SHIN_Timepicker',
                                                 'SHIN_Datepicker'), 
                             'models'   => array(array('trk_photo_model', 'trk_photo_model'),
                                                 array('trk_user_model', 'trk_user_model')));
        
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        // init ddatatable for drawing ticket list
        $dt             = SHIN_Core::$_libs['datatable']->get_instance();
        
        $_tableclass    = 'display';
        $_css_column    = 'gradeC';
        $_element_id    = 'pictureDataList';    
        $_dom_element   = 'ssstylemustbehere';
        $_display_data  = array();
        $_table_data    = array('',
                                '',
                                SHIN_Core::$_language->line('lng_label_picture_id'),
                                SHIN_Core::$_language->line('lng_label_picture_description'),
                                SHIN_Core::$_language->line('lng_label_picture_sysname'),
                                SHIN_Core::$_language->line('lng_label_picture_upload_date'),
                                '',
                                SHIN_Core::$_language->line('lng_label_picture_status'),
                                '',
                                SHIN_Core::$_language->line('lng_label_picture_circuit'),
                                SHIN_Core::$_language->line('lng_label_picture_raceday'),
                                SHIN_Core::$_language->line('lng_label_picture_racetime'),
                                SHIN_Core::$_language->line('lng_label_picture_car_license'),
                                SHIN_Core::$_language->line('lng_label_picture_car_number'),
                                SHIN_Core::$_language->line('lng_label_picture_car_pilot'),
                                SHIN_Core::$_language->line('lng_label_picture_car_brand'),
                                SHIN_Core::$_language->line('lng_label_picture_car_rate'),
                                '','');
        
        // get search parameter from session
        $where          =   '1=1 AND ';
        $userId         =   SHIN_Core::$_libs['session']->userdata('userId');
        $searchWhere    =   SHIN_Core::$_libs['session']->userdata(SHIN_Core::$_config['datatable']['search_var_name']);
        
        // initialize ajax type of datatable                                                             
        $fnServerData = 'function ( sSource, aoData, fnCallback ) {
                                            /* Add some extra data to the sender */
                                            aoData.push( { "name": "model_name",      "value": "trk_photo_model|trk_photo_model" } ),
                                            aoData.push( { "name": "needed_column",   "value": "userId,idPhoto,description,sysname,upload_date,folder,status,circuit,trk_circuits_circuit,raceday,racetime,carLicensePlate,carNumber,carPilot,carBrandName,rate" } ),
                                            aoData.push( { "name": "custom_column",   "value": "edit,delete" } ),
                                            aoData.push( { "name": "crud_obj_name",   "value": "pictureCrudObj" } ),
                                            
                                            $.ajax( {
                                                "dataType": \'json\', 
                                                "type": "POST", 
                                                "url": sSource, 
                                                "data": aoData,
                                                "success": fnCallback
                                            } );
                                        }';

        
        $init_options    = array('bProcessing'      => 'true', 
                                 'bServerSide'      => 'true', 
                                 'fnServerData'     => $fnServerData,
                                 'aoColumns'        => '[{"bSortable":false},{"bVisible":false},{"bVisible":false},null,null,null,{"bVisible":false},null,{"bVisible":false},null,null,null,null,null,null,null,null,{"bSortable":false},{"bSortable":false}]',
                                 'sAjaxSource'      => "'" . SHIN_Core::$_config['core']['app_base_url'] . '/connectors/SHIN_SearchConnectorJoin.php'."'");
        $dt->init($init_options);
        
        // initialize datatable with events, selected fields, etc
        $dt->setLanguage(SHIN_Core::$_current_lang);
        $dt->init($init_options);
        $data_inject = $dt->initSSStyle($_dom_element, $_element_id, $_tableclass, $_display_data, $_table_data);
        SHIN_Core::$_jsmanager->addComponent($dt->render($_element_id));
        SHIN_Core::$_libs['templater']->assign('datatbleName', $_element_id);
        
        // init notify dialog for delete action
        SHIN_Core::$_libs['dialog']->set_title(SHIN_Core::$_language->line('lng_label_gallery_delete'));
        SHIN_Core::$_libs['dialog']->confirm_dialog_correct('picture-delete-dialog', SHIN_Core::$_language->line('lng_label_gallery_delete_really'), 'Content', Array(SHIN_Core::$_language->line('lng_label_gallery_add_cancel') => 'pictureCrudObj.params.general.dialogObj.close("delete-dialog")', SHIN_Core::$_language->line('lng_label_gallery_delete_ok') => 'pictureCrudObj.del(null, null)'));
        SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['dialog']->render('picture-delete-dialog'));
        
        // init edit dialog
        SHIN_Core::$_libs['dialog']->init(array('width' => 500));
        SHIN_Core::$_libs['dialog']->confirm_dialog_correct('picture-edit-dialog', SHIN_Core::$_language->line('lng_label_picture_edit_title'), null, Array(SHIN_Core::$_language->line('lng_label_gallery_edit_cancel') => 'pictureCrudObj.params.general.dialogObj.close("edit-dialog")', SHIN_Core::$_language->line('lng_label_gallery_edit_ok') => 'saveStatus();'));
        SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['dialog']->render('picture-edit-dialog'));
        
        // init messages and errors blocks
        SHIN_Core::$_libs['templater']->assign('jsMessages',  SHIN_Core::$_libs['message']->getMessageBlock('picture-js-message'));
        SHIN_Core::$_libs['templater']->assign('jsErrors',    SHIN_Core::$_libs['message']->getErrorBlock('picture-js-error'));
        
        // init JS CRUD object
        $crudInitData   =   array('tab_name'            =>   'picture',
                                  'dialog_css_class'    =>   'crud-dialog-class',
                                  'label_delete_action' =>   'lng_label_gallery_delete_really',
                                  'crud_obj_name'       =>   'pictureCrudObj',
                                  'datatable_name'      =>   $_element_id,
                                  'message_block'       =>   'picture-js-message',
                                  'error_block'         =>   'picture-js-error',
                                  'error_prefix'        =>   '_error',
                                  'validation_class'    =>   '.validatetion-error',
                                  'controller'          =>   'adminimage',
                                  'custom_url'          =>   array('read'       => 'adminimage/read', 
                                                                   'validate'   => 'adminimage/validate', 
                                                                   'write'      => 'adminimage/create', 
                                                                   'del'        => 'adminimage/delete'));
                                                                   
        $formState    =   SHIN_Core::$_libs['session']->userdata('form-state');
        
        SHIN_Core::$_libs['templater']->assign('crudData', SHIN_Core::$_models['trk_photo_model']->prepareCodeforCRUD($crudInitData));
        SHIN_Core::$_libs['templater']->assign('currentUser', isset($formState['userId']) ? $formState['userId'] : null);
        SHIN_Core::$_libs['templater']->assign('userList', SHIN_Core::$_models['trk_user_model']->getUserList());
        
        // init filter system
        $this->_initFilter();
        
        return 'admin/image/index.tpl';         
    }
    
    /**
    * delete image
    * 
    * @access public
    * @param null
    * @return redirect
    * 
    */
    public function delete(){
        
        // init needed libs
        $nedded_libs = array(
                                'models' => array(array('trk_photo_model', 'trk_photo_model'),
                                                  array('trk_uploadactivity_model', 'trk_uploadactivity_model'))
                             );
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        $keys   =   !is_array(SHIN_Core::$_models['trk_photo_model']->primary_key) ? (array)SHIN_Core::$_models['trk_photo_model']->primary_key : SHIN_Core::$_models[$this->modelName]->primary_key;
        $where  =   array();
        foreach($keys as $key) {
            $where[$key]    =   SHIN_Core::$_input->post($key);    
        }
        
        $result = SHIN_Core::$_models['trk_photo_model']->deleteRec($where);
        
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
                                'models' => array(array('trk_photo_model','trk_photo_model')),
                                'libs'   => array('SHIN_Upload',
                                                  'SHIN_LimitsManager',
                                                  'SHIN_Session')         
                             );
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        if(is_array(SHIN_Core::$_models['trk_photo_model']->primary_key)) {
            $where  =   array();
            foreach(SHIN_Core::$_models['trk_photo_model']->primary_key as $key) {
                $where[$key]    =   SHIN_Core::$_input->post($key);    
            }
        } else {
            $where  =   SHIN_Core::$_input->post(SHIN_Core::$_models['trk_photo_model']->primary_key);   
        }
        
        
        SHIN_Core::$_models['trk_photo_model']->fetchByID($where);
        SHIN_Core::$_libs['templater']->assign(SHIN_Core::$_models['trk_photo_model']->write_form());
       
        return 'admin/image/picture-info.tpl';
    }
    
    /**
    * save image information
    * 
    * @access public
    * @param null
    * @return json result
    * 
    */
    public function create(){
        
        // init needed libs
        $nedded_libs = array(   'help'   => array('form', 'validate', 'array', 'date'),
                                'models' => array(array('trk_photo_model', 'trk_photo_model'),
                                                  array('trk_uploadactivity_model', 'trk_uploadactivity_model'))
                             );
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        SHIN_Core::$_models['trk_photo_model']->read_form();
        SHIN_Core::$_models['trk_photo_model']->save();
        
        echo json_encode(array('result' => true, 'message' => SHIN_Core::$_language->line('lng_label_create_success'))); exit();
    
    }
    
    /**
    * validate image information
    * 
    * @access public
    * @param null
    * @return json result
    * 
    */
    public function validate(){
        
        // init needed libs
        $nedded_libs = array(   'help'   => array('form', 'validate', 'array', 'date'),
                                'models' => array(array('trk_photo_model','trk_photo_model'))
                             );
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
                  SHIN_Core::$_models['trk_photo_model']->read_form();
        $result = SHIN_Core::$_models['trk_photo_model']->validate_form();
        
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
    * set user filter
    * 
    * @access public
    * @return json object
    * @param null
    * 
    */
    public function setUser(){
        
        // init needed libs
        $nedded_libs = array('libs' => array('SHIN_Session'));
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        $userId = SHIN_Core::$_input->globalarr('userId');
        
        if(!empty($userId)) {
            SHIN_Core::$_libs['session']->set_userdata('userId', $userId); $result = true;
        } else {
            $result = false;    
        }
        
        echo json_encode(array('result' => $result)); exit();    
    }
    
    /**
    * set search filter
    * 
    * @access public
    * @return json object
    * @param null
    * 
    */
    public function setFilter(){
        
        // init needed libs
        $nedded_libs = array('libs' => array('SHIN_Session'));
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        // save search params
        $defaultGlue    =   ' AND ';
        $allovedGlue    =   array('AND', 'OR');
        $mappedFields   =   array(
                                  'country'      =>  'trk_circuits.country',
                                  'type'         =>  'trk_circuits.circuitType',
                                  'circuit'      =>  'circuit',
                                  'raceDay'      =>  'raceday',
                                  'description'  =>  'description',
                                  'license'      =>  'carLicensePlate',
                                  'car_number'   =>  'carNumber',
                                  'car_pilot'    =>  'carPilot',
                                  'car_brand'    =>  'carBrandName',
                                  'rate'         =>  'rate',
                                  'userId'       =>  'userId');
        
        $searchData         =   SHIN_Core::$_input->globalarr('search');
        $sessionSearchData  =   SHIN_Core::$_libs['session']->userdata('form-state');
        
        if(empty($searchData)) {
            $searchData = $sessionSearchData;
        }
        
        // 1. save search conditions in session
        SHIN_Core::$_libs['session']->set_userdata(array('form-state' => $searchData));
      
        // 2. make where condition
        if(!empty($searchData)) {
            $whereCondition =   array();
            foreach($searchData as $key => $value) {
                if(!empty($value) && isset($mappedFields[$key])) {
                    if($key == 'raceDay') {
                        $whereCondition[]    =   'trk_photo.' . $mappedFields[$key] . '=' . '"' . fromDisplayToDb($value) . '"';    
                    } elseif($key == 'rate') {
                        $whereCondition[]    =   '(IF(trk_photo.' . $mappedFields[$key] . '/trk_photo.raters IS NULL, 0, FLOOR(trk_photo.' .  $mappedFields[$key] . '/trk_photo.raters))) =' . '"' . $value . '"';       
                    } else {
                        if($key == 'type' || $key == 'country'){
                            $whereCondition[]    =   $mappedFields[$key] . '=' . '"' . $value . '"';
                        } else {

                            if($key == 'licence' || $key == 'car_number' || $key == 'car_pilot' || $key == 'car_brand' || $key == 'license'){
                                $whereCondition[]    =   'trk_photo.' . $mappedFields[$key] . ' LIKE ' . '"%' . $value . '%"';
                            } else {
                                $whereCondition[]    =   'trk_photo.' . $mappedFields[$key] . '=' . '"' . $value . '"';
                            }
                        }
                    }
                }
            }                                    
            
            if(!empty($searchData['raceTimeFrom']) && !empty($searchData['raceTimeTo'])) {
                $whereCondition[] = 'trk_photo.racetime >= ' . '"' . $searchData['raceTimeFrom'] . '"' . ' AND trk_photo.racetime <= ' . '"' . $searchData['raceTimeTo'] . '"';     
            } elseif(!empty($searchData['raceTimeFrom']) && empty($searchData['raceTimeTo'])) {
                $whereCondition[] = 'trk_photo.racetime >= ' . '"' . $searchData['raceTimeFrom'] . '"' . ' AND trk_photo.racetime <= ' . '"' . date('H:i:s', strtotime($searchData['raceTimeFrom'] . ' +1 hour')) . '"';     
            } elseif(empty($searchData['raceTimeFrom']) && !empty($searchData['raceTimeTo'])){
                $whereCondition[] = 'trk_photo.racetime <= ' . '"' . $searchData['raceTimeTo'] . '"';     
            }
        }
   
        if(!empty($whereCondition)) {
            $whereCondition =   implode($defaultGlue, $whereCondition);
        } else {
            $whereCondition =   '1=1';
        }
        
         // 4. save search condition
        SHIN_Core::$_libs['session']->set_userdata(array(SHIN_Core::$_config['datatable']['search_var_name'] => $whereCondition));   
        
        echo json_encode(array('result' => true)); exit();
            
    }
    
    /**
    * reset search filter
    * 
    * @access public
    * @return json object
    * @param null
    * 
    */
    public function resetFilter(){
        
        $nedded_libs = array('libs'     => array('SHIN_Session'));
        
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        SHIN_Core::$_libs['session']->set_userdata(array('form-state' => null));
        SHIN_Core::$_libs['session']->set_userdata(array(SHIN_Core::$_config['datatable']['search_var_name'] => null));
        
        echo json_encode(array('result' => true)); exit();    
    }
    
    
    /**
    * change status of image
    * 
    * @access public
    * @return json object
    * @param null
    * 
    */
    public function setStatus(){
        
        $photoId    =   SHIN_Core::$_input->globalarr('photoId');     
        $status     =   SHIN_Core::$_input->globalarr('status');
        
        if(!empty($photoId) && !empty($status))
		{
            // init needed libs
            $nedded_libs = array('libs' => array('SHIN_Mailer'),'models' => array(array('trk_photo_model', 'trk_photo_model'), array('trk_user_model', 'trk_user_model')));
            // load needed libs
            SHIN_Core::postInit($nedded_libs);
            
			SHIN_Core::$_models['trk_photo_model']->fetchByID($photoId);
            $result =   SHIN_Core::$_models['trk_photo_model']->updatePhoto($photoId, array('status' => $status));
			
			$mail = SHIN_Core::$_libs['mailer'];
			$mail->Encoding = 'quoted-printable';
					
			$body	= $mail->getFile("views/web/mails/for_user_admin_chages_photo.tpl");
					
			$mail->AddAddress(SHIN_Core::$_input->post('email'), 'New user');
			$mail->Subject = SHIN_Core::$_language->line('lng_label_wauth');
			
			$body	= str_replace('USERFIRST', SHIN_Core::$_input->post('user-firstname'), $body);
			
			// fetch user
			SHIN_Core::$_models['trk_user_model']->fetchByID(SHIN_Core::$_models['trk_photo_model']->userId);
			$body   = 'Administrator was changed status for Your photo: <br /><br />';
            switch($status) {
                case CT_PHOTO_ACTIVE:
					$status = SHIN_Core::$_language->line('lng_label_lang_photo_active');
                    break;
                case CT_PHOTO_SUSPEND:
					$status = SHIN_Core::$_language->line('lng_label_lang_photo_suspend');
                    break;
                case CT_PHOTO_HIDE:
					$status = SHIN_Core::$_language->line('lng_label_lang_photo_hide');
                    break;
            }
			$body  .= 'Current status: '.$status.'<br/><br/>';
			
			$body  .= 'Photo detail: <br/>';
			$body  .= 'Description: '.SHIN_Core::$_models['trk_photo_model']->description.'<br/>';
			$body  .= 'Uploaded name: '.substr(SHIN_Core::$_models['trk_photo_model']->sysname, 32, strlen(SHIN_Core::$_models['trk_photo_model']->sysname)).'<br/>';
			$body  .= 'Uploaded date: '.SHIN_Core::$_models['trk_photo_model']->upload_date.'<br/>';
			
			SHIN_Core::$_libs['mailer']->AddAddress(SHIN_Core::$_models['trk_user_model']->sys_user_email, 'Photographer');
			SHIN_Core::$_libs['mailer']->Subject = 'Status for Your photo was changed by Administrator';
			SHIN_Core::$_libs['mailer']->MsgHTML($body);
                
			$result = SHIN_Core::$_libs['mailer']->Send();
            
            if($result) {
                echo json_encode(array('result' => true)); exit();
            }
        }   
        
            echo json_encode(array('result' => false)); exit();
    }
    
    /**
    * init filter system
    * 
    * @access private
    * @param null
    * @return null
    * 
    */
    private function _initFilter(){
        
        $nedded_libs = array('libs'     => array('SHIN_Session'),
                             'models'   => array(array('trk_circuits_model', 'trk_circuits_model')));
        
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        $search  =   SHIN_Core::$_libs['session']->userdata('form-state');
        $type    =   isset($search['type'])     ? $search['type']    : '';
        $country =   isset($search['country'])  ? $search['country'] : '';
        
        SHIN_Core::$_libs['templater']->assign('search',                $search);
        SHIN_Core::$_libs['templater']->assign('circuitList',           SHIN_Core::$_models['trk_circuits_model']->getCircuitList($type, $country));
        SHIN_Core::$_libs['templater']->assign('circuitTypeList',       SHIN_Core::$_models['trk_circuits_model']->getCircuitTypeList());
        SHIN_Core::$_libs['templater']->assign('circuitCountryList',    SHIN_Core::$_models['trk_circuits_model']->getCircuitCountryList());
        
        // add datepicker
        $datepicker = SHIN_Core::$_libs['datepicker']->get_instance();   
        SHIN_Core::$_jsmanager->addComponent($datepicker->render('raceDay'));
        // add timepicker
        $timepicker = SHIN_Core::$_libs['timepicker']->get_instance();
        $timepicker->init(array('showSeconds' => "true",
                                'show24Hours' => "true"));  
        SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['timepicker']->render('raceTimeFrom'));
        
        // add timepicker
        $timepicker = SHIN_Core::$_libs['timepicker']->get_instance();
        $timepicker->init(array('showSeconds' => "true",
                                'show24Hours' => "true"));  
        SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['timepicker']->render('raceTimeTo'));
    }
}
