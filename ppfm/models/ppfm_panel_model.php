<?php

class Ppfm_Panel_model extends SHIN_Model {

    /**
     * Physical tablename.
     */
    var $table_name = 'ppfm_panel';

    function __construct()
	{
        parent::__construct($this->table_name);
		
		// PK Index definition
        $this->primary_key   = 'id';
		
		// Index definition
        //$this->insert_index('index(id)');
        $this->insert_index('idPanel');
				
		// Fields definition
		$this->insert_field(array(
			"column" => "id",
			"type"   => "integer",
			"attr"   => "auto_increment",			
		));
		
        $this->insert_field(array(
            'column' => 'idPanel',
            'type'   => 'varchar',
            'width'  => 255,
			'title'  => 'lng_label_sys_panel_id',
			'value'  => '',
            'null'   => 0
        ));
		
        $this->insert_field(array(
            'column' => 'panel_header',
            'type'   => 'varchar',
            'width'  => 255,
			'title'  => 'lng_label_sys_panel_header',
			'value'  => '',
            'null'   => 1
        ));
		
        $this->insert_field(array(
            'column' => 'collapsed',
            'type'   => 'smallint',
            'width'  => 5,
			'title'  => 'lng_label_sys_panel_collapsed',
			'value'  => 0,
            'null'   => 1
        ));
		
        $this->insert_field(array(
            'column' => 'maximized',
            'type'   => 'smallint',
            'width'  => 5,
			'title'  => 'lng_label_sys_panel_collapsed',
			'value'  => 0,
            'null'   => 1
        ));
		
        $this->insert_field(array(
            'column' => 'style',
            'type'   => 'varchar',
            'width'  => 255,
			'title'  => 'lng_label_sys_panel_collapsed',
			'value'  => 0,
            'null'   => 1
        ));
		
        $this->insert_field(array(
            'column' => 'order_menu',
            'type'   => 'smallint',
            'width'  => 5,
			'title'  => 'lng_label_sys_panel_order',
			'value'  => 0,
            'null'   => 1
        ));

        $this->insert_field(array(
            'column' => 'column_menu',
            'type'   => 'smallint',
            'width'  => 5,
			'title'  => 'lng_label_sys_panel_column',
			'value'  => 0,
            'null'   => 1
        ));
		
        $this->insert_field(array(
            'column' => 'color_class',
            'type'   => 'varchar',
            'width'  => 255,
			'title'  => 'lng_label_sys_panel_color_class',
			'value'  => '',
            'null'   => 1
        ));

        $this->insert_field(array(
            'column' => 'color_border_class',
            'type'   => 'varchar',
            'width'  => 255,
			'title'  => 'lng_label_sys_panel_color_border_class',
			'value'  => '',
            'null'   => 1
        ));

        $this->insert_field(array(
            'column' => 'color_bg_class',
            'type'   => 'varchar',
            'width'  => 255,
			'title'  => 'lng_label_sys_panel_color_bg_class',
			'value'  => '',
            'null'   => 1
        ));
        
        $this->insert_field(array(
            'column' => 'show_close',
            'type'   => 'smallint',
            'width'  => 5,
            'title'  => 'lng_label_sys_panel_show_close',
            'value'  => 0,
            'null'   => 1
        ));
        
        $this->insert_field(array(
            'column' => 'show_maximize',
            'type'   => 'smallint',
            'width'  => 5,
            'title'  => 'lng_label_sys_panel_show_maximize',
            'value'  => 0,
            'null'   => 1
        ));
        
        $this->insert_field(array(
            'column' => 'show_turn',
            'type'   => 'smallint',
            'width'  => 5,
            'title'  => 'lng_label_sys_panel_show_turn',
            'value'  => 0,
            'null'   => 1
        ));
        
        $this->insert_field(array(
            'column' => 'show_info',
            'type'   => 'smallint',
            'width'  => 5,
            'title'  => 'lng_label_sys_panel_show_info',
            'value'  => 0,
            'null'   => 1
        ));
        
        $this->insert_field(array(
            'column' => 'ajax_data_url',
            'type'   => 'varchar',
            'width'  => 255,
            'title'  => 'lng_label_sys_panel_ajax_data_url',
            'value'  => '',
            'null'   => 1
        ));
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
        $where = array('idPanel' => $data['idPanel']);
        
        $query  =   SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get_where($this->table_name, $where);
        $result =   $query->result_array();
        
        if(empty($result)){
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert($this->table_name, $data);    
        } else {
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->update($this->table_name, $data, $where); 
        }
    
    }
    
    /**
     * Fetch all widgets.
     *
     * @access public
     * @input:  null
     * @output: array
     */
    function fetchAllWidgets()
    {
        return $this->getLastRec(100);
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
     * 
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

} // end of class

/* End of file Panel_model.php */