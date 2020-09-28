<?php if (!defined('BASEPATH')) exit('Base path is not defined');
/**
 * @package        ShinPHP framework
 * @author        
 * @copyright    
 * @license        
 * @link        
 * @since        Version 0.1
 * @filesource  shinfw/libraries/SHIN_Autocomplete.php
 */


/**
 * ShinPHP framework fusion autocomplete library
 *
 * @package       ShinPHP framework
 * @subpackage    Library
 * @author        
 * @link          shinfw/libraries/SHIN_Autocomplete.php
 */


class SHIN_Autocomplete extends SHIN_Libs 
{

    protected $setCategories = false;
    
    protected $pluginName    = '';
    
    /**
     * Constructor. Init autocomplete with default values from config file.
     *
     * @access public
     * @params NULL.
     * @return NULL.
     */
    public function __construct($css_file = false)
    {   
        parent::__construct('autocomplete', $css_file); 

		Console::logSpeed('SHIN_Autocomplete begin work, Time taken to get to line: '.__FILE__.'::'.__LINE__);
		Console::logMemory($this, 'SHIN_Autocomplete. Size of class: ');		        
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
        
        $sourceType   =  $this->sh_Options['source_type'];
                         unset($this->sh_Options['source_type']);
        if($this->setCategories) {
            $injectedCode =  '$("' . $this->htmlID . '").' . $this->pluginName . '({';    
        } else {
            $injectedCode =  '$("' . $this->htmlID . '").autocomplete({';
        }
                foreach($this->sh_Options as $key => $value){
                    if($sourceType == 'internal' && $key == 'source') {
                        $injectedCode .= $key . ':' . $value . ', ';
                    } elseif($sourceType == 'external' && $key == 'source') {
                        $injectedCode .= $key . ': "' . $value . '", ';    
                    } else {
                        $injectedCode .= $key . ':' . $value . ', ';    
                    }
                }
        
            $injectedCode = substr($injectedCode, 0, -2) . '})';
        
        $this->resetInternalParams();
        
        return $injectedCode;
    }
    
    /**
    * set categories autocomplete
    * 
    * @param boolean $param
    * @param string  $pluginName - new plugin name
    * @access public
    * @return null
    */
    public function setCategories($param, $pluginName){
        if(is_bool($param)) {
            $this->setCategories = $param;
            $this->pluginName    = $pluginName;
        }    
    }
    
    /**
    * set multiple autocomplete
    * 
    * @param string $sourceEvent - data source
    * @param string $focusEvent  - focuse event function
    * @param string $selectEvent - select event function
    * @access public
    * @return null
    */
    public function setMultiple($source, $focusEvent, $selectEvent){
        $params               =   array();  
        $params['source']     =   $source;
        $params['focus']      =   $focusEvent;
        $params['select']     =   $selectEvent;
        
        $this->init($params);
    }
    
    /**
    * set remote multiple autocomplete
    * 
    * @param string $sourceEvent - data source 
    * @param string $focusEvent  - focuse event function
    * @param string $selectEvent - select event function
    * @param string $searchEvent - search event function
    * @access public
    * @return null
    */
    public function setRemoteMultiple($source, $focusEvent, $selectEvent, $searchEvent){
        $params               =   array();  
        $params['source']     =   $source;
        $params['focus']      =   $focusEvent;
        $params['select']     =   $selectEvent;
        $params['search']     =   $searchEvent;
        
        $this->init($params);
    }
    
    /**
    * set combobox autocomplete
    * 
    * @param string $source      - data source 
    * @param string $focusEvent  - focuse event function
    * @param string $selectEvent - select event function
    * @access public
    * @return null
    */
    public function setCombobox($source, $focusEvent, $selectEvent){
        $params               =   array();  
        $params['source']     =   $source;
        $params['focus']      =   $focusEvent;
        $params['select']     =   $selectEvent;
        
        $this->init($params);    
    }
    
    /**
    * reset internal params
    * 
    * @param null
    * @access protected
    * @return null
    * 
    */
    protected function resetInternalParams(){
        $this->setCategories    =   false;
        $this->pluginName       =   '';
    } 


} // End of class 

/* End of file SHIN_Autocomplete.php */
/* Location: ./libraries/SHIN_Autocomplete.php */               