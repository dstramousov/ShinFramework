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
 * 
 *
 * @package		ShinPHP framework
 * @subpackage	
 * @category	Application 
 * @author		
 * @link		
 */
    
    require_once("../shinfw/shinfw.php");
    $nedded_libs = array(
                            'help' => array(
                                'dump', 'url', 'string','array', 'cookie', 'date', 'validate'
                            ),
							
							'models' => array(
								array('sys_user_model', 'sys_user_model'),
                            ),
							
                            'libs' => array(
                                array('SHIN_Templater'=>'trk'),
                                array('SHIN_Router'=>'trk'),
								'SHIN_SEO',
								'SHIN_Auth',
                                'SHIN_Session',
                                'SHIN_Controller', 
								'SHIN_Constants', 
								'SHIN_PrjConstants',
								'SHIN_LimitsManager',
                            ),
                            'core' => array(
                                'SHIN_JSManager',
                                'SHIN_Language',
								'SHIN_Database',
                                'SHIN_Input',
								'SHIN_Log',
                            ),
                         );

    SHIN_Core::init($nedded_libs);
    SHIN_Core::finalrender(SHIN_Core::runRoute());
	// End snaptrack front end website application.  /////////////////////////////////////////////////////////////////


/* End of file index.php */
/* Location: ./trk/index.php */
