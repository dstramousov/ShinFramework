<?php /* Smarty version 2.6.26, created on 2010-10-20 13:27:14
         compiled from todo/todo.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<body id="page">

<fieldset>
	<legend>&nbsp;&nbsp;<b><?php echo $this->_tpl_vars['lng_label_tools_fw_menu']; ?>
</b>&nbsp;&nbsp;</legend>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main_menu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

</fieldset>

<br/>

<fieldset>
	<legend>&nbsp;&nbsp;<b><?php echo $this->_tpl_vars['lng_label_tools_ppfm_menu']; ?>
</b>&nbsp;&nbsp;</legend>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "ppfm_menu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

</fieldset>

<br/>
    
    
    <?php echo '
    <script type="text/javascript">
        var options  = {
            mode:       \''; ?>
<?php echo $this->_tpl_vars['mode']; ?>
<?php echo '\',
            url:        \''; ?>
<?php  echo base_url().'/index.php/todo/ajaxEvents';  ?>'<?php echo '
        };
        
        var todoList    = new todoListClass(options);
        var isDebug     = false;
        var mode        = \''; ?>
<?php echo $this->_tpl_vars['mode']; ?>
<?php echo '\';
        var activeTodo  = null; 
        
    </script>
    '; ?>

    
    <?php if ($this->_tpl_vars['mode'] == 'tree'): ?>
        <div class="b-main-wrapper">
            <div class="b-inner">
                <fieldset>
                <legend><?php echo $this->_tpl_vars['lng_label_todo_list']; ?>
</legend>
                    <div class="b-single-add-todo">
                        <input type="button" value="<?php echo $this->_tpl_vars['lng_label_add_todo']; ?>
" name="" id="add-todo" onclick="openAddDialog();">
                    </div>
                    <ul class="b-todo-list">
                         <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "todo/tree-todolist.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    </ul>
                </fieldset>
            </div>
        </div>
    <?php else: ?>
        <div class="b-main-wrapper-single" id="b-main-wrapper-single">
            <div class="b-inner">
                <fieldset style="width: 47%;">
                    <legend><?php echo $this->_tpl_vars['lng_label_todo_list']; ?>
</legend>
                    <div class="b-single-add-todo">
                        <input type="button" value="<?php echo $this->_tpl_vars['lng_label_add_todo']; ?>
" name="" id="add-todo" onclick="openAddDialog();">
                    </div>
                    <ul class="b-single-todo-list">
                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "todo/single-todolist.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>    
                    </ul>
                </fieldset>
                
                <fieldset  style="width: 50%;">
                    <legend><?php echo $this->_tpl_vars['lng_label_general_information']; ?>
</legend>
                    
                    <fieldset style="float: none" class="b-todo-information">
                    <legend><?php echo $this->_tpl_vars['lng_label_todo_information']; ?>
</legend>
                        <table>
                            <tr>
                                <td><?php echo $this->_tpl_vars['lng_label_title']; ?>
</td>
                                <td id="title_edit"></td>
                            </tr>
                            <tr>
                                <td><?php echo $this->_tpl_vars['lng_label_percentage']; ?>
</td>
                                <td id="percantage_edit"></td>
                            </tr>
                        </table>
                        <input type="hidden" name="todo_item_type_edit" id="todo_item_type_edit" value="" />
                        <input type="hidden" name="todo_item_id_edit" id="todo_item_id_edit" value="" />
                        
                        <p>
                            <div class="show-btn">
                                <input type="button" name="chnage-todo-btn" id="chnage-todo-btn" value="<?php echo $this->_tpl_vars['lng_label_edit_todo']; ?>
" onclick="enableEditing();" />
                            </div>
                        </p>    
                    </fieldset>
                     
                    <fieldset style="float: none">
                    <legend><?php echo $this->_tpl_vars['lng_label_todo_item_list']; ?>
</legend>
                        <div class="b-single-add-todo-item">
                            <input type="button" value="<?php echo $this->_tpl_vars['lng_label_add_todo_item']; ?>
" name="" id="add-todo-item" onclick="openAddItemDialog();">
                        </div>
                        <ul class="b-single-todo-list-items">
                            
                        </ul>
                    </fieldset>
                </fieldset>
            </div>
            <div class="clear"></div>
        </div>
    <?php endif; ?>


    <div id="dialog-add">
        <table>
            <tr>
                <td><label for="name"><?php echo $this->_tpl_vars['lng_label_title']; ?>
</label></td>
                <td>
                    <input type="text" name="title_add" id="title_add" class="text ui-widget-content ui-corner-all" style="width: 300px;" />
                    <div style="color: red; font-size: 12px; display: none;"></div>
                </td>
            </tr>
        </table>
    </div>
    
    <div id="dialog-add-item">
    <table>
        <tr>
            <td><label for="name"><?php echo $this->_tpl_vars['lng_label_title']; ?>
</label></td>
            <td>
                <input type="text" name="item_title_add" id="item_title_add" class="text ui-widget-content ui-corner-all" style="width: 250px;" />
                <div style="color: red; font-size: 12px; display: none;"></div>
            </td>
        </tr>
        <tr>
            <td><label for="name"><?php echo $this->_tpl_vars['lng_label_percentage']; ?>
</label></td>
            <td>
                <input type="text" name="item_percantage_add" id="item_percantage_add" class="text ui-widget-content ui-corner-all" />
                <div style="color: red; font-size: 12px; display: none;"></div>
            </td>
        </tr>
        <tr>
            <td><label for="name"><?php echo $this->_tpl_vars['lng_label_completition_date']; ?>
</label></td>
            <td>
                <input type="text" name="item_completition_date_add" id="item_completition_date_add" class="text ui-widget-content ui-corner-all" />
                <div style="color: red; font-size: 12px; display: none;"></div>
            </td>
        </tr>
        <tr>
            <td><label for="name"><?php echo $this->_tpl_vars['lng_label_real_completition_date']; ?>
</label></td>
            <td>
                <input type="text" name="item_real_completition_date_add" id="item_real_completition_date_add" class="text ui-widget-content ui-corner-all" />
                <div style="color: red; font-size: 12px; display: none;"></div>
            </td>
        </tr>
        <tr>
            <td><label for="name"><?php echo $this->_tpl_vars['lng_label_priority']; ?>
</label></td>
            <td>
                <select name="item_priority_item_add" id="item_priority_item_add" class="text ui-widget-content ui-corner-all">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="name"><?php echo $this->_tpl_vars['lng_label_note']; ?>
</label></td>
            <td><textarea rows="10" id="item_note_item_add"  class="text ui-widget-content ui-corner-all" style="width: 250px;"></textarea></td>
        </tr>
    </table>
    </div>
    
    <div id="dialog-edit">
    <table>
        <tr>
            <td><label for="name"><?php echo $this->_tpl_vars['lng_label_title']; ?>
</label></td>
            <td>
                <input type="text" name="dialog_title_edit" id="dialog_title_edit" class="text ui-widget-content ui-corner-all" style="width: 300px;" />
                <div style="color: red; font-size: 12px; display: none;"></div>
            </td>
        </tr>
    </table>
    <input type="hidden" name="dialog_todo_item_type_edit" id="dialog_todo_item_type_edit" value="" />
    <input type="hidden" name="dialog_todo_item_id_edit" id="dialog_todo_item_id_edit" value="" />
   </div>
    
    <div id="dialog-item-edit">
    <table>
        <tr>
            <td><label for="name"><?php echo $this->_tpl_vars['lng_label_title']; ?>
</label></td>
            <td>
                <input type="text" name="title_item_edit" id="title_item_edit" class="text ui-widget-content ui-corner-all" style="width: 250px;" />
                <div style="color: red; font-size: 12px; display: none;"></div>
            </td>
        </tr>
        <tr>
            <td><label for="name"><?php echo $this->_tpl_vars['lng_label_percentage']; ?>
</label></td>
            <td>
                <input type="text" name="percantage_item_edit" id="percantage_item_edit" class="text ui-widget-content ui-corner-all" />
                <div style="color: red; font-size: 12px; display: none;"></div>
            </td>
        </tr>
        <tr>
            <td><label for="name"><?php echo $this->_tpl_vars['lng_label_completition_date']; ?>
</label></td>
            <td>
                <input type="text" name="completition_date_item_edit" id="completition_date_item_edit" class="text ui-widget-content ui-corner-all" />
                <div style="color: red; font-size: 12px; display: none;"></div>
            </td>
        </tr>
        <tr>
            <td><label for="name"><?php echo $this->_tpl_vars['lng_label_real_completition_date']; ?>
</label></td>
            <td>
                <input type="text" name="real_completition_date_item_edit" id="real_completition_date_item_edit" class="text ui-widget-content ui-corner-all" />
                <div style="color: red; font-size: 12px; display: none;"></div>
            </td>
        </tr>
        <tr>
            <td><label for="name"><?php echo $this->_tpl_vars['lng_label_priority']; ?>
</label></td>
            <td>
                <select name="priority_item_edit" id="priority_item_edit" class="text ui-widget-content ui-corner-all">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="name"><?php echo $this->_tpl_vars['lng_label_note']; ?>
</label></td>
            <td><textarea rows="10" id="note_item_edit"  class="text ui-widget-content ui-corner-all" style="width: 250px;"></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
    </table>
    <input type="hidden" name="todo_sub_item_type_edit" id="todo_sub_item_type_edit" value="" />
    <input type="hidden" name="todo_sub_item_id_edit" id="todo_sub_item_id_edit" value="" />
    </div>
    
    <?php echo $this->_tpl_vars['dialog_delete']; ?>

 
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'tech_info.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

    </body>

</html>