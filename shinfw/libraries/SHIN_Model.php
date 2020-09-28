<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed 4');

define('WRITE_NORMAL', 'wrt_n');
define('WRITE_EXTENDED', 'wrt_e');

define('DB_OBJ_TYPE_TABLE', 'db_t');
define('DB_OBJ_TYPE_VIEW', 'db_v');
		
define('DB_FETCH_ANSWER_TYPE_JSON', 'json');
define('DB_FETCH_ANSWER_TYPE_ARRAY', 'array');

define('PHYSICAL_EXTENSION', 'PE');
define('VIRTUAL_EXTENSION', 'VE');
		
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
 * Parent class for each model. Implement common methods.
 *
 * @package		ShinPHP framework
 * @subpackage	Core
 * @category	Model
 * @author		
 * @link		
 */

class SHIN_Model
{

    /**
     * PK name.
     */
    var $pk = NULL;

    /**
     * Physical tablename.
     */
    var $table_name;

    /**
     * ONLY Fields for this model.
     */
    var $short_fields = array();
	
    /**
     * Display name (multilanguage).
     */
    var $display_name;
	
    /**
     * User place default row.
     */
    var $user_default_rows;

    /**
     * JOIN data.
     */
    var $joined_data = array();

    /**
     * Requested fields array.
     */
    var $require_fields_array = array();
	
	////  NEW 
	
    var $primary_key;
    var $class_name;  // class_name == table name (without prefix)
	
    var $fields;  // hash, not array (!)
                  // All info about fields are stored here.
                  // See also function insert_field().

    var $where_conditions;  // hash, not array (!)
                            // has 2 indexes: ['field_name']['type']

    var $table_indexes = array();    // additional table indexes array
    var $foreign_keys  = array();

    var $table_options;    // create table options
    var $select_from;      // FROM clause for SELECT query
    var $aux_select_from;  // FROM clause for update_auxilary_data() function
	
	
    /**
     * Type of database object.
     */
    var $db_obj_type = DB_OBJ_TYPE_TABLE;

	/**
     * Standart addons prefix for view creation sql statement. 
     */
    var $view_standart_addons_prefix;

    /**
     * Sight for setup.
     */
    var $setup_include_sight = TRUE;

    /**
     * type of extension .
     */
    var $ext_type = PHYSICAL_EXTENSION;
	//////////////////////////////////////////////
	
    /**
     * Constructor.
     *
     * @access public
     * @param:  $model_name string model name, i.e. phys tablename in to database
     * @param:  $id integer , if it`s needed fetch record with this id 
     * @param:  $id integer , if it`s needed fetch record with this id 
     * @return: void
     */
    function __construct($model_name=NULL, $id=NULL)
    {
		$this->__init($model_name, $id);
		
		Console::logSpeed('Model "'.$this->class_name.'_model" load successful.');
		Console::logMemory($this, 'Model "'.$this->class_name.'_model". Size of class: ');

    }//end of function 
	
    /**
     * Initialize model for work.
     *
     * @access private
     * @param:  string $model_name name of physical table in to DB
     * @param:  integer $id you can in to initialization part make fetch for any id
     * @return: void.
     */
    private function __init($model_name=NULL, $id=NULL)
	{ 
        if($model_name){
			$this->table_name = $model_name;
			$this->class_name = $model_name;
		}

        $this->fields = array();
        $this->where_conditions = array();

        $this->set_indefinite();

        $this->insert_select_from();
        $this->insert_aux_select_from();
		
        if($id){$this->fetchByID($id);}
		
		if(SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->view_definer == 'AUTO'){
			$this->view_standart_addons_prefix = 'CREATE ALGORITHM=UNDEFINED DEFINER=`'.SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->username.'`@`'.SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->hostname.'` SQL SECURITY DEFINER';
		} elseif(SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->view_definer == 'CUSTOM'){
			$this->view_standart_addons_prefix = 'CREATE ALGORITHM=UNDEFINED DEFINER=`'.SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->view_custom_definer.' SQL SECURITY DEFINER';
		} else {
			// OFF
			$this->view_standart_addons_prefix = 'CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER';
		}
	}
	
		
    /**
     * Reinitialize model for use with another physical table in to DB
     *
     * @access public
     * @param:  string $_name name of physical table in to DB
     * @return: void.
     */
    function reInit($_name)
	{ 
		$this->__init($_name);
	}
	
    /**
     * Return SelectQuery object.
     *
     * @access public
     * @param:  array $fields_to_select
     * @return: object SelectQuery.
     */
    function get_select_query($fields_to_select = NULL)
	{   
	
        $field_names = isset($fields_to_select) ?
            $fields_to_select : array_keys($this->fields);

        $select = '';
        $comma = '';		

        reset($field_names);
		
        while (list($i, $name) = each($field_names)) {
		
            $f = isset($this->fields[$name]) ? $this->fields[$name] : '';

            if (!isset($f['select'])) {
                continue;
            }

            $select .= $comma;
            $comma = ', ';
			
            $select .= $f['select'] . " as $name";
        }

        $query = new SHIN_SelectQuery(array(
            'select' => $select,
            'from'   => $this->select_from,
        ));

        return $query;
    }//end of function 
	
	
	
    /**
     * Store FROM clause for update_auxilary_data function.
     *
     * @access public
     * @param:  string $select_from FROM clause forupdate_auxilary_data
     * @return: NULL
     */
    function insert_select_from($select_from = NULL)
	{
        $this->select_from =
            isset($select_from) ?
            $select_from :
            ($this->table_name() . " as $this->class_name");
    }//end of function 


    /**
     * Store FROM clause for update_auxilary_data function.
     *
     * @access public
     * @param:  string $aux_select_from FROM clause for update_auxilary_data
     * @return: NULL
     */
    function insert_aux_select_from($aux_select_from = NULL)
	{
        $this->aux_select_from =
            isset($aux_select_from) ?
            $aux_select_from :
            $this->select_from;
    }//end of function 


    /**
     * Return name of MySQL table where data are stored.
     *
     * @access public
     * @param:  NULL
     * @return: string name of MySQL table.
     */
    function table_name()
	{
        return $this->class_name;
    }//end of function 

		
    /**
     * Set PRIMARY KEY member variable to zero. In other words, make the object undefined.
     *
     * @access public
     * @param:  NULL
     * @return: NULL
     */
    function set_indefinite()
	{
        $pr_key_name = $this->primary_key_name();
        $this->$pr_key_name = 0;
    }//end of function 
	
	
    /**
     * Add indexes for current model.
     *
     * @access public
     * @param:  string $index Index name.
     * @return: NULL
     */
    function insert_index($index)
	{
        $this->table_indexes[] = $index;
    }//end of function 
	
	
    /**
     * Retun name of the PRIMARY KEY column.
     *
     * @access public
     * @param:  NULL
     * @return: string $this->primary_key  OR 'id'
     */
    function primary_key_name()
	{
         return isset($this->primary_key) ? $this->primary_key : 'id';
   }//end of function 
	
	
    /**
     * Return current DATE
     *
     * @access  public
     * @param:  NULL
     * @return: string with current date for current Database type
     */
    function db_now_date() {
        return SHIN_Model::_db_date(time());
    }//end of function 

	
    /**
     * Return current DATETIME
     *
     * @access  public
     * @param:  NULL
     * @return: string with current datetime for current Database type
     */
    function db_now_datetime() {
        return SHIN_Model::_db_datetime(time());
    }//end of function 

    /**
     * Return current TIME
     *
     * @access  public
     * @param:  NULL
     * @return: string with current datetime for current Database type
     */
    function db_now_time() {
        return SHIN_Model::_db_time(time());
    }//end of function 

    /**
     * Return current DATE
     *
     * @access private
     * @param:  integer $ts current timestamp
     * @return: string with current date for current Database type
     */
    function _db_time($ts) {
        return date(SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->db_time_format, $ts);
    }//end of function 

	
    /**
     * Return current DATE
     *
     * @access private
     * @param:  integer $ts current timestamp
     * @return: string with current date for current Database type
     */
    function _db_date($ts) {
        return date(SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->db_date_format, $ts);
    }//end of function 

	
    /**
     * Return current DATETIME
     *
     * @access  private
     * @param:  integer $ts current timestamp
     * @return: string with current datetime for current Database type
     */
    function _db_datetime($ts) {
    	return date(SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->db_datetime_format, $ts);
    }//end of function 
	

    /**
     * Fetch data from database using given WHERE condition. Return true if found.
     *
     * @access  public
     * @param:  integer $ts current timestamp
     * @return: string with current datetime for current Database type
     */
    function fetch($where_str = NULL, $more = 0)
	{
        if (!isset($where_str)) {
            $where_str = $this->default_where_str();
        }

        $query = $this->get_select_query();
        $query->expand(array(
            'where' => $where_str,
        ));

        if ($more) {
            $query = $this->expand_select_query($query);
        }
		
		//dump($query);

        $res = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->query($query);

        if ($res->num_rows() != 1) {  // record not found
		
            return false;
        }

        $row = $res->fetch();
        $this->fetch_row($row);

        return true;
    }//end of function 
	
	
	


	/**
       * Fetch data from query result row.
       * @param $row array.
       * @access public
       * @return NULL
       */
    function fetch_row($row)
	{
        foreach($row as $name => $value) {
            $this->$name = $value;  // NB! Variable variable.
        }
    }//end of function 
	
	
    /**
     * Store all parameters of the table field (column) in hash $fields. The key of this hash is parameter 'name'.
     * 	 
     * - Supported parameters:
     * -# 'name'   (string)  Name of the class member variable.
     *                     default value == 'column'
     *                     (or 'table_column' if the field is from other table).
     *  -# 'table'  (string)  Name of the table in which the field is stored.
     *                     default value == class_name.
     *  -# 'link'	   (string)  Name of the table which will be linked.
     *  -# 'alias'  (string)  Alias for linked table.
     *  -# 'column' (string)  Name of the field in the table.
     *  -# 'type'   (string)  Type of the column (integer, double, varchar, etc.)
     *                     integer, enum, varchar, double, datetime, timestamp.
     *  -# 'values' (array)   Values for enum type.
     *  -# 'width'  (int)     Width of the stored value (for varchar and double).
     *  -# 'prec'   (int)     Precision of the stored value (for double only).
     *  -# 'attr'   (string)  Additional column attributes for CREATE TABLE query.
     *  -# 'value'  (*)       Initial value for class member variable.
     *  -# 'aux'    (string)  SQL expression for updating auxilary data.
     *  -# 'unsigned'  (bool)  Unsigned or not.
     *  -# 'create' (bool)    Must be used in CREATE TABLE query.
     *  -# 'store'  (bool)    May be stored to table.
     *  -# 'update' (bool)    May be updated in table.
     *  -# 'read'   (bool)    May be read from CGI.
     *  -# 'write'  (bool)    May be written to web page.
     *  -# 'input'  (string)  HTML form input type for this field.
     *  -# 'virtual'(bool)    Is column virtual or not
     *  -# 'validate'(bool)    Is column need make standart validate or not. Default - FALSE
		Default values:
						validate_int
						validate_date
						validate_float
						validate_bool
						validate_url
						validate_email
						validate_ip
						filter_raw
						sanitize_string
						sanitize_encoded
						sanitize_special_chars
						sanitize_email
						sanitize_url
						sanitize_number_int
						sanitize_number_float
						sanitize_magic_quotes
						flag_allow_octal
						flag_allow_hex
						flag_strip_high
						flag_encode_low
						flag_encode_high
						flag_no_encore_quotes
						flag_allow_fraction
						flag_allow_thousand
						flag_allow_scientific
						flag_scheme_required
						flag_host_required
						flag_path_required
						flag_query_required
						flag_ipv4
						flag_ipv6
						flag_no_res_range
						flag_no_priv_range
     *
     * @access public
     * @param:  $field array. See Example:
     * @return: NULL
     */	 
    function insert_field($field)
	{

        if(isset($field['table']) && !empty($field['table'])) {
            $field['virtual']   =   true;
        } else {
            $field['virtual']   =   false;    
        }
        
        // set required parameters:
        if (!isset($field['table'])) {
            $field['table'] = isset($field['name']) ? '' : $this->class_name;
        }

        // join:
        if (isset($field['join'])) {

            // Set default join mode to INNER:
            if (!isset($field['join']['mode'])) {
                $field['join']['mode'] = 'inner';
            }

            // Table name must be given:
            if (!isset($field['join']['table'])) {
                die('Table name must be given for join');
            }

            // Set alias for joined table:
            if (!isset($field['join']['as'])) {
                $field['join']['as'] = $field['join']['table'];
            }

            // On what column we make join:
            if (!isset($field['join']['column'])) {
                $field['join']['column'] = 'id';
            }

            // Expand select query:
            $mode   = $field['join']['mode'];
            $table  = $field['join']['table'];
            $alias  = $field['join']['as'];
            $column = $field['join']['column'];

            $t_name = $table;

            $this->select_from .=
                " $mode join $t_name as $alias" .
                " on $alias.$column = {$this->class_name}.$field[column]";
		}
		
        if (isset($field['link'])) {
            $table = $field['link'];

            if (!isset($field['alias'])) {
                $field['alias'] = $table;
            }
            if (!isset($field['type'])) {
                $field['type'] = 'integer';
            }
            if (!isset($field['column'])) {
                $field['column'] = $table . '_id';
            }

            // expand select query:
            $t_name = get_table_name($table);
            $this->select_from .=
                " INNER join $t_name as $field[alias]" .
                " on $field[alias].id = {$this->class_name}.$field[column]";
        }

        if (!isset($field['name'])) {
            if (!isset($field['column'])) {
				SHIN_Core::show_error("$this->class_name: Error! Field name is not specified!<br>");
            }
            $table_name = (isset($field["alias"])) ? $field["alias"] : $field['table'];
            $field['name'] =
                ($field['table'] == $this->class_name) ?
                $field['column'] :
                ("{$table_name}_{$field['column']}");
        }

        if (!isset($field['width'])) {
			if(isset($field['type'])) {
			
				switch($field['type']) {
				case 'varchar':
					$field['width'] = 255;
					break;
				case 'double':
				case 'float':
				case 'decimal':
					$field['width'] = 16;
					break;
				}
			} else {
				// try to take information about field
				foreach(SHIN_Core::$_models as $loaded_model){
					if($loaded_model->table_name == $field['table']){
						foreach($loaded_model->fields as $loaded_model_field){
							if($loaded_model_field['name'] == $field['column']){
								foreach($loaded_model_field as $property=>$value){
									if (!array_key_exists($property, $field)) {
										$field[$property] = $value;
									}
								}
							}
						}
					} else {
						SHIN_Core::log('warning', 'SHIN_Model WARNING. Virtual vield incorrect definition.');
					}
				}
			}
        }

        if (!isset($field['prec'])) {
			if (isset($field['type'])) {
				switch($field['type']) {
				case 'double':
				case 'float':
				case 'decimal':
					$field['prec'] = 2;
					break;
				}
			}
        }

        if (!isset($field['select']) && $field['table'] != '' ) {
            $table_name = (isset($field["alias"])) ? $field["alias"] : $field['table'];
            $field['select'] = " $table_name.$field[column]";
        }

        if (!isset($field['attr'])) {
            $field['attr'] = '';
        } 

		
        if (!isset($field['null'])) {
            $field['null'] = 0;
        }

        if (!isset($field['create'])) {
            $field['create'] = ($field['table'] == $this->class_name) ? 1 : 0;
        }
		
        if (!isset($field['validate'])) {
			$field['validate'] = FALSE;
		}
		

        if ($field['create'] && !isset($field['aux'])) {
            $field['aux'] = "$field[table].$field[column]";
        }
        
        if (!isset($field['store'])) {
            $field['store'] = (
                $field['table'] == $this->class_name            &&
                $field['create']                                &&
                ( $field['name'] != $this->primary_key_name() || stristr($field['attr'], 'auto_increment') === false  ) &&
                $field['type'] != 'timestamp'
           ) ? 1 : 0;
        }

        if (!isset($field['update'])) {
            $field['update'] = (
                $field['table'] == $this->class_name            &&
                $field['create']                                &&
                ( $field['name'] != $this->primary_key_name() || stristr($field['attr'], 'auto_increment') === false  ) &&
                $field['type'] != 'timestamp'
           ) ? 1 : 0;
        }

        if (!isset($field['read'])) {
			if (isset($field['type'])) {
				$field['read'] = ($field['type'] != 'timestamp') ? 1 : 0;
			}
        }

        if (isset($field['unique'])) {
            $field['unique'] = 1;
        } else {
            $field['unique'] = 0;
		}
				
        if (!isset($field['write'])) {
            $field['write'] = 1;
        }

        if (!isset($field['input'])) {
            $field['input'] = ($field['name'] == 'password') ? 'password' : 'text';
        }

        if ( isset($field['reference']) && trim($field['reference']) ) {
        	$field['reference'] = 'references '.$field['reference'];
        } else {
        	$field['reference'] = '';
        }

		
        if ( isset($field['comment']) && trim($field['comment']) ) {
        	$field['comment'] = 'comment '.SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->escape($field['comment']);
        } else {
        	$field['comment'] = '';
        }

        if ( !isset($field['validate']) ) {
        	$field['validate'] = ($field['store'] && $field['update']);
        }

        if ( !isset($field['title']) ) {
		
			// dimas by perfomance.
        	//$_title = preg_replace('/^([A-Za-z_ ]+).*$/', '$1', $field['name']);
        	//$_title = ucfirst(str_replace('_', ' ', $_title));
			
			$_title = $field['name'];
			
			if(SHIN_Core::$_language){
				$__tmp_val = SHIN_Core::$_language->line($_title);
				if($__tmp_val == ''){$__tmp_val = $_title;}
			} else {
				$__tmp_val = $_title;
			}
			
			$field['title'] = $__tmp_val;
        }
		
		if($field['virtual']){
			if(!isset($field['type'])){
				
				$__model_name = $field['table'].'_model';
				if(!isset(SHIN_Core::$_models[$field['table'].'_model'])){
					// init needed libs
					$nedded_libs = array('models' => array(array($__model_name, $__model_name)));
					SHIN_Core::postInit($nedded_libs);
				}
								
				foreach(SHIN_Core::$_models[$__model_name]->fields as $loaded_model_field){

					if($loaded_model_field['name'] == $field['column']){
						foreach($loaded_model_field as $property=>$value){
							if (!array_key_exists($property, $field)) {
								$field[$property] = $value;
							} 							
						}
					}
				}
			}
		}

        $name = $field['name'];
        $this->fields[$name] = $field;

        if (isset($field['value'])) {
            $this->$name = $field['value'];  // !!!
        }
				
    } // end of function (insert_field)


    /**
     * Store all parameters of the table field (column) in hash $fields. The key of this hash is parameter 'name'.
     *
     * @access public
     * @param:  $condition array
     * @return: NULL
     */
    function insert_where_condition($condition)
	{
        $name     = $condition['name'];
        $relation = $condition['relation'];

        $this->where_conditions[$name][$relation] = $condition;
    }//end of function 
	
    /**
     * Prepare SQL statement and fetch data for Datatables widget.
     *
     * @access public
     * @param:  NULL
     * @return: $ret array with prepared data
     */
    function fetchPagingData($customization_fields = NULL)
    {
        $ret = array();
        
        $_requested_model_fields = array();
        foreach($this->fields as $data){
            array_push($_requested_model_fields, $data['column']);
        }
        
        $needed_column = array();
        if(SHIN_Core::$_input->post('needed_column')){
            $needed_column = explode(",", SHIN_Core::$_input->post('needed_column'));
        }
        
        
        /* Paging */
        $sLimit = "";
        $iDisplayStart = SHIN_Core::$_input->post('iDisplayStart');
        if ( isset( $iDisplayStart ) )
        {
            $sLimit = SHIN_Core::$_input->post('iDisplayStart') .", ".SHIN_Core::$_input->post('iDisplayLength');
        }
    
        /* Ordering */
        $sOrder = "";
        $iSortCol_0 = SHIN_Core::$_input->post('iSortCol_0');
        if ( isset( $iSortCol_0 ) )
        {
            $sOrder = " ";
            for ( $i=0 ; $i<SHIN_Core::$_input->post('iSortingCols') ; $i++ )
            {
                $sOrder .= $_requested_model_fields[SHIN_Core::$_input->post('iSortCol_'.$i)]." ".SHIN_Core::$_input->post('sSortDir_'.$i).", ";
            }
            $sOrder = substr_replace( $sOrder, "", -2 );
        }
    
        /* Filtering - NOTE this does not match the built-in DataTables filtering which does it
        * word by word on any field. It's possible to do here, but concerned about efficiency
        * on very large tables, and MySQL's regex functionality is very limited
        */
        $sWhere = "";
        $sSearch = SHIN_Core::$_input->post('sSearch');
        if(isset($sSearch)){
            if ( $sSearch != "" )
            {
                $__tmp_arr = array();
                
                // understand and define lists with non virtual fields
                $real_field_list = array();
                foreach($this->fields as $field_info){
                    if(!$field_info['virtual']){
                        array_push($real_field_list, $field_info['column']);
                    }
                }
                
                foreach($needed_column as $field_name){
                    if (in_array($field_name, $real_field_list)) {
                        array_push($__tmp_arr, $this->class_name.'.'.$field_name." LIKE '%".SHIN_Core::$_input->post('sSearch')."%' ");
                    }
                }
                
                $sWhere = ' '.implode(" OR ", $__tmp_arr);
            }
        }
		
		
        $rResult = $this->get_expanded_result(array(
                                                        "limit"        => ($sLimit) ? $sLimit : '',
                                                        "where"        => ($sWhere) ? $sWhere : '1=1',
                                                        "order_by"    => ($sOrder) ? $sOrder : '',
                                                    ), $needed_column);
    
        ////////////////////////////////////////////////////////
        $sQuery = " SELECT COUNT(*) as total FROM ".$this->table_name;
        
        $rResultFilterTotal = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->query($sQuery);
        $aResultFilterTotal = $rResultFilterTotal->row_array();
        $iFilteredTotal = $aResultFilterTotal['total'];
        $rResultFilterTotal->free_result();
    
        $iTotal = $iFilteredTotal;
        
        $sOutput = '{';
        $sOutput .= '"sEcho": '.intval(SHIN_Core::$_input->post('sEcho')).', ';
        $sOutput .= '"iTotalRecords": '.$iTotal.', ';
        $sOutput .= '"iTotalDisplayRecords": '.$iFilteredTotal.', ';
        $sOutput .= '"aaData": [ ';
        
        $__arr = array();
        foreach ($rResult->result_array() as $aRow)
        {        
            foreach($aRow as $key=>$value){
                $__arr[$key] = '"'.addslashes($value).'"';
            }
            
            // If needed add new customization fields
            if(count($customization_fields)){
                foreach($customization_fields as $virtual_column){
                    $__arr[$virtual_column] = '"'.'<a href=\"javascript:openDialog('.$aRow[$this->primary_key].', \''.trim($virtual_column).'\', \''.$this->table_name.'\');\" id=\"1\"><img src=\"'.SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'].'/images/'.trim($virtual_column).'.png\" width=\"16\" height=\"16\" border=\"0\" /></a>'.'"';
                }
            }
            
            $sOutput .= "[". implode(', ', $__arr) ."],";
            
        }
        $sOutput = substr_replace( $sOutput, "", -1 );
        $sOutput .= '] }';
        $rResult->free_result();

        return $sOutput;
    } 
    
    /**
     * Prepare SQL statement and fetch data for Datatables widget.
     *
     * @access public
     * @param:  NULL
     * @return: $ret array with prepared data
     */
	function fetchCorrectPagingData($customization_fields = NULL, $where_condition = NULL, $return_answer_type = DB_FETCH_ANSWER_TYPE_JSON)
	{
		$ret = array();
		
		$_requested_model_fields = array();
		foreach($this->fields as $data){
			array_push($_requested_model_fields, $data['column']);
		}
		
		$needed_column = array();
		if(SHIN_Core::$_input->post('needed_column')){
			$needed_column = explode(",", SHIN_Core::$_input->post('needed_column'));
		}
				
		
		/* Paging */
		$sLimit = "";
		$iDisplayStart = SHIN_Core::$_input->post('iDisplayStart');
		if ( isset( $iDisplayStart ) )
		{
			$sLimit = SHIN_Core::$_input->post('iDisplayStart') .", ".SHIN_Core::$_input->post('iDisplayLength');
		}
	
		/* Ordering */
		$sOrder = "";
		$iSortCol_0 = SHIN_Core::$_input->post('iSortCol_0');
		if ( isset( $iSortCol_0 ) )
		{
			$sOrder = " ";
			for ( $i=0 ; $i<SHIN_Core::$_input->post('iSortingCols') ; $i++ )
			{
				$sOrder .= $needed_column[SHIN_Core::$_input->post('iSortCol_'.$i)]." ".SHIN_Core::$_input->post('sSortDir_'.$i).", ";
				
			}
			$sOrder = substr_replace( $sOrder, "", -2 );
		}

	
		/* Filtering - NOTE this does not match the built-in DataTables filtering which does it
		* word by word on any field. It's possible to do here, but concerned about efficiency
		* on very large tables, and MySQL's regex functionality is very limited
		*/
		$sWhere = "";
		$sSearch = SHIN_Core::$_input->post('sSearch');
        
        if(isset($sSearch)){
			if ( $sSearch != "" )
			{
				$__tmp_arr = array();
				
				$real_field_list = array();
				foreach($this->fields as $field_info){
					array_push($real_field_list, $field_info['column']);
				}
				
				foreach($real_field_list as $field_name ){
					array_push($__tmp_arr, $field_name." LIKE '%".SHIN_Core::$_input->post('sSearch')."%' ");
				}
				
				$sWhere = ' '.implode(" OR ", $__tmp_arr);
			}
		}
		
		//dump($sWhere);
        
        // If needed add custom where condition
        if(!empty($where_condition)){
            $__tmp  =   explode('|', $where_condition);
            
            $where_fields = $__tmp[0];
            if(isset($__tmp[1])) {
                $where_statement    =   ' ' . trim($__tmp[1]) . ' ';    
            } else {
                $where_statement    =   ' AND ';
            }
            
            $where_condition    =   implode($where_statement, explode(',', $where_fields));
            
            if(!empty($sWhere)) {
                $sWhere .=  $where_statement . $where_condition;
            } else {
                $sWhere .=  $where_condition;    
            }    
        } else {
            if(empty($sWhere)) {
                $sWhere = ' 1=1';
            }    
        }
        
		//dump($sWhere);
		
        $rResult = $this->get_expanded_result(array(
														"limit"		=> ($sLimit) ? $sLimit : '',
														"where"		=> ($sWhere) ? $sWhere : '1=1',
														"order_by"	=> ($sOrder) ? $sOrder : '',
													), $needed_column);
	
		////////////////////////////////////////////////////////
		$cResult = $this->get_expanded_result(array(
                                                        "where"        => ($sWhere) ? $sWhere : '1=1',
                                                        "order_by"     => ($sOrder) ? $sOrder : '',
                                                    ));
        $iFilteredTotal = $cResult->num_rows();
		
		$iTotal = $iFilteredTotal;
		////////////////////////////////////////////////////////
		
		if($return_answer_type == DB_FETCH_ANSWER_TYPE_JSON) 
		{		
			// json return value 			
			$sOutput = '{';
			$sOutput .= '"sEcho": '.intval(SHIN_Core::$_input->post('sEcho')).', ';
			$sOutput .= '"iTotalRecords": '.$iTotal.', ';
			$sOutput .= '"iTotalDisplayRecords": '.$iFilteredTotal.', ';
			$sOutput .= '"aaData": [ ';
			
		
			$__arr = array();
			foreach ($rResult->result_array() as $aRow)
			{		
				foreach($aRow as $key=>$value){
					$value = str_replace("\t",'',$value);
					$__arr[$key] = '"'.str_replace("\'", "'", addslashes($value)) . '"';
				}
				
				if(!is_array($this->primary_key)) {
					$pkObjectStr = '{' . $this->primary_key . ' : \'' . $aRow[$this->primary_key] . '\'}';
				} else {
					$pkObjectStr = '{';
					foreach($this->primary_key as $key) {
						$pkObjectStr .= $key . ' : \'' . $aRow[$key] . '\', ';     
					}
					$pkObjectStr = substr($pkObjectStr, 0, -2) . '}';
				}
				// If needed add new customization fields
				if(count($customization_fields)){
					foreach($customization_fields as $virtual_column){
						$__arr[$virtual_column] = '"'.'<a href=\"javascript:' . SHIN_Core::$_input->post('crud_obj_name') . '.openDialog('.$pkObjectStr.', \''.trim($virtual_column).'\');\" id=\"1\"><img src=\"'.SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'].'/images/'.trim($virtual_column).'.png\" width=\"16\" height=\"16\" border=\"0\" /></a>'.'"';
					}
				}
				
				$sOutput .= "[". implode(', ', $__arr) ."],";
			}
			
			$sOutput = substr_replace( $sOutput, "", -1 );
			$sOutput .= '] }';
			
		} else {
		
			// php array return value
			$sOutput = array();
			$sOutput['sEcho'] = intval(SHIN_Core::$_input->post('sEcho'));
			$sOutput['iTotalRecords'] = $iTotal;
			$sOutput['iTotalDisplayRecords'] = $iFilteredTotal;
			$sOutput['data'] = array();
			
			$__arr = array();
			foreach ($rResult->result_array() as $aRow)
			{		

				foreach($aRow as $key=>$value){

					if($this->fields[$key]['type'] == 'date')
					{
						$value = fromDbToDisplay($value);
					}

					$value = str_replace("\n",'',$value); // ????  jsonlint validator
					$__arr[$key] = '"'.str_replace("\'", "'", addslashes($value)) . '"';
				}
				
				if(!is_array($this->primary_key)) {
					$pkObjectStr = '{' . $this->primary_key . ' : \'' . $aRow[$this->primary_key] . '\'}';
				} else {
					$pkObjectStr = '{';
					foreach($this->primary_key as $key) {
						$pkObjectStr .= $key . ' : \'' . $aRow[$key] . '\', ';     
					}
					$pkObjectStr = substr($pkObjectStr, 0, -2) . '}';
				}
				// If needed add new customization fields
				if(count($customization_fields)){
					foreach($customization_fields as $virtual_column){
						$__arr[$virtual_column] = '"'.'<a href=\"javascript:' . SHIN_Core::$_input->post('crud_obj_name') . '.openDialog('.$pkObjectStr.', \''.trim($virtual_column).'\');\" id=\"1\"><img src=\"'.SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'].'/images/'.trim($virtual_column).'.png\" width=\"16\" height=\"16\" border=\"0\" /></a>'.'"';
					}
				}
				
				array_push($sOutput['data'], $__arr);
			}
		}

		$rResult->free_result();
		return $sOutput;
		
    } // end of function 
	
    /**
     * EXPEREMENTAL
     *
     * 	label_delete_action
     * 	htmlcss
     * 	tabName
     * 	datatbleName
     * 	js-message
     * 	js-error
     * 	_error
     * 	validatetion-error
     * @access public
     * @param:  NULL
     * @return: NULL
     */
	public function prepareCodeforCRUD($_data_array)
	{
	
		$ret_code = '
        <div id="'.$_data_array['tab_name'].'-delete-dialog" class="'.$_data_array['dialog_css_class'].'-delete-dialog crud-dialog">
            <div class="inner">
                <center>'.SHIN_Core::$_language->line($_data_array['label_delete_action']).'</center>
            </div>
        </div>
        
        <div id="'.$_data_array['tab_name'].'-edit-dialog" class="' . $_data_array['dialog_css_class'] . '-edit-dialog crud-dialog"></div>
        <div id="'.$_data_array['tab_name'].'-add-dialog"  class="' . $_data_array['dialog_css_class'] . '-add-dialog crud-dialog"></div>';
  
		$ret_code_js = '
		
                        var ' . $_data_array['crud_obj_name'] . '     =   new crudClass({
                        
                        general: {
                            tabName         : \''.$_data_array['tab_name'].'\',
                            datatableName   : \''.$_data_array['datatable_name'].'\',
                            messageObj      : new messageClass(\'#'.$_data_array['message_block'].'\', \'#'.$_data_array['error_block'].'\'),
                            dialogObj       : new dialogClass({tabName: \''.$_data_array['tab_name'].'\'}),
                            dialogMessageObj: new validationClass({errorContainerPrefix: \''.$_data_array['error_prefix'].'\', 
                                                                   errorClassContainer: \''.$_data_array['validation_class'].'\'})    
                        },';
         
         if(!isset($_data_array['custom_url'])) { 
            $ret_code_js .= 'dialogs: {
                            read    :   {
                                url: \'' . prep_url(base_url() . '/' . $_data_array['controller'] . '/read\'').'    
                            },
                            validate:   {
                                url: \'' . prep_url(base_url() . '/' . $_data_array['controller'] . '/validate\'').'
                            },
                            write   :   {
                                url: \'' . prep_url(base_url() . '/' . $_data_array['controller'] . '/create\'').'
                            },
                            del     :   {
                                url:  \'' . prep_url(base_url() . '/' . $_data_array['controller'] . '/delete\'').'
                            }
                        }});
                </script>';
         } else {
            $ret_code_js .= 'dialogs: {
                            read    :   {
                                url: \'' . prep_url(base_url() . '/' . $_data_array['custom_url']['read'] . '\'').'    
                            },
                            validate:   {
                                url: \'' . prep_url(base_url() . '/' . $_data_array['custom_url']['validate'] . '\'').'
                            },
                            write   :   {
                                url: \'' . prep_url(base_url() . '/' . $_data_array['custom_url']['write'] . '\'').'
                            },
                            del     :   {
                                url: \'' . prep_url(base_url() . '/' . $_data_array['custom_url']['del'] . '\'').'
                            }
                        }});';    
         }

		SHIN_Core::$_jsmanager->addIncludesOutDomready($ret_code_js);
		
		return $ret_code;		
	}
    /**
     * Prepare special JSON answer for visualization in to datatable.
     *
     * @access public
     * @param:  NULL
     * @return: NULL
     */
	public function packToJSONData($_array)
	{
		$sOutput = '{';
		$sOutput .= '"sEcho": '.intval(SHIN_Core::$_input->post('sEcho')).', ';
		$sOutput .= '"iTotalRecords": '.$_array['iTotalRecords'].', ';
		$sOutput .= '"iTotalDisplayRecords": '.$_array['iTotalDisplayRecords'].', ';
		$sOutput .= '"aaData": [ ';
		
		foreach($_array['data'] as $iter)
		{
            $sOutput .= "[". implode(', ', $iter) ."],";
		}
		
		$sOutput = substr_replace( $sOutput, "", -1 );
		$sOutput .= '] }';
	
    	return $sOutput;
	}
	
    /**
     * Analyse datatable and fill internal structure with fetching information.
     *  ! DEPRECATED !
     *
     * @access private
     * @param:  NULL
     * @return: NULL
     */
	function _analyseTable()
	{
		$_fields_data = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->field_data($this->table_name);
		
		foreach($_fields_data as $_data){
			array_push($this->fields, array(
												'name'=>$_data->name,
												'type'=>$_data->type,
												'length'=>$_data->max_length,
												'pk'=>$_data->primary_key
											));
											
			array_push($this->short_fields, $_data->name);
			
			if($_data->primary_key == 1){
				$this->pk = $_data->name;
			}
											
			$this->{$_data->name} = NULL;
		}
	}//end of function 
	
	
    /**
     * Insert JOIN logic 
     *
     * @access  public
     * @param:  $arr: Array with.
     * @return: NULL
     */
	function insertJoin($arr)
	{
		array_push($this->joined_data, $arr);		
	} // end of function 

    /**
     * Generate and return custom SELECT statement for current model.
     *
     * @access  public
     * @param:  NULL
     * @return: $ret string Generated SELECT statement
     */
	function getSelect($param=null)
	{
		$ret = 'SELECT ';
		
		$tmp_arr = array();
		$tmp_arr = array_merge($this->fields, $this->joined_data);
		
		foreach($param as $f)
		{
			foreach($tmp_arr as $r)
			{			
				if(strtolower($r['name']) == $f){
					if( 	isset($r['table'])){
						array_push($this->require_fields_array, $r['table'].'.'.$r['name'].' as '.strtolower($r['name']));
					} else {
						array_push($this->require_fields_array, $this->table_name.'.'.$r['name'].' as '.strtolower($r['name']));
					}
				}
			}
		}
		
		$ret .= implode(", ",  $this->require_fields_array);
		$ret .= ' FROM '.$this->table_name.' ';
		
		// Add JOIN if its needed
		if($this->joined_data){
		
			$_arr = array();
		
			foreach($this->joined_data as $i){
				array_push($_arr, $i['mode'].' JOIN '.$i['table'].' AS '.$i['table'].' ON '.$i['table'].'.'.$i['name'].' = '.$this->table_name.'.'.$i['column']);
			}
			$ret .= implode(" ",  $_arr);
			
		}
		
		return $ret;
	} // end of function 

    /**
     * Mapper from mysql_row to internal structure of view.
     *
     * @access private
     * @param:  $row: Mysql row structure.
     * @return: NULL
     */
	function _mapper($row)
	{
		foreach($row as $field_name => $field_value)
		{
			//SHIN_Core::log('debug', "[MAPPER] Assign to object ".$this->table_name." {$field_name} => '{$field_value}'");
			$this->$field_name = $field_value;
		}
	} // end of function 

	// PUBLIC FUNCTIONS //////////////////////////////////

    /**
     * Fetch object by ID.
     *
     * @access public
     * @param:  id
     * @return: true/false
     */
	function fetchByID($id, $primary_key_name = NULL)
	{
		$_ret = false;
		
		$PK = '';

		if(!$id){return $_ret;}
		
		// add logic for multiple PK 
		if(is_array($this->primary_key)){
			if($primary_key_name == NULL){
				$PK = $this->primary_key[0];
			} else {
				$PK = $this->primary_key[$primary_key_name];
			}
			
		} else {
			$PK = $this->primary_key;
		}
		
        $query = $this->get_expanded_result(array(
				"where"	=> $this->class_name.'.'.$PK.'='.$id,
    	    ));
			
		if ($query->num_rows() > 0)
		{		
			foreach ($query->result_array() as $row){
                $this->_mapper($row);
				$_ret = true;
			}
		}
		$query->free_result();
	    return $_ret;
	} // end of function 

	
    /**
     * Make expanded for some query 
     *
     * @access public
     * @param:  array $clauses -> where, limit, orderby, groupby and etc etc etc
     * @return: object SelectQuery.
     */
    function get_expanded_result($clauses = array(), $fields_to_select = NULL)
	{
        $query = $this->get_select_query($fields_to_select);
		//dump($query);
        $query->expand($clauses);
		
        $query_str = $query->str();
		return SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->query($query_str);
    }//end of function 
	
    /**
     * Is defined record.
     *
     * @access public
     * @param:  null
     * @return: true/false
     */
	function isDefinite()
	{
		$ret = false; 
		
    	if($this->{$this->primary_key} != NULL){
			$ret = true; 
		}
		
		return $ret;

	} // end of function
	

    /**
     * Fetch latest N records.
     *
     * @access public
     * @param:  N:integer
     * @return: Array with data.
     */
	public function getLastRec($count_records)
    {
    	$ret = array();
		
		$q = $this->get_expanded_result(array(
				"order_by"	=> $this->primary_key.' DESC',
				"limit"		=> $count_records,
    	    ));
			
		foreach ($q->result_array() as $row){
			array_push($ret, $row);
		}
		
		$q->free_result();
		
        return $ret;

    } // end of function
    
	function deleteRec($param)
	{   
		if(is_array($param))
		{
			$ret = false;
			foreach($param as $k=>$v){
				SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where($k, $v);
			}
			$ret = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->delete($this->class_name);		
			return $ret;
			
		} else {
			if(is_array($this->primary_key)){
				return SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->delete($this->class_name, array($this->primary_key[0] => $param)); 
			} else {
				return SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->delete($this->class_name, array($this->primary_key => $param)); 
			}
		}
	} // end of function
	
	function insertRec($data)
	{
		SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert($this->class_name, $data);
		return $this->db->insert_id();
	} // end of function

	function updateRec($data)
	{
               SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where($this->primary_key, $data[$this->primary_key]);
               unset($data[$this->primary_key]);
        return SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->update($this->class_name, $data);
        
    } // end of function
	
    /**
     * Return pointer for this class.
     *
     * @access public
     * @param NULL
     * @return pointer for this class.
     */
    public function get_instance($clonable=FALSE)
    {		
		$this->__reset();
		return $this;
    }//end of function 
	
	function __reset()
	{
		foreach($this->fields as $name=>$value)
		{
			$this->$name = '';
		}
	}
	
    /**
     * Create MySQL table for this model.
     *
     * @access public
     * @param NULL.
     * @return NULL.
     */
   function create_table($table_name = NULL)
   {
        if (!isset($table_name)) {
            $table_name = $this->table_name();
        }
		
		if($this->db_obj_type == DB_OBJ_TYPE_VIEW){
			$_ret = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->query($this->create_SQL);
		} else {
			
			reset($this->fields);
			$fields  = array();
			$pkField = null;
			
			$arr_tmp = array();

			foreach($this->fields as $name => $attr)
			{
				if(!$attr['virtual']) {
				
					if(isset($attr['values'])){
						foreach($attr['values'] as $k=>$v)
						{
							$key = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->escape($k);
							$arr_tmp[$key] = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->escape($v);
						}
					}
								
					$data    =   array('type'            =>  $attr['type'],
									   'constraint'      =>  isset($attr['width'])                                       ? $attr['width']   : '',
									   'unsigned'        =>  isset($attr['unsigned'])                                    ? true             : false,
									   'auto_increment'  =>  (isset($attr['attr']) && $attr['attr'] == 'auto_increment') ? true             : false,
									   'default'         =>  isset($attr['value'])                                       ? $attr['value']   : '',
									   'null'            =>  $attr['null']                                               ? true             : false,
									   'unique'          =>  $attr['unique']                                             ? true             : false,
									   'values'          =>  isset($arr_tmp)                                             ? $arr_tmp         : '',
									   'prec'            =>  isset($attr['prec'])                                        ? $attr['prec']    : ''
									  );
					
					$fields[$attr['column']] =   $data;
					$arr_tmp = array();
				}      
			}
			
			if(!is_null($this->primary_key)) {
			
				if(is_array($this->primary_key)){
					foreach($this->primary_key as $key){
						SHIN_Core::$_libs['db_forge']->add_key($key, true);
					}
					
				} else {
				
					SHIN_Core::$_libs['db_forge']->add_key($this->primary_key, true);
				}
			}
			
			if($this->table_indexes){
				foreach($this->table_indexes as $key){
					if(is_array($key)){
						SHIN_Core::$_libs['db_forge']->add_unique_key($key);
					} else {
						SHIN_Core::$_libs['db_forge']->add_key($key);
					}
				}
			}

			
			SHIN_Core::$_libs['db_forge']->add_field($fields);
			SHIN_Core::$_libs['db_forge']->create_table($table_name, true);
		}

		return;
    }// end of function


    /**
     *  Update MySQL table definition preserving existing data.
     *
     * @access public
     * @param NULL.
     * @return NULL.
     */
    function update_table()
	{		
        $table_name = $this->table_name();

		if($this->db_obj_type == DB_OBJ_TYPE_VIEW){return;}
		
        $old_fields = array();

        $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->query("SHOW COLUMNS FROM $table_name");
        foreach($query->result_array() as $row) {
            $name = $row['Field'];
            $old_fields[$name] = array(
                'name'    => $row['Field'],
                'type'    => $row['Type'],
                'null'    => $row['Null'],
                'key'     => $row['Key'],
                'default' => isset($row['Default']) ? $row['Default'] : NULL,
                'extra'   => $row['Extra'],
           );
        }
		
        $query_str = "ALTER TABLE $table_name ";

        $comma = '';
        $prev_column = '';
		
        foreach($this->fields as $name => $f) {
            if (!$f['create']) {
                continue;
            }
			
			if($f['virtual']){continue;}
			
            $column    = $f['column'];
            $type      = $f['type'];
            $attr      = $f['attr'];
            $reference = $f['reference'];
            $comment   = $f['comment'];
            $null      = $f['null'] ? 'null' : 'not null';

            $str = "$column $type";

            switch($type) {
            case 'enum':
                $str .=
                    " ('" .
                    implode("', '", array_keys($f['values'])) .
                    "')";
                break;
            case 'char':
            case 'varchar':
                $str .= " ($f[width])";
                break;
            case 'decimal':
            case 'double':
                $str .= " ($f[width],$f[prec])";
                break;
            }
			
			if(trim(strtolower($attr)) == 'key'){
				$str .= " $null $comment $reference";
			} else {
				$str .= " $null $attr $comment $reference";
			}
			
            $query_str .= $comma;
            $comma = ', ';			

            if (isset($old_fields[$column])) {
			
                $query_str .= "CHANGE COLUMN $name $str";

            } else {
                if ($prev_column == '') {
                    $query_str .= "ADD COLUMN $str FIRST";
                } else {
                    $query_str .= "ADD COLUMN $str AFTER $prev_column";
                }
            }

            $prev_column = $column;
        }

        foreach($old_fields as $name => $f) {
            if (!(
                isset($this->fields[$name]) &&
                $this->fields[$name]['create']
            )) {
                $query_str .= $comma;
                $comma = ', ';
                $query_str .= "DROP COLUMN $name";
            }
        }

        $ret = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->query($query_str);
		
		return $ret;		
    }// end of function 


    /**
     *  Delete MySQL table.
     *
     * @access public
     * @param NULL.
     * @return NULL.
     */
    function delete_table()
	{	
        SHIN_Core::$_libs['db_forge']->drop_table($this->table_name());    
    }// end of function 
	
	
    /**
     * Delete row from MySQL table. Return number of deleted rows.
     *
     * @access public
     * @param NULL.
     * @return NULL.
     */
    function del()
	{
        $table = $this->table_name();

        $query_str = "DELETE FROM $table WHERE " . $this->default_where_str(false);
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->query($query_str);
		
        return SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->affected_rows();
    }
	
	
    /**
     * Return default WHERE condition for fetching one object.
     *
     * @access public
     * @param NULL.
     * @return NULL.
     */
    function default_where_str($use_table_alias = true)
	{
        $pr_key_name  = $this->primary_key_name();
        $pr_key_value = $this->primary_key_value();

        if ($use_table_alias) {   
            return "{$this->class_name}.{$pr_key_name} = " . SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->escape($pr_key_value);

        } else {
            return "$pr_key_name = " . SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->escape($pr_key_value);
        }
    }
	
		
    /**
     *  Read given fields from CGI query in the one universal way.
     *
     * @access public
     * @param $fields_to_read array for how fields need prepare hash, if null - for all.
     * @return NULL, But filling internal structure.
     */
    function read_form($fields_to_read = NULL)
	{
        $field_names = isset($fields_to_read) ?
        $fields_to_read : array_keys($this->fields);

        reset($field_names);
		

        while (list($i, $name) = each($field_names)) {
            $f = $this->fields[$name];

            if (!$f['read']) {
                continue;
            }

            $type  = $f['type'];
            $pname = $this->class_name . '_' . $name;
            $param_value = SHIN_Core::$_input->globalarr($pname);

            switch($type) {
            case 'text':
				$value = $param_value;
                break;
            case 'integer':
                $value = is_numeric($param_value) ? intval($param_value) : $param_value;
                break;
            case 'enum':
                $value = $param_value;
                if (!isset($f['values'][$value])) {
                    $value = 1;
                }
                break;
            case 'double':
                $value = $this->_get_php_double_value($param_value);
                break;
            case 'datetime':
			
				$date_regexp_full = '/^(\d\d\d\d)-(\d\d)-(\d\d) (\d\d):(\d\d):(\d\d)$/';
				$date_regexp_short = '/^(\d\d\d\d)-(\d\d)-(\d\d) (\d\d):(\d\d)$/';
				preg_match($date_regexp_full, $param_value, $datetime_values);
				if($datetime_values){
					$year   = $datetime_values[1];
					$month  = $datetime_values[2];
					$day    = $datetime_values[3];
					$hour   = $datetime_values[4];
					$minute = $datetime_values[5];
					$second = $datetime_values[6];
					$param_value = sprintf("%04d-%02d-%02d %02d:%02d:%02d", $year, $month, $day, $hour, $minute, $second);
				} else {
					// maybe w/o seconds form datetime picker component.
					preg_match($date_regexp_short, $param_value, $datetime_values);
					if($datetime_values){
						$year   = $datetime_values[1];
						$month  = $datetime_values[2];
						$day    = $datetime_values[3];
						$hour   = $datetime_values[4];
						$minute = $datetime_values[5];
						$param_value = sprintf("%04d-%02d-%02d %02d:%02d:%02d", $year, $month, $day, $hour, $minute, 0);
					} else {
						// set in to now
						$param_value = now();
					}
				}
                $value = $param_value;
                break;
                
            case 'date':
                    $value = fromDisplayToDb($param_value);
                break;

            default:
                $value = isset($param_value) ? $param_value : '';
            }

            $this->$name = $value;
        }		
    }

    /**
     *  Return an array with 
     *  for future use in a form template. Can extend OR override in children 
     *
     * @access public
     * @param $fields_to_write array for how fields need prepare hash, if null - for all.
     * @return $h hash.
     */
    function validate_form($fields_to_validate = NULL)
	{
        $date_field_names = array();
        $date_counter = 1;

        $h = array();
        
        $field_names = isset($fields_to_validate) ?
            $fields_to_validate : array_keys($this->fields);

        reset($field_names);
        while (list($i, $name) = each($field_names))
		{
            $f = $this->fields[$name];
            if (!$f['validate']) {
                continue;
            }
			
            $value = isset($this->$name) ? $this->$name : '' ;
			$function_name = $f['validate'];
			
//			if (function_exists($function_name))
			//  Now order follow: first i`l check in current class , if not exist i check in global scope.
			if(!method_exists($this, $function_name))
			{
				$res_of_validateion = $function_name($value);
			} else {
				$res_of_validateion = $this->{$function_name}($value);
            }
			
			if($res_of_validateion['result'] === false)
			{			
				SHIN_Core::$_language->load('validation');
			
				$pname = $this->class_name . '_' . $name;
				
				// new logic 
				$h[$pname] = ucfirst($name).' '.SHIN_Core::$_language->line($res_of_validateion['value']);
			}
		}
		
		return $h;
	}
	
    /**
     *  Add if it`s needed (see parameter $config['input']['default_form_input_mandatory_processed'] in to $config file)
     *  if True function take ready _input and add '&nbsp;'+ tooltip with help for current field
     *
     * @access private
     * @param $input_txt string with ready HTML input
     * @param $field_name string with field name with follow structure tablename_fieldname_fieldname
     * @param $f hash with needed params for this field
     * @return $ret string with ready HTML input + addons for tooltip
     */
	public function _addMandatoryAddons($input_txt, $field_name, $f, $mode_writing)
	{		
		//dump(SHIN_Core::$_config['input']['default_form_input_info_processed']);
	
		if(!SHIN_Core::$_config['input']['default_form_input_info_processed']){ return $input_txt; }
		if(!isset(SHIN_Core::$_libs['tooltip'])){ return $input_txt; }
				
		$translated_tooltip	= '';
		$ico_src_path		= '';
		// Суки, народу жрать нечего, а они картины маслом рисуют!
				
		// TODO Thinking about input who is have some images on the right
		if($f['type'] == 'date' || $f['type'] == 'datetime' || $f['type'] == 'time'){
//			dump($input_txt);
			return $input_txt;
		}		
		
		// 1. take lang label , if not exist take lng label by default.
		if(isset($f['info_field_txt'])){
			
			if($f['info_field_txt'] == FALSE) {return $input_txt; }
			$translated_tooltip = SHIN_Core::$_language->line($f['info_field_txt']);
			
		} else {
			
			$translated_tooltip = SHIN_Core::$_language->line('info_txt_default_value');
		}
		if($translated_tooltip == '' && isset($f['info_field_txt'])) $translated_tooltip = $f['info_field_txt'];
		
		// 2 Image
		if(isset($f['info_field_ico'])){
			if($f['info_field_ico'] == FALSE) {return $input_txt; }
			$ico_src_path = $f['info_field_ico'];
		} else {
			$ico_src_path = SHIN_Core::$_config['input']['default_form_input_info_ico'];
		}
				
		$ico_src_path = SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_runned_application.'/'.$ico_src_path;
		
		// 3. make DOM ID
		$dom_id = $field_name.'_tt';
		
		$ret = $input_txt.'&nbsp;'.'<img src="'.$ico_src_path.'" id="'.$dom_id.'" />';
		
		SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['tooltip']->add_tooltip($dom_id, $translated_tooltip));
				
		if($mode_writing == WRITE_EXTENDED){
			// need make addional initialization part for js
			SHIN_Core::$_libs['templater']->assign($key, SHIN_Core::$_libs['tooltip']->render($val));
		}
		
		return $ret;
	}
	
	
    /**
     * Add Masked logic for any fields.
     * @access private
     * @param $dom_id string with field name with follow structure tablename_fieldname_fieldname
     * @param $f hash with needed params for this field
     */
	function _insertMaskedLogic($dom_id, $f)
	{
		if(isset(SHIN_Core::$_libs['masked_input'])){
			if(isset($f['input_mask']))
			{
				SHIN_Core::$_libs['masked_input']->init(array('mask' => '\''.$f['input_mask'].'\''));
				SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['masked_input']->render($dom_id));
			}		
		}
	}
	
    /**
     *  Return an array with given fields stored in it
     *  for future use in a form template. Can extend OR override in children 
     *
     * @access public
     * @param $fields_to_write array for how fields need prepare hash, if null - for all.
     * @return $h hash.
     */
    function write_form($fields_to_write = NULL, $mode_writing=WRITE_NORMAL)
	{
        $date_field_names = array();
        $date_counter = 1;

        $h = array();

        $field_names = isset($fields_to_write) ?
            $fields_to_write : array_keys($this->fields);
			
        reset($field_names);
        while (list($i, $name) = each($field_names))
		{
            $f = $this->fields[$name];
            if (!$f['write']) {
                continue;
            }
			
            $type = $f['type'];
			
            if ( isset($f['dom_width'])) {
            	$input_extra = $f['dom_width'];
            } else {
            	$input_extra = SHIN_Core::$_config['input']['default_form_input_extra'];
            }
			
			// MAXLENGTH logic 
			$maxlength_addons = 10;
			
            $value = isset($this->$name) ? $this->$name : '' ;
            $pname = $this->class_name . '_' . $name;
            $value = htmlspecialchars($value);
            $h[$pname] = $value;
						
			$tmp_data = array(
								'name'        => $pname,
								'id'          => $pname,
								'value'       => $value,
								'maxlength'	  => $maxlength_addons,
								'style'       => $input_extra,
							  );
			
			
            $h[$pname . '_input']	= $this->_addMandatoryAddons(form_input($tmp_data), $pname, $f, $mode_writing);
            $h[$pname . '_hidden']	= form_hidden($pname, $value);
			$tmp_data['disabled']	=  '"disabled"';
			$h[$pname . '_ro']		= form_input($tmp_data);
			
			// addons logic for several values //////////////////////////			
			if (isset($f['values'])) {
				foreach($f['values'] as $k=>$v){
					$__t = SHIN_Core::$_language->line($v);
					if($__t){
						$f['values'][$k] = SHIN_Core::$_language->line($v);
					} else {
						$f['values'][$k] = $v;
					}
				}
				$h[$pname . '_input'] = $this->_addMandatoryAddons(form_dropdown($pname, $f['values'], $value, 'id="'.$pname.'"'), $pname, $f, $mode_writing);
			}			
			/////////////////////////////////////////////////////////////
			
			if(is_array($this->primary_key)){
				if(in_array($f['column'], $this->primary_key)){
					$h[$pname . '_old'] = form_hidden($pname.'_old', $value);
				}
			}
			$this->_insertMaskedLogic($pname, $f);
				
	        switch($type) {
            case 'datetime':
						
					if(!isset(SHIN_Core::$_libs['datetimepicker'])){
						$nedded_libs = array('libs' => array('SHIN_DateTimepicker'));
						SHIN_Core::postInit($nedded_libs);						
					}
                	$h[$pname . '_raw'] = $value;
                	$h[$pname . '_html'] = htmlspecialchars($value);
					
               		$input = $f['input'];

					$options        = array();
					$dtPicker		= SHIN_Core::$_libs['datetimepicker']->get_instance();
					
					$tmp_data = array(
										'name'        => $pname,
										'id'          => $pname,
										'value'       => fromDbToDisplay($value),
										'maxlength'	  => $maxlength_addons,
										'style'       => $input_extra,
									);
			
//					dump($this->_addMandatoryAddons(form_input($tmp_data), $pname, $f, $mode_writing));
					$h[$pname . '_input'] = $this->_addMandatoryAddons(form_input($tmp_data), $pname, $f, $mode_writing);
					$h[$pname . '_hidden'] = form_hidden($pname, $value);
					SHIN_Core::$_jsmanager->addComponent($dtPicker->render($pname));					
            	break;

            case 'date':
					$maxlength_addons = 8;
					// load if needed libs 
					if(!isset(SHIN_Core::$_libs['datepicker'])){
						$nedded_libs = array('libs' => array('SHIN_Datepicker'));
						SHIN_Core::postInit($nedded_libs);						
					}
					
                	$h[$pname . '_raw'] = $value;
                	$h[$pname . '_html'] = htmlspecialchars($value);
					
               		$input = $f['input'];

					$options        = array();
					$datePicker		= SHIN_Core::$_libs['datepicker']->get_instance();
    
					$datePicker->setIconTrigger('both', true);
					$datePicker->showWeek(true, 3);
					$datePicker->showButtonPanel(true);
					$datePicker->showYearAndMonthDD(true, true);
    
					$datePicker->init($options);
					$tmp_data = array(
										'name'        => $pname,
										'id'          => $pname,
										'value'       => fromDbToDisplay($value),
										'maxlength'	  => $maxlength_addons,
										'style'       => $input_extra,
									);
			
					$h[$pname . '_input'] = $this->_addMandatoryAddons(form_input($tmp_data), $pname, $f, $mode_writing);
					$h[$pname . '_hidden'] = form_hidden($pname, $value);
					SHIN_Core::$_jsmanager->addComponent($datePicker->render($pname));			
            	break;
				
            case 'time':
					if(!isset(SHIN_Core::$_libs['timepicker'])){
						$nedded_libs = array('libs' => array('SHIN_Timepicker'));
						SHIN_Core::postInit($nedded_libs);						
					}
					
                	$h[$pname . '_raw'] = $value;
                	$h[$pname . '_html'] = htmlspecialchars($value);
					
               		$input = $f['input'];
										
					$options        = array();
					$timePicker		= SHIN_Core::$_libs['timepicker']->get_instance();
					$tmp_data = array(
										'name'        => $pname,
										'id'          => $pname,
										'value'       => $value,
										'maxlength'	  => $maxlength_addons,
										'style'       => $input_extra,
									);
					
					$h[$pname . '_input']	= $this->_addMandatoryAddons(form_input($tmp_data), $pname, $f, $mode_writing);
					SHIN_Core::$_jsmanager->addComponent($timePicker->render($pname));					
            	break;
				// TODO  now this case not needed. But for smth i stay this src in to code
				/*
            case 'enum1':
                if (isset($f['values'][$value])) {
                    $h[$pname . '_name'] = $f['values'][$value];
                }
				foreach($f['values'] as $k=>$v){
					$f['values'][$k] = SHIN_Core::$_language->line($v);
				}
				$h[$pname . '_input'] = $this->_addMandatoryAddons(form_dropdown($pname, $f['values'], $value, 'id="'.$pname.'"'), $pname, $f, $mode_writing);
				
                break;
				*/
            case 'double':
                $h[$pname] = $this->_format_double_value($value, 2);
                $orig_value = $this->_format_double_value($value, $f["prec"]);
                $h[$pname . "_orig"] = $orig_value;
                $h[$pname . "_long"] = $this->_format_double_value($value, 5);
				
				$tmp_data = array(
									'name'        => $pname,
									'id'          => $pname,
									'value'       => $orig_value,
									'maxlength'	  => $maxlength_addons,
									'style'       => $input_extra,
								);
			
				$h[$pname . '_input'] = $this->_addMandatoryAddons(form_input($tmp_data), $pname, $f, $mode_writing);
				$h[$pname . '_hidden'] = form_hidden($pname, $orig_value);
				
                break;

            case "char":
            case "varchar":
                if (isset($f['values'])) {
					$h[$pname . '_input'] = $this->_addMandatoryAddons(form_dropdown($pname, $f['values'], $value, 'id="'.$pname.'"'), $pname, $f, $mode_writing);
                } else {
					// WARNING 
					// If field type PASSWORD i must make $value for output to browser == ZERO. 
					if(isset($f['password'])){
						$function_name = 'form_password';
						$value = '';
					} else {
						$function_name = 'form_input';
					}
					
					
					if (isset($f['input']) && is_array($f['input'])) {
						$this->_generateInputView($f, $h, $input_extra, $mode_writing);
					} else {
							
						$tmp_data = array(
									'name'        => $pname,
									'id'          => $pname,
									'value'       => $value,
									'maxlength'	  => $f['width'],
									'style'       => $input_extra,
							  );
							  			
						$h[$pname . '_input'] = $this->_addMandatoryAddons($function_name($tmp_data), $pname, $f, $mode_writing);
						$h[$pname . '_hidden'] = form_hidden($pname, $value);
					}
					
				}
				
                break;
				
            case 'text':
            case 'mediumtext':
            case 'tinytext':

            	if($f['input']['type'] == 'tinymce'){
				
					// load if needed libs 
					if(!isset(SHIN_Core::$_libs['text_editor'])){
						$nedded_libs = array('libs' => array('SHIN_Text_Editor'));
						SHIN_Core::postInit($nedded_libs);						
					}
					
                	$h[$pname . '_raw'] = $value;
					$html = htmlspecialchars($value);
                	$html = preg_replace('/\r/', ''    , $html);
                	$html = preg_replace('/\n/', '<br>', $html);
                	$h[$pname . '_html'] = $html;
					
               		$input = $f['input'];
					$options = array();
					$options['advanced']['elements'] = $f['table'].'_'.$f['name'];
					
					// if language exist we can use languages preset.
					if(SHIN_Core::$_current_lang){
						$options['advanced']['language'] = SHIN_Core::$_current_lang;
					}
														
					// add new params //////////////////////
					if(isset($f['input']['rows'])){
						$tmp_data['rows'] = $f['input']['rows'];
					}
					
					if(isset($f['input']['cols'])){
						$tmp_data['cols'] = $f['input']['cols'];
					}
					////////////////////////////////////////
					
					SHIN_Core::$_libs['text_editor']->init($options);
					$h[$pname . '_input'] = $this->_addMandatoryAddons(form_textarea($tmp_data), $pname, $f, $mode_writing);
    
					SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['text_editor']->render('advanced-text-editor'));
				
            	} else {
	                $cols = 60;
	                $rows = 5;
	                //dump($f);
	                //dump($f['input']['maxlenth']);
					$maxlength_addons = $f['input']['maxlenth'];
	                if (isset($f['input']) && is_array($f['input'])) {
	                    $input = $f['input'];
	                    $cols  = isset($input['cols']) ? $input['cols'] : $cols;
	                    $rows  = isset($input['rows']) ? $input['rows'] : $rows;
	                }

					$tmp_data = array(
									'name'        => $pname,
									'id'          => $pname,
									'value'       => $value,
									'style'       => $input_extra,
									'maxlength'	  => $maxlength_addons,
									'rows'        => $rows,
									'cols'        => $cols,
									);
			
					$h[$pname . '_input'] = $this->_addMandatoryAddons(form_textarea($tmp_data), $pname, $f, $mode_writing);
               	}

                break;
				
            case 'tinyint':
            case 'integer':
			
                if (isset($f['input'])) {
                    if (is_array($f['input'])) {
                        $input = $f['input'];
                        switch($input['type']) {
                        case 'select':
						
                            if ($this->fields[$name]['type'] == 'enum') {
                                $items = $this->fields[$name]['values'];

                            } else if (isset($input['values'])) {
                                $items = $input['values'];

                            } else if (isset($input['items_callback'])) {
                                $items = $this->$input['items_callback']();
                            } else {
							
								// TODO Need think about this
                                $from     = $input['from'];
                                $data     = $input['data'];
                                $caption  = $input['caption'];
                                $query_ex = isset($input['query_ex']) ? $input['query_ex'] : array();
	
									if(!isset(SHIN_Core::$_models[$from.'_model']))
									{
										$nedded_libs = array('models' => array(array($from.'_model', $from.'_model')));
										SHIN_Core::postInit($nedded_libs);
									}
                                $items = SHIN_Core::$_models[$from.'_model']->get_items($data, $caption, $query_ex);
                            }

                            if (
                                isset($input['nonset_id']) &&
                                isset($input['nonset_name'])
                            ) {
                                $items = array_merge(
                                    array(array(
                                        'id' => $input['nonset_id'],
                                        'name' => $input['nonset_name']
                                    )), $items);
                            }
							
							// WHILE !
                            $options = $this->_make_options($items, $value);

                            $h[$pname . '_input'] = $this->_addMandatoryAddons("<select id=\"$pname\" name=\"$pname\" $input_extra>$options</select>", $pname, $f, $mode_writing);
                            
							break;

                        default:
								$tmp_data = array('name'=> $pname, 'id'=> $pname,'value'=> $value, 'style'=> $input_extra);
								$h[$pname . '_input'] = $this->_addMandatoryAddons(form_input($tmp_data), $pname, $f, $mode_writing);
                        }

                    } else {  // COMPATIBILITY

                        switch($f['input']) {
                        case 'checkbox':
                            $input_text = $value ? 'checked' : '';
							
							$tmp_data = array('name'=> $pname, 'id'=> $pname,'value'=> $value, 'checked'=>$input_text, 'style'=> $input_extra);
							$h[$pname . '_input'] = $this->_addMandatoryAddons(form_checkbox($tmp_data), $pname, $f, $mode_writing);
                            break;

                        case 'select':
							
                            if (isset($f['join'])) {  // COMPATIBILITY
								$h[$pname . '_input'] = $this->_addMandatoryAddons(form_dropdown($pname, $name, $f['join']['table'], 'id="'.$pname.'"'), $pname, $f, $mode_writing);

                            } else if (isset($f['link'])) {  // COMPATIBILITY
								$h[$pname . '_input'] = $this->_addMandatoryAddons(form_dropdown($pname, $name, $f['link'], 'id="'.$pname.'"'), $pname, $f, $mode_writing);
                            }							
                            break;
                        }
                    }
                }
                break;				
				
			}// switch
		}

        return $h;

	}// end of function 

    /**
     * Return a string with a <option> tags created from given array.
     *
     * @access private
     * @param:  $items: Array with possible values.
     * @param:  $select: String Selected value.
     * @return NULL.
     */
	private function _generateInputView(&$f, &$h, $input_extra, $mode_writing)
	{
		$name = $f['column'];
        $value = isset($this->$name) ? $this->$name : '' ;
        $pname = $this->class_name . '_' . $name;
        $value = htmlspecialchars($value);
	
		switch($f['input']['type']) {
			case 'checkbox':
				$input_text = $value ? 'checked' : '';
							
				$tmp_data = array('name'=> $pname, 'id'=> $pname,'value'=> $value, 'checked'=>$input_text, 'style'=> $input_extra);
				$h[$pname . '_input'] = $this->_addMandatoryAddons(form_checkbox($tmp_data), $pname, $f, $mode_writing);
			break;

			case 'select':
				//dump($f);
				
				$from     = $f['input']['from'];
				$data     = $f['input']['data'];
				$caption  = $f['input']['caption'];
				$query_ex = isset($f['input']['query_ex']) ? $f['input']['query_ex'] : array();
	
				if(!isset(SHIN_Core::$_models[$from.'_model']))
				{
					$nedded_libs = array('models' => array(array($from.'_model', $from.'_model')));
					SHIN_Core::postInit($nedded_libs);
				}
				
				$items = SHIN_Core::$_models[$from.'_model']->get_items($data, $caption, $query_ex);

				if (isset($f['input']['nonset_id']) && isset($f['input']['nonset_name']))
				{
					$items = array_merge(
					array(array(
									'id' => $f['input']['nonset_id'],
                                    'name' => $f['input']['nonset_name']
                                 )), $items);
				}
							
				$options = $this->_make_options($items, $value);
				$h[$pname . '_input'] = $this->_addMandatoryAddons("<select id=\"$pname\" name=\"$pname\" $input_extra>$options</select>", $pname, $f, $mode_writing);
			break;
			
			default:
				$tmp_data = array('name'=> $pname, 'id'=> $pname,'value'=> $value, 'style'=> $input_extra);
				$h[$pname . '_input'] = $this->_addMandatoryAddons(form_input($tmp_data), $pname, $f, $mode_writing);
		}
		
		return;
	}
	
	
    /**
     * Return a string with a <option> tags created from given array.
     *
     * @access private
     * @param:  $items: Array with possible values.
     * @param:  $select: String Selected value.
     * @return NULL.
     */
	function _make_options($items, $select = NULL)
	{
		$s = "\n";

		foreach($items as $i => $item) {
			if (is_array( $item) ) {
				$id   = $item['id'];
				$name = $item['name'];

			} else {
				// compatibility mode:
				$id   = $i;
				$name = $item;
			}
			if (is_array( $select) ) {
				$sel = in_array($id, $select) ? ' selected' : '';
			} else {
				$sel = (isset($select) && $id == $select) ? ' selected' : '';
			}
			
			// add langs logic
			if(isset(SHIN_Core::$_language)){
				
				$__tmp = SHIN_Core::$_language->line($name);
				if($__tmp){
					$name = $__tmp;
				}
			}
			
			$s .= "<option value=\"$id\"$sel>$name</option>\n";
		}

		return $s;
	}

    /**
     * Return HTML code with series of <option> tags, fetched from given table, using fields 'id' and 'name'.
     *
     * @access private
     * @param:  $field_name: string with field name for make list .
     * @param:  $order_by: string with order by value, default -> primary key ASC
     * @return NULL.
     */
    function get_options($field_name, $order_by=NULL)
	{
        $h = array();
		
		if(!$order_by){
			$order_by = $this->primary_key.' ASC';
		}

        $query = $this->get_select_query();

        $query->expand(array(
            'order_by' => $order_by,
        ));

        $res = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->query($query_str);

        $h = array();
        while($row = $res->result_array()) {
            $obj->fetch_row($row);
            $h[$obj->id] = $obj->name;
        }

        $value = isset($this->$field_name) ? $this->$field_name : 0;

        return $this->_make_options($h, $value);
    }
	
    /**
     * Return array created from two columns fetched from table.
     *
     * @access private
     * @param:  $field_name: string with field name for make list .
     * @param:  $order_by: string with order by value, default -> primary key ASC
     * @return NULL.
     */
    function get_items($field_id, $field_name, $q = array())
	{
        $fields = array($field_id, $field_name);

        $query = $this->get_select_query($fields);
        $query->expand($q);

        $query_str = $query->str();
        $res = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->query($query_str);
		
        $h = array();
		foreach ($res->result_array() as $row)
		{
            $id   = isset($row[$field_id])   ? $row[$field_id]   : '';
            $name = isset($row[$field_name]) ? $row[$field_name] : '';
            $h[] = array(
                'id'   => $id,
                'name' => $name,
           );
		}		

        return $h;
    }
	
	
    /**
     * Universal method for insert/update any record in any model
     *
     * @access public
     * @param:  $data: array with needed inserted or updated data
     * @return BOOL. true if updated, false if inserted
     */
    function save($fields_to_processed = NULL)
	{
		$ret = FALSE;
		
        $is_definite = $this->isDefinite();		
        if ($is_definite) {
            $ret = $this->update($fields_to_processed);
        } else {
            $ret = $this->store($fields_to_processed);
        }

        return $ret;
    }
	
	
    /**
     * Retun value of the PRIMARY KEY member variable.
     *
     * @access public
     * @return int. Value for primary key
     */
    function primary_key_value()
	{
        $pr_key_name = $this->primary_key_name();
		if(is_array($pr_key_name)){
			$_ret = array();
			foreach($pr_key_name as $pk){
				array_push($_ret, $this->$pk);
			}
			return $_ret;
		} else {
			return $this->$pr_key_name;
		}
    }
	
    /**
     * Store data to MySQL database.
     *
     * @access public
     * @param:  $fields_to_store: array with what field need store.
     * @return NULL.
     */
    function store($fields_to_store = NULL)
	{
		$ret = FALSE;
        $field_names = isset($fields_to_store) ? $fields_to_store : array_keys($this->fields);
		$v_insert_sight = FALSE;
		
        $table = $this->table_name();
        $str = "INSERT INTO $table SET";
		$v_str = "INSERT INTO  ";
        $comma = "\n";
		$virtual_model_name = '';

        reset($field_names);
        while (list($i, $name) = each($field_names))
		{
            $f = $this->fields[$name];

            if (!$f['store']) {
                continue;
            }
			
            $type   = $f['type'];
            $column = $f['column'];
            $null   = $f['null'];
            $value = $this->$name;  

            if ( !isset($this->$name) && $null ) continue;
			
            if ($f['virtual']) {
				
				if(!$$v_insert_sight){
					$comma = "\n";
					$virtual_model_name = $f['table'];
					$v_str .= $virtual_model_name.' SET ';
				}
				$$v_insert_sight = TRUE;
				$v_str .= $comma;	
				$comma = ",\n";
				$v_str .= "$column=";
				$v_str .= SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->escape($value);
				continue;
			}

            $str .= $comma;
            $comma = ",\n";

            $str .= "$column=";

            if (isset($this->$name))
			{

                switch($type) {
                case 'date':
                case 'time':
                case 'datetime':
                case 'varchar':
                case 'char':
                case 'text':
                case 'mediumtext':
                    $str .= SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->escape($value);
                    break;
					
                case 'blob':
                case 'enum':
                    $str .= SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->escape($value);
                    break;
					
                default:
                    $str .= SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->escape($value);
					
                }
            }
        }        
		
		// begin transaction ///////////////////////////////////////////////////
	//	SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->trans_begin();
		
//		$__parent_record_id = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert_id();
		
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->query($str);

/*		
		if (SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->trans_status() === FALSE)
		{
			SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->trans_rollback();
			$ret = FALSE;
		} else {
			SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->trans_commit();
			$ret = TRUE;
		}
*/		

	$ret = TRUE;
		
		return $ret;
    }
	
    /**
     * This function are using in function delCascading()
     * Must be redefined for classes, where need cascading deleted object.
	 
     * @access public
     * @param:  NULL
     * @return  hash: table => field.
     */
    public function getLinks(){
        return array();
    }
	
    /**
     * Cascading delete objects.
     * Using PRIMARY KEY current object ( $this->primary_key_value() ) and returned array get_links()
     * WARNING !!!!  All requested models must be loaded BEFORE call this method !!!!   
     * @access public
     * @param:  $fields_to_update: array with what field need updated.
     * @return NULL.
     */
    public function delCascading($pkID=NULL)
	{
		static $count_del_records = 0;
	
        $links = $this->getLinks();
		
		if($pkID){$this->fetchByID($pkID);}
		
        foreach($links as $model_name => $field) {
		
			if(!isset(SHIN_Core::$_models[$model_name]))
			{
				SHIN_Core::show_error('<b>delCascading can`t work!</b> Check pls "model" section in requested components. All needed models must be loaded BEFORE call this method!<br/><br/> Requested model: <b>'.$model_name.'</b>');
			}
			
            $obj_links = SHIN_Core::$_models[$model_name]->getLinks();

			SHIN_Core::log('debug', "DelCascading try delete in {$model_name} where {$field}=".$this->primary_key_value());

            if (count($obj_links) == 0 ) {
				SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->delete($model_name, array($field => $this->primary_key_value()));
				$count_del_records += SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->affected_rows();
            } else {

                $del_query = $model_name->get_select_query();
                $del_query->expand(array(
                    'where' => "{$table}.{$field} = {$this->primary_key_name()}",
                ));
                $res = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->query($del_query);
                while($row = $res->fetch())
				{
                    //$model_name->fetch_row($row);
                    $model_name->delCascading();
                }
            }
        }

		SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->delete($this->class_name, array($field => $this->primary_key_value()));
		$count_del_records += SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->affected_rows();
		
        return $count_del_records;
    }
		
    /**
     * Update data in MySQL database.
     *
     * @access public
     * @param:  $fields_to_update: array with what field need updated.
     * @return NULL.
     */
    function update($fields_to_update = NULL)
	{
		$ret = FALSE;
        $field_names = isset($fields_to_update) ? $fields_to_update : array_keys($this->fields);
		
        $table = $this->table_name();
        $str = "UPDATE $table SET";		
		$v_str = "UPDATE ";
		$v_update_sight = FALSE;
		
        $comma = "\n";
		$virtual_model_name = '';

        reset($field_names);

        $fields = slice_by_keys($this->fields, $field_names);
        
        foreach ( $fields as $name => $f ) {
			
            if (!$f['update']) {continue;}

            $type   = $f['type'];
            $column = $f['column'];
            $value  = $this->$name;

            if ( empty($value) && $f['null'] && in_array($name, $this->foreign_keys) ) $value = null;
			
            if ($f['virtual']) {
				
				if(!$v_update_sight){
					$comma = "\n";
					$virtual_model_name = $f['table'];
					$v_str .= $virtual_model_name.' SET ';
				}
				$v_update_sight = TRUE;
				$v_str .= $comma;	
				$comma = ",\n";
				$v_str .= "$column=";
				$v_str .= SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->escape($value);
				continue;
			}
			
            $str .= $comma;
            $comma = ",\n";

            $str .= "$column=";

            switch($type) {
            case 'date':
            case 'datetime':
            case 'time':
            case 'varchar':
            case 'char':
            case 'text':
            case 'mediumtext':
            case 'blob':
            case 'enum':
                $str .= SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->escape($value);
                break;
            default:
                $str .= SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->escape($value);
            }
        }

		// begin transaction ///////////////////////////////////////////////////
		SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->trans_begin();
		
		// 1. update parent record
		if($v_update_sight){
			$v_str .= " WHERE " . SHIN_Core::$_models[$virtual_model_name.'_model']->primary_key.' = '.SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->escape($this->{$this->primary_key});
			$ret = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->query($v_str);
		}
				
		// 2. update record
		$str .= " WHERE " . $this->default_where_str(false);
		$ret = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->query($str);
		
		if (SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->trans_status() === FALSE)
		{
			SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->trans_rollback();
			$ret = FALSE;
		} else {
			SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->trans_commit();
			$ret = TRUE;
		}
				
        return $ret;
    }
	
    /**
     * Formatting any integer/double/float values.
     *
     * @access private
     * @param:  $field_name: string with field name for make list .
     * @param:  $order_by: string with order by value, default -> primary key ASC
     * @return NULL.
     */
	function _format_double_value($double_value, $decimals = 2, $dec_point = ",", $thousands_sep = ".") {
		return number_format($double_value, $decimals, $dec_point, $thousands_sep);
	}	
	
    /**
     * Formatting any integer/double/float values.
     *
     * @access private
     * @param:  $str: string with value.
     * @return real double value.
     */
    function _get_php_double_value($str) {
        $result = str_replace('.', '', $str);
        $result = str_replace(',', '.', $result);
        return doubleval($result);
    }
	
    /**
     * Make once alias for 
     *
     * @access private
     * @param:  $field_name: string with field name for make list .
     * @return array with checked statement.
     */
    function _check_statement($fields_to_read = NULL) {

        $where = '1';
        $params = array();

        $field_names = isset($fields_to_read) ?
            $fields_to_read : array_keys($this->fields);

        reset($field_names);
        while (list($i, $name) = each($field_names)) {
            $f = $this->fields[$name];

            $type  = $f['type'];
            $pname = $this->class_name . '_' . $name;

            switch($type) {
            case 'datetime':
            case 'date':
                $less = param("{$pname}_less");
                if ($less) {
                    $where .= " and $f[select] <= ". qw($less);
                    $params["{$pname}_less"] = $less;
                }
                $greater = param("{$pname}_greater");
                if ($greater) {
                    $where .= " and $f[select] >= " . qw($greater);
                    $params["{$pname}_greater"] = $greater;
                }
                break;

            case 'integer':
                $less = param("{$pname}_less");
                if ($less) {
                    $where .= " and $f[select] <= " . intval($less);
                    $params["{$pname}_less"] = $less;
                }

                $greater = param("{$pname}_greater");
                if ($greater) {
                    $where .= " and $f[select] >= " . intval($greater);
                    $params["{$pname}_greater"] = $greater;
                }

                $equal = param("{$pname}_equal");
                if ($equal) {
                    $where .= " and $f[select] = " . intval($equal);
                    $where .= " and $f[select] = " . intval($equal);
                    $params["{$pname}_equal"] = $equal;
                }

                break;

            case 'double':
                $less = param("{$pname}_less");
                if ($less) {
                    $where .= " and $f[select] <= " . doubleval($less);
                    $params["{$pname}_less"] = $less;
                }

                $greater = param("{$pname}_greater");
                if ($greater) {
                    $where .= " and $f[select] >= " . doubleval($greater);
                    $params["{$pname}_greater"] = $greater;
                }

                $equal = param("{$pname}_equal");
                if ($equal) {
                    $where .= " and $f[select] = " . doubleval($equal);
                    $params["{$pname}_equal"] = $equal;
                }

                break;

            case 'varchar':
            case 'enum':

                $like = param("{$pname}_like");
                if ($like != '') {
                    $where .= " and $f[select] like " . qw("%$like%");
                    $params["{$pname}_like"] = $like;
                }

                // NB! no 'break' here.

                $equal = param("{$pname}_equal");
                if ($equal != '') {
                    $where .= " and $f[select] = " . qw($equal);
                    $params["{$pname}_equal"] = $equal;
                }

                break;
            //default: ???????????????????/
            }
        }

        return array($where, $params);
    }

	// While tools for checks
    function _check_statement_cool($conditions_to_read = NULL) {

        $condition_names = isset($conditions_to_read) ?
            $conditions_to_read : array_keys($this->where_conditions);

        $filter_by  = param('filter_by');
        $filter     = param('filter');

        foreach($this->where_conditions as $name => $field_conditions) {
            if (in_array($name, $condition_names)) {
                foreach($field_conditions as $relation => $cond) {
                    $pname = "{$this->class_name}_{$name}_{$relation}";
                    $value = param($pname);
                    if (!is_null($value)) {
                        $this->where_conditions[$name][$relation]['value'] = $value;
                    } elseif ( isset($filter_by) && isset($filter) ) {
                    	if ( $filter_by == $pname && trim($filter) != '' ) {
                    		$this->where_conditions[$name][$relation]['value'] = $filter;
                    	}
                    }
                }
            }
        }
    }
	
    /**
     * Generate random test data for any model
     *
     * @access public
     * @return int.
     */
    function gen_test_data($request_records)
	{
		return ;
		$ret = true;
		
		foreach($this->fields as $field_name => $field_data)
		{
            switch($type) {
			
            case 'datetime':
            case 'date':
                break;

            case 'integer':
            case 'int':
            case 'tyninteger':
                break;

            case 'double':
                break;
				
            case 'float':
                break;

            case 'varchar':
            case 'char':
                break;
				
            case 'enum':
                break;
            }
		}
				
        return $ret;
    }
    
    /**
    * Check if array fileds is unique or not
    * 
    * @param array $uniqueFields - array of the fields that needed to check
    * @return boolean
    */
    function isUnique($uniqueFields = array()) {
        
        $sql    = null;
        
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('COUNT(*) as count');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from($this->table_name);    
        
        foreach($uniqueFields as $field => $value) {
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->or_where($field, $value);
        }
        
        $query        = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
        $countRecords = $query->row_array();
        
        if($countRecords['count'] >= 1) {
            return false;
        }    
        
        return true;
    }
	
	
    /**
     * Print block to view several objects. Use pagination and write general logic from model class.
     *
     * @access public
     * @param:  $where_str: string for flexible way of manage SQL 
     * @param:  $default_order_by: string Default order  for fetchng, If you are not received this param logic use PK 
     * @param:  $order_by: string If you want 
     * @param:  $group_by: string
     * @param:  $assign_var: array
     * @return NULL
     */
    public function printCollectionObjects($where_str=NULL, $default_order_by = NULL, $order_by = NULL, $group_by = NULL, $assign_var = array())
    {
    	$_where	= $where_str;
        $name	= $this->class_name;
        $query	= $this->get_select_query();

        $query->expand(array(
            'where'		=> $where_str,
            'order_by'	=> $default_order_by,
        ) );

		$res = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->query($query->str());
		$total_record = $res->num_rows();
        SHIN_Core::$_libs['templater']->assign(array('total_record' => $total_record));
				
		$paging_config = array();
		
		if(!isset(SHIN_Core::$_libs['pagination']))
		{
			// TODO If this way works need change logic for follow 
			// SHIN_Pager - wrapper for normal and mobile version 
	        $nedded_libs = array('libs' => array('SHIN_Pagination'));
			SHIN_Core::postInit($nedded_libs);
		}
				
		$__tmp = '';
		if(SHIN_Core::$_config['core']['index_page']){
			$__tmp = SHIN_Core::$_config['core']['index_page'].'/';
		}
		$config['base_url']		= SHIN_Core::$_config['core']['app_base_url'].'/'.$__tmp.last_segment();
		$config['total_rows']	= $total_record;
		
		//////////////////////////// PER_PAGE  CUR_PAGE //////////////////////////////////
		// block where we are trying read parameters per_page/cur_page  //////////////////
		//$config['per_page'] = NULL;
		//$config['cur_page'] = 1;
		
		$sight_per_page = FALSE;
		$sight_cur_page = FALSE;
		
		$__temp1 = param('per_page_up');
		$__temp2 = param('per_page_down');
		
		if(isset($__temp1) || isset($__temp2))
		{
			if(isset($__temp2)){$__temp1 = $__temp2;} 
		
			$config['per_page'] = $__temp1;
			SHIN_Core::$_libs['session']->set_userdata('per_page', $config['per_page']);
			SHIN_Core::$_libs['session']->unset_userdata('cur_page');
			$sight_per_page = TRUE;		
		} else {
			if(isset(SHIN_Core::$_input->not_touched_params['per_page'])){ 
				$config['per_page'] = SHIN_Core::$_input->not_touched_params['per_page'];
				SHIN_Core::$_libs['session']->set_userdata('per_page', $config['per_page']);
				SHIN_Core::$_libs['session']->unset_userdata('cur_page');
				$sight_per_page = TRUE;
			} elseif(isset(SHIN_Core::$_input->not_touched_params['per_page_up']) && $sight_per_page != TRUE)	{ 
				$config['per_page'] = SHIN_Core::$_input->not_touched_params['per_page_up']; 
				SHIN_Core::$_libs['session']->set_userdata('per_page', $config['per_page']);
				SHIN_Core::$_libs['session']->unset_userdata('cur_page');
				$sight_per_page = TRUE;
			} elseif(isset(SHIN_Core::$_input->not_touched_params['per_page_down']) && $sight_per_page != TRUE)	{ 
				$config['per_page'] = SHIN_Core::$_input->not_touched_params['per_page_down']; 
				SHIN_Core::$_libs['session']->set_userdata('per_page', $config['per_page']);
				SHIN_Core::$_libs['session']->unset_userdata('cur_page');
				$sight_per_page = TRUE;
			}
		}
		
		if($sight_per_page != TRUE){
			if(isset(SHIN_Core::$_libs['session'])){
				if(SHIN_Core::$_libs['session']->userdata('per_page') ){
					$config['per_page'] = SHIN_Core::$_libs['session']->userdata('per_page');
				}
			}
		}

		if(isset(SHIN_Core::$_input->not_touched_params['cur_page'])){
			$config['cur_page'] = SHIN_Core::$_input->not_touched_params['cur_page'];
            SHIN_Core::$_libs['session']->set_userdata('cur_page', $config['cur_page']);
		} else {
			if(isset(SHIN_Core::$_libs['session'])){
				if(SHIN_Core::$_libs['session']->userdata('cur_page')){
					$config['cur_page'] = SHIN_Core::$_libs['session']->userdata('cur_page');
					//SHIN_Core::$_libs['session']->unset_userdata('cur_page');
				}
			}
		}
		//////////////////////////////////////////////////////////////////////////////////
		
		SHIN_Core::$_libs['pagination']->initialize($config);
		SHIN_Core::$_libs['templater']->assign(array('total_search_count' => $total_record));
		
		//dump(SHIN_Core::$_libs['pagination']->get_limit_clause());
		
        if($total_record > 0) {

	        $res = $this->get_expanded_result(array(
				'where'		=> $_where,
				'order_by'	=> $order_by,
                'group_by'	=> $group_by,
                'limit'		=> SHIN_Core::$_libs['pagination']->get_limit_clause(),
    	    ));
			
            // Fill the table with selected items:
            $i = 0;
			foreach ($res->result_array() as $row)
			{
                $this->fetch_row($row);

                SHIN_Core::$_libs['templater']->append($this->write());
                SHIN_Core::$_libs['templater']->append(array(
                    "row_parity" => $i % 2,
                    "row_style" => ($i % 2 == 0) ? "table-row-even" : "table-row-odd",
                ));
                $i++;
            }
						
			$__arr = SHIN_Core::$_libs['pagination']->create_links();
			
			SHIN_Core::$_libs['templater']->assign(array('nav_str_up'		=> $__arr[0]));
			SHIN_Core::$_libs['templater']->assign(array('nav_str_down'		=> $__arr[1]));
        }

		if($assign_var){			
			SHIN_Core::$_libs['templater']->setBlock($assign_var['templatename'], $assign_var['assignvar']);			
		}
		
    } // end of function
	
    /**
    * Return an array with given fields stored in it for future use in a page template.
    * 
    * @param array $fields_to_write - array of the needed fields for writing
    * @return hash for assign to the page
    */
    function write($fields_to_write = NULL)
	{
        $h = array();

        $field_names = isset($fields_to_write) ?
            $fields_to_write : array_keys($this->fields);

        reset($field_names);
        while (list($i, $name) = each($field_names)) {
            $f = $this->fields[$name];
            if (!$f['write']) {
                continue;
            }

            $type  = $f['type'];
            $value = $this->$name;  // !!!

            if ($type == 'blob') {  // do not try to write blobs...
                continue;
            }

            $pname = $this->class_name . '_' . $name;

            if(!isset($value)) {$value = '';};
            $h[$pname] = htmlspecialchars($value);  // sentry

            switch($type) {
            case 'enum':
				
				if(isset($f['values'][$value])){
					$h[$pname . '_name'] = $f['values'][$value];
				} else {
					$h[$pname . '_name'] = '';
				}
                break;

            case 'integer':
                $h[$pname . '_signed'] =
                    ($value > 0) ? "+$value" :
                        (($value<0)? ('&minus;' . -$value) : '0');
                $h[$pname . '_signed_nozero'] =
                    ($value > 0) ? "+$value" :
                        (($value<0)? ('&minus;' . -$value) : '');
                break;

            case 'double':
                $h[$pname] = $this->_get_app_double_value($value, 2);
                $h[$pname . "_orig"] = $this->_get_app_double_value($value, $f["prec"]);
                $h[$pname . "_long"] = $this->_get_app_double_value($value, 5);

                break;

            case 'varchar':
                $h[$pname . '_url'] = urlencode($value);
                if ($value != "" && isset($f["values"]) && array_key_exists($value, $f["values"])) {
                    $h[$pname] = htmlspecialchars($f["values"][$value]);
                }
                break;

            case 'date':
            case 'datetime':
                $h[$pname . '_str'] = fromDbToDisplay($value);
                break;

            case 'timestamp':
				// ????? need test it
                $date_regexp = '/^(\d\d\d\d)(\d\d)(\d\d)(\d\d)(\d\d)(\d\d)$/';
                $date_values = array();
                if (preg_match($date_regexp, $value, $date_values)) {
                    $year   = $date_values[1];
                    $month  = $date_values[2];
                    $day    = $date_values[3];
                    $hour   = $date_values[4];
                    $minute = $date_values[5];
                    $second = $date_values[6];
                    $t = mktime($hour, $minute, $second, $month, $day, $year);
                    $h[$pname . '_str'] = $t;
                }
                break;

            case 'text':
            case 'mediumtext':
                $h[$pname . '_raw'] = $value;
                $html = htmlspecialchars($value);
                $html = preg_replace('/\r/', ''    , $html);
                $html = preg_replace('/\n/', '<br>', $html);
                $h[$pname . '_html'] = "<p>$html</p>";
                break;
            }
        }

        return $h;
    }
	
    function _get_app_double_value($double_value, $decimals = 2) {
        return $this->_format_double_value($double_value);
    }
	
	
} // end of class


/**
 * Parent class for each model who is have multiple primary keys. Implement common methods.
 *
 * @package		ShinPHP framework
 * @subpackage	Core
 * @category	Model
 * @author		
 * @link		
 */

class SHIN_MPKModel extends SHIN_Model
{
    /**
     * PK name.
     */
    var $pk = NULL;
	
    /**
     * Fetch latest N records.
     *
     * @access public
     * @param:  N:integer
     * @return: Array with data.
     */
	function getLastRec($count_records)
    {
    	$ret = array();		
		
		$q = $this->get_expanded_result(array(
				"limit"		=> SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->escape($count_records),
    	    ));
			
		foreach ($q->result_array() as $row){
			array_push($ret, $row);
		}
		
		$q->free_result();
		
        return $ret;

    } // end of function
	
		
    /**
     * Is defined record.
     *
     * @access public
     * @param:  null
     * @return: true/false
     */
	function isDefinite($mpk=NULL)
	{
		$ret = false;
		
		if(is_array($mpk))
		{
			$ret = true;
			
			foreach($mpk as $pk){
				if($this->{$pk} == NULL){
					$ret = false; 
					break;
				}
			}
		
		} else {
		
			$ret = true;
				
			foreach($this->primary_key as $pk){
				if($this->{$pk} == NULL){
					$ret = false; 
					break;
				}
			}
		}
		
		return $ret;

	} // end of function
	
	
    /**
     * Return default WHERE condition for fetching one object.
     *
     * @access public
     * @param NULL.
     * @return NULL.
     */
    function default_where_str($use_table_alias = true)
	{
		
        $pr_key_name  = $this->primary_key_name();
        $pr_key_value = $this->primary_key_value();

		$__tmp_arr = array();
		foreach($pr_key_name as $name){
			array_push($__tmp_arr, $name.'='.SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->escape(param($this->class_name.'_'.$name.'_old')));
		}
		
		return implode(" AND ", $__tmp_arr);
    } //end of function 
	
    /**
     * Fetch object by ID.
     *
     * @access public
     * @param:  id
     * @return: true/false
     */
	function fetchByID($id, $primary_key_name = NULL)
	{
		$_ret = false;
		
		$PK = '';

		if(!$id){return $_ret;}
		
		// add logic for multiple PK
		if(is_array($this->primary_key)){
			if($primary_key_name == NULL){
				$PK = $this->primary_key[0];
			} else {
				$PK = $this->primary_key[$primary_key_name];
			}
			
		} else {
			$PK = $this->primary_key;
		}
		
		// add new logic
		if(is_array($id))
		{		
			foreach($id as $k=>$v){
				SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where($k, $v);
			}
			
			$query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get($this->class_name);		
			
		} else {
			$query = $this->get_expanded_result(array(
				"where"	=> $this->class_name.'.'.$PK.'='.$id,
    	    ));
		}
			
		if ($query->num_rows() > 0)
		{		
			foreach ($query->result_array() as $row){
                $this->_mapper($row);
				$_ret = true;
			}
		}
		$query->free_result();
	    return $_ret;
	} // end of function 
	
    /**
     * Universal method for insert/update any record in any model
     *
     * @access public
     * @param:  $data: array with needed inserted or updated data
     * @return BOOL. true if updated, false if inserted
     */
    function save($fields_to_processed = NULL)
	{
		$ret = FALSE;
		
        $is_definite = $this->isDefinite();
		
		// Additional logic for MPK models
		foreach($this->primary_key as $pk){
			$old_key_val = $this->class_name.'_'.$pk.'_old';
			if(param($old_key_val) == ''){
				$is_definite = false; 
				break;
			}
		}
		////////////////////////////////////
		
        if ($is_definite) {
            $ret = $this->update($fields_to_processed);
        } else {
            $ret = $this->store($fields_to_processed);
        }

        return $ret;
    } // end of function 
			
	
			
}

/* End of file SHIN_Model.php */
/* Location: shinfw/core/SHIN_Model.php */
