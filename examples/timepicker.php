<?php

/**
 * ShinPHP Demo part
 *
 * This demo show how work with Datepicker.
 *
 * @package		ShinPHP framework
 * @subpackage	Example
 * @category	Timepicker demo.
 * @author		
 * @link		
 */    

     // include main fw file
    require_once("../shinfw/shinfw.php");
    // array of libs, models, helpers, core components
    $nedded_libs = array(
                            'help' => array(
                                'dump', 'url'
                            ),

                            'core' => array(
                                'SHIN_Log',    
                                'SHIN_Benchmark',
                                'SHIN_JSManager',
                                'SHIN_CSSManager'
                            ),
                        
                            'libs' => array(
                                array('SHIN_Templater'=>'examples'),
                                'SHIN_Timepicker'
                            ),
                         );
    
    // init fw core using needed components                 
    SHIN_Core::init($nedded_libs); 

    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['timepicker']->render('timepicker'));

    //render main example template
    SHIN_Core::finalrender('timepicker');

/* End of file timepicker.php */
/* Location: example/timepicker.php */