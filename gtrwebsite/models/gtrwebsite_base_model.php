<?php

class Gtrwebsite_Base_model extends SHIN_Model {

   
    function __construct($tableName) {
        parent::__construct($tableName);
    }
    
    /**
    * get table list
    * 
    * @access public
    * @param null
    * @return array
    * 
    */
    function getTableList($params = null)
    {
		$resultObj = $this->get_expanded_result($params);
       
		return $resultObj->result_array();
    }
}    

/* End of file Gtrwebsite_Base_model.php */