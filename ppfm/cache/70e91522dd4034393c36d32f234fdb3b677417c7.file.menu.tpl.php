<?php /* Smarty version Smarty3-SVN$Rev: 3286 $, created on 2010-09-09 16:35:12
         compiled from "D:\Work\web\shinframework\ppfm/views/menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:130074c88e290094775-92720906%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '70e91522dd4034393c36d32f234fdb3b677417c7' => 
    array (
      0 => 'D:\\Work\\web\\shinframework\\ppfm/views/menu.tpl',
      1 => 1284039310,
    ),
  ),
  'nocache_hash' => '130074c88e290094775-92720906',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_block_php')) include 'D:\Work\web\shinframework\shinfw\libraries\smarty\plugins\block.php.php';
?><fieldset>
<legend>&nbsp;&nbsp;<b><?php echo $_smarty_tpl->getVariable('lng_label_tools_ppfm_menu')->value;?>
</b>&nbsp;&nbsp;</legend>
<a href="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
 echo base_url().'/index.php/main'; <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
"><?php echo $_smarty_tpl->getVariable('lng_label_main_page')->value;?>
</a>&nbsp;|&nbsp;<a href="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
 echo base_url().'/index.php/registration'; <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
"><?php echo $_smarty_tpl->getVariable('lng_label_register')->value;?>
</a>&nbsp;|&nbsp;<a href="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
 echo base_url().'/index.php/todo'; <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
"><?php echo $_smarty_tpl->getVariable('lng_label_todo')->value;?>
</a>&nbsp;|&nbsp;<a href="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
 echo base_url().'/index.php/statistic'; <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
"><?php echo $_smarty_tpl->getVariable('lng_label_statistic')->value;?>
</a>&nbsp;|&nbsp;<a href="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
 echo base_url().'/index.php/usermanage'; <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
"><?php echo $_smarty_tpl->getVariable('lng_label_usermanage')->value;?>
</a>&nbsp;|&nbsp;<a href="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
 echo base_url().'/index.php/logout'; <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
"><?php echo $_smarty_tpl->getVariable('lng_label_login')->value;?>
</a>&nbsp;
</fieldset>
<br/>
