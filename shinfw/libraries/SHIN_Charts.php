<?php if (!defined('BASEPATH')) exit('Base path is not defined');
/**
 * @package		ShinPHP framework
 * @author		
 * @copyright	
 * @license		
 * @link		
 * @since		Version 0.1
 * @filesource  shinfw/libraries/SHIN_Charts.php
 */


/**
 * ShinPHP framework fusion charts library
 *
 * @package		ShinPHP framework
 * @subpackage	Library
 * @author		
 * @link		shinfw/libraries/SHIN_Charts.php
 */

require_once("fcharts/FusionCharts_Gen.php");


abstract  class SHIN_Charts extends FusionCharts
{

	/**
	 * Options from config/chart.php. 
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
	 * Constructor. Init charts with default values from config file.
     *
     * @access public
     * @params NULL.
     * @return NULL.
	 */
    public function __construct()
    {	
        @include(SHIN_Core::isConfigExists('charts.php'));
        
        $_prefix = 'js';
        if(SHIN_Core::$_run_mode == RUNNING_MODE_PRODUCTION){
            $_prefix = 'min_js';
        } 
        
        if(isset($charts_ext[$_prefix]) && !empty($charts_ext['js'])){
            if(SHIN_Core::$_jsmanager){
                SHIN_Core::$_jsmanager->addIncludes($charts_ext[$_prefix]);
            }
        }
        
        $this->sh_Options = $charts;


		Console::logSpeed('SHIN_Charts begin work, Time taken to get to line: '.__FILE__.'::'.__LINE__);
		Console::logMemory($this, 'SHIN_Charts. Size of class: ');		        
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
        @include(SHIN_Core::loadThemeConfig());
		
        $this->_config_mapper($themeConfig['charts']);
		$this->_config_mapper($params);
    }


	/**
	 * Main method for getting ready charts string for browser.
     *
     * @access public
     * @params $params:array
     * @return NULL.
	 */
    public function render($_htmlID)
    {
    	$this->htmlID = $_htmlID;
    	$this->injectionString .= $this->_body();

    	return $this->injectionString;
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


	/**
	 * Return body of JS with all filled parameters.
     *
     * @access protected
     * @params NULL
     * @return string.
	 */
    protected function _body()
    {

		$_ret = "
	$(\"{$this->htmlID}\").insertFusionCharts({";

		$_temporary = array();

		if(!isset($this->sh_Options)){return;}

		foreach($this->sh_Options as $p=>$k)
		{
             if(!is_array($k)) {
			    array_push($_temporary, "\n		{$p}: {$k}");
             }
		}
		$_ret	.= implode(', ', $_temporary);

		$_ret	.= '
	});
';

		return $_ret;
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
    		$this->sh_Options  = array_merge_recursive_distinct((array)$this->sh_Options, (array)$param);
        } else {
			// constructor initialization with default values from config file.
    		$this->sh_Options = $param;
    	}
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
     * Set type of diagramm.
     *
     * @access public
     * @param string:$_type_of_diagramm Diagramm type. See description there: http://www.fusioncharts.com/free/docs/Contents/ChartList.html
     * @return NULL.
     */
	public function setDiagram($_type_of_diagramm)
	{
		$this->init(array('type'=>$_type_of_diagramm));
		return;
	}

    /**
     * Compile string for data.
     *
     * @access public
     * @param $_arr array with .
     * @return string Compiled string.
     */
	abstract public function combinedInit($_arr);
    
    /**
    * get attributes for tag
    * 
    * @param string $tagName - graph|categories|category|dataset|set|trendLines
    * @return string
    */
    public function getTagAttributes($tagName, $userAttributes = array()){
        
        $attributes =   '';
        
        if(isset($this->sh_Options['tag'][$tagName])){
            //quoted user parameters
            foreach($userAttributes as &$value){
                $value =    sprintf('"%s"', $value);    
            }
            //unset pointer
            unset($value);
            
            //merge user params with params from config
            $this->sh_Options['tag'][$tagName] =   array_merge($this->sh_Options['tag'][$tagName], $userAttributes);
            foreach($this->sh_Options['tag'][$tagName] as $key => $value){
                if(!empty($value) && $value != '""'){
                    $attributes .= $key . '=' . $value . ' ';
                } 
            }    
        }
        
        return ' ' . $attributes . ' ';    
    }

	/**
 	* Get random color hex value
 	*
 	* @param integer $max_r Maximum value for the red color
 	* @param integer $max_g Maximum value for the green color
 	* @param integer $max_b Maximum value for the blue color
 	* @return string
 	*/
	function getRandomColor($max_r = 255, $max_g = 255, $max_b = 255)
	{
	    if ($max_r > 255) { $max_r = 255; }
	    if ($max_g > 255) { $max_g = 255; }
	    if ($max_b > 255) { $max_b = 255; }
	    if ($max_r < 0) { $max_r = 0; }
	    if ($max_g < 0) { $max_g = 0; }
	    if ($max_b < 0) { $max_b = 0; }

    	return dechex(rand(0, 255)) . dechex(rand(0, 255)) . dechex(rand(0, 255));
	}

} // End of class 

/* End of file SHIN_Charts.php */
/* Location: ./libraries/SHIN_Charts.php */           	
