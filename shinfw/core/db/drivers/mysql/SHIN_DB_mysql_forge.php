<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
 * MySQLi Forge Class
 *
 * @category	Database
 * @author		
 * @link		http://codeigniter.com/user_guide/database/
 */
class SHIN_DB_mysql_forge  {
	
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

	// --------------------------------------------------------------------

	/**
	 * Process Fields
	 *
	 * @access	private
	 * @param	mixed	the fields
	 * @return	string
	 */
	function _process_fields($fields)
	{
		$current_field_count = 0;
		$sql = '';

		foreach ($fields as $field=>$attributes)
		{
			// Numeric field names aren't allowed in databases, so if the key is
			// numeric, we know it was assigned by PHP and the developer manually
			// entered the field information, so we'll simply add it to the list
			if (is_numeric($field))
			{
				$sql .= "\n\t$attributes";
			}
			else
			{
				$attributes = array_change_key_case($attributes, CASE_UPPER);
				
				$sql .= "\n\t".SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->_protect_identifiers($field);

				if (array_key_exists('NAME', $attributes))
				{
					$sql .= ' '.SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->_protect_identifiers($attributes['NAME']).' ';
				}
				
				switch($attributes['TYPE']) {
                    case 'enum':
                        $sql .= ' ' . $attributes['TYPE'] . ' (' . implode(',', array_keys($attributes['VALUES'])) . ')';
                        break;
                    
                    case 'double':
                        $sql .= ' ' . $attributes['TYPE'] . '(' . $attributes['CONSTRAINT'] . ', ' . $attributes['PREC'] . ')'; 
                        break;
                    
                    default:
                        if (array_key_exists('TYPE', $attributes))
                        {
                            $sql .=  ' '.$attributes['TYPE'];
                        }
            
                        if (array_key_exists('CONSTRAINT', $attributes) && !empty($attributes['CONSTRAINT']))
                        {
                            $sql .= '('.$attributes['CONSTRAINT'].')';
                        }
            
                        if (array_key_exists('UNSIGNED', $attributes) && $attributes['UNSIGNED'] === TRUE)
                        {
                            $sql .= ' UNSIGNED';
                        }    
                }
	
				if (array_key_exists('DEFAULT', $attributes) && $attributes['DEFAULT'] !== '')
				{
					$sql .= ' DEFAULT \''.$attributes['DEFAULT'].'\'';
				}
	
				if (array_key_exists('NULL', $attributes) && $attributes['NULL'] === TRUE)
				{
					$sql .= ($attributes['NULL'] === TRUE) ? ' NULL' : ' NOT NULL';
				}
	
				if (array_key_exists('AUTO_INCREMENT', $attributes) && $attributes['AUTO_INCREMENT'] === TRUE)
				{
					$sql .= ' AUTO_INCREMENT';
				}
			}
			
			// don't add a comma on the end of the last field
			if (++$current_field_count < count($fields))
			{
				$sql .= ',';
			}
		}
		
		return $sql;
	}

	// --------------------------------------------------------------------

	/**
	 * Create Table
	 *
	 * @access	private
	 * @param	string	the table name
	 * @param	mixed	the fields
	 * @param	mixed	primary key(s)
	 * @param	mixed	key(s)
	 * @param	boolean	should 'IF NOT EXISTS' be added to the SQL
	 * @return	bool
	 */
	function _create_table($table, $fields, $primary_keys, $keys, $if_not_exists, $unique_keys=NULL)
	{
		$sql = 'CREATE TABLE ';
		
		if ($if_not_exists === TRUE)
		{
			$sql .= 'IF NOT EXISTS ';
		}
		
		$sql .= SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->_escape_identifiers($table)." (";

		$sql .= $this->_process_fields($fields);

		if (count($primary_keys) > 0)
		{
			$key_name = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->_protect_identifiers(implode('_', $primary_keys));
			$primary_keys = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->_protect_identifiers($primary_keys);
			$sql .= ",\n\tPRIMARY KEY ".$key_name." (" . implode(', ', $primary_keys) . ")";
		}

		if (is_array($keys) && count($keys) > 0)
		{
			foreach ($keys as $key)
			{
				if (is_array($key))
				{
					$key_name = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->_protect_identifiers(implode('_', $key));
					$key = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->_protect_identifiers($key);	
				}
				else
				{
					$key_name = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->_protect_identifiers($key);
					$key = array($key_name);
				}
				
				$sql .= ",\n\tKEY {$key_name} (" . implode(', ', $key) . ")";
			}
		}

		if (is_array($unique_keys) && count($unique_keys) > 0)
		{
			foreach ($unique_keys as $key=>$val)
			{
				$key_name = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->_protect_identifiers($key);
				$sql .= ",\n\t $val KEY {$key_name} (" . $key_name . ")";
			}

			$unique_keys = array();
		}

		$sql .= "\n) DEFAULT CHARACTER SET " . SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->char_set . " COLLATE " SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->dbcollat;

		return $sql;
	}

	// --------------------------------------------------------------------

	/**
	 * Drop Table
	 *
	 * @access	private
	 * @return	string
	 */
	function _drop_table($table)
	{
		return "DROP TABLE IF EXISTS ".SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->_escape_identifiers($table);
	}

	// --------------------------------------------------------------------

	/**
	 * Alter table query
	 *
	 * Generates a platform-specific query so that a table can be altered
	 * Called by add_column(), drop_column(), and column_alter(),
	 *
	 * @access	private
	 * @param	string	the ALTER type (ADD, DROP, CHANGE)
	 * @param	string	the column name
	 * @param	array	fields
	 * @param	string	the field after which we should add the new field
	 * @return	object
	 */
	function _alter_table($alter_type, $table, $fields, $after_field = '')
	{
		$sql = 'ALTER TABLE '.SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->_protect_identifiers($table)." $alter_type ";

		// DROP has everything it needs now.
		if ($alter_type == 'DROP')
		{
			return $sql.SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->_protect_identifiers($fields);
		}

		$sql .= $this->_process_fields($fields);

		if ($after_field != '')
		{
			$sql .= ' AFTER ' . SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->_protect_identifiers($after_field);
		}
		
		return $sql;
	}

	// --------------------------------------------------------------------

	/**
	 * Rename a table
	 *
	 * Generates a platform-specific query so that a table can be renamed
	 *
	 * @access	private
	 * @param	string	the old table name
	 * @param	string	the new table name
	 * @return	string
	 */
	function _rename_table($table_name, $new_table_name)
	{
		$sql = 'ALTER TABLE '.SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->_protect_identifiers($table_name)." RENAME TO ".SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->_protect_identifiers($new_table_name);
		return $sql;
	}

}

/* End of file SHIN_DB_mysql_forge.php */
/* Location: shinfw/core/database/drivers/mysql/SHIN_DB_mysql_forge.php */