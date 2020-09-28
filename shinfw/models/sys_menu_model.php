<?php

class Sys_Menu_model extends SHIN_MPKModel {

    /**
     * Physical tablename.
     */
    var $table_name = 'sys_menu';

    function __construct() 
	{
        parent::__construct($this->table_name);
		
		// PK Index definition
        $this->primary_key   = array('idMenu', 'idPanel');
		

		// Fields definition
		$this->insert_field(array(
			"column"    => "idMenu",
			"type"      => "tinyint",
            "null"      => 0,
            'value'     => '',
            'validate'  => 'custom_menu_validate'
		));
		
		$this->insert_field(array(
			"column"    => "idPanel",
			"type"      => "tinyint",
            "null"      => 0,
            'value'     => '',
            'validate'  => 'custom_panel_validate'
		));

		/*
		$this->insert_field(array(
			'column' => 'title',
            'type'   => 'varchar',
            'width'  => 60,
            'value'  => '',
			'null'   => 0,
		));
		*/
		
		$this->insert_field(array(
			'column' => 'ico',
            'type'   => 'varchar',
            'width'  => 60,
            'value'  => '',
			'null'   => 1,
		));
		
		/*
		$this->insert_field(array(
			"column" => "position",
			"type"   => "tinyint",
            "null"   => 0,
            'value'  => '',
		));
				
        $this->insert_field(array(
            'column' => 'panel_id',
            'type'   => 'varchar',
            'width'  => 255,
			'title'  => 'lng_label_sys_panel_id',
			'value'  => '',
        ));
		*/
		
        $this->insert_field(array(
            'column'    => 'panel_header',
            'type'      => 'varchar',
            'width'     => 255,
			'title'     => 'lng_label_sys_panel_header',
			'value'     => '',
            'validate'  => 'sanitize_string'
        ));
		
        $this->insert_field(array(
            'column'    => 'collapsed',
            "type"   => "enum",
            "values" => array(
                CT_SHOW        => "lng_label_sys_menu_show",
                CT_HIDE        => "lng_label_sys_menu_hide",
            ),
			'title'     => 'lng_label_sys_panel_collapsed',
		));
		
        $this->insert_field(array(
            'column'    => 'maximized',
            "type"   => "enum",
            "values" => array(
                CT_SHOW        => "lng_label_sys_menu_show",
                CT_HIDE        => "lng_label_sys_menu_hide",
            ),
			'title'     => 'lng_label_sys_panel_collapsed',
		));
		
		
        $this->insert_field(array(
            'column'    => 'order_menu',
            'type'      => 'smallint',
            'width'     => 5,
			'title'     => 'lng_label_sys_panel_order',
            'value'     => 1,
            'validate'  => 'validate_int'
		));

        $this->insert_field(array(
            'column'    => 'column_menu',
            'type'      => 'smallint',
            'width'     => 5,
			'title'     => 'lng_label_sys_panel_column',
            'value'     => 1,
            'validate'  => 'validate_int'
		));
		
        $this->insert_field(array(
            'column'    => 'color_class',
            'type'      => 'varchar',
            'width'     => 255,
			'title'     => 'lng_label_sys_panel_color_class',
			'value'     => '',
            'validate'  => 'sanitize_string'
        ));

        $this->insert_field(array(
            'column'    => 'color_border_class',
            'type'      => 'varchar',
            'width'     => 255,
			'title'     => 'lng_label_sys_panel_color_border_class',
			'value'     => '',
            'validate'  => 'sanitize_string'
        ));

        $this->insert_field(array(
            'column'    => 'color_bg_class',
            'type'      => 'varchar',
            'width'     => 255,
			'title'     => 'lng_label_sys_panel_color_bg_class',
			'value'     => '',
            'validate'  => 'sanitize_string'
        ));
		
        $this->insert_field(array(
            'column' => 'show_close',
            "type"   => "enum",
            "values" => array(
                CT_SHOW      => "lng_label_sys_menu_show",
                CT_HIDE      => "lng_label_sys_menu_hide",
            ),
            'title'  => 'lng_label_sys_panel_show_close',
            'value'  => "1",
        ));
        
        $this->insert_field(array(
            'column' => 'show_maximize',
            "type"   => "enum",
            "values" => array(
                CT_SHOW      => "lng_label_sys_menu_show",
                CT_HIDE      => "lng_label_sys_menu_hide",
            ),
            'title'  => 'lng_label_sys_panel_show_maximize',
            'value'  => "1",
        ));

        $this->insert_field(array(
            'column' => 'show_turn',
            "type"   => "enum",
            "values" => array(
                CT_SHOW        => "lng_label_sys_menu_show",
                CT_HIDE        => "lng_label_sys_menu_hide",
            ),
            'title'  => 'lng_label_sys_panel_show_turn',
            'value'  => 1,
        ));
        
        $this->insert_field(array(
            'column' => 'show_info',
            "type"   => "enum",
            "values" => array(
                CT_SHOW        => "lng_label_sys_menu_show",
                CT_HIDE        => "lng_label_sys_menu_hide",
            ),
            'title'  => 'lng_label_sys_panel_show_info',
            'value'  => 1,
        ));
        
		$this->insert_field(array(
			'column'    => 'app_folder_name',
            'type'      => 'varchar',
            'width'     => 60,
            'value'     => '',
			'null'      => 1,
        ));
	}
    
    /**
    * validate idMenu
    * 
    * @access public
    * @param int $data
    * @return array
    */
    public function custom_menu_validate($data){
        
       if(empty($this->idMenu)) {
            return array('result' => false, 'value' => 'lng_label_sys_menu_id_menu_empty_validation');    
       }
       
       $result = validate_int($data);
       if(!$result['result']) {
        return array('result' => false, 'value' => $result['value']);    
       }
       
       if(!$this->_checkMultiPK()) {
           return array('result' => false, 'value' => 'lng_label_sys_menu_id_menu_unique_validation');
       }
       
       return array('result' => true, 'value' => '');
            
    }
    
    /**
    * validate idPanel
    * 
    * @access public
    * @param int $data
    * @return array
    */
    public function custom_panel_validate($data) {
        
       if(empty($this->idMenu)) {
            return array('result' => false, 'value' => 'lng_label_sys_menu_id_panel_empty_validation');    
       }
       
       $result = validate_int($data);
       if(!$result['result']) {
        return array('result' => false, 'value' => $result['value']);    
       }
       
       if(!$this->_checkMultiPK()) {
           return array('result' => false, 'value' => 'lng_label_sys_menu_id_panel_unique_validation');
       }
       
       return array('result' => true, 'value' => '');
           
    }
    
    /**
    * validate isMenu and idPanel as single PK
    * 
    * @param null
    * @access private
    * @return boolean
    * 
    */
    function _checkMultiPK(){
       
        if((!isset($this->oldIdMenu) && !isset($this->oldIdPanel)) || ($this->oldIdMenu != $this->idMenu || $this->oldIdPanel != $this->idPanel)) {
           
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('COUNT(*) as count');
                           SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from($this->table_name);
                           SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idMenu',     $this->idMenu);
                           SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idPanel',    $this->idPanel);
           $query     = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
           $result    = $query->row(0, 'array');
           
           if($result['count'] > 0) {
               return false;
           }
        }
        
        return true;    
    }	

    function getInfoByPanel($idPanel)
	{
        $where = array('idPanel' => $idPanel);


		SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->order_by('idGrp', 'asc'); 
        $query  =   SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get_where('sys_menugrp', $where);
        $result =   $query->result_array();
		return $result;
		
	}
        
    /**
     * remove one widget by name
     * 
     * @param string $id
     */
    function removeWidget($id){
         $where =   array('idPanel' => $id);
         
         SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->delete($this->table_name, $where);    
    }
    
    /**
     * get panel data
     */
    function getPanelParams(){
        
        $panelData = array();  
        
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select_max('column_menu', 'total');
        $result = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get($this->table_name);
        $data   = $result->first_row('array');
        
        $panelData['total'] = $data['total'];
        
		SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->order_by('order_menu', 'asc'); 
        $result = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get($this->table_name);
        
        $panelData['data']  = $result->result_array(); 
		
		foreach($panelData['data'] as $iter=>$d)
		{   
			$panelData['data'][$iter]['panel_header'] = SHIN_Core::$_language->line($d['panel_header']);
		}

        return $panelData;
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
    * get menu list
    * 
    * @access public
    * @param null
    * @return array
    * 
    */
    function getMenuList(){
        
       $resultObj   = $this->get_expanded_result();
       return $resultObj->result_array();
    }
    
    /** Save given fields from CGI query.
    *
    * @access public
    * @param $fields needed fields for saving from form. 
    * @return NULL
    * @sa SHIN_Model::save()
    */
    function save($fields_to_save = null) {
        
        $fields_to_save = array('idMenu', 'idPanel', 'panel_header', 'collapsed', 'maximized', 'order_menu', 'column_menu', 'color_class', 'color_border_class', 'color_bg_class', 'show_close', 'show_maximize', 'show_turn', 'show_info', 'app_folder_name');
        
        if(!empty($this->ico)){
            $fields_to_save = array_merge($fields_to_save, array('ico'));
        }
        
        $h = parent::save($fields_to_save);
        
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
            $data['ico']            = '"<img src=\"' . prep_url( SHIN_Core::$_config['core']['app_base_url'] . '/' . shinfw_folder() . '/images/' . trim($data['ico'], '"')) . '\" />"';     
            $data['show_close']      = $data['show_close']       ? '"' . SHIN_Core::$_language->line('lng_label_sys_menu_show') . '"' : '"' . SHIN_Core::$_language->line('lng_label_sys_menu_hide') . '"';   
            $data['show_maximize']   = $data['show_maximize']    ? '"' . SHIN_Core::$_language->line('lng_label_sys_menu_show') . '"' : '"' . SHIN_Core::$_language->line('lng_label_sys_menu_hide') . '"';   
            $data['show_turn']       = $data['show_turn']        ? '"' . SHIN_Core::$_language->line('lng_label_sys_menu_show') . '"' : '"' . SHIN_Core::$_language->line('lng_label_sys_menu_hide') . '"';   
            $data['show_info']       = $data['show_info']        ? '"' . SHIN_Core::$_language->line('lng_label_sys_menu_show') . '"' : '"' . SHIN_Core::$_language->line('lng_label_sys_menu_hide') . '"';   
           
        }
        
        return $this->packToJSONData($array_data);
    }
    
    /**
    * @access private
    * @param $input string with html/dom name. 
    * @return NULL
    */
    function _is_uploaded($input_name)
    {
        return
            isset($_FILES[$input_name]) &&
            $_FILES[$input_name]['error'] != UPLOAD_ERR_NO_FILE;
    }
    
    /**
    * upload image to storer
    * 
    * @access public
    * @return null
    * @param null
    * 
    */
    function uploadImg(){
        // copy file to storer
        if($this->_is_uploaded('sys_menu_icon')) {
            SHIN_Core::$_libs['upload']->process_upload(BASEPATH . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR, 'sys_menu_icon');
        }
    }
    
    /**
    * get record with MAX idMenu and idPanel
    * 
    * @param array $param
    * @access public
    * @return array
    */
    public function getMaxRecord(){
        
                    SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('MAX(idMenu) as idMenu, MAX(idPanel) as idPanel');
                    SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from($this->table_name);
       $query     = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
       $result    = $query->row(0, 'array');
       
       return $result;
    }
    
    /**
    * get panel id for DD
    * 
    * @param null
    * @access public
    * @return array
    * 
    */
    public function getPanelIdForDD(){
        
                     SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('idPanel');
                     SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('panel_header');
                     SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from($this->table_name);    
                     SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->group_by('idPanel');
        
        $query     = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
        $result    = $query->result_array();
        
        $list = array();
        foreach($result as $panel) {
            if(!SHIN_Core::$_language->line($panel['panel_header'])) {
                $list[$panel['idPanel']]    = $panel['idPanel'] . ' - ' . $panel['panel_header'];        
            } else {
                $list[$panel['idPanel']]    =   SHIN_Core::$_language->line($panel['panel_header']);
            }    
        }
        
        return $list;    
    }
    
    /**
    * get panels list by idMenu
    * 
    * @access protected
    * @param null
    * @return array
    * 
    */
    function getPanelListByMenuId($idMenu){
        
                    SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('idPanel');
                    SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('panel_header');
                    SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from($this->table_name);
                    SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idMenu', $idMenu);
       $query     = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
       
       $panelList = $query->result_array();
       $list      = array();
       foreach($panelList as $panel) {
           $list[$panel['idPanel']] =   $panel['idPanel'] . ' - ' . (SHIN_Core::$_language->line($panel['panel_header']) ? SHIN_Core::$_language->line($panel['panel_header']) : $panel['panel_header']);  
       }  
       return $list;    
    }
    
    /**
    * get panels list
    * 
    * @access protected
    * @param null
    * @return array
    * 
    */
    function _getPanelList(){
        
                    SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('idPanel');
                    SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('panel_header');
                    SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from($this->table_name);
       $query     = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
       
       return $query->result_array();
    }
    
    /**
    * get menu list
    * 
    * @access protected
    * @param null
    * @return array
    * 
    */
    function _getMenuList(){
                    
                    SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('idMenu');
                    SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from($this->table_name);
                    SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->group_by('idMenu');
       $query     = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
       
       return $query->result_array();    
    }
    
    /**
    * make Panel DD for form
    * 
    * @param string $tableName
    * @param int $selectedId
    * @access public
    * @return string
    */
    function getPanelDDForVizualization($tableName, $selectedId){
        $areaList   = $this->_getPanelList();
        
        $option = '<select id="' . $tableName . '_idPanel" name="' . $tableName . '_idPanel"><option value=""></option>';
        foreach($areaList as $value) {
            if($selectedId == $value['idPanel']) {
                $option  .=  '<option value="' . $value['idPanel'] . '" selected="selected">' . $value['idPanel'] . ' - ' . (SHIN_Core::$_language->line($value['panel_header']) ? SHIN_Core::$_language->line($value['panel_header']) : $value['panel_header']) . '</option>';    
            } else {
                $option  .=  '<option value="' . $value['idPanel'] . '">' . $value['idPanel'] . ' - ' . (SHIN_Core::$_language->line($value['panel_header']) ? SHIN_Core::$_language->line($value['panel_header']) : $value['panel_header']) . '</option>';    
            }    
        }
        $option .= '</select>';
        
        return $option;
    }
    
    /**
    * make Menu DD for form
    * 
    * @param string $tableName
    * @param int $selectedId
    * @access public
    * @return string
    */
    function getMenuDDForVizualization($tableName, $selectedId) {
        
        $areaList   = $this->_getMenuList();
        
        $option = '<select id="' . $tableName . '_idMenu" name="' . $tableName . '_idMenu"><option value=""></option>';
        foreach($areaList as $value) {
            if($selectedId == $value['idMenu']) {
                $option  .=  '<option value="' . $value['idMenu'] . '" selected="selected">' . $value['idMenu'] . '</option>';    
            } else {
                $option  .=  '<option value="' . $value['idMenu'] . '">' . $value['idMenu'] . '</option>';    
            }    
        }
        $option .= '</select>';
        
        return $option;    
    }
} // end of class

/* End of file Panel_model.php */