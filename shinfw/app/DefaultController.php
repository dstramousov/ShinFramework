<?php

require "CommonController.php";

class DefaultController extends CommonController {

    /**
     * Current user who worked with application.
     */
    var $user;
	
    function __construct()
	{
        parent::__construct();

		if(isset(SHIN_Core::$_libs['auth'])){
			if(!SHIN_Core::$_libs['auth']->is_present){
				redirect(base_url().'/start', 'refresh');
			}
		}

		$nedded_libs = array(
							'help' => array('array'),
                            'libs' => array(
								'SHIN_ACL',
                                'SHIN_Menu',
                            ),
                         );

						 
		SHIN_Core::postInit($nedded_libs);
		SHIN_Core::$_libs['menu']->render('GeneralMenu');

		SHIN_Core::$_libs['seo']->addToTitle('This is a main page');
		SHIN_Core::$_libs['seo']->addToTitle('Another part of title');
		SHIN_Core::$_libs['seo']->addToTitle('and some a little :)');

		Console::logMemory(SHIN_Core::$_libs['acl'], 'SHIN_Core::ACL. Size of object: ');
        
    }

    public function index()
	{    
		return 'main_page.tpl';
    }	
}

?>
