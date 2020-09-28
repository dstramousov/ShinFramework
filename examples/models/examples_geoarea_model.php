<?php

class Examples_geoarea_model extends SHIN_Model {

    /**
     * Physical tablename.
     */
    var $table_name = 'examples_geoarea';

    function __construct()
    {
        parent::__construct($this->table_name);
        
        // PK Index definition
        $this->primary_key   = 'idArea';
        
        $this->insert_field(array(
            'column'    => 'idArea',
            'type'      => 'tinyint',
            'width'     => 1,
            'null'      => 0,
        ));
        
        $this->insert_field(array(
            'column'    => 'area',
            'type'      => 'varchar',
            'width'     => 30,
            'null'      => 0,
        ));
        
        $this->insert_field(array(
            'column'    => 'zone',
            'type'      => 'varchar',
            'width'     => 20,
            'null'      => 0,
        ));
        
        $this->insert_field(array(
            'column'    => 'idCountry',
            'type'      => 'char',
            'width'     => 3,
            'null'      => 0,
        ));
        
        $this->insert_field(array(
            'column'    => 'sort',
            'type'      => 'tinyint',
            'width'     => 4,
            'null'      => 0,
        ));
    } 
}// end of class

/* End of file examples_geoarea.php */