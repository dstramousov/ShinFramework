<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @package		ShinPHP framework
 * @author		
 * @copyright	
 * @license		
 * @link		
 * @since		Version 0.1
 * @filesource  shinfw/libraries/SHIN_DB_forge.php
 */


/**
 * The Database Forge Class contains functions that help you manage your database.
 *
 * @package		ShinPHP framework
 * @subpackage	Library
 * @author		
 * @link		http://codeigniter.com/user_guide/database/forge.html
 */

class SHIN_DB_forge
{
	var $fields		 	= array();
	var $keys			= array();
	var $primary_keys 	= array();
	var $db_char_set	=	'';

	var $unique_keys	= array();
	/**
	 * Constructor
	 *
	 * Grabs the SHIN_Core static object instance so we can access it.
	 *
	 */	
	function SHIN_DB_forge()
	{
		// Assign the main database object to $this->db
		$this->db = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group];

		// require needed deep class
		$__path = BASEPATH.'core/db/drivers/'.$this->db->dbdriver.'/SHIN_DB_'.$this->db->dbdriver.'_forge.php';
//		die(BASEPATH);
//		die($__path);
		if (!is_file($__path))
		{
			SHIN_Core::show_error('DB Forge logic not exist core driver for this type of SQL.');
		}

		require_once($__path);
		$class_name = 'SHIN_DB_'.$this->db->dbdriver.'_forge';
		$this->core_forge = new $class_name();
		
		SHIN_Core::log('debug', 'Database Forge Class Initialized.');
	}

	// --------------------------------------------------------------------

	/**
	 * Create database
	 *
	 * @access	public
	 * @param	string the database name
	 * @return	bool
	 */
	function create_database($db_name)
	{
		$sql = $this->core_forge->_create_database($db_name);
		
		if (is_bool($sql))
		{
			return $sql;
		}
	
		return $this->db->query($sql);
	}

	// --------------------------------------------------------------------

	/**
	 * Drop database
	 *
	 * @access	public
	 * @param	string	the database name
	 * @return	bool
	 */
	function drop_database($db_name)
	{
		$sql = $this->core_forge->_drop_database($db_name);
		
		if (is_bool($sql))
		{
			return $sql;
		}
	
		return $this->db->query($sql);
	}

	// --------------------------------------------------------------------
	
	/**
	 * Add Key
	 *
	 * @access	public
	 * @param	string	key
	 * @param	string	type
	 * @return	void
	 */
	function add_unique_key($key)
	{
		foreach($key as $k=>$v)
		{
			$this->unique_keys[$k] = $v;
		}
	}
	

	/**
	 * Add Key
	 *
	 * @access	public
	 * @param	string	key
	 * @param	string	type
	 * @return	void
	 */
	function add_key($key = '', $primary = FALSE)
	{
		if (is_array($key))
		{
			foreach($key as $one)
			{
				$this->add_key($one, $primary);
			}
			
			return;
		}
	
		if ($key == '')
		{
			SHIN_Core::show_error('Key information is required for that operation.');
		}
		
		if ($primary === TRUE)
		{
			$this->primary_keys[] = $key;
		}
		else
		{
			$this->keys[] = $key;
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Add Field
	 *
	 * @access	public
	 * @param	string	collation
	 * @return	void
	 */
	function add_field($field = '')
	{
		if ($field == '')
		{
			SHIN_Core::show_error('Field information is required.');
		}
		
		if (is_string($field))
		{
			if ($field == 'id')
			{
				$this->add_field(array(
										'id' => array(
													'type' => 'INT',
													'constraint' => 9,
													'auto_increment' => TRUE
													)
								));
				$this->add_key('id', TRUE);
			}
			else
			{
				if (strpos($field, ' ') === FALSE)
				{
					SHIN_Core::show_error('Field information is required for that operation.');
				}
				
				$this->fields[] = $field;
			}
		}
		
		if (is_array($field))
		{
			$this->fields = array_merge($this->fields, $field);
		}
		
	}

	// --------------------------------------------------------------------

	/**
	 * Create Table
	 *
	 * @access	public
	 * @param	string	the table name
	 * @return	bool
	 */
	function create_table($table = '', $if_not_exists = FALSE)
	{	
		if ($table == '')
		{
			SHIN_Core::show_error('A table name is required for that operation.');
		}
			
		if (count($this->fields) == 0)
		{	
			SHIN_Core::show_error('Field information is required.');
		}

		
		$sql = $this->core_forge->_create_table($this->db->dbprefix.$table, $this->fields, $this->primary_keys, $this->keys, $if_not_exists, $this->unique_keys);
		
		$this->_reset();
		return $this->db->query($sql);
	}

	// --------------------------------------------------------------------

	/**
	 * Drop Table
	 *
	 * @access	public
	 * @param	string	the table name
	 * @return	bool
	 */
	function drop_table($table_name)
	{
		$sql = $this->core_forge->_drop_table($this->db->dbprefix.$table_name);
		
		if (is_bool($sql))
		{
			return $sql;
		}
	
		return $this->db->query($sql);
	}

	// --------------------------------------------------------------------

	/**
	 * Rename Table
	 *
	 * @access	public
	 * @param	string	the old table name
	 * @param	string	the new table name
	 * @return	bool
	 */
	function rename_table($table_name, $new_table_name)
	{
		if ($table_name == '' OR $new_table_name == '')
		{
			SHIN_Core::show_error('A table name is required for that operation.');
		}
			
		$sql = $this->core_forge->_rename_table($table_name, $new_table_name);
		return $this->db->query($sql);
	}

	// --------------------------------------------------------------------

	/**
	 * Column Add
	 *
	 * @access	public
	 * @param	string	the table name
	 * @param	string	the column name
	 * @param	string	the column definition
	 * @return	bool
	 */
	function add_column($table = '', $field = array(), $after_field = '')
	{
		if ($table == '')
		{
			SHIN_Core::show_error('A table name is required for that operation.');
		}

		// add field info into field array, but we can only do one at a time
		// so we cycle through

		foreach ($field as $k => $v)
		{
			$this->add_field(array($k => $field[$k]));		

			if (count($this->fields) == 0)
			{	
				SHIN_Core::show_error('Field information is required.');
			}
			
			$sql = $this->core_forge->_alter_table('ADD', $this->db->dbprefix.$table, $this->fields, $after_field);

			$this->_reset();
	
			if ($this->db->query($sql) === FALSE)
			{
				return FALSE;
			}
		}
		
		return TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * Column Drop
	 *
	 * @access	public
	 * @param	string	the table name
	 * @param	string	the column name
	 * @return	bool
	 */
	function drop_column($table = '', $column_name = '')
	{
	
		if ($table == '')
		{
			SHIN_Core::show_error('A table name is required for that operation.');
		}

		if ($column_name == '')
		{
			SHIN_Core::show_error('A column name is required for that operation.');
		}

		$sql = $this->core_forge->_alter_table('DROP', $this->db->dbprefix.$table, $column_name);
	
		return $this->db->query($sql);
	}

	// --------------------------------------------------------------------

	/**
	 * Column Modify
	 *
	 * @access	public
	 * @param	string	the table name
	 * @param	string	the column name
	 * @param	string	the column definition
	 * @return	bool
	 */
	function modify_column($table = '', $field = array())
	{
		if ($table == '')
		{
			SHIN_Core::show_error('A table name is required for that operation.');
		}

		// add field info into field array, but we can only do one at a time
		// so we cycle through

		foreach ($field as $k => $v)
		{
			$this->add_field(array($k => $field[$k]));

			if (count($this->fields) == 0)
			{	
				SHIN_Core::show_error('Field information is required.');
			}
		
			$sql = $this->core_forge->_alter_table('CHANGE', $this->db->dbprefix.$table, $this->fields);

			$this->_reset();
	
			if ($this->db->query($sql) === FALSE)
			{
				return FALSE;
			}
		}
		
		return TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * Reset
	 *
	 * Resets table creation vars
	 *
	 * @access	private
	 * @return	void
	 */
	function _reset()
	{
		$this->fields 		= array();
		$this->keys			= array();
		$this->unique_keys	= array();
		$this->primary_keys = array();
	}

    /**
     * Return pointer for this class.
     *
     * @access public
     * @param NULL
     * @return pointer for this class.
     */
	public function get_instance()
	{
		return $this;
	}


}

/* End of file SHIN_DB_forge.php */
/* Location: shinfw/libraries/SHIN_DB_forge.php */