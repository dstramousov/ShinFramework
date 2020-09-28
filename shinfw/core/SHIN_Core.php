<?php
/**
 * @package		ShinPHP framework
 * @subpackage	Core
 * @author		
 * @copyright	
 * @license		
 * @link		
 * @since		Version 0.1
 * @filesource
 */

define('RUNNING_MODE_DEVELOPMENT', 'development');
define('RUNNING_MODE_PRODUCTION', 'production');

define('RUNNING_TYPE_NORMAL', 'normal');
define('RUNNING_TYPE_AJAX', 'ajax');

define('APACHE_TYPE_FASTCGI', 'cgi-fcgi');
define('APACHE_TYPE_MODULE', 'module');

define('PLATFORM_TYPE_UNIX', 'unix');
define('PLATFORM_TYPE_WINDOWS', 'win');

class SHIN_Core
{
	public static $_runned_application;
	public static $_apache_mode;

	public static $_run_mode;  		// Running mode. Possible values: development OR production. Each application can override.
	public static $_run_type;  		// Running type. Possible values: normal OR ajax. 
	public static $_user;  			// User (reference). 

	public static $_db = array();  	// database core component
	public static $_shdb;  			// For keeping SHIN_Database ex object.

	public static $_exceptions;		// exceptions core component
	public static $_benchmark;			// benchmark core component
	public static $_language;			// language core component
	public static $_config;			// config core component This is not real class. init from _init function. Loaded  always !!!
    public static $_log;				// logger core component
    public static $_input;				// input core component

    public static $_cssmanager;		// CSS Manager core component
    public static $_jsmanager;			// JavaScript manager core component

    public static $_libs = array();	// For keeping all loaded libraries
    public static $_models = array();	// For keeping all loaded models
    public static $_workers = array();// For keeping all loaded workers
    
	
    public static $_model_loaded = false;
    public static $_worker_loaded = false;
    public static $_baselib_loaded = false;
    public static $_basewidget_loaded = false;	
	
    public static $_loaded_libs = array();
	
    public static $_current_lang;		// Current language
    public static $_theme;				// Current theme name
    public static $_theme_url;			// Current theme url: http://mywork/shinframework/shinfw/themes/redmond
    public static $_platform_type;		// Current platform: UNIX or WINDOWS
	
	public static $runner;
	public static $method;
	
	
	public static $applistpath = array();
		
    /**
     * @return SHIN_SqlMagic the database singleton, auto create if the singleton has not been created yet.
     */
    public static function db()
    {
		self::loadCore('db/SHIN_Database');
		self::$_shdb = new SHIN_Database;
		
		if(self::$_shdb->need_load_primary_driver){
			self::loaddb(self::$_shdb->sys_database);
		}
		
        return;
    }
	
    /**
     * Load and init another/different DB driver
     * @param string Index from shinframework\shinfw\config\database.php 
     * @return NULL
     */
    public static function loaddb($active_group)
    {		
		if(!$active_group){
			SHIN_Core::show_error('Invalid active_group from config file database.php. Pls check this.');			
		}
		
		$driver = 'SHIN_DB_'.self::$_shdb->config_information[$active_group]['dbdriver'].'_driver';
		
		require_once(COREPATH.'db/drivers/'.self::$_shdb->config_information[$active_group]['dbdriver'].'/'.$driver.'.php');
        self::$_db[$active_group] = new $driver(self::$_shdb->config_information[$active_group]);
		
		if (self::$_db[$active_group]->autoinit == TRUE)
		{
			SHIN_Core::$_db[$active_group]->initialize();
		}		
		
		return;
    }
	
	
    /**
     * Imports the definition of class(es) and tries to create an object/a list of objects of the class.
     * @param string|array $class_name Name(s) of the class to be imported
     * @param string $path Path to the class file
     * @param bool $createObj Determined whether to create object(s) of the class
     * @return mixed returns NULL by default. If $createObj is TRUE, it creates and return the Object of the class name passed in.
     */
    protected static function load($class_name, $path, $createObj=FALSE)
    {
		if(is_array($class_name)){
			$__arr = each($class_name);
			$class_name			= $__arr['key'];
			$constructor_val	= $__arr['value'];
		} else {
	   		$constructor_val	= NULL;
	   	}
		
		if(in_array($class_name, self::$_loaded_libs)){
			return;
		} else {
			array_push(self::$_loaded_libs, $class_name);
		}
		
		$internal_name = strtolower(str_replace(self::$_config['core']['subclass_prefix'], '', $class_name));
//		echo($internal_name.'<br/>');
				
		if(in_array($internal_name, self::$_libs)){return;}
		
		if(is_file($path . "$class_name.php")){
			require_once($path . "$class_name.php");
		} else {
			require_once(self::$_config['core']['base_path'].self::$_runned_application.DIRECTORY_SEPARATOR.'libraries'.DIRECTORY_SEPARATOR."$class_name.php");
		}
    		
		if($createObj)
		{
			self::$_libs[$internal_name] = new $class_name($constructor_val);
			return;
		}
    }
	
    /**
     * Load and create Workers classes. This classes realise some part of BUsines logic 
     * @param string|array $class_name Name(s) of the Worker class to be loaded
     * @return NULL
     */
    public static function loadWorker($params)
	{
		
		require_once("workers/$params.php");
		$alias=str_replace('SHIN_', '', $params);
		$alias=str_replace('_worker', '', $alias);
		
		if(!isset(self::$_workers[$alias])){
			self::$_workers[$alias] = new $params();
		}
	}

    /**
     * Imports the definition of User defined class(es). Class file is located at <b>SITE_PATH/libraries/</b>
     * @param string|array $class_name Name(s) of the class to be imported
     * @param bool $createObj Determined whether to create object(s) of the class
     * @return mixed returns NULL by default. If $createObj is TRUE, it creates and return the Object(s) of the class name passed in.
     */
    public static function loadLibrary($class_name, $createObj=FALSE)
	{	
		if(!self::$_baselib_loaded){
			self::load('SHIN_Libs', BASEPATH ."libraries".DIRECTORY_SEPARATOR, FALSE);
			self::$_baselib_loaded = true;
		}
        return self::load($class_name, BASEPATH ."libraries".DIRECTORY_SEPARATOR, $createObj);
    }
	
	function __autoload($class) {
		die("You are try to load class with unknown type. Class:".$class); 
	}	
			
    /**
     * Imports the definition of Model class(es). Class file is located at <b>SITE_PATH/models/</b>
     * @param string|array $class_name Name(s) of the Model class to be imported
     * @param bool $createObj Determined whether to create object(s) of the class
     * @return mixed returns NULL by default. If $createObj is TRUE, it creates and return the Object(s) of the class name passed in.
     */
    public static function loadModel($params)
	{
		if(!self::$_model_loaded){
			self::loadLibrary('SHIN_Model');
			self::loadLibrary('SHIN_SelectQuery');
			self::$_model_loaded = TRUE;
		}
	
		$__data = preg_split("/_/", $params[0]);
		$app_raw_name = strtolower($__data[0]);
		
		if($app_raw_name == 'sys'){
			$app_folder = self::$_config['core']['shinfw_folder'];
		} else {
			$app_folder = self::$applistpath[$app_raw_name];
		}
		
		$path = self::$_config['core']['base_path'].$app_folder;
			
		$__p = 	strtolower($path.DIRECTORY_SEPARATOR.'models'.DIRECTORY_SEPARATOR.$params[0].'.php');
		
		if(count($params) == 2)
		{
            if(!is_file($__p))
			{
                self::show_error("Model ".$__p." not exists. Pls check path.");
            }
			require_once($__p);
			
			self::$_models[strtolower($params[1])] = new $params[0]();
		} else {
			require_once($__p);
		}
		
		return;
    } // end of function
	
	
    /**
     * Imports the definition of Helper class(es). Class file is located at <b>BASE_PATH/helpers/</b>
     * @param string|array $class_name Name(s) of the Helper class to be imported
     * @param bool $createObj Determined whether to create object(s) of the class
     * @return mixed returns NULL by default. If $createObj is TRUE, it creates and return the Object(s) of the class name passed in.
     */
    public static function loadHelper($file_name, $createObj=FALSE)
	{
        return self::load('SHIN_'.$file_name.'_helper', BASEPATH ."helpers".DIRECTORY_SEPARATOR, $createObj);
    }

    /**
     * Imports the definition of SHIN framework core class. Class file is located at <b>COREPATH</b>.
     * @example If the file is in a package, called <code>loadCore('SHIN_Log')</code>
     * @param string $class_name Name of the class to be imported
     */
    protected static function loadCore($class_name)
	{
        require_once(COREPATH ."$class_name.php");
    }

    /**
     * Imports the definition of SHIN framework core class. Class file is located at <b>COREPATH</b>.
     * @example If the file is in a package, called <code>initCoreComponent('SHIN_Log')</code>
     * @param string $class_name Name of the class to be imported
     */
    public static function initCoreComponent($class_name)
    {
    	$alias_core_name = '_'.strtolower(preg_replace('/SHIN_/', '', $class_name));

        if($alias_core_name == '_database'){
        	self::db();
        } else {

			if(self::$$alias_core_name===NULL){ // NB variable-variable
	    		self::loadCore($class_name);
    	    	self::$$alias_core_name = new $class_name;
    	    }
		}
    }

    /**
     * Return version number.
     * @example null
     * @param string Version
     */         	
    public static function version()
	{
    	return self::$_config['core']['shfw_version'];
    }

	/**
	* Logging Interface
	*
	* We use this as a simple mechanism to access the logging
	* class and send messages to be logged.
	*
	* @access	public
	* @return	void
	*/
	public static function log($level = 'error', $message, $php_error = FALSE)
	{    
        if(self::$_log)
        {
            if(self::$_log->_enabled)
            {
                self::$_log->write_log($level, $message, $php_error);
            }
        }
	}


    /**
     * Protected function for loading some parameters.
	*
	* @access	private
	* @return	void
     */         	
    public static function __in_load($params)
	{
	
		$tmp_views_array = array();
	
		// need load specific libraries
		if(isset($params['help'])){
               foreach($params['help'] as $needed){
				self::loadHelper($needed, FALSE);
			}
		}

		if(isset($params['core'])){
			foreach($params['core'] as $needed){
				self::initCoreComponent($needed);
			}
		}
		
		if(isset($params['libs'])){
			foreach($params['libs'] as $needed){
           		self::loadLibrary($needed, TRUE);
			}
		}

		if(isset($params['models'])){
		
			if(!self::$_db){
				SHIN_Core::show_error('You are try to load some model without database layer. Pls add in your required core components <b>SHIN_Database</b>');			
			}
			
			foreach($params['models'] as $needed){
				self::loadModel($needed, TRUE);
			}
		}
					
		if(isset($params['views'])){
			foreach($params['views'] as $needed){
				self::loadModel($needed, TRUE);
			}
		}
		
		if(isset($params['workers'])){
			foreach($params['workers'] as $needed){
           		self::loadWorker($needed, TRUE);
			}
		}
    }
		
	static function postInit($params)
	{
		self::__in_load($params);
	}


	/**
	* Set internal variable for type of calling.
	*
	* @access	public	
	* @return	string theme path for TPL 
	*/
	private static function _isAjax()
	{	
		self::$_run_type = RUNNING_TYPE_NORMAL;
		if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']=="XMLHttpRequest"){
			self::$_run_type = RUNNING_TYPE_AJAX;
		}
		
		return;
	}  	

	/**
	* Enty point in SHIN_Core class.
	*
	*
	* @access	public
	* @param	array	with needed libraries
	* @return	void
	*/
	static function init($params = NULL)
	{
		/*
		|---------------------------------------------------------------
		| PHP ERROR REPORTING LEVEL
		|---------------------------------------------------------------
		|
		| By default runs with error reporting set to ALL.  For security
		| reasons you are encouraged to change this when your site goes live.
		| For more info visit:  http://www.php.net/error_reporting
		|
		*/
		session_start();
		
		// check and set platform 
		if(isset($_SERVER['WINDIR'])){
			self::$_platform_type = PLATFORM_TYPE_WINDOWS;
		} else {
			self::$_platform_type = PLATFORM_TYPE_UNIX;
		}
		
		$__tmp = php_sapi_name();
    	if($__tmp == APACHE_TYPE_FASTCGI){
			self::$_apache_mode = APACHE_TYPE_FASTCGI;
		} else {
			self::$_apache_mode = APACHE_TYPE_MODULE;
		}
		
		
		// Load main config file and place in to static component  self::$_config
		include_once(self::isConfigExists('config.php'));
		
		include_once(self::isConfigExists('applistpath.php'));
		self::$applistpath = $appSymToRealName;

		self::$_config		= $config;
		self::$_theme		= self::$_config['theme']['default_theme'];
		self::$_theme_url	= self::$_config['theme']['theme_root_dir'] .'/'. self::$_theme;
		date_default_timezone_set(SHIN_Core::$_config['core']['timezone']);
		
		self::$_runned_application = str_replace(self::$_config['core']['shinfw_base_url'].'/', '', self::$_config['core']['app_base_url']);
		$__fr = strstr(self::$_runned_application, '//');
		if($__fr){
            self::$_runned_application = self::$_config['core']['shinfw_folder']; 
        }
		//self::$_runned_application = self::$applistpath[self::$_runned_application];       //ken
						
		self::_isAjax();
		
		// Profiler start
		if(self::$_config['core']['profiler_information'] && self::$_run_type == RUNNING_TYPE_NORMAL){
			self::loadLibrary('SHIN_Profiler', TRUE);
			Console::logSpeed('SHIN_Core begin work, Time taken to get to line: '.__FILE__.'::'.__LINE__);
			Console::logMemory(self::$_libs, 'SHIN_Core LIBRARIES. Size of array: ');
			Console::logMemory(self::$_models, 'SHIN_Core MODELS. Size of array: ');
		} else {
			// Not created exemplar of classes, BUT load and make acessible dummer function for logging.
			self::loadLibrary('SHIN_Profiler', FALSE);
		}
		
		// mode running 
		if(isset(self::$_config['core']['mode'])){
			self::$_run_mode	= self::$_config['core']['mode'];
		} else {
			self::$_run_mode	= RUNNING_MODE_PRODUCTION;
		}
        
		if($params)
		{   
			self::__in_load($params);
			
		} else {
			// load default libraries
			self::_shfw_autoloader();
		}
				
		Console::log('-------> START <-------');
		
		if(SHIN_Core::$_benchmark){
			SHIN_Core::$_benchmark->mark('code_start');
		}
		
		// if Auth present in required libraries need make initialization of this part of core.
		if(isset(self::$_libs['auth'])){
			self::$_libs['auth']->_read_user_session();
		}
		
		// Define and keep current theme url.
		if(self::$_theme){
			$__theme = self::$_theme;
		} else {
			$__theme = self::$_config['theme']['default_theme'];
		}
		self::$_theme_url	= self::$_config['theme']['theme_root_dir'] .'/'. $__theme;
		
		// if ACL present in required libraries need make initialization of this part of core.
		if(isset(self::$_libs['acl']))
		{
			self::$_libs['acl']->init();
			if(!self::$_libs['acl']->isAuthorized)
			{
				redirect(shinfw_base_url().'/start', 'refresh');
			}
		}
				
		self::log('debug', 'SHIN_Core loaded successfull.');
		Console::log('-------> SHIN_Core::init() was finished. Part of busines logic. <-------');
	}

	/**
	* Autoload defined core components, libraries, helpers from config file.
	*
	* @access	private
	* @return	void
	*/
	static function _shfw_autoloader()
    {
		include_once(BASEPATH.'config'.DIRECTORY_SEPARATOR.'autoload.php');

		if ( ! isset($autoload))
		{
			return FALSE;
		}

		// Autoload helpers.
		foreach ($autoload['helper'] as $type)
		{			
			self::loadHelper($type);
		}

		// Autoload core components.
		foreach ($autoload['core'] as $type)
		{			
			self::initCoreComponent($type);
		}

		/*
		if(SHIN_Core::$_benchmark){
			SHIN_Core::$_benchmark->mark('code_start');
		}
		*/
		
		// Autoload libraries.
		foreach ($autoload['libraries'] as $type)
		{
			self::loadLibrary($type, TRUE);
		}

		// Autoload models.
		foreach ($autoload['models'] as $type)
		{
			self::loadModel($type, TRUE);
		}
	}

	/**
	* Set HTTP Status Header
	*
	* @access	public
	* @param	int 	the status code
	* @param	string	
	* @return	void
	*/
	static function set_status_header($code = 200, $text = '')
	{
		$stati = array(
						200	=> 'OK',
						201	=> 'Created',
						202	=> 'Accepted',
						203	=> 'Non-Authoritative Information',
						204	=> 'No Content',
						205	=> 'Reset Content',
						206	=> 'Partial Content',

						300	=> 'Multiple Choices',
						301	=> 'Moved Permanently',
						302	=> 'Found',
						304	=> 'Not Modified',
						305	=> 'Use Proxy',
						307	=> 'Temporary Redirect',

						400	=> 'Bad Request',
						401	=> 'Unauthorized',
						403	=> 'Forbidden',
						404	=> 'Not Found',
						405	=> 'Method Not Allowed',
						406	=> 'Not Acceptable',
						407	=> 'Proxy Authentication Required',
						408	=> 'Request Timeout',
						409	=> 'Conflict',
						410	=> 'Gone',
						411	=> 'Length Required',
						412	=> 'Precondition Failed',
						413	=> 'Request Entity Too Large',
						414	=> 'Request-URI Too Long',
						415	=> 'Unsupported Media Type',
						416	=> 'Requested Range Not Satisfiable',
						417	=> 'Expectation Failed',

						500	=> 'Internal Server Error',
						501	=> 'Not Implemented',
						502	=> 'Bad Gateway',
						503	=> 'Service Unavailable',
						504	=> 'Gateway Timeout',
						505	=> 'HTTP Version Not Supported'
					);

		if ($code == '' OR ! is_numeric($code))
		{
			self::show_error('Status codes must be numeric', 500);
		}

		if (isset($stati[$code]) AND $text == '')
		{				
			$text = $stati[$code];
		}
	
		if ($text == '')
		{
			self::show_error('No status text available.  Please check your status code number or supply your own message text.', 500);
		}
	
		$server_protocol = (isset($_SERVER['SERVER_PROTOCOL'])) ? $_SERVER['SERVER_PROTOCOL'] : FALSE;

		if (substr(php_sapi_name(), 0, 3) == 'cgi')
		{
			header("Status: {$code} {$text}", TRUE);
		}
		elseif ($server_protocol == 'HTTP/1.1' OR $server_protocol == 'HTTP/1.0')
		{
			header($server_protocol." {$code} {$text}", TRUE, $code);
		}
		else
		{
			header("HTTP/1.1 {$code} {$text}", TRUE, $code);
		}
	}

	/**
	* Error Handler
	*
	* This function lets us invoke the exception class and
	* display errors using the standard error template located
	* in shinfw/errors/errors.php                                                                               	
	* This function will send the error page directly to the
	* browser and exit.
	*	
	* @access	public
	* @return	void
	*/
	static function show_error($message, $status_code = 500)
	{
		self::initCoreComponent('SHIN_Exceptions');
		echo self::$_exceptions->show_error('An Error Was Encountered', $message, 'error_general', $status_code);
		exit;
	}


	/**
	* 404 Page Handler
	*
	* This function is similar to the show_error() function above
	* However, instead of the standard error template it displays
	* 404 errors.
	*
	* @access	public	
	* @return	void
	*/
	static function show_404($page = '')
	{                                                                                                             	
		self::initCoreComponent('SHIN_Exceptions');
		self::$_exceptions->show_404($page);
		exit;
	}
		
	/**
	* Final output to browser
	*
	* @access	public	
	* @return	void
	*/
	static function finalrender($_template='index')
	{
		Console::log('-------> Part of busines logic finished. <-------');
	
		if(self::$_jsmanager){
			self::$_libs['templater']->assign('jsincludes', self::$_jsmanager->renderIncludes());
			self::$_libs['templater']->assign('jsnondocready', self::$_jsmanager->renderOutDocReady());
			self::$_libs['templater']->assign('jsdocready', self::$_jsmanager->renderDocReady());
		}

		if(self::$_cssmanager){			
			self::$_cssmanager->addIncludes(self::$_config['core']['shinfw_base_url'].'/'.self::$_config['core']['shinfw_folder']."/themes/".self::$_theme.'/css/'.self::$_config['theme']['general_css_file']);
			self::$_libs['templater']->assign('cssincludes', self::$_cssmanager->renderIncludes());
		}

		// benchmark if it`s needed
		if(SHIN_Core::$_config['core']['benchmark_debug_information'] && SHIN_Core::$_benchmark)
		{
			SHIN_Core::$_benchmark->mark('code_end');
			SHIN_Core::$_libs['templater']->assign('timerun', 'Time run: '.SHIN_Core::$_benchmark->elapsed_time('code_start', 'code_end'));
			SHIN_Core::$_libs['templater']->assign('memory',  'Memory take: '.SHIN_Core::$_benchmark->memory_usage());
	    }
		
		// language menu if it`s needed
		if(SHIN_Core::$_config['lang']['print_lang_menu']){
			self::getLangMenu();
		}
		
		Console::logSpeed('SHIN_Core end of work, Time taken to get to line: '.__FILE__.'::'.__LINE__);
		
		self::$_libs['templater']->render($_template);
	}
	
	
	/**
	 * Print language menu.
	 *
     * @access public
     * @return void.
	 */
    static function getLangMenu()
    {
    	$_lang = SHIN_Core::$_config['lang']['available_language'];

    	$lang_menu_items = '';
        foreach ($_lang as $lang) {

            if (!strcmp($lang, self::$_current_lang)) {

                SHIN_Core::$_libs['templater']->assign(array(
                    "current_lang_sh_name"		=> $lang,
                    "current_lang_image_url"	=> SHIN_Core::$_config['core']['app_base_url'].'/'.SHIN_Core::$_config['lang']['lang_image_current_url_'.$lang],
                ));

                $lang_menu_items .= SHIN_Core::$_libs['templater']->setBlock(SHIN_Core::$_config['lang']['template_container_path'].'_lang_menu_item_current');

            } else {

                SHIN_Core::$_libs['templater']->assign(array(
                    "new_lang"					=> $lang,
                    "new_lang_name"				=> $lang, //SHIN_Core::$_libs['templater']->getMessage($lang),
                    "new_lang_image_url"		=> SHIN_Core::$_config['core']['app_base_url'].'/'.SHIN_Core::$_config['lang']['lang_image_url_'.$lang], 
                ));

				$lang_menu_items .= SHIN_Core::$_libs['templater']->setBlock(SHIN_Core::$_config['lang']['template_container_path'].'_lang_menu_item');
            }
        }		

        SHIN_Core::$_libs['templater']->assign(array("lang_menu_items" => $lang_menu_items));
		$__tpl = self::$_libs['templater']->setBlock(SHIN_Core::$_config['lang']['template_container_path'].'_lang_menu');
		self::$_libs['templater']->assign(SHIN_Core::$_config['lang']['template_injectedvariable_name'], $__tpl);
    } // end of function

	/**
	* Is Application have owner needed config 
	*
	* @access	public	
	* @return	TRUE or FALSE
	*/
	static function isConfigExists($config_name)
	{
		$_ret = '';

		if(is_file('config'.DIRECTORY_SEPARATOR.$config_name)){$_ret = 'config'.DIRECTORY_SEPARATOR.$config_name;} else {if(is_file('..'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.$config_name)){$_ret = '..'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.$config_name;} else {$_ret = BASEPATH.'config'.DIRECTORY_SEPARATOR.$config_name;}}
		
		SHIN_Core::log('debug', '[CORE] Try load config file: '.$_ret);
		
		return $_ret;
	}

    
    /**
    * Get theme config path
    * 
    * @access    public    
    * @return    TRUE or FALSE
    * 
    */
    static function loadThemeConfig()
    {
        $_ret = '';
		
        if(is_file(BASEPATH.'themes/' . self::get_theme_path() . '/config.php'))
        {
            $_ret = BASEPATH.'themes/' . self::get_theme_path() . '/config.php';             
        }
        return $_ret;
    }

	/**
	* Get theme path
	*
	* @access	public	
	* @return	string theme path for TPL 
	*/
	static function get_theme_path()
	{
		return self::$_theme;
	}
	
	/**
	* Get theme path
	*
	* @access	public	
	* @return	string theme path for TPL 
	*/
	static function get_theme_url_path()
	{
		return self::$_theme_url;
	}
		

	/**
	* Get theme path
	*
	* @access	public	
	* @return	string theme path for TPL 
	*/
	static function runRoute()
	{
		$runner_obj = NULL;

		if(!self::$_libs['router']){
			SHIN_Core::show_error('SHIN_Routing class not loaded. Pls check $autoload section');
		} else {
			$runner_obj = self::$_libs['router']->fetch_class();
			self::$runner = get_class($runner_obj);
			
			self::$method = self::$_libs['router']->method;
			Console::log('Routing system try to processed: "'.self::$runner.'::'.self::$method.'"');
			
			if(isset(self::$_libs['templater']) && self::$_language){
				self::$_libs['templater']->assignByRef(self::$_language->language);
			}
			
			if(isset(self::$_libs['seo'])){self::$_libs['seo']->render(); }
			
			return call_user_func_array(array($runner_obj, self::$method), array_slice(SHIN_Core::$_libs['uri']->rsegments, 2));
		}
	}

	/**
	* Run requested widgets.
	*
	* @access	public	
	* @return	string theme path for TPL 
	*/
	static function runWidget($_widget_name_raw, $_params)
	{
		if(!self::$_basewidget_loaded){
			self::load('SHIN_Widget', BASEPATH ."libraries".DIRECTORY_SEPARATOR, FALSE);
			self::$_basewidget_loaded = true;
		}

		$_arr = preg_split('/\//', $_widget_name_raw);
		$load_result = FALSE;
		if(count($_arr) == 2){
			$load_result	= self::loadWidget($_arr[1], $_arr[0]);
			$_widget_name	= $_arr[1];
		} else { 
			$load_result	= self::loadWidget($_widget_name_raw);
			$_widget_name	= $_widget_name_raw;
		}
		
		if($load_result){
			return self::$_libs[$_widget_name]->render($_params);
		} else {			
			$_error_str = '!!!!! Widget not loaded !!!!!  Application: "'.$_arr[0].'" widget name: "'.$_arr[1].'"';
			SHIN_Core::log('error', $_error_str);
			return $_error_str;
		}
	}

    /**
     * Class file is located at <b>SITE_PATH/libraries/widgets/</b>
     * @param string|array $class_name Name(s) of the class to be imported
     * @param bool $createObj Determined whether to create object(s) of the class
     * @return mixed returns NULL by default. If $createObj is TRUE, it creates and return the Object(s) of the class name passed in.
     */
    public static function loadWidget($_raw_widget_name, $add_path=NULL)
	{	
		$_widget_name = 'SHIN_'.ucfirst($_raw_widget_name);

		Console::logSpeed('Widget "'.$_widget_name.'" load successful.');
		
		if($add_path){
			if(is_file(SHIN_Core::$_config['core']['base_path'].DIRECTORY_SEPARATOR.$add_path.DIRECTORY_SEPARATOR.'libraries'.DIRECTORY_SEPARATOR.'widgets'.DIRECTORY_SEPARATOR.$_widget_name)){
				self::load($_widget_name, SHIN_Core::$_config['core']['base_path'].DIRECTORY_SEPARATOR.$add_path.DIRECTORY_SEPARATOR.'libraries'.DIRECTORY_SEPARATOR.'widgets'.DIRECTORY_SEPARATOR, TRUE);
				return TRUE;
			} else {
				return FALSE;
			}			
		} else {
			self::load($_widget_name, BASEPATH .'libraries'.DIRECTORY_SEPARATOR.'widgets'.DIRECTORY_SEPARATOR, TRUE);
			return TRUE;
		}
    } // end of function 
	
	/**
	* Returns TRUE/FALSE (boolean) if the user agent is a known mobile device.
	* @access	public	
	* @return	bool 
	*/
	static function is_mobile()
	{		
		if(!isset(self::$_libs['user_agent'])){
			self::loadLibrary('SHIN_User_agent', TRUE);
		}
		return self::$_libs['user_agent']->is_mobile();
	} 
	
	/**
	* Returns TRUE/FALSE (boolean) if the user agent is a known web browser.
	* @access	public	
	* @return	bool 
	*/
	static function is_browser()
	{
		if(!isset(self::$_libs['user_agent'])){
			self::loadLibrary('SHIN_User_agent', TRUE);
		}
		return self::$_libs['user_agent']->is_browser();
	}	
}
// End SHIN_Core class

/* End of file SHIN_Core.php */
/* Location: ./core/SHIN_Core.php */