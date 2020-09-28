<?php if (!defined('BASEPATH')) exit('Base path is not defined');
/**
 * @package        ShinPHP framework
 * @author        
 * @copyright    
 * @license        
 * @link        
 * @since        Version 0.1
 * @filesource  shinfw/libraries/SHIN_Libs.php
 */


/**
 * ShinPHP framework bas lib class
 *
 * @package       ShinPHP framework
 * @subpackage    Library
 * @author        
 * @link          shinfw/libraries/SHIN_Libs.php
 */

class SHIN_Libs
{
    /**
     * Options from config/accordion.php. 
     */
    var $sh_Options = array();
    
    /**
     * Contain all compiled string for browser. 
     */
    var $injectionString = '';
    
    /**
     * HTML id for this object. 
     */
    var $htmlID = '';
    
    /**
     * Default params from config file
     */
    var $sh_OptionsConfig = array();
    
    /**
     * Name of library.
     */
    var $name_lib = '';
	
    /**
     * Needed JS for work current libarary
     */
    var $_needed_js = array();
	
    /**
     * Sight for automaticaly render function: Possible values TRUE / FALSE
     */
    var $render_sight = TRUE;
	
    /**
     * Array with callback information
     */
    var $events_js = array();
	
    /**
     * Ready string with 
     */
    var $events_str = '';
	
    public function __construct($config_file, $css_file = false){
        
        include(SHIN_Core::isConfigExists($config_file . '.php'));
        
		$_prefix = 'js';
        if(SHIN_Core::$_run_mode == RUNNING_MODE_PRODUCTION){
			$_prefix = 'min_js';
		}
		
        if(isset(${$config_file . '_ext'}[$_prefix]) && !empty(${$config_file . '_ext'}[$_prefix])){
			$this->_needed_js = ${$config_file . '_ext'}[$_prefix];
        	if(SHIN_Core::$_jsmanager){
        		SHIN_Core::$_jsmanager->addIncludes($this->_needed_js);
			}
        }

        if($css_file) {
            if (!is_array($css_file)) {
                $css_file_array = Array();
                array_push($css_file_array, $css_file);    
            }
        } else {
            if(isset(${$config_file . '_ext'}['css']) && !empty(${$config_file . '_ext'}['css'])){
                $css_file_array = ${$config_file . '_ext'}['css'];
            }        
        }
                
        if(!empty($css_file_array)) {
        	if(SHIN_Core::$_cssmanager){
	            foreach($css_file_array as $file) {
	            	SHIN_Core::$_cssmanager->addIncludes($file);
	            }
			}
        }        

        $this->_config_mapper(${$config_file});
        
        // save default params in the internal array
        $this->sh_OptionsConfig =   $this->sh_Options;
		
		// If some library override this parameter
		if(isset(${$config_file}['render_sight'])){
			$this->render_sight = ${$config_file}['render_sight'];
		}
    }
	
	
    /**
     * Return array with list of JS for working this library.
     *
     * @access public
     * @params NULL
     * @return array.
     */
    public function getNeededJS() {        
        return $this->_needed_js;
    }
	
    
    /**
     * Post init object. You can make for some parameters customization values.
     *
     * @access public
     * @params $params:array
     * @return NULL.
     */
    public function init($params=NULL,$events=NULL) {
        
        $this->_config_mapper($params); 
		if ($events){
			$this->_events_mapper($events);
		}
    }
	
    /**
     * Fill internal array with needed about callback information
     *
     * @access protected
     * @params param:array
     * @return NULL.
     */
    protected function _events_mapper($events)
    {		
		$this->events_js = $events;
		
		//dump($events);
		
//        $('#element').jstree({core: core, json_data : json_data}).bind('create.jstree', function(){name_collback()}).bind('create.jstree2', function(){name_collback2()});
		
		$__tmp_arr = array();
		foreach($this->events_js as $k=>$v){
			array_push($__tmp_arr, '.bind(\''.$k.'\', '.$v.')'."\n");
		}
		
		$this->events_str = implode("", $__tmp_arr);
	}
	    
    /**
     * Main method for getting ready accordion string for browser.
     *
     * @access public
     * @params $params:array
     * @return NULL.
     */
    public function render($_htmlID = null)
    {
		if(!$this->render_sight){return;}
        $this->injectionString      = '';
        $this->htmlID               = $_htmlID;
        $this->injectionString     .= $this->_body();
		
        return $this->injectionString;
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
		$this->_reset_options();
        return $this;
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
     * reset values fo the sh_Options array
     * 
     * @access protected
     * @params NULL
     * @return NULL.
     * 
     */
    protected function _reset_options(){
        
        $this->sh_Options   =   array();
        $this->sh_Options   =   $this->sh_OptionsConfig;
    }
    
    /**
     * Return finish JS injection. (Maybe not needed TODO)
     *
     * @access protected
     * @params NULL
     * @return string.
     */
    protected function _footer()
    {
        return '</script>';
    }
    
    /**
     * Return begin JS injection.  (Maybe not needed TODO)
     *
     * @access protected
     * @params NULL.
     * @return string.
     */
    protected function _head()
    {
        return '<script type="text/javascript">';
    }
} // End of class 

/* End of file SHIN_Libs.php */
/* Location: shinfw/libraries/SHIN_Libs.php */               
