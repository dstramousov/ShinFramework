<?php

class Trk_Email_Confirm_model extends SHIN_Model {

    /**
     * Physical tablename.
     */
    var $table_name = 'trk_email_confirm';
    
    function __construct()
    {
        parent::__construct($this->table_name);
        
        // PK Index definition
        $this->primary_key  = 'userId';
        
        $this->insert_field(array(
            'column' => 'userId',
            'type'   => 'integer',
            'join'   => array(
                'mode'   => 'left',
                'table'  => 'sys_user',
                'column' => 'idUser',
            ),
            'input'  => array(
                'type'          => 'select',
                'from'          => 'sys_user',
                'data'          => 'idUser',
                'caption'       => 'name',
                'nonset_id'     => '',
                'nonset_name'   => '',
            ),
            'validate'          => 'validate_int',
            'info_field_txt'    => false,
            'info_field_ico'    => false,
        ));
        
        $this->insert_field(array(
            'table'             => 'sys_user',
            'column'            => 'name',
            'type'              => 'varchar',
            'width'             => CT_VARCHAR_50,
            'title'             => '',
            'null'              => 0,
            'info_field_txt'    => null,
            'info_field_ico'    => null,
            'virtual'           => true,
        ));

        $this->insert_field(array(
            'column'            => 'confirm_code',
            'type'              => 'varchar',
            'width'             => CT_VARCHAR_50,
            'title'             => '',
            'null'              => 0,
            'info_field_txt'    => null,
            'info_field_ico'    => null,
        ));

        $this->insert_field(array(
            'column' => 'new_email',
            'type'   => 'varchar',
            'width'  => CT_VARCHAR_50,
            "value"  => '0',
            "null"   =>  0,
            'title'  => 'lng_label_snaptrack_usertype'
        ));
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
        $h = parent::write_form($fields_to_write, $mode);

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
    * generate confirm code
    * 
    * @access public
    * @param null
    * @return string code
    * 
    */
    public function generateCode($email){
        
        $confirmCode = md5(time());
        
        // 1. delete all old records                                                         
        $this->_deleteConfirmation();
        
        // 2. insert new confirm record
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert($this->table_name, array('userId'          => SHIN_Core::$_user->idUser,
                                                                                          'confirm_code'    => $confirmCode,
                                                                                          'new_email'       => $email)) ;
        
        return $confirmCode;    
    }
    
    /**
    * get confirmation data by confirmation code
    * 
    * @param string $code - confirmation code
    * @access public
    * @return array
    */
    public function getConfirmData($code) {
        
        // 1. get code
        $query  = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get_where($this->table_name, array('confirm_code' => $code));
        $data   = $query->row(0, 'array');
        
        // 2. delete confirmation info
        $this->_deleteConfirmation();
        $query->free_result();
        
        return $data;    
    }
    
    /**
    * delete confirmation code by userId
    * 
    * @param int $userId - user id
    * @access protected
    * @return null
    */
    protected function _deleteConfirmation($userId = null){
        
        if(is_null($userId)) {
            $userId =   SHIN_Core::$_user->idUser;
        }
        // 1. delete all old records                                                         
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->delete($this->table_name, array('userId' => $userId));    
    }
    
} // end of class

/* End of file Snaptrack_User_model.php */