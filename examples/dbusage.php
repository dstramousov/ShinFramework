<?php

/**
 * ShinPHP Demo part
 *
 * This demo show how work with Datepicker.
 *
 * @package		ShinPHP framework
 * @subpackage	Example
 * @category	Database fetch data demo
 * @author		
 * @link		
 */

	require_once("../shinfw/shinfw.php");

	$nedded_libs = array(
                        'help' => array(
                            'dump', 'url'
                        ),
                        'core' => array(
	                        'SHIN_Log',	
                            'SHIN_Database',
                            'SHIN_Benchmark',
                        ),
                        
                        'libs' => array(
							array('SHIN_Templater'=>'examples'),
                        ),
                     );
                     
	SHIN_Core::init($nedded_libs);

	$page = SHIN_Core::$_libs['templater']->get_instance();

//	$model = SHIN_Core::$_libs['filetracking_model']->get_instance();

	// Start exsample //////////////////////////////////////

	// Test 1.   PASSED
	$query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get('examples_file_tracking', 10, 20);
	foreach ($query->result_array() as $row)
	{
		$page->append('sample1_res', $row);
	}
	$query->free_result();

	// Test 2.   PASSED
	SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('id, file_id, count, created');
	SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->limit(20);
	$query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get('examples_file_tracking');
	foreach ($query->result_array() as $row)
	{
		$page->append('sample2_res', $row);
	}
	$query->free_result();

	// Test 3.   PASSED
	$query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get_where('examples_file_tracking', array('id' => 2));
	foreach ($query->result_array() as $row)
	{
		$page->assign('sample3_res', $row);
	}
	$query->free_result();

	SHIN_Core::finalrender('dbusage');

/* End of file dbusage.php */
/* Location: example/dbusage.php */