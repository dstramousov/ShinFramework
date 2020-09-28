<?php

class SHINTicket_TicketDetails_model extends SHIN_Model {

    /**
     * Physical tablename.
     */
    var $table_name = 'shinticket_ticketdetails';
    
    /**
     * Physical tablename.
     */
    var $filename = '';

    /**
     * file name before ".".
     */
    var $_name = '';
    
    /**
     * file name after ".".
     */
    var $_ext = '';
    
    /**
     * File size for attach.
     */
    var $filesize = '';
    
    /**
     * Type of attach (extension).
     */
    var $type = '';
    
    /**
     * Real filename .
     */
    var $tmp_file = '';
    
    /**
     * Contant for attachement.
     */
    var $content = '';

    function __construct()
	{
        parent::__construct($this->table_name);
		
		// PK Index definition
        $this->primary_key   = 'idTicketDetail';
		
		// Fields definition
		$this->insert_field(array(
			"column" => "idTicketDetail",
			"type"   => "tinyint",
			"attr"   => "auto_increment",			
		));

        $this->insert_field(array(
            'column' => 'userId',
            'type'   => 'integer',
            'join'   => array(
                'mode'   => 'left',
                'table'  => 'shinticket_user',
                'column' => 'userId',
            )
        ));

        $this->insert_field(array(
			"column" => "idTicket",
            'type'   => 'tinyint',
			'title'  => 'lng_label_shinticket_ticketdetails_parent',
            'null'   => 0
        ));
		
        $this->insert_field(array(
            'column'   => 'body',
            'type'     => 'text',
            'null'     => 0,
            'input'  => array(
                'type'     => 'tinymce',
            ),
            'validate'  => 'validate_body',
            'info_field_txt' => 'lng_label_ticket_mandatorytext_body',
            'info_field_ico' => 'images/help.png',
        ));

        $this->insert_field(array(
			'column' => 'created',
            'type'   => 'datetime',
            'title'  => 'lng_label_ppfm_updated',
			'value'  => $this->db_now_datetime(),
        ));				

        $this->insert_field(array(
            'column' => 'attachPath',
            'type'   => 'varchar',
            'width'  => 150,
            'title'  => 'lng_label_shinticket_ticket_attach',
            'value'  => '',
            'null'     => 1,
        ));
        
        $this->insert_field(array(
            'column' => 'realAttachFileName',
            'type'   => 'varchar',
            'width'  => 150,
			'title'  => 'lng_label_shinticket_ticket_attachfilename',
			'value'  => '',
            'null'     => 1,
        ));
    }

    /**
    * @access public
    * @param NULL
    * @return NULL
    * @sa SHIN_Model::read_form()
     */
    function validate_body()
    {
    	$body   =   str_replace(array('<p>', '</p>'), '', $this->body);
        
        if(!empty($this->body)) {
            return array('result' => true, 'value' => '');
        }
        
        return array('result' => false, 'value' => 'lng_label_error_body');
    }
    
    /**
    * @access public
    * @param $fields needed fields for reading from form. 
    * @return NULL
    * @sa SHIN_Model::read_form()
     */
    function save($fields_to_processed = null)
    {
        // 1. init userid 
        $this->userId = SHIN_Core::$_user->idUser;
        
        // 2. init created
        $this->created       = $this->db_now_datetime();
        
        // 3. need check if exist attach parameters and keep it if it need.        
        if($this->_is_uploaded('attach_file'))
        {
            $this->_read_image_info('attach_file');
            
            $filename                   = $this->_genUnickFileName();
            $this->attachPath           = $filename;
            $this->realAttachFileName   = $this->filename;
            
            // copy file to storer
            copy($this->tmp_file, $filename);
            
        } else {
            $this->attachPath = NULL;
            $this->realAttachFileName = NULL;
        }
        
        parent::save($fields_to_processed);
    }
    
    /**
    * @access private
    * @param $input string with html/dom name. 
    * @return NULL
     */
    function _read_image_info($input)
    {
        $info = $_FILES[$input];

        $this->filename    = $info['name'];
        $__data = preg_split("/\./", $this->filename);
        $this->_name = $__data[0];
        $this->_ext = $__data[1];
                
        $this->filesize    = $info['size'];
        $this->type        = $info['type'];
        $this->tmp_file    = $info['tmp_name'];

        $this->content = file_get_contents($this->tmp_file);
    }
    
    /**
    * @access private
    * @param $input string with html/dom name. 
    * @return NULL
     */
    function _genUnickFileName()
    {
        return SHIN_Core::$_config['input']['path_for_attached_files'].DIRECTORY_SEPARATOR.$this->_name.'_'.date('Ymdms').'.'.$this->_ext;
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
    * get ticket details list for ticket
    * 
    * @param int $ticketId - ticket id
    * @access public
    * @return array
    */
    function ticketDetailsList($ticketId) {
        
                  SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from($this->table_name);
                  SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('userId', SHIN_Core::$_libs['auth']->user->idUser);
        
        $query  = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
        
        return $query->result_array();
    }
    
    /**
    * get count ticket details for current ticket
    * 
    * @param int $ticketId - current ticket id
    * @access public
    * @return int
    */
    function getCountDetailsByTicketId($ticketId) {
        
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('COUNT(*) as count');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from($this->table_name);
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('userId', SHIN_Core::$_libs['auth']->user->idUser);    
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idTicket', $ticketId);
        
        $query  = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
        $result = $query->row(0, 'array');
        
        return $result['count'];
            
    }
    
    /**
    * get details list for current ticket
    * 
    * @param int $ticketId - current ticket id
    * @access public
    * @return array
    */
    function getDetailsByTicketId($ticketId)
    {        
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from($this->table_name);
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idTicket', $ticketId);
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->order_by('created', 'asc');
        
        $query      = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
        $detailList = $query->result_array();
        
        foreach($detailList as &$detail) {
            $detail['attachPath'] = str_replace('\\', '/', $detail['attachPath']);  
            if($detail['userId'] == SHIN_Core::$_libs['auth']->user->idUser) {
                $detail['owner']  = 'user';   
            } else {
                $detail['owner']  = 'support';  
            }

			$detail['bodyparced'] = htmlspecialchars_decode($detail['body']);
        }
        
        return $detailList;
    }


} // end of class

/* End of file Ticketdetails_model.php */
