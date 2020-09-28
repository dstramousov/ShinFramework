<?php /* Smarty version Smarty3-SVN$Rev: 3286 $, created on 2010-09-20 13:47:10
         compiled from "D:\Work\web\shinframework\ppfm/views/main_todolist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:59404c973baeaf86f9-60498035%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '07afd403e7a60dbe59d07a8199e4ae8fdb41f546' => 
    array (
      0 => 'D:\\Work\\web\\shinframework\\ppfm/views/main_todolist.tpl',
      1 => 1284976044,
    ),
  ),
  'nocache_hash' => '59404c973baeaf86f9-60498035',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<table align="left" width="100%">
    <tr>
		<td style="background-color: #f4f1a6;" width="90%"><?php echo $_smarty_tpl->getVariable('lng_label_main_page_todo_panel_title_field')->value;?>
</td>
        <td style="background-color: #f4f1a6;" width="10%"><?php echo $_smarty_tpl->getVariable('lng_label_main_page_todo_panel_progress_field')->value;?>
</td>
    </tr>
<?php  $_smarty_tpl->tpl_vars['todoIten'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('todoListData')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['todoIten']->key => $_smarty_tpl->tpl_vars['todoIten']->value){
?>
    <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['todoIten']->value['title'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['todoIten']->value['progress'];?>
 %</td>
    </tr>
<?php }} ?>
</table>