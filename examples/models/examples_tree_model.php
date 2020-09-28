<?php

define('TREE_ELEMENT_TYPE_ROOT', 0);

class Examples_tree_model extends SHIN_Model {

    /**
     * Physical tablename.
     */
    var $table_name = 'examples_tree';
	
	
	var $_tree_info_array = array();

    function __construct() 
	{
        parent::__construct($this->table_name);
		
		// PK Index definition
        $this->primary_key   = 'idNode';
		
		// Index definition
        $this->insert_index('idParent');
        $this->insert_index('info');
				
		// Fields definition
		$this->insert_field(array(
			"column" => "idNode",
			"type"   => "integer",
			"attr"   => "auto_increment",			
		));
		
        $this->insert_field(array(
            'column' => 'idParent',
            'type'   => 'integer',
            'value'  => 0,
            "null"   => 0
        ));
        
        $this->insert_field(array(
            'column' => 'info',
            'type'   => 'varchar',
            'width'  => 100,
			'value'  => '',
            "null"   => 0
        ));
		
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
        $array_data = parent::fetchCorrectPagingData($customization_fields, $where_condition, DB_FETCH_ANSWER_TYPE_ARRAY);
        
        foreach($array_data['data'] as &$data) {
            $data['info']    =   '"<a href=javascript:void(0); onclick=loadItems(' . trim($data['idNode'], '"') . ')>' . trim($data['info'], '"') . '</a>"';    
        }
        
        return $this->packToJSONData($array_data);
    }


    /**
     * Get node information by ID.
     *
     * @access public
     * @input:  null
     * @output: array
     */
	function getNodeInfoByID($node_id)
	{
		if(!$node_id){return NULL;}

		$ret = array();
	    $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get_where($this->table_name, array('idNode'=>$node_id));
	    foreach ($query->result_array() as $row)
	    {
			$ret = $row;
	    }
	    $query->free_result();

        return $ret;
	}


    /**
     * Fetch all tree.
     *
     * @access public
     * @input:  null
     * @output: array
     */
	function getTreeInfo()
	{
        $html = '';
        $rootNode = $this->getNodeRoot();
		        
        $node_name = $rootNode['idNode']. ' | ' .$rootNode['info'];
        $html .= '<ul> 
						<li id="'.$rootNode['idNode'].'" class="open" root="true">';
        $html .= '			<a href="javascript:void(0);" id="' .'nhref_'.$rootNode['idNode'] . '">'.$node_name.'</a>';
                
        $html .= $this->getSubTree($rootNode['idNode']);
        $html .= '		</li>
				</ul>';
				
        return $html;
	}
	
    /**
    *  Return in to JSON type of view current tree.
    *
    * @access public
    * @param $fields needed fields for reading from form. 
    * @return hash: table => field.
    * @sa SHIN_Model::_getLinks()
     */
    public function getNodeRoot()
    {
		$_ret = NULL;
		
	    $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get_where($this->table_name, array('idParent'=>TREE_ELEMENT_TYPE_ROOT));
	    foreach ($query->result_array() as $row)
	    {
			$_ret = $row;
	    }
	    $query->free_result();
		
		if(!$_ret){
			SHIN_Core::show_error('ROOT node in to model not defined.');
		}
		
		return $_ret;
	}
	
    /**
    *  Return in to JSON type of view current tree.
    *
    * @access public
    * @param $fields needed fields for reading from form. 
    * @return hash: table => field.
    * @sa SHIN_Model::_getLinks()
     */
    public function getSpecialRelationArray()
    {
	    $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get($this->table_name);
	    foreach($query->result_array() as $row)
	    {
			$this->_tree_info_array[$row['idNode']] = $row;
	    }
		
	    $query->free_result();
		
        return $this->_tree_info_array;
    }
	
	private function getSubTree($_idNode)
	{
        $node_id = NULL;
		
		$_zerro_sight = TRUE;
		
		$str = '<ul>';
		
        $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get_where($this->table_name, array('idParent'=>$_idNode));
        foreach ($query->result_array() as $row)
        {   
			$node_id = $row['idNode'];
			
			$str .= '<li id="'.$row['idNode'].'"><ins class="jstree-icon">&nbsp;</ins>
						<a id="' .'nhref_'.$row['idNode'] . '" href="javascript:void(0);">'.$row['info'].'</a>
					';
			$_zerro_sight = FALSE;
			$str .= $this->getSubTree($node_id);            
			$str .= '</li>';
        }
        $query->free_result();
		
		$str .= '
		</ul>';
		
		if($_zerro_sight){$str = '';}
		
		return $str;
	}

} // end of class

/* End of file Tag_model.php */