<?php if (!defined('BASEPATH')) exit('Base path is not defined');
/**
 * @package        ShinPHP framework
 * @author        
 * @copyright    
 * @license        
 * @link        
 * @since        Version 0.1
 * @filesource  shinfw/libraries/SHIN_Masked_Input.php
 */


/**
 * ShinPHP framework masked input library
 *
 * @package       ShinPHP framework
 * @subpackage    Library
 * @author        
 * @link          shinfw/libraries/SHIN_Masked_Input.php
 */

class SHIN_Masked_Input extends SHIN_Libs
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
        parent::__construct('masked', $css_file);
        
		Console::logSpeed('SHIN_Masked_Input begin work, Time taken to get to line: '.__FILE__.'::'.__LINE__);
		Console::logMemory($this, 'SHIN_Masked_Input. Size of class: ');		        
    }

    /**
     * Return body of JS with all filled parameters.
     *
     * @access protected
     * @params NULL
     * @return string.
     */
    protected function _body() {
        
        $injectedCode  = '$("#' . $this->htmlID .'").mask(';
            if(!empty($this->sh_Options['mask'])) {
                $injectedCode .= $this->sh_Options['mask'];     
            }
            
            unset($this->sh_Options['mask']);
            
            $injectedCode .= ', {';
            foreach($this->sh_Options as $key => $value){
                if(!empty($value)) {
                    $injectedCode .= $key . ':' . $value . ', '; 
                }
            }
            $injectedCode = substr($injectedCode, 0, -2) . '}  ';
                        
        $injectedCode = substr($injectedCode, 0, -2) . '); ';
        
        return $injectedCode;    
    }          

} // End of class 

/* End of file SHIN_Masked_Input.php */
/* Location: shinfw/libraries/SHIN_Masked_Input.php */               
