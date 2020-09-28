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
	                            'dump', 'url', 'form', 'date', 'array', 'string'
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
        case 'getnodeinfo':
			$ret = readNodeInformation();
            echo json_encode(array('parentid'  => $ret['idParent'],
										'name'  => $ret['info'],
                                       'id'  => $ret['idNode']));    
            exit();
            break;
        case 'read':
			readNodeInformation();
            exit();
            break;
        case 'updatenode':
			$ret = editNode();
                echo json_encode(array('status'  => true));    
            exit();
            break;
        case 'createnode':
			$ret = createNode();
                echo json_encode(array('status'  => true,
                                       'id'  => $ret));    
			
            exit();
            break;
        case 'removenode':
			deleteNode();
            exit();
            break;
    }
	
    // load languages
    SHIN_Core::$_current_lang = 'en';
    SHIN_Core::$_language->load('app', 'en');
	
    // get instance of templater component
    $page            = SHIN_Core::$_libs['templater']->get_instance();
	
        SHIN_Core::$_libs['js_tree']->init(array(
                                                    'core'      => 'core',
                                                    'json_data' => 'json_data',
                                                    'plugins'   => 'plugins',
                                                    'html_data' => '{ajax : {"url" : "jstree_db_usage.php?action=read"}}',
                                                    'ui'        => 'ui'
                                                 ), 
                                           array(
												'create.jstree' => 'function(e, data) {createNode(e, data, "' . prep_url(base_url().'/jstree_db_usage_with_ui.php?action=createnode') . '", "' . 'Create node' . '")}',
                                                'remove.jstree' => 'function(e, data) {removeNode(e, data, "' . prep_url(base_url().'/jstree_db_usage_with_ui.php?action=removenode') . '", "' .  'Remove node' . '")}',
//                                                'dblclick.jstree' => 'function(e, data) {openDialog(e, data);}',
												)
                                          );
										  
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['js_tree']->render('basic_html2'));
	
    SHIN_Core::$_libs['dialog']->set_title('Dialog form');
    SHIN_Core::$_libs['dialog']->confirm_dialog_correct('dialog-form', 'Update node information', '', Array('Ok'=>'updateNode(e, data)', 'Cancel'=>'closeDlg()'));
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['dialog']->render('dialog-form'));
	
    //render main example template
	SHIN_Core::finalrender('datatables_jstree2');
	exit();
	
	
    /**
    * Delete node by ID
    */
	function readNodeInformation()
	{
		$nodeid = $_REQUEST['id'];
		
		$ret = SHIN_Core::$_models['examples_tree_model']->getNodeInfoByID($nodeid);
		return $ret;
	}
	
	
    /**
    * Delete node by ID
    */
	function createNode()
	{
		$parent = $_REQUEST['parent'];
		
		$data = array(
               'idParent'	=> $parent ,
               'info'		=> 'Create node'
            );

		SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert('examples_tree', $data); 				
		
		return SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert_id();
	}
	
    /**
    * Delete node by ID
    */
	function editNode()
	{
		$id = $_REQUEST['id'];
		$newname = $_REQUEST['name'];
		
		$data = array(
               'info'		=> $newname
            );

		SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idNode', $id);
		SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->update('examples_tree', $data);
		
		return TRUE;		
	}
	
		
    /**
    * Delete node by ID
    */
	function deleteNode()
	{	
		$node = $_REQUEST['idNode'];
		
		SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->delete('examples_tree', array('idNode' => $node)); 
	}
	
/* End of file datatables_jstree.php */
/* Location: example/datatables_jstree.php */