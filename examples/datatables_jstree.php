<?php

/**
 * ShinPHP Demo part
 *
 * This demo show how work with Datatables and JSTree.
 *
 * @package		ShinPHP framework
 * @subpackage	Example
 * @category		Datatble
 * @author		
 * @link		All examples you can find there: http://datatables.net/examples/
 */
	// include main fw file
	require_once("../shinfw/shinfw.php");
    $nedded_libs = array(
    	                    'help' => array(
	                            'dump', 'url', 'form', 'date', 'array'
	                        ),

	                        'core' => array(
	                            'SHIN_Log',	
	                            'SHIN_JSManager',
	                            'SHIN_CSSManager',
	                            'SHIN_Database',
                                'SHIN_Language',
                                'SHIN_Input'
	                        ),
                        
    	                    'libs' => array(
        	                    array('SHIN_Templater'=>'examples'),
	                            'SHIN_Datatable',
                                'SHIN_Dialog',
                                'SHIN_Message',
                                'SHIN_Button',
                                'SHIN_Js_Tree',
	                        ),
                             'models' => array(array('examples_tree_model', 'examples_tree_model'))
	                     );
    
    // init fw core using needed components                 
    SHIN_Core::init($nedded_libs);
    
    // get info about user action.
    $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;
    
    // manage actions
    switch($action) {
        case 'read':
			readNodeInformation();
            exit();
            break;
        case 'movenode':
			moveNode();
            exit();
            break;
        case 'deletenode':
			deleteNode();
            exit();
            break;
    }
	
    // load languages
    SHIN_Core::$_current_lang = 'en';
    SHIN_Core::$_language->load('app', 'en');
	
    // get instance of templater component
    $page            = SHIN_Core::$_libs['templater']->get_instance();
     
    // examples with async data load
    $jsTree          = SHIN_Core::$_libs['js_tree']->get_instance();
    
    $options                                =   array();
    $options['html_data']['ajax']['url']    =   '"datatables_jstree.php?action=read"';
    
    $jsTree->init($options);
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['js_tree']->render('basic_html2'));

    //render main example template
	SHIN_Core::finalrender('datatables_jstree');
	exit();
	
	
	
    /**
    * Delete node by ID
    */
	function readNodeInformation()
	{
		$ret = SHIN_Core::$_models['examples_tree_model']->getTreeInfo();
		echo $ret;
	}
	
    /**
    * Delete node by ID
    */
	function moveNode()
	{
	}
	
    /**
    * Delete node by ID
    */
	function deleteNode()
	{
		
	}
	
	

/* End of file datatables_jstree.php */
/* Location: example/datatables_jstree.php */
