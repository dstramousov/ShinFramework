<?php

/**
 * ShinPHP Demo part
 *
 * This demo show how work with Datepicker.
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
	                            'SHIN_Datepicker'
	                        ),
	                     );
    
    // init fw core using needed components                 
	SHIN_Core::init($nedded_libs); 
    
    // set different parameters using internal component methods 
    SHIN_Core::$_libs['datepicker']->setIconTrigger('both', true);
    SHIN_Core::$_libs['datepicker']->setMinMaxDate('-1m', '+1m');
    SHIN_Core::$_libs['datepicker']->showWeek(true, 3);
    SHIN_Core::$_libs['datepicker']->showOtherMonths(true, false);
    SHIN_Core::$_libs['datepicker']->showButtonPanel(true);
    SHIN_Core::$_libs['datepicker']->showYearAndMonthDD(true, true);
    SHIN_Core::$_libs['datepicker']->setCalendarNumber(3, true);
		
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['datepicker']->render('testdatepicker'));

    //render main example template
	SHIN_Core::finalrender('datepicker');

/* End of file datepicker.php */
/* Location: example/datepicker.php */
