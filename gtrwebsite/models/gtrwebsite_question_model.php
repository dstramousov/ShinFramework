<?php

class Gtrwebsite_Question_model extends SHIN_Model {

    /**
     * Physical tablename.
     */
    var $table_name = 'gtrwebsite_question';

    function __construct()
    {
        parent::__construct($this->table_name);
        
        // PK Index definition
        $this->primary_key   = 'idQuestion';
        
        // Fields definition
        $this->insert_field(array(
            "column" => "idQuestion",
            "type"   => "integer",
            "attr"   => "auto_increment",            
        ));

		$this->insert_field(array(
			"column"	=> "idNode",
			"type"		=> "integer",
            'null'		=> 1,
            'value'		=> 0,
            'info_field_ico'	=> 'images/help.png',
            'info_field_txt'	=> 'lang_label_gtrwebsite_question_idnode',
            'join'   => array(
                'mode'   => 'left',
                'table'  => 'gtrwebsite_tree',
                'column' => 'idNode',
            )
		));

        $this->insert_field(array(
            "column"            => "description",
            'type'              => 'text',
            'value'             => '',
            'null'              => 1,
            'info_field_ico'	=> 'images/help.png',
            'info_field_txt'	=> 'lang_label_gtrwebsite_question_description',
            'validate'          => 'validate_description',
			'input'     => array(
				'type'     => 'tinymce',
            ),
        ));

        $this->insert_field(array(
            'column'    => 'img',
            'type'      => 'varchar',
            'width'     => 255,
            'null'		=> 1,
            'value'     => '',
//            'validate'  => 'validate_img'
        ));

        $this->insert_field(array(
            'column'    => 'posX',
            'type'      => 'smallint',
            'width'     => 5,
			'value'     => 1,
//            'validate'  => 'validate_int'
            'null'		=> 1,
        ));

        $this->insert_field(array(
            'column'    => 'posY',
            'type'      => 'smallint',
            'width'     => 5,
            'value'     => 1,
//            'validate'  => 'validate_int'
            'null'        => 1,
        ));
        
        $this->insert_field(array(
            'column'    => 'level',
            'type'      => 'smallint',
            'width'     => 5,
			'value'     => 1,
//            'validate'  => 'validate_int'
            'null'		=> 1,
        ));


        $this->insert_field(array(
            'column' => 'userIns',
            'type'   => 'integer',
            'join'   => array(
                'mode'   => 'left',
                'table'  => 'sys_user',
                'column' => 'idUser',
            ),
            'null'   => 1
        ));

        $this->insert_field(array(
            'column'	=> 'dataIns',
            'type'		=> 'datetime',
			'value'		=> $this->db_now_datetime(),
            'null'		=> 1,
            'info_field_ico'	=> 'images/help.png',
            'info_field_txt'	=> 'lang_label_gtrwebsite_question_datains',
        ));

        $this->insert_field(array(
            'column' => 'userMod',
            'type'   => 'integer',
            'join'   => array(
                'mode'   => 'left',
                'table'  => 'sys_user',
                'column' => 'idUser',
            ),
            'null'   => 1
        ));

        $this->insert_field(array(
            'column'	=> 'dataMod',
            'type'		=> 'timestamp',
			'value'		=> $this->db_now_datetime(),
            'null'		=> 1,
            'info_field_ico'	=> 'images/help.png',
            'info_field_txt'	=> 'lang_label_gtrwebsite_question_datamod',
        ));
    }
    
    /**
    * validate description
    * 
    * @param string $data
    * @return array
    * @access public
    */
    function validate_description($data) {
        return sanitize_string($data);
    }
    
    /**
    * validate img
    * 
    * @param string $data
    * @return array
    * @access public
    */
    function validate_img($data) {
        if(!$this->isDefinite()) {
            return sanitize_string($data);
        } else {
            return array('result' => true, 'value' => '');
        }
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
        
        $fields_to_save = array('idNode', 'description', 'posX', 'posY', 'level');
        
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
    * get question info by idNode
    * 
    * @param int $idNode
    * @access public
    * @return array
    */
    function getQuestionByIdNode($idNode) {
        
                    SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('idQuestion');
                    SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('description');
                    SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('posX');
                    SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('posY');
                    SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('level');
                    SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('img');
                    SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('name');
                    SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('dataIns');
                    SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from($this->table_name);
                    SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idNode', $idNode);
                    SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->join('sys_user', $this->table_name . '.userIns = sys_user.idUser');
        $query  =   SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
        $result =   $query->row(0, 'array');

		if ($result) {
	        $result['img']  =   prep_url(SHIN_Core::$_config['core']['app_base_url'] . '/' . SHIN_Core::$_config['store']['questions_images'] . '/') . SHIN_Core::$_config['store']['thumbnails_prefix'] . $result['img'];
		}
        
        
        return $result;
        
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
        $base_image_path = SHIN_Core::$_config['core']['base_path'] . SHIN_Core::$_runned_application .DIRECTORY_SEPARATOR. SHIN_Core::$_config['store']['questions_images'] . DIRECTORY_SEPARATOR;

        SHIN_Core::$_libs['upload']->process_upload(SHIN_Core::$_config['store']['questions_images'], 'gtrwebsite_question_img');
        
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
            @unlink(SHIN_Core::$_config['core']['base_path'] . SHIN_Core::$_runned_application . DIRECTORY_SEPARATOR . SHIN_Core::$_config['store']['questions_images'] . DIRECTORY_SEPARATOR . $name);
        } else {
            @unlink(SHIN_Core::$_config['core']['base_path'] . SHIN_Core::$_runned_application . DIRECTORY_SEPARATOR . SHIN_Core::$_config['store']['questions_images'] . DIRECTORY_SEPARATOR . $this->img);    
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
        if($this->_is_uploaded('gtrwebsite_question_img')) {
            
            $this->_uploadImg($_FILES['gtrwebsite_question_img']['name']);
        }
    }

} // end of class

/* End of file Gtrwebsite_Question_model.php */