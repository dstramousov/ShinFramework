<?php

class Sys_PolicyApplication_model extends SHIN_Model {

    /**
     * Physical tablename.
     */
    var $table_name = 'sys_policyapplication';

    function __construct() 
	{
        parent::__construct($this->table_name);
		
		// PK Index definition
        $this->primary_key   = 'idElem';
		
		// Index definition
//        $this->insert_index(array('idElem'=>'UNIQUE'));
				
		// Fields definition
		$this->insert_field(array(
			'column' => 'idElem',
            'type'   => 'varchar',
            'width'  => 5,
            'value'  => '',
			'null'   => 0,
            'join'   => array(
                'mode'   => 'left',
                'table'  => 'sys_userrole',
                'column' => 'idRole',
            ),
            'input'  => array(
                'type'          => 'select',
                'from'          => 'sys_userrole',
                'data'          => 'idRole',
                'caption'       => 'role',
                'nonset_id'     => '',
                'nonset_name'   => '',
            ),
            'validate'  =>  'custom_elem_validate'
		));
        
        $this->insert_field(array(
            'table'             => 'sys_userrole',
            'column'            => 'role',
            'type'              => 'varchar',
            'width'             => 45,
            'title'             => '',
            'null'              => 0,
            'info_field_txt'    => false,
            'info_field_ico'    => false,
            'virtual'           => true,
        ));
        
		
        $this->insert_field(array(
            "column" => "type",
            "type"   => "enum",
            "values" => array(
                'user'        => "lng_label_sys_policy_application_type_user",
                'role'        => "lng_label_sys_policy_application_type_role",
            ),
            "value"  => 'user',
            "null"   => 0,
            "title"  => 'lng_label_sys_policy_application_type',
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
                'nonset_name'   => '',
            ),
            'validate'  =>  'validate_int'
		));
        
        $this->insert_field(array(
            'table'             => 'sys_structarea',
            'column'            => 'area',
            'type'              => 'varchar',
            'width'             => 45,
            'title'             => '',
            'null'              => 0,
            'info_field_txt'    => false,
            'info_field_ico'    => false,
            'virtual'           => true,
        ));
		
		$this->insert_field(array(
			"column"    => "idSubArea",
			"type"      => "tinyint",
            "null"      => 0,
            'value'     => '',
            'validate'  =>  'validate_int'
		));
		
		$this->insert_field(array(
			"column" => "idApplication",
			"type"   => "tinyint",
            "null"   => 0,
            'value'  => '',
            'join'   => array(
                'mode'   => 'left',
                'table'  => 'sys_structapplication',
                'column' => 'idApplication',
            ),
            'input'  => array(
                'type'          => 'select',
                'from'          => 'sys_structapplication',
                'data'          => 'idApplication',
                'caption'       => 'application',
                'nonset_id'     => '',
                'nonset_name'   => '',
            ),
            'validate'  =>  'validate_int'
		));
        
         $this->insert_field(array(
            'table'             => 'sys_structapplication',
            'column'            => 'application',
            'type'              => 'varchar',
            'width'             => 45,
            'title'             => '',
            'null'              => 0,
            'info_field_txt'    => false,
            'info_field_ico'    => false,
            'virtual'           => true,
        ));
		
        $this->insert_field(array(
            "column" => "mode",
            "type"   => "enum",
            "values" => array(
                'block'		=> "lng_label_sys_policy_application_mode_block",
                'r-only'	=> "lng_label_sys_policy_application_mode_r-only",
                'par'		=> "lng_label_sys_policy_application_mode_par",
                'full'		=> "lng_label_sys_policy_application_mode_full",
            ),
            "value"  => 'block',
            "null"   => 0,
            "title"  => 'lng_label_sys_policy_application_mode',
        ));
		
	}
    
    /**
    * validate idEleme
    * 
    * @access public
    * @param string $data
    * @return array
    */
    function custom_elem_validate($data) {
        
        if(empty($this->idElem)) {
            return array('result' => false, 'value' => 'lng_label_sys_policy_element_empty_validation');
        }
            
        if($this->idElem != $this->oldElemId) {
           
           SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('COUNT(*) as count');
                           SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from($this->table_name);
                           SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idElem',    $this->idElem);
           $query     = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
           $result    = $query->row(0, 'array');
           
           if($result['count'] > 0) {
               return array('result' => false, 'value' => 'lng_label_sys_policy_element_unique_validation');
           }
        }
           
           return array('result' => true, 'value' => ''); 
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
        $subAreaList    = SHIN_Core::$_models['sys_structsubarea_model']->getSubAreaListForDD($this->idArea);
        
        $h[$this->table_name . '_idSubArea_input'] = '<select id="sys_policyapplication_idSubArea" name="sys_policyapplication_idSubArea">';
        foreach($subAreaList as $key => $value) {
            if($this->idSubArea == $key) {
                $h[$this->table_name . '_idSubArea_input']  .=  '<option value="' . $key . '" selected="selected">' . $value . '</option>';    
            } else {
                $h[$this->table_name . '_idSubArea_input']  .=  '<option value="' . $key . '">' . $value . '</option>';    
            }    
        }
        $h[$this->table_name . '_idSubArea_input'].= '</select>';
        
        $h[$this->table_name . '_idElem_input']   =   '<select id="' . $this->table_name . '_idElem" name="' . $this->table_name . '_idElem">';
        $h[$this->table_name . '_idElem_input']  .=   group_dropdown('idType', 'name', 'sys_v_policy_objects', 'idElem', $this->idElem);
        $h[$this->table_name . '_idElem_input']  .=   '</select>';
        
        $appList  =   SHIN_Core::$_models['sys_structapplication_model']->getApplicationListForDD($this->idArea, $this->idSubArea);
        $h[$this->table_name . '_idApplication_input']   =   '<select id="sys_policyapplication_idApplication" name="sys_policyapplication_idApplication">';
        
        if($this->isDefinite()) {
            foreach($appList as $key => $value) {
                if($this->idApplication == $key) {
                    $h[$this->table_name . '_idApplication_input']   .= '<option value="' . $key . '" selected=""selected>' . $value . '</option>';    
                } else {
                    $h[$this->table_name . '_idApplication_input']   .= '<option value="' . $key . '">' . $value . '</option>';    
                }
            }
        } else {
            $h[$this->table_name . '_idApplication_input']   .= '<option value=""></option>';    
        }
        $h[$this->table_name . '_idApplication_input']  .=   '</select>';
        
        $h[$this->table_name . '_idArea_input']    =    SHIN_Core::$_models['sys_structarea_model']->getAreaDDForVizualization($this->table_name, $this->idArea);
        
        return $h;
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
        
        // 1. load language label for all applications
        $this->loadApplicationLang();
        
        $array_data = parent::fetchCorrectPagingData($customization_fields, $where_condition, DB_FETCH_ANSWER_TYPE_ARRAY);
        foreach($array_data['data'] as &$data) {
            $data['sys_userrole_role']                  = '"' . trim($data['idElem'], '"') . '-' . trim($data['sys_userrole_role'], '"') . '"';
            $data['sys_structarea_area']                = '"' . trim($data['idArea'], '"') . '-' . trim($data['sys_structarea_area'], '"') . '"';
            $data['idSubArea']                          = '"' . trim($data['idSubArea'], '"') . '-' . SHIN_Core::$_models['sys_structsubarea_model']->getSubAreaName(trim($data['idArea'], '"'), trim($data['idSubArea'], '"')) . '"';
            $data['sys_structapplication_application']  = '"' . SHIN_Core::$_language->line(trim($data['sys_structapplication_application'], '"')) . '"';
        }
        return $this->packToJSONData($array_data);
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
    * get policy application list
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
    * store information about policy application in db
    * 
    * @param null 
    * @access public
    * @return null
    * 
    */
    function storePolicyApplication(){
        
        $data = array('idElem'          =>  $this->idElem,
                      'type'            =>  $this->type,
                      'idArea'          =>  $this->idArea,
                      'idSubArea'       =>  $this->idSubArea,
                      'idApplication'   =>  $this->idApplication,
                      'mode'            =>  $this->mode);
        
        if(empty($this->oldElemId)) {
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert($this->table_name, $data);
        } else {
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idElem',    $this->oldElemId);
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->update($this->table_name, $data);         
        }
    }
    
    /**
    * load language for each application
    * 
    * @access protected
    * @param null
    * @return null
    * 
    */
    public function loadApplicationLang(){
        
        // init needed libs
        $nedded_libs = array(   
                                'models' => array(array('sys_modulelist_model', 'sys_modulelist_model'))
                            );

        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        $result    = SHIN_Core::$_models['sys_modulelist_model']->getApplicationList();
        
        foreach($result as $application) {
            $path   =   str_replace(SHIN_Core::$_config['core']['shinfw_folder'] . '\\', '', BASEPATH) . strtolower($application['applicationFolder']) . '\\lang\\' . SHIN_Core::$_current_lang . '\\main_menu.php';
            if(is_file($path)) {
                SHIN_Core::$_language->directLoad($path);
            }
        }
    }

} // end of class

/* End of file Panel_model.php */
