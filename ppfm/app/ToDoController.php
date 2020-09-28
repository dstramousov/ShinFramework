<?php

require "CommonController.php"; 

class ToDoController extends CommonController {
    
    private $todoListModel;
    
    private $todoListModelname  =   'ppfm_todolist_model';
    
    private $todoListItemModel;
    
    private $todoListItemModelName  =   'ppfm_todolistitem_model';
    
    function __construct() {
    
        parent::__construct();
        
        $nedded_libs = array(
                            'models' => array(
                                array('ppfm_todolist_model', $this->todoListModelname),
                                array('ppfm_todolistitem_model', $this->todoListItemModelName)
                            ),
                            
                            'libs' => array(
                                'SHIN_ToDo',                                
                                'SHIN_Dialog',
                                'SHIN_Datepicker',
                                'SHIN_BlockUI'                                
                            ),
                            
                            'help'  =>  array('date', 'validate')
                         );
                         
        SHIN_Core::postInit($nedded_libs);
        
        $this->todoListModel      =   SHIN_Core::$_models['ppfm_todolist_model']->get_instance();   
        $this->todoListItemModel  =   SHIN_Core::$_models['ppfm_todolistitem_model']->get_instance();
        
        $this->todoListModel->todoListItemModelName =   $this->todoListItemModelName;   
        $this->todoListItemModel->todoListModelName =   $this->todoListModelname;   
        
        SHIN_Core::$_libs['seo']->addToTitle(SHIN_Core::$_language->line('lng_label_ppfm_todo'));
    }

    function index(){
        
        $todoListObj    =   SHIN_Core::$_libs['todo']->get_instance();
        
        SHIN_Core::$_jsmanager->addComponent($todoListObj->render());
        
        return 'todo/todo.tpl';
    }
    
    
    function ajaxEvents(){
        
        $action =   SHIN_Core::$_input->post('action');
        $data   =   array();
        $message=   '';
        $errors =   array();
        
        switch($action) {
            case 'load-items':
                $id             =   SHIN_Core::$_input->post('id');
                
                SHIN_Core::$_libs['templater']->assign('todoItemList',   $this->todoListItemModel->getTodoItemList($id));
                  
                return 'todo/single-todoitems.tpl';
                break;
            
            case 'add-todo':
                $title          =   SHIN_Core::$_input->post('title');
                
                $validateResult =   sanitize_string($title);
                if(empty($title) || !$validateResult['result'] || strlen($title) > 45) {
                    $errors['title_add']   =   SHIN_Core::$_language->line('lng_label_incorrect_title');
                }
                
                
                if(empty($errors)) {
                
                    $result         =   $this->todoListModel->addNewTodo($title);
                
                    if($result){
                        $result     =   true;
                        $message    =   SHIN_Core::$_language->line('lng_label_todo_list_added');
                    } else {
                        $result     =   false;
                        $message    =   SHIN_Core::$_language->line('lng_label_error_add_new_todo');
                    }
                } else {
                    $result     =   false;
                    $message    =   $errors;
                } 
                break;
            
            case 'add-todo-item':
                
                $title                  =   SHIN_Core::$_input->post('title');
                $progress               =   SHIN_Core::$_input->post('percantage');
                $completitionDate       =   SHIN_Core::$_input->post('completition_date'); 
                $realCompletitionDate   =   SHIN_Core::$_input->post('real_completition'); 
                $priority               =   SHIN_Core::$_input->post('priority'); 
                $note                   =   SHIN_Core::$_input->post('note'); 
                
                $data                   =   array();
                $errors                 =   array();
                
                $validateResult =   sanitize_string($title);
                if(!empty($title) && $validateResult['result'] && strlen($title) <= 45) {
                    $data['item']   =   $title;    
                } else {
                    $errors['item_title_add']   =   SHIN_Core::$_language->line('lng_label_incorrect_title');
                }
                
                if(empty($progress)) {
                    $data['progress']   =   0;
                } elseif(validate_int($progress) && $progress >=0 && $progress <=100) {
                    $data['progress']   =   $progress;    
                } else {
                    $errors['item_percantage_add']   =    SHIN_Core::$_language->line('lng_label_incorrect_progress');
                }
                
                if(!empty($completitionDate)) {
                    if(validate_date($completitionDate)) {
                        $data['completitionDate']   =   fromDisplayToDb($completitionDate);
                    } else {
                        $errors['item_completition_date_add']   =   SHIN_Core::$_language->line('lng_label_incorrect_c_date');
                    }
                }
                
                if(!empty($realCompletitionDate)) {
                    if(validate_date($realCompletitionDate)) {
                        $data['realCompletitionDate']   =   fromDisplayToDb($realCompletitionDate);
                    } else {
                        $errors['item_real_completition_date_add']   =   SHIN_Core::$_language->line('lng_label_incorrect_r_date');
                    }
                }
                
                if(empty($priority)) {
                    $data['priority']   =   0;
                } elseif(validate_int($progress) && $priority >=0 && $priority <=10) {
                    $data['priority']   =   $priority;    
                } else {
                    $errors['item_priority_item_add']   =   SHIN_Core::$_language->line('lng_label_incorrect_priority');
                }
                
                if(empty($note)){
                    $data['note']   =   '';
                } else {
                    $data['note']   =   $note;
                }
                
                    $data['idTodo'] =   SHIN_Core::$_input->post('todo_id');   
                
                if(empty($errors)) {
                    
                    $result         =   $this->todoListItemModel->addNewTodoItem(SHIN_Core::$_input->post('todo_id'), $data);
                    
                    if($result){
                        $result     =   true;
                        $message    =   SHIN_Core::$_language->line('lng_label_todo_list_added');
                    } else {
                        $result     =   false;
                        $message    =   SHIN_Core::$_language->line('lng_label_error_add_new_todo');
                    }
                } else {
                    
                    $result     =   false;
                    $message    =   $errors;
                }
                break;
            
            case 'load-todo-list':
                
                $mode          =   SHIN_Core::$_input->post('mode');
                
                if($mode == 'single') {
                    SHIN_Core::$_libs['templater']->assign('todoListSingle',  $this->todoListModel->getSingleTodoList());
                    return 'todo/single-todolist.tpl';
                } else {
                    SHIN_Core::$_libs['templater']->assign('todoList',    $this->todoListModel->getTodoList());
                    return 'todo/tree-todolist.tpl';
                    
                }
                
                break;
            
            case 'delete':
                
                $id     =   SHIN_Core::$_input->post('id');
                $type   =   SHIN_Core::$_input->post('type');
                
                if($type == 'item') {
                    $result = $this->todoListModel->deleteTodoList($id);    
                } else {
                    $result =  $this->todoListItemModel->deleteTodoListItem($id);    
                }
                
                if($result){
                    $result     =   true;
                    $message    =   SHIN_Core::$_language->line('lng_label_todo_list_deleted');
                } else {
                    $result     =   false;
                    $message    =   SHIN_Core::$_language->line('lng_label_error_delete_todo');
                }
                
                break;
            
            case 'close-item':
                
                $id     =   SHIN_Core::$_input->post('id');
                $type   =   SHIN_Core::$_input->post('type');
                $state  =   SHIN_Core::$_input->post('state');
                
                if($type == 'item') {
                    $result = $this->todoListModel->closeTodoListWithItems($id, $state == 'true' ? 'c' : 'o');    
                } else {
                    $result = $this->todoListItemModel->closeTodoItem($id, $state == 'true' ? 'c' : 'o');    
                }
                
                if($result){
                    $result     =   true;
                    $message    =   $state == 'true' ? SHIN_Core::$_language->line('lng_label_todo_list_close') : SHIN_Core::$_language->line('lng_label_todo_list_open');
                } else {
                    $result     =   false;
                    $message    =   SHIN_Core::$_language->line('lng_label_error_close_todo');
                }
                
                break;
            
            case 'change':
                
                $id     =   SHIN_Core::$_input->post('id');
                $type   =   SHIN_Core::$_input->post('type');
                
                if($type == 'item') {
                    
                    $title  =   SHIN_Core::$_input->post('title');
                    
                    $validateResult =   sanitize_string($title);
                    if(empty($title) || !$validateResult['result'] || strlen($title) > 45) {
                        $errors['dialog_title_edit']   =   SHIN_Core::$_language->line('lng_label_incorrect_title');
                    }
                    
                    $data   =   array('title' => $title);
                    
                    if(empty($errors)) {                  
                        $result =     $this->todoListModel->updateTodoItem($id, $data);
                        
                        if($result){
                            $result     =   true;
                            $data       =   null;
                            $message    =   SHIN_Core::$_language->line('lng_label_todo_list_edit');
                        } else {
                            $result     =   false;
                            $data       =   null;
                            $message    =   SHIN_Core::$_language->line('lng_label_error_edit_todo');
                        }
                    } else {
                        $result     =   false;
                        $message    =   $errors;
                    }    
                } else {
                    
                    $title                  =   SHIN_Core::$_input->post('title');
                    $progress               =   SHIN_Core::$_input->post('per');
                    $completitionDate       =   SHIN_Core::$_input->post('date_complete'); 
                    $realCompletitionDate   =   SHIN_Core::$_input->post('r_date_complete'); 
                    $priority               =   SHIN_Core::$_input->post('priority'); 
                    $note                   =   SHIN_Core::$_input->post('note'); 
                    $data                   =   array();
                    
                    $validateResult =   sanitize_string($title);
                    if(!empty($title) && $validateResult['result'] && strlen($title) <= 45) {
                        $data['item']   =   $title;    
                    } else {
                        $errors['title_item_edit']   =   SHIN_Core::$_language->line('lng_label_incorrect_title');   
                    }
                    
                    if(empty($progress)) {
                        $data['progress']   =   0;
                    } elseif(validate_int($progress) && $progress >=0 && $progress <=100) {
                        $data['progress']   =   $progress;    
                    } else {
                        $errors['percantage_item_edit']   =   SHIN_Core::$_language->line('lng_label_incorrect_progress');
                    }
                    
                    if(!empty($completitionDate)) {
                        if(validate_date($completitionDate)) {
                            $data['completitionDate']   =   fromDisplayToDb($completitionDate);
                        } else {
                            $errors['completition_date_item_edit']   =   SHIN_Core::$_language->line('lng_label_incorrect_c_date');
                        }
                    }
                    
                    if(!empty($realCompletitionDate)) {
                        if(validate_date($realCompletitionDate)) {
                            $data['realCompletitionDate']   =   fromDisplayToDb($realCompletitionDate);
                        } else {
                            $errors['real_completition_date_item_edit']   =   SHIN_Core::$_language->line('lng_label_incorrect_r_date');
                        }
                    }
                    
                    if(empty($priority)) {
                        $data['priority']   =   0;
                    } elseif(validate_int($progress) && $priority >=0 && $priority <=10) {
                        $data['priority']   =   $priority;    
                    } else {
                        $errors['priority_item_edit']   =   SHIN_Core::$_language->line('lng_label_incorrect_priority');
                    }
                    
                    if(empty($note)){
                        $data['note']   =   '';
                    } else {
                        $data['note']   =   $note;
                    }
                    
                    if(empty($errors)) {
                    
                        $result =     $this->todoListItemModel->updateTodoItem($id, $data);
                    
                        if($result){
                            $result     =   true;
                            $data       =   null;
                            $message    =   SHIN_Core::$_language->line('lng_label_todo_item_edit');
                        } else {
                            $result     =   false;
                            $data       =   null;
                            $message    =   SHIN_Core::$_language->line('lng_label_error_todo_item_edit');
                        }
                    } else {
                        $result     =   false;
                        $message    =   $errors;
                    }    
                        
                }   
                break;
                
            case 'get-todo-info':
                
                $id     =   SHIN_Core::$_input->post('id');
                $data   =   $this->todoListModel->getInfo($id);   
                $result =   true;
                
                break;
            
            case 'get-todoitem-info':
            
                $id         =   SHIN_Core::$_input->post('id');
                $todoItem   =   $this->todoListItemModel->getInfo($id);
                $todoList   =   $this->todoListModel->getInfo($todoItem['idTodo']);
                
                $data       =   array('todoItem'   =>  $todoItem,
                                      'todoList'   =>  $todoList);   
                $result =   true;
                break;
            
            case 'save-position':
                $type   =   SHIN_Core::$_input->post('type');
                $data   =   SHIN_Core::$_input->post('data');
                
                if($type == 'item') {
                    $result =    $this->todoListModel->updatePosition($data);
                } else {
                    $result =    $this->todoListItemModel->updatePosition($data);    
                }
                    
                if($result){
                    $result     =   true;
                    $data       =   null;
                    $message    =   SHIN_Core::$_language->line('lng_label_todo_list_edit');
                } else {
                    $result     =   false;
                    $data       =   null;
                    $message    =   SHIN_Core::$_language->line('lng_label_error_edit_todo');
                }
                
                break;   
        }
        
        $response   =   array('data'    =>  $data,
                              'result'  =>  $result,
                              'message' =>  $message);
        
        echo json_encode($response);
        exit();
    }

}




?>
