<?php /* Smarty version Smarty3-SVN$Rev: 3286 $, created on 2010-08-30 08:31:09
         compiled from "D:\Work\web\shinframework\ppfm/views/main_entrylist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:228344c7b421d364f87-08668451%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '319a83f05bb8a5519272cf7f52cf0eca6d893938' => 
    array (
      0 => 'D:\\Work\\web\\shinframework\\ppfm/views/main_entrylist.tpl',
      1 => 1282820595,
    ),
  ),
  'nocache_hash' => '228344c7b421d364f87-08668451',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<table align="left" width="100%">
    <tr>
        <td style="background-color: #aad5eb;" width="90%"><?php echo $_smarty_tpl->getVariable('lng_label_main_page_entry_panel_text_field')->value;?>
</td>    
        <td style="background-color: #aad5eb;" width="10%"><?php echo $_smarty_tpl->getVariable('lng_label_main_page_entry_panel_amount_field')->value;?>
</td>    
    </tr>
<?php  $_smarty_tpl->tpl_vars['entryIten'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('entryData')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['entryIten']->key => $_smarty_tpl->tpl_vars['entryIten']->value){
?>
    <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['entryIten']->value['text'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['entryIten']->value['amount'];?>
</td>
    </tr>
<?php }} ?>
</table>