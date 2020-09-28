<?php if (!defined('BASEPATH')) exit('Base path is not defined');
/**
 * @package		ShinPHP framework
 * @author		
 * @copyright	
 * @license		
 * @link		
 * @since		Version 0.1
 * @filesource  shinfw/libraries/SHIN_Datepicker.php
 */


/**
 * ShinPHP framework datepicker library
 *
 * @package		ShinPHP framework
 * @subpackage	Library
 * @author		
 * @link		shinfw/libraries/SHIN_Datepicker.php
 */

class SHIN_Datepicker extends SHIN_Libs
{

	/**
	 * Constructor. Init datepicker with default values from config file.
     *
     * @access public
     * @params NULL.
     * @return NULL.
	 */
    public function __construct($css_file = false)
    {	
        parent::__construct('datepicker', $css_file);

		Console::logSpeed('SHIN_Datepicker begin work, Time taken to get to line: '.__FILE__.'::'.__LINE__);
		Console::logMemory($this, 'SHIN_Datepicker. Size of class: ');		        
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
	$(\"#{$this->htmlID}\").datepicker({";

		$_temporary = array();
        
        if(isset($this->sh_Options['dateFormat'])) {
            $this->sh_Options['dateFormat'] =   "'" . framework2datepicker($this->sh_Options['dateFormat']) . "'";    
        }
        
        foreach($this->sh_Options as $p=>$k)
		{
			 array_push($_temporary, "\n		{$p}: {$k}");
		}

		$_ret	.= implode(', ', $_temporary);

		$_ret	.= '
	});
});';
        return $_ret;
    }

    /**
    * Set jQuery param: showAnim
    * 
    * @access public
    * @param boolean $param
    * @return NULL 
    */
    public function setAnimation($param){
        $this->_config_mapper(array('showAnim' => $param));    
    }
    
    /**
    * Set jQuery params: showOn, buttonImageOnly, buttonImage   
    * 
    * @access public
    * @param string  $showOn - possible values focus|button|both 
    * @param boolean $btnImageOnly
    * @param string  $btnImage - path to image
    * @return NULL
    */
    
    public function setIconTrigger($showOn, $btnImageOnly, $btnImage = '') {
        
        if(in_array(strtolower($showOn), array('focus', 'button', 'both'))) {
            $this->_config_mapper(Array('showOn' => "'" . $showOn . "'"));    
        }
        
        if($btnImageOnly) {
            $this->_config_mapper(Array('buttonImageOnly'   =>  'true')); 
        } else {
            $this->_config_mapper(Array('buttonImageOnly'   =>  'false'));        
        }
        
        if(!empty($btnImage)){
            $this->_config_mapper(Array('buttonImage' => $btnImage));
        }    
    }
    
    /**
    * Set jQuery param: dateFormat  
    * 
    * @access public
    * @param string $dateFormat
    * @return NULL
    */
    public function setDateFormat($dateFormat){
        
        $this->_config_mapper(Array('dateFormat' => "'" . $dateFormat . "'"));    
    }
    
    /**
    * Set jQuery params: minDate, maxDate  
    * 
    * @access public
    * @param string $minDate - possible values: +1, -1, +1D, -1D, +1M, -1M, +1Y, -1Y
    * @param string $maxDate - possible values: +1, -1, +1D, -1D, +1M, -1M, +1Y, -1Y
    * @return NULL
    */
    public function setMinMaxDate($minDate = 'null', $maxDate = 'null') {
        
        if($minDate != 'null'){
            $this->_config_mapper(Array('minDate' => "'" . $minDate . "'"));    
        }
        
        if($maxDate != 'null'){
            $this->_config_mapper(Array('maxDate' => "'" . $maxDate . "'"));    
        }
    }
    
    /**
    * Set jQuery params: showWeek, firstDay  
    * 
    * @access public
    * @param boolean $showWeek
    * @param integer $firstDay - possible values 0, 1, 2, 3, 4, 5, 6
    * @return NULL 
    */
    public function showWeek($showWeek, $firstDay = 0) {
        
        if($showWeek) {
            $this->_config_mapper(Array('showWeek' => 'true'));    
        } else {
            $this->_config_mapper(Array('showWeek' => 'false'));    
        }
        
        $this->_config_mapper(Array('firstDay'  =>  $firstDay));
    }
    
    /**
    * Set jQuery params: showOtherMonths, selectOtherMonths  
    * 
    * @access public
    * @param boolean $showOtherMonths
    * @param boolean $selectOtherMonths
    * @return NULL
    */
    public function showOtherMonths($showOtherMonths, $selectOtherMonths) {
        
        if($showOtherMonths) {
            $this->_config_mapper(Array('showOtherMonths' => 'true'));        
        } else {
            $this->_config_mapper(Array('showOtherMonths' => 'false'));    
        }
        
        if($selectOtherMonths) {
            $this->_config_mapper(Array('selectOtherMonths' => 'true'));        
        } else {
            $this->_config_mapper(Array('selectOtherMonths' => 'false'));    
        }
    }
    
    /**
    * Set jQuery param: showButtonPanel 
    * 
    * @access public
    * @param boolean $showButtonPanel
    * @return NULL
    */
    public function showButtonPanel($showButtonPanel){
        
        if($showButtonPanel){
            $this->_config_mapper(Array('showButtonPanel' => 'true'));    
        } else {
            $this->_config_mapper(Array('showButtonPanel' => 'false'));    
        }
    }
    
    /**
    * Set jQuery params: changeMonth, changeYear  
    * 
    * @access public
    * @param boolean $showMonth
    * @param boolean $showYear
    * @return NULL
    */
    public function showYearAndMonthDD($showMonth, $showYear){
        
        if($showMonth) {
            $this->_config_mapper(Array('changeMonth' => 'true'));    
        } else {
            $this->_config_mapper(Array('changeMonth' => 'false'));    
        }
        
        if($showYear) {
            $this->_config_mapper(Array('changeYear' => 'true'));    
        } else {
            $this->_config_mapper(Array('changeYear' => 'false'));    
        }    
    }
    
    /**
    * Set jQuery params: numberOfMonths, showButtonPanel 
    * 
    * @access public
    * @param int $numberOfMonths
    * @param boolean $showButtonPanel
    * @return NULL
    */
    public function setCalendarNumber($numberOfMonths, $showButtonPanel){
        
        $this->_config_mapper(Array('numberOfMonths' => (int)$numberOfMonths));
        
        if($showButtonPanel) {
            $this->_config_mapper(Array('showButtonPanel' => 'true'));    
        } else {
            $this->_config_mapper(Array('showButtonPanel' => 'false'));    
        }    
    } 
} // End of class 

/* End of file SHIN_Datepicker.php */
/* Location: shinfw/libraries/SHIN_Datepicker.php */           	