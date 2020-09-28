<?php if (!defined('BASEPATH')) exit('Base path is not defined');
/**
 * @package        ShinPHP framework
 * @author        
 * @copyright    
 * @license        
 * @link        
 * @since        Version 0.1
 * @filesource  shinfw/libraries/SHIN_Tooltip.php
 */


/**
 * ShinPHP framework tooltip library
 *
 * @package        ShinPHP framework
 * @subpackage    Library
 * @author        
 * @link        shinfw/libraries/SHIN_Tooltip.php
 */

class SHIN_Tooltip extends SHIN_Libs
{
    /**
     * Constructor. Init tooltip with default values from config file.
     *
     * @access public
     * @params NULL.
     * @return NULL.
     */
    public function __construct($css_file = false)
    {   
        parent::__construct('tooltip', $css_file); 

		Console::logSpeed('SHIN_Tooltip begin work, Time taken to get to line: '.__FILE__.'::'.__LINE__);
		Console::logMemory($this, 'SHIN_Tooltip. Size of class: ');
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
            $(\"#{$this->htmlID}\").qtip({";

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
  
    public function add_tooltip($id, $text)    
    {
        $this->init(array('content'=>"'" . $text . "'"));
		
        return $this->render($id);
    }
    
    /**
    * Sets one of the predefined theme
    * 
    * @param string $style
    * cream, dark, green, light, red, blue
    */
    public function set_style($style)
    {
        $available_styles = array(
           'cream',
           'dark',
           'green',
           'light',
           'red',
           'blue'
        );
        
        if(!in_array($style, $available_styles)) {
            return;
        }                    
        
        $style_option = "{ 
          name: '$style' 
        }";
        
        $this->init(array('style'=>$style_option));
    }
    
    /**
    * Set position mode t the tooltip
    * 
    * @param mixed $position_val
    * @access public
    * @return null  
    */
    public function set_fixed ($position_val)
    {
        $positions = array(
            'topLeft',
            'topMiddle',
            'topRight',
            'leftTop',
            'rightTop',
            'leftMiddle',
            'center',
            'rightMiddle',
            'leftBottom',
            'rightBottom',
            'bottomLeft',
            'bottomMiddle',
            'bottomRight'
        );
        
        if(!in_array($position_val, $positions))
        {
            return;
        }
        
         $position = "'$position_val'";
         $hide = "{
            fixed: true 
         }";
         
         $this->init(array(
            'position'  => $position,
            'hide'      => $hide
         ));   
    }
 

} // End of class 

/* End of file SHIN_Tooltip.php */
/* Location: shinfw/libraries/SHIN_Tooltip.php */               
