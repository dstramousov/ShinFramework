<?php

class Gtrwebsite_Itemscategory_model extends SHIN_Model {

    /**
     * Sight for setup.
     */
    var $setup_include_sight = TRUE;

    /**
     * Physical tablename.
     */
    var $table_name = 'gtrwebsite_itemscategory';

    function __construct()
    {
        parent::__construct($this->table_name);
        
        // PK Index definition
        $this->primary_key   = 'idItemCat';
        
        // Fields definition
        $this->insert_field(array(
            "column"    => "idItemCat",
            "type"      => "integer",
            "null"      => 0,
            "attr"      => "auto_increment",
        ));

        $this->insert_field(array(
            "column"            => "description",
            'type'              => 'varchar',
            'width'             => CT_VARCHAR_50,
            'title'             => '',
            'null'              => 0,
            'info_field_txt'    => false,
            'info_field_ico'    => false,
            'validate'          => 'validate_description'
        ));
                
        $this->insert_field(array(
            'column' => 'userIns',
            'type'   => 'integer',
            'join'   => array(
                'mode'   => 'left',
                'table'  => 'sys_user',
                'column' => 'idUser',
                'as'     => 'sys_user_ins'
            ),
            'null'  =>  1
        ));
        
        $this->insert_field(array(
            'table'     => 'sys_user_ins',
            'type'      => 'varchar',
            'column'    => 'name',
            'null'      => 0,
            'virtual'   => TRUE,
        ));

        $this->insert_field(array(
            'column'	=> 'dataIns',
            'type'		=> 'datetime',
			'value'		=> $this->db_now_datetime(),
            'null'		=> 0,
            'null'        => 1,
            'info_field_ico'	=> 'images/help.png',
            'info_field_txt'	=> 'lang_label_gtrwebsite_itemscategory_datains',
        ));

        $this->insert_field(array(
            'column' => 'userMod',
            'type'   => 'integer',
            'join'   => array(
                'mode'   => 'left',
                'table'  => 'sys_user',
                'column' => 'idUser',
                'as'     => 'sys_user_mod'
            ),
            'null'  =>  1
        ));
        
        $this->insert_field(array(
            'table'     => 'sys_user_mod',
            'type'      => 'varchar',
            'column'    => 'name',
            'null'      => 0,
            'virtual'   => TRUE,
        ));

        $this->insert_field(array(
            'column'	=> 'dataMod',
            'type'		=> 'timestamp',
			'value'		=> $this->db_now_datetime(),
            'null'		=> 0,
            'null'      => 1,
            'info_field_ico'	=> 'images/help.png',
            'info_field_txt'	=> 'lang_label_gtrwebsite_itemscategory_datamod',
        ));
        
    }
    
    /**
    * validate description field
    * 
    * @param string $data
    * @access public
    * @return array
    */
    function validate_description($data) {
        return sanitize_string($data);    
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
            $data['description']    =   '"<a href=javascript:void(0); onclick=loadItems(' . trim($data['idItemCat'], '"') . ')>' . trim($data['description'], '"') . '</a>"';    
        }
        
        // costomization logic 

        // end of customization logic 

        return $this->packToJSONData($array_data);
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
    * Save given fields from CGI query.
    *
    * @access public
    * @param $fields needed fields for saving from form. 
    * @return NULL
    * @sa SHIN_Model::save()
     */
    function save($fields_to_save = null) {
        
        $fields_to_save = array('description');
        
        if($this->isDefinite()) {
            $this->dataMod  =   $this->db_now_datetime();
            $this->userMod  =   SHIN_Core::$_libs['auth']->user->idUser;
        
            $fields_to_save = array_merge($fields_to_save , array('userMod', 'dataMod'));
            
        } else {
            $this->dataIns  =   $this->db_now_datetime();    
            $this->userIns  =   SHIN_Core::$_libs['auth']->user->idUser;    
        
            $fields_to_save = array_merge($fields_to_save , array('dataIns', 'userIns'));
        }
        
        $h = parent::save($fields_to_save);
        
        return $h;    
    }

    /**
    * Return count items for needed category.
    *
    * @access public
    * @param $fields needed fields for reading from form. 
    * @return NULL
    * @sa SHIN_Model::read_form()
     */
    function getCountItems($id = NULL)
    {
    	$ret = 0;
		
		if($id==NULL){
			$_ID = $this->idItemCat;
		} else {
			$_ID = $id;
		}
		
		$query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->query('select count(*) as count from gtrwebsite_items where idItemCat='.$_ID);
        $row = $query->row(0, 'array');

    	return $row['count'];
    }

    /**
    * Cascade deleting for 2 tables. ItemCategory, Item
    *
    * @access public
    * @param $idItem
    * @return NULL
     */
    function cascadeDelete($idItemCat)
    {
		// 1. remove all from gtrwebsite_items
		SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->delete('gtrwebsite_items', array('idItemCat' => $idItemCat)); 
		
		// 2. remove from this table.
		SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->delete($this->table_name, array('idItemCat' => $idItemCat)); 

    	return;
    }
    
    
    /**
    * get information about category
    * 
    * @param int $categoryId
    * @access public
    * @return array
    */
    function getCategoryInfo($categoryId){
        
                 SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idItemCat', $categoryId);
                 SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from($this->table_name);
        $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
        
        return $query->row(0, 'array');        
    }
    
   /**
   * get category list for DD
   *  
   * @param null
   * @access public
   * @return array
   */
    public function getCategoryListForDD(){
        
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('idItemCat');    
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('description');    
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->order_by('description');    
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from($this->table_name);    
        
        $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
        $result= $query->result_array();
        
        $list = array();
        foreach($result as $value) {
            $list[$value['idItemCat']]  =   $value['description'];    
        }
        
        return $list;
    }

} // end of class

/* End of file Gtrwebsite_Itemscategory_model.php */
