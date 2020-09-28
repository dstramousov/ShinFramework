<?php

/**
 * @package		ShinPHP framework
 * @author		Dmytro Stramousov
 * @copyright	
 * @license		
 * @link		
 * @since		Version 0.1
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * Project Personal Finance Manager -> PPFM
 *
 * Personal Finance Manager is a software intended to control personal finances, keeping track of incomes, 
 * and expenses. Allow the user to create accounts and track movements, defining category and producing 
 * reports. 
 *
 * @package		ShinPHP framework
 * @subpackage	Project Personal Finance Manager
 * @category	Application 
 * @author		Dmytro Stramousov
 * @link		
 */
    require_once("../shinfw/shinfw.php");
    $nedded_libs = array(
                            'help' => array(
                                'dump', 'url', 'string', 'form', 'array', 'cookie'
                            ),
							
							'models' => array(
								array('sys_user_model', 'sys_user_model'),
								array('ppfm_entry_model', 'ppfm_entry_model'),
                            ),
							
                            'libs' => array(
                                array('SHIN_Templater'=>'ppfm'),
                                array('SHIN_Router'=>'ppfm'),
                                'SHIN_Tooltip',
								'SHIN_SEO',
								'SHIN_Auth',                      
                                'SHIN_Session',
                                'SHIN_Controller',
                                'SHIN_Constants',
                            ),
                            'core' => array(
                                'SHIN_Benchmark',
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
	// End PPFM application.  ///////////////////////////////////////////////////////////////////////


/* End of file index.php */
/* Location: ./ppfm/index.php */
