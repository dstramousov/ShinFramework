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
                                'dump', 'url', 'form', 'string'
                            ),

                            'core' => array(
                                'SHIN_Log',    
                                'SHIN_Benchmark',
                                'SHIN_JSManager',
                                'SHIN_CSSManager',
                                'SHIN_Database', 
								'SHIN_Language',
								'SHIN_Input',
                            ),
                        
                            'libs' => array(
                                array('SHIN_Templater'=>'examples'),
                                'SHIN_Tooltip',
                                'Shin_Constants',
                                'SHIN_URI',
                                'SHIN_Session',
                            ),

                            'models' => array(
                                array('sys_user_model', 'sys_user'),
                                array('examples_tag_model', 'examples_tag'),
                            ),
                         );
                     
    SHIN_Core::init($nedded_libs);

	
	SHIN_Core::$_language->load('app', 'en');
	
    $m = SHIN_Core::$_models['examples_tag']->get_instance();

    $m->printCollectionObjects();

    SHIN_Core::finalrender('model_several_test');

/* End of file timepicker.php */
/* Location: example/timepicker.php */