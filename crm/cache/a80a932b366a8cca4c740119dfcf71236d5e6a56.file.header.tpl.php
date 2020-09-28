<?php /* Smarty version Smarty3-SVN$Rev: 3286 $, created on 2010-09-10 09:45:54
         compiled from "D:\Work\web\shinframework\crm/views/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:35724c89d422c61c27-28961521%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a80a932b366a8cca4c740119dfcf71236d5e6a56' => 
    array (
      0 => 'D:\\Work\\web\\shinframework\\crm/views/header.tpl',
      1 => 1284101097,
    ),
  ),
  'nocache_hash' => '35724c89d422c61c27-28961521',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include 'D:\Work\web\shinframework\shinfw\libraries\smarty\plugins\modifier.escape.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<?php echo $_smarty_tpl->getVariable('meta')->value;?>


    <title><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('title')->value);?>
</title>

    <?php echo $_smarty_tpl->getVariable('cssincludes')->value;?>


    <?php echo $_smarty_tpl->getVariable('jsincludes')->value;?>


    <?php echo $_smarty_tpl->getVariable('jsnondocready')->value;?>


    <?php echo $_smarty_tpl->getVariable('jsdocready')->value;?>


</head>
