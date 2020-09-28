<?php

/**
 * ShinPHP Demo part
 *
 * This demo show how work with DateTimepicker.
 *
 * @package		ShinPHP framework
 * @subpackage	Example
 * @category	Datepicker
 * @author		
 * @link		
 */
	
    // include main fw file
	require_once("../shinfw/shinfw.php");
	// array of libs, models, helpers, core components
    $nedded_libs = array(
    	                    'help' => array(
	                            'dump', 'url', 'date'
	                        ),

	                        'core' => array(
	                            'SHIN_Log',	
	                            'SHIN_Benchmark',
	                            'SHIN_JSManager',
	                            'SHIN_CSSManager'
	                        ),
                        
    	                    'libs' => array(
        	                    array('SHIN_Templater'=>'examples'),
	                            'SHIN_DateTimepicker'
	                        ),
	                     );
    
    // init fw core using needed components                 
	SHIN_Core::init($nedded_libs); 
    
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['datetimepicker']->render('testdtpicker'));

    //render main example template
	SHIN_Core::finalrender('datetimepicker');

/* End of file datetimepicker.php */
/* Location: example/datetimepicker.php */
