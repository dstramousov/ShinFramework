<?php

class Trk_UploadActivity_model extends SHIN_Model {

    /**
     * Physical tablename.
     */
    var $table_name = 'trk_uploadactivity';
	
    function __construct()
	{
        parent::__construct($this->table_name);
        
        // PK Index definition
        $this->primary_key  = 'idUpload';
        $this->insert_index('idPhoto');
        $this->insert_index('userId');

		// Fields definition
		$this->insert_field(array(
			"column" => "idUpload",
			"type"   => "integer",
			"attr"   => "auto_increment",			
		));
        
        $this->insert_field(array(
            "column" => "idPhoto",
            "type"   => "integer",
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
			'column' => 'upload_date',
            'type'   => 'datetime',
            'title'  => 'lng_label_snaptrack_uploadactivity_upload_date',
			'value'  => $this->db_now_datetime(),
        ));

        $this->insert_field(array(
			"column" => "filesize",
            'type'   => 'bigint',
			'title'  => 'lng_label_shinticket_ticketdetails_parent',
            'null'   => 0
        ));
	} // end of function 

    /**
     * .
     *
     * @access public
     * @input:  $userid:integer
     * @output: $ret integer 0 or another int 
     */
	function getUsersBandWidth($userId, $date)
    {
        
        $ret = 0;

        $_arr              = preg_split("/-/", $date, 3);
        $last_day_of_month = date("d", mktime(0, 0, 0, ($_arr[1] + 1), 0, $_arr[0]));
        $where             = " WHERE upload_date BETWEEN '" . $_arr[0] . "-" . $_arr[1] . "-1 00:00:00' AND '" . $_arr[0] . "-" . $_arr[1] . "-" . $last_day_of_month . " 23:59:59' AND userId = " . $userId;

        $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->query('SELECT SUM(filesize) as totalbytes FROM ' . $this->table_name . $where);
    
        $total_bytes = 0;
        if ($query->num_rows() > 0){

            foreach ($query->result() as $row){
                $ret = $row->totalbytes;
            }

            $query->free_result();
        }

        if($ret == NULL){$ret = 0;}

        return $ret;
        
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
    * update activity record
    * 
    * @param int $photoId
    * @param array $data
    * @access public
    * @return null
    */
    function updateActivity($photoId, $data) {

        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idPhoto', $photoId);
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->update($this->table_name, $data);
    }
    
    /**
    * insert new activity record
    * 
    * @param array $data
    * @access public
    * @return null
    */
    function insertActivity($data) {
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert($this->table_name, $data);
    }
    
    /**
    * get total size of uploaded photos
    * 
    * @access public
    * @return int
    * @param null
    * 
    */
    function getTotalUploadedSize($id = null){
        
        if(is_null($id)) {
            $id =   SHIN_Core::$_user->idUser;
        }
            
                 SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('SUM(filesize) as sum');    
                 SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('userId', $id);    
        $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get($this->table_name);
        
        $row   = $query->row(0, 'array');    
        
        if(empty($row['sum'])) {
            $query->free_result(); return 0;
        }   
            $query->free_result(); return $row['sum'];
    }
    
     

} // end of class

/* End of file Snaptrack_User_model.php */