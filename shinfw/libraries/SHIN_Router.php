<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

define('EXT', '.php');

/**
 * @package        ShinPHP framework
 * @author        
 * @copyright    
 * @license        
 * @link        
 * @since        Version 0.1
 * @filesource  shinfw/libraries/SHIN_Router.php
 */

/**
 * Parses URIs and determines routing
 *
 * @package		ShinPHP framework
 * @subpackage	Library
 * @author        
 * @link			shinfw/libraries/SHIN_Router.php
 */
 
class SHIN_Router {

	var $config;	
	var $routes 		= array();
	var $error_routes	= array();
	var $class			= '';
	var $method			= 'index';
	var $directory		= '';
	var $uri_protocol 	= 'REQUEST_URI';
	var $default_controller;
	var $scaffolding_request = FALSE;
	
	var $_mode			= 'default';

	public function __construct($_mode='default')
	{
		$this->_mode = $_mode;
        @include(SHIN_Core::isConfigExists('router.php'));
        $this->config = $route;

		SHIN_Core::loadLibrary('SHIN_URI', TRUE);
		$this->uri = SHIN_Core::$_libs['uri']->get_instance();

		$this->_set_routing($_mode);

		SHIN_Core::log('debug', 'Router Class Initialized.');
		
		Console::logSpeed('SHIN_Router begin work, Time taken to get to line: '.__FILE__.'::'.__LINE__);
		Console::logMemory($this, 'SHIN_Router. Size of class: ');

		return;
	}

	
	// --------------------------------------------------------------------
	
	/**
	 * Set the route mapping
	 *
	 * This function determines what should be served based on the URI request,
	 * as well as any "routes" that have been set in the routing config file.
	 *
	 * @access	private
	 * @return	void
	 */
	function _set_routing($_mode)
	{
		// Are query strings enabled in the config file?
		// If so, we're done since segment based URIs are not used with query strings.
		if ($this->config['enable_query_strings'] === TRUE AND isset($_GET[$this->config['controller_trigger']]))
		{
			$this->set_class(trim($this->uri->_filter_uri($_GET[$this->config['controller_trigger']])));

			if (isset($_GET[$this->config['function_trigger']]))
			{
				$this->set_method(trim($this->uri->_filter_uri($_GET[$this->config['function_trigger']])));
			}
			
			return;
		}
				
		// Load the routes.php file.
		@include(SHIN_Core::isConfigExists('router.php'));

		$this->routes = ( ! isset($route) OR ! is_array($route)) ? array() : $route;
		unset($route);
		

		// Set the default controller so we can display it in the event
		// the URI doesn't correlated to a valid controller.
		$this->default_controller = ( ! isset($this->routes[$_mode]['default_controller']) OR $this->routes[$_mode]['default_controller'] == '') ? FALSE : $this->routes[$_mode]['default_controller'];	
		
		// Fetch the complete URI string
		$this->uri->_fetch_uri_string();
	
		// Is there a URI string? If not, the default controller specified in the "routes" file will be shown.
		if ($this->uri->uri_string == '')
		{
			if ($this->default_controller === FALSE)
			{
				SHIN_Core::show_error("Unable to determine what should be displayed. A default route has not been specified in the routing file.");
			}

			if (strpos($this->default_controller, '/') !== FALSE)
			{
				$x = explode('/', $this->default_controller);

				$this->set_class(end($x));
				$this->set_method('index');
				$this->_set_request($x);
			}
			else
			{
				$this->set_class($this->default_controller);
				$this->set_method('index');
				$this->_set_request(array($this->default_controller, 'index'));
			}
			

			// re-index the routed segments array so it starts with 1 rather than 0
			$this->uri->_reindex_segments();
			SHIN_Core::log('debug', "No URI present. Default controller set.");
			return;
		}
		unset($this->routes['default_controller']);
		
		// Do we need to remove the URL suffix?
		$this->uri->_remove_url_suffix();
		
		// Compile the segments into an array
		$this->uri->_explode_segments();
		
		// Parse any custom routing that may exist
		$this->_parse_routes();		
		
		// Re-index the segment array so that it starts with 1 rather than 0
		$this->uri->_reindex_segments();
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * Set the Route
	 *
	 * This function takes an array of URI segments as
	 * input, and sets the current class/method
	 *
	 * @access	private
	 * @param	array
	 * @param	bool
	 * @return	void
	 */
	function _set_request($segments = array())
	{
		$segments = $this->_validate_request($segments);
		
		if (count($segments) == 0)
		{
			return;
		}
						
		$this->set_class($segments[0]);
		
		if (isset($segments[1]))
		{
				$this->set_method($segments[1]);
		}
		else
		{
			// This lets the "routed" segment array identify that the default
			// index method is being used.
			$segments[1] = 'index';
		}
		
		
		// Update our "routed" segment array to contain the segments.
		// Note: If there is no custom routing, this array will be
		// identical to $this->uri->segments
		$this->uri->rsegments = $segments;
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * Validates the supplied segments.  Attempts to determine the path to
	 * the controller.
	 *
	 * @access	private
	 * @param	array
	 * @return	array
	 */	
	function _validate_request($segments)
	{
		// Does the requested controller exist in the root folder?
		SHIN_Core::log('debug', '[ROUTER] Try route class: '.SHIN_Core::$_config['core']['base_path'].$this->_mode.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.$segments[0].'.php');

//		dump('app'.DIRECTORY_SEPARATOR.$segments[0].'.php');
		if (is_file('app'.DIRECTORY_SEPARATOR.$segments[0].'.php')){$_path = 'app'.DIRECTORY_SEPARATOR;} else {$_path = BASEPATH.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR;}
		
		//dump($_path, $segments, $_path.$segments[0].EXT);

		if (file_exists($_path.$segments[0].EXT))
		{
			return $segments;
		}


		// Can't find the requested controller..
		SHIN_Core::show_404($segments[0]);
	}

	// --------------------------------------------------------------------

	/**
	 *  Parse Routes
	 *
	 * This function matches any routes that may exist in
	 * the config/routes.php file against the URI to
	 * determine if the class/method need to be remapped.
	 *
	 * @access	private
	 * @return	void
	 */
	function _parse_routes()
	{
		// Do we even have any custom routing to deal with?
		// There is a default scaffolding trigger, so we'll look just for 1
		if (count($this->routes[$this->_mode]) == 1)
		{
			$this->_set_request($this->uri->segments);
			return;
		}

		// Turn the segment array into a URI string
		$uri = implode('/', $this->uri->segments);

		// Is there a literal match?  If so we're done
		if (isset($this->routes[$this->_mode][$uri]))
		{
			$this->_set_request(explode('/', $this->routes[$this->_mode][$uri]));		
			return;
		}
				
		// Loop through the route array looking for wild-cards
		foreach ($this->routes[$this->_mode] as $key => $val)
		{						
			// Convert wild-cards to RegEx
			$key = str_replace(':any', '.+', str_replace(':num', '[0-9]+', $key));
			
			// Does the RegEx match?
			if (preg_match('#^'.$key.'$#', $uri))
			{			
				// Do we have a back-reference?
				if (strpos($val, '$') !== FALSE AND strpos($key, '(') !== FALSE)
				{
					$val = preg_replace('#^'.$key.'$#', $val, $uri);
				}
			
				$this->_set_request(explode('/', $val));		
				return;
			}
		}
		// If we got this far it means we didn't encounter a
		// matching route so we'll set the site default route
		$this->_set_request($this->uri->segments);
	}

	// --------------------------------------------------------------------
	
	/**
	 * Set the class name
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */	
	function set_class($class)
	{
		$this->class = $class;
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * Fetch the current class
	 *
	 * @access	public
	 * @return	string
	 */	
	function fetch_class()
	{
		if(is_file('app/'.$this->class.EXT)){$_filename = 'app/'.$this->class.EXT;} else {$_filename = BASEPATH.'app/'.$this->class.EXT;}
	
		require_once($_filename);
		return new $this->class();
	}
	
	// --------------------------------------------------------------------
	
	/**
	 *  Set the method name
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */	
	function set_method($method)
	{
		$this->method = $method;
	}

	// --------------------------------------------------------------------
	
	/**
	 *  Fetch the current method
	 *
	 * @access	public
	 * @return	string
	 */	
	function fetch_method()
	{
		if ($this->method == $this->fetch_class())
		{
			return 'index';
		}

		return $this->method;
	}

	// --------------------------------------------------------------------
	
	/**
	 *  Set the directory name
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */	
	function set_directory($dir)
	{
		$this->directory = $dir.'/';
	}

	// --------------------------------------------------------------------
	
	/**
	 *  Fetch the sub-directory (if any) that contains the requested controller class
	 *
	 * @access	public
	 * @return	string
	 */	
	function fetch_directory()
	{
		return $this->directory;
	}

}
// END SHIN_Router Class

/* End of file SHIN_Router.php */
/* Location: ./shinfw/libraries/SHIN_Router.php */