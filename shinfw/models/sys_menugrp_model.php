<?php

class Sys_MenuGrp_model extends SHIN_MPKModel {

    /**
     * Physical tablename.
     */
    var $table_name = 'sys_menugrp';

    function __construct() 
	{
        parent::__construct($this->table_name);
		
		// PK Index definition
        $this->primary_key   = array('idMenu', 'idGrp', 'idPanel');
		
		// Fields definition
		$this->insert_field(array(
			"column"    => "idMenu",
			"type"      => "tinyint",
            "null"      => 0,
            'value'     => '',
            'validate'  => 'custom_menu_validate'
		));
		
		$this->insert_field(array(
			"column"    => "idGrp",
			"type"      => "tinyint",
            "null"      => 0,
            'value'     => '',
            'validate'  => 'custom_grp_validate'
		));
		
		$this->insert_field(array(
			"column"    => "idPanel",
			"type"      => "tinyint",
            "null"      => 0,
            'value'     => '',
            'validate'  => 'custom_panel_validate'
		));
		
		$this->insert_field(array(
			'column'    => 'title',
            'type'      => 'varchar',
            'width'     => 60,
            'value'     => '',
			'null'      => 0,
            'validate'  => 'sanitize_string'
		));
		
		$this->insert_field(array(
			'column' => 'class',
            'type'   => 'varchar',
            'width'  => 50,
            'value'  => '',
			'null'   => 1,
		));
		
		$this->insert_field(array(
			'column' => 'ico',
            'type'   => 'varchar',
            'width'  => 60,
            'value'  => '',
			'null'   => 1,
		));
		
		$this->insert_field(array(
			"column"    => "position",
			"type"      => "tinyint",
            "null"      => 0,
            'value'     => '',
            'validate'  => 'validate_int'
		));
	}
    
    /**
    * validate idMenu
    * 
    * @access public
    * @param int $data
    * @return array
    */
    function custom_menu_validate($data) {
        
       if(empty($this->idMenu)) {
            return array('result' => false, 'value' => 'lng_label_sys_menu_grp_id_menu_empty_validation');    
       }
       
       if(!$this->_checkMultiPK()) {
           return array('result' => false, 'value' => 'lng_label_sys_menu_grp_id_menu_unique_validation');
       }
       
       return array('result' => true, 'value' => '');
            
    }
    
    /**
    * validate idGrp
    * 
    * @access public
    * @param int $data
    * @return array
    */
    function custom_grp_validate($data) {
        
       if(empty($this->idGrp)) {
            return array('result' => false, 'value' => 'lng_label_sys_menu_grp_id_grp_empty_validation');    
       }
       
       $result = validate_int($data);
       if(!$result['result']) {
        return array('result' => false, 'value' => $result['value']);    
       }
       
       if(!$this->_checkMultiPK()) {
           return array('result' => false, 'value' => 'lng_label_sys_menu_grp_id_grp_unique_validation');
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
    function custom_panel_validate($data) {
        
       if(empty($this->idPanel)) {
            return array('result' => false, 'value' => 'lng_label_sys_menu_grp_id_panel_empty_validation');    
       }
       
       if(!$this->_checkMultiPK()) {
           return array('result' => false, 'value' => 'lng_label_sys_menu_grp_id_panel_unique_validation');
       }
       
       return array('result' => true, 'value' => '');    
    }
    
    /**
    * validate isMenu and idPanel and idGrp as single PK
    * 
    * @param null
    * @access private
    * @return boolean
    * 
    */
    function _checkMultiPK(){
       
        if((!isset($this->oldIdMenu) && !isset($this->oldIdPanel) && !isset($this->oldIdGrp)) || ($this->oldIdMenu != $this->idMenu || $this->oldIdPanel != $this->idPanel || $this->oldIdGrp != $this->idGrp)) {
           
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('COUNT(*) as count');
                           SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from($this->table_name);
                           SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idMenu',     $this->idMenu);
                           SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idPanel',    $this->idPanel);
                           SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idGrp',      $this->idGrp);
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
        // 1. load language label for all applications
        $this->loadApplicationLang();
        
		$h          = parent::write_form($fields_to_write, $mode);
        
        $h[$this->table_name . '_idMenu_input']  = SHIN_Core::$_models['sys_menu_model']->getMenuDDForVizualization($this->table_name, $this->idMenu);
        
        if(!$this->isDefinite()) {
            $h[$this->table_name . '_idPanel_input'] = '<select id="' . $this->table_name . '_idPanel" name="' . $this->table_name . '_idPanel"><option value=""></option></select>';
        } else {
            $h[$this->table_name . '_idPanel_input'] = SHIN_Core::$_models['sys_menu_model']->getPanelDDForVizualization($this->table_name, $this->idPanel);
        }
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
    
    /** Save given fields from CGI query.
    *
    * @access public
    * @param $fields needed fields for saving from form. 
    * @return NULL
    * @sa SHIN_Model::save()
    */
    function save($fields_to_save = null) {
        
        $fields_to_save = array('idMenu', 'idGrp', 'idPanel', 'title', 'class', 'position');
        
        if(!empty($this->ico)){
            $fields_to_save = array_merge($fields_to_save, array('ico'));
        }
        
        $h = parent::save($fields_to_save);
        
        return $h;    
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
        if($this->_is_uploaded('sys_menugrp_icon')) {
            SHIN_Core::$_libs['upload']->process_upload(BASEPATH . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR, 'sys_menugrp_icon');
        }
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
    * get menu grp list
    * 
    * @access public
    * @param null
    * @return array
    * 
    */
    public function getMenuGrpList(){
        
       $resultObj   = $this->get_expanded_result();
       return $resultObj->result_array();
    }
    
    /**
    * store information about sys menu grp in db
    * 
    * @param null 
    * @access public
    * @return null
    * 
    */
    function storeSysMenuGrp(){
        
        $data = array('idMenu'      =>  $this->idMenu,
                      'idPanel'     =>  $this->idPanel,
                      'idGrp'       =>  $this->idGrp,
                      'title'       =>  $this->title,
                      'class'       =>  $this->class,
                      'position'    =>  $this->position);
        
        if($this->_is_uploaded('sys-menu-grp-icon')) {
            // copy file to storer
            $this->_uploadIcon($_FILES['sys-menu-grp-icon']['name']);
        
            $data['ico']   =   $_FILES['sys-menu-grp-icon']['name'];
        }
        
        if(empty($this->oldIdMenu) && empty($this->oldIdPanel) && empty($this->oldIdGrp)) {
            
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert($this->table_name, $data);
            
        } else {
            
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idMenu',    $this->idMenu);
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idPanel',   $this->idPanel);
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idGrp',     $this->idGrp);
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->update($this->table_name, $data); 
            
            // delete old icon
            $this->_deleteOldIcon();        
        }
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
                                'models' => array(array('sys_menu_model', 'sys_menu_model'),
                                                  array('sys_modulelist_model', 'sys_applicationlist_model'))
                            );

        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        // 1. load language label for all applications
        $this->loadApplicationLang();
        
        $panelList  = SHIN_Core::$_models['sys_menu_model']->getPanelIdForDD();
        $array_data = parent::fetchCorrectPagingData($customization_fields, $where_condition, DB_FETCH_ANSWER_TYPE_ARRAY);
        foreach($array_data['data'] as &$data) {
            $data['ico']            = '"<img src=\"' . prep_url( SHIN_Core::$_config['core']['app_base_url'] . '/' . shinfw_folder() . '/images/' . trim($data['ico'], '"')) . '\" />"';     
            $data['idPanel']         = '"' . trim($data['idPanel'], '"') . '-' . $panelList[trim($data['idPanel'], '"')] . '"';
        }
        
        // costomization logic 

        // end of customization logic 

        return $this->packToJSONData($array_data);
    }
    
    /**
    * get name by PK keys
    * 
    * @param int $idMenu
    * @param int $idGrp
    * @param int $idPanel
    * @access public
    * @return array
    */
    function getGrpNameById($idMenu, $idGrp, $idPanel){
        
       $this->loadApplicationLang(); 
    
                    SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('title');
                    SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from($this->table_name);
                    SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idMenu',     $idMenu);
                    SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idPanel',    $idPanel);
                    SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idGrp',      $idGrp);
       $query     = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
       $result    = $query->row(0, 'array');
       
       if(isset($result['title'])) {
           if(SHIN_Core::$_language->line($result['title'])) {
               return SHIN_Core::$_language->line($result['title']);
           } else {
               return $result['title'];
           }
       }
    }
    
    /**
    * get record with MAX idGrp
    * 
    * @param array $param
    * @access public
    * @return array
    */
    public function getMaxRecord(){
        
                    SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('MAX(idGrp) as idGrp');
                    SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from($this->table_name);
       $query     = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
       $result    = $query->row(0, 'array');
       
       return $result;
    }
    
    /**
    * get panels list by idMenu and idPanel
    * 
    * @access protected
    * @param null
    * @return array
    * 
    */
    public function getGrpListByIds($idMenu, $idPanel){
        
                    SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('idGrp');
                    SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('title');
                    SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from($this->table_name);
                    SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idMenu',  $idMenu);
                    SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idPanel', $idPanel);
       $query     = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
       
       $panelList = $query->result_array();
       $list      = array();
       foreach($panelList as $panel) {
           $list[$panel['idGrp']] =   $panel['idGrp'] . ' - ' . (SHIN_Core::$_language->line($panel['title']) ? SHIN_Core::$_language->line($panel['title']) : $panel['title']);  
       }  
       return $list;
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
