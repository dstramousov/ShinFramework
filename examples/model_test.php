<?php

/**
 * ShinPHP Demo part
 *
 * This demo show how work with SHIN_Model (Dimas test).
 *
 * @package		ShinPHP framework
 * @subpackage	Example
 * @category	SHIN_Model demo.
 * @author		
 * @link		
 */    

    require_once("../shinfw/shinfw.php");
    $nedded_libs = array(
                            'help' => array(
                                'dump', 'url', 'form', 'date'
                            ),

                            'core' => array(
                                'SHIN_Log',    
                                'SHIN_Benchmark',
                                'SHIN_JSManager',
                                'SHIN_CSSManager',
                                'SHIN_Database', 
								'SHIN_Language'
                            ),
                        
                            'libs' => array(
                                array('SHIN_Templater'=>'examples'),
                                'SHIN_Tooltip',
                                'Shin_Constants',
								'SHIN_Masked_Input',
                            ),

                            'models' => array(
                                array('examples_crmmasterdata_model', 'examples_crmmasterdata'),
                            ),
                         );
                     
    SHIN_Core::init($nedded_libs);
	SHIN_Core::$_language->load('app', 'en');
	
	// get page instance
    $page = SHIN_Core::$_libs['templater']->get_instance();

	// get user_model instance
    $examples_crmmasterdata = SHIN_Core::$_models['examples_crmmasterdata']->get_instance();
	$examples_crmmasterdata->fetchByID(2);
		
//	dump($examples_crmmasterdata->write_form());
	$page->assign($examples_crmmasterdata->write_form());
	
    SHIN_Core::finalrender('model_test');

/* End of file timepicker.php */
/* Location: example/timepicker.php */