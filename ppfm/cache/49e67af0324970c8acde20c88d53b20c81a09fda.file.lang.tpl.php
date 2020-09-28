<?php /* Smarty version Smarty3-SVN$Rev: 3286 $, created on 2010-08-30 08:31:09
         compiled from "D:\Work\web\shinframework\ppfm/views/lang.tpl" */ ?>
<?php /*%%SmartyHeaderCode:221424c7b421d6e4b49-88788553%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '49e67af0324970c8acde20c88d53b20c81a09fda' => 
    array (
      0 => 'D:\\Work\\web\\shinframework\\ppfm/views/lang.tpl',
      1 => 1273838658,
    ),
  ),
  'nocache_hash' => '221424c7b421d6e4b49-88788553',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_block_php')) include 'D:\Work\web\shinframework\shinfw\libraries\smarty\plugins\block.php.php';
?><a href="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
 echo base_url().'/index.php/change_language/it'; <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
">it</a>&nbsp;|&nbsp;
<a href="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
 echo base_url().'/index.php/change_language/en'; <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
">en</a>&nbsp;|&nbsp;
<a href="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
 echo base_url().'/index.php/change_language/ru'; <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
">ru</a>&nbsp;|&nbsp;
