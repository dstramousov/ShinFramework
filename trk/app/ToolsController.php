<?php

require "CommonController.php";

class ToolsController extends CommonController  {
    
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
    * Default and main function for manage statistic
    * 
    * @access public
    * @param null
    * @return json result
    */
    public function index(){
        
        // init needed libs
        $nedded_libs = array(
						'help' => array('url', 'form'),'libs' => array('SHIN_Mailer', 'SHIN_Upload', 'SHIN_Message'), 'models'    =>  array(array('trk_user_model', 'trk_user_model')));        
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
		
        // 1. get user data
        $data   =   SHIN_Core::$_models['trk_user_model']->getUserData();
		//dump($data);
		$model = SHIN_Core::$_models['trk_user_model']->get_instance();
        SHIN_Core::$_libs['templater']->assign('userData', $data);
        
        // 2. init uploader
        $this->_initUploader();
        
        // 3. init messages and errors blocks
        SHIN_Core::$_libs['templater']->assign('jsMessages',  SHIN_Core::$_libs['message']->getMessageBlock('js-message'));
        SHIN_Core::$_libs['templater']->assign('jsErrors',    SHIN_Core::$_libs['message']->getErrorBlock('js-error'));
        
        return 'proom/tools/index.tpl';     
    }
    
    /**
    * set watermark status
    * 
    * @access public
    * @return json object
    * @param null
    * DEPRECATED
    */
    public function setStatus()
	{
        // init needed libs
        $nedded_libs = array('libs' => array('SHIN_Mailer', 'SHIN_Upload'), 'models'    =>  array(array('trk_user_model', 'trk_user_model')));
        
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        // 1. update watermark status
        $status =   SHIN_Core::$_input->globalarr('status');
        $status =   $status == 'true' ? '1' : '0';
        
		SHIN_Core::$_models['trk_user_model']->updateSnaptrackUser(array('watermark_status' => $status));
        
        echo json_encode(array('result' => true));    
		die();
    }
	
    /**
    * Ajax call for set user action with photo with hi resolution {sell/download}
    * 
    * @access public
    * @param null
    * @return json result
    */
	function setPhotoAction()
	{
        // init needed libs
        $nedded_libs = array('models' => array(array('trk_user_model', 'trk_user_model')));
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        $photoaction = SHIN_Core::$_input->globalarr('photoaction');
        if(empty($photoaction)) {
		    $photoaction = CT_SNAPTRACK_PHOTOACTION_DOWNLOAD;
		}
        
		switch($photoaction) {
			case CT_SNAPTRACK_PHOTOACTION_SELL:
				$photoaction = CT_SNAPTRACK_PHOTOACTION_SELL;
			break;
		}
		
		SHIN_Core::$_models['trk_user_model']->updateSnaptrackUser(array('photoaction' => $photoaction));
		
        echo json_encode(array('result' => true));    
		die();
	}
	
	
	
    /**
    * Ajax call for change WM usage {system/custom/off} for photographer
    * 
    * @access public
    * @param null
    * @return json result
    */
	function setStatusWM()
	{
        // init needed libs
        $nedded_libs = array('models' => array(array('trk_user_model', 'trk_user_model')));
        
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        // 1. update watermark status
        $wmstatus = SHIN_Core::$_input->globalarr('wmstatus');
        if(empty($wmstatus)) {  
		    $wmstatus = CT_SNAPTRACK_WATERMARK_OFF;
		}
        
		switch($wmstatus) {
			case CT_SNAPTRACK_WATERMARK_SYSTEM:
				$wmstatus = CT_SNAPTRACK_WATERMARK_SYSTEM;
			break;
			case CT_SNAPTRACK_WATERMARK_CUSTOM:
				$wmstatus = CT_SNAPTRACK_WATERMARK_CUSTOM;
			break;
		}
        
		SHIN_Core::$_models['trk_user_model']->updateSnaptrackUser(array('watermarkusage' => $wmstatus));
        
        echo json_encode(array('result' => true));    
		die();
	} // end of function 
    
    /**
    * upload new watermark
    * 
    * @access public
    * @return json object
    * @param null
    * 
    */
    public function uploadWatermark(){
        
        // init needed libs
        $nedded_libs = array('libs' => array('SHIN_Upload'));
        
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        $wtPath = SHIN_Core::$_config['core']['base_path'] . SHIN_Core::$_runned_application . DIRECTORY_SEPARATOR . SHIN_Core::$_config['gallery']['photo_photographer_data'] . DIRECTORY_SEPARATOR . SHIN_Core::$_user->idUser;   
       
        // 1. upload WT
        SHIN_Core::$_libs['upload']->process_upload($wtPath, 'wtUploader');
        
        // 2. resize WT to needed dimensions
        $this->_resizeWt($wtPath, 'wtUploader');
        
        // 3. delete not resized img
        if(is_file($wtPath . DIRECTORY_SEPARATOR . $this->_getUploadedFileName('wtUploader'))) {
            unlink($wtPath . DIRECTORY_SEPARATOR . $this->_getUploadedFileName('wtUploader'));
        }
        
        echo json_encode(array('result' => true)); exit(); 
    }
    
    /**
    * save watermark name in the database
    * 
    * @access public
    * @return json object
    * @param null
    * 
    */
    public function saveWt()
	{        
        $fileName   =   SHIN_Core::$_input->globalarr('wtFile');
        
        // init needed libs
        $nedded_libs = array('models'    =>  array(array('trk_user_model', 'trk_user_model')));
        
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        // 1. get old information
        $userData   =   SHIN_Core::$_models['trk_user_model']->getUserData();

		//for first need check exist or not OLD WATERMARK!!!!
        // 2. delete old WT
		if(isset($userData['file_name'])){
			$oldWt  =   SHIN_Core::$_config['core']['base_path'] . SHIN_Core::$_runned_application . DIRECTORY_SEPARATOR . SHIN_Core::$_config['gallery']['photo_photographer_data'] . DIRECTORY_SEPARATOR . SHIN_Core::$_user->idUser . DIRECTORY_SEPARATOR . $userData['file_name'];
			if(is_file($oldWt)) {unlink($oldWt);}    			
		} else {
			$oldWt = NULL;
		}
        
        // 3. save new information
        SHIN_Core::$_models['trk_user_model']->updateSnaptrackUser(array('wtm_file_name' => SHIN_Core::$_config['gallery']['prefix_for_watermark'] . $fileName));
            
        
        echo json_encode(array('result' => true, 'message' => SHIN_Core::$_language->line('lng_label_wt_upload_success'))); exit();
    }
	    
    /**
    * save watermark position
    * 
    * @access public
    * @return json object
    * @param null
    * 
    */
    public function savePosition(){
        
        $position   =   SHIN_Core::$_input->globalarr('position');
        
        // init needed libs
        $nedded_libs = array('models'    =>  array(array('trk_user_model', 'trk_user_model')));
        
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        // 3. save new information
        if(!empty($position)) {
            SHIN_Core::$_models['trk_user_model']->updateSnaptrackUser(array('watermark_position' => $position)); $result = true;
        } else {
            $result = false;
        }
            
        echo json_encode(array('result' => $result)); exit();
        
    }
    
    /**
    * initialize watermark uploader
    * 
    * @access protected
    * @param null
    * @return null
    * 
    */
    protected function _initUploader(){
        
        $wtSize     =   ceil(SHIN_Core::$_config['gallery']['watermark_size'] / 1024 / 1024);
        $wtHeight   =   SHIN_Core::$_config['gallery']['watermark_max_height'];
        $wtWidth    =   SHIN_Core::$_config['gallery']['watermark_max_width'];
        
        SHIN_Core::$_libs['templater']->assign('lng_label_wt_size_limit', sprintf(SHIN_Core::$_language->line('lng_label_wt_size_limit'), $wtSize, $wtHeight, $wtWidth));
        
        // init additional components
        $uploaderOptions = array('fileDataName'     => '"wtUploader"',
                                 'multi'            => 'false',
                                 'auto'             => 'false',
                                 'queueSizeLimit'   => 1,
                                 'script'           => "'" . prep_url(base_url().'/tools/wtupload') . "'",
                                 'fileExt'          => "'*.jpg;*.gif;*.png;'",
                                 'onAllComplete'    => 'uploadComplete',
                                 'onSelect'         => 'selectFile',
                                 'sizeLimit'        => SHIN_Core::$_config['gallery']['watermark_size']);
    
        // init uploader first button                         
        SHIN_Core::$_libs['upload']->init($uploaderOptions);
        SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['upload']->render('wtUploader'));    
    }
    
    /**
    * resize wt to needed sizes
    * 
    * @param string $wtPath - path to loaded WT
    * @param string $fileDataName
    * @access protected
    * @return null
    */
    protected function _resizeWt($wtPath, $fileDataName){
        
        // init needed libs
        $nedded_libs = array('libs' => array('SHIN_Image'));
        
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        $height     = SHIN_Core::$_config['gallery']['watermark_max_height'];
        $width      = SHIN_Core::$_config['gallery']['watermark_max_width'];
        
        $fileName   = SHIN_Core::$_config['gallery']['prefix_for_watermark'] . $this->_getUploadedFileName($fileDataName);
        $temp = $wtPath . DIRECTORY_SEPARATOR . $fileName;
        
        SHIN_Core::$_libs['image']->load($wtPath . DIRECTORY_SEPARATOR . $this->_getUploadedFileName($fileDataName))->resize($width, $height)->saveToFile($wtPath . DIRECTORY_SEPARATOR . $fileName);
        
    }
    
    /**
    * get uploaded file name
    * 
    * @param string $fileDataName
    * @access protected
    * @return string
    */
    protected function _getUploadedFileName($fileDataName) {
        
        return $_FILES[$fileDataName]['name'];    
    }
    
    /**
    * get watermark image link
    * 
    * @access public
    * @return json object
    * @param null
    * 
    */
    public function getWtImgLink(){
        
         // init needed libs
        $nedded_libs = array('models' => array(array('trk_user_model', 'trk_user_model')));        
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        // 1. get user data
        $data   =   SHIN_Core::$_models['trk_user_model']->getUserData();
        
        echo json_encode(array('link' => $data['wtm_file_name'])); exit();   
    } 
    
}

?>