<?php /* Smarty version Smarty3-SVN$Rev: 3286 $, created on 2010-09-27 12:20:35
         compiled from "D:\Work\web\shinframework\shinticket/views/ticket/new_access_deny.tpl" */ ?>
<?php /*%%SmartyHeaderCode:228254ca061e3647232-88516421%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cf8ee3fb3efe1260d5e08001c5eadb275dd4a51b' => 
    array (
      0 => 'D:\\Work\\web\\shinframework\\shinticket/views/ticket/new_access_deny.tpl',
      1 => 1285579174,
    ),
  ),
  'nocache_hash' => '228254ca061e3647232-88516421',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template('header.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<div class="new-form">
    <fieldset>
        <legend><?php echo $_smarty_tpl->getVariable('lng_label_new_ticket')->value;?>
</legend>
        	<?php echo $_smarty_tpl->getVariable('lng_label_new_ticket_access_deny')->value;?>

    </fieldset>
</div>
<?php $_template = new Smarty_Internal_Template('footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>