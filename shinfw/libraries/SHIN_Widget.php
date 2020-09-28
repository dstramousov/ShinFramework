<?php if (!defined('BASEPATH')) exit('Base path is not defined');
/**
 * @package        ShinPHP framework
 * @author        
 * @copyright    
 * @license        
 * @link        
 * @since        Version 0.1
 * @filesource   shinfw/libraries/SHIN_Widget.php
 */


/**
 * ShinPHP framework button library
 *
 * @package       ShinPHP framework
 * @subpackage    Library
 * @author        
 * @link          shinfw/libraries/SHIN_Widget.php
 */

class SHIN_Widget extends SHIN_Libs
{

    /**
     * Widget name.
     */
	var $widget_name = '';

    /**
     * Additional parameters for internal logic in widget.
     */
	var $additional_parameters = array();

    /**
     * Constructor. Init accordion with default values from config file.
     *
     * @access public
     * @params $name string with name of widget
     * @return NULL.
     */
    public function __construct($_name)
    {   
		$this->widget_name = $_name;
    }

    /**
     * Realise main logic for make output for each widgets.
     *
     * @access render
     * @params $params array With additional parameters for each widget.
     * @return string $injectedCode -> ready html OR JS script OR combined JS/HTML string.
     */
    public function render($_params = NULL)
    {
		if($_params){
			$this->additional_parameters = $_params;
		}
		
		/*  TODO Thinking for marking each injected code
    	$injectedCode  = "\n<!-- Begin of widget ".$this->widget_name." body -->\n";
        
    	$injectedCode .= "\n<!-- End of widget ".$this->widget_name." body -->\n";
		*/
		
		
		$injectedCode = '';

        return $injectedCode;   
    }
    

} // End of class 

/* End of file SHIN_Widget.php */
/* Location: shinfw/libraries/SHIN_Widget.php */               
