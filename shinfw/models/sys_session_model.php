<?php

/**
 * system\application\models\session_model.php
 *
 * Model Session_model. (keep users session)
 *
 */

class Sys_Session_model extends SHIN_Model {

	var $id;
	var $uid;
	var $stored;
	var $updated;
	var $host;

    /**
     * Physical tablename.
     */
    var $table_name = 'sys_session';

    var $max_session;
    var $idle_session;
    
    function __construct()
	{
        parent::__construct($this->table_name);
		
        $this->primary_key   = 'id';
        		
        $this->insert_field(array(
            'column' => 'id',
            'type'   => 'char',
            'width'  => 32,
            'attr'   => 'key',
            'store'  => 1,
            'update' => 0,
        ));
		
        $this->insert_field(array(
            'column' => 'uid',
            'type'   => 'integer',
            'join'   => array(
                'mode'   => 'left',
                'table'  => 'sys_user',
                'column' => 'idUser',
            ),
        ));


        $this->insert_field(array(
            'column' => 'stored',
            'type'   => 'datetime',
            'read'   => 0,
            'update' => 0,
        ));
		
        $this->insert_field(array(
            'column' => 'updated',
            'type'   => 'datetime',
            'null'   => 1
        ));
						
        $this->insert_field(array(
            'column' => 'host',
            'type'   => 'varchar',
            'with'   => 15,
			'title'  => 'Host',
            'null'   => 1
        ));		
    }

    function init($max_interval, $idle_interval)
	{
		$this->max_session	= $max_interval;
		$this->idle_session	= $idle_interval;
    }

    // Cookie functions:
    /**
     * Reads session data from cookie, returns true of the session is ok.
     *
     * @access public
     * @return bool
     */
    function read()
    {
		if(SHIN_Core::$_run_type != RUNNING_TYPE_AJAX){
			$this->delete_expired_sessions();
		}

        // small fix for running setup part without authorization 
        if(SHIN_Core::$_libs['uri']->uri_string == '/setup'){return true;};

        // read cookie:
        $this->id = $this->param_cookie('session_id');
        if ($this->id == '') {
            return false;
        } 
		
		$query = SHIN_Core::$_db[SHIN_Core::$_shdb->sys_database]->get_where($this->table_name, array('id' => $this->id));
		foreach ($query->result_array() as $row)
		{   
			$this->_mapper($row);
		}
		$query->free_result();
		
        if ($this->isDefinite()) {
			$data = array('uid' => $this->uid, 'updated' => date('Y-m-d H:i:s', time()));
            SHIN_Core::$_db[SHIN_Core::$_shdb->sys_database]->where('id', $this->id);
            SHIN_Core::$_db[SHIN_Core::$_shdb->sys_database]->update($this->table_name, $data);
			
			$ret = true;
        } else {
	        $ret = false;
        }
				
		return $ret;
    }

    /**
     * Delete current session from DB.
     *
     * @access public
     */
    function del()
	{
		SHIN_Core::log('debug', '[SESSION] Model Session_model delete session with id='.$this->id);
		SHIN_Core::$_db[SHIN_Core::$_shdb->sys_database]->delete($this->table_name, array('id' => $this->id)); 
    }


    /**
     * Starts new session for given user ID.
     *
     * Start new session for given user ID.
     * Store data in database and in cookie.
     *
     * @access public
     */
    function start($uid)
    {   
        $host = SHIN_Core::$_input->ip_address();

        list($msec, $sec) = explode(' ', microtime());
        $code = md5($uid . $host . $sec . $msec);

        $this->id = $code;

		$data = array(
		               'id'		=> $code,
		               'uid'	=> $uid,
		               'host'	=> $host,
		               'stored'	=> date('Y-m-d H:i:s', time()),
		               'updated'=> date('Y-m-d H:i:s', time()),
					 );
        SHIN_Core::$_db[SHIN_Core::$_shdb->sys_database]->insert($this->table_name, $data); 
        $this->write_cookie();
		SHIN_Core::log('debug', 'Session started. id='.$this->id);
    }

    /**
     * Delete stale sessions from database.
     *
     * @access public
     */
    function delete_expired_sessions()
    {        
        if(SHIN_Core::$_libs['uri']->uri_string == '/setup'){return true;};

        $query_str =
            "delete from ".$this->table_name." where" .
            " updated < '" .  date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s') . ' -' . $this->max_session . ' minutes'))."'" ;

        $query = SHIN_Core::$_db[SHIN_Core::$_shdb->sys_database]->query($query_str);
    }

    /**
     * Get information about cookie.
     *
     * !! WARNING !!
     * 
     * In this function session id can changed for requester with parameter:  SHIN_Core::$_config['core']['phys_folder_name']
     * if parameter with this name exist -> session id must changed for value from this parameter.
     *
     * This logic need for some process who is not use standart session id but can use external(preinitialized)  value: 
     * for example : SHIN_Uploadify used this parameter.
     *
     *
     * @access public
     */
	function param_cookie($name)
	{		
		$_c = SHIN_Core::$_libs['session']->userdata('session_id');

		// THIS 2 lines make changes for session id for some process who is not used standart session   //////
//		$if_tmp_sess_present = SHIN_Core::$_input->globalarr(SHIN_Core::$_config['core']['phys_folder_name']);
		$if_tmp_sess_present = SHIN_Core::$_input->globalarr('shinframework');
		if($if_tmp_sess_present){$_c = $if_tmp_sess_present;}
		//////////////////////////////////////////////////////////////////////////////////////////////////////

	    return $_c ? $_c : '';
	}
	
    /**
     * Write code to cookie.
     *
     * @access public
     */
    function write_cookie()
    {
		$cookie_new = array('session_id'   => $this->id);
		SHIN_Core::$_libs['session']->set_userdata($cookie_new);
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
		$h = parent::validate_form($fields_to_write);

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
		$h = parent::read_form($fields_to_write);

		return $h;
	}
	
	

} // end of class

/* End of file session_model.php */
/* Location: ./system/application/models/session_model.php */