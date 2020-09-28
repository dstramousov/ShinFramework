<?php

class CommonController extends SHIN_Controller {

	var $attach_storer = '';
    
    function __construct()
	{	
		parent::__construct();

		if(isset(SHIN_Core::$_libs['auth'])){
			if(!SHIN_Core::$_libs['auth']->is_present){
				redirect(shinfw_base_url().'/start', 'refresh');
			}
		}                                                                                       

		if(isset(SHIN_Core::$_cssmanager)){
	        SHIN_Core::$_cssmanager->addIncludes(SHIN_Core::$_config['core']['app_base_url'] . '/css/style.css');
	    }

		//$this->genMenu();
    }


    function genMenu()
    {
        if(SHIN_Core::$_run_type == RUNNING_TYPE_NORMAL)
        {
	        $nedded_libs = array('libs' => array('SHIN_DDMenu'));
    	    SHIN_Core::postInit($nedded_libs);
         
	        $menuData        = array(
                                     array('text' => SHIN_Core::$_language->line('lng_label_send_ticket'),   'link' =>  SHIN_Core::$_config['core']['app_base_url'] . '/index.php/ticket/new'),
                                     array('text' => SHIN_Core::$_language->line('lng_label_view_tickets'), 'data' => array(
                                                                                 array('type' => 'link', 'text' => SHIN_Core::$_language->line('lng_label_view_ticket_all'),     'link' => SHIN_Core::$_config['core']['app_base_url'] . '/index.php/ticket/list'),
                                                                                 array('type' => 'link', 'text' => SHIN_Core::$_language->line('lng_label_view_ticket_close'),   'link' => SHIN_Core::$_config['core']['app_base_url'] . '/index.php/ticket/list?filter=d'),
                                                                                 array('type' => 'link', 'text' => SHIN_Core::$_language->line('lng_label_view_ticket_archive'), 'link' => SHIN_Core::$_config['core']['app_base_url'] . '/index.php/ticket/list?filter=a'),
                                                                                 array('type' => 'link', 'text' => SHIN_Core::$_language->line('lng_label_view_ticket_customer'),'link' => SHIN_Core::$_config['core']['app_base_url'] . '/index.php/ticket/list?filter=c'),
                                                                                 array('type' => 'link', 'text' => SHIN_Core::$_language->line('lng_label_view_ticket_support'), 'link' => SHIN_Core::$_config['core']['app_base_url'] . '/index.php/ticket/list?filter=s'),
                                                                               )
                                         )
                                );

	        $ddmenu          = SHIN_Core::$_libs['ddmenu']->get_instance();
	        $ddmenu->setMenuData('ticket_ddmenu', $menuData);
	        SHIN_Core::$_jsmanager->addComponent($ddmenu->render());
		}

    }

}

?>