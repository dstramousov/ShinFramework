<?php if (!defined('BASEPATH')) exit('Base path is not defined');
/**
 * @package        ShinPHP framework
 * @author        
 * @copyright    
 * @license        
 * @link        
 * @since        Version 0.1
 * @filesource   shinfw/libraries/SHIN_Progressbar.php
 */


/**
 * ShinPHP framework progressbar library
 *
 * @package       ShinPHP framework
 * @subpackage    Library
 * @author        
 * @link          shinfw/libraries/SHIN_Progressbar.php
 */

class SHIN_Progressbar extends SHIN_Libs
{

    /**
     * Constructor. Init progressbar with default values from config file.
     *
     * @access public
     * @params NULL.
     * @return NULL.
     */
    public function __construct($css_file = false)
    {   
        parent::__construct('progressbar', $css_file); 

		Console::logSpeed('SHIN_Progressbar begin work, Time taken to get to line: '.__FILE__.'::'.__LINE__);
		Console::logMemory($this, 'SHIN_Progressbar. Size of class: ');
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
        //$("#testprogressbar").progressbar();

        $_ret = "$(function() {
    $(\"#{$this->htmlID}\").progressbar({";

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


    /**
    * add config value to internal array 
    * 
    * @param string $id - DOM id
    * @param mixed $value - config value
    * @access public
    * @return string
    */
    public function progressbar($id, $value)
    {
        $this->_config_mapper(Array('value'=>$value));
        $inject_html = "<DIV id=\"$id\"></DIV>";
        return $inject_html;
    }

} // End of class 

/* End of file SHIN_Progressbar.php */
/* Location: shinfw/libraries/SHIN_Progressbar.php */               