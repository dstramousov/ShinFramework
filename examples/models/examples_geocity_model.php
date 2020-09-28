<?php

class Examples_geocity_model extends SHIN_Model {

    /**
     * Physical tablename.
     */
    var $table_name = 'examples_geocity';

    function __construct()
    {
        parent::__construct($this->table_name);
        
        // PK Index definition
//        $this->primary_key   = 'idCity';
        $this->primary_key   = array('idCity', 'idCountry');
        
        $this->insert_field(array(
            'column'    => 'idCountry',
            'type'      => 'char',
            'width'     => 3,
            'null'      => 0,
            'value'     => 'ITA'
        ));
        
        $this->insert_field(array(
            'column'    => 'idCity',
            'type'      => 'smallint',
            'width'     => 5,
            'null'      => 0,
            'attr'      => 'auto_increment'
        ));
		        
        $this->insert_field(array(
            'column'    => 'city',
            'type'      => 'varchar',
            'width'     => 50,
            'null'      => 0,
        ));
        
        $this->insert_field(array(
            'column'    => 'idProv',
            'type'      => 'char',
            'width'     => 2,
            'null'      => 0,
        ));
        
        $this->insert_field(array(
            'column'    => 'idReg',
            'type'      => 'tinyint',
            'width'     => 4,
            'null'      => 0,
        ));
        
        $this->insert_field(array(
            'column'    => 'postalCode',
            'type'      => 'char',
            'width'     => 5,
            'null'      => 0,
        ));
        
    }
    
    /**
    * get data for city autocomplete
    * 
    * @param string $searchedTerm - searched city
    * @return array
    */
    function autocompleteCity($searchedTerm) {
        
        $result = array();
        
                 SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('city');    
                 SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from($this->table_name);    
                 SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('city LIKE ', $searchedTerm . '%');
        $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
        
        $data = $query->result_array();
        foreach($data as $value) {
            $stdObj        =   new stdClass();
            $stdObj->id    =   $value['city'];
            $stdObj->label =   $value['city'];
            $stdObj->value =   $value['city'];
        
            $result[]      =   $stdObj;
        }
        
        return $result;
            
    }
    
    /**
    * get extended info about CITY
    * 
    * @param string $cityName  - city name
    * @return array
    */
    function getExtendedInfoAboutCity($cityName){
    
        $result = array();
        
                 SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from($this->table_name);    
                 SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from(SHIN_Core::$_models['examples_geoprovince_model']->table_name);    
                 SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from(SHIN_Core::$_models['examples_geocountry_model']->table_name);    
                 SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('city', $cityName);
                 SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where($this->table_name . '.idProv = ' . SHIN_Core::$_models['examples_geoprovince_model']->table_name . '.idProvince');
                 SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where($this->table_name . '.idCountry = ' . SHIN_Core::$_models['examples_geocountry_model']->table_name . '.idCountry');
        $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
        
        $data = $query->row(0, 'array');
        
        $result['postalCode']   =   $data['postalCode'];
        $result['province']     =   $data['idProvince'];
        $result['country']      =   $data['idCountry'];
        
        return $result;
    }
    
    /**
    * check if city exists
    * 
    * @param string $cityName  - city name
    * @return boolean 
    */
    function getCityByName($cityName) {
        
                 SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('city');    
                 SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from($this->table_name);    
                 SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('city', $cityName);
        $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
        
        $data  = $query->row(0, 'array');
        
        if(isset($data['city'])) {
            return true;
        } 
            return false;
    }
    
    /**
    * add nex city
    * 
    * @param string $country
    * @param string $cityName
    * @param string $province
    * @param string $postalCode
    * @return boolean
    */
    function addNewCity($country, $cityName, $province, $postalCode) {
        return SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert($this->table_name, array('idCountry' => $country,
                                                                                                 'city'      => $cityName,
                                                                                                 'idProv'    => $province,
                                                                                                 'idReg'     => 12,   
                                                                                                 'postalCode'=> $postalCode));
    }
        

} // end of class

/* End of file examples_geocity.php */