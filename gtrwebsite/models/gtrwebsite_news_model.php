<?php

define('COUNT_CHARACTER_FOR_SHORT_FIELD', 50);

class Gtrwebsite_News_model extends SHIN_Model {

    /**
     * Sight for setup.
     */
    var $setup_include_sight = TRUE;

    /**
     * Physical tablename.
     */
    var $table_name = 'gtrwebsite_news';

    function __construct()
    {
        parent::__construct($this->table_name);
        
        // PK Index definition
        $this->primary_key   = 'idNews';
        
        // Fields definition
        $this->insert_field(array(
            "column" => "idNews",
            "type"   => "integer",
            "attr"   => "auto_increment",            
        ));
        
        $this->insert_field(array(
            "column" => "newsType",
            "type"   => "enum",
            "values" => array(
                'news'        => "lng_label_news_type_news",
                'promo'       => "lng_label_news_type_promo"
            ),
            "value"  => 'news'            
        ));
        
        $this->insert_field(array(
            'column'    => 'title',
            'type'      => 'varchar',
            'width'     => 255,
            'value'     => '',
            'validate'  => 'title_validate'
        ));
	
	
        $this->insert_field(array(
            'table'  => 'gtrwebsite_news',
            'column' => 'bodyShort',
            'type'   => 'varchar',
            'update'	=> 0,
            'store'		=> 0,
            'title'  => 'lng_label_account_name',
            'select' => 'CONCAT(SUBSTRING(gtrwebsite_news.bodyLong, 1, '.COUNT_CHARACTER_FOR_SHORT_FIELD.'), '.'"..."'.')',
			'virtual' => TRUE,
		));

		
        $this->insert_field(array(
            'column'    => 'bodyLong',
            'type'      => 'text',
            'value'     => '',
            'input'     => array(
                'type'		=> 'tinymce',
                'rows'      => 0,
                'cols'      => 0 
			)
        ));
        
        $this->insert_field(array(
            'column'    => 'img',
            'type'      => 'varchar',
            'width'     => 255,
            'value'     => '',
            'null'      => 1
        ));
        
        $this->insert_field(array(
            'column'    => 'link',
            'type'      => 'varchar',
            'width'     => 255,
            'value'     => 'http://',
            'validate'  => 'link_validate'
        ));
        
        $this->insert_field(array(
            'column'    => 'status',
            "type"   => "enum",
            "values" => array(
                CT_SHOW        => "lng_label_news_show",
                CT_HIDE        => "lng_label_news_hide",
            ),
            'value'     => 1,
        ));
        
        $this->insert_field(array(
            'column' => 'userIns',
            'type'   => 'integer',
            'join'   => array(
                'mode'   => 'left',
                'table'  => 'sys_user',
                'column' => 'idUser',
                'as'     => 'sys_user_ins'
            ),
            'null'  => 1
        ));
        
        $this->insert_field(array(
            'table'     => 'sys_user_ins',
            'type'      => 'varchar',
            'column'    => 'name',
            'null'      => 0,
            'virtual'   => TRUE,
        ));

        $this->insert_field(array(
            'column'	=> 'dataIns',
            'type'		=> 'datetime',
			'value'		=> $this->db_now_datetime(),
            'null'		=> 1,
            'info_field_ico'	=> 'images/help.png',
            'info_field_txt'	=> 'lang_label_gtrwebsite_state_datains',
        ));

        $this->insert_field(array(
            'column' => 'userMod',
            'type'   => 'integer',
            'join'   => array(
                'table'  => 'sys_user',
                'mode'   => 'left',
                'column' => 'idUser',
                'as'     => 'sys_user_mod'
            ),
            'null'  =>  1
        ));
        
        $this->insert_field(array(
            'table'     => 'sys_user_mod',
            'type'      => 'varchar',
            'column'    => 'name',
            'null'      => 0,
            'virtual'   => TRUE,
        ));

        $this->insert_field(array(
            'column'	=> 'dataMod',
            'type'		=> 'timestamp',
			'value'		=> $this->db_now_datetime(),
            'null'		=> 1,
            'info_field_ico'	=> 'images/help.png',
            'info_field_txt'	=> 'lang_label_gtrwebsite_state_datamod',
        ));
        
        $this->insert_field(array(
            'column'    => 'dataStart',
            'type'      => 'date',
            'value'     => $this->db_now_datetime(),
            'validate'  => 'validate_date',
            'null'      => 1
        ));
        
        $this->insert_field(array(
            'column'    => 'dataStop',
            'type'      => 'date',
            'value'     => $this->db_now_datetime(),
            'validate'  => 'validate_date',
            'null'      => 1
        ));
        
        $this->insert_field(array(
            'column'    => 'clicks',
            'type'      => 'int',
			'value'		=> 0,
        ));
    }
    
    function title_validate($data) {
        return sanitize_string($data);    
    }
    
    function body_short_validate($data) {
        return sanitize_string($data);    
    }
    
    function body_long_validate($data) {
    }
    
    function img_validate($data) {
        if(!$this->isDefinite()) {
            return sanitize_string($data);
        } else {
            return array('result' => true, 'value' => '');
        }    
    }
    
    function link_validate($data) {
        return sanitize_string($data);    
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
            $data['img']            =   '"<img src=\"' . prep_url(SHIN_Core::$_config['core']['app_base_url'] . '/' . SHIN_Core::$_config['store']['news_images'] . '/') . SHIN_Core::$_config['store']['thumbnails_prefix'] . trim($data['img'], '"')   . '\" />"';     
            $data['status']         =   trim($data['status'], '"') == CT_SHOW ? '"' . SHIN_Core::$_language->line('lng_label_news_show') . '"' : '"' . SHIN_Core::$_language->line('lng_label_news_hide') . '"'; 
        }
        
        // costomization logic 

        // end of customization logic 

        return $this->packToJSONData($array_data);
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
    
    /**
    * Save given fields from CGI query.
    *
    * @access public
    * @param $fields needed fields for saving from form. 
    * @return NULL
    * @sa SHIN_Model::save()
     */
    function save($fields_to_save = null) {
        
        $fields_to_save = array('newsType', 'title', 'bodyShort', 'bodyLong', 'link', 'status', 'dataStart', 'dataStop', 'clicks');
        
        if(!empty($this->img)){
            $fields_to_save = array_merge($fields_to_save, array('img'));
        }
        
        if($this->isDefinite()) {
            $this->dataMod  =   $this->db_now_datetime();
            $this->userMod  =   SHIN_Core::$_libs['auth']->user->idUser;
        
            $fields_to_save = array_merge($fields_to_save , array('userMod', 'dataMod'));
            
        } else {
            $this->dataIns  =   $this->db_now_datetime();    
            $this->userIns  =   SHIN_Core::$_libs['auth']->user->idUser;    
        
            $fields_to_save = array_merge($fields_to_save , array('dataIns', 'userIns'));
        }
        
        $h = parent::save($fields_to_save);
        
        return $h;    
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
    * upload icon to the icon storage
    * 
    * @access protected
    * @return null
    * @param string $name
    * 
    */
    function _uploadImg($name)
    {
        // STEP 1. Copy file to storer.
        $base_image_path = SHIN_Core::$_config['core']['base_path'] . SHIN_Core::$_runned_application . DIRECTORY_SEPARATOR . SHIN_Core::$_config['store']['news_images'] . DIRECTORY_SEPARATOR;
        
        SHIN_Core::$_libs['upload']->process_upload(SHIN_Core::$_config['store']['news_images'], 'gtrwebsite_news_img');
        
        // STEP 2. Generate thumbnail.
        $this->_genThumbnail($base_image_path, $name);
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
		$w = SHIN_Core::$_config['store']['thumbnails_images_width'];
		$h = SHIN_Core::$_config['store']['thumbnails_images_height'];
		
		$_fr_w = SHIN_Core::$_config['store']['frontend_thumbnails_images_width'];
		$_fr_h = SHIN_Core::$_config['store']['frontend_thumbnails_images_height'];
		
		SHIN_Core::$_libs['image']->load($base_path.$original_image_name)->resize($w, $h)->saveToFile($base_path.SHIN_Core::$_config['store']['thumbnails_prefix'].$original_image_name);
		SHIN_Core::$_libs['image']->load($base_path.$original_image_name)->resize($_fr_w, $_fr_h)->saveToFile($base_path.SHIN_Core::$_config['store']['fr_thumbnails_prefix'].$original_image_name);
	}
    
    /**
    * delete old icon
    * 
    * @access protected
    * @return null
    * @param string $name
    */
    function _deleteOldImg($name = null) {
        if(!is_null($name)) {
            @unlink(SHIN_Core::$_config['core']['base_path'] . SHIN_Core::$_runned_application . DIRECTORY_SEPARATOR . SHIN_Core::$_config['store']['items_images'] . DIRECTORY_SEPARATOR . $name);
        } else {
            @unlink(SHIN_Core::$_config['core']['base_path'] . SHIN_Core::$_runned_application . DIRECTORY_SEPARATOR . SHIN_Core::$_config['store']['items_images'] . DIRECTORY_SEPARATOR . $this->img);    
        }
    }
                                                                                             
    /**
    * upload image to storer
    * 
    * @access public
    * @return null
    * @param null
    * 
    */
    function uploadImg(){
        // copy file to storer
        if($this->_is_uploaded('gtrwebsite_news_img')) {
            
            $this->_uploadImg($_FILES['gtrwebsite_news_img']['name']);
        }
    }
    
    /**
    * update currect clicks
    * 
    * @param int $newsId
    * @access public
    * @return null
    */
    function updateClicks($newsId) {
        
                    SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('clicks');
                    SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from($this->table_name);
                    SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idNews', $newsId);
        $query  =   SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
        $result =   $query->row(0, 'array');
        
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idNews', $newsId);
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->update($this->table_name, array('clicks' => ++$result['clicks']));    
    }
    
} // end of class

/* End of file Account_model.php */