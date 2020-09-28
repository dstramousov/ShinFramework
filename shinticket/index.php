<?php

/**
 * @package		ShinPHP framework
 * @author		Dmytro Stramousov
 * @copyright	
 * @license		
 * @link		
 * @since		Version 0.2
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * ShinTicket is designed to help you streamline support requests and improve customer support efficiency by providing 
 * staff with tools they need to deliver fast, effective and measurable support. 
 *
 * @package		ShinPHP framework
 * @subpackage	SHINTicket
 * @category	Application 
 * @author		
 * @link		
 */
    require_once("../shinfw/shinfw.php");

    $nedded_libs = array(
                            'help' => array(
                                'dump', 'url', 'string','array', 'cookie'
                            ),
							
							'models' => array(
								array('sys_user_model', 'sys_user_model'),
                                array('shinticket_user_model', 'shinticket_user_model')
                            ),
							
                            'libs' => array(
                                array('SHIN_Templater'=>'shinticket'),
                                array('SHIN_Router'=>'shinticket'),
                                'SHIN_Tooltip',
								'SHIN_SEO',
								'SHIN_Auth',
								'SHIN_Constants',
                                'SHIN_Session',
                                'SHIN_Controller'                      
                            ),
                            'core' => array(
                                'SHIN_JSManager',
                                'SHIN_Language',
                                'SHIN_CSSManager',
								'SHIN_Database',
                                'SHIN_Input',
                                'SHIN_Log',
                            ),
                         );

    SHIN_Core::init($nedded_libs);

	SHIN_Core::finalrender(SHIN_Core::runRoute());
	// End SHINTicket application.  ////////////////////////////////////////////////////////////////////


/* End of file index.php */
/* Location: ./shinticket/index.php */
