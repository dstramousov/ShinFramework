<?php /* Smarty version Smarty3-SVN$Rev: 3286 $, created on 2010-09-23 11:26:33
         compiled from "D:\Work\web\shinframework\shinticket/views/tech_info.tpl" */ ?>
<?php /*%%SmartyHeaderCode:177194c9b0f396dcca9-70547273%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e3213710d82a8a35a7b2f9644d69a359a9ebbd50' => 
    array (
      0 => 'D:\\Work\\web\\shinframework\\shinticket/views/tech_info.tpl',
      1 => 1285230261,
    ),
  ),
  'nocache_hash' => '177194c9b0f396dcca9-70547273',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_block_php')) include 'D:\Work\web\shinframework\shinfw\libraries\smarty\plugins\block.php.php';
?><br/><br/><br/>
<table cellspacing="20" width="100%" border="0">
<tr>
<td align="center">
<a href="http://www.shinsoftware.it" target="_blank">www.shinsoftware.it</a><br/>
SHINframework&nbsp;ver. <?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
 echo SHIN_Core::version(); <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

</td>
</tr>
</table>