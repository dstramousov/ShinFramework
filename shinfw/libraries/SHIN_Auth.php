<?php if (!defined('BASEPATH')) exit('Base path is not defined');
/**
 * @package		ShinPHP framework
 * @author		
 * @copyright	
 * @license		
 * @link		
 * @since		Version 0.1
 * @filesource  shinfw/libraries/SHIN_Auth.php
 */


/**
 * ShinPHP framework authorization library.
 *
 * @package		ShinPHP framework
 * @subpackage	Library
 * @author		
 * @link		shinfw/libraries/SHIN_Auth.php
 */

define('COUNT_ROLES_FIELD',	10);

class SHIN_Auth
{
    /**
     * Current user who worked with application.
     */
    var $user;

	/**
	 * Options from config/datepicker.php. 
	 */
	var $sh_Options = array();

	/**
	 * Exemplar of Session_model. Initialization automaticaly if $auth['keeping_logic'] = 'db' in to config/auth.php
	 */
	var $sessionModel = NULL;

	/**
	 * Is session exists. 
	 */
	var $is_present = FALSE;
		
	/**
	 * Constructor. Init datepicker with default values from config file.
     *
     * @access public
     * @params NULL.
     * @return NULL.
	 */
    public function __construct()
    {	
        @include(SHIN_Core::isConfigExists('auth.php'));
		
        $this->_config_mapper($auth);
		
		if($auth['keeping_logic'] == 'db')
		{
			//  db style
			SHIN_Core::loadModel(array('sys_session_model', 'session_model'));
			$this->sessionModel = SHIN_Core::$_models['session_model']->get_instance();
			$this->sessionModel->init($this->sh_Options['sess_expiration']/60, $this->sh_Options['sess_time_to_update']/60);
		}
		
		Console::logSpeed('SHIN_Auth begin work, Time taken to get to line: '.__FILE__.'::'.__LINE__);
		Console::logMemory($this, 'SHIN_Auth. Size of class: ');		        
    }

	/**
	 * Post init object. You can make for some parameters customization values.
     *
     * @access public
     * @params $params:array
     * @return NULL.
	 */
    public function init($params)
    {
    	$this->_config_mapper($params);
    }

	/**
	 * Fill internal array with needed values.
     *
     * @access protected
     * @params param:array
     * @return NULL.
	 */
    protected function _config_mapper($param)
    {   
    	if($this->sh_Options){
    		// post init customization variables.
    		$this->sh_Options = array_merge((array)$this->sh_Options, (array)$param);
    	} else {
    		// constructor initialization with default values from config file.
    		$this->sh_Options = $param;
    	}
    }
	
	
    /**
     * Try to get user and user`s session.
     *
     * @access private
     * @return boolean is user authorized 
     */
    function _read_user_session()
    {		
		if($this->sh_Options['keeping_logic'] == 'db'){
			$this->is_present = $this->_read_user_session_db();
		} else {
			$this->is_present = $this->_read_user_session_ss();
		}
	}

    /**
     * Try to get user and user`s session.
     *
     * @access private
     * @return boolean is user authorized 
     */
    function _read_user_session_ss()
    {
		$ret = false;
		
		return $ret;
	}
	
    /**
     * Try to get user and user`s session from DB
     *
     * @access private
     * @return boolean is user authorized 
     */
    function _read_user_session_db()
    {
        if (!$this->sessionModel->read()) {return false;}
		
		$this->user = SHIN_Core::$_models['sys_user_model']->get_instance();

        if (!$this->user->fetchByID($this->sessionModel->uid)) {
			$pk = $this->user->primary_key;
            $this->user->$pk = 0;
            return false;
        }

		$pk = $this->user->primary_key;
		SHIN_Core::$_user = $this->user;
		
		// addons for new field added //////////////////////////
		// request by Stefano. Detail: http://binary-studio.office-on-the.net/issues/5287
		//$data = array('updated' => date('Y-m-d H:i:s'));
		//SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idUser', SHIN_Core::$_user->idUser);
		//SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->update('sys_user', $data); 		
		////////////////////////////////////////////////////////		

		// lang //////////////////////////////////////////////////////////////////////////////
		$_current_language = '';
		//dump(SHIN_Core::$_libs['session']->userdata('language'));
		if(SHIN_Core::$_libs['session']->userdata('language')){
			$_current_language = SHIN_Core::$_libs['session']->userdata('language');
		} else {
			$_current_language = SHIN_Core::$_user->lang;
		}
		if($_current_language == '') {$_current_language = SHIN_Core::$_config['lang']['language'];} 
//		SHIN_Core::$_libs['session']->set_userdata('language', $_current_language);
		//dump($_current_language);
		
		// addons from Dimas (need disscuss with Stefano) 
		// Logic follow. each application can override native language /////
		// if($_current_language != SHIN_Core::$_config['lang']['language']){
		// $_current_language = SHIN_Core::$_config['lang']['language'];
		// }
		////////////////////////////////////////////////////////////////////

		SHIN_Core::$_language->load('app', $_current_language);
	    SHIN_Core::$_current_lang = $_current_language;
	    SHIN_Core::log('debug', '[LANGUAGE] Current language: '.SHIN_Core::$_current_lang);
		//////////////////////////////////////////////////////////////////////////////////////
        
		// theme /////////////////////////////////////////////////////////////////////////////
		$_current_theme = '';
        if(SHIN_Core::$_libs['session']->userdata('theme')){
            $_current_theme = SHIN_Core::$_libs['session']->userdata('theme');
        } else {
			$_current_theme = SHIN_Core::$_user->theme;
        }
		if($_current_theme == '') {SHIN_Core::$_config['theme']['default_theme'];}

	    SHIN_Core::$_theme = $_current_theme;
		//////////////////////////////////////////////////////////////////////////////////////

        return true;
    }


    /**
     * Try login to us system.
     *
     * @access public
     * @return void redirects if not auth
     */
    function trylogin()
    {
		$ret = false;
		
        $err = SHIN_Core::$_models['sys_user_model']->login();

        SHIN_Core::$_language->load('app', 'en');
        $err = SHIN_Core::$_language->line($err);
		
        if ($err != '') {
            SHIN_Core::$_libs['session']->set_userdata('loginErrorMessage', $err);
        } else {
            $this->sessionModel->start(SHIN_Core::$_models['sys_user_model']->idUser);
			$ret = true;
			
			// addons for new field added //////////////////////////
			// request by Stefano. Detail: http://binary-studio.office-on-the.net/issues/5287
			// "host" and "lastlogin" field 
			$data = array('lastlogin' => date('Y-m-d H:i:s'), 'host' => SHIN_Core::$_input->ip_address());
			SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idUser', SHIN_Core::$_models['sys_user_model']->idUser);
			SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->update('sys_user', $data); 		
			///////////////////////////////////////////////////////
        }

		return $ret;
    }

    /**
     * Logout.
     *
     * @access public
     * @return void logout user from the system
     */
    function logout()
	{
		SHIN_Core::$_libs['session']->unset_userdata('language');
		SHIN_Core::$_libs['session']->unset_userdata('theme');
		
		$this->sessionModel->del();
		redirect('start/login', 'refresh');
	}
	

    /**
     * Return pointer for this class.
     *
     * @access public
     * @param NULL
     * @return pointer for this class.
     */
	public function get_instance()
	{
		return $this;
	}
	
	/**
	 * Make up User`s role string from session
     *
     * @access public
     * @params NULL
     * @return array $ret with all roles for this user.
	 */
	function getUserRolesByID($_userid=NULL)
	{
		$count_roles_field = COUNT_ROLES_FIELD;
		$tmp_arr = array();
		
		for($iterator=1 ; $iterator <=$count_roles_field ; $iterator++)
		{		
			$field_name = 'role_'.$iterator;
			$val = SHIN_Core::$_libs['auth']->user->{$field_name};
			if($val){
				array_push($tmp_arr,$val);
			}
			
		}

		return implode("','", $tmp_arr);
	} // end of function 
	

} // End of class 


/* End of file SHIN_Auth.php */
/* Location: shinfw/libraries/SHIN_Auth.php */           	