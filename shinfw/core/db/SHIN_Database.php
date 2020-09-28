<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @package		ShinPHP framework
 * @author		
 * @copyright	
 * @license		
 * @link		
 * @since		Version 0.1
 * @filesource	shinfw/core/database/SHIN_Database.php
 */

// ------------------------------------------------------------------------

/**
 * Initialize the database connection and load specific driver for application.
 *
 * @package		ShinPHP framework
 * @subpackage	Database
 * @author		
 * @link		
 */

require_once(COREPATH.'db/SHIN_DB_active_record.php');

class SHIN_Database
{
	static $driver;
	
	var $config_information = array();
	
	var $active_group;
	var $sys_database;
	var $need_load_primary_driver;
	
	
	function __construct()
	{	
		@include(SHIN_Core::isConfigExists('database.php'));
		$this->config_information = $db;
		$this->active_group = $active_group;
		$this->sys_database = $sys_database;
		
		$need_load_primary_driver = FALSE;
		if($this->active_group != $this->sys_database){
			$this->need_load_primary_driver = TRUE;
		}
		
		if ( ! isset($db[$active_group]['dbdriver']) OR $db[$active_group]['dbdriver'] == '')
		{
			SHIN_Core::show_error('You have not selected a database type to connect to.');
		}

		$driver = 'SHIN_DB_'.$db[$active_group]['dbdriver'].'_driver';
		
		require_once(COREPATH.'db/drivers/'.$db[$active_group]['dbdriver'].'/'.$driver.'.php');
        SHIN_Core::$_db[$active_group] = new $driver($db[$active_group]);

		if (SHIN_Core::$_db[$active_group]->autoinit == TRUE)
		{
			SHIN_Core::$_db[$active_group]->initialize();
		}
				
		return $this;
	}	
}	


/* End of file SHIN_Database.php */
/* Location: shinfw/core/database/SHIN_Database.php */