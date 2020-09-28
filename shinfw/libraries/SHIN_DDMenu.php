<?php if (!defined('BASEPATH')) exit('Base path is not defined');
/**
 * @package        ShinPHP framework
 * @author        
 * @copyright    
 * @license        
 * @link        
 * @since        Version 0.1
 * @filesource   shinfw/libraries/SHIN_DDMenu.php
 */


/**
 * ShinPHP framework drop down menu library
 *
 * @package       ShinPHP framework
 * @subpackage    Library
 * @author        
 * @link          shinfw/libraries/SHIN_DDMenu.php
 */


class SHIN_DDMenu extends SHIN_Libs
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
        parent::__construct('ddmenu', $css_file);

		Console::logSpeed('SHIN_DDMenu begin work, Time taken to get to line: '.__FILE__.'::'.__LINE__);
		Console::logMemory($this, 'SHIN_DDMenu. Size of class: ');		        
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
        $injectedCode = $this->_initMenu();
         
        return $injectedCode;    
    }
    
    /**
     * Function init base JavaScript params of plugin
     * 
     * @access protected
     * @params NULL
     * @return string.
     * 
     */
    protected function _initMenu(){
        
        $injectedCode = '$("ul.sf-menu").superfish({';
            foreach($this->sh_Options as $key => $value){
                $injectedCode .= $key . ':' . $value;    
            }
        $injectedCode.='});';
        
        return $injectedCode;
        
    }
    
    /**
     * Function make html code for base menu links
     * 
     * @access public 
     * @param string $container - container name
     * @param array $data - array of data
     * @return string.
     */
    public function setMenuData($container, $data){
        
        $injectedCode = '<ul class="sf-menu">';
        
            foreach($data as $key => $value){
                if(isset($value['link'])){
                    $injectedCode .= '<li><a href="' . $value['link'] . '">' . $value['text'] . '</a>';    
                } else {
                    $injectedCode .= '<li><a>' . $value['text'] . '</a>';    
                }
                
                if(isset($value['data'])){
                    $injectedCode .= $this->_madeSubMenuHtmlCode($value['data']);
                }
                
                
                $injectedCode .= '</li>';    
            }
        
        $injectedCode.= '</ul>
                         <div class="clear"></div>';
        
        SHIN_Core::$_libs['templater']->assign($container, $injectedCode);
    }
    
    /**
     * Function make html code for sub menu links
     * 
     * @param array $data
     * @access protected
     * @return string.
     */
    protected function _madeSubMenuHtmlCode($data){
        
        $injectedCode = '<ul>';
        
        foreach($data as $key => $value){
            if(isset($value['type']) && $value['type'] == 'link'){
                $injectedCode .= '<li><a href="' . $value['link'] . '">' . $value['text'] . '</a>';    
            } else {
                $injectedCode .= '<li><a>' . $value['text'] . '</a>';    
            }
            
            if(isset($value['data'])){
                $injectedCode .= $this->_madeSubMenuHtmlCode($value['data']);
            }
            
            
            $injectedCode .= '</li>';    
        }
        
        $injectedCode .= '</ul>';
        
        return $injectedCode;    
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


/* End of file SHIN_DDMenu.php */
/* Location: shifw/library/SHIN_DDMenu.php */