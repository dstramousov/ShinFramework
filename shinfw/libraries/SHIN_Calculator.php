<?php if (!defined('BASEPATH')) exit('Base path is not defined');
/**
 * @package        ShinPHP framework
 * @author        
 * @copyright    
 * @license        
 * @link        
 * @since        Version 0.1
 * @filesource   shinfw/libraries/SHIN_Calculator.php
 */


/**
 * ShinPHP framework calculator library
 *
 * @package       ShinPHP framework
 * @subpackage    Library
 * @author        
 * @link          shinfw/libraries/SHIN_Calculator.php
 */

class SHIN_Calculator extends SHIN_Libs
{
    protected $animation =   '';
    
    protected $duration  =   '';
    
    protected $keys      =   array();   
    /**
     * Constructor. Init accordion with default values from config file.
     *
     * @access public
     * @params NULL.
     * @return NULL.
     */
    public function __construct($css_file = false)
    {   
        parent::__construct('calculator', $css_file);
        
        Console::logSpeed('SHIN_Calculator begin work, Time taken to get to line: '.__FILE__.'::'.__LINE__);
        Console::logMemory($this, 'SHIN_Calculator. Size of class: ');                
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
        $this->injectedCode  = '$("' . $this->htmlID .'").calculator({';
            foreach($this->sh_Options as $key => $value){
                if($key == 'layout' && empty($value)) {
                    continue;
                }   
                    $this->injectedCode .= $key . ':' . $value . ', ';    
            }
        $this->injectedCode = substr($this->injectedCode, 0, -2) . '}); ';
        
        if(!empty($this->animation) && !empty($this->duration)) {
            $this->injectedCode .=  '$("' . $this->htmlID .'").calculator("change", {showAnim: "' . $this->animation . '", duration: "' . $this->duration . '"}); ';    
            $this->animation     = '';
            $this->duration      = '';
        }
        
        foreach($this->keys as $key) {
            $this->injectedCode .= $key;
        }
        
        return $this->injectedCode;   
    }
    
    /**
    * setup animation used to display the calculator and its duration
    * 
    * @param string $animation - can be show|fadeIn|slideDown|blind|bounce|clip|drop|fold|slide
    * @param string $duration  - can be normal|slow|fast
    * @return null
    * @access public
    */
    public function setAnimation($animation, $duration){
        $this->animation    =   $animation;
        $this->duration     =   $duration;
    }
    
    /**
    * add custom key
    * 
    * @param string $code     - identifying code
    * @param mixed $label     - display label
    * @param mixed $type      - the type of operation (binary or unary)
    * @param mixed $func      - the function that implements the action
    * @param mixed $style     - any custom CSS styles (prefixed by 'calculator-')
    * @param mixed $constant  - a constant name for the key for use in layouts
    * @param mixed $keystroke - a keyboard equivalent (single character)
    * @param mixed $keyname   - a keystroke name to show when Alt is pressed (up to three characters, optional)
    * @return null
    * @access public
    */
    public function addKey($code, $label, $type, $func, $style, $constant, $keystroke, $keyname = '') {
        $this->keys = array_merge($this->keys, array('$.calculator.addKeyDef("' . $code . '", "' . $label . '", $.calculator.' . $type . ', ' . $func . ', "' . $style . '", "' . $constant . '", "' . $keystroke . '");'));    
    }
    
} // End of class 

/* End of file SHIN_Calculator.php */
/* Location: shinfw/libraries/SHIN_Calculator.php */               
