<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @package		ShinPHP framework
 * @author		
 * @copyright	
 * @license		
 * @link		
 * @since		Version 0.1
 * @filesource	shinfw/core/db/drivers/mssql/SHIN_DB_mssql_forge.php
 */

// ------------------------------------------------------------------------

/**
 * MS SQL Forge Class
 *
 * @category	Database
 * @author		
 * @link		http://codeigniter.com/user_guide/database/
 */
class SHIN_DB_mssql_forge
{

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
	 * Drop Table
	 *
	 * @access	private
	 * @return	bool
	 */
	function _drop_table($table)
	{
		return "DROP TABLE ".SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->_escape_identifiers($table);
	}

	// --------------------------------------------------------------------

	/**
	 * Create Table
	 *
	 * @access	private
	 * @param	string	the table name
	 * @param	array	the fields
	 * @param	mixed	primary key(s)
	 * @param	mixed	key(s)
	 * @param	boolean	should 'IF NOT EXISTS' be added to the SQL
	 * @return	bool
	 */
	function _create_table($table, $fields, $primary_keys, $keys, $if_not_exists)
	{
		$sql = 'CREATE TABLE ';
		
		if ($if_not_exists === TRUE)
		{
			$sql .= 'IF NOT EXISTS ';
		}
		
		$sql .= SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->_escape_identifiers($table)." (";
		$current_field_count = 0;

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
				
                $sql .= "\n\t".SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->_protect_identifiers('[' . $field . ']');
				
                switch($attributes['TYPE']) {
                    case 'enum':
                        $sql .= ' varchar(' . $attributes['CONSTRAINT'] . ')';
                        break;
                    
                    case 'double':
                    case 'float':
                        
                        $sql .= ' DECIMAL (' . $attributes['CONSTRAINT'] . ', ' . $attributes['PREC'] . ')';    
                        break;
                    
                    case 'smallint':
                        $sql .= ' ' . $attributes['TYPE']; 
                        break;
                    
                    case 'date':
                        
                        $sql .= ' VARCHAR(60)';
                        break;
                    
                    default:
                        $sql .=  ' '.$attributes['TYPE'];
                    
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
					$sql .= ' NULL';
				}
				else
				{
					$sql .= ' NOT NULL';			
				}
	
				if (array_key_exists('AUTO_INCREMENT', $attributes) && $attributes['AUTO_INCREMENT'] === TRUE)
				{
					$sql .= ' IDENTITY(1,1)';
				}
			}
			
			// don't add a comma on the end of the last field
			if (++$current_field_count < count($fields))
			{
				$sql .= ',';
			}
		}

		if (count($primary_keys) > 0)
		{
			$primary_keys = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->_protect_identifiers($primary_keys);
			$sql .= ",\n\tPRIMARY KEY (" . implode(', ', $primary_keys) . ")";
		}
		
		if (is_array($keys) && count($keys) > 0)
		{
			foreach ($keys as $key)
			{
				if (is_array($key))
				{
					$key = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->_protect_identifiers($key);	
				}
				else
				{
					$key = array(SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->_protect_identifiers($key));
				}
				
				$sql .= ",\n\tFOREIGN KEY (" . implode(', ', $key) . ")";
			}
		}
		
		$sql .= "\n)";

		return $sql;
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
	 * @param	string	the table name
	 * @param	string	the column definition
	 * @param	string	the default value
	 * @param	boolean	should 'NOT NULL' be added
	 * @param	string	the field after which we should add the new field
	 * @return	object
	 */
	function _alter_table($alter_type, $table, $column_name, $column_definition = '', $default_value = '', $null = '', $after_field = '')
	{
		$sql = 'ALTER TABLE '.SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->_protect_identifiers($table)." $alter_type ".SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->_protect_identifiers($column_name);

		// DROP has everything it needs now.
		if ($alter_type == 'DROP')
		{
			return $sql;
		}

		$sql .= " $column_definition";

		if ($default_value != '')
		{
			$sql .= " DEFAULT \"$default_value\"";
		}

		if ($null === NULL)
		{
			$sql .= ' NULL';
		}
		else
		{
			$sql .= ' NOT NULL';
		}

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
		// I think this syntax will work, but can find little documentation on renaming tables in MSSQL
		$sql = 'ALTER TABLE '.SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->_protect_identifiers($table_name)." RENAME TO ".SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->_protect_identifiers($new_table_name);
		return $sql;
	}

}

/* End of file SHIN_DB_mssql_forge.php */
/* Location: shinfw/core/db/drivers/mssql/SHIN_DB_mssql_forge.php */
