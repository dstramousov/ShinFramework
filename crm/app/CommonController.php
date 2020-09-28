<?php

class CommonController extends SHIN_Controller {

    /**
     * Current user who worked with application.
     */
    var $user;
    
    function __construct()
	{	
		parent::__construct();

		if(isset(SHIN_Core::$_libs['auth'])){
			if(!SHIN_Core::$_libs['auth']->is_present){
				redirect(shinfw_base_url().'/index.php/start', 'refresh');
			}
		}
        
	}

    function index()
	{
	}


}


?>