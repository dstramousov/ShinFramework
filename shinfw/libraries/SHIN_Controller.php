<?php if (!defined('BASEPATH')) exit('Base path is not defined');


class SHIN_Controller 
{

    /**
     * Current user access mode prefix for fetch some template.
     */
    var $template_folder;

    /**
     * Enable/disable by config file the "Language switcher pannel". (see $config['show_language_panel'] in config.php)
     */
    var $show_language_panel;
	
    /**
     * Constructor.
     */	
    public function __construct()
    {
		SHIN_Core::log('debug', 'SHIN_Controller class initialized');

		Console::logSpeed('SHIN_Controller begin work, Time taken to get to line: '.__FILE__.'::'.__LINE__);
		Console::logMemory($this, 'SHIN_Controller. Size of class: ');		        
    }
	
	function index(){
		dump('SHIN_Controller index function');
	}
		
    /**
     * Realise login action for each application, used SHIN_Session. Can be override in to children if need some specific rules. 
     *
     * @access public
     * @return null
     */	
	function login(){
		dump('SHIN_Controller login function');
	}
	
	
    /**
     * Realise logout logic.
     *
     * @access public
     * @return void logout user from the system. Delete Session information.
     */
    function logout()
	{
		SHIN_Core::$_libs['auth']->logout();
	}
	

    /**
	* Action for changing language.
	*
	* @access public
	* @param string $language language set to
	* @return NULL
     */	
	function change_language($language)
    {
		$backUrl = SHIN_Core::$_input->server('HTTP_REFERER');

		$this->_setLanguage($language);
		$backUrl=$backUrl?$backUrl:'/start/login/';

		redirect($backUrl, 'refresh');
    }	
	
	/**
	* Check and set language in session.
	*
	* @access private
	* @param string $language language set to
	* @return NULL
	*/
    function _setLanguage($language)
    {
      	$lang_available = array();

    	// keep new language value
    	$_lang = SHIN_Core::$_config['lang']['available_language'];
	
		if (in_array($language, $_lang)) {
	    	$_user_lang = $language;
		} else {
	    	$_user_lang = SHIN_Core::$_config['lang']['language'];
		}

		SHIN_Core::$_libs['session']->set_userdata('language', $_user_lang);
		SHIN_Core::log('error', "Set specified language '$_user_lang'");
		
		return;
	}
    
	/**
	* Action for changing language.
	*
	* @access public
	* @param string $theme language set to.
	* @return NULL
	*/
    function change_theme($theme)
	{        
        $backUrl = SHIN_Core::$_input->server('HTTP_REFERER');
                
        $this->_setTheme($theme);
        $backUrl = $backUrl ? $backUrl : '/start/login/';
		
        redirect($backUrl, 'refresh');
    }
    
	/**
	* Check and set theme in session.
	*
	* @access private
	* @param string $language language set to
	* @return NULL
	*/
    function _setTheme($theme)
	{        
        $lang_available = array();

        // keep new language value
        $_theme = SHIN_Core::$_config['theme']['theme_available'];
    
        if (in_array($theme, $_theme)) {
            $_user_theme = $theme;
        } else {
            $_user_theme = SHIN_Core::$_config['theme']['default_theme'];
        }
         
        SHIN_Core::$_libs['session']->set_userdata('theme', $_user_theme);
        SHIN_Core::log('debug', "Set specified language '$theme'");
    } 
}

/* End of file SHIN_Controller.php */
/* Location: ./shinfw//libraries/SHIN_Controller.php */

?>
