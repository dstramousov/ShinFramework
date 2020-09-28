<?php

define('TICKET_PRIORITY_LOW', 'l');
define('TICKET_PRIORITY_NORMAL', 'n');
define('TICKET_PRIORITY_HIGH', 'h');
define('TICKET_PRIORITY_ASAP', 'a');

define('TICKET_STATUS_CLOSED', 'd');
define('TICKET_STATUS_ARCHIVE', 'a');
define('TICKET_STATUS_ASSIGNED_TO_CUSTOMER', 'c');
define('TICKET_STATUS_ASSIGNED_TO_SUPPORT', 's');

class SHINTicket_Ticket_model extends SHIN_Model {

    /**
     * Physical tablename.
     */
    var $table_name = 'shinticket_ticket';
	
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
        $this->primary_key   = 'idTicket';
		
		// Fields definition
		$this->insert_field(array(
			"column" => "idTicket",
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
            ),
        ));
		
        $this->insert_field(array(
            'column' => 'applicationId',
            'type'   => 'integer',
            'join'   => array(
                'mode'   => 'left',
                'table'  => 'shinticket_applicationlist',
                'column' => 'idApplication',
            ),
            'input'  => array(
                'type'     => 'select',
                'from'     => 'shinticket_applicationlist',
                'data'     => 'idApplication',
                'caption'  => 'applicationName',
                'nonset_id'     => '',
                'nonset_name'   => '---',
            ),
			'null'      => 0,
            'validate'  => 'validate_application',
            'info_field_txt' => FALSE,
            'info_field_ico' => FALSE,
        ));
		
        $this->insert_field(array(
            "column"    => "title",
            "type"      => "varchar",
            'width'     => 100,
			'dom_width'  => 'width:140px;',
            "value"     => '',
            "null"      => 0,
            "title"     => 'lng_label_ticket_title',
            'validate'  => 'validate_title',
            'info_field_txt' => 'lng_label_ticket_mandatorytext_title',
            'info_field_ico' => 'images/help.png',
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
            "column" => 'priority',
            "type"   => 'enum',
            'width'  => 3,
            "title"  => 'lng_label_shinticket_priority',
            "values" => array(
                TICKET_PRIORITY_LOW		=> 'lng_label_ticket_priority_low',
                TICKET_PRIORITY_NORMAL	=> 'lng_label_ticket_priority_normal',
                TICKET_PRIORITY_HIGH	=> 'lng_label_ticket_priority_high',
                TICKET_PRIORITY_ASAP	=> 'lng_label_ticket_priority_asap',
            ),
            "value" => TICKET_PRIORITY_LOW,
            "null"   => 0,
            'info_field_txt' => FALSE,
            'info_field_ico' => FALSE,
		));

        $this->insert_field(array(
            "column" => 'status',
            "type"   => 'enum',
            "title"  => 'lng_label_shinticket_status',
            "values" => array(
                TICKET_STATUS_CLOSED				=> 'lng_label_ticket_status_closed',
                TICKET_STATUS_ARCHIVE				=> 'lng_label_ticket_status_archive',
                TICKET_STATUS_ASSIGNED_TO_CUSTOMER	=> 'lng_label_ticket_status_ascustomer',
                TICKET_STATUS_ASSIGNED_TO_SUPPORT	=> 'lng_label_ticket_status_assupport',
            ),
            "value" => TICKET_STATUS_ASSIGNED_TO_SUPPORT,
            "null"   => 0
		));

        $this->insert_field(array(
			'column' => 'created',
            'type'   => 'datetime',
            'title'  => 'lng_label_ppfm_updated',
			'value'  => $this->db_now_datetime(),
        ));				

        $this->insert_field(array(
			'column' => 'lastupdate',
            'type'   => 'timestamp',
            'title'  => 'lng_label_ppfm_updated',
			'value'  => $this->db_now_datetime(),
        ));

        $this->insert_field(array(
            'column' => 'attachPath',
            'type'   => 'varchar',
            'width'  => 150,
			'title'  => 'lng_label_shinticket_ticket_attach',
			'value'  => NULL,
            "null"   => 1
        ));

        $this->insert_field(array(
            'column' => 'realAttachFileName',
            'type'   => 'varchar',
            'width'  => 150,
			'title'  => 'lng_label_shinticket_ticket_attachfilename',
			'value'  => NULL,
            "null"   => 1
        ));
    }

    /**
    * @access public
    * @param NULL
    * @return NULL
    * @sa SHIN_Model::read_form()
     */
    function validate_title()
    {
    	if(!empty($this->title) && strlen($this->title) < 100) {
            return array('result' => true, 'value' => '');
        }
    	
    	return array('result' => false, 'value' => 'lng_label_error_title');
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
    
    function validate_application(){
        
        if(!empty($this->applicationId)) {
            return array('result' => true, 'value' => '');
        }
        
        return array('result' => false, 'value' => 'lng_label_error_application');
    }

	
    /**
	* @access public
	* @param $fields needed fields for reading from form. 
	* @return NULL
	* @sa SHIN_Model::read_form()
     */
	function save($fields_to_processed = null)
	{
		// 1. need check if exist attach parameters and keep it if it need.		
		if($this->_is_uploaded('attach_file'))
		{
			$this->_read_image_info('attach_file');
			
			$filename = $this->_genUnickFileName();
			$this->attachPath = $filename;
			$this->realAttachFileName = $this->filename;
			
			// copy file to storer
			copy($this->tmp_file, $filename);
			
		} else {
			$this->attachPath = NULL;
			$this->realAttachFileName = NULL;
		}
		
		// 2. add userid 
		$this->userId = SHIN_Core::$_user->idUser;
		
		// 3. created and lastupdate
		$_t = $this->db_now_datetime();
		$this->created		= $_t;
		$this->lastupdate	= $_t;
		
		$this->status = TICKET_STATUS_ASSIGNED_TO_SUPPORT;
				
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

        $this->filename	= $info['name'];                                                            
		$__data = preg_split("/\./", $this->filename);
		$this->_name = $__data[0];
		$this->_ext = $__data[1];
				
        $this->filesize	= $info['size'];
        $this->type		= $info['type'];
        $this->tmp_file	= $info['tmp_name'];

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
		
		$app_data = SHIN_Core::$_models['shinticket_relappcus_model']->getInfoByCustomerID();
		
		$options = trim($this->_make_options($app_data));
		$h['shinticket_ticket_applicationId_input'] ='<select id="shinticket_ticket_applicationId" name="shinticket_ticket_applicationId"><option value="" selected="selected">&nbsp;</option>'.$options.'</select>';
		
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
    * get ticket list using filter params
    * 
    * @param string $filter - status
    * @access public
    * @return array 
    */
    function getTicketList($status = null, $priority = null, $application = null)
	{
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('idTicket');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('title');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('body');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('priority');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('status');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('applicationName');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('created');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('lastupdate');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->order_by('created', 'desc');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from($this->table_name);
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->join('shinticket_applicationlist', 'shinticket_applicationlist.idApplication = ' . $this->table_name . '.applicationId');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('userId', SHIN_Core::$_libs['auth']->user->idUser);    
        
        // status filter 
        if(!is_null($status) && !empty($status)) {
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('status', $status);    
        }
        
        // priority filter
        if(!is_null($priority) && !empty($priority)) {
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('priority', $priority);    
        }
        
        // application filter
        if(!is_null($application) && !empty($application)) {
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('applicationName', $application);    
        }
	   
	    $query  = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
        $result = $query->result_array();  
		
		foreach($result as &$data)
		{		
		
			$ticketDetailObj = $this->getLatestTicket($data['idTicket']);
			
			if($ticketDetailObj->isDefinite()){
				$data['lastupdate'] = $ticketDetailObj->created;
				$ticketDetailObj = null;
			} 
			
			$data['body'] = strip_tags(htmlspecialchars_decode(get_shortened($data['body'], 50)));

            switch($data['status']) {
                case TICKET_STATUS_CLOSED:
                    $data['status'] =   '<div style="display:none;">' . $data['status'] . '</div><img src="' . SHIN_Core::$_config['core']['app_base_url'].'/images/datatable/lock.png">';   
                    break;
                case TICKET_STATUS_ARCHIVE:
                    $data['status'] =   '<div style="display:none;">' . $data['status'] . '</div><img src="' . SHIN_Core::$_config['core']['app_base_url'].'/images/datatable/compress.png">';
                    break;
                case TICKET_STATUS_ASSIGNED_TO_CUSTOMER:
                    $data['status'] =   '<div style="display:none;">' . $data['status'] . '</div><img src="' . SHIN_Core::$_config['core']['app_base_url'].'/images/datatable/user.png">';
                    break;
                case TICKET_STATUS_ASSIGNED_TO_SUPPORT:
                    $data['status'] =   '<div style="display:none;">' . $data['status'] . '</div><img src="' . SHIN_Core::$_config['core']['app_base_url'].'/images/datatable/user_red.png">';
                    break;
            }
		}
		
        return $result;
    }
    
    /**
    * get latest (if is possible) ticket detail for current ticket
    * 
    * @param integer $_ticketID. or NULL (for current $this)
    * @access public
    * @return NULL or string
    */
	function getLatestTicket($_ticketID = NULL)
	{
		$ret = NULL;
		
		if($_ticketID){$tid = $_ticketID;} else{$tid = $this->idTicket;}
		
		$ticketDetailModel = SHIN_Core::$_models['shinticket_ticketdetails_model']->get_instance(TRUE);
		
        $rResult = $ticketDetailModel->get_expanded_result(array(
            "where"     => "idTicket=".$tid,
            "order_by"  => "created desc",
            "limit"     => 1,
        ));
		
		foreach ($rResult->result_array() as $aRow){ 
            $ticketDetailModel->_mapper($aRow);
		}
		return $ticketDetailModel;
	}
    
    /**
    * get priority comboox list for displaying
    * 
    * @param null
    * @access public
    * @return array
    * 
    */
    function getPriorityList(){
        return array(TICKET_PRIORITY_LOW    => SHIN_Core::$_language->line('lng_label_ticket_priority_low'),
                     TICKET_PRIORITY_NORMAL => SHIN_Core::$_language->line('lng_label_ticket_priority_normal'),
                     TICKET_PRIORITY_HIGH   => SHIN_Core::$_language->line('lng_label_ticket_priority_high'),
                     TICKET_PRIORITY_ASAP   => SHIN_Core::$_language->line('lng_label_ticket_priority_asap'));
    }
    
    /**
    * get status comboox list for displaying
    * 
    * @param null
    * @access public
    * @return array
    * 
    */
    function getStatusList(){
        return array(TICKET_STATUS_CLOSED               => SHIN_Core::$_language->line('lng_label_ticket_status_closed'),
                     TICKET_STATUS_ARCHIVE              => SHIN_Core::$_language->line('lng_label_ticket_status_archive'),
                     TICKET_STATUS_ASSIGNED_TO_CUSTOMER => SHIN_Core::$_language->line('lng_label_ticket_status_ascustomer'),
                     TICKET_STATUS_ASSIGNED_TO_SUPPORT  => SHIN_Core::$_language->line('lng_label_ticket_status_assupport'));
    }


} // end of class

/* End of file Ticket_model.php */