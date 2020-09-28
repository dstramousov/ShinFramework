<?php

class Sys_PolicySubArea_model extends SHIN_MPKModel {

    /**
     * Physical tablename.
     */
    var $table_name = 'sys_policysubarea';

    function __construct() 
	{
        parent::__construct($this->table_name);
		
		// PK Index definition
        $this->primary_key  = array('idElem', 'idArea', 'idSubArea');
		
		// Index definition
        $this->insert_index('idElem');
				
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
                'user'        => "lng_label_sys_policyarea_type_user",
                'role'        => "lng_label_sys_policyarea_type_role",
            ),
            "value"  => 'user',
            "null"   => 0,
            "title"  => 'lng_label_sys_policyarea_type',
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
            'validate'  =>  'custom_area_validate'
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
            'validate'  => 'custom_subarea_validate',
            'info_field_ico' => 'shinfw/images/help.png',
            'info_field_txt' => 'lang_label_sys_structapplication_idsubarea_mandatory',
        ));
        		
        $this->insert_field(array(
            "column" => "mode",
            "type"   => "enum",
            "values" => array(
                'block'		=> "lng_label_sys_policyarea_mode_block",
                'r-only'	=> "lng_label_sys_policyarea_mode_r-only",
                'par'		=> "lng_label_sys_policyarea_mode_par",
                'full'		=> "lng_label_sys_policyarea_mode_full",
            ),
            "value"     => 'block',
            "null"      => 0,
            "title"     => 'lng_label_sys_policyarea_mode',
        ));
	}
	
    /**
    * validare idEleme
    * 
    * @param string $data
    * @access public
    * @return array
    */
    function custom_elem_validate($data){
        
       if(empty($this->idElem)) {
            return array('result' => false, 'value' => 'lng_label_policy_sub_area_element_empty_validation');    
       }
       
       if(!$this->_checkMultiPK()) {
           return array('result' => false, 'value' => 'lng_label_policy_sub_area_element_unique_validation');
       } 
       
       return array('result' => true, 'value' => '');    
    }
    
    /**
    * validare idArea
    * 
    * @param int $data
    * @access public
    * @return array
    */
    function custom_area_validate($data){
        
       if(empty($this->idArea)) {
            return array('result' => false, 'value' => 'lng_label_policy_sub_area_empty_validation');    
       }
       
       if(!$this->_checkMultiPK()) {
           return array('result' => false, 'value' => 'lng_label_policy_sub_area_unique_validation');
       } 
       
       return array('result' => true, 'value' => '');    
    }
    
    /**
    * validare idSubArea
    * 
    * @param int $data
    * @access public
    * @return array
    */
    function custom_subarea_validate($data){
       
        if(empty($this->idSubArea)) {
            return array('result' => false, 'value' => 'lng_label_policy_sub_subarea_empty_validation');    
       }
       
       if(!$this->_checkMultiPK()) {
           return array('result' => false, 'value' => 'lng_label_policy_sub_subarea_unique_validation');
       } 
       
       return array('result' => true, 'value' => '');    
    }
    
    /**
    * validate idElem and idArea and idSubArea as single PK
    * 
    * @param null
    * @access private
    * @return boolean
    * 
    */
    function _checkMultiPK(){
        
        if((!isset($this->subAreaOld) && !isset($this->areaOld) && !isset($this->idElemOld)) || 
          ($this->idElemOld != $this->idElem || $this->areaOld != $this->idArea || $this->idSubArea != $this->subAreaOld)) {
           
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('COUNT(*) as count');
                           SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from($this->table_name);
                           SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idElem',    $this->idElem);
                           SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idArea',    $this->idArea);
                           SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idSubArea', $this->idSubArea);
           $query     = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
           $result    = $query->row(0, 'array');
           
           if($result['count'] > 0) {
               return false;
           }
        }
        
        return true;
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
		
		////////////////////////////////////////////////////////////////
        $subAreaList    = SHIN_Core::$_models['sys_structsubarea_model']->getSubAreaListForDD($this->idArea);
        
        $sys_policysubarea_idSubArea = '<select id="sys_policysubarea_idSubArea" name="sys_policysubarea_idSubArea"><option value=""></option>';
        foreach($subAreaList as $key => $value) {
            if($this->idSubArea == $key) {
                $sys_policysubarea_idSubArea  .=  '<option value="' . $key . '" selected="selected">' . $value . '</option>';    
            } else {
                $sys_policysubarea_idSubArea  .=  '<option value="' . $key . '">' . $value . '</option>';    
            }    
        }
        $sys_policysubarea_idSubArea .= '</select>';
		$h[$this->table_name . '_idSubArea_input'] = $this->_addMandatoryAddons($sys_policysubarea_idSubArea, 'sys_structapplication_idSubArea', $this->fields['idSubArea'], WRITE_NORMAL);
		/////////////////////////////////////////////////////////////////
        
        $h[$this->table_name . '_idElem_input']   =   '<select id="' . $this->table_name . '_idElem" name="' . $this->table_name . '_idElem">';
        $h[$this->table_name . '_idElem_input']  .=   group_dropdown('idType', 'name', 'sys_v_policy_objects', 'idElem', $this->idElem);
        $h[$this->table_name . '_idElem_input']  .=   '</select>';
        
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
    * get policy sub area list
    * 
    * @access public
    * @param null
    * @return array
    * 
    */
    function getPolicySubAreaList(){
        
       $resultObj   = $this->get_expanded_result();
       return $resultObj->result_array();
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
            $data['sys_userrole_role']                  = '"' . trim($data['idElem'], '"') . '-' . trim($data['sys_userrole_role'], '"') . '"';
            $data['sys_structarea_area']                = '"' . trim($data['idArea'], '"') . '-' . trim($data['sys_structarea_area'], '"') . '"';
            $data['idSubArea']                          = '"' . trim($data['idSubArea'], '"') . '-' . SHIN_Core::$_models['sys_structsubarea_model']->getSubAreaName(trim($data['idArea'], '"'), trim($data['idSubArea'], '"')) . '"';
        }
        return $this->packToJSONData($array_data);
    }

} // end of class

/* End of file Panel_model.php */
