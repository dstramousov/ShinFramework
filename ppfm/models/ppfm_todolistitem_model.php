<?php

class Ppfm_TodoListItem_model extends SHIN_Model {

    /**
     * Physical tablename.
     */
    var $table_name         = 'ppfm_todolistitem';
    
    var $todoListModelName  =   null;
    
    public function __construct()
	{	
        parent::__construct($this->table_name);
		
		// PK Index definition
        $this->primary_key   = 'idList';
		
		// Index definition
        $this->insert_index('idTodo');
        $this->insert_index('item');
				
		// Fields definition
		$this->insert_field(array(
			"column" => "idList",
			"type"   => "smallint",
            'width'  => 5,
			"null"	 => 0,
			"attr"   => "auto_increment",			
		));
		
        $this->insert_field(array(
            'column' => 'idTodo',
			"type"   => "smallint",
            'width'  => 5,
			"null"	 => 0,
			'title'  => 'lng_label_ppfm_todolist_progress',
			'value'  => 0,
        ));
		
        $this->insert_field(array(
            'column' => 'item',
            'type'   => 'varchar',
            'width'  => 45,
			'title'  => 'lng_label_ppfm_todolist_title',
			'value'  => '',
			"null"	 => 1,
        ));
		
        $this->insert_field(array(
            'column' => 'progress',
            'type'   => 'smallint',
            'width'  => 5,
			'title'  => 'lng_label_ppfm_todolist_progress',
			'value'  => 1,
        ));
		
        $this->insert_field(array(
            "column" => 'status',
            "type"   => 'enum',
            'width'  => 3,
            "title"  => 'lng_label_entry_status',
            "values" => array(
                'o'		=> "lng_label_ppfm_todolist_status_open",
                'c'		=> "lng_label_ppfm_todolist_status_close",
            ),
            "value" => 'o',
            "null"   => 1,
        ));
		
        $this->insert_field(array(
            'column' => 'position',
            'type'   => 'integer',
			'title'  => 'lng_label_ppfm_todolist_position',
			'value'  => 0,
            'null'   => 1
        ));
		
        $this->insert_field(array(
			'column' => 'completitionDate',
            'type'   => 'date',
            'value'  => $this->db_now_date(),
            'title'  => 'lang_label_todolistitemcompletion_date',
            'null'   => 1
        ));
		
        $this->insert_field(array(
			'column' => 'realCompletitionDate',
            'type'   => 'date',
            'value'  => $this->db_now_date(),
            'title'  => 'lang_label_todolistitemrealcompletion_date',
            'null'   => 1
        ));
		
        $this->insert_field(array(
            'column' => 'priority',
            'type'   => 'smallint',
            'width'  => 5,
			'title'  => 'lng_label_ppfm_todolistitem_priority',
			'value'  => 0,
            'null'   => 1
        ));
		
        $this->insert_field(array(
            'column' => 'note',
            'type'   => 'text',
            'value'  => '',
            'title'  => 'lng_label_todolistitem_note',
            'input'  => array(
                'type' => 'textarea',
                'rows' => 10,
                'cols' => 60,
            ),
            'null'   => 1
        ));		
    }
    
    public function getTodoItemList($idTodo){
       
       $data   =  array();
                  SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->order_by('position', 'asc');      
       $result =  SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get_where($this->table_name, array('idTodo' => $idTodo));
       
       foreach ($result->result_array() as $row) {
           $data[]    =   $row;
       }
       
       return $data;    
    }
    
    public function deleteTodoListItem($id) {
        
        $info   =   $this->getInfo($id);
        $result =   SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->delete($this->table_name, array('idList'    => $id));
        
        $sql    =   'SELECT COUNT(*) as count
                     FROM ' . $this->table_name . '
                     WHERE status = "o" AND idTodo = ' . $info['idTodo'];  
        
        $result     =   SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->query($sql);
        $itemData   =   $result->row(0, 'array');
        $count      =   $itemData['count'];
        
        // retrive all items with same Todo id and calculate total percentage
        $summ       =   0;
        $itemList   =   $this->getTodoItemList($info['idTodo']);
        $result     =   SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get_where($this->table_name, array('idTodo' => $info['idTodo']));   
        foreach ($result->result_array() as $row) {
           $summ +=$row['progress'];
        }
        
        $toDoListNewProgress  =   $summ/count($itemList);
        // update todo list by new progress
        $result = SHIN_Core::$_models[$this->todoListModelName]->updateTodoItem($info['idTodo'], array('progress' => $toDoListNewProgress));
        
        return $result;    
    }
    
    public function addNewTodoItem($todoListId, $data) {
        
        foreach($data as $key => $value) {
            if(empty($value)) {
                unset($data[$key]);
            }
        }
        
        $result = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert($this->table_name, $data);
        
        if($result) {
            $result = SHIN_Core::$_models[$this->todoListModelName]->closeTodoList($todoListId, 'o');     
        }
        
        // recalculate progress
        $sql    =   'SELECT COUNT(*) as count
                     FROM ' . $this->table_name . '
                     WHERE status = "o" AND idTodo = ' . $todoListId;  
        
        $result     =   SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->query($sql);
        $itemData   =   $result->row(0, 'array');
        $count      =   $itemData['count'];
        
        // retrive all items with same Todo id and calculate total percentage
        $summ       =   0;
        $itemList   =   $this->getTodoItemList($todoListId);
        $result     =   SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get_where($this->table_name, array('idTodo' => $todoListId));   
        foreach ($result->result_array() as $row) {
           $summ +=$row['progress'];
        }
        
        $toDoListNewProgress  =   $summ/count($itemList);
        // update todo list by new progress
        $result = SHIN_Core::$_models[$this->todoListModelName]->updateTodoItem($todoListId, array('progress' => $toDoListNewProgress));
        
        return $result;
    }
    
    public function closeTodoItem($id, $status = 'c'){
        
        if($status == 'c') {
            $result = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->update($this->table_name, array('progress' => 100, 'status' => $status), array('idList' => $id));
        } else {
            $result = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->update($this->table_name, array('progress' => 0, 'status' => $status), array('idList' => $id));    
        }
        
        if($result) {
            
            $result = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get_where($this->table_name, array('idList' => $id));
            
            $itemData   =   $result->row(0, 'array');
            $idTodoList =   $itemData['idTodo'];
               
            $sql    =   'SELECT COUNT(*) as count
                         FROM ' . $this->table_name . '
                         WHERE status = "o" AND idTodo = ' . $idTodoList;  
            
            $result     =   SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->query($sql);
            $itemData   =   $result->row(0, 'array');
            $count      =   $itemData['count'];
            
            // retrive all items with same Todo id and calculate total percentage
            $summ       =   0;
            $itemList   =   $this->getTodoItemList($idTodoList);
            $result     =   SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get_where($this->table_name, array('idTodo' => $idTodoList));   
            foreach ($result->result_array() as $row) {
               $summ +=$row['progress'];
            }
            
            $toDoListNewProgress  =   $summ/count($itemList);
            // update todo list by new progress
            $result = SHIN_Core::$_models[$this->todoListModelName]->updateTodoItem($idTodoList, array('progress' => $toDoListNewProgress));
            
            // if we close last item than we close all todo list else we open todo list
            
            if($count <= 0) {
                $result = SHIN_Core::$_models[$this->todoListModelName]->closeTodoList($idTodoList, 'c');
            } else {
                $result = SHIN_Core::$_models[$this->todoListModelName]->closeTodoList($idTodoList, 'o');    
            }
            
        }
        
        return $result; 
    }
    
    public function closeTodoItemByTodoListId($todoListId, $status = 'c') {
        
        if($status == 'c') {
            return SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->update($this->table_name, array('progress' => 100, 'status' => $status), array('idTodo' => $todoListId));     
        } else {
            return SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->update($this->table_name, array('progress' => 0, 'status' => $status), array('idTodo' => $todoListId));     
        }
    }
    
    public function updateTodoItem($id, $data){
        
        if($data['progress'] >= 100) {
            $data['status'] =   'c';    
        } else {
            $data['status'] =   'o';
        }
        
        $result =   SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->update($this->table_name, $data, array('idList' => $id));
        
        if($result){
            
            $result = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get_where($this->table_name, array('idList' => $id));
            
            $itemData   =   $result->row(0, 'array');
            $idTodoList =   $itemData['idTodo'];
            
            //  retrive opened items   
            $sql    =   'SELECT COUNT(*) as count
                         FROM ' . $this->table_name . '
                         WHERE status = "o" AND idTodo = ' . $idTodoList;  
            
            $result     =   SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->query($sql);
            $itemData   =   $result->row(0, 'array');
            $count      =   $itemData['count'];
            
            // retrive all items with same Todo id and calculate total percentage
            $summ       =   0;
            $itemList   =   $this->getTodoItemList($idTodoList);
            $result     =   SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get_where($this->table_name, array('idTodo' => $idTodoList));   
            foreach ($result->result_array() as $row) {
               $summ +=$row['progress'];
            }
            
            $toDoListNewProgress  =   $summ/count($itemList);
            // update todo list by new progress
            $result = SHIN_Core::$_models[$this->todoListModelName]->updateTodoItem($idTodoList, array('progress' => $toDoListNewProgress));
            
            // if we close last item than we close all todo list else we open todo list
            if($count <= 0) {
                $result = SHIN_Core::$_models[$this->todoListModelName]->closeTodoList($idTodoList, 'c');
            } else {
                $result = SHIN_Core::$_models[$this->todoListModelName]->closeTodoList($idTodoList, 'o');    
            }
        }
        
        return $result;
    }
    
    public function updatePosition($data) {
        
        foreach($data  as $item) {
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->update($this->table_name, array('position' => $item['index'] + 1), array('idList' => $item['item']));
        }
        
        return true;
        
    }
    
    public function getInfo($id) {
       
       $result =  SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get_where($this->table_name, array('idList' => $id));
       $row    =  $result->row(0, 'array');
       
       $row['completitionDate']     =   fromDbToDisplay($row['completitionDate']);   
       $row['realCompletitionDate'] =   fromDbToDisplay($row['realCompletitionDate']);   
       
       return $row; 
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

/* End of file TodoListItem_model.php */
