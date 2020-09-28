<?php

class Sys_MenuRows_model extends SHIN_MPKModel {

    /**
     * Physical tablename.
     */
    var $table_name = 'sys_menurows';

    function __construct() 
	{
        parent::__construct($this->table_name);
		
		// PK Index definition
        $this->primary_key  = array('idMenu', 'idApplication');		
		
				
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
            'validate'  => 'validate_int'
		));
		
		$this->insert_field(array(
			"column"    => "idPanel",
			"type"      => "tinyint",
            "null"      => 0,
            'value'     => '',
            'validate'  => 'validate_int'
		));
		
		$this->insert_field(array(
			"column"    => "idApplication",
			"type"      => "tinyint",
            "null"      => 0,
            'value'     => '',
            'validate'  => 'custom_application_validate'
		));
		
		$this->insert_field(array(
			'column'    => 'label',
            'type'      => 'varchar',
            'width'     => 60,
            'value'     => '',
			'null'      => 0,
            'validate'  => 'sanitize_string'
		));
		
        $this->insert_field(array(
            "column"    => "newPage",
            "type"   => "enum",
            "values" => array(
                'y'	=> "lng_label_sys_menurows_newpage_y",
                'n'	=> "lng_label_sys_menurows_newpage_n",
            ),
            "value"  => 'n',
            "null"   => 0,
            'title'  => 'lng_label_sys_menurows_newpage'
        ));

        $this->insert_field(array(
            "column" => "type",
            "type"   => "enum",
            "values" => array(
                'l'	=> "lng_label_sys_menurows_type_l",
                'w'	=> "lng_label_sys_menurows_type_w",
            ),
            "value"  => 'l',
            "null"   => 0,
            "title"  => 'lng_label_sys_menurows_type',
        ));				
		
		$this->insert_field(array(
			"column"    => "position",
			"type"      => "tinyint",
            "null"      => 0,
            'value'     => '',
            'validate'  => 'validate_int'
		));
		
        $this->insert_field(array(
            "column"    => "active",
            "type"   => "enum",
            "values" => array(
                'y'	=> "lng_label_sys_menurows_active_y",
                'n'	=> "lng_label_sys_menurows_active_n",
            ),
            "value"  => 'y',
            "null"   => 0,
            "title"  => 'lng_label_sys_menurows_active',
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
            return array('result' => false, 'value' => 'lng_label_sys_menu_rows_menu_id_empty_validation');    
       }
       
       if(!$this->_checkMultiPK()) {
           return array('result' => false, 'value' => 'lng_label_sys_menu_rows_menu_id_unique_validation');
       }
       
       return array('result' => true, 'value' => '');    
    }
    
    /**
    * validate idApplication
    * 
    * @access public
    * @param int $data
    * @return array
    */
    function custom_application_validate($data) {
        
       if(empty($this->idApplication)) {
            return array('result' => false, 'value' => 'lng_label_sys_menu_rows_app_id_empty_validation');    
       }
       
       if(!$this->_checkMultiPK()) {
           return array('result' => false, 'value' => 'lng_label_sys_menu_rows_app_id_unique_validation');
       }
       
       return array('result' => true, 'value' => '');    
    }
    
    /**
    * validate isMenu and idApplication as single PK
    * 
    * @param null
    * @access private
    * @return boolean
    * 
    */
    function _checkMultiPK(){
       
        if((!isset($this->oldIdMenu) && !isset($this->oldIdApplication)) || ($this->oldIdMenu != $this->idMenu || $this->oldIdApplication != $this->idApplication)) {
           
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('COUNT(*) as count');
                           SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from($this->table_name);
                           SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idMenu',          $this->idMenu);
                           SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idApplication',   $this->idApplication);
           $query     = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
           $result    = $query->row(0, 'array');
           
           if($result['count'] > 0) {
               return false;
           }
        }
        
        return true;    
    }
	
    /**
    * get application info
    * 
    * @param int $idPanel
    * @param int $idGrp
    */
	function getApplicationInfo($idPanel, $idGrp)
	{
        $where = array('idPanel' => $idPanel, 'idGrp' => $idGrp);

		SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->order_by('position', 'asc'); 
        $query  =   SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get_where($this->table_name, $where);
        $result =   $query->result_array();
		
		return $result;
		
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
		$h                  = parent::write_form($fields_to_write, $mode);
        $applicationList    = SHIN_Core::$_models['sys_structapplication_model']->getApplicationListForDD(null, null);
        
        $h[$this->table_name . '_idApplication_input'] = '<select id="sys_menurows_idApplication" name="sys_menurows_idApplication"><option value=""></option>';
        foreach($applicationList as $key => $value) {
            if($this->idApplication == $key) {
                $h[$this->table_name . '_idApplication_input']  .=  '<option value="' . $key . '" selected="selected">' . $value . '</option>';    
            } else {
                $h[$this->table_name . '_idApplication_input']  .=  '<option value="' . $key . '">' . $value . '</option>';    
            }    
        }
        $h[$this->table_name . '_idApplication_input'].= '</select>';
        
        $h[$this->table_name . '_idMenu_input']  = SHIN_Core::$_models['sys_menu_model']->getMenuDDForVizualization($this->table_name, $this->idMenu);
        
        if(!$this->isDefinite()) {
            $h[$this->table_name . '_idPanel_input'] = '<select id="' . $this->table_name . '_idPanel" name="' . $this->table_name . '_idPanel"><option value=""></option></select>';
            $h[$this->table_name . '_idGrp_input']   = '<select id="' . $this->table_name . '_idGrp" name="' . $this->table_name . '_idGrp"><option value=""></option></select>';
        } else {
            $h[$this->table_name . '_idPanel_input'] = SHIN_Core::$_models['sys_menu_model']->getPanelDDForVizualization($this->table_name, $this->idPanel);
            
            $grpList    =   SHIN_Core::$_models['sys_menugrp_model']->getGrpListByIds($this->idMenu, $this->idPanel);
            $h[$this->table_name . '_idGrp_input'] = '<select id="' . $this->table_name . '_idGrp" name="' . $this->table_name . '_idGrp"><option value=""></option>';
            foreach($grpList as $key => $value) {
                if($key == $this->idPanel) {
                    $h[$this->table_name . '_idGrp_input'] .= '<option value="' . $key . '" selected="selected">' . $value . '</option>';    
                } else {
                    $h[$this->table_name . '_idGrp_input'] .= '<option value="' . $key . '">' . $value . '</option>';    
                }
            }
            $h[$this->table_name . '_idGrp_input'].= '</select>';
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
    * get menu rows list
    * 
    * @access public
    * @param null
    * @return array
    * 
    */
    function getMenuRowsList(){
        
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
                                'models' => array(array('sys_menu_model', 'sys_menu_model'),
                                                  array('sys_menugrp_model', 'sys_menugrp_model'),
                                                  array('sys_structapplication_model', 'sys_structapplication_model'),
                                                  array('sys_modulelist_model', 'sys_modulelist_model'))
                            );

        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        // 1. load language label for all applications
        $this->loadApplicationLang();
        
        $panelList  = SHIN_Core::$_models['sys_menu_model']->getPanelIdForDD();
        $array_data = parent::fetchCorrectPagingData($customization_fields, $where_condition, DB_FETCH_ANSWER_TYPE_ARRAY);
        
        foreach($array_data['data'] as &$data) {
           $data['idApplication']   = '"' . trim($data['idApplication'], '"') . '-' . SHIN_Core::$_models['sys_structapplication_model']->getApplicationNameById(trim($data['idApplication'], '"')) . '"';
           $data['idGrp']           = '"' . trim($data['idGrp'], '"') . '-' . SHIN_Core::$_models['sys_menugrp_model']->getGrpNameById(trim($data['idMenu'], '"'), trim($data['idGrp'], '"'), trim($data['idPanel'], '"')) . '"';
           $data['idPanel']         = isset($panelList[trim($data['idPanel'], '"')]) ? '"' . trim($data['idPanel'], '"') . '-' . $panelList[trim($data['idPanel'], '"')] . '"' : '"' . trim($data['idPanel'], '"') . '"';
        }
        
        // costomization logic 

        // end of customization logic 

        return $this->packToJSONData($array_data);
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

/* End of file Sys_MenuRows_model.php */
