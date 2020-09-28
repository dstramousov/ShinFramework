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
                                'dump', 'url', 'form'
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
                            ),

                            'models' => array(
								array('gtrwebsite_answers_model', 'gtrwebsite_answers'),
								array('gtrwebsite_question_model', 'gtrwebsite_question'),
								array('gtrwebsite_tree_model', 'gtrwebsite_tree'),
                            ),
                         );
                     
    SHIN_Core::init($nedded_libs);

	SHIN_Core::$_language->load('app', 'en');
	
    $m = SHIN_Core::$_models['gtrwebsite_tree']->get_instance();
	
	// try to delete from tabls "GTRWEBSITE_TREE" record with idNode = 5 and delete related records from answers and questions
	$ret = $m->delCascading(5);
    $page = SHIN_Core::$_libs['templater']->get_instance();
	
	$page->assign(array('count_deleted_record' => $ret));

    SHIN_Core::finalrender('model_del_cascading_test');

/* End of file timepicker.php */
/* Location: example/timepicker.php */