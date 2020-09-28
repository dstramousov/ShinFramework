<?php if (!defined('BASEPATH')) exit('Base path is not defined');
/**
 * @package		ShinPHP framework
 * @author        
 * @copyright    
 * @license        
 * @link        
 * @since		Version 0.1
 * @filesource	shinfw/libraries/widgets/SHIN_Clock.php
 */


/**
 * ShinPHP framework. Simple widget for visualize current time.
 *
 * @package		ShinPHP framework
 * @subpackage	Widgets
 * @author        
 * @link		shinfw/libraries/widgets/SHIN_Clock.php
 */

class SHIN_Clock extends SHIN_Widget
{

    /**
     * Constructor. Init accordion with default values from config file.
     *
     * @access public
     * @params NULL.
     * @return NULL.
     */
    public function __construct($_name)
    {   
        parent::__construct($_name);
    }

    /**
     * Return body of JS with all filled parameters.
     *
     * @access protected
     * @params NULL
     * @return string.
     */
    public function render($params=NULL)
    {	
		$ret = parent::render($params);
		
		$ret .= date('l jS \of F Y h:i:s A').'<br/>';

    	return $ret;
    }          


} // End of class 

/* End of file SHIN_Clock.php */
/* Location: shinfw/libraries/widgets/SHIN_Clock.php */               