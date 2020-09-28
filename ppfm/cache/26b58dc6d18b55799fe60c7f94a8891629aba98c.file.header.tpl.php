<?php /* Smarty version Smarty3-SVN$Rev: 3286 $, created on 2010-08-30 08:33:29
         compiled from "D:\Work\web\shinframework\ppfm/views/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:222614c7b42a9d96f81-49086223%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '26b58dc6d18b55799fe60c7f94a8891629aba98c' => 
    array (
      0 => 'D:\\Work\\web\\shinframework\\ppfm/views/header.tpl',
      1 => 1283146359,
    ),
  ),
  'nocache_hash' => '222614c7b42a9d96f81-49086223',
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
