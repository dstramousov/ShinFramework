<?php

class Examples_geocountry_model extends SHIN_Model {

    /**
     * Physical tablename.
     */
    var $table_name = 'examples_geocountry';

    function __construct()
    {
        parent::__construct($this->table_name);
        
        // PK Index definition
        $this->primary_key   = 'idCountry';
        
        $this->insert_field(array(
            'column'    => 'idCountry',
            'type'      => 'char',
            'width'     => 3,
            'null'      => 0,
            'value'     => '',
			'comments'  => 'Codice ISO 3166-1 alpha3'
        ));
                
        $this->insert_field(array(
            'column'    => 'country',
            'type'      => 'varchar',
            'width'     => 15,
            'null'      => 0,
        ));
        
        $this->insert_field(array(
            'column'    => 'id_ext',
            'type'      => 'varchar',
            'width'     => 10,
            'null'      => 1,
        ));
    }
    
    /**
    * get country list
    * 
    * @param null
    * @return array of countrys
    * 
    */
    function getCountryList(){
        
        $result = array();
        
                 SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('idCountry');    
                 SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('country');    
                 SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from($this->table_name);    
        $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
        
        $data = $query->result_array();
        
        foreach($data as $value) {
            $result[$value['idCountry']]    =   $value['country'];
        }
        
        return $result; 
    }
    
    /**
    * get country by country code
    * 
    * @param string $code
    * @return string
    */
    function getCountryByCode($code) {
        
                 SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('country');    
                 SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from($this->table_name);    
                 SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idCountry', $code);    
        $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
        
        $data  = $query->row(0, 'array');
        
        return $data['country']; 
            
    }
} // end of class

/* End of file examples_geocountry.php */