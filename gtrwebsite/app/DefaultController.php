<?php

require "CommonController.php";

class DefaultController extends CommonController {
    
    function __construct()
	{
        parent::__construct();
    }

    public function index(){
        // init needed libs
        $nedded_libs = array(
                                'libs'   => array('SHIN_Tabs', 'SHIN_Text_Editor', 'SHIN_Upload', 'SHIN_Datatable', 'SHIN_DDMenu', 'SHIN_DateTimepicker')
                            );
        
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        // add component to the page 
        //SHIN_Core::$_libs['tabs']->init(array('cache' => 'true')); 
        SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['tabs']->render('tabs'));
        
        $needed_includs =   array();
        foreach($nedded_libs['libs'] as $lib) {
            $needed_includs =   array_merge($needed_includs, SHIN_Core::$_libs[strtolower(str_replace('SHIN_', '', $lib))]->getNeededJS());    
        }
        
        SHIN_Core::$_jsmanager->insertJSFromFile($needed_includs);
        // load external js file for CRUD screen
        SHIN_Core::$_jsmanager->insertJSFromFile(array(SHIN_Core::$_config['core']['shinfw_base_url'] . '/' . shinfw_folder() . '/' . '/js/crud/crud.class.js'));
        
    	return 'index.tpl';
    }
} // end of class

?>
