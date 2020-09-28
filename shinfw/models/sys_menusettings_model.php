<?php

class Sys_MenuSettings_model extends SHIN_MPKModel {

    /**
     * Physical tablename.
     */
    var $table_name = 'sys_menusettings';

    function __construct() 
	{
        parent::__construct($this->table_name);
		
		// PK Index definition
        $this->primary_key   = array('idMenu', 'idUser', 'idPanel');

		$this->insert_field(array(
			"column"    => "idMenu",
			"type"      => "tinyint",
            "null"      => 0,
            'value'     => '',
            'validate'  => 'custom_menuid_validate',
		));
		
		$this->insert_field(array(
			"column" => "idUser",
			"type"   => "tinyint",
            "null"   => 0,
            'value'  => '',
            'join'   => array(
                'mode'   => 'left',
                'table'  => 'sys_user',
                'column' => 'idUser',
            ),
            'input'  => array(
                'type'          => 'select',
                'from'          => 'sys_user',
                'data'          => 'idUser',
                'caption'       => 'name',
                'nonset_id'     => '',
                'nonset_name'   => '',
            ),
            'validate'  => 'custom_userid_validate',
		));
        
        $this->insert_field(array(
            'table'             => 'sys_user',
            'column'            => 'name',
            'type'              => 'varchar',
            'width'             => 45,
            'title'             => '',
            'null'              => 0,
            'info_field_txt'    => false,
            'info_field_ico'    => false,
            'virtual'           => true,
        ));
		
		$this->insert_field(array(
			"column"    => "idPanel",
			"type"      => "tinyint",
            "null"      => 0,
            'value'     => '',
            'validate'  => 'custom_panelid_validate',
		));

        $this->insert_field(array(
            'column' => 'collapsed',
            "type"   => "enum",
            "values" => array(
                CT_SHOW        => "lng_label_sys_menu_yes",
                CT_HIDE        => "lng_label_sys_menu_no",
            ),
			'title'  => 'lng_label_sys_panel_collapsed',
			'value'  => 1,
        ));
		
        $this->insert_field(array(
            'column' => 'maximized',
            "type"   => "enum",
            "values" => array(
                CT_SHOW        => "lng_label_sys_menu_yes",
                CT_HIDE        => "lng_label_sys_menu_no",
            ),
			'title'  => 'lng_label_sys_panel_collapsed',
			'value'  => 1,
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
                CT_SHOW        => "lng_label_sys_menu_show",
                CT_HIDE        => "lng_label_sys_menu_hide",
            ),
            'title'  => 'lng_label_sys_panel_show_close',
            'value'  => 1,
        ));
        
        $this->insert_field(array(
            'column' => 'show_maximize',
            "type"   => "enum",
            "values" => array(
                CT_SHOW        => "lng_label_sys_menu_show",
                CT_HIDE        => "lng_label_sys_menu_hide",
            ),
            'title'  => 'lng_label_sys_panel_show_maximize',
            'value'  => 1,
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

		
	}
    
    /**
    * validate idMenu
    * 
    * @access public
    * @return array()
    * $param int - $data
    * 
    */
    public function custom_menuid_validate($data){
        
       if(empty($this->idMenu)) {
            return array('result' => false, 'value' => 'lng_label_menuid_empty_validation');    
       }
       
       $result = validate_int($data);
       if(!$result['result']) {
        return array('result' => false, 'value' => $result['value']);    
       }
       
       if(!$this->_checkMultiPK()) {
           return array('result' => false, 'value' => 'lng_label_menuid_unique_validation');
       }
       
       return array('result' => true, 'value' => '');    
    }
    
    /**
    * validate idUser
    * 
    * @access public
    * @return array()
    * $param int - $data
    * 
    */
    public function custom_userid_validate($data){
       
       if(empty($this->idUser)) {
            return array('result' => false, 'value' => 'lng_label_userid_empty_validation');    
       }
       
       if(!$this->_checkMultiPK()) {
           return array('result' => false, 'value' => 'lng_label_userid_unique_validation');
       }
       
       return array('result' => true, 'value' => '');    
    }
    
    /**
    * validate idPanel
    * 
    * @access public
    * @return array()
    * $param int - $data
    * 
    */
    public function custom_panelid_validate($data){
        
       if(empty($this->idPanel)) {
            return array('result' => false, 'value' => 'lng_label_panelid_empty_validation');    
       }
       
       $result = validate_int($data);
       if(!$result['result']) {
        return array('result' => false, 'value' => $result['value']);    
       }
       
       if(!$this->_checkMultiPK()) {
           return array('result' => false, 'value' => 'lng_label_panelid_unique_validation');
       }
       
       return array('result' => true, 'value' => '');    
    }
    
    /**
    * validate idMenu and idUser and idPanel as single PK
    * 
    * @param null
    * @access private
    * @return boolean
    * 
    */
    function _checkMultiPK(){
       
        if((!isset($this->oldUserId) && !isset($this->oldMenuId) && !isset($this->oldPanelId)) || ($this->oldUserId != $this->idUser || $this->oldMenuId != $this->idMenu || $this->oldPanelId != $this->idPanel)) {
           
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('COUNT(*) as count');
                           SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from($this->table_name);
                           SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idMenu',       $this->idMenu);
                           SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idUser',       $this->idUser);
                           SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idPanel',      $this->idPanel);
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
        
        $h['sys_menusettings_idMenu_input']   =   SHIN_Core::$_models['sys_menu_model']->getMenuDDForVizualization('sys_menusettings', $this->idMenu);
        
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
    * get menu settings list
    * 
    * @access public
    * @return array
    * @param null
    * 
    */
    public function getMenuSetingsList(){
        
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
        $array_data = parent::fetchCorrectPagingData($customization_fields, $where_condition, DB_FETCH_ANSWER_TYPE_ARRAY);
        foreach($array_data['data'] as &$data) {
           $data['show_close']      = $data['show_close']       ? '"' . SHIN_Core::$_language->line('lng_label_sys_menu_show') . '"' : '"' . SHIN_Core::$_language->line('lng_label_sys_menu_hide') . '"';   
           $data['show_maximize']   = $data['show_maximize']    ? '"' . SHIN_Core::$_language->line('lng_label_sys_menu_show') . '"' : '"' . SHIN_Core::$_language->line('lng_label_sys_menu_hide') . '"';   
           $data['show_turn']       = $data['show_turn']        ? '"' . SHIN_Core::$_language->line('lng_label_sys_menu_show') . '"' : '"' . SHIN_Core::$_language->line('lng_label_sys_menu_hide') . '"';   
           $data['show_info']       = $data['show_info']        ? '"' . SHIN_Core::$_language->line('lng_label_sys_menu_show') . '"' : '"' .SHIN_Core::$_language->line('lng_label_sys_menu_hide') . '"';   
        }
        
        return $this->packToJSONData($array_data);
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
     * Insert one record.
     *
     * @access public
     * @input:  array
     * @output: null
     */
    function updateState($data)
    {
        $where = array('idPanel' => $data['idPanel'],
                       'idMenu'  => $data['idMenu']);
        
        $query  =   SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get_where($this->table_name, $where);
        $result =   $query->result_array();
        
        if(empty($result)){
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert($this->table_name, $data);    
        } else {
           $result = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->update($this->table_name, $data, $where);
        }
    
    }
    
    /**
    *  get menu setting for current user
    * 
    * @param int $userId - user id
    * @access public
    * @return array
    */
    function getPanelParams($userId){
        
        $panelData = array();  
        
                  SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select_max('column_menu', 'total');
                  SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idUser', $userId);
        $result = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get($this->table_name);
        $data   = $result->first_row('array');
        
        $panelData['total'] = $data['total'];
        
                  SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->order_by('order_menu', 'asc'); 
                  SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idUser', $userId);
        $result = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get($this->table_name);
        
        $panelData['data']  = $result->result_array(); 
        
        return $panelData;
    }
    
    /**
    * merge two config arrays
    *  
    * @param array $defaultParams
    * @param array $currentParams
    * @access public
    * @return array
    */
    function mergeParams($defaultParams, $currentParams){
        
        foreach($defaultParams['data'] as &$defaultValue) {
            foreach($currentParams['data'] as &$currentValue) {
                if($defaultValue['idMenu'] == $currentValue['idMenu'] && $defaultValue['idPanel'] == $currentValue['idPanel']) {
                    $defaultValue['collapsed']         =   $currentValue['collapsed'];       
                    $defaultValue['maximized']         =   $currentValue['maximized'];       
                    $defaultValue['column_menu']       =   $currentValue['column_menu'];       
                    $defaultValue['color_class']       =   $currentValue['color_class'];       
                    $defaultValue['color_border_class']=   $currentValue['color_border_class'];       
                    $defaultValue['color_bg_class']    =   $currentValue['color_bg_class'];       
                    $defaultValue['show_close']        =   $currentValue['show_close'];       
                    $defaultValue['show_maximize']     =   $currentValue['show_maximize'];       
                    $defaultValue['show_turn']         =   $currentValue['show_turn'];       
                    $defaultValue['show_info']         =   $currentValue['show_info'];       
                }
            }
        }
        
        return $defaultParams;
    }
    
    /** 
    * Reset menu setting for requested user, if user id = null -> reset menu setting for all users. 
    * @access public  
    * @param $user_id User id form sys_user table. 
    * @return NULL
    */
    function resetMenuSettings($user_id = NULL) {
        
        if(!is_null($user_id)) {
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idUser', $user_id);
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->delete($this->table_name);    
        } else {
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->empty_table($this->table_name);    
        } 
    }

} // end of class

/* End of file Sys_MenuSettings_model.php */
