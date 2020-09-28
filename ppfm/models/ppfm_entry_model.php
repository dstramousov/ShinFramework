<?php

class Ppfm_Entry_model extends SHIN_Model {

    /**
     * Physical tablename.
     */
    var $table_name = 'ppfm_entry';

    function __construct()
	{
        parent::__construct($this->table_name);
		
		// PK Index definition
        $this->primary_key   = 'idEntry';
		
		// Index definition
        $this->insert_index('idHolder');
        $this->insert_index('idCat');
        $this->insert_index('idAccount');
        $this->insert_index('idUser');
				
		// Fields definition
		$this->insert_field(array(
			"column" => "idEntry",
			"type"   => "integer",
			"attr"   => "auto_increment",
		));
		
        $this->insert_field(array(
            "column" => 'type',
            "type"   => 'enum',
            'width'  => 3,
            "title"  => 'lng_label_entry_type',
            "values" => array(
                '+'		=> "lng_label_entry_type_c",
                '-'		=> "lng_label_entry_type_d",
            ),
            "value" => '+',
            "null"   => 1
		));
		
        $this->insert_field(array(
            'column' => 'idHolder',
            'type'   => 'integer',
            
            'join'   => array(
                'mode'   => 'left',
                'table'  => 'ppfm_holder',
                'column' => 'idHolder',
            ),

            'input'  => array(
                'type'     => 'select',
                'from'     => 'ppfm_holder',
                'data'     => 'idHolder',
                'caption'  => 'holder',
                'nonset_id'     => '',
                'nonset_name'   => '---',
            ),
			'validate' => 'validate_int',
            'null'     => 0,
            'info_field_txt' => FALSE,
            'info_field_ico' => FALSE,
        ));

        $this->insert_field(array(
            'table'  => 'ppfm_holder',
            'column' => 'holder',
            'type'   => 'varchar',
            'width'  => 45,
            'title'  => 'lng_label_holder_name',
            'null'     => 0,
            'info_field_txt' => FALSE,
            'info_field_ico' => FALSE,
			'virtual' => TRUE,
		));
		
		
        $this->insert_field(array(
            'column' => 'idCat',
            'type'   => 'integer',
            
            'join'   => array(
                'mode'   => 'left',
                'table'  => 'ppfm_category',
                'column' => 'idCat',
            ),

            'input'  => array(
                'type'     => 'select',
                'from'     => 'ppfm_category',
                'data'     => 'idCat',
                'caption'  => 'cat',
                'nonset_id'     => '',
                'nonset_name'   => '---',
            ),
			'validate' => 'validate_int',
            'null'     => 0,
            'info_field_txt' => FALSE,
            'info_field_ico' => FALSE,
        ));

        $this->insert_field(array(
            'table'  => 'ppfm_category',
            'column' => 'cat',
            'type'   => 'varchar',
            'width'  => 45,
            'null'     => 0,
            'title'  => 'lng_label_category_name',
            'info_field_txt' => FALSE,
            'info_field_ico' => FALSE,
			'virtual' => TRUE,
		));

        $this->insert_field(array(
            'column' => 'text',
            'type'   => 'varchar',
            'width'  => 120,
            'value'  => '',
            'title'  => 'lng_label_entry_text',
            'validate' => 'ppfm_entry_text_field_validate',
            'null'     => 0,
            'info_field_txt' => FALSE,
            'info_field_ico' => FALSE,
		));

        $this->insert_field(array(
            'column' => 'idAccount',
            'type'   => 'integer',
            
            'join'   => array(
                'mode'   => 'left',
                'table'  => 'ppfm_account',
                'column' => 'idAccount'
            ),
			
            'input'  => array(
                'type'     => 'select',
                'from'     => 'ppfm_account',
                'data'     => 'idAccount',
                'caption'  => 'account',
                'nonset_id'     => '',
                'nonset_name'   => '---',
            ),
			'validate' => 'validate_int',
            'null'     => 0,
            'info_field_txt' => FALSE,
            'info_field_ico' => FALSE,
        ));

        $this->insert_field(array(
            'table'  => 'ppfm_account',
            'column' => 'account',
            'type'   => 'varchar',
            'width'  => 45,
            'title'  => 'lng_label_account_name',
			'virtual' => TRUE,
		));

        $this->insert_field(array(
            'column' => 'amount',
            'type'   => 'double',
			'width'	 => 10,
			'prec'   => 2,
            'value'  => 0,
            'null'	 => 1,
			'validate' => 'validate_float',
        ));
		
        $this->insert_field(array(
			'column' => 'date',
            'type'   => 'date',
            'value'  => $this->db_now_datetime(),
            'title'  => 'lang_label_creation_date',
            'input'  => array(
						'type'     		=> 'templater',
						'assignto'		=> 'elementid',
						),
			'validate' => 'validate_date',
            'null'     => 1 
        ));
		
        $this->insert_field(array(
            'column' => 'idUser',
            'type'   => 'integer',
            'value'  => 0,

            'join'   => array(
                'mode'   => 'left',
                'table'  => 'sys_user',
                'column' => 'idUser',
            ),

            'input'  => array(
                'type'     => 'select',
                'from'     => 'sys_user',
                'data'     => 'idUser',
                'caption'  => 'username',
                'nonset_id'     => '',
                'nonset_name'   => '---',
            ),
			'validate' => 'validate_int',
            'null'     => 0,
            'info_field_txt' => FALSE,
            'info_field_ico' => FALSE,
        ));                               

        $this->insert_field(array(
            'table'  => 'sys_user',
            'column' => 'username',
            'type'   => 'varchar',
            'width'  => 45,
            'title'  => 'lng_label_account_name',
            'select' => 'concat(sys_user.name, " ", sys_user.lastname)',
			'virtual' => TRUE,
		));
						
    }
	
	// Test function 
	function ppfm_entry_text_field_validate($data) {
        
        if(empty($data)) {
            return array('result' => false, 'value' => 'lng_label_incorrect_entry_text');
        }
            return array('result' => true, 'value' => '');    
    }
    
    function getLastTenRecords(){
        
       $data  =  array();
         
		SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->limit(10);
		SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('text')->select('amount');
		$result =  SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get($this->table_name);
       
       foreach ($result->result_array() as $row) {
           $data[] = $row;
       }
       
       return $data;
        
    }
    
    /**
    * delete one record by PK
    * 
    * @param int $id
    */
    function deleteRecordById($id){
        
        $where  = array($this->pk => $id);  
        
        return SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->delete($this->table_name, $where);
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

/* End of file Entity_model.php */
