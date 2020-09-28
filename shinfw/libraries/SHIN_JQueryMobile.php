<?php if (!defined('BASEPATH')) exit('Base path is not defined');
/**
 * @package        ShinPHP framework
 * @author        
 * @copyright    
 * @license        
 * @link        
 * @since        Version 0.1
 * @filesource  shinfw/libraries/SHIN_Js_Tree.php
 */


/**
 * ShinPHP framework js mobile library
 *
 * @package       ShinPHP framework
 * @subpackage    Library
 * @author        
 * @link          shinfw/libraries/SHIN_JQueryMobile.php
 */

class SHIN_JQueryMobile extends SHIN_Libs
{

    /**
     * Constructor. Init tree with default values from config file.
     *
     * @access public
     * @params NULL.
     * @return NULL.
     */
    public function __construct($css_file = false)
    {   
        parent::__construct('jqmobile', $css_file); 
    
		Console::logSpeed('SHIN_JQueryMobile begin work, Time taken to get to line: '.__FILE__.'::'.__LINE__);
		Console::logMemory($this, 'SHIN_JQueryMobile. Size of class: ');		        
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
        $injectedCode  = '$.mobile({';
            foreach($this->sh_Options as $key => $value){
                $injectedCode .= $key . ':' . $value . ', ';
            }
        $injectedCode = substr($injectedCode, 0, -2) . '}); ';
        
        SHIN_Core::$_jsmanager->addIncludesOutDomready('$(document).bind("mobileinit", function(){' . $injectedCode . '})');
        
        return '';    
    }
    
} // End of class 

/* End of file SHIN_Js_Tree.php */
/* Location: shinfw/libraries/SHIN_JQueryMobile.php */               
