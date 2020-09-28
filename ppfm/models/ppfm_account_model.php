<?php

class Ppfm_Account_model extends SHIN_Model {

    /**
     * Physical tablename.
     */
    var $table_name = 'ppfm_account';

    function __construct()
	{
        parent::__construct($this->table_name);
		
		// PK Index definition
        $this->primary_key   = 'idAccount';
		
		// Fields definition
		$this->insert_field(array(
			"column" => "idAccount",
			"type"   => "integer",
			"attr"   => "auto_increment",			
		));
        
        
		$this->insert_field(array(
            'column'    => 'account',
            'type'      => 'varchar',
            'width'     => 45,
			'title'     => 'lng_label_ppfm_account',
			'value'     => '',
            'validate'  => 'sanitize_string',
            'null'      => 0,
            'value'     => 0,
            'unique'    => 1
        ));
		
        $this->insert_field(array(
            'column'    => 'curAmount',
            'type'      => 'float',
			'title'     => 'lng_label_ppfm_amount',
			'width'     => 7,
			'prec'      => 3,
            'validate'  => 'validate_float',
            'null'      => 1
        ));
		
        $this->insert_field(array(
			'column'    => 'lastUpdate',
            'type'      => 'date',
            'title'     => 'lng_label_ppfm_updated',
			'value'     => $this->db_now_datetime(),
            'validate'  => 'validate_date',
            'null'      => 1
        ));				
    }
	
	function getAccounts()
	{
		$ret = array();
		
		$query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get($this->table_name);
		foreach ($query->result_array() as $row)
		{
			$ret[$row['idAccount']] = $row['account'];
		}
		
		return $ret;
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
    
    function recalculate($accountId, $type, $amount){
        
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('curAmount');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from($this->table_name);    
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('ppfm_account.idAccount', $accountId);
         
        $query       = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
        $amountData  = $query->row_array();
        
        if($type == '+') {
            $amount = $amountData['curAmount'] + $amount;          
        } elseif($type == '-') {
            $amount = $amountData['curAmount'] - $amount;    
        }
        
        $data   =   array('curAmount' => $amount);
        
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idAccount', $accountId);
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->update($this->table_name, $data);
            
    }

		
    
} // end of class

/* End of file Account_model.php */