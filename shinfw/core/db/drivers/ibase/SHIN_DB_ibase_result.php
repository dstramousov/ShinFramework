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
 * ibase Result Class
 *
 * This class extends the parent result class: SHIN_DB_result
 *
 * @category	Database
 * @author		
 * @link		http://www.codeigniter.com/user_guide/database/
 */
class SHIN_DB_ibase_result extends SHIN_DB_result {
    
    /**
     * Number of rows in the result set
     *
     * Firebird/Interbase doesn't have a graceful way to retun the number of rows
     * so we have to use what amounts to a hack.
     *
     * @access  public
     * @return  integer
     */
    function num_rows()
    {
        $stmt_temp = $this->sql;
        $sth_temp = ibase_query ($this->conn_id, $stmt_temp);
        $row_count = 0;
        while ($row_temp = ibase_fetch_object($sth_temp))
        {
            $row_count = $row_count + 1;
        }
        ibase_free_result ($sth_temp);
        return $row_count;
    }

	// --------------------------------------------------------------------

	/**
	 * Number of fields in the result set
	 *
	 * @access  public
	 * @return  integer
	 */
	function num_fields()
	{
		$count = ibase_num_fields($this->stmt_id);

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
		$fieldCount = $this->num_fields();
		for ($c = 0; $c < $fieldCount; $c++)
		{
			$col_info = ibase_field_info($this->stmt_id, $c);
			$field_names[] = $col_info['name'];
		}
		return $field_names;
	}

	// Deprecated
	function field_names()
	{
		return $this->list_fields();
	}

	// --------------------------------------------------------------------

	/**
	 * Field data
	 *
	 * Generates an array of objects containing field meta-data
	 *
	 * @access  public
	 * @return  array
	 */
	function field_data()
	{
		$retval = array();
		$fieldCount = $this->num_fields();
		for ($c = 0; $c < $fieldCount; $c++)
		{
			$col_info = ibase_field_info($this->stmt_id, $c);
			$F			  = new stdClass();
			$F->name		= $col_info['name'];
			$F->type		= $col_info['type'];
			$F->max_length  = $col_info['length'];

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
			ibase_free_result($this->result_id);			
			$this->result_id = FALSE;
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Result - associative array
	 *
	 * Returns the result set as an array
	 *
	 * @access  private
	 * @return  array
	 */
	function _fetch_assoc()
	{
	
		return ibase_fetch_assoc($this->result_id);	
	}

	// --------------------------------------------------------------------

	/**
	 * Result - object
	 *
	 * Returns the result set as an object
	 *
	 * @access  private
	 * @return  object
	 */
	function _fetch_object()
	{
		return ibase_fetch_object($this->result_id);
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
		return FALSE; // Not needed
	}

}


/* End of file SHIN_DB_ibase_result.php */
/* Location: shinfw/core/database/drivers/ibase/SHIN_DB_ibase_result.php */