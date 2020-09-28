<?php

/**
 * ShinPHP Demo part
 *
 * This demo show how work with Datatables.
 *
 * @package		ShinPHP framework
 * @subpackage	Example
 * @category	Datatble
 * @author		
 * @link		All examples you can find there: http://datatables.net/examples/
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
	                            'SHIN_CSSManager',
	                            'SHIN_Database'
	                        ),
                        
    	                    'libs' => array(
        	                    array('SHIN_Templater'=>'examples'),
	                            'SHIN_Datatable'
	                        ),
	                     );
    
    // init fw core using needed components                 
    SHIN_Core::init($nedded_libs); 
	
    // get instance of templater component
    $page = SHIN_Core::$_libs['templater']->get_instance();
	
	// get instance of datatable component
	$dt = SHIN_Core::$_libs['datatable']->get_instance();
	
    // initialize datatable
	$_element_id	= 'sample_element';
	$_tableclass	= 'display';
	$_dom_element	= 'domstylemustbehere';
	$_css_column	= 'gradeC';
	$_display_data	= array();
	$_table_data	= array('Record ID', 'File ID', 'Tag name');
	
	// fetch needed data for visualization 
	$query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get('examples_tags', 50, 1);
	foreach ($query->result_array() as $row)
	{
		array_push($_display_data, array('csscolumn'=>$_css_column, 'datacolumn'=>array($row['id'], $row['file_id'], $row['tag'])));
	}
	$query->free_result();

//	dump($_display_data);
    
	// sample 1. dom style
	$dt->initDOMStyle($_dom_element, $_element_id, $_tableclass, $_display_data, $_table_data);	
	SHIN_Core::$_jsmanager->addComponent($dt->render($_element_id));
	
	// sample 2. js style
	$_element_id	= 'sample_element2';
	$_dom_element	= 'jsstylemustbehere';
	$dt->initJSStyle($_dom_element, $_element_id, $_tableclass, $_display_data, $_table_data);
	SHIN_Core::$_jsmanager->addComponent($dt->render($_element_id));

	
	// sample 3. server side processing
	$_element_id	= 'sample_element3';
	$_dom_element	= 'ssstylemustbehere';
	$_table_data	= array('Record ID', 'File id', 'Count uploaded', 'Date');
	
	$fnServerData = 'function ( sSource, aoData, fnCallback ) {
										/* Add some extra data to the sender */
										aoData.push( { "name": "model_name", "value": "examples_file_tracking" } ),
										$.ajax( {
											"dataType": \'json\', 
											"type": "POST", 
											"url": sSource, 
											"data": aoData,
											"success": fnCallback
										} );
									}';

	
	$init_options	= array('bProcessing' => 'true', 'bServerSide' => 'true', 'fnServerData' => $fnServerData);	
	$dt->init($init_options);
	
	$data_inject = $dt->initSSStyle($_dom_element, $_element_id, $_tableclass, $_display_data, $_table_data);
	SHIN_Core::$_jsmanager->addComponent($dt->render($_element_id));
	
    //render main example template
	SHIN_Core::finalrender('datatables');	

/* End of file datatbles.php */
/* Location: example/datatbles.php */
