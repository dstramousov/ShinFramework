<?php

class Examples_crmmasterdata_extended_model extends Examples_crmmasterdata_model {

    function __construct()
    {
        parent::__construct();
        
        // Fields definition
        $this->insert_field(array(
            "column" => "lat",
            "type"   => "float",
            'width'  => 10,
            'prec'   => 3,
            'null'   => 1,
            'value'  => 0
        ));
        
        $this->insert_field(array(
            'column' => 'lng',
            'type'   => 'float',
            'width'  => 10,
            'prec'   => 3,
            'null'   => 1,
            'value'  => 0
        ));
    }
    
    /**
    * update data by id
    * 
    * @param int $id
    * @param array $data
    * @return boolean
    */
    public function updateById($id, $data) {
        
               SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idCustomer', $id);
        return SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->update($this->table_name, $data);    
    }
    
    /**
    * try to make batch geolocalization fo addresss
    * 
    * @param in $id
    * @param array $address
    * @return array
    */
    public function batchGeolocalization($address, $id = null){
        
        if(!empty($address)) {
            $data  =   current(SHIN_Core::$_libs['maps']->batchGeolocalization(array(array('id' => 1, 'data' => $address))));
            
            if(!empty($data['lat']) && !empty($data['lng'])) {
                //update record in db
                if(!is_null($id)) {
                    $result = $this->updateById($id, array('lat' => $data['lat'], 'lng' => $data['lng']));
                    if($result) {
                        return array($data['lat'], $data['lng'], $data['error']);
                    }
                } else {
                    return array($data['lat'], $data['lng'], $data['error']);    
                }
            }      
        }
            return array(0, 0, $data['error']);
    }
    
    /**
    * Prepare html for edit/add current object information.
    *
    * @access public
    * @param $fields needed fields for write to template. By default - ALL.
    * @return $h hash.
    * @sa SHIN_Model::write_form()
     */
    function save($fields_to_save = null)
    {
        $is_definite = $this->isDefinite();
        $address     = $this->address . ', ' . $this->city . ', ' . SHIN_Core::$_models['examples_geoprovince_model']->getProvinceByCode($this->province) . ', ' . $this->postalCode . ', ' . SHIN_Core::$_models['examples_geocountry_model']->getCountryByCode($this->country);
        
        list($this->lat, $this->lng) = $this->batchGeolocalization($address);
        
        $h = parent::save();
        
        return $h;     
    }
    
    
} // end of class

/* End of file examples_crmmasterdata_extended_model.php */
