<?php

require "CommonController.php";

class ManagmentController extends CommonController {
    
    function __construct()
    {
        parent::__construct();
    }

    public function index(){

        
        // init needed libs
        $nedded_libs = array(
                                'libs'   => array('SHIN_Tabs', 'SHIN_Dialog', 'SHIN_Button', 'SHIN_Datatable', 'SHIN_Upload', 'SHIN_Js_Tree', 'SHIN_Text_Editor', 'SHIN_DDMenu'),
                            );
        
        // load needed libs
        SHIN_Core::postInit($nedded_libs);

        // add component to the page 
        //SHIN_Core::$_libs['tabs']->init(array('cache' => 'true')); 
        SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['tabs']->render('tabs'));
        
        // get active tab from session or from request
        SHIN_Core::$_libs['templater']->assign('active_tab', isset($_REQUEST['tab']) ? $_REQUEST['tab'] : 'tabs-1');
        
        // load external js file for CRUD screen
        $needed_includs =   array();
        foreach($nedded_libs['libs'] as $lib) {
            $needed_includs =   array_merge($needed_includs, SHIN_Core::$_libs[strtolower(str_replace('SHIN_', '', $lib))]->getNeededJS());    
        }
        
        SHIN_Core::$_jsmanager->insertJSFromFile($needed_includs);
        SHIN_Core::$_jsmanager->insertJSFromFile(array(SHIN_Core::$_config['core']['shinfw_base_url'] . '/' . shinfw_folder() . '/' . '/js/crud/crud.class.js',
                                                       SHIN_Core::$_config['core']['app_base_url']    . '/js/jstree/jstree.init.js',
                                                       SHIN_Core::$_config['core']['app_base_url']    . '/js/jstree/jstree.callback.js'));
        
        return 'managment/index.tpl';
    }
} // end of class

?>
