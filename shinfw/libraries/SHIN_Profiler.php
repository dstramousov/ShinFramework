<?php if (!defined('BASEPATH')) exit('Base path is not defined');
/**
 * @package		ShinPHP framework
 * @author		
 * @copyright	
 * @license		
 * @link		
 * @since		Version 0.1
 * @filesource  shinfw/libraries/SHIN_Profiller.php
 */


/**
 * ShinPHP framework profiller library.
 *
 * @package		ShinPHP framework
 * @subpackage	Library
 * @author		
 * @link		shinfw/libraries/SHIN_Profiller.php
 */

require_once('profiler/PhpQuickProfiler.php');

class SHIN_Profiler 
{
	/**
	 * PhpQuickProfiler object link
	 */
	private $profiler;
	
	/**
	 * Constructor make first record for profiling.
     *
     * @access public
     * @params NULL.
     * @return NULL.
	 */
    public function __construct()
    {	
		$this->profiler = new PhpQuickProfiler(PhpQuickProfiler::getMicroTime());
    }
	
	/**
	 * Destructor, make last record for profiling and debug information in to page.
     *
     * @access public
     * @params NULL.
     * @return NULL.
	 */
	public function __destruct()
	{
		if(isset(SHIN_Core::$_shdb->active_group)){
			$param = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group];
		} else {
			$param = NULL;
		}

		// need add this because this function call automaticaly.
		if(SHIN_Core::$_config['core']['profiler_information'] && SHIN_Core::$_run_type == RUNNING_TYPE_NORMAL){
			$this->profiler->display($param);
		}
	}
	
} // End of class 


/**
 * Small tools class who is realise all profiling methods.
	log()
	logMemory()
	logError()
	logSpeed()
 *
 * @access public
 * @params NULL.
 * @return NULL.
*/
class Console {
	
	/**
	 * LOG A VARIABLE TO CONSOLE
     *
     * @access public
     * @params NULL.
     * @return NULL.
	 */
	public static function log($data)
	{
		if(!SHIN_Core::$_config['core']['profiler_information']){return;}
		$logItem = array(
			"data" => $data,
			"type" => 'log'
		);
		
		$GLOBALS['debugger_logs']['console'][] = $logItem;

		if(!isset($GLOBALS['debugger_logs']['logCount'])) $GLOBALS['debugger_logs']['logCount'] = 0;
		$GLOBALS['debugger_logs']['logCount'] += 1;
	}
	
	/**
	 * LOG MEMORY USAGE OF VARIABLE OR ENTIRE SCRIPT
     *
     * @access public
     * @params NULL.
     * @return NULL.
	 */
	static public function logMemory($object = false, $name = 'PHP')
	{
		
		if(!SHIN_Core::$_config['core']['profiler_information']){return;}
		$memory = memory_get_usage();
		if($object) $memory = strlen(serialize($object));
		$logItem = array(
			"data" => $memory,
			"type" => 'memory',
			"name" => $name,
			"dataType" => gettype($object)
		);
		$GLOBALS['debugger_logs']['console'][] = $logItem;
		if(!isset($GLOBALS['debugger_logs']['memoryCount'])) $GLOBALS['debugger_logs']['memoryCount'] = 0;
		$GLOBALS['debugger_logs']['memoryCount'] += 1;
	}
	
	/**
	 * LOG A PHP EXCEPTION OBJECT
     *
     * @access public
     * @params NULL.
     * @return NULL.
	 */
	static public function logError($exception, $message)
	{
		if(!SHIN_Core::$_config['core']['profiler_information']){return;}
		$logItem = array(
			"data" => $message,
			"type" => 'error',
			"file" => $exception->getFile(),
			"line" => $exception->getLine()
		);
		$GLOBALS['debugger_logs']['console'][] = $logItem;
		if(!isset($GLOBALS['debugger_logs']['errorCount'])) $GLOBALS['debugger_logs']['errorCount'] = 0;
		$GLOBALS['debugger_logs']['errorCount'] += 1;
	}
	
	/**
	 * POINT IN TIME SPEED SNAPSHOT
     *
     * @access public
     * @params NULL.
     * @return NULL.
	 */
	static public function logSpeed($name = 'Point in Time')
	{
		if(!SHIN_Core::$_config['core']['profiler_information']){return;}
		$logItem = array(
			"data" => PhpQuickProfiler::getMicroTime(),
			"type" => 'speed',
			"name" => $name
		);
		$GLOBALS['debugger_logs']['console'][] = $logItem;
		if(!isset($GLOBALS['debugger_logs']['speedCount'])) $GLOBALS['debugger_logs']['speedCount'] = 0;
		$GLOBALS['debugger_logs']['speedCount'] += 1;
	}
	
	/**
	 * SET DEFAULTS & RETURN LOGS
     *
     * @access public
     * @params NULL.
     * @return NULL.
	 */
	public static function getLogs()
	{
		if(!isset($GLOBALS['debugger_logs']['console'])) {$GLOBALS['debugger_logs']['console'] = array();}; 

		if(!isset($GLOBALS['debugger_logs']['memoryCount'])) $GLOBALS['debugger_logs']['memoryCount'] = 0; 
		if(!isset($GLOBALS['debugger_logs']['logCount'])) $GLOBALS['debugger_logs']['logCount'] = 0; 
		if(!isset($GLOBALS['debugger_logs']['speedCount'])) $GLOBALS['debugger_logs']['speedCount'] = 0; 
		if(!isset($GLOBALS['debugger_logs']['errorCount'])) $GLOBALS['debugger_logs']['errorCount'] = 0; 
		return $GLOBALS['debugger_logs']; 
	}

}



/* End of file SHIN_Profiler.php */
/* Location: shinfw/libraries/SHIN_Profiler.php */           	