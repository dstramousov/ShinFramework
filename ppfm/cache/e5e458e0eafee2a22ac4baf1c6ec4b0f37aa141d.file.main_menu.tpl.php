<?php /* Smarty version Smarty3-SVN$Rev: 3286 $, created on 2010-10-01 14:58:35
         compiled from "D:\Work\web\shinframework\ppfm/views/main_menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:157784ca5cceb5dd028-26706372%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e5e458e0eafee2a22ac4baf1c6ec4b0f37aa141d' => 
    array (
      0 => 'D:\\Work\\web\\shinframework\\ppfm/views/main_menu.tpl',
      1 => 1285915810,
    ),
  ),
  'nocache_hash' => '157784ca5cceb5dd028-26706372',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_block_php')) include 'D:\Work\web\shinframework\shinfw\libraries\smarty\plugins\block.php.php';
?><?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>

    echo SHIN_Core::runWidget('main_menu', array());
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php echo $_smarty_tpl->getVariable('shinfw_main_menu')->value;?>
