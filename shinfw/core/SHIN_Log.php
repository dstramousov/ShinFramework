<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed 4');
/**
 * @package		ShinPHP framework
 * @author		
 * @copyright	
 * @license		
 * @link		
 * @since		Version 0.1
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * Logging Class
 *
 * @package		ShinPHP framework
 * @subpackage	Core
 * @category	Log
 * @author		
 * @link		
 */
class SHIN_Log
{
	var $log_path;
	var $_threshold	= 1;
	var $_date_fmt	= 'Y-m-d H:i:s';
	var $_enabled	= TRUE;
	var $_levels	= array('ERROR' => '1', 'DEBUG' => '2',  'INFO' => '3', 'ALL' => '4');

	/**
	 * Constructor
	 *
	 * @access	public
	 */
	function __construct()
	{
		include_once(BASEPATH.'config/constants.php');
		
		$this->log_path = (SHIN_Core::$_config['log']['log_path'] != '') ? SHIN_Core::$_config['log']['log_path'] : BASEPATH.'logs/';

		if ( ! is_dir($this->log_path) || SHIN_Core::$_config['log']['log_threshold'] == 0)
		{
			$this->_enabled = FALSE;
		}
		
		if (is_numeric(SHIN_Core::$_config['log']['log_threshold']))
		{
			$this->_threshold = SHIN_Core::$_config['log']['log_threshold'];
		}
			 
		if (SHIN_Core::$_config['log']['log_date_format'] != '')
		{
			$this->_date_fmt = SHIN_Core::$_config['log']['log_date_format'];
		}

		Console::logSpeed('|CC| SHIN_Log begin work, Time taken to get to line: '.__FILE__.'::'.__LINE__);
		Console::logMemory($this, '|CC| SHIN_Log. Size of class: ');
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * Write Log File
	 *
	 * Generally this function will be called using the global log_message() function
	 *
	 * @access	public
	 * @param	string	the error level
	 * @param	string	the error message
	 * @param	bool	whether the error is a native PHP error
	 * @return	bool
	 */		
	function write_log($level = 'error', $msg, $php_error = FALSE)
	{		
		$log_extension = '.log';

		if ($this->_enabled === FALSE)
		{
			return FALSE;
		}
	
		$level = strtoupper($level);
		
		if ( ! isset($this->_levels[$level]) OR ($this->_levels[$level] > $this->_threshold))
		{
			return FALSE;
		}
	
		$filepath = $this->log_path.'log-'.date('Y-m-d').$log_extension;
		$message  = '';
			
		if ( ! $fp = @fopen($filepath, FOPEN_WRITE_CREATE))
		{
			return FALSE;
		}

		$bad_symbol = array("\t", "\n");
		$msg = str_replace($bad_symbol, ' ', $msg);
		$message .= $level.' '.(($level == 'INFO') ? ' -' : '-').' '.date($this->_date_fmt). ' --> '.$msg."\n";
		
		flock($fp, LOCK_EX);	
		fwrite($fp, $message);
		flock($fp, LOCK_UN);
		fclose($fp);
	
		@chmod($filepath, FILE_WRITE_MODE); 		
		return TRUE;
	}

}
// END SHIN_Log Class

/* End of file SHIN_Log.php */
/* Location: ./core/SHIN_Log.php */