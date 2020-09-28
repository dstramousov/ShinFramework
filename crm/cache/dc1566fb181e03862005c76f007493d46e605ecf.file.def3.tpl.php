<?php /* Smarty version Smarty3-SVN$Rev: 3286 $, created on 2010-09-13 10:43:38
         compiled from "D:\Work\web\shinframework\crm/views/def3.tpl" */ ?>
<?php /*%%SmartyHeaderCode:229604c8dd62aca4c31-11922138%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dc1566fb181e03862005c76f007493d46e605ecf' => 
    array (
      0 => 'D:\\Work\\web\\shinframework\\crm/views/def3.tpl',
      1 => 1284363815,
    ),
  ),
  'nocache_hash' => '229604c8dd62aca4c31-11922138',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_block_php')) include 'D:\Work\web\shinframework\shinfw\libraries\smarty\plugins\block.php.php';
?><?php $_template = new Smarty_Internal_Template("header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<body id="page">

<a href="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
 echo prep_url(shinfw_base_url().'/index.php/main'); <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
">Back to Main page</a>
<br/>

<h1>CRM. another link. (top link)</h1>
<h4>ver. <?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
 echo SHIN_Core::version(); <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
 </h4>
<?php echo $_smarty_tpl->getVariable('timerun')->value;?>
<br/><?php echo $_smarty_tpl->getVariable('memory')->value;?>



<fieldset>
	<legend>&nbsp;&nbsp;<b><?php echo $_smarty_tpl->getVariable('lng_label_tools_fw_menu')->value;?>
</b>&nbsp;&nbsp;</legend>
	<?php $_template = new Smarty_Internal_Template("main_menu.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

</fieldset>

</body>

</html>