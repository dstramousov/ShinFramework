<?php

class Sys_StructApplication_model extends SHIN_Model {

    /**
     * Physical tablename.
     */
    var $table_name = 'sys_structapplication';

    function __construct() 
	{
        parent::__construct($this->table_name);
		
		// PK Index definition
        $this->primary_key   = 'idApplication';
		
		// Index definition
        $this->insert_index('idArea');
        $this->insert_index('idSubArea');
				
		// Fields definition
		$this->insert_field(array(
			"column" => "idApplication",
			"type"   => "integer",
			"attr"   => "auto_increment",
            'value'  => ''			
		));
		
		$this->insert_field(array(
			"column" => "idArea",
			"type"   => "tinyint",
            "null"   => 0,
            'value'  => '',
            'join'   => array(
                'mode'   => 'left',
                'table'  => 'sys_structarea',
                'column' => 'idArea',
            ),
            'input'  => array(
                'type'          => 'select',
                'from'          => 'sys_structarea',
                'data'          => 'idArea',
                'caption'       => 'area',
                'nonset_id'     => '',
                'nonset_name'   => '---',
            ),
            'validate'  =>  'validate_int',
            'info_field_txt'    => false,
            'info_field_ico'    => false,
       ));
        
        $this->insert_field(array(
            'table'             => 'sys_structarea',
            'column'            => 'area',
            'type'              => 'varchar',
            'width'             => 45,
            'title'             => '',
            'null'              => 0,
            'virtual'           => true,
        ));
		
		$this->insert_field(array(
			"column"    => "idSubArea",
			"type"      => "tinyint",
            "null"      => 0,
            'value'     => '',
            'validate'  =>  'validate_int',
            'info_field_ico' => 'shinfw/images/help.png',
            'info_field_txt' => 'lang_label_sys_structapplication_idsubarea_mandatory',
		));
		
        $this->insert_field(array(
            "column"    => "application",
            "type"      => "varchar",
            'width'     => 50,
            "value"     => "",
            "null"      => 0,
            "title"     => 'lng_label_sys_structapplication_application',
            'validate'  =>  'sanitize_string',
            'info_field_ico' => 'shinfw/images/help.png',
            'info_field_txt' => 'lang_label_sys_structapplication_application_mandatory',
        ));
		
        $this->insert_field(array(
            "column"    => "file",
            "type"      => "varchar",
            'width'     => 200,
            "value"     => "",
            "null"      => 0,
            "title"     => 'lng_label_sys_structapplication_file',
            'validate'  =>  'sanitize_string',
            'info_field_txt'    => false,
            'info_field_ico'    => false,
        ));

		$this->insert_field(array(
			"column"    => "idModule",
			"type"      => "tinyint",
            "null"      => 0,
            'value'     => '',
            'validate'  =>  'validate_int',
            'info_field_ico' => 'shinfw/images/help.png',
            'info_field_txt' => 'lang_label_sys_structapplication_idsubarea_mandatory',
		));

        $this->insert_field(array(
            "column"    => "showMenu",
            "type"      => "enum",
            "values"    => array(
                    's'    => "lng_label_struct_application_show",
                    'n'    => "lng_label_struct_application_hide",
                ),
            'width'     => 1,
            "value"     => "s",
            "null"      => 0,
            "title"     => 'lng_label_sys_structapplication_showMenu',
            'validate'  =>  'sanitize_string',
            'info_field_txt'    => false,
            'info_field_ico'    => false,
        ));
    }
	

    /**
	* Call Validation
	*
	* @access public
	* @param $fields needed fields for validation. By default - all with properties [validate].
	* @return $h hash.
	* @sa SHIN_Model::validate_form()
     */
	function validate_form($fields_to_validate = null)
	{
		$h = parent::validate_form($fields_to_validate);

		return $h;
	}

    /**
	* Prepare html for edit/add current object information.
	*
	* @access public
	* @param $fields needed fields for write to template. By default - ALL.
	* @return $h hash.
	* @sa SHIN_Model::write_form()
     */
	function write_form($fields_to_write = null, $mode=WRITE_NORMAL)
	{
		$h              = parent::write_form($fields_to_write, $mode);

		//////////////////////////////////////////////////////////////////
        $subAreaList    = SHIN_Core::$_models['sys_structsubarea_model']->getSubAreaListForDD($this->idArea);
        
		$sys_structapplication_idSubArea = '';
        $sys_structapplication_idSubArea = '<select id="sys_structapplication_idSubArea" name="sys_structapplication_idSubArea">';
        foreach($subAreaList as $key => $value) {
            if($this->idSubArea == $key) {
                $sys_structapplication_idSubArea  .=  '<option value="' . $key . '" selected="selected">' . $value . '</option>';    
            } else {
                $sys_structapplication_idSubArea  .=  '<option value="' . $key . '">' . $value . '</option>';    
            }    
        }
        $sys_structapplication_idSubArea .= '</select>';

		$h[$this->table_name . '_idSubArea_input'] = $this->_addMandatoryAddons($sys_structapplication_idSubArea, 'sys_structapplication_idSubArea', $this->fields['idSubArea'], WRITE_NORMAL);
		///////////////////////////////////////////////////////////////////
		
        
        $h[$this->table_name . '_idArea_input']    =    SHIN_Core::$_models['sys_structarea_model']->getAreaDDForVizualization($this->table_name, $this->idArea);

        return $h;
	}

    /**
	* Read given fields from CGI query.
	*
	* @access public
	* @param $fields needed fields for reading from form. 
	* @return NULL
	* @sa SHIN_Model::read_form()
     */
	function read_form($fields_to_read = null)
	{
		$h = parent::read_form($fields_to_read);

		return $h;
	}
	
	
    /**
	* Delete object from DB (with related data).
	*
	* @access public
	* @param NULL.
	* @return NULL.
	* @sa SHIN_Model::del()
     */
	function del() 
	{
		parent::del();
	}
    
    /**
    * get struct application list
    * 
    * @access public
    * @param null
    * @return array
    * 
    */
    function getApplicationList(){
       
       $resultObj = $this->get_expanded_result();
       
       return $resultObj->result_array();    
    }
    
    /**
   * get application list for DD
   *  
   * @param int $areaId
   * @access public
   * @return array
   */
    public function getApplicationListForDD($areaId, $subAreaId){
    
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('idApplication');    
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('application');    
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from($this->table_name);    
                 
        if(!is_null($areaId) && !is_null($subAreaId)) {
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idArea' ,    $areaId);
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idSubArea' , $subAreaId);    
        }
        
        $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
        $result= $query->result_array();
        
        $list = array();
        foreach($result as $value) {
            if(!SHIN_Core::$_language->line($value['application'])) {
                $list[$value['idApplication']]  =   $value['idApplication'] . ' - ' . $value['application'];    
            } else {
                $list[$value['idApplication']]  =   $value['idApplication'] . ' - ' . SHIN_Core::$_language->line($value['application']);
            }    
        }
        
        return $list;
    }
    
    /**
    * get application name by id
    * 
    * @param int $appId
    * @access public
    * @return string
    */
    public function getApplicationNameById($appId){
        
                 SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('application');    
                 SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from($this->table_name);    
                 SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idApplication', $appId);
        
        $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
        $result= $query->row(0, 'array');
        
        return isset($result['application']) ? (SHIN_Core::$_language->line($result['application']) ? SHIN_Core::$_language->line($result['application']) : $result['application'])  : '';
                 
    }
    
    /**
     * Prepare SQL statement and fetch data for Datatables widget.
     *
     * @access public
     * @param:  NULL
     * @return: $ret array with prepared data
     */
    function fetchCorrectPagingData($customization_fields = NULL, $where_condition = NULL,  $return_answer_type = DB_FETCH_ANSWER_TYPE_JSON)
    {
        // init needed libs
        $nedded_libs = array(   
                                'models' => array(array('sys_structsubarea_model', 'sys_structsubarea_model'))
                            );

        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        $array_data = parent::fetchCorrectPagingData($customization_fields, $where_condition, DB_FETCH_ANSWER_TYPE_ARRAY);
        foreach($array_data['data'] as &$data) {
            $data['idSubArea']                          = '"' . trim($data['idSubArea'], '"') . '-' . SHIN_Core::$_models['sys_structsubarea_model']->getSubAreaName(trim($data['idArea'], '"'), trim($data['idSubArea'], '"')) . '"';
            $data['sys_structarea_area']                = '"' . trim($data['idArea'], '"') . '-' . trim($data['sys_structarea_area'], '"') . '"';
        }
        return $this->packToJSONData($array_data);
    } 

} // end of class

/* End of file Panel_model.php */
