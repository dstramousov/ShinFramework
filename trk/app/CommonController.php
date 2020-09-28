<?php

class CommonController extends SHIN_Controller {

	var $attach_storer = '';
    
    /**
    * Constructor
    * 
    * @access public
    * @param null
    * @return null
    */
    
    function __construct()
	{	
		parent::__construct();
		
		// check for adwanced search ///////////////////////////////////////////
		if(!SHIN_Core::$_user){
			SHIN_Core::$_libs['templater']->assign('anon_readonly_addons', 'readonly="readonly" disabled="disabled"');
			SHIN_Core::$_libs['templater']->assign('label_only_after_register', '&nbsp;[<b>Enable only after register</b>]');
		}
		// and disable some parameters for anonymous //////////////////////////

        // init needed libs
        $nedded_libs = array('core'   => array('SHIN_CSSManager'));
        SHIN_Core::postInit($nedded_libs);
        
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
    
        /**
    * Print top block with relation folllow information user logged/notlogged and user type.
    * 
    * @access private
    * @param  VOID
    * @return VOID
    * 
    */
    protected function _printTopBlock()
    {
        // init needed libs
        $nedded_libs = array('libs' => array('SHIN_Session'));
                             
        SHIN_Core::postInit($nedded_libs);
            
        // analyse "toprightblock" block 
        if(SHIN_Core::$_user)
		{
            SHIN_Core::$_libs['templater']->assign('toprightblock', '<div class="user-name right">' . SHIN_Core::$_language->line('lng_label_welcome_user') . SHIN_Core::$_user->name.' '.SHIN_Core::$_user->lastname.'</div>');
            
            // fetch trk user ////////////
            $nedded_libs = array('models' => array(array('trk_user_model','trk_user_model')));
            SHIN_Core::postInit($nedded_libs);
            
            $cart   =   SHIN_Core::$_libs['session']->userdata('cart');
            if(empty($cart)) {
                $cart   =   array();
            }
            
            SHIN_Core::$_libs['templater']->assign('cart', $cart);
            
            ////////////////////////////////////            
			$__tpl = NULL;
            switch(SHIN_Core::$_user->role_1) {
                case CT_SNAPTRACK_USERTYPE_PHOTOGRAPHER:
                    $__tpl = SHIN_Core::$_libs['templater']->setBlock('web/proom/proomlinks-phtotographer.tpl');
                    break;
                case CT_SNAPTRACK_USERTYPE_ADMIN:
                    $__tpl = SHIN_Core::$_libs['templater']->setBlock('web/proom/proomlinks-admin.tpl');
                    break;
                case CT_SNAPTRACK_USERTYPE_VIEWER:
                    $__tpl = SHIN_Core::$_libs['templater']->setBlock('web/proom/proomlinks-viewer.tpl');
                    break;
            }
            
      	if($__tpl){
				SHIN_Core::$_libs['templater']->assign('proomblock', $__tpl);
			} else {			
				$__tpl = SHIN_Core::$_libs['templater']->setBlock('web/newlogin.tpl');SHIN_Core::$_libs['templater']->assign('toprightblock', $__tpl);
			}
        } else {
            $__tpl = SHIN_Core::$_libs['templater']->setBlock('web/newlogin.tpl');
            SHIN_Core::$_libs['templater']->assign('toprightblock', $__tpl);
        }        
	} // end of function

    /**
    * Send message after each sight admin actions
    * 
    * @access public
    * @param null
    * @return json result
    */
	function sendAdminActionsMail($for_name, $for_email, $body, $sbj)
	{
		SHIN_Core::$_libs['mailer']->AddAddress($for_email, $for_name);
		SHIN_Core::$_libs['mailer']->Subject = $sbj;
		SHIN_Core::$_libs['mailer']->MsgHTML($body);
                
		$result = SHIN_Core::$_libs['mailer']->Send();
	} // end of function
    
    /**
    * init search form
    * 
    * @access private
    * @return null
    * @param null
    * 
    */
    public function _initSearchForm(){
        
        // load external js file for RATE system
        SHIN_Core::$_jsmanager->insertJSFromFile(array(SHIN_Core::$_config['core']['app_base_url'] . '/js/jquery.raty.js')); 
        
        
        // array of libs, models, helpers, core components
        $nedded_libs = array('libs' => array(
                                'SHIN_Datepicker',
                                'SHIN_Timepicker',
                                'SHIN_Session'
                            ),
                            'models' => array(array('trk_circuits_model', 'trk_circuits_model'))
                         );
    
        // init fw core using needed components                 
        SHIN_Core::postInit($nedded_libs);
        
        
        // add datepicker
        $datepicker = SHIN_Core::$_libs['datepicker']->get_instance();   
        SHIN_Core::$_jsmanager->addComponent($datepicker->render('raceDay'));
        // add timepicker
        $timepicker = SHIN_Core::$_libs['timepicker']->get_instance();
        $timepicker->init(array('showSeconds' => "true",
                                'show24Hours' => "true"));  
        SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['timepicker']->render('raceTimeFrom'));
        
        // add timepicker
        $timepicker = SHIN_Core::$_libs['timepicker']->get_instance();
        $timepicker->init(array('showSeconds' => "true",
                                'show24Hours' => "true"));  
        SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['timepicker']->render('raceTimeTo'));
        
        $search  =   SHIN_Core::$_libs['session']->userdata('search');
        $type    =   isset($search['type'])     ? $search['type']    : '';
        $country =   isset($search['country'])  ? $search['country'] : '';
    
        SHIN_Core::$_libs['templater']->assign('search',                $search);
        SHIN_Core::$_libs['templater']->assign('circuitList',           SHIN_Core::$_models['trk_circuits_model']->getCircuitList($type, $country));
        SHIN_Core::$_libs['templater']->assign('circuitTypeList',       SHIN_Core::$_models['trk_circuits_model']->getCircuitTypeList());
        SHIN_Core::$_libs['templater']->assign('circuitCountryList',    SHIN_Core::$_models['trk_circuits_model']->getCircuitCountryList());
        
    }
    
    /**
    * return HTTP url for photo (for injected in to first page)
    * 
    * @access private
    * @param NULL
    * @return $ret string contained HTTP url
    * 
    */
    protected function _getRandomPhoto()
    {
        $__photos = array();
        
        if ($handle = opendir(SHIN_Core::$_config['gallery']['header_page_photo_storer'])) {
            while (false !== ($file = readdir($handle))) {
                if ($file != "." && $file != ".." && $file != ".svn") {
                    array_push($__photos, SHIN_Core::$_config['gallery']['header_page_photo_storer'].'/'.$file);
                }
            }
            
            closedir($handle);
        }
        shuffle($__photos);
        
        if($__photos){
            SHIN_Core::$_libs['templater']->assign('header_rand_image_url', $__photos[0]);
        }
        
        return;
    }
	
} // end of class

?>