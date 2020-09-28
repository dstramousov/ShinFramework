<?php

class Gtrwebsite_Items_model extends SHIN_Model {

    /**
     * Sight for setup.
     */
    var $setup_include_sight = TRUE;

    /**
     * Physical tablename.
     */
    var $table_name = 'gtrwebsite_items';

    function __construct()
    {
        parent::__construct($this->table_name);
        
        // PK Index definition
        $this->primary_key   = 'idItem';
        
        // Fields definition
        $this->insert_field(array(
            "column"    => "idItem",
            "type"      => "integer",
            "null"      => 0,
            "attr"      => "auto_increment",
        ));

        $this->insert_field(array(
            'column' => 'idItemCat',
            'type'   => 'integer',
            'join'   => array(
                'mode'   => 'left',
                'table'  => 'gtrwebsite_itemscategory',
                'column' => 'idItemCat',
            ),
            'input'  => array(
                'type'          => 'select',
                'from'          => 'gtrwebsite_itemscategory',
                'data'          => 'idItemCat',
                'caption'       => 'description',
                'nonset_id'     => '',
                'nonset_name'   => '',
            ),
            'validate'  =>  'validate_int'
        ));
        
        $this->insert_field(array(
            'table'     => 'gtrwebsite_itemscategory',
            'type'      => 'varchar',
            'column'    => 'description',
            'null'      => 0,
            'virtual'   => TRUE,
        ));

        $this->insert_field(array(
            "column"            => "description",
            'type'              => 'varchar',
            'width'             => CT_VARCHAR_400,
            'title'             => '',
            'null'              => 0,
            'info_field_txt'    => false,
            'info_field_ico'    => false,
            'validate'          => 'validate_description'
        ));
        
        $this->insert_field(array(
            "column"            => "title",
            'type'              => 'varchar',
            'width'             => CT_VARCHAR_100,
            'title'             => '',
            'null'              => 0,
            'info_field_txt'    => false,
            'info_field_ico'    => false,
            'validate'          => 'validate_title'
        ));

        $this->insert_field(array(
            'column'    => 'img',
            'type'      => 'varchar',
            'width'     => CT_VARCHAR_255,
            'value'     => '',
            'null'      => 1
        ));
        
        $this->insert_field(array(
            'column'    => 'link',
            'type'      => 'varchar',
            'width'     => CT_VARCHAR_255,
            'value'     => 'http://',
            'validate'  => 'validate_link'
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
            'null'   => 1
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
            'null'      => 1,
            'info_field_ico'	=> 'images/help.png',
            'info_field_txt'	=> 'lang_label_gtrwebsite_items_datains',
        ));

        $this->insert_field(array(
            'column' => 'userMod',
            'type'   => 'integer',
            'join'   => array(
                'mode'   => 'left',
                'table'  => 'sys_user',
                'column' => 'idUser',
                'as'     => 'sys_user_mod'
            ),
            'null'   => 1
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
            'null'      => 1,
            'info_field_ico'	=> 'images/help.png',
            'info_field_txt'	=> 'lang_label_gtrwebsite_items_datamod',
        ));
        
        $this->insert_field(array(
            'column'    => 'clicks',
            'type'      => 'int',
            'value'     => 0
        ));
		
		
    }
    
    /**
    * validate description field
    * 
    * @param string $data
    * @access public
    * @return array
    */
    function validate_description($data) {
        return sanitize_string($data);    
    }
    
    /**
    * validate title field
    * 
    * @param string $data
    * @access public
    * @return array
    */
    function validate_title($data) {
        return sanitize_string($data); 
    }
    
    /**
    * validate img field
    * 
    * @param string $data
    * @access public
    * @return array
    */
    function validate_img($data) {
        if(!$this->isDefinite()) {
            return sanitize_string($data);
        } else {
            return array('result' => true, 'value' => '');
        }    
    }
    
    /**
    * validate link field
    * 
    * @param string $data
    * @access public
    * @return array
    */
    function validate_link($data) {
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
        
        $categoryList               = SHIN_Core::$_models['gtrwebsite_itemscategory_model']->getCategoryListForDD();
        $gtrwebsite_items_idItemCat = '<select id="gtrwebsite_items_idItemCat" name="gtrwebsite_items_idItemCat"><option value=""></option>';
        
        if(isset($this->idItem) && !empty($this->idItem)) {
            foreach($categoryList as $key => $value) {
                if($this->idItemCat == $key) {
                    $gtrwebsite_items_idItemCat  .=  '<option value="' . $key . '" selected="selected">' . $value . '</option>';    
                } else {
                    $gtrwebsite_items_idItemCat  .=  '<option value="' . $key . '">' . $value . '</option>';    
                }    
            }    
        } else {
            $currentCat = SHIN_Core::$_libs['session']->userdata('idItemCat');
            foreach($categoryList as $key => $value) {
                if($currentCat == $key) {
                    $gtrwebsite_items_idItemCat  .=  '<option value="' . $key . '" selected="selected">' . $value . '</option>';    
                } else {
                    $gtrwebsite_items_idItemCat  .=  '<option value="' . $key . '">' . $value . '</option>';    
                }    
            }    
        }
        
        $gtrwebsite_items_idItemCat .= '</select>';
        $h[$this->table_name . '_idItemCat_input'] =    $gtrwebsite_items_idItemCat; 
           

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
            $data['img']            =   '"<img src=\"' . prep_url(SHIN_Core::$_config['core']['app_base_url'] . '/' . SHIN_Core::$_config['store']['items_images'] . '/') . SHIN_Core::$_config['store']['thumbnails_prefix'] . trim($data['img'], '"')   . '\" alt=\"' . trim($data['description'], '"') . '\" title=\"' . trim($data['description'], '"') . '\"/>"';     
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
        
        $fields_to_save = array('idItem', 'idItemCat', 'title', 'description', 'link', 'clicks');
        
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
        $base_image_path = SHIN_Core::$_config['core']['base_path'] . SHIN_Core::$_runned_application .DIRECTORY_SEPARATOR. SHIN_Core::$_config['store']['items_images'] . DIRECTORY_SEPARATOR;
        
        SHIN_Core::$_libs['upload']->process_upload(SHIN_Core::$_config['store']['items_images'], 'gtrwebsite_items_img');
        
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
        
        SHIN_Core::$_libs['image']->load($base_path.$original_image_name)->resize($w, $h)->saveToFile($base_path.SHIN_Core::$_config['store']['thumbnails_prefix'].$original_image_name); 
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
        if($this->_is_uploaded('gtrwebsite_items_img')) {
            
            $this->_uploadImg($_FILES['gtrwebsite_items_img']['name']);
        }
    }
    
   /**
   * get category list for grouped DD
   *  
   * @param $categoryId - category id
   * @access public
   * @return array
   */
    public function getItemListByCategoryId($categoryId, $idItem){
        
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('idItem');    
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('title');    
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->order_by('title');    
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from($this->table_name);    
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idItemCat', $categoryId);    
        
        $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
        $result= $query->result_array();
        
        $list   =   '';
        foreach($result as $value) {
            if($value['idItem'] == $idItem) {
                $list  .=   '<option value="' . $value['idItem'] . '" selected="selected">' . $value['title'] . '</option>';    
            } else {
                $list  .=   '<option value="' . $value['idItem'] . '">' . $value['title'] . '</option>';    
            }
        }
        
        return $list;
    }
    
    /**
    * update currect clicks
    * 
    * @param int $itemId
    * @access public
    * @return null
    */
    function updateClicks($itemId) {
        
                    SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('clicks');
                    SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from($this->table_name);
                    SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idItem', $itemId);
        $query  =   SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
        $result =   $query->row(0, 'array');
        
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idItem', $itemId);
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->update($this->table_name, array('clicks' => ++$result['clicks']));    
    }

} // end of class

/* End of file Gtrwebsite_Items_model.php */
