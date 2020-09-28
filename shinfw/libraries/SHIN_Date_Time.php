<?php if (!defined('BASEPATH')) exit('Base path is not defined');
/**
 * @package      ShinPHP framework
 * @author        
 * @copyright    
 * @license        
 * @link        
 * @since        Version 0.1
 * @filesource   shinfw/libraries/SHIN_Date_Time.php
 */


/**
 * ShinPHP framework accordion library
 *
 * @package       ShinPHP framework
 * @subpackage    Library
 * @author        
 * @link          shinfw/libraries/SHIN_Date_Time.php
 */

class SHIN_Date_Time extends SHIN_Libs
{

    /**
     * Constructor. Init accordion with default values from config file.
     *
     * @access public
     * @params NULL.
     * @return NULL.
     */
    public function __construct()
    {
        parent::__construct('config');

		Console::logSpeed('SHIN_Date_Time begin work, Time taken to get to line: '.__FILE__.'::'.__LINE__);
		Console::logMemory($this, 'SHIN_Date_Time. Size of class: ');		        
    }

    /**
     * Funciton compare two dates. Type of the date not important. Maybe string ro timestamp
     * 
     * @access public
     * @param mixed $date1
     * @param mixed $date2
     * @return 1 - if $date1 > $date2, 0 if $date1 = $date2, or -1
     */
    public function compareDates($date1, $date2){
        
        if(is_int($date1) && is_int($date2)){
            return $this->_compareTimestampDates($date1, $date2);     
        } elseif(is_int($date1) && is_string($date2)) {
            return $this->_compareTimestampDates($date1, strtotime($date2));
        } elseif(is_string($date1) && is_int($date2)) {
            return $this->_compareTimestampDates(strtotime($date1), $date2);    
        } else {
            return $this->_compareTimestampDates(strtotime($date1), strtotime($date2));    
        }
        
     }
    
    /**
     * Function compare two timestamp dates
     * 
     * @access protected
     * @param int $date1
     * @param int $date2
     * @return 1 - if $date1 > $date2, 0 if $date1 = $date2, or -1 
     */
    protected function _compareTimestampDates($date1, $date2) {
        
        if(is_string($date1) && is_string($date2)) {
            return $this->compareStringDates($date1, $date2); 
        }
        
        if($date1 > $date2) {
            return 1;
        } elseif($date1 == $date2) {
            return 0;
        } else {
            return -1;
        }    
    }
    
    /**
     * Function return difference between two dates
     * 
     * @access public 
     * @param string $date1
     * @param string $date2
     * @param string $format - DateTime format of the date
     * @param string $dtz - DateTimeZone
     * @return string
     */
    public function diffDates($date1, $date2, $format = '%d', $roundinfo = 3, $dtz = null)
	{
		$countseconds = 86400;
		
		$_ret = array();
        
        if(is_null($dtz)) {
            $dtz = ini_get('date.timezone');
        }
		
		// BUG in php. For unix mashine we are using internal DateTime class, for windows mashine - custom logic		
		if(SHIN_Core::$_platform_type == PLATFORM_TYPE_WINDOWS){
			list($_date1, $_time1) = preg_split('/ /', $date1);
			list($_date2, $_time2) = preg_split('/ /', $date2);
			
			list($_date1_y, $_date1_m, $_date1_d) = preg_split('/-/', $_date1);
			list($_time1_h, $_time1_m, $_time1_s) = preg_split('/:/', $_time1);
			
			list($_date2_y, $_date2_m, $_date2_d) = preg_split('/-/', $_date2);
			list($_time2_h, $_time2_m, $_time2_s) = preg_split('/:/', $_time2);
			
			$tmistamp1 = mktime($_time1_h, $_time1_m, $_time1_s, $_date1_m, $_date1_d, $_date1_y);
			$tmistamp2 = mktime($_time2_h, $_time2_m, $_time2_s, $_date2_m, $_date2_d, $_date2_y);
			
			$_delta = $tmistamp1 - $tmistamp2;
			return round($_delta/$countseconds, $roundinfo);
			
		} else {
        
			$tZone  = new DateTimeZone($dtz);
        
			$date1  = new DateTime($date1, $tZone);
			$date2  = new DateTime($date2, $tZone);
        
			$interval = $date1->diff($date2);
			return $interval->format($format); 
		}
    } // end of function
    
} // End of class 

/* End of file SHIN_Date_Time.php */
/* Location: shinfw/libraries/SHIN_Date_Time.php */               
