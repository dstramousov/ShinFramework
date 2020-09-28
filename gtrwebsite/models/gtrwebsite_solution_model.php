<?php

class Gtrwebsite_Solution_model extends SHIN_Model {

    /**
     * Sight for setup.
     */
    var $setup_include_sight = TRUE;

    /**
     * Physical tablename.
     */
    var $table_name = 'gtrwebsite_solution';

    function __construct()
    {
        parent::__construct($this->table_name);
        
        // PK Index definition
        $this->primary_key   = 'idSolution';
        
        // Fields definition
        $this->insert_field(array(
            "column" => "idSolution",
            "type"   => "integer",
            "attr"   => "auto_increment",            
        ));

        $this->insert_field(array(
            "column"            => "description",
            'type'              => 'varchar',
            'width'				=> CT_VARCHAR_255,
            'value'             => '',
            'null'              => 0,
            'info_field_ico'	=> 'images/help.png',
            'info_field_txt'	=> 'lang_label_gtrwebsite_solution_description',
            'validate'          => 'validate_description'
            /*
            'input'     => array(
				'type'      => 'textarea',
                'width'     => 10,
                'height'    => 10,
                'maxlenth'  => 2048
            ),
            */
        ));

        $this->insert_field(array(
            'column'    => 'posX',
            'type'      => 'smallint',
            'width'     => 5,
			'value'     => 1,
            'validate'  => 'validate_int'
        ));

        $this->insert_field(array(
            'column'    => 'posY',
            'type'      => 'smallint',
            'width'     => 5,
            'value'     => 1,
            'validate'  => 'validate_int'
        ));
        
        $this->insert_field(array(
            'column'    => 'level',
            'type'      => 'smallint',
            'width'     => 5,
			'value'     => 1,
            'validate'  => 'validate_int'
        ));

		$this->insert_field(array(
			'column'	=> 'img',
            'type'		=> 'varchar',
            'width'		=> CT_VARCHAR_100,
            'value'		=> '',
            'null'		=> 1,
            'info_field_ico'	=> 'images/help.png',
            'info_field_txt'	=> 'lang_label_gtrwebsite_solution_img',
            'validate'  => '' 
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
            'column'	=> 'dataIns',
            'type'		=> 'datetime',
			'value'		=> $this->db_now_datetime(),
            'null'		=> 1,
            'info_field_ico'	=> 'images/help.png',
            'info_field_txt'	=> 'lang_label_gtrwebsite_solution_datains',
        ));
        
        $this->insert_field(array(
            'table'     => 'sys_user_ins',
            'type'      => 'varchar',
            'column'    => 'name',
            'null'      => 0,
            'virtual'   => TRUE,
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
            'null'		=> 1,
            'info_field_ico'	=> 'images/help.png',
            'info_field_txt'	=> 'lang_label_gtrwebsite_state_datamod',
        ));

    }


    /**
    * validate description field
    * 
    * @param string $data
    * @access public
    * @return array
    */
    function getSolutionInput($idSelected = NULL, $pname='gtrwebsite_answers_idSolution')
	{
		$_html = "<select id=\"$pname\" name=\"$pname\"><option value='0'></option>";
		
	    $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get($this->table_name);
	    foreach ($query->result_array() as $row)
	    {
			if($idSelected == $row['idSolution']){
				$_html .= '<option value="'.$row['idSolution'].'" selected="selected">'.$row['description'].'</option>';
			} else {
				$_html .= '<option value="'.$row['idSolution'].'">'.$row['description'].'</option>';
			}
	    }
	    $query->free_result();
		
		$_html .= '</select>';
		
		return $_html;
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
        // right now connector work with config file well.
        $array_data = parent::fetchCorrectPagingData($customization_fields, $where_condition, DB_FETCH_ANSWER_TYPE_ARRAY);
        
        foreach($array_data['data'] as &$data) {
            $data['description']    =   '"<a href=javascript:void(0); onclick=loadItems(' . trim($data['idSolution'], '"') . ')>' . trim($data['description'], '"') . '</a>"';    
            $data['img']            =   '"<img src=\"' . prep_url(SHIN_Core::$_config['core']['app_base_url'] . '/' . SHIN_Core::$_config['store']['solutions_images'] . '/') . SHIN_Core::$_config['store']['thumbnails_prefix'] . trim($data['img'], '"')   . '\" />"';     
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
        
        $fields_to_save = array('idSolution', 'description', 'posX', 'posY', 'level');
        
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
        $base_image_path = SHIN_Core::$_config['core']['base_path'] . SHIN_Core::$_runned_application . DIRECTORY_SEPARATOR . SHIN_Core::$_config['store']['solutions_images'] . DIRECTORY_SEPARATOR;
        
        SHIN_Core::$_libs['upload']->process_upload( SHIN_Core::$_config['store']['solutions_images'], 'gtrwebsite_solution_img');
        
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
            @unlink(SHIN_Core::$_config['core']['base_path'] . SHIN_Core::$_runned_application . DIRECTORY_SEPARATOR . SHIN_Core::$_config['store']['solutions_images'] . DIRECTORY_SEPARATOR . $name);
        } else {
            @unlink(SHIN_Core::$_config['core']['base_path'] . SHIN_Core::$_runned_application . DIRECTORY_SEPARATOR . SHIN_Core::$_config['store']['solutions_images'] . DIRECTORY_SEPARATOR . $this->img);    
        }
    }
    
     /**
    * Return count items for needed category.
    *
    * @access public
    * @param $fields needed fields for reading from form. 
    * @return NULL
    * @sa SHIN_Model::read_form()
     */
    function getCountItems($id = NULL)
    {
        $ret = 0;
        
        if($id==NULL){
            $_ID = $this->idSolution;
        } else {
            $_ID = $id;
        }
        
        $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->query('select count(*) as count from gtrwebsite_solutionitem where idSolution=' . $_ID);
        $row = $query->row(0, 'array');

        return $row['count'];
    }

    /**
    * Cascade deleting for 2 tables. ItemCategory, Item
    *
    * @access public
    * @param $idItem
    * @return NULL
     */
    function cascadeDelete($idSolution)
    {
        // 1. remove all from gtrwebsite_items
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->delete('gtrwebsite_solutionitem', array('idSolution' => $idSolution)); 
        
        // 2. remove from this table.
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->delete($this->table_name, array('idSolution' => $idSolution)); 

        return;
    }
    
    /**
    * get information about solution
    * 
    * @param int $solutionId
    * @access public
    * @return array
    */
    function getSolutionInfo($solutionId){
        
                 SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idSolution', $solutionId);
                 SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from($this->table_name);
        $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
        
        return $query->row(0, 'array');        
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
        if($this->_is_uploaded('gtrwebsite_solution_img')) {
            
            $this->_uploadImg($_FILES['gtrwebsite_solution_img']['name']);
        }
    }
    
    /**
   * get solution list for DD
   *  
   * @param null
   * @access public
   * @return array
   */
    public function getSolutionListForDD(){
        
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('idSolution');    
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('description');    
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from($this->table_name);    
        
        $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
        $result= $query->result_array();
        
        $list = array();
        foreach($result as $value) {
            $list[$value['idSolution']]  =   $value['description'];    
        }
        
        return $list;
    }

} // end of class

/* End of file Gtrwebsite_Solution_model.php */