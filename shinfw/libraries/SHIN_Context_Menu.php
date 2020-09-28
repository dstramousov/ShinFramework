<?php if (!defined('BASEPATH')) exit('Base path is not defined');
/**
 * @package        ShinPHP framework
 * @author        
 * @copyright    
 * @license        
 * @link        
 * @since        Version 0.1
 * @filesource   shinfw/libraries/SHIN_Context_Menu.php
 */


/**
 * ShinPHP framework context menu library
 *
 * @package       ShinPHP framework
 * @subpackage    Library
 * @author        
 * @link          shinfw/libraries/SHIN_Context_Menu.php
 */


class SHIN_Context_Menu extends SHIN_Libs
{
    
    /**
     * Disable some items of context menu
     * 
     * @var boolean
     */
    var $disable = false;
    
    /**
     * Disable list comma separeted
     * 
     * @var string
     */
    var $disableList = ''; 


    /**
     * Constructor. Init dialog with default values from config file.
     *
     * @access public
     * @params NULL.
     * @return NULL.
     */
    public function __construct($css_file = false)
    {   
        parent::__construct('contextmenu', $css_file);

		Console::logSpeed('SHIN_Context_Menu begin work, Time taken to get to line: '.__FILE__.'::'.__LINE__);
		Console::logMemory($this, 'SHIN_Context_Menu. Size of class: ');		        
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
        $callbackFunc   =   $this->sh_Options['callback'];
                      unset($this->sh_Options['callback']);
                       
        $injectedCode  = '$("#' . $this->htmlID .'").contextMenu({';
            foreach($this->sh_Options as $key => $value){
                $injectedCode .= $key . ':' . '"' . $value . '"';
            }
        $injectedCode .='}'; 
        
        if(!empty($callbackFunc)) {
            $injectedCode .= ', ' . $callbackFunc;    
        }
        
        $injectedCode .='); ';
        
        if($this->disable){
            $injectedCode .= '$("#' . $this->sh_Options['menu'] . '").disableContextMenuItems("' . implode(',', $this->disableList) . '");';
        }
         
        return $injectedCode;    
    }
    
    /**
     * Function save disable item list
     * 
     * @access public  
     * @param array $disableList - array of items, for example: array('#copy', '#paste')
     * @return NULL
     */
    public function disableItems($disableList){
        
        $this->disable      = true;
        $this->disableList = $disableList;
    }

}// End of class 


/* End of file SHIN_Context_Menu.php */
/* Location: shifw/library/SHIN_Context_Menu.php*/