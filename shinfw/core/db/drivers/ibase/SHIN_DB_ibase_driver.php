<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
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
 * firebird/ibase Database Adapter Class
 *
 * Note: _DB is an extender class that the app controller
 * creates dynamically based on whether the active record
 * class is being used or not.
 *
 * @package		ShinPHP framework
 * @subpackage  Drivers
 * @category	Database
 * @author		
 * @link		http://www.codeigniter.com/user_guide/database/
 */
class SHIN_DB_ibase_driver extends SHIN_DB_active_record
{

	/**
	 * Non-persistent database connection
	 *
	 * @access  private called by the base class
	 * @return  resource
	 */
	function db_connect()
	{
        echo $this->hostname, "<br />\n";
		return ibase_connect($this->hostname, $this->username, $this->password);
	}

	// --------------------------------------------------------------------

	/**
	 * Persistent database connection
	 *
	 * @access  private called by the base class
	 * @return  resource
	 */
	function db_pconnect()
	{
		return ibase_pconnect($this->hostname, $this->username, $this->password);
	}

	// --------------------------------------------------------------------

	/**
	 * Select the database
	 *
	 * @access  private called by the base class
	 * @return  resource
	 */
	function db_select()
	{
		return TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * Version number query string
	 *
	 * @access  public
	 * @return  string
	 */
	function _version()
	{
		if ( ($svc = ibase_service_attach($this->hostname, $this->username, $this->password)) != FALSE)
		{
			$ibase_info = ibase_server_info ($svc, IBASE_SVC_SERVER_VERSION) . '/' . ibase_server_info($svc, IBASE_SVC_IMPLEMENTATION);
			ibase_service_detach ($svc);
		}
		else
		{
			$ibase_info = 'Unable to Determine';
		}
		return $ibase_info;
	}

	// --------------------------------------------------------------------

	/**
	 * Execute the query
	 *
	 * @access  private called by the base class
	 * @param   string  an SQL query
	 * @return  resource
	 */
	function _execute($sql)
	{
		return ibase_query($this->conn_id, $sql);
	}

	// --------------------------------------------------------------------

	/**
	 * Prep the query
	 *
	 * If needed, each database adapter can prep the query string
	 *file:///var/www/html/ITMI_1.0/system/database/drivers/ibase/ibase_driver.php
	 * @access  private called by execute()
	 * @param   string  an SQL query
	 * @return  string
	 */
	function _prep_query($sql)
	{
		return ibase_prepare($this->conn_id, $sql);
	}

	// --------------------------------------------------------------------

	/**
	 * Begin Transaction
	 *
	 * @access	public
	 * @return	bool		
	 */	
	function trans_begin($test_mode = FALSE)
	{
		if ( ! $this->trans_enabled)
		{
			return TRUE;
		}
		
		// When transactions are nested we only begin/commit/rollback the outermost ones
		if ($this->_trans_depth > 0)
		{
			return TRUE;
		}
		
		// Reset the transaction failure flag.
		// If the $test_mode flag is set to TRUE transactions will be rolled back
		// even if the queries produce a successful result.
		$this->_trans_failure = ($test_mode === TRUE) ? TRUE : FALSE;
		
		return ibase_trans();
	}

	// --------------------------------------------------------------------

	/**
	 * Commit Transaction
	 *
	 * @access	public
	 * @return	bool		
	 */	
	function trans_commit()
	{
		if ( ! $this->trans_enabled)
		{
			return TRUE;
		}

		// When transactions are nested we only begin/commit/rollback the outermost ones
		if ($this->_trans_depth > 0)
		{
			return TRUE;
		}

		return ibase_commit();
	}

	// --------------------------------------------------------------------

	/**
	 * Rollback Transaction
	 *
	 * @access	public
	 * @return	bool		
	 */	
	function trans_rollback()
	{
		if ( ! $this->trans_enabled)
		{
			return TRUE;
		}

		// When transactions are nested we only begin/commit/rollback the outermost ones
		if ($this->_trans_depth > 0)
		{
			return TRUE;
		}

		return ibase_rollback();
	}

	// --------------------------------------------------------------------

	/**
	 * Escape String
	 *
	 * @access  public
	 * @param   string
	 * @return  string
	 */
	function escape_str($str)
	{
		return $str;
	}

	// --------------------------------------------------------------------

	/**
	 * Affected Rows
	 *
	 * @access  public
	 * @return  integer
	 */
	function affected_rows()
	{
		return ibase_affected_rows($this->conn_id);
	}

	// --------------------------------------------------------------------

	/**
	 * Insert ID
	 *
	 * @access  public
	 * @return  integer
	 */
	function insert_id()
	{
		// not supported in Firebird/Interbase
		return 0;
	}

	// --------------------------------------------------------------------

	/**
	 * "Count All" query
	 *
	 * Generates a platform-specific query string that counts all records in
	 * the specified database
	 *
	 * @access  public
	 * @param   string
	 * @return  string
	 */
	function count_all($table = '')
	{
		if ($table == '')
			return '0';

		$query = $this->query("SELECT COUNT(*) AS numrows FROM ".$table);

		if ($query == FALSE)
			{
			return 0;
			}
        
		$row = $query->result();
		return $row; //->NUMROWS;
	}

	// --------------------------------------------------------------------

	/**
	 * Show table query
	 *
	 * Generates a platform-specific query string so that the table names can be fetched
	 *
	 * @access  private
	 * @return  string
	 */
	function _list_tables()
	{
		return 'SELECT rdb$relation_name as TABLE_NAME FROM rdb$relations WHERE ( (rdb$system_flag = 0) OR (rdb$system_flag IS NULL)) AND (rdb$view_source IS NULL) ORDER BY rdb$relation_name';
	}

	// --------------------------------------------------------------------

	/**
	 * Show column query
	 *
	 * Generates a platform-specific query string so that the column names can be fetched
	 *
	 * @access  public
	 * @param   string  the table name
	 * @return  string
	 */
	function _list_columns($table = '')
	{
		return 'SELECT rel_fld.rdb$field_name as FIELD_NAME FROM rdb$relations rel JOIN rdb$relation_fields rel_fld ON rel_fld.rdb$relation_name = rel.rdb$relation_name JOIN rdb$fields fld ON rel_fld.rdb$field_source = fld.rdb$field_name WHERE rel.rdb$relation_name = \'' . $table . '\' ORDER BY rel_fld.rdb$field_position, rel_fld.rdb$field_name';
	}

	// --------------------------------------------------------------------

	/**
	 * Field data query
	 *
	 * Generates a platform-specific query so that the column data can be retrieved
	 *
	 * @access  public
	 * @param   string  the table name
	 * @return  object
	 */
	function _field_data($table)
	{
		return "SELECT FIRST 1 * FROM ".$table;
	}

	// --------------------------------------------------------------------

	/**
	 * The error message string
	 *
	 * @access  private
	 * @return  string
	 */
	function _error_message()
	{
		if (($error = ibase_errmsg()) == FALSE)
			return "";
		return $error;
	}

	// --------------------------------------------------------------------

	/**
	 * The error message number
	 *
	 * @access  private
	 * @return  integer
	 */
	function _error_number()
	{
		if (($error = ibase_errcode()) == FALSE)
			return 0;
		return $error;
	}

	// --------------------------------------------------------------------

	/**
	 * Escape Table Name
	 *
	 * This function adds backticks if the table name has a period
	 * in it. Some DBs will get cranky unless periods are escaped
	 *
	 * @access  private
	 * @param   string  the table name
	 * @return  string
	 */
	function _escape_table($table)
	{
		if (stristr($table, '.'))
		{
			$table = preg_replace("/\./", "`.`", $table);
		}

		return $table;
	}

	// --------------------------------------------------------------------

	/**
	 * Insert statement
	 *
	 * Generates a platform-specific insert string from the supplied data
	 *
	 * @access  public
	 * @param   string  the table name
	 * @param   array   the insert keys
	 * @param   array   the insert values
	 * @return  string
	 */
	function _insert($table, $keys, $values)
	{
	return "INSERT INTO ".$this->_escape_table($table)." (".implode(', ', $keys).") VALUES (".implode(', ', $values).")";
	}

	// --------------------------------------------------------------------

	/**
	 * Update statement
	 *
	 * Generates a platform-specific update string from the supplied data
	 *
	 * @access  public
	 * @param   string  the table name
	 * @param   array   the update data
	 * @param   array   the where clause
	 * @return  string
	 */
	function _update($table, $values, $where)
	{
		foreach($values as $key => $val)
		{
			$valstr[] = $key." = ".$val;
		}

		return "UPDATE ".$this->_escape_table($table)." SET ".implode(', ', $valstr)." WHERE ".implode(" ", $where);
	}

	// --------------------------------------------------------------------

	/**
	 * Delete statement
	 *
	 * Generates a platform-specific delete string from the supplied data
	 *
	 * @access  public
	 * @param   string  the table name
	 * @param   array   the where clause
	 * @return  string
	 */
	function _delete($table, $where)
	{
		return "DELETE FROM ".$this->_escape_table($table)." WHERE ".implode(" ", $where);
	}

	// --------------------------------------------------------------------

	/**
	 * Limit string
	 *
	 * Generates a platform-specific LIMIT clause
	 *
	 * @access  public
	 * @param   string  the sql query string
	 * @param   integer the number of rows to limit the query to
	 * @param   integer the offset value
	 * @return  string
	 */
	function _limit($sql, $limit, $offset)
	{
		$partial_sql = ltrim($sql, 'SELECTselect');

		if ($offset != 0)
		{
			$newsql = 'SELECT FIRST ' . $limit . ' SKIP ' . $offset . ' ' . $partial_sql;
		}
		else
		{
			$newsql = 'SELECT FIRST ' . $limit . ' ' . $partial_sql;
		}

		// remember that we used limits
		$this->limit_used = TRUE;

		return $newsql;
	}	

	// --------------------------------------------------------------------

	/**
	 * Close DB Connection
	 *
	 * @access  public
	 * @param   resource
	 * @return  void
	 */
	function _close($conn_id)
	{
		ibase_close($conn_id);
	}


}

/* End of file SHIN_DB_ibase_driver.php */
/* Location: shinfw/core/database/drivers/ibase/SHIN_DB_ibase_driver.php */