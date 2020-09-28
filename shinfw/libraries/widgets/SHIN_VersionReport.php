<?php if (!defined('BASEPATH')) exit('Base path is not defined');
/**
 * @package		ShinPHP framework
 * @author        
 * @copyright    
 * @license        
 * @link        
 * @since		Version 0.1
 * @filesource	shinfw/libraries/widgets/SHIN_VersionReport.php
 */


/**
 * ShinPHP framework. Widget for report how library we have and how wersion 
 *
 * @package		ShinPHP framework
 * @subpackage	Widgets
 * @author        
 * @link		shinfw/libraries/widgets/SHIN_VersionReport.php
 */

class SHIN_VersionReport extends SHIN_Widget
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
		// logic here
		
		return $ret;
	}
	
} // End of class 

/* End of file SHIN_VersionReport.php */
/* Location: shinfw/libraries/widgets/SHIN_VersionReport.php */               