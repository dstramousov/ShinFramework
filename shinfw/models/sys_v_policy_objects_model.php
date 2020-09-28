<?php

class Sys_V_Policy_Objects_model extends SHIN_Model {

    /**
     * Physical view name.
     */
    var $table_name = 'sys_v_policy_objects';
	
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
	`sys_userrole`.`idRole` AS `idElem`,
	`sys_userrole`.`role` AS `name`,
	`sys_userrole`.`grp` AS `grp`,
	'role' AS `idType` 
FROM 
	`sys_userrole` UNION SELECT 
			`sys_user`.`idUser` AS `idElem`,
			CONCAT(`sys_user`.`lastname`,' ',`sys_user`.`name`) AS `name`,
			'base' AS `grp`,
			'user' AS `idType` 
		FROM `sys_user`;";		
		
		$this->db_obj_type = DB_OBJ_TYPE_VIEW; // !!!!!!!
		
		// PK Index definition
        $this->primary_key   = array('idElem');
		
		// Fields definition
		$this->insert_field(array(
			'column' => 'idElem',
            'type'   => 'varchar',
            'width'  => 15,
            'value'  => '',
			'null'   => 0,
		));
        
        $this->insert_field(array(
            'column'	=> 'name',
            'type'		=> 'varchar',
            'width'		=> 91,
            'title'		=> '',
            'null'		=> 0,
        ));
		
        $this->insert_field(array(
            'column'	=> 'grp',
            'type'		=> 'varchar',
            'width'		=> 4,
            'title'		=> '',
            'null'		=> 0,
        ));
        $this->insert_field(array(
            'column'	=> 'idType',
            'type'		=> 'varchar',
            'width'		=> 4,
            'title'		=> '',
            'null'		=> 0,
        ));
	}
    
} // end of class

/* End of file Panel_model.php */