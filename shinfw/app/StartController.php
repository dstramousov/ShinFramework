<?php

/**
 * shinfw/app/StartController.php
 *
 * Start controller. Show login page if user not logged or general-main page of shinframework controller
 *
 */

class StartController {

    function __construct() {}

	/**
	 * Main action.
     *
     * @access public
	 */
	function index()
	{
        $neededLibs = array(
                            'libs' => array(
                                'SHIN_Message',
                                'SHIN_Session'
                            ),
                          );
        SHIN_Core::postInit($neededLibs);
        
        $message  = SHIN_Core::$_libs['message']->get_instance();
        $message->addError(SHIN_Core::$_libs['session']->userdata('loginErrorMessage'));
        
        SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['message']->render('message'));

        SHIN_Core::$_libs['session']->unset_userdata('loginErrorMessage');
		
        return 'login.tpl';
	}
	
    /**
     * Try login to us system.
     *
     * @access public
     * @return void redirects if not auth.
     */
    function trylogin()
    {	
		$ret_url = base_url();
	
		if(SHIN_Core::$_libs['auth']->trylogin()){
			$ret_url .= '/main';
		} else {
            $neededLibs = array('libs' => array('SHIN_Session'));
            SHIN_Core::postInit($neededLibs);
            
            $ret_url .= '/start';
		}
        
        redirect($ret_url, 'refresh');
    }
	
}

/* End of file StartController.php */
/* Location: shinfw/app/StartController.php */
