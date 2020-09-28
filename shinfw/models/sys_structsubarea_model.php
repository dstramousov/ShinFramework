<?php

class Sys_StructSubArea_model extends SHIN_MPKModel {

    /**
     * Physical tablename.
     */
    var $table_name = 'sys_structsubarea';

    function __construct() 
	{
        parent::__construct($this->table_name);
		
		// PK Index definition
		// `idSubArea`,`idArea`
        $this->primary_key   = array('idArea', 'idSubArea');
		
		// Index definition
        $this->insert_index('idSubArea');
        $this->insert_index('idArea');
				
		// Fields definition
		$this->insert_field(array(
			"column"    => "idSubArea",
			"type"      => "tinyint",
            'value'     => '',
            'validate'	=> 'custom_sub_area_validate'		
		));
        
        $this->insert_field(array(
			"column" => "idArea",
			"type"   => "tinyint",
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
            "column"    => "subarea",
            "type"      => "varchar",
            'width'     => 20,
            "value"     => "",
            "null"      => 0,
            "title"     => 'lng_label_sys_structsubarea_subarea',
            'validate'  => 'sanitize_string'
        ));
	}
    
    /**
    * validate sub are id 
    * 
    * @param mixed $data
    * @access public
    * @return array
    */
    function custom_sub_area_validate($data){
       
       if(empty($this->idSubArea)) {
            return array('result' => false, 'value' => 'lng_label_sys_sub_area_id_empty_validation');    
       }
       
       $result = validate_int($data);
       if(!$result['result']) {
        return array('result' => false, 'value' => $result['value']);    
       }
       
       if(!$this->_checkMultiPK()) {
           return array('result' => false, 'value' => 'lng_label_sys_sub_area_id_unique_validation');
       } 
       
       return array('result' => true, 'value' => '');
    }
    
    /**
    * validate are id 
    * 
    * @param mixed $data
    * @access public
    * @return array
    */
    function custom_area_validate($data){
       
       if(empty($this->idArea)) {
            return array('result' => false, 'value' => 'lng_label_sys_area_id_empty_validation');    
       }
       
       $result = validate_int($data);
       if(!$result['result']) {
        return array('result' => false, 'value' => $result['value']);    
       }
       
       if(!$this->_checkMultiPK()) {
           return array('result' => false, 'value' => 'lng_label_sys_area_id_unique_validation');
       }
       
       return array('result' => true, 'value' => '');    
    }
    
    /**
    * validate area sub id and area id as single PK
    * 
    * @param null
    * @access private
    * @return boolean
    * 
    */
    function _checkMultiPK(){
       
        if((!isset($this->oldSubAreaId) && !isset($this->oldAreaId)) || ($this->oldSubAreaId != $this->idSubArea || $this->oldAreaId != $this->idArea)) {
           
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('COUNT(*) as count');
                           SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from($this->table_name);
                           SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idSubArea', $this->idSubArea);
                           SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idArea',    $this->idArea);
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
		$h = parent::write_form($fields_to_write, $mode);
        
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
     * Prepare SQL statement and fetch data for Datatables widget.
     *
     * @access public
     * @param:  NULL
     * @return: $ret array with prepared data
     */
    function fetchCorrectPagingData($customization_fields = NULL, $where_condition = NULL,  $return_answer_type = DB_FETCH_ANSWER_TYPE_JSON)
    {
        
        $array_data = parent::fetchCorrectPagingData($customization_fields, $where_condition, DB_FETCH_ANSWER_TYPE_ARRAY);
        foreach($array_data['data'] as &$data) {
           $data['sys_structarea_area']   = '"' . trim($data['idArea'], '"') . '-' . trim($data['sys_structarea_area'], '"')   . '"';
        }
        
        return $this->packToJSONData($array_data);
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
    * get sub areas list
    * 
    * @access public
    * @param null
    * @return array
    * 
    */
    function getSysSubAreaList(){
       
       $resultObj = $this->get_expanded_result();
       
       return $resultObj->result_array();
    }
    
    /**
    * store information about sub area in db
    * 
    * @param null 
    * @access public
    * @return null
    * 
    */
    public function storeSubArea(){
        
        $data = array('idSubArea'   =>  $this->idSubArea,
                      'idArea'      =>  $this->idArea,
                      'subarea'     =>  $this->subarea);
        
        if(!isset($this->oldAreaId) && !isset($this->oldSubAreaId)) {
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert($this->table_name, $data);
        } else {
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idArea',    $this->oldAreaId);
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idSubArea', $this->oldSubAreaId);
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->update($this->table_name, $data);         
        }     
    }
    
    /**
    * get subarea name by idArea and idSubArea
    * 
    * @param int $areaId
    * @param int $subAreaId
    * @return mixed
    */
    public function getSubAreaName($areaId, $subAreaId) {
        
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('subarea');    
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from($this->table_name);    
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idArea' ,    $areaId);
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idSubArea' , $subAreaId);    
        
        $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
        
        $result= $query->row(0, 'array');
        
        return $result['subarea']; 
            
    }
   
   /**
   * get sub areas list for DD
   *  
   * @param int $areaId
   * @access public
   * @return array
   */
    public function getSubAreaListForDD($areaId){
        
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('idSubArea');    
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('subarea');    
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from($this->table_name);    
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idArea' ,    $areaId);
        
        $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
        $result= $query->result_array();
        
        $list = array();
        foreach($result as $value) {
            $list[$value['idSubArea']]  =   $value['idSubArea'] . ' - ' . $value['subarea'];    
        }
        
        return $list;
    }
} // end of class

/* End of file Panel_model.php */
