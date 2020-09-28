<?php

define('AP_ID', 11);

class CommonController extends SHIN_Controller {
    
    function __construct()
	{	
		parent::__construct();

		if(isset(SHIN_Core::$_libs['auth'])){
			if(!SHIN_Core::$_libs['auth']->is_present){
				redirect(shinfw_base_url().'/start', 'refresh');
			}
		}

        if(SHIN_Core::$_run_type == RUNNING_TYPE_NORMAL)
        {
	        $nedded_libs = array('libs' => array('SHIN_DDMenu'));
    	    SHIN_Core::postInit($nedded_libs);
			$this->genMenu();
		}
        
        SHIN_Core::$_libs['seo']->addToTitle(SHIN_Core::$_language->line('lng_label_ppfm_title'));
        SHIN_Core::$_cssmanager->addIncludes(SHIN_Core::$_config['core']['app_base_url'] . '/css/general.css');
	}

	function genMenu()
	{
		// generate general menu with avialable languages and themes. /////////
	    $menuData        = array(
	    							array('text' => SHIN_Core::$_language->line('lng_label_choice_language'), 'data' => array(
	    																		 array('type' => 'link', 'text' => SHIN_Core::$_language->line('lng_label_name_italian'), 'link' => base_url().'/change_language/it'),
                                                                           		 array('type' => 'link', 'text' => SHIN_Core::$_language->line('lng_label_name_english'), 'link' => base_url().'/change_language/en'),
                                                                           		 array('type' => 'link', 'text' => SHIN_Core::$_language->line('lng_label_name_russian'), 'link' => base_url().'/change_language/ru'),	
                                                                           		)
                                  		 ),
								 	array('text' => SHIN_Core::$_language->line('lng_label_choice_theme'), 'data' => array(
								 												array('type' => 'link', 'text' => 'Lightness', 'link' => base_url().'/change_theme/lightness'),
	                                                                          	array('type' => 'link', 'text' => 'Darkness',  'link' => base_url().'/change_theme/darkness'),
	                                                                          	array('type' => 'link', 'text' => 'Redmond',  'link' => base_url().'/change_theme/redmond'),
	                                                                          	array('type' => 'link', 'text' => 'Smoothness',  'link' => base_url().'/change_theme/smoothness'),
	                                                                           )
		                                 ),
	                             	array('text' => SHIN_Core::$_language->line('lng_label_logout'),   'link' => base_url().'/logout')
	                            );

    	$ddmenu          = SHIN_Core::$_libs['ddmenu']->get_instance();
	    $ddmenu->setMenuData('ddmenu', $menuData);
	    SHIN_Core::$_jsmanager->addComponent($ddmenu->render());
	    /////////////////////////////////////////////////////////

	    // ppfmm menu ///////////
	    $menuData        = array(                                               
	                             	array('text' => SHIN_Core::$_language->line('lng_label_main_page_ppfm'),   'link' => base_url().'/main'),
	                             	array('text' => SHIN_Core::$_language->line('lng_label_register'),   'link' => base_url().'/registration'),
	                             	array('text' => SHIN_Core::$_language->line('lng_label_todo'),   'link' => base_url().'/todo'),
	                             	array('text' => SHIN_Core::$_language->line('lng_label_statistic'),   'link' => base_url().'/statistic'),
	                             	array('text' => SHIN_Core::$_language->line('lng_label_usermanage'),   'link' => base_url().'/usermanage'),
	                            );

    	$ppfmddmenu = SHIN_Core::$_libs['ddmenu']->get_instance();
	    $ddmenu->setMenuData('ppfm_ddmenu', $menuData);
	    SHIN_Core::$_jsmanager->addComponent($ppfmddmenu->render());
	    /////////////////////////		
	}

    function index()
	{
		
	}


}


?>