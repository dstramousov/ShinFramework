<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @package		ShinPHP framework
 * @author		
 * @copyright	
 * @license		
 * @link		
 * @since		Version 0.1
 * @filesource  shinfw/core/database/drivers/mysqli/mysqli_utility.php
 */

// ------------------------------------------------------------------------

/**
 * MySQLi Utility Class
 *
 * @category	Database
 * @author		
 * @link		http://codeigniter.com/user_guide/database/
 */
class SHIN_DB_mysqli_utility extends SHIN_DB_utility {
	
	/**
	 * List databases
	 *
	 * @access	private
	 * @return	bool
	 */
	function _list_databases()
	{
		return "SHOW DATABASES";
	}
	
	// --------------------------------------------------------------------

	/**
	 * Optimize table query
	 *
	 * Generates a platform-specific query so that a table can be optimized
	 *
	 * @access	private
	 * @param	string	the table name
	 * @return	object
	 */
	function _optimize_table($table)
	{
		return "OPTIMIZE TABLE ".$this->db->_escape_identifiers($table);
	}

	// --------------------------------------------------------------------

	/**
	 * Repair table query
	 *
	 * Generates a platform-specific query so that a table can be repaired
	 *
	 * @access	private
	 * @param	string	the table name
	 * @return	object
	 */
	function _repair_table($table)
	{
		return "REPAIR TABLE ".$this->db->_escape_identifiers($table);
	}

	// --------------------------------------------------------------------

	/**
	 * MySQLi Export
	 *
	 * @access	private
	 * @param	array	Preferences
	 * @return	mixed
	 */
	function _backup($params = array())
	{
		// Currently unsupported
		return $this->db->display_error('db_unsuported_feature');
	}


	/**
	 *
	 * The functions below have been deprecated as of 1.6, and are only here for backwards
	 * compatibility.  They now reside in dbforge().  The use of dbutils for database manipulation
	 * is STRONGLY discouraged in favour if using dbforge.
	 *
	 */

	/**
	 * Create database
	 *
	 * @access	private
	 * @param	string	the database name
	 * @return	bool
	 */
	function _create_database($name)
	{
		return "CREATE DATABASE ".$name;
	}

	// --------------------------------------------------------------------

	/**
	 * Drop database
	 *
	 * @access	private
	 * @param	string	the database name
	 * @return	bool
	 */
	function _drop_database($name)
	{
		return "DROP DATABASE ".$name;
	}

}

/* End of file SHIN_DB_mysqli_utility.php */
/* Location: shinfw/core/database/drivers/mysqli/SHIN_DB_mysqli_utility.php */