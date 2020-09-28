<?php /* Smarty version Smarty3-SVN$Rev: 3286 $, created on 2010-10-13 13:26:55
         compiled from "D:\Work\web\shinframework\shinfw/views/main_page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:73874cb5896fb7dd49-23936672%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '08b1c8192451b58b4df8d1477180f041a51ead0a' => 
    array (
      0 => 'D:\\Work\\web\\shinframework\\shinfw/views/main_page.tpl',
      1 => 1285230358,
    ),
  ),
  'nocache_hash' => '73874cb5896fb7dd49-23936672',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_block_php')) include 'D:\Work\web\shinframework\shinfw\libraries\smarty3\plugins\block.php.php';
?><?php $_template = new Smarty_Internal_Template("header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<body>


	<fieldset>
		<legend>&nbsp;&nbsp;<b><?php echo $_smarty_tpl->getVariable('lng_label_tools_fw_menu')->value;?>
</b>&nbsp;&nbsp;</legend>
		<div class="shin-general-menu">
            <?php $_template = new Smarty_Internal_Template("main_menu.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
            <div class="shin-clear"></div>
        </div>
	</fieldset>

	<br/>

	<fieldset>
		<legend style="font-size: 20px; font-weight: bold;"><?php echo $_smarty_tpl->getVariable('lng_label_main_fw_menu')->value;?>
</legend>
							
		<!-- main menu visualization -->
		<?php echo $_smarty_tpl->getVariable('GeneralMenu')->value;?>

		<!-- end of main menu visualization -->

		<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>

			// this is another way for integrate widgets in to the page. i mean "Directly call".
			// echo SHIN_Core::runWidget('clock', array('mode'=>'AM'));
		<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

		        
	</fieldset>

	<?php $_template = new Smarty_Internal_Template('tech_info.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
    
</body>
</html>