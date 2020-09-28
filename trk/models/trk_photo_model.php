<?php

define('PHOTO_RATE_1', '1');
define('PHOTO_RATE_2', '2');
define('PHOTO_RATE_3', '3');
define('PHOTO_RATE_4', '4');
define('PHOTO_RATE_5', '5');

define('PHOTO_RATE_MIN_VALUE', '1');
define('PHOTO_RATE_MAX_VALUE', '5');

define('CT_PHOTO_ACTIVE',	'show');
define('CT_PHOTO_SUSPEND',	'suspended');
define('CT_PHOTO_HIDE',	'hide');

class Trk_Photo_model extends SHIN_Model {

    /**
     * Physical tablename.
     */
    var $table_name = 'trk_photo';

    function __construct()
	{
        parent::__construct($this->table_name);
		
		// PK Index definition
        $this->primary_key   = 'idPhoto';
        $this->insert_index('sysname');
        $this->insert_index('carLicensePlate');
        $this->insert_index('raceday');
        $this->insert_index('racetime');
        $this->insert_index('carNumber');
        $this->insert_index('carPilot');
        $this->insert_index('carBrandName');
        $this->insert_index('rate');

		
		// Fields definition
		$this->insert_field(array(
			"column" => "idPhoto",
			"type"   => "integer",
			"attr"   => "auto_increment",			
		));

        $this->insert_field(array(
            'column'   => 'description',
            'type'     => 'text',
            'null'     => 1,
            'input'  => array(
                'type'     => 'tinymce',
            ),
//            'validate'  => 'sanitize_string',
            'title'  => 'lng_label_snaptrack_photo_description',
            'info_field_txt'    => false,
            'info_field_ico'    => false,
        ));
		
        $this->insert_field(array(
            'column' => "status",
            'type'   => "enum",
            'width'  => 1,
            'values' => array(
                CT_PHOTO_ACTIVE	    => "lng_label_lang_photo_active",
                CT_PHOTO_SUSPEND	=> "lng_label_lang_photo_suspend",
                CT_PHOTO_HIDE	    => "lng_label_lang_photo_hide",
            ),
            'value'  => CT_PHOTO_ACTIVE,
            'null'   => 1,
            'info_field_txt' => FALSE,
            'info_field_ico' => FALSE,
			'dom_width'  => 'width:40px;',
            'title'  => 'lng_label_lang_photo_status'
        ));
		
		
		// internal name of the system
        $this->insert_field(array(
            'column' => 'sysname',
            'type'   => 'varchar',
            'width'  => CT_VARCHAR_255,
			'value'  => '',
	        'null'   => 1,
	        'info_field_txt' => FALSE,
	        'info_field_ico' => FALSE,
        ));
		

        $this->insert_field(array(
			'column' => 'upload_date',
            'type'   => 'datetime',
            'title'  => 'lng_label_snaptrack_photo_upload_date',
			'value'  => $this->db_now_datetime(),
        ));

        $this->insert_field(array(
            'column' => 'userId',
            'type'   => 'integer',
            'join'   => array(
                'mode'   => 'left',
                'table'  => 'sys_user',
                'column' => 'idUser',
            ),
            'info_field_txt'    => false,
            'info_field_ico'    => false,
        ));
        
        $this->insert_field(array(
            'table'             => 'sys_user',
            'column'            => 'name',
            'type'              => 'varchar',
            'width'             => 45,
            'title'             => '',
            'null'              => 0,
            'info_field_txt'    => null,
            'info_field_ico'    => null,
            'virtual'           => true,
        ));
        
        // custom colors ////////////////////////////////////
        $this->insert_field(array(
            'column' => 'circuit',
            'type'   => 'integer',
            'join'   => array(
                'mode'   => 'left',
                'table'  => 'trk_circuits',
                'column' => 'idCircuit',
            ),
            'input'  => array(
                'type'          => 'select',
                'from'          => 'trk_circuits',
                'data'          => 'idCircuit',
                'caption'       => 'circuit',
                'nonset_id'     => '',
                'nonset_name'   => '',
            ),
//            'validate'          => 'validate_int',
            'info_field_txt'    => false,
            'info_field_ico'    => false,
        ));
        
        $this->insert_field(array(
            'table'             => 'trk_circuits',
            'column'            => 'circuit',
            'type'              => 'varchar',
            'width'             => CT_VARCHAR_100,
            'title'             => '',
            'null'              => 0,
            'info_field_txt'    => null,
            'info_field_ico'    => null,
            'virtual'           => true,
        ));
        
        $this->insert_field(array(
            'table'             => 'trk_circuits',
            'column'            => 'circuitType',
            'type'              => 'varchar',
            'width'             => CT_VARCHAR_100,
            'title'             => '',
            'null'              => 0,
            'info_field_txt'    => null,
            'info_field_ico'    => null,
            'virtual'           => true,
        ));
        
        $this->insert_field(array(
            'table'             => 'trk_circuits',
            'column'            => 'country',
            'type'              => 'varchar',
            'width'             => CT_VARCHAR_100,
            'title'             => '',
            'null'              => 0,
            'info_field_txt'    => null,
            'info_field_ico'    => null,
            'virtual'           => true,
        ));

        /*
        $this->insert_field(array(
			'column' => 'circuit',
            'type'   => 'tinyint',
            'title'  => 'lng_label_snaptrack_photo_circuit',
			'value'  => 1,
            'null'   => 1,
        ));
        */

        $this->insert_field(array(
			'column' => 'raceday',
            'type'   => 'date',
            'title'  => 'lng_label_snaptrack_photo_raceday',
			'value'  => $this->db_now_date(),
            'null'   => 1
        ));

        $this->insert_field(array(
			'column' => 'racetime',
            'type'   => 'time',
            'title'  => 'lng_label_snaptrack_photo_racetime',
			'value'  => $this->db_now_time(),
            'null'   => 1
        ));

        $this->insert_field(array(
            'column' => 'carLicensePlate',
            'type'   => 'varchar',
            'width'  => CT_VARCHAR_100,
			'title'  => 'lng_label_snaptrack_carlicenseplate',
			'value'  => '',
	        'null'   => 1,
	        'info_field_txt' => FALSE,
	        'info_field_ico' => FALSE,
        ));

        $this->insert_field(array(
            'column' => 'carNumber',
            'type'   => 'varchar',
            'width'  => CT_VARCHAR_50,
			'title'  => 'lng_label_snaptrack_carnumber',
			'value'  => '',
	        'null'   => 1,
	        'info_field_txt' => FALSE,
	        'info_field_ico' => FALSE,
        ));
		
        $this->insert_field(array(
            'column' => 'carPilot',
            'type'   => 'varchar',
            'width'  => CT_VARCHAR_50,
			'title'  => 'lng_label_snaptrack_carpilot',
			'value'  => '',
	        'null'   => 1,
	        'info_field_txt' => FALSE,
	        'info_field_ico' => FALSE,
        ));
		
        $this->insert_field(array(
            'column' => 'carBrandName',
            'type'   => 'varchar',
            'width'  => CT_VARCHAR_50,
			'title'  => 'lng_label_snaptrack_carbrandname',
			'value'  => '',
	        'null'   => 1,
	        'info_field_txt' => FALSE,
	        'info_field_ico' => FALSE,
        ));
		
        $this->insert_field(array(
            'column' => 'carBrandName',
            'type'   => 'varchar',
            'width'  => CT_VARCHAR_100,
			'title'  => 'lng_label_snaptrack_carmodelcarcolor',
			'value'  => '',
	        'null'   => 1,
	        'info_field_txt' => FALSE,
	        'info_field_ico' => FALSE,
        ));
		
        $this->insert_field(array(
            "column"         => 'rate',
            "type"           => 'int',
            'width'          => 1,
            "title"          => 'lng_label_photo_rate',
            "value"          => 0,
            "null"           => 1,
            'info_field_txt' => FALSE,
            'info_field_ico' => FALSE,
		));
		
        $this->insert_field(array(
			'column'	=> 'raters',
            'type'      => 'float',
			'width'     => 7,
			'prec'      => 2,
            'title'  => 'lng_label_snaptrack_photo_raters',
			'value'  => 0,
            "null"   => 1,
            'info_field_txt' => FALSE,
            'info_field_ico' => FALSE,
        ));
        
        $this->insert_field(array(
            'table'  => $this->table_name,
            'column' => 'folder',
            'type'   => 'varchar',
            'update' => 0,
            'store'  => 0,
            'title'  => 'lng_label_account_name',
            'select' => 'DATE_FORMAT(upload_date, "%Y%m%d")',
            'virtual' => TRUE,
        ));
	} // end of function
    
    function img_validate($data) {
        if(!$this->isDefinite()) {
            return sanitize_string($data);
        } else {
            return array('result' => true, 'value' => '');
        }    
    } 

    /**
	* Set rate for status.
	*
	* @access public
	* @param $photoId integer
	* @param $rate_value integer
	* @return $ret integer -> current rating value
	* @sa SHIN_Model::setRate()
     */
	function setRate($photoId, $rate_value)
	{   
        // 1. if rate value < 0  or > 5 we make return with 0 value
		if((int)$rate_value <= 0 || (int)$rate_value > 5){
            $rate_value = 0;
        }
		
        // 1.1 get curent value
		$this->fetchByID($photoId);
        
        $this->rate += $rate_value;
        $this->raters++;
	
		$data = array(
					   'rate'		=> $this->rate,
					   'raters'		=> $this->raters,
					);
        
        
		SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idPhoto', $photoId);
		SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->update('trk_photo', $data);

		return array('score' => floor($this->rate / $this->raters), 'raters' => $this->raters);
	} // end of function 
		
     
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
		$ctype = param('circuitType');
		$country = param('circuitCountry');
		$circuit = param('trk_photo_circuit');
		
		if($ctype == ''){
			$h['trk_photo_circuittype'] = 'Mandatory fields';
		}
		
		if($country == ''){
			$h['trk_photo_circuitcountry'] = 'Mandatory fields';
		}
		
		if($circuit == ''){
			$h['trk_photo_circuit'] = 'Mandatory fields';
		}
				
		return $h;

//		return $h;
	} // end of function 

	function validate_circuit()
	{
		$ctype = param('circuit-type');
		$country = param('circuit-country');
		$circuit = param('circuit');
		
		dump($h);
		
		if($ctype == ''){
			$h['trk_photo_circuittype'] = 'Mandatory fields';
		}
		
		if($country == ''){
			$h['trk_photo_circuitcountry'] = 'Mandatory fields';
		}
		
		if($circuit == ''){
			$h['trk_photo_circuit'] = 'Mandatory fields';
		}
		
				
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
        
        if(isset($h['trk_photo_galleryId']) && !empty($h['trk_photo_galleryId'])) {
            $h['trk_photo_sysname']   =   SHIN_Core::$_config['core']['app_base_url'] . '/' . SHIN_Core::$_config['gallery']['photo_storer_folder'] . '/' . $h['trk_photo_userId']  . '/' . $h['trk_photo_folder']  . '/' . SHIN_Core::$_config['store']['thumbnails_prefix'] . $h['trk_photo_sysname'];   
        } else {
            $h['trk_photo_sysname']   =   '';   
        }
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
    * Save given fields from CGI query.
    *
    * @access public
    * @param $fields needed fields for saving from form. 
    * @return NULL
    * @sa SHIN_Model::save()
     */
    function save($fields_to_save = null) 	
	{
		if(SHIN_Core::$_input->post('trk_photo_idPhoto')){
			$fields_to_save = array('description', 'userId', 'circuit', 'raceday', 'racetime', 'carLicensePlate', 'carNumber', 'carPilot', 'carBrandName', 'status');
		}else{
			$fields_to_save = array('description', 'upload_date', 'userId', 'circuit', 'raceday', 'racetime', 'carLicensePlate', 'carNumber', 'carPilot', 'carBrandName', 'status');
	        $this->upload_date   =   $this->db_now_datetime();
		}
        
        // get old info
        if(!empty($this->idPhoto)) {
            $oldPhotoInfo   = $this->getPhotoById($this->idPhoto);  
        }
           
        if(!empty($this->sysname)) {
            $fields_to_save = array_merge($fields_to_save, array('sysname'));
            
            // generate unic image name
            $this->sysname  =   $this->_generateUnicHash() . $this->sysname;
            
        }
        
        $this->userId        =   SHIN_Core::$_libs['auth']->user->idUser;    
        
        $h = parent::save($fields_to_save);
            
        if($this->isDefinite()) {
            // update record in the trk_uploadactivity table
            if(!empty($this->sysname)) {
                
                // 1. update upload activity
                $newPhoto   = SHIN_Core::$_config['core']['base_path'] . SHIN_Core::$_runned_application . DIRECTORY_SEPARATOR . SHIN_Core::$_config['gallery']['photo_storer_folder'] . DIRECTORY_SEPARATOR . SHIN_Core::$_libs['auth']->user->idUser . DIRECTORY_SEPARATOR . $this->sysname;

                $data       =   array('userId'      => $this->userId,
                                      'upload_date' => date('Y-m-d g:i:s'),
                                      'filesize'    => $this->_calcTotalFileSize($this->sysname));
//                                      'filesize'    => filesize($newPhoto));


                
                SHIN_Core::$_models['trk_uploadactivity_model']->updateActivity($this->idPhoto, $data);
                
                // 2. remove old img data
                $this->deleteImg($oldPhotoInfo);
                
            }
        } else {
            
            // insert new record in the trk_uploadactivity table    
            
            $newPhotoId = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert_id();
            $newPhoto   = SHIN_Core::$_config['core']['base_path'] . SHIN_Core::$_runned_application . DIRECTORY_SEPARATOR . SHIN_Core::$_config['gallery']['photo_storer_folder'] . DIRECTORY_SEPARATOR . SHIN_Core::$_libs['auth']->user->idUser . DIRECTORY_SEPARATOR . date('Ymd') . DIRECTORY_SEPARATOR . $this->sysname;
        
            $data       =   array('idPhoto'     => $newPhotoId,
                                  'userId'      => $this->userId,
                                  'upload_date' => $this->upload_date,
                                  'filesize'    => $this->_calcTotalFileSize($this->sysname));
//                                  'filesize'    => filesize($newPhoto));
           
            SHIN_Core::$_models['trk_uploadactivity_model']->insertActivity($data);
        }
        
        
        return $h;    
    }

    /**
    * Calculate between store real file sizes for group of files.
    * 
    * @param string $_sysname - real filename in to filesystem
    * @access public
    * @return summ of real files size.
    */
    private function _calcTotalFileSize($_sysname)
	{
		$ret = 0;
		$pr = date('Ymd');

		$_s1_name = SHIN_Core::$_config['core']['base_path'] . SHIN_Core::$_runned_application . DIRECTORY_SEPARATOR . SHIN_Core::$_config['gallery']['photo_storer_folder'] . DIRECTORY_SEPARATOR . SHIN_Core::$_libs['auth']->user->idUser . DIRECTORY_SEPARATOR .$pr. DIRECTORY_SEPARATOR.$this->sysname;
		if(is_file($_s1_name)){
			$ret += filesize($_s1_name);
		}

		$_s2_name = SHIN_Core::$_config['core']['base_path'] . SHIN_Core::$_runned_application . DIRECTORY_SEPARATOR . SHIN_Core::$_config['gallery']['photo_storer_folder'] . DIRECTORY_SEPARATOR . SHIN_Core::$_libs['auth']->user->idUser . DIRECTORY_SEPARATOR .$pr. DIRECTORY_SEPARATOR. SHIN_Core::$_config['store']['thumbnails_prefix'].$this->sysname;
		if(is_file($_s2_name)){
			$ret += filesize($_s2_name);
		}

		$_s3_name = SHIN_Core::$_config['core']['base_path'] . SHIN_Core::$_runned_application . DIRECTORY_SEPARATOR . SHIN_Core::$_config['gallery']['photo_storer_folder'] . DIRECTORY_SEPARATOR . SHIN_Core::$_libs['auth']->user->idUser . DIRECTORY_SEPARATOR .$pr. DIRECTORY_SEPARATOR. SHIN_Core::$_config['store']['preview_prefix'].$this->sysname;
		if(is_file($_s3_name)){
			$ret += filesize($_s3_name);
		}

		return $ret;
	}

    
    /**
    * delete all img data
    * 
    * @param array $photoData - array of data
    * @access public
    * @return null
    */
    function deleteImg($photoData) {
        
        $imgPath    = SHIN_Core::$_config['core']['base_path'] . SHIN_Core::$_runned_application . DIRECTORY_SEPARATOR . SHIN_Core::$_config['gallery']['photo_storer_folder'] .DIRECTORY_SEPARATOR . SHIN_Core::$_libs['auth']->user->idUser . DIRECTORY_SEPARATOR . $photoData['folder'] . DIRECTORY_SEPARATOR;
        
        // 1. delete original picture file
        if(is_file($imgPath . $photoData['sysname'])) {
            unlink($imgPath . $photoData['sysname']);
        }
        
        // 2. delete thumbnail file
        if(is_file($imgPath . SHIN_Core::$_config['store']['thumbnails_prefix'] . $photoData['sysname'])) {
            unlink($imgPath . SHIN_Core::$_config['store']['thumbnails_prefix'] . $photoData['sysname']);
        }
        
        // 3. delete preview file
        if(is_file($imgPath . SHIN_Core::$_config['store']['preview_prefix'] . $photoData['sysname'])){
            unlink($imgPath . SHIN_Core::$_config['store']['preview_prefix'] . $photoData['sysname']);    
        }
            
    }
    
    /**
    * delete one photo
    * 
    * @param array $where
    * @access public
    * @return boolean
    */
    function deleteRec($where) {
        
        $photoInfo              =   $this->getPhotoById($where['idPhoto']);
        
        // 1. delete all images
        $this->deleteImg($photoInfo);
        
        // 2. delete record from trk_uploadactivity
        SHIN_Core::$_models['trk_uploadactivity_model']->deleteRec($where);
        
        return parent::deleteRec($where);
    }
    
    function write($fields_to_write = NULL)
    {
        $h                            = parent::write($fields_to_write = NULL);
        $h['trk_gallery_photo'] = SHIN_Core::$_config['core']['app_base_url'] . '/' . SHIN_Core::$_config['gallery']['photo_storer_folder'] . '/' . $h['trk_photo_userId'] . '/' . $h['trk_photo_folder'] . '/' . SHIN_Core::$_config['store']['thumbnails_prefix'] . $h['trk_photo_sysname'];
        
        return $h;
    }
    
    /**
    * get photo by id
    * 
    * @param int $idPhoto
    * @access public
    * @return mixed array
    */
    public function getPhotoById($idPhoto){
        
        $query = $this->get_expanded_result(array("where" => 'idPhoto = ' . $idPhoto));
        $data  = $query->row(0, 'array');    
        
        return $data;
        
    }
    
    /**
    * get photo by ids
    * 
    * @param array $idPhoto
    * @access public
    * @return mixed array
    */
    public function getPhotoByIds($idPhotos){
        
        $query = $this->get_expanded_result(array("where" => 'trk_photo.idPhoto IN ( ' . implode(', ', $idPhotos) . ')'));
        $data  = $query->result_array();    
        
        return $data;
        
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
        // check for Dmitriy
        // right now connector work with config file well.
        $array_data = parent::fetchCorrectPagingData($customization_fields, $where_condition, DB_FETCH_ANSWER_TYPE_ARRAY);
        
        foreach($array_data['data'] as &$data) {
            if(strlen(trim($data['description'], '"')) > SHIN_Core::$_config['gallery']['description_size']) {
                $data['description']    =  '"' . substr(trim($data['description'], '"'), 0, SHIN_Core::$_config['gallery']['description_size']) . '...' . '"';
            }
                $data['sysname']        =  '"<img src=\"' . SHIN_Core::$_config['core']['app_base_url'] . '/' . SHIN_Core::$_config['gallery']['photo_storer_folder'] . '/' . trim($data['userId'], '"') . '/' . trim($data['folder'], '"') . '/' . SHIN_Core::$_config['store']['thumbnails_prefix'] . trim($data['sysname'], '"') . '\" />"';
           
            switch(trim($data['status'], '"')) {
                case CT_PHOTO_ACTIVE:
                    $data['status']         =   '"' . SHIN_Core::$_language->line('lng_label_lang_photo_active') . '"';
                    break;
                case CT_PHOTO_SUSPEND:
                    $data['status']         =   '"' . SHIN_Core::$_language->line('lng_label_lang_photo_suspend') . '"';
                    break;
                case CT_PHOTO_HIDE:
                    $data['status']         =   '"' . SHIN_Core::$_language->line('lng_label_lang_photo_hide') . '"';
                    break;
            }
            
            array_unshift($data, '"<input type=\'checkbox\' name=\'photos[]\' id=\'photo_' . trim($data['idPhoto'], '"') . '\' value=\'' . trim($data['idPhoto'], '"') . '\'/>"');     
        }
        
        // costomization logic 

        // end of customization logic 

        return $this->packToJSONData($array_data);
    }
    
    /**
    * generate unic hash for uploaded file
    * 
    * @access protected
    * @param null
    * @return string
    * 
    */
    function _generateUnicHash(){
        return substr(md5(SHIN_Core::$_user->idUser), 0, SHIN_Core::$_config['core']['hash_langth']);
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
        
        $userData        = SHIN_Core::$_models['trk_user_model']->getUserData();
        
        // STEP 1. Copy file to storer.
        $base_image_path    = SHIN_Core::$_config['core']['base_path'] . SHIN_Core::$_runned_application . DIRECTORY_SEPARATOR . SHIN_Core::$_config['gallery']['photo_storer_folder'] . DIRECTORY_SEPARATOR . SHIN_Core::$_libs['auth']->user->idUser . DIRECTORY_SEPARATOR . date('Ymd');
        $wt_filename        = SHIN_Core::$_config['core']['base_path'] . SHIN_Core::$_runned_application . DIRECTORY_SEPARATOR . SHIN_Core::$_config['gallery']['photo_photographer_data'] . DIRECTORY_SEPARATOR . SHIN_Core::$_user->idUser . DIRECTORY_SEPARATOR . $userData['file_name'];
        $system_wt_filename = SHIN_Core::$_config['core']['base_path'] . SHIN_Core::$_runned_application . DIRECTORY_SEPARATOR . SHIN_Core::$_config['gallery']['photo_photographer_data'] . DIRECTORY_SEPARATOR . SHIN_Core::$_config['gallery']['system_watermark']; 
        
        // STEP 3. Check if folder for uploading exists or not
        if(!is_dir($base_image_path)) {
            mkdir($base_image_path, 0777);
        }
        
        // STEP 4. generate unic file name
        $unicHash                                   =   $this->_generateUnicHash();
        $_FILES['trk_photo_sysname']['name']  =   $unicHash . $_FILES['trk_photo_sysname']['name'];
        $name                                       =   $unicHash . $name;   
        
        // STEP 5. Copy original image
        SHIN_Core::$_libs['upload']->process_upload($base_image_path, 'trk_photo_sysname');
        
        // STEP 6. Generate thumbnail.
        $this->_genThumbnail($base_image_path, $name);
        
        // STEP 7. Generate preview
        $this->_genPreview($base_image_path, $name);
        
        // STEP 8. merge preview with WT if its needed
//        if($userData['watermark_status']) {
            if($userData['watermarkusage'] == CT_SNAPTRACK_WATERMARK_CUSTOM) {
                
                $wtPosition = SHIN_Core::$_models['trk_user_model']->getWtPosition();
                
                // add watermark to original image 
                $image      = SHIN_Core::$_libs['image']->load($base_image_path . DIRECTORY_SEPARATOR . $name);
                $watermark  = SHIN_Core::$_libs['image']->load($wt_filename);
                
                $new        = $image->merge($watermark, $wtPosition[0], $wtPosition[1], SHIN_Core::$_config['gallery']['watermark_opacity']);  
                
                $new->saveToFile($base_image_path . DIRECTORY_SEPARATOR . $name);
                
                // add watermark to preview image
                $image      = SHIN_Core::$_libs['image']->load($base_image_path . DIRECTORY_SEPARATOR . SHIN_Core::$_config['store']['preview_prefix'] . $name);
                $watermark  = SHIN_Core::$_libs['image']->load($wt_filename);
                
                $new        = $image->merge($watermark, $wtPosition[0], $wtPosition[1], SHIN_Core::$_config['gallery']['watermark_opacity']);  
                
                $new->saveToFile($base_image_path . DIRECTORY_SEPARATOR . SHIN_Core::$_config['store']['preview_prefix'] . $name);
            
            } elseif($userData['watermarkusage'] == CT_SNAPTRACK_WATERMARK_SYSTEM) {
                
                // add watermark to original image
                $image      = SHIN_Core::$_libs['image']->load($base_image_path . DIRECTORY_SEPARATOR . $name);
                $watermark  = SHIN_Core::$_libs['image']->load($system_wt_filename);
                $new        = $image->merge($watermark, SHIN_Core::$_config['gallery']['system_watermark_left'], SHIN_Core::$_config['gallery']['system_watermark_top'], SHIN_Core::$_config['gallery']['watermark_opacity']);  
                
                $new->saveToFile($base_image_path . DIRECTORY_SEPARATOR . $name);
                
                // add watermark to preview image
                $image      = SHIN_Core::$_libs['image']->load($base_image_path . DIRECTORY_SEPARATOR . SHIN_Core::$_config['store']['preview_prefix'] . $name);
                $watermark  = SHIN_Core::$_libs['image']->load($wt_filename);
                
                $new        = $image->merge($watermark, $wtPosition[0], $wtPosition[1], SHIN_Core::$_config['gallery']['watermark_opacity']);  
                
                $new->saveToFile($base_image_path . DIRECTORY_SEPARATOR . SHIN_Core::$_config['store']['preview_prefix'] . $name);    
            }
//        }
       
    }
    
    /**
    * Generate thumbnail for new image.
    * 
    * @access protected
    * @return null
    * @param string $name
    * 
    */
    function _genThumbnail($base_path, $original_image_name)
    {
        $w = SHIN_Core::$_config['gallery']['frontend_thumbnails_images_width'];
        $h = SHIN_Core::$_config['gallery']['frontend_thumbnails_images_height'];


        $im = SHIN_Core::$_libs['image']->load($base_path . DIRECTORY_SEPARATOR . $original_image_name);


		// new 
		$bg = imagecreatetruecolor($w, $h);
       	$im = SHIN_Core::$_libs['image']->load($bg);
        $im->saveAlpha(true); 
		$trans_colour = imagecolorallocatealpha($bg, 0, 0, 0, 127); //127 full transparent
		$im->fill($bg, 0, 0, $trans_colour);

        $im2 = SHIN_Core::$_libs['image']->load($base_path . DIRECTORY_SEPARATOR . $original_image_name);
        $im2 = $im2->resize($w-10, $h-10);

		$thumb_im = $im->merge($im2, 'center', 'center',100);
		$thumb_im->saveToFile($base_path . DIRECTORY_SEPARATOR . SHIN_Core::$_config['store']['thumbnails_prefix'] . $original_image_name);
//		die();
		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        return;


//		$im->saveToFile($base_path . DIRECTORY_SEPARATOR . SHIN_Core::$_config['store']['thumbnails_prefix'] . $original_image_name);

		$fileName = $base_path . DIRECTORY_SEPARATOR . $original_image_name;
                 
		//Add resized thumb
		SHIN_Core::log('debug', '[#####]: '.$base_path . DIRECTORY_SEPARATOR . $original_image_name);
		list($width, $height) = getimagesize($fileName);
		SHIN_Core::log('debug', '[#####]: width'.$width);
		SHIN_Core::log('debug', '[#####]: height'.$height);
		SHIN_Core::log('debug', '[#####]: w'.$w);
		SHIN_Core::log('debug', '[#####]: h'.$h);
		$source = imagecreatefromjpeg($fileName);
		imagecopyresized($bg, $source, 0, 0, 0, 0, $w-10, $h-10, $width, $height);

		//Save the image image
//		$original_image_name = str_replace('.jpg', '.png', $original_image_name);
		imagepng($bg, $base_path . DIRECTORY_SEPARATOR . SHIN_Core::$_config['store']['thumbnails_prefix'] . $original_image_name);
		///////////////

        /*
        $im = SHIN_Core::$_libs['image']->load($base_path . DIRECTORY_SEPARATOR . $original_image_name);
        $im = $im->resize($w, $h);


        $w_delta = SHIN_Core::$_config['gallery']['width_of_transparent_border'];
        $h_delta = SHIN_Core::$_config['gallery']['height_of_transparent_border'];

		$canvasColor = $im->allocateColorAlpha(
												SHIN_Core::$_config['gallery']['color_of_transparent_border_R'],
												SHIN_Core::$_config['gallery']['color_of_transparent_border_G'],
												SHIN_Core::$_config['gallery']['color_of_transparent_border_B'],
												SHIN_Core::$_config['gallery']['color_of_transparent_border_A']
											  );

		$resized = $im->resizeCanvas('100% + '.$w_delta, '100% + '.$h_delta, 'center', 'center', $canvasColor);
        $resized->saveToFile($base_path . DIRECTORY_SEPARATOR . SHIN_Core::$_config['store']['thumbnails_prefix'] . $original_image_name);
        */
        return;
    }
    
    /**
    * Generate preview for new image.
    * 
    * @access protected
    * @return null
    * @param string $name
    * 
    */
    function _genPreview($base_path, $original_image_name){
        
        $w = SHIN_Core::$_config['gallery']['frontend_previews_images_width'];
        $h = SHIN_Core::$_config['gallery']['frontend_previews_images_height'];
        
        SHIN_Core::$_libs['image']->load($base_path . DIRECTORY_SEPARATOR . $original_image_name)->resize($w, $h)->saveToFile($base_path . DIRECTORY_SEPARATOR . SHIN_Core::$_config['store']['preview_prefix'] . $original_image_name);
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
        if($this->_is_uploaded('trk_photo_sysname')) {
            
            $this->_upload($_FILES['trk_photo_sysname']['name']);
        }
    }
	
    /**
    * get count photos for current user
    * 
    * @access public
    * @return int
    * @param null
    * 
    */
	function getTotalPhotoUsedSpace($user_id)
	{
		
	}
    
    /**
    * get count photos for current user
    * 
    * @access public
    * @return int
    * @param null
    * 
    */
    function getPhotoCount($id = null){
        
        if(is_null($id)) {
            $id =   SHIN_Core::$_user->idUser;
        }
            
                 SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('COUNT(*) as count');    
                 SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('userId', $id);    
        $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get($this->table_name);
        
        $row   = $query->row(0, 'array');
        
        $query->free_result();    
        
        return $row['count'];    
    }
    
    /**
    * update photo information
    * 
    * @param arra $data - array of updated data
    * @access public
    * @return boolean
    */
    function updatePhoto($photoId, $data){
            
                  SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idPhoto', $photoId);    
        $result = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->update($this->table_name, $data);
        
        return $result;        
    } 

} // end of class

/* End of file Snaptrack_Photo_model.php */
