<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @package		ShinPHP framework
 * @author		
 * @copyright	
 * @license		
 * @link		
 * @since		Version 0.1
 * @filesource  shinfw/core/database/drivers/mysql/SHIN_DB_mysql_result.php
 */

// --------------------------------------------------------------------

/**
 * MySQL Result Class
 *
 * This class extends the parent result class: SHIN_DB_result
 *
 * @category	Database
 * @author		
 * @link		http://codeigniter.com/user_guide/database/
 */
class SHIN_DB_mysql_result extends SHIN_DB_result {

	/**
	 * Number of rows in the result set
	 *
	 * @access	public
	 * @return	integer
	 */
	function num_rows()
	{
		return mysql_num_rows($this->result_id);
	}
	
	// --------------------------------------------------------------------

	/**
	 * Number of fields in the result set
	 *
	 * @access	public
	 * @return	integer
	 */
	function num_fields()
	{
		return mysql_num_fields($this->result_id);
	}
	
	// --------------------------------------------------------------------

	/**
	 * Fetch Field Names
	 *
	 * Generates an array of column names
	 *
	 * @access	public
	 * @return	array
	 */
	function list_fields()
	{
		$field_names = array();
		while ($field = mysql_fetch_field($this->result_id))
		{
			$field_names[] = $field->name;
		}
		
		return $field_names;
	}

	// --------------------------------------------------------------------

	/**
	 * Field data
	 *
	 * Generates an array of objects containing field meta-data
	 *
	 * @access	public
	 * @return	array
	 */
	function field_data()
	{
		$retval = array();
		while ($field = mysql_fetch_field($this->result_id))
		{	
			$F				= new stdClass();
			$F->name = $field->blob;
			$F->max_length = $field->max_length;
			$F->multiple_key = $field->multiple_key;
			$F->name = $field->name;
			$F->not_null = $field->not_null;
			$F->numeric = $field->numeric;
			$F->primary_key = $field->primary_key;
			$F->table = $field->table;
			$F->type = $field->type;
			$F->def = $field->def;
			$F->unique_key = $field->unique_key;
			$F->unsigned = $field->unsigned;
			$F->zerofill = $field->zerofill;
			
			$retval[] = $F;
		}
		
		return $retval;
	}
	
	// --------------------------------------------------------------------

	/**
	 * Free the result
	 *
	 * @return	null
	 */		
	function free_result()
	{
		if (is_resource($this->result_id))
		{
			mysql_free_result($this->result_id);
			$this->result_id = FALSE;
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Data Seek
	 *
	 * Moves the internal pointer to the desired offset.  We call
	 * this internally before fetching results to make sure the
	 * result set starts at zero
	 *
	 * @access	private
	 * @return	array
	 */
	function _data_seek($n = 0)
	{
		return mysql_data_seek($this->result_id, $n);
	}

	// --------------------------------------------------------------------

	/**
	 * Result - associative array
	 *
	 * Returns the result set as an array
	 *
	 * @access	private
	 * @return	array
	 */
	function _fetch_assoc()
	{
		return mysql_fetch_assoc($this->result_id);
	}
	
	// --------------------------------------------------------------------

	/**
	 * Result - object
	 *
	 * Returns the result set as an object
	 *
	 * @access	private
	 * @return	object
	 */
	function _fetch_object()
	{
		return mysql_fetch_object($this->result_id);
	}
	
}


/* End of file SHIN_DB_mysql_result.php */
/* Location: shinfw/core/database/drivers/mysql/SHIN_DB_mysql_result.php */