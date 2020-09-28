<?php /* Smarty version Smarty3-SVN$Rev: 3286 $, created on 2010-09-02 15:23:05
         compiled from "D:\Work\web\shinframework\ppfm/views/todo/single-todoitems.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16864c7f9729642d36-91258169%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f608ea84f90999f22b4406882873ad693e81aff3' => 
    array (
      0 => 'D:\\Work\\web\\shinframework\\ppfm/views/todo/single-todoitems.tpl',
      1 => 1283153354,
    ),
  ),
  'nocache_hash' => '16864c7f9729642d36-91258169',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php  $_smarty_tpl->tpl_vars['todoItem'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('todoItemList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['todoItem']->key => $_smarty_tpl->tpl_vars['todoItem']->value){
?>
<li id="subitem_<?php echo $_smarty_tpl->tpl_vars['todoItem']->value['idList'];?>
" class="b-single-todo-item" position="<?php echo $_smarty_tpl->tpl_vars['todoItem']->value['position'];?>
">
    <div class="b-toggle-todolist-item" onclick="toggleInformation(<?php echo $_smarty_tpl->tpl_vars['todoItem']->value['idList'];?>
);"></div>
                                
    <div class="b-single-todo-checkbox">
        <input type="checkbox" onclick="clickOnCheckbox(this, <?php echo $_smarty_tpl->tpl_vars['todoItem']->value['idList'];?>
, 'sub_item')" value="" id="" name="" <?php if ($_smarty_tpl->tpl_vars['todoItem']->value['status']=='c'){?> checked="checked" <?php }?>>
    </div>
    
    <div class="b-single-todo-item-name <?php if ($_smarty_tpl->tpl_vars['todoItem']->value['status']=='c'){?> strikeItem <?php }?>">
        <div class="b-todo-item-name-inner"><?php echo $_smarty_tpl->tpl_vars['todoItem']->value['item'];?>
</div>
    </div>
    
    <div class="b-todo-percentage">
        <div class="b-inner">
            <div class="b-progress"><?php echo $_smarty_tpl->tpl_vars['todoItem']->value['progress'];?>
%</div>
            <div style="width: <?php echo $_smarty_tpl->tpl_vars['todoItem']->value['progress'];?>
%;" class="b-sub-inner-percentage"></div>
        </div>
    </div>
    
    <div class="single-todo-actions">
        <a class="edit" onclick="openTodoItemEditDialog(<?php echo $_smarty_tpl->tpl_vars['todoItem']->value['idList'];?>
, 'sub_item', '<?php echo $_smarty_tpl->tpl_vars['todoItem']->value['item'];?>
', <?php echo $_smarty_tpl->tpl_vars['todoItem']->value['progress'];?>
)" href="javascript:void(0);"></a>
        <a class="delete" onclick="openDeleteDialog(<?php echo $_smarty_tpl->tpl_vars['todoItem']->value['idList'];?>
, 'sub_item');" href="javascript:void(0);"></a>
        <div class="clear"></div>
    </div>
    
    <div class="todo-item-details">
        <table>
            <tr>
                <td><?php echo $_smarty_tpl->getVariable('lng_label_completition_date')->value;?>
</td>
                <td>
                    <?php echo $_smarty_tpl->tpl_vars['todoItem']->value['completitionDate'];?>

                </td>
            </tr>
            <tr>
                <td><?php echo $_smarty_tpl->getVariable('lng_label_real_completition_date')->value;?>
</td>
                <td>
                    <?php echo $_smarty_tpl->tpl_vars['todoItem']->value['realCompletitionDate'];?>

                </td>
            </tr>
            <tr>
                <td><?php echo $_smarty_tpl->getVariable('lng_label_priority')->value;?>
</td>
                <td>
                    <?php echo $_smarty_tpl->tpl_vars['todoItem']->value['priority'];?>

                </td>
            </tr>
            <tr>
                <td><?php echo $_smarty_tpl->getVariable('lng_label_note')->value;?>
</td>
                <td>
                    <?php echo $_smarty_tpl->tpl_vars['todoItem']->value['note'];?>

                </td>
            </tr>
        </table>
    </div>
                                
    <div class="clear"></div>
</li>
<?php }} ?>