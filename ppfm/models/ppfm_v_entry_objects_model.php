<?php

class Ppfm_V_Entry_Objects_model extends SHIN_Model {

    /**
     * Physical view name.
     */
    var $table_name = 'ppfm_v_entry_objects';
	
    /**
     * SQL for create this view.
     */
    var $create_SQL = '';
	
    function __construct() 
	{
        parent::__construct($this->table_name);
		
		$this->create_SQL = $this->view_standart_addons_prefix."
        VIEW `".$this->table_name."`AS
        SELECT 
	        `ppfm_entry`.`idEntry`,
	        `ppfm_entry`.`type`,
            `ppfm_entry`.`idHolder`,
            `ppfm_holder`.`holder`,
            `ppfm_entry`.`idCat`,
            `ppfm_category`.`cat`,
            `ppfm_entry`.`text`,
            `ppfm_entry`.`idAccount`,
            `ppfm_account`.`account`,
            `ppfm_account`.`curAmount`,
            `ppfm_entry`.`amount`,
            `ppfm_entry`.`date`,
            `ppfm_entry`.`idUser`,
            `sys_user`.`name`,
	        `sys_user`.`lastname`
        FROM 
	        `ppfm_entry`
        LEFT JOIN ppfm_holder ON `ppfm_entry`.`idHolder` = `ppfm_holder`.`idHolder`
        LEFT JOIN ppfm_category ON `ppfm_entry`.`idCat` = `ppfm_category`.`idCat`
        LEFT JOIN ppfm_account ON `ppfm_entry`.`idAccount` = `ppfm_account`.`idAccount`
        LEFT JOIN sys_user ON `ppfm_entry`.`idUser` = `sys_user`.`idUser`";		
		
		$this->db_obj_type = DB_OBJ_TYPE_VIEW;
		
		// PK Index definition
        $this->primary_key   = 'idEntry';
		
		// Fields definition
		$this->insert_field(array(
			'column' => 'idEntry',
            'type'   => 'integer',
            'value'  => '',
			'null'   => 0,
		));
        
        $this->insert_field(array(
            "column" => 'type',
            "type"   => 'enum',
            'width'  => 3,
            "title"  => 'lng_label_entry_type',
            "values" => array(
                '+'        => "lng_label_entry_type_c",
                '-'        => "lng_label_entry_type_d",
            ),
            "value" => '+',
            "null"   => 1
        ));
		
        $this->insert_field(array(
            'column'	=> 'idHolder',
            'type'		=> 'integer',
            'title'		=> '',
            'null'		=> 0,
        ));
        
        $this->insert_field(array(
            'column'    => 'holder',
            'type'      => 'varchar',
            'width'     => 45,
            'title'     => '',
            'null'      => 0,
        ));
        
        $this->insert_field(array(
            'column'    => 'idCat',
            'type'      => 'integer',
            'title'     => '',
            'null'      => 0,
        ));
        
        $this->insert_field(array(
            'column'    => 'cat',
            'type'      => 'varchar',
            'width'     => 45,
            'title'     => '',
            'null'      => 0,
        ));
        
        $this->insert_field(array(
            'column'    => 'text',
            'type'      => 'varchar',
            'width'     => 120,
            'title'     => '',
            'null'      => 0,
        ));
        
        $this->insert_field(array(
            'column'    => 'idAccount',
            'type'      => 'integer',
            'title'     => '',
            'null'      => 0,
        ));
        
        $this->insert_field(array(
            'column'    => 'account',
            'type'      => 'varchar',
            'width'     => 45,
            'title'     => '',
            'null'      => 0,
        ));
        
        $this->insert_field(array(
            'column'    => 'curAmount',
            'type'      => 'float',
            'width'     => 7,
            'prec'      => 3,
            'title'     => '',
            'null'      => 0,
        ));
        
        $this->insert_field(array(
            'column'    => 'amount',
            'type'      => 'double',
            'width'     => 10,
            'prec'      => 2,
            'title'     => '',
            'null'      => 0,
        ));
        
        $this->insert_field(array(
            'column'    => 'date',
            'type'      => 'date',
            'value'     => $this->db_now_datetime(),
            'title'     => '',
            'null'      => 0,
        ));
        
        $this->insert_field(array(
            'column'    => 'idUser',
            'type'      => 'integer',
            'title'        => '',
            'null'        => 0,
            'value'     => 0
        ));
        
        $this->insert_field(array(
            'column'    => 'name',
            'type'      => 'varchar',
            'width'     => 45,
            'title'     => '',
            'null'      => 0,
            'value'     => 0
        ));
        
        $this->insert_field(array(
            'column'	=> 'lastname',
            "type"      => "varchar",
            'width'     => 45,
            'title'		=> '',
            'null'		=> 0,
            'value'     => 0
        ));
	}
    
} // end of class

/* End of file Panel_model.php */