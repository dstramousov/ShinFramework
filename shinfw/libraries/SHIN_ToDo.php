<?php if (!defined('BASEPATH')) exit('Base path is not defined');
/**
 * @package        ShinPHP framework
 * @author        
 * @copyright    
 * @license        
 * @link        
 * @since        Version 0.1
 * @filesource  shinfw/libraries/SHIN_ToDo.php
 */


/**
 * ShinPHP framework todo library
 *
 * @package        ShinPHP framework
 * @subpackage    Library
 * @author        
 * @link        shinfw/libraries/SHIN_ToDo.php
 */

class SHIN_ToDo extends SHIN_Libs
{

    /**
     * Constructor. Init accordion with default values from config file.
     *
     * @access public
     * @params NULL.
     * @return NULL.
     */
    public function __construct($css_file = false)
    {   
        parent::__construct('todo', $css_file);

		Console::logSpeed('SHIN_ToDo begin work, Time taken to get to line: '.__FILE__.'::'.__LINE__);
		Console::logMemory($this, 'SHIN_ToDo. Size of class: ');
    }

    /**
     * Return body of JS with all filled parameters.
     *
     * @access protected
     * @params NULL
     * @return string.
     */
    protected function _body()
    {
         //transfer data to template
         if($this->sh_Options['mode'] == 'tree'){
            SHIN_Core::$_libs['templater']->assign('todoList',         SHIN_Core::$_models['ppfm_todolist_model']->getTodoList());            
         } else {
            SHIN_Core::$_libs['templater']->assign('todoListSingle',   SHIN_Core::$_models['ppfm_todolist_model']->getSingleTodoList());            
         }
         
         // add todo dialog
         SHIN_Core::$_libs['dialog']->confirm_dialog('dialog-add', SHIN_Core::$_language->line('lng_label_todo_page_add_todo_dialog_header'), null, array(SHIN_Core::$_language->line('lng_label_todo_page_cancel_button') => 'closeAddDialog', SHIN_Core::$_language->line('lng_label_todo_page_add_button') => 'addNewRecord'));   
         SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['dialog']->render('dialog-add'));
         
         // add todo item dialog
         SHIN_Core::$_libs['dialog']->confirm_dialog('dialog-add-item', SHIN_Core::$_language->line('lng_label_todo_page_add_todo_item_dialog_header'), null, array(SHIN_Core::$_language->line('lng_label_todo_page_cancel_button') => 'closeAddItemDialog', SHIN_Core::$_language->line('lng_label_todo_page_add_button') => 'addNewItemRecord', ));   
         SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['dialog']->render('dialog-add-item'));
         
         // add edit todo item dialog
         SHIN_Core::$_libs['dialog']->confirm_dialog('dialog-item-edit', SHIN_Core::$_language->line('lng_label_todo_page_edit_todo_item_dialog_header'), null, array(SHIN_Core::$_language->line('lng_label_todo_page_cancel_button') => 'closeTodoItemEditDialog', SHIN_Core::$_language->line('lng_label_todo_page_edit_button') => 'saveTodoItemChanges', ));   
         SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['dialog']->render('dialog-item-edit'));
         
         // add edit todo dialog
         SHIN_Core::$_libs['dialog']->confirm_dialog('dialog-edit', SHIN_Core::$_language->line('lng_label_todo_page_general_info_dialog_header'), null, array(SHIN_Core::$_language->line('lng_label_todo_page_cancel_button') => 'closeTodoEditDialog', SHIN_Core::$_language->line('lng_label_todo_page_edit_button') => 'saveTodoEditDialogInfo'));   
         SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['dialog']->render('dialog-edit'));// add edit todo dialog
         
         // delete dialog
         $deleteContent = '<p align="center">' . SHIN_Core::$_language->line('lng_label_delete_todo_list_item')  . '</p>'. 
                           '<input type="hidden" id="deleted_item_type" value="" />'.
                           '<input type="hidden" id="deleted_item_id" value="" />';
         
         // add datepickers
         $options   =   array('dateFormat'  =>  "'" . SHIN_Core::$_config['lang']['display_date_format'] . "'");
         
         SHIN_Core::$_libs['datepicker']->init($options);
         
         $datepicker1 = SHIN_Core::$_libs['datepicker']->get_instance();
         SHIN_Core::$_jsmanager->addComponent($datepicker1->render('completition_date_item_edit')); 
         
         $datepicker2 = SHIN_Core::$_libs['datepicker']->get_instance();
         SHIN_Core::$_jsmanager->addComponent($datepicker2->render('real_completition_date_item_edit'));
         
         $datepicker3 = SHIN_Core::$_libs['datepicker']->get_instance();
         SHIN_Core::$_jsmanager->addComponent($datepicker3->render('item_completition_date_add')); 
         
         $datepicker4 = SHIN_Core::$_libs['datepicker']->get_instance();
         SHIN_Core::$_jsmanager->addComponent($datepicker4->render('item_real_completition_date_add'));
         
         // add blockUI
         $css        = "'margin-top': '-250px'";
         $overlayCSS = "
                        backgroundColor: '#ffffff', 
                        opacity:         0 
                       ";
         SHIN_Core::$_jsmanager->addOutDomReadyComponent(SHIN_Core::$_libs['blockui']->bindByFunction('b-main-wrapper-single', 'blockUI', 'unBlockUI', "lng_label_please_whait", $css, $overlayCSS));
         // transfer data to view
         SHIN_Core::$_libs['templater']->assign('mode',             $this->sh_Options['mode']);
         SHIN_Core::$_libs['templater']->assign('dialog_delete',    SHIN_Core::$_libs['dialog']->confirm_dialog('dialog-delete', SHIN_Core::$_language->line('lng_label_todo_page_delete_todo_dialog_header'), $deleteContent, Array(SHIN_Core::$_language->line('lng_label_todo_page_cancel_button') =>  'closeDeleteDialog', SHIN_Core::$_language->line('lng_label_todo_page_delete_button')  =>  'deleteItem')));
         
         SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['dialog']->render('dialog-delete'));
         
         
    }          

} // End of class 

/* End of file SHIN_ToDo.php */
/* Location: shinfw/libraries/SHIN_ToDo.php */               
