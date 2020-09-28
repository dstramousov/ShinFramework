<?php

define('CT_SNAPTRACK_CIRCUIT_TYPE_EVENT',   'event');
define('CT_SNAPTRACK_CIRCUIT_TYPE_CIRCUIT', 'circuit');

class Trk_Circuits_model extends SHIN_Model {

    /**
     * Physical tablename.
     */
    var $table_name = 'trk_circuits';

    var $count_photo = NULL;
    
    function __construct()
    {
        parent::__construct($this->table_name);
        
        // PK Index definition
        $this->primary_key  = 'idCircuit';

        $this->insert_index('country');
        $this->insert_index('circuitType');


		// Fields definition
		$this->insert_field(array(
			"column" => "idCircuit",
			"type"   => "integer",
			"attr"   => "auto_increment",			
		));

        $this->insert_field(array(
            'column'            => 'circuit',
            'type'              => 'varchar',
            'width'             => CT_VARCHAR_100,
            'title'             => '',
            'null'              => 0,
            'info_field_txt'    => null,
            'info_field_ico'    => null,
        ));
		
        $this->insert_field(array(
            'column' => 'association_image',
            'type'   => 'varchar',
            'width'  => CT_VARCHAR_100,
			'value'  => '',
	        'null'   => 1,
	        'info_field_txt' => FALSE,
	        'info_field_ico' => FALSE,
        ));

        $this->insert_field(array(
            'column' => "circuitType",
            'type'   => "enum",
            'width'  => 1,
            'values' => array(
                CT_SNAPTRACK_CIRCUIT_TYPE_CIRCUIT	=> "lng_label_lang_type_circuit",
                CT_SNAPTRACK_CIRCUIT_TYPE_EVENT	    => "lng_label_lang_type_event",
            ),
            'value'  => CT_SNAPTRACK_CIRCUIT_TYPE_CIRCUIT,
            'null'   => 0,
            'info_field_txt' => FALSE,
            'info_field_ico' => FALSE,
			'dom_width'  => 'width:40px;',
            'title'  => 'lng_label_lang_'
        ));

        $this->insert_field(array(
            'column'	=> 'country',
            'type'		=> 'char',
            'width'		=> 3,
            'join'		=> array(
                'mode'   => 'left',
                'table'  => 'trk_gcountries',
                'column' => 'idCountry2',
            ),
            'input'  => array(
                'type'          => 'select',
                'from'          => 'trk_gcountries',
                'data'          => 'idCountry2',
                'caption'       => 'fullname',
                'nonset_id'     => '',
                'nonset_name'   => '',
            ),

            'info_field_txt'    => false,
            'info_field_ico'    => false,
        ));
        
        $this->insert_field(array(
            'table'             => 'trk_gcountries',
            'column'            => 'fullname',
            'type'              => 'varchar',
            'width'             => CT_VARCHAR_50,
            'title'             => '',
            'null'              => 0,
            'info_field_txt'    => null,
            'info_field_ico'    => null,
            'virtual'           => true,
        ));
		
    } // end of function


    function getCountPhoto()
    {
    	if(!isset($this->idCircuit)){
    		return 0;
    	} else {
    		$this->idCircuit;
    	}
    }


    /**
    * Override standart function 
    *
    * @access public
    * @param $fields needed fields for validation. By default - all with properties [validate].
    * @return $h hash.
    * @sa SHIN_Model::validate_form()
     */
    function fetchCorrectPagingData($customization_fields = NULL, $where_condition = NULL,  $return_answer_type = DB_FETCH_ANSWER_TYPE_JSON)
    {
        $array_data = parent::fetchCorrectPagingData($customization_fields, $where_condition, DB_FETCH_ANSWER_TYPE_ARRAY);
        
        foreach($array_data['data'] as &$circuit) {
            $circuit['association_image']   =  '"<img src=\"' . SHIN_Core::$_config['core']['app_base_url'] . '/' . SHIN_Core::$_config['gallery']['circuit_associate_photo'] . '/' . trim($circuit['association_image'], '"') . '\" />"';     
        }

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
    } // end of function 

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
        // init needed libs
        $nedded_libs = array('models' => array(array('trk_gcountries_model','trk_gcountries_model')));
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        $h = parent::write_form($fields_to_write, $mode);
        
        $h['trk_circuits_country_input']  =   '<select id="trk_circuits_country" name="trk_circuits_country">';
        
        $countryList    =   SHIN_Core::$_models['trk_gcountries_model']->getCountryList();
		
        foreach($countryList as $key => $val) {
			//dump($this->country, $key);
            $h['trk_circuits_country_input'] .= '<option value="' . $key . '"' . (isset($this->country) && $this->country == $key ? 'selected=selected' : '') . '>' . $val . '</option>';    
        }
        $h['trk_circuits_country_input'] .=   '</select>';

        return $h;
    } // end of function
    
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
    } // end of function
    
    
    /**
    * get circuit list by type and countr
    * 
    * @access public
    * @return array
    * @param $type - string
    * @param $country - string
    * 
    */
    public function getCircuitList($type, $country){
        
                  SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('idCircuit'); 
                  SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('circuit'); 
				  SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->order_by("circuit", "asc"); 
       $query  =  SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get_where($this->table_name, array('circuitType' => $type, 'country' => $country));
       $result = $query->result_array();
        
       $list    =   array('' => '');
       foreach($result as $item) {
            $list[$item['idCircuit']]   =   $item['circuit'];     
       }
       $query->free_result();	   
       
       return $list;
    }
    
        /**
    * Save given fields from CGI query.
    *
    * @access public
    * @param $fields needed fields for saving from form. 
    * @return NULL
    * @sa SHIN_Model::save()
     */
    function save($fields_to_save = null)     
    {
	
        
        $fields_to_save =   array('circuit', 'association_image', 'circuitType', 'country');
        
        if($this->isDefinite()) {
            // update record in the trk_uploadactivity table
            if(!empty($this->association_image)) {
                
                $oldData   =   $this->getCircuitById($this->idCircuit);
                
                // 1. remove old circuit data
                $this->deleteImg($oldData['association_image']);
                
            } else {
                unset($fields_to_save[1]);
            }
        }
		
		// logic for keep association_image
//		dump(params());
        
        $h = parent::save($fields_to_save);
        
        
        return $h;    
    }
    
    /**
    * get circuit type list
    * 
    * @access public
    * @return array
    * @param null 
    * 
    */
    public function getCircuitTypeList(){
        
        return array(''                                => '', 
                     CT_SNAPTRACK_CIRCUIT_TYPE_CIRCUIT => SHIN_Core::$_language->line('lng_label_lang_type_circuit'), 
                     CT_SNAPTRACK_CIRCUIT_TYPE_EVENT   => SHIN_Core::$_language->line('lng_label_lang_type_event'));    
    }
	
    /**
    * 
    * get circuit country list
    * 
    * @access public
    * @return array
    * @param null
    * 
    */
    public function getCircuitCountryList()
	{
        $query = $this->get_expanded_result(array('group_by' => 'country'));
         
		$result = $query->result_array();
        $list   = array('' => ''); 
        foreach($result as $iter) {
			if(!$iter['trk_gcountries_fullname']){
				$list[$iter['country']] = $iter['country'];    
			} else {
				$list[$iter['country']] = $iter['trk_gcountries_fullname'];    
			}
		}
//			dump($list);
//		$query->free_result();
        return $list;    
    }
	
    
    /**
    * 
    * get circuit country list
    * 
    * @access public
    * @return array
    * @param null
    * 
    */
    public function getCircuitCountryList1()
	{
	
       
                  SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('country');    
                  SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->group_by('country');    
         $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get($this->table_name);
         
         $result = $query->result_array();
         $list   = array('' => ''); 
         foreach($result as $country) {
            $list[] =   $country['country'];    
         }
         $query->free_result();

         return $list;    
    }
    
    /**
    * get image count by circuit id
    * 
    * @param int $idCircuit
    * @access public
    * @return int
    */
    public function getImgCountByCircuit($idCircuit){
        
                  SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('COUNT(*) as count'); 
       $query  =  SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get_where('trk_photo', array('circuit' => $idCircuit));
       $result =  $query->row(0, 'array');
       
       $query->free_result();
       
       return $result['count'];
                
    }
    
    /**
    * @access private
    * @param $input string with html/dom name. 
    * @return NULL
    */
    function _is_uploaded($input_name)
    {
        return
            isset($_FILES[$input_name]) &&
            $_FILES[$input_name]['error'] != UPLOAD_ERR_NO_FILE;
    }
    
    /**
    * upload picture to the storer
    * 
    * @access protected
    * @return null
    * @param string $name
    * 
    */
    function _upload($name)
    {
        
        $base_image_path    = SHIN_Core::$_config['core']['base_path'] . SHIN_Core::$_runned_application . DIRECTORY_SEPARATOR . SHIN_Core::$_config['gallery']['circuit_associate_photo'];
        
        SHIN_Core::$_libs['upload']->process_upload($base_image_path, 'trk_circuit_image');
        
    }
    
    /**
    * upload image
    * 
    * @access public
    * @return null
    * @param null
    * 
    */
    function upload(){
        
        // copy file to storer
        if($this->_is_uploaded('trk_circuit_image')) {
            
            $this->_upload($_FILES['trk_circuit_image']['name']);
        }
    }
    
    /**
    * get circuit by id
    * 
    * @param int $idCircuit
    * @access public
    * @return mixed array
    */
    public function getCircuitById($idCircuit){
        
        $query = $this->get_expanded_result(array("where" => 'idCircuit = ' . $idCircuit));
        $data  = $query->row(0, 'array');    
        
        return $data;
        
    }
    
    /**
    * delete circuit record
    * 
    * @param int $idCircuit
    * @access public
    * @return boolean
    */
    public function deleteRec($idCircuit){
        
        $oldData   =   $this->getCircuitById($idCircuit);
                
        // 1. remove old circuit data
        $this->deleteImg($oldData['association_image']);
        
        return parent::deleteRec($idCircuit);
    }
    
    /**
    * delete circuit photo
    * 
    * @param array $photoData - array of data
    * @access public
    * @return null
    */
    function deleteImg($circuitName) {
        
        $circuitPath    = SHIN_Core::$_config['core']['base_path'] . SHIN_Core::$_runned_application . DIRECTORY_SEPARATOR . SHIN_Core::$_config['gallery']['circuit_associate_photo'] .DIRECTORY_SEPARATOR;
        
        if(is_file($circuitPath . $circuitName)) {
            unlink($circuitPath . $circuitName);
        }
    }
    
} // end of class

/* End of file Snaptrack_Circuits_model.php */