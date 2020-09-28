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
		SHIN_Core::$_models['shinticket_user_model']->__initCustomerID();

        SHIN_Core::$_cssmanager->addIncludes(SHIN_Core::$_config['core']['app_base_url'] . '/css/style.css');
        
        if(SHIN_Core::$_run_type == RUNNING_TYPE_NORMAL)
        {
	        $nedded_libs = array('libs' => array('SHIN_DDMenu'));
    	    SHIN_Core::postInit($nedded_libs);
         
	        $menuData        = array(
                                     array('text' => SHIN_Core::$_language->line('lng_label_send_ticket'),   'link' =>  SHIN_Core::$_config['core']['app_base_url'] . '/ticket/new'),
                                     array('text' => SHIN_Core::$_language->line('lng_label_view_tickets'), 'data' => array(
                                                                                 array('type' => 'link', 'text' => SHIN_Core::$_language->line('lng_label_view_ticket_all'),     'link' => base_url().'/ticket/list'),
                                                                                 array('type' => 'link', 'text' => SHIN_Core::$_language->line('lng_label_view_ticket_close'),   'link' => base_url().'/ticket/list?filter=d'),
                                                                                 array('type' => 'link', 'text' => SHIN_Core::$_language->line('lng_label_view_ticket_archive'), 'link' => base_url().'/ticket/list?filter=a'),
                                                                                 array('type' => 'link', 'text' => SHIN_Core::$_language->line('lng_label_view_ticket_customer'),'link' => base_url().'/ticket/list?filter=c'),
                                                                                 array('type' => 'link', 'text' => SHIN_Core::$_language->line('lng_label_view_ticket_support'), 'link' => base_url().'/ticket/list?filter=s'),
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