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
                                'dump', 'url', 'form', 'array'
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
                                'Shin_Constants',
                            ),

                            'models' => array(
                                array('sys_user_model', 'sys_user_model'),
                                array('examples_user_model', 'examples_user_model'),
                            ),
                         );
                     
    SHIN_Core::init($nedded_libs);

	SHIN_Core::$_language->load('app', 'en');
	SHIN_Core::$_current_lang = 'en';
	
    $m2 = SHIN_Core::$_models['examples_user_model']->get_instance();
		
	// FOR EACH TEST PLS UNCOMENT DUMP !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! 
	
	// test 1
	// fetch record from table snaptrack_user_model with number of record 1
	$m2->fetchByID(3);
	//dump($m2->write());
	
	//$m2->{$m2->primary_key} = 0;
	//$m2->save();
//	dump($m2);
	//dump($m2->write());	

	// test 2
	// fetch group of recordS from table snaptrack_user_model with role_1 (THIS IS VIRTUAL FIELD) = "r0060"
	$query = $m2->get_expanded_result(array('where'=>"role_1='r0060'"));
	foreach ($query->result_array() as $row)
	{
		dump($row);
	}

	// test 3
	// fetch group of recordS from table snaptrack_user_model with snaptrack_user.name (THIS IS NOT VIRTUAL FIELD) = "dimas"
	$query = $m2->get_expanded_result(array('where'=>"username='dimas'"));
	foreach ($query->result_array() as $row)
	{
		dump($row);
	}
	
	// test 3
	// fetch group of recordS from table snaptrack_user_model with snaptrack_user.name (THIS IS NOT VIRTUAL FIELD) = "dimas"
	$query = $m2->get_expanded_result(array('where'=>"lang='en'", 'order_by'=>'name asc'));
	foreach ($query->result_array() as $row)
	{
		//dump($row);
	}
	

    SHIN_Core::finalrender('model_v_test');

/* End of file timepicker.php */
/* Location: example/timepicker.php */