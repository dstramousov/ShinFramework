<?php

require "CommonController.php";

class ErrorController extends CommonController {

	
    function __construct()
	{
        parent::__construct();

		//SHIN_Core::log('debug', '!!!  ErrorController class initialized');
		
		if(isset(SHIN_Core::$_libs['auth'])){
			if(!SHIN_Core::$_libs['auth']->is_present){
				redirect(base_url().'/start', 'refresh');
			}
		}

    }

    public function applistfile()
	{    
		return 'errors/applistfile_err.tpl';
    }	
}

?>
