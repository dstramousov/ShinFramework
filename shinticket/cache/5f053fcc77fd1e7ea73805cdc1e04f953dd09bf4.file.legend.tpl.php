<?php /* Smarty version Smarty3-SVN$Rev: 3286 $, created on 2010-09-22 10:07:57
         compiled from "D:\Work\web\shinframework\shinticket/views/ticket/legend.tpl" */ ?>
<?php /*%%SmartyHeaderCode:242624c99ab4d7eec66-97059775%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5f053fcc77fd1e7ea73805cdc1e04f953dd09bf4' => 
    array (
      0 => 'D:\\Work\\web\\shinframework\\shinticket/views/ticket/legend.tpl',
      1 => 1285139272,
    ),
  ),
  'nocache_hash' => '242624c99ab4d7eec66-97059775',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_block_php')) include 'D:\Work\web\shinframework\shinfw\libraries\smarty\plugins\block.php.php';
?><fieldset class="ticket-list-legend">
	<legend>&nbsp;&nbsp;<b><?php echo $_smarty_tpl->getVariable('lng_label_legend')->value;?>
</b>&nbsp;&nbsp;</legend>
        <table border="0" cellspacing="2" cellpadding="2">
            <tr>
                <td>&nbsp; <img src="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo base_url();<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
/images/datatable/user.png" />&nbsp;=</td>
                <td>&nbsp;<?php echo $_smarty_tpl->getVariable('lng_label_legend_user')->value;?>
&nbsp;</td>
                <td>&nbsp; <img src="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo base_url();<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
/images/datatable/user_red.png" />&nbsp;=</td>
                <td>&nbsp;<?php echo $_smarty_tpl->getVariable('lng_label_legend_user_red')->value;?>
&nbsp;</td>
                <td>&nbsp; <img src="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo base_url();<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
/images/datatable/compress.png" />&nbsp;=</td>
                <td>&nbsp;<?php echo $_smarty_tpl->getVariable('lng_label_legend_compress')->value;?>
&nbsp;</td>
                <td>&nbsp; <img src="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo base_url();<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
/images/datatable/lock.png" />&nbsp;=</td>
                <td>&nbsp;<?php echo $_smarty_tpl->getVariable('lng_label_legend_lock')->value;?>
&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp; <img src="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo base_url();<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
/images/datatable/low.jpg" />&nbsp;=</td>
                <td>&nbsp;<?php echo $_smarty_tpl->getVariable('lng_label_legend_low')->value;?>
&nbsp;</td>
                <td>&nbsp; <img src="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo base_url();<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
/images/datatable/normal.jpg" />&nbsp;=</td>
                <td>&nbsp;<?php echo $_smarty_tpl->getVariable('lng_label_legend_normal')->value;?>
&nbsp;</td>
                <td>&nbsp; <img src="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo base_url();<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
/images/datatable/high.jpg" />&nbsp;=</td>
                <td>&nbsp;<?php echo $_smarty_tpl->getVariable('lng_label_legend_high')->value;?>
&nbsp;</td>
                <td>&nbsp; <img src="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo base_url();<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
/images/datatable/asap.jpg" />&nbsp;=</td>
                <td>&nbsp;<?php echo $_smarty_tpl->getVariable('lng_label_legend_asap')->value;?>
&nbsp;</td>
            </tr>
        </table>
</fieldset>