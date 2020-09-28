<?php

/**
 * system\application\controllers\start.php
 *
 * Default controller.
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
			$ret_url .= '/login';
		}
		redirect($ret_url, 'refresh');
    }
	
}

/* End of file StartController.php */
/* Location: ./ppfm/application/StartController.php */
