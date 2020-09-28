<?php /* Smarty version Smarty3-SVN$Rev: 3286 $, created on 2010-09-23 12:24:07
         compiled from "D:\Work\web\shinframework\ppfm/views/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:106444c9b1cb7084251-74786849%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '03820d438b2429dff024adb734214f8109f6b299' => 
    array (
      0 => 'D:\\Work\\web\\shinframework\\ppfm/views/index.tpl',
      1 => 1285233836,
    ),
  ),
  'nocache_hash' => '106444c9b1cb7084251-74786849',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<body id="page">

<fieldset>
	<legend>&nbsp;&nbsp;<b><?php echo $_smarty_tpl->getVariable('lng_label_tools_fw_menu')->value;?>
</b>&nbsp;&nbsp;</legend>
	<?php $_template = new Smarty_Internal_Template("main_menu.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

</fieldset>

<br/>

<fieldset>
	<legend>&nbsp;&nbsp;<b><?php echo $_smarty_tpl->getVariable('lng_label_tools_ppfm_menu')->value;?>
</b>&nbsp;&nbsp;</legend>
	<?php $_template = new Smarty_Internal_Template("ppfm_menu.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

</fieldset>

<br/>

<?php echo $_smarty_tpl->getVariable('panelList')->value;?>


<?php $_template = new Smarty_Internal_Template('tech_info.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
</body>

</html>