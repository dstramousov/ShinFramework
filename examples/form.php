<?php

/**
 * ShinPHP Demo part
 *
 * This demo show how work with Form helper.
 *
 * @package		ShinPHP framework
 * @subpackage	Example
 * @category	Form generator demo
 * @author		
 * @link		
 */

	require_once("../shinfw/shinfw.php");

	$nedded_libs = array(
                        'help' => array(
                            'dump', 'url', 'form'
                        ),

                        'core' => array(
	                        'SHIN_Log',	
	                        'SHIN_Input',	
                            'SHIN_Benchmark',
                        ),
                        
                        'libs' => array(
							array('SHIN_Templater'=>'examples'),
                        ),
                     );
                     
	SHIN_Core::init($nedded_libs);

	$page = SHIN_Core::$_libs['templater']->get_instance();

	// Start exsample //////////////////////////////////////


	// End exsample ////////////////////////////////////////
	SHIN_Core::finalrender('form');

/* End of file dbusage.php */
/* Location: example/dbusage.php */