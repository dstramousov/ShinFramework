<?php if (!defined('BASEPATH')) exit('Base path is not defined');
/**
 * @package        ShinPHP framework
 * @author        
 * @copyright    
 * @license        
 * @link        
 * @since        Version 0.1
 * @filesource   shinfw/libraries/SHIN_Text_Editor.php
 */


/**
 * ShinPHP framework text editor library
 *
 * @package       ShinPHP framework
 * @subpackage    Library
 * @author        
 * @link          shinfw/libraries/SHIN_Text_Editor.php
 */


class SHIN_Text_Editor extends SHIN_Libs
{
    
    /**
     * Constructor. Init dialog with default values from config file.
     *
     * @access public
     * @params NULL.
     * @return NULL.
     */
    public function __construct($css_file = false)
    {   
        parent::__construct('texteditor', $css_file); 

		Console::logSpeed('SHIN_Text_Editor begin work, Time taken to get to line: '.__FILE__.'::'.__LINE__);
		Console::logMemory($this, 'SHIN_Text_Editor. Size of class: ');
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
        
        $injectionCode  =   "tinyMCE.init({\n";
        $currentOptions =   $this->sh_Options[$this->sh_Options['default_theme']];
        
        $injectionCode .=   '	theme: "'.$this->sh_Options['default_theme'].'", '."\n";
		
        foreach($currentOptions as $name => $value){
            if((!empty($value) && $value != '' && $value != "") || stristr($name, 'theme_advanced_buttons')) {
                $injectionCode .=   '	'.$name . ':' . '"' . $value . '", '."\n";
            }
        }

        $injectionCode    = substr($injectionCode, 0, -3) . '});';

        return $injectionCode;   
                
    }


    /**
     * Fill internal array with needed values.
     *
     * @access protected
     * @params param:array
     * @return NULL.
     */
    protected function _config_mapper($param)
    {
        if($this->sh_Options){
            // post init customization variables.
            $this->sh_Options = array_merge_recursive_distinct((array)$this->sh_Options, (array)$param);
        } else {
            // constructor initialization with default values from config file.
            $this->sh_Options = $param;
        }
    }

}// End of class 


/* End of file SHIN_Text_Editor.php */
/* Location: shifw/library/SHIN_Text_Editor.php */