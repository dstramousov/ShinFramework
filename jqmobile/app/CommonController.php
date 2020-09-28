<?php

class CommonController extends SHIN_Controller {

    function __construct()
	{	
		parent::__construct();

		if(isset(SHIN_Core::$_libs['auth'])){
			if(!SHIN_Core::$_libs['auth']->is_present){
				redirect(shinfw_base_url().'/start', 'refresh');
			}
		}                                                                                       

		if(isset(SHIN_Core::$_cssmanager)){
	        SHIN_Core::$_cssmanager->addIncludes(SHIN_Core::$_config['core']['app_base_url'] . '/css/style.css');
	    }
    }
    
    /**
    * detect Android phone
    * 
    * @access public
    * @return boolean
    * @param null
    * 
    */
    public function mobileDetect(){
        
          $ua = strtolower($_SERVER['HTTP_USER_AGENT']);
          if(stripos($ua, 'android') !== false || stripos($ua, 'iPhone') != false || stripos($ua, 'iPod') != false) {
            return true;
          }
            return false; 
    }
}

?>