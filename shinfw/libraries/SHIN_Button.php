<?php if (!defined('BASEPATH')) exit('Base path is not defined');
/**
 * @package      ShinPHP framework
 * @author        
 * @copyright    
 * @license        
 * @link        
 * @since        Version 0.1
 * @filesource   shinfw/libraries/SHIN_Button.php
 */


/**
 * ShinPHP framework button library
 *
 * @package       ShinPHP framework
 * @subpackage    Library
 * @author        
 * @link          shinfw/libraries/SHIN_Button.php
 */

class SHIN_Button extends SHIN_Libs
{

    /**
     * Constructor. Init accordion with default values from config file.
     *
     * @access public
     * @params NULL.
     * @return NULL.
     */
    public function __construct($css_file = false)
    {   
        parent::__construct('button', $css_file);
        
		Console::logSpeed('SHIN_Button begin work, Time taken to get to line: '.__FILE__.'::'.__LINE__);
		Console::logMemory($this, 'SHIN_Button. Size of class: ');		        
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
        if(isset($this->sh_Options['click'])) {
            $event = $this->sh_Options['click'];
                     unset($this->sh_Options['click']);
        }
             
        $injectedCode  = '$("' . $this->htmlID .'").button({';
            foreach($this->sh_Options as $key => $value){
                $injectedCode .= $key . ':' . $value . ', ';
            }
        $injectedCode = substr($injectedCode, 0, -2) . '})';
        
        if(!empty($event)) {
            $injectedCode .= '.click(function(){' . $event . '(this)});';
        } else {
            $injectedCode .= ';';
        }
        
        return $injectedCode;   
    }
    
    /**
    * put your comment there...
    * 
    * @param string $domId - DOM id
    * @access public
    * @return string
    */
    public function renderButtonSet($domId){
        
        unset($this->sh_Options['click']);
        
        $injectedCode  = '$("' . $domId .'").buttonset({';
            foreach($this->sh_Options as $key => $value){
                $injectedCode .= $key . ':' . $value . ', ';
            }
        $injectedCode = substr($injectedCode, 0, -2) . '}); ';
        
        return $injectedCode;
            
    }          

} // End of class 

/* End of file SHIN_Button.php */
/* Location: shinfw/libraries/SHIN_Button.php */               
