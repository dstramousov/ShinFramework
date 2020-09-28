<?php

class SHINTicket_User_model extends SHIN_MPKModel {

    /**
     * Physical tablename.
     */
    var $table_name = 'shinticket_user';
	
	public $_shticket_idCustomer = NULL;
    
    function __construct()
	{
        parent::__construct($this->table_name);
        
        // PK Index definition
        $this->primary_key  = array('userId', 'idCustomer');
        
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
            'validate'          => 'custom_userid_validate',
            'info_field_txt'    => false,
            'info_field_ico'    => false,
        ));
        
        $this->insert_field(array(
            'table'             => 'sys_user',
            'column'            => 'name',
            'type'              => 'varchar',
            'width'             => 45,
            'title'             => '',
            'null'              => 0,
            'info_field_txt'    => null,
            'info_field_ico'    => null,
            'virtual'           => true,
        ));

        $this->insert_field(array(
            'column' => 'idCustomer',
            'type'   => 'tinyint',
            'join'   => array(
                'mode'   => 'left',
                'table'  => 'shinticket_customerlist',
                'column' => 'idCustomer',
            ),
            'input'  => array(
                'type'          => 'select',
                'from'          => 'shinticket_customerlist',
                'data'          => 'idCustomer',
                'caption'       => 'customerName',
                'nonset_id'     => '',
                'nonset_name'   => '',
            ),
            'validate'          => 'custom_customerid_validate',
            "null"              => 1,
            'info_field_txt'    => false,
            'info_field_ico'    => false,
        ));
        
        $this->insert_field(array(
            'table'             => 'shinticket_customerlist',
            'column'            => 'customerName',
            'type'              => 'varchar',
            'width'             => 45,
            'title'             => '',
            'null'              => 0,
            'info_field_txt'    => false,
            'info_field_ico'    => false,
            'virtual'           => true,
        ));
		
    }
    
    /**
    * validate userId
    * 
    * @access public
    * @return array()
    * $param int - $data
    * 
    */
    public function custom_userid_validate($data){
        
       if(empty($this->userId)) {
            return array('result' => false, 'value' => 'lng_label_shinticket_userid_empty_validation');    
       }
       
       if(!$this->_checkMultiPK()) {
           return array('result' => false, 'value' => 'lng_label_shinticket_userid_unique_validation');
       }
       
       return array('result' => true, 'value' => '');    
    }
    
    /**
    * validate customerId
    * 
    * @access public
    * @return array()
    * $param int - $data
    * 
    */
    public function custom_customerid_validate($data){
        
       if(empty($this->idCustomer)) {
            return array('result' => false, 'value' => 'lng_label_shinticket_customerid_empty_validation');    
       }
       
       if(!$this->_checkMultiPK()) {
           return array('result' => false, 'value' => 'lng_label_shinticket_customerid_unique_validation');
       }
       
       return array('result' => true, 'value' => '');    
    }
    
    /**
    * validate userId and idCustomer as single PK
    * 
    * @param null
    * @access private
    * @return boolean
    * 
    */
    function _checkMultiPK(){
       
        if((!isset($this->oldUserId) && !isset($this->oldCustomerId)) || ($this->oldUserId != $this->userId || $this->oldCustomerId != $this->idCustomer)) {
           
           SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('COUNT(*) as count');
                           SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from($this->table_name);
                           SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('userId',       $this->userId);
           $query     = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
           $result    = $query->row(0, 'array');
           
           if($result['count'] > 0) {
               return false;
           }
            
           SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('COUNT(*) as count');
                           SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from($this->table_name);
                           SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('userId',       $this->userId);
                           SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idCustomer',   $this->idCustomer);
           $query     = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
           $result    = $query->row(0, 'array');
           
           if($result['count'] > 0) {
               return false;
           }
        }
        
        return true;    
    } 
	
	public function __initCustomerID()
	{
		$query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get_where('shinticket_user', array('userId' => SHIN_Core::$_user->idUser), 1);
		foreach ($query->result_array() as $row)
		{
			$this->_shticket_idCustomer = $row['idCustomer'];
		}
	}
    
    /**
    * get user list
    * 
    * @access public
    * @return array
    * @param null
    * 
    */
    public function getCustomerList(){
        
              $resultObj   = $this->get_expanded_result();
       return $resultObj->result_array();    
    }
    
    /**
    * delete shinticket user
    * 
    * @access public
    * @return null
    * @param int $sysUserId
    * @param int $customerId
    */
    public function deleteShinticketUser($sysUserId, $customerId) {
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->delete($this->table_name, array('userId' => $sysUserId, 'idCustomer' => $customerId));    
    }
    
    /**
    * store information about shinthicket user in db
    * 
    * @param null 
    * @access public
    * @return null
    * 
    */
    public function storeShinticketUser(){
        
        $data = array('userId'          =>  $this->userId,
                      'idCustomer'      =>  $this->idCustomer,
                      );
       
       if(empty($this->oldUserId) && empty($this->oldCustomerId)) {
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert($this->table_name, $data);
       } else {
            
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('userId',         $this->oldUserId);
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idCustomer',     $this->oldCustomerId);
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->update($this->table_name, $data); 
       }
            
    }


} // end of class

/* End of file SHINTicket_ApplicationList_model.php */