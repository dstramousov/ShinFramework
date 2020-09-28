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
 * ShinPHP framework js tree library
 *
 * @package       ShinPHP framework
 * @subpackage    Library
 * @author        
 * @link          shinfw/libraries/SHIN_Js_Tree.php
 */

class SHIN_Js_Tree extends SHIN_Libs
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
        parent::__construct('jstree', $css_file); 
    
		Console::logSpeed('SHIN_Js_Tree begin work, Time taken to get to line: '.__FILE__.'::'.__LINE__);
		Console::logMemory($this, 'SHIN_Js_Tree. Size of class: ');		        
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
        $injectedCode = '$("#' . $this->htmlID . '").jstree({  ';
            foreach($this->sh_Options as $key => $value){
                if(is_array($value)){
                    $injectedCode .= $key . ':' . $this->_makePluginParameters($value);     
                } else {
                    $injectedCode .= $key . ':' . $value . ', ';    
                }   
            }
        $injectedCode = substr($injectedCode, 0, -2) . '})';
//		dump($injectedCode);

		if($this->events_str){
			$injectedCode .= $this->events_str. ';';
		}
        
        return $injectedCode;    
    }
	
	
	
    
    /**
    * function for recursive makign object
    * 
    * @param array $param
    * @access protected
    * @return string
    */
    protected function _makePluginParameters($param){
        
        $injectedCode = '';
        foreach($param as $key => $value) {
            if(is_array($value)) {
                $injectedCode .= $key . ':' . $this->_makePluginParameters($value);    
            } else {
                $injectedCode = $key . ':' . $value . ', ';
            }
         }
        
        $injectedCode = '{' . substr($injectedCode, 0, -2) . '}, ';
        
        return $injectedCode;         
    }          

} // End of class 

/* End of file SHIN_Js_Tree.php */
/* Location: shinfw/libraries/SHIN_Js_Tree.php */               
