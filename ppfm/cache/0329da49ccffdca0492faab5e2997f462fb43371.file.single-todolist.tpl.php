<?php /* Smarty version Smarty3-SVN$Rev: 3286 $, created on 2010-09-02 15:23:04
         compiled from "D:\Work\web\shinframework\ppfm/views/todo/single-todolist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:198934c7f9728059860-46522356%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0329da49ccffdca0492faab5e2997f462fb43371' => 
    array (
      0 => 'D:\\Work\\web\\shinframework\\ppfm/views/todo/single-todolist.tpl',
      1 => 1283152184,
    ),
  ),
  'nocache_hash' => '198934c7f9728059860-46522356',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php  $_smarty_tpl->tpl_vars['todoItem'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('todoListSingle')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['todoItem']->key => $_smarty_tpl->tpl_vars['todoItem']->value){
?>
   <li id="item_<?php echo $_smarty_tpl->tpl_vars['todoItem']->value['idList'];?>
" class="b-single-todo-item <?php if ($_smarty_tpl->tpl_vars['todoItem']->value['status']=='c'){?> strikeItem <?php }?>" position="<?php echo $_smarty_tpl->tpl_vars['todoItem']->value['position'];?>
" >
       <div class="b-single-todo-checkbox">
            <input type="checkbox" name="" id="" value="" onclick="clickOnCheckbox(this, <?php echo $_smarty_tpl->tpl_vars['todoItem']->value['idList'];?>
, 'item')" <?php if ($_smarty_tpl->tpl_vars['todoItem']->value['status']=='c'){?> checked="checked" <?php }?>>
       </div>
       
       
       <div class="b-single-todo-item-name <?php if ($_smarty_tpl->tpl_vars['todoItem']->value['status']=='c'){?> strikeItem <?php }?>">
            <div class="b-todo-item-name-inner" onclick="loadTodoItems(<?php echo $_smarty_tpl->tpl_vars['todoItem']->value['idList'];?>
)"><?php echo $_smarty_tpl->tpl_vars['todoItem']->value['title'];?>
</div>
       </div>
       
       <div class="b-todo-percentage">
            <div class="b-inner">
                <div class="b-progress"><?php echo $_smarty_tpl->tpl_vars['todoItem']->value['progress'];?>
%</div>
                <div class="b-inner-percentage" style="width: <?php echo $_smarty_tpl->tpl_vars['todoItem']->value['progress'];?>
%;"></div>
            </div>
        </div>
       
       <div class="single-todo-actions">
            <a href="javascript:void(0);" onclick="openDeleteDialog(<?php echo $_smarty_tpl->tpl_vars['todoItem']->value['idList'];?>
, 'item');" class="delete"></a>
            <div class="clear"></div>
       </div>
       <div class="clear"></div>
   </li>    
<?php }} ?>


    <script type="text/javascript">
        $(document).ready(function(){
    
            $('ul.b-single-todo-list li').mouseover(function(){
                if(this != undefined) {
                    highlightTodoItem(this);
                }    
            }).mouseout(function(){
                if(this != undefined) {
                    highlightTodoItem(this);
                }    
            }).click(function(){
                if(this != undefined) {
                    highlightCelectedItem(this);
                }    
            })
            
            $('ul.b-single-todo-list').sortable({
                stop: function(event, ui){
                    todoList.dropTodoList(event, ui, 'item');
                    
                    $('.b-single-todo-list li').removeClass('highlight-todo-item');         
                }
            });
            
            $('ul.b-single-todo-list-items').sortable({
                stop: function(event, ui){
                    todoList.dropTodoList(event, ui, 'sub_item');
                }
            });
            
            
            activeTodo = todoList.getAndMarkFirstLine();
            
            // load todo items for first todo list
            todoList.loadToDoItems(activeTodo);
            // get information about todo list
            todoList.getTodoData(activeTodo);
        })
    </script>


