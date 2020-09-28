<?php if (!defined('BASEPATH')) exit('Base path is not defined');
/**
 * @package			ShinPHP framework
 * @author        
 * @copyright    
 * @license        
 * @link        
 * @since			Version 0.1
 * @filesource		shinfw/libraries/SHIN_Timepicker.php
 */


/**
 * ShinPHP framework timepicker library
 *
 * @package			ShinPHP framework
 * @subpackage		Library
 * @author        
 * @link			shinfw/libraries/SHIN_Timepicker.php
 */

class SHIN_Timepicker extends SHIN_Libs
{

    /**
     * Constructor. Init timepicker with default values from config file.
     *
     * @access public
     * @params NULL.
     * @return NULL.
     */
    public function __construct($css_file = false)
    {   
        parent::__construct('timepicker', $css_file); 

		Console::logSpeed('SHIN_Timepicker begin work, Time taken to get to line: '.__FILE__.'::'.__LINE__);
		Console::logMemory($this, 'SHIN_Timepicker. Size of class: ');
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

        $_ret = "$(function() {
    $(\"#{$this->htmlID}\").timeEntry({";

        $_temporary = array();

        foreach($this->sh_Options as $p=>$k)
        {
             array_push($_temporary, "\n        {$p}: {$k}");
        }
        $_ret    .= implode(', ', $_temporary);

        $_ret    .= '
    });
});';

        return $_ret;
    }
} // End of class 

/* End of file SHIN_Timepicker.php */
/* Location: ./libraries/SHIN_Timepicker.php */               