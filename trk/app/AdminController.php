<?php

require "CommonController.php";

class AdminController extends CommonController {
    
    /**
    * Constructor
    * 
    * @access public
    * @param null
    * @return json result
    */
    function __construct()
	{
        parent::__construct();

        if(isset(SHIN_Core::$_libs['auth'])){
			if(!SHIN_Core::$_libs['auth']->is_present){
				redirect(base_url().'/main', 'refresh');
			}
		}
    } // end of function 

    /**
    * Default and main function
    * 
    * @access public
    * @param null
    * @return json result
    */
    public function index()
    {
        $nedded_libs = array(
                                'libs'   => array('SHIN_Tabs', 
                                                  'SHIN_Datatable', 
                                                  'SHIN_Upload',
                                                  'SHIN_Timepicker',
                                                  'SHIN_Datepicker',
                                                  'SHIN_DateTimepicker')
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
        
        SHIN_Core::$_cssmanager->addIncludes(SHIN_Core::$_config['core']['app_base_url'] . '/css/style.css');
		
        return 'admin/index.tpl';
    }
	
	
} // end of class

?>
