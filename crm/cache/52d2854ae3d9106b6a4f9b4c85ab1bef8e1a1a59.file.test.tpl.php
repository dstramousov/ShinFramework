<?php /* Smarty version Smarty3-SVN$Rev: 3286 $, created on 2010-09-10 15:30:11
         compiled from "D:\Work\web\shinframework\crm/views/test.tpl" */ ?>
<?php /*%%SmartyHeaderCode:94164c8a24d3862cc9-38209939%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '52d2854ae3d9106b6a4f9b4c85ab1bef8e1a1a59' => 
    array (
      0 => 'D:\\Work\\web\\shinframework\\crm/views/test.tpl',
      1 => 1284121808,
    ),
  ),
  'nocache_hash' => '94164c8a24d3862cc9-38209939',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_block_php')) include 'D:\Work\web\shinframework\shinfw\libraries\smarty\plugins\block.php.php';
?><?php $_template = new Smarty_Internal_Template("header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<body id="page">


<h1>Project Personal Finance Manager.</h1>
<h3>ver. <?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
 echo SHIN_Core::version(); <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
 </h3><br/>

<br/>

Form test generation for "ppfm_entry" mapper object.
<br/>

Entry type: <?php echo $_smarty_tpl->getVariable('examples_customer_master_data_note_input')->value;?>
<br/>

</body>

</html>