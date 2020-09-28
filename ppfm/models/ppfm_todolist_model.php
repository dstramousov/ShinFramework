<?php

class Ppfm_TodoList_model extends SHIN_Model {

    /**
     * Physical tablename.
     */
    var $table_name             = 'ppfm_todolist';
    
    var $todoListItemModelName  =   null;
    
    public function __construct()
	{
        parent::__construct($this->table_name);

		// PK Index definition
        $this->primary_key   = 'idList';
		
		// Index definition
        $this->insert_index('title');
        $this->insert_index('position');
				
		// Fields definition
		$this->insert_field(array(
			"column" => "idList",
			"type"   => "smallint",
            'width'  => 5,
			"attr"   => "auto_increment",			
		));
		
        $this->insert_field(array(
            'column' => 'title',
            'type'   => 'varchar',
            'width'  => 45,
			'title'  => 'lng_label_ppfm_todolist_title',
			'value'  => '',
            'null'   => 0
        ));
	
        $this->insert_field(array(
            'column' => 'progress',
            'type'   => 'smallint',
            'width'  => 5,
			'title'  => 'lng_label_ppfm_todolist_progress',
			'value'  => 0,
            'null'   => 1
        ));

        $this->insert_field(array(
            "column" => 'status',
            "type"   => 'enum',
            'width'  => 1,
            "title"  => 'lng_label_entry_status',
            "values" => array(
                'o'		=> "lng_label_ppfm_todolist_status_open",
                'c'		=> "lng_label_ppfm_todolist_status_close",
            ),
            "value" => 'o',
            "null"   => 0,
            'null'   => 1
        ));

        $this->insert_field(array(
            'column' => 'position',
            'type'   => 'integer',
			'title'  => 'lng_label_ppfm_todolist_position',
			'value'  => 0,
            'null'   => 1
        ));

        $this->insert_field(array(
            "column" => 'type',
            "type"   => 'enum',
            'width'  => 1,
            "title"  => 'lng_label_entry_type',
            "values" => array(
                's'		=> "lng_label_ppfm_todolist_type_shared",
                'p'		=> "lng_label_ppfm_todolist_type_private",
            ),
            "value" => 's',
            "null"   => 1,
        ));		
    }
    
    public function getOpenedItems(){
        
       $data  =  array();
         
       $result =  SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get_where($this->table_name, array('progress <' => 100));
       
       foreach ($result->result_array() as $row) {
           $data[] = $row;
       }
       
       return $data;
    }
    
    public function getTodoList(){
       
       $data   =  array();
       
                  SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->order_by('position', 'asc');
       $result =  SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get($this->table_name);
       
       foreach ($result->result_array() as $row) {
           $row['items']    =   SHIN_Core::$_models[$this->todoListItemModelName]->getTodoItemList($row['idList']);
           $row['count']    =   count($row['items']);
           $data[]          =   $row;
       }
       
       return $data;    
    }
    
    public function getSingleTodoList(){
       
       $data   =  array();
                  SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->order_by('position', 'asc');      
       $result =  SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get($this->table_name);
       
       foreach ($result->result_array() as $row) {
           $data[]          =   $row;
       }
       
       return $data;    
    }
    
    public function addNewTodo($title){
        
        return SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert($this->table_name, array('title'     => $title));    
    }
    
    public function deleteTodoList($id) {
        
        return SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->delete($this->table_name, array('idList'    => $id));    
    }
    
    public function closeTodoList($id, $status = 'c'){
        if($status == 'c') {
            return SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->update($this->table_name, array('status' => $status, 'progress' => 100), array('idList' => $id));
        } else {
            return SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->update($this->table_name, array('status' => $status), array('idList' => $id));    
        }
    } 
    
    public function closeTodoListWithItems($id, $status = 'c') {
        
        $result = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->update($this->table_name, array('progress' => 100, 'status' => $status), array('idList' => $id));
        
        if($result) {
            $result = SHIN_Core::$_models[$this->todoListItemModelName]->closeTodoItemByTodoListId($id, $status);     
        }
        
        return $result;
    }
    
    public function updateTodoItem($id, $data){
        
        $result = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->update($this->table_name, $data, array('idList' => $id));
        
        return $result;
    }
    
    public function getInfo($id) {
        
       $result =  SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get_where($this->table_name, array('idList' => $id));
       
       return $result->row(0, 'array');
    }
    
    public function updatePosition($data) {
        
        foreach($data  as $item) {
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->update($this->table_name, array('position' => $item['index'] + 1), array('idList' => $item['item']));
        }
        
        return true;
        
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

/* End of file TodoList_model.php */