<?php

class Sys_StructArea_model extends SHIN_MPKModel {

    /**
     * Physical tablename.
     */
    var $table_name = 'sys_structarea';

    function __construct() 
	{
        parent::__construct($this->table_name);
		
		// PK Index definition
        $this->primary_key   = array('idArea');
		
		// Index definition
        $this->insert_index('idArea');
				
		// Fields definition
		$this->insert_field(array(
			"column"    => "idArea",
			"type"      => "tinyint",
            'value'     => '',
            'validate'	=> 'custom_area_validate'		
		));
		
        $this->insert_field(array(
            'column'    => 'area',
            'type'      => 'varchar',
            'width'     => 10,
			'title'     => 'lng_label_sys_structarea_area',
			'value'     => '',
            'validate'  => 'sanitize_string'
        ));
	}
    
    
    /**
    * validate idArea
    * 
    * @access public
    * @param int $data
    * @return array
    */
    function custom_area_validate($data) {
        
        if(!empty($data)) {
            
           if(!isset($this->oldAreaId) || $this->oldAreaId != $data) { 
                            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('COUNT(*) as count');
                            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from($this->table_name);
                            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idArea', $data);
               $query     = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
               $result    = $query->row(0, 'array');
               
               if($result['count'] > 0) {
                   return array('result' => false, 'value' => 'lng_label_sys_area_id_unique_validation');
               }
           }
           
           // validate int
           $result = validate_int($data);
           if($result['result']) {
                return array('result' => true, 'value' => '');
           } else {
                return array('result' => false, 'value' => 'lng_label_sys_area_id_int_validation');    
           }
           
        }
    
        return array('result' => false, 'value' => 'lng_label_sys_area_id_empty_validation');    
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
    * get areas list
    * 
    * @access public
    * @param null
    * @return array
    * 
    */
    function getSysAreaList(){
        
                    SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from($this->table_name);
       $query     = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
       
       return $query->result_array();
    }
    
    /**
    * store information about area in db
    * 
    * @param null 
    * @access public
    * @return null
    * 
    */
    public function storeArea(){
        
        $data = array('idArea'  =>  $this->idArea,
                      'area'    =>  $this->area);
        
        if(!isset($this->oldAreaId)) {
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert($this->table_name, $data);
        } else {
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idArea', $this->oldAreaId);
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->update($this->table_name, $data);         
        }     
    }
    
    /**
    * make Area DD for form
    * 
    * @param string $tableName
    * @param int $selectedId
    * @access public
    * @return string
    */
    function getAreaDDForVizualization($tableName, $selectedId){
        $areaList   = $this->getSysAreaList();
        
        $option = '<select id="' . $tableName . '_idArea" name="' . $tableName . '_idArea"><option value=""></option>';
        foreach($areaList as $value) {
            if($selectedId == $value['idArea']) {
                $option  .=  '<option value="' . $value['idArea'] . '" selected="selected">' . $value['idArea'] . ' - ' . $value['area'] . '</option>';    
            } else {
                $option  .=  '<option value="' . $value['idArea'] . '">' . $value['idArea'] . ' - ' . $value['area'] . '</option>';    
            }    
        }
        $option .= '</select>';
        
        return $option;
    }

} // end of class

/* End of file Panel_model.php */