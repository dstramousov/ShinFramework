<?php

class Examples_geoprovince_model extends SHIN_Model {

    /**
     * Physical tablename.
     */
    var $table_name = 'examples_geoprovince';

    function __construct()
    {
        parent::__construct($this->table_name);
        
        // PK Index definition
        $this->primary_key   = array('idCountry', 'idProvince');
        
        $this->insert_field(array(
            'column'    => 'idCountry',
            'type'      => 'char',
            'width'     => 3,
            'null'      => 0,
            'value'     => 'ITA'
        ));
        
        $this->insert_field(array(
            'column'    => 'idProvince',
            'type'      => 'char',
            'width'     => 2,
            'null'      => 0,
        ));
        
        $this->insert_field(array(
            'column'    => 'province',
            'type'      => 'varchar',
            'width'     => 40,
            'null'      => 0,
        ));
        
        $this->insert_field(array(
            'column'    => 'area',
            'type'      => 'tinyint',
            'width'     => 5,
            'null'      => 0,
            'comments'  => 'Corrisponde a regione'
        ));
        
        $this->insert_field(array(
            'column'    => 'sort',
            'type'      => 'tinyint',
            'width'     => 4,
            'null'      => 0,
        ));
    }
    
    /**
    * get province list
    * 
    * @param null
    * @return array of provinces
    * 
    */
    function getProvinceList(){
        
        $result = array();
        
                 SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('idProvince');    
                 SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('province');    
                 SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from($this->table_name);    
        $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
        
        $data = $query->result_array();
        
        foreach($data as $value) {
            $result[$value['idProvince']]    =   $value['province'];
        }
        
        return $result; 
    }
    
    /**
    * get province by province code
    * 
    * @param string $code
    * @return string
    */
    function getProvinceByCode($code) {
        
                 SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('province');    
                 SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from($this->table_name);    
                 SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idProvince', $code);    
        $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
        
        $data  = $query->row(0, 'array');
        
        return $data['province']; 
            
    }
} // end of class

/* End of file examples_geoprovince.php */