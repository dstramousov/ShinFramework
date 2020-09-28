<?php

class Gtrwebsite_Tree_model extends SHIN_Model {

    /**
     * Physical tablename.
     */
    var $table_name = 'gtrwebsite_tree';
	
    /**
     * 
     */
    var $_tree_info_array = array();
	
    /**
     * 
     */
	var $_tree_info = array();
	
    /**
     * 
     */
	var $_solution_info_array = array();
	
    /**
     * 
     */
	var $_questions_info_array = array();
	
    /**
     * 
     */
	var $_answers_info_array = array();
	

    function __construct()
    {
        parent::__construct($this->table_name);
        
        // PK Index definition
        $this->primary_key   = 'idNode';
        
        // Fields definition
        $this->insert_field(array(
            "column" => "idNode",
            "type"   => "integer",
            "attr"   => "auto_increment",            
        ));

		$this->insert_field(array(
			"column"	=> "idParent",
			"type"		=> "integer",
            'null'		=> 1,
            'info_field_ico'	=> 'images/help.png',
            'info_field_txt'	=> 'lang_label_gtrwebsite_tree_idparent',
		));

        $this->insert_field(array(
            'column' => 'userIns',
            'type'   => 'integer',
            'join'   => array(
                'mode'   => 'left',
                'table'  => 'sys_user',
                'column' => 'idUser',
            ),
            'null'  => 1
        ));

        $this->insert_field(array(
            'column'	=> 'dataIns',
            'type'		=> 'datetime',
			'value'		=> $this->db_now_datetime(),
            'null'		=> 1,
            'info_field_ico'	=> 'images/help.png',
            'info_field_txt'	=> 'lang_label_gtrwebsite_tree_datains',
        ));

        $this->insert_field(array(
            'column' => 'userMod',
            'type'   => 'integer',
            'join'   => array(
                'mode'   => 'left',
				'as'   => 'usermodUserID',
                'table'  => 'sys_user',
                'column' => 'idUser',
            ),
            'null'  => 1
        ));

        $this->insert_field(array(
            'column'	=> 'dataMod',
            'type'		=> 'timestamp',
			'value'		=> $this->db_now_datetime(),
            'null'		=> 0,
            'info_field_ico'	=> 'images/help.png',
            'info_field_txt'	=> 'lang_label_gtrwebsite_tree_datamod',
            'null'  => 1
        ));
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
    *  Define relation for SHIN_Model::getLinks()  -> cascade deleting.
    *
    * @access public
    * @param $fields needed fields for reading from form. 
    * @return hash: table => field.
    * @sa SHIN_Model::_getLinks()
     */
    function getLinks()
    {
    	return array('gtrwebsite_answers'=>'idNode', 'gtrwebsite_question'=>'idNode');
    }
	
	
    /**
    *  Return in to JSON type of view current tree.
    *
    * @access public
    * @param NULL
    * @return JSON ready answer.
     */
    function getCurrentTree()
    {
		$retJSON = '';
		
		$_tree_info_array = array();
		$_tree_info_array = $this->getSpecialRelationArray();
		
        echo json_encode(array('tree' => $_tree_info_array)); exit();
    }
	
	
    /**
    *  Return in to array information about Answer and Question for some idNode from tree. 
    *
    * @access public
    * @param $fields needed fields for reading from form. 
    * @return array $_ret: array('question_info'=>array(), 'answer_info'=>array());
     */
    public function getQAByNodeID($_idNode=NULL)
    {
		if($_idNode){
			$this->fetchByID($_idNode);
		}
		
		$_ret = array('question_info'=>array(), 'answer_info'=>array());
		
	    $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get_where('gtrwebsite_question', array('idNode' => $this->idNode));
	    foreach ($query->result_array() as $row)
	    {
			array_push($_ret['question_info'], $row);
	    }
	    $query->free_result();
		
	    $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get_where('gtrwebsite_answers', array('idNode' => $this->idNode));
	    foreach ($query->result_array() as $row)
	    {
			array_push($_ret['answer_info'], $row);
        }
	    $query->free_result();
		
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
    public function getNodeRoot()
    {
		$_ret = NULL;
		
	    $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get_where('gtrwebsite_tree', array('idParent'=>CT_TREE_ELEMENT_TYPE_ROOT));
	    foreach ($query->result_array() as $row)
	    {
			$_ret = $row;
	    }
	    $query->free_result();
		
		if(!$_ret){
			SHIN_Core::show_error('ROOT node in to model <b>gtrwebsite_tree</b> not defined.');
		}
		
		return $_ret;
	}
	
    /**
    *  Recurce delete all nodes from any node. This is not the same of delCascading.
    *
    * @access public
    * @param $idNode from how node need make delete
    * @return NULL.
     */
    public function recDelete($idNode)
    {
		$count = 0;
	    $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get_where('gtrwebsite_tree', array('idParent'=>$idNode));
	    foreach ($query->result_array() as $row)
	    {
			SHIN_Core::$_models['gtrwebsite_tree']->delCascading($row['idNode']);
			$count = $this->recDelete($row['idNode']);
	    }
	    $query->free_result();
		
		return $count;
	}
	
	
    /**
    *  Move to another node
    *
    * @access public
    * @param $currentIDNode Current node id
    * @param $newIDParent new parent id
    * @return NULL.
     */
    public function moveNode($currentIDNode, $newIDParent)
    {
		$_ret = TRUE;

		$data = array(
               'idParent' => $newIDParent,
            );

		SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idNode', $currentIDNode);
		SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->update($this->table_name, $data);
		
		return $_ret;
	}
    
    /**
    *  copy node to another node
    *
    * @access public
    * @param $currentIDNode Current node id
    * @param $newIDParent new parent id
    * @return NULL.
     */
    public function copyNode($currentIDNode, $newIDParent)
	{	
		$_last_insert_id = NULL;
		
		// set solutionid = 0 for target node  //////////////////////////////////
		$updated_data = array('idSolution'=>NULL);
		SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idNode', $newIDParent);
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->update('gtrwebsite_answers', $updated_data);
		/////////////////////////////////////////////////////////////////////////
	
		// insert new node with $currentIDNode for $newIDParent  ////////////////
        $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get_where($this->table_name, array('idNode'=>$currentIDNode));
		$new_node_data = array();
        foreach ($query->result_array() as $row)
        {
			$new_node_data = $row;
		}
		$new_node_data['idNode']	= NULL;
		$new_node_data['idParent']	= $newIDParent;
		SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert($this->table_name, $new_node_data);
		$_last_insert_id = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert_id();
		
		$query_quest = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get_where('gtrwebsite_question', array('idNode'=>$currentIDNode));
		foreach ($query_quest->result_array() as $row_quest)
		{                
			$row_quest['idQuestion']	= NULL;
			$row_quest['idNode']		= $_last_insert_id;
			SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert('gtrwebsite_question', $row_quest);
		}			
		$query_quest->free_result();
		$query_answr = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get_where('gtrwebsite_answers', array('idNode'=>$currentIDNode));
		foreach ($query_answr->result_array() as $row_answr)
		{                
			$row_answr['idAnswer']	= NULL;
			$row_answr['idNode']	= $_last_insert_id;
			SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert('gtrwebsite_answers', $row_answr);
		}			
		$query_answr->free_result();
		//////////////////////////////////////////////////////////////////////////
	
		$nodes = $this->getNodesForCurrentLevel($currentIDNode, $_last_insert_id);
	
		return TRUE;
    }
	
	private function getNodesForCurrentLevel($_idNode, $_last_insert_id)
	{
        $nodes = array();
		
        $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get_where($this->table_name, array('idParent'=>$_idNode));
        foreach ($query->result_array() as $row)
        {                
			$__CUR = $row['idNode'];
			$row['idNode']		= NULL;
			$row['idParent']	= $_last_insert_id;
			
			SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert($this->table_name, $row);
			
			$__last_insert_id = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert_id();
			
			// copy answer and question if exist //////////////////////////////
			$query_quest = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get_where('gtrwebsite_question', array('idNode'=>$__CUR));
			foreach ($query_quest->result_array() as $row_quest)
			{                
				$row_quest['idQuestion']	= NULL;
				$row_quest['idNode']		= $__last_insert_id;
				SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert('gtrwebsite_question', $row_quest);
			}			
			$query_quest->free_result();
			$query_answr = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get_where('gtrwebsite_answers', array('idNode'=>$__CUR));
			foreach ($query_answr->result_array() as $row_answr)
			{                
				$row_answr['idAnswer']	= NULL;
				$row_answr['idNode']	= $__last_insert_id;
				SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert('gtrwebsite_answers', $row_answr);
			}			
			$query_answr->free_result();
			///////////////////////////////////////////////////////////////////
			
			$this->getNodesForCurrentLevel($__CUR, $__last_insert_id);
        }
		
        $query->free_result();
		
		return $nodes;
	}
	
	private function getSubTree($_idNode)
	{
        $node_id = NULL;
		
        $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get_where($this->table_name, array('idParent'=>$_idNode));
        foreach ($query->result_array() as $row)
        {                
            //$node_name = $row['idNode']. ' | ' .get_shortened($anwer_body, 30) . ' | ' . get_shortened($question_body, 30);
			$node_id = $row['idNode'];
			
            array_push($this->_tree_info, $node_id);
			$this->getSubTree($node_id);
            
        }
        $query->free_result();
		
		return $node_id;
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
	    // 1. generate main structure of tree.
		// get all information from "GTRWEBSITE_SOLUTION"
	    $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get('gtrwebsite_solution');
	    foreach ($query->result_array() as $row)
	    {
			$this->_solution_info_array[$row['idSolution']] = $row;
	    }
	    $query->free_result();

		// get all information from "GTRWEBSITE_QUESTION"
	    $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get('gtrwebsite_question');
	    foreach ($query->result_array() as $row)
	    {
			$this->_questions_info_array[$row['idNode']] = $row;
	    }
	    $query->free_result();
		
		// get all information from "GTRWEBSITE_ANSWERS"
	    $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get('gtrwebsite_answers');
	    foreach ($query->result_array() as $row)
	    {
			if(isset($row['idSolution'])){
				if(isset($this->_solution_info_array[$row['idSolution']])){
					$row['solution_info'] = $this->_solution_info_array[$row['idSolution']];
				}
			} else {
				$row['solution_info'] = NULL;
			}
			$this->_answers_info_array[$row['idNode']] = $row;
	    }
	    $query->free_result();
	    
		// get all information from "GTRWEBSITE_TREE"
	    $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get('gtrwebsite_tree');
	    foreach($query->result_array() as $row)
	    {
			if(isset($this->_questions_info_array[$row['idNode']])){
				$row['question_info'] = $this->_questions_info_array[$row['idNode']];
			} else {
				$row['question_info'] = NULL;
			}

			switch($row['idParent']){
				case CT_TREE_ELEMENT_TYPE_ROOT:
					$row['answer_info'] = NULL;
				break;
				
				default:
					if(isset($this->_answers_info_array[$row['idNode']])){
						$row['answer_info'] = $this->_answers_info_array[$row['idNode']];
					} else {
						$row['answer_info'] = NULL;
					}
				break;
			}
			
			
			$this->_tree_info_array[$row['idNode']] = $row;
	    }
		
	    $query->free_result();
		
        return $this->_tree_info_array;
    }
	
    /**
    * Get children info for some idNode by idParent
    * 
    * @param int $idParent
    * @access public
    * @return int
    */
	function getChildrenforCurrentLevel($idParent)
    {
        $_nodes_arr = array();
        
        $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get_where('gtrwebsite_tree', array('idParent' => $idParent));
        foreach ($query->result_array() as $row)
        {
            $_nodes_arr[$row['idNode']] = $row;
        }
        $query->free_result();
        
        return $_nodes_arr;
    }
    
    /**
    * Get parent idNode by children idNode
    * 
    * @param int $idNode
    * @access public
    * @return int
    */
    function getParentIdforCurrentLevel($idNode)
	{   
        $_nodes_arr = array();
		
        // 1. get information about children node
	    $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->query('SELECT idNode,
                                                                                 idParent 
                                                                          FROM ' . $this->table_name . '  
                                                                          WHERE idNode = ' . $idNode . '  
                                                                          LIMIT 1');
	    $result = $query->row(0, 'array');
        
        // 2. get information about parent node, but only for non root nodes
        if(!empty($result['idParent'])) {
            
            $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->query('SELECT idNode,
                                                                                     idParent 
                                                                              FROM ' . $this->table_name . '  
                                                                              WHERE idNode = ' . $result['idParent'] . '  
                                                                              LIMIT 1');
            $result = $query->row(0, 'array');
        } else {
            $result['idNode'] = null;
        }
        
		return $result;
	}
    
    /**
    * add new node to the tree
    * 
    * @param int $parent
    * @param string $title
    * @access public
    * @return int
    */
    public function createNode($parent){
        
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert($this->table_name, array('idParent' => $parent,
                                                                                          'userIns'  => SHIN_Core::$_libs['auth']->user->idUser,
                                                                                          'dataIns'  => $this->db_now_datetime()));
        
        return SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert_id();     
    }
    
    /**
    * delete root node
    * 
    * @access public
    * @return null
    * @param null
    * 
    */
    public function delRoot(){
        // delete from tree
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->truncate($this->table_name);
        // delete from answers        
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->query('DELETE FROM ' . SHIN_Core::$_models['gtrwebsite_answers']->table_name);
        // delete from question        
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->query('DELETE FROM ' . SHIN_Core::$_models['gtrwebsite_question']->table_name);        
    }


} // end of class

/* End of file Gtrwebsite_Tree_model.php */
