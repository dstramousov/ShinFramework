<?php /* Smarty version Smarty3-SVN$Rev: 3286 $, created on 2010-10-01 09:53:42
         compiled from "D:\Work\web\shinframework\shinticket/views/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:202734ca5857694d267-04342840%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '599214c247e10edde3b6c49c2f0995e8a8acbe67' => 
    array (
      0 => 'D:\\Work\\web\\shinframework\\shinticket/views/header.tpl',
      1 => 1285915811,
    ),
  ),
  'nocache_hash' => '202734ca5857694d267-04342840',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include 'D:\Work\web\shinframework\shinfw\libraries\smarty\plugins\modifier.escape.php';
if (!is_callable('smarty_block_php')) include 'D:\Work\web\shinframework\shinfw\libraries\smarty\plugins\block.php.php';
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

        
        <!--[if IE]>
            <link href="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo prep_url(base_url().'/css/style.ie.css');<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
" rel="stylesheet" type="text/css" media="all"/>
        <![endif]-->
        
    </head>
    <body>

    <div class="">
        <fieldset class="shin-general-menu">
            <legend>&nbsp;&nbsp;<b><?php echo $_smarty_tpl->getVariable('lng_label_tools_fw_menu')->value;?>
</b>&nbsp;&nbsp;</legend>
             <?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>

                echo SHIN_Core::runWidget('main_menu', array());
             <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

             <?php echo $_smarty_tpl->getVariable('shinfw_main_menu')->value;?>

        </fieldset>
    </div>
    <div class="">
        <fieldset class="shin-ticket-menu">
    	    <legend>&nbsp;&nbsp;<b><?php echo $_smarty_tpl->getVariable('lng_label_main_page_desc')->value;?>
</b>&nbsp;&nbsp;</legend>
	        <?php echo $_smarty_tpl->getVariable('ticket_ddmenu')->value;?>

        </fieldset>
    </div>
    <div class="shin-clear"></div>