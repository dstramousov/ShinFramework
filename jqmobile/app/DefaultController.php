<?php

require "CommonController.php";

class DefaultController extends CommonController {
    
    function __construct()
	{
        parent::__construct();
    }

    public function index() {
        
        // array of libs, models, helpers, core components
        $nedded_libs = array('libs' => array('SHIN_JQueryMobile'));
        
        // init fw core using needed components.
        SHIN_Core::postInit($nedded_libs);
        
        SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['jquerymobile']->render());
        
        return 'index.tpl';
    }
} // end of class

?>
