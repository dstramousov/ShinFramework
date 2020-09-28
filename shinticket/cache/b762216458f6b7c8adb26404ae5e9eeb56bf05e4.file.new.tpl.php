<?php /* Smarty version Smarty3-SVN$Rev: 3286 $, created on 2010-09-29 11:24:50
         compiled from "D:\Work\web\shinframework\shinticket/views/ticket/new.tpl" */ ?>
<?php /*%%SmartyHeaderCode:22364ca2f7d2b048b9-30329522%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b762216458f6b7c8adb26404ae5e9eeb56bf05e4' => 
    array (
      0 => 'D:\\Work\\web\\shinframework\\shinticket/views/ticket/new.tpl',
      1 => 1285748688,
    ),
  ),
  'nocache_hash' => '22364ca2f7d2b048b9-30329522',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_block_php')) include 'D:\Work\web\shinframework\shinfw\libraries\smarty\plugins\block.php.php';
?><?php $_template = new Smarty_Internal_Template('header.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<div class="new-form">
    <fieldset>
        <legend><?php echo $_smarty_tpl->getVariable('lng_label_new_ticket')->value;?>
</legend>
        <form method="post" action="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo prep_url(base_url().'/index.php/ticket/save');<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
" enctype="multipart/form-data">
		
            <table>
                <tr>
                    <th><label for=""><?php echo $_smarty_tpl->getVariable('lng_label_new_title')->value;?>
:</label></th>
                    <td>
                        <?php echo $_smarty_tpl->getVariable('shinticket_ticket_title_input')->value;?>

                        <?php if ($_smarty_tpl->getVariable('ticket_errors')->value['shinticket_ticket_title']){?>
                            <div class="shin-clear"></div>
                            <span class="errors"><?php echo $_smarty_tpl->getVariable('ticket_errors')->value['shinticket_ticket_title'];?>
</span>
                        <?php }?>
                    </td>
                </tr>
                <tr>
                    <th><label for=""><?php echo $_smarty_tpl->getVariable('lng_label_new_priority')->value;?>
</label></th>
                    <td><?php echo $_smarty_tpl->getVariable('shinticket_ticket_priority_input')->value;?>
</td>
                </tr>
                <tr>
                    <th><label for=""><?php echo $_smarty_tpl->getVariable('lng_label_ticket_application_name')->value;?>
</label></th>
                    <td>
                        <?php echo $_smarty_tpl->getVariable('shinticket_ticket_applicationId_input')->value;?>
<br />
                        <?php if ($_smarty_tpl->getVariable('ticket_errors')->value['shinticket_ticket_applicationId']){?>
                            <span class="errors"><?php echo $_smarty_tpl->getVariable('ticket_errors')->value['shinticket_ticket_applicationId'];?>
</span>
                        <?php }?>
                    </td>
                </tr>
                <tr>
                    <th><label for=""><?php echo $_smarty_tpl->getVariable('lng_label_new_message')->value;?>
:</label></th>
                    <td nowrap="nowrap">
                        <?php echo $_smarty_tpl->getVariable('shinticket_ticket_body_input')->value;?>

                        <?php if ($_smarty_tpl->getVariable('ticket_errors')->value['shinticket_ticket_body']){?>
                            <span class="errors"><?php echo $_smarty_tpl->getVariable('ticket_errors')->value['shinticket_ticket_body'];?>
</span>
                        <?php }?>
                    </td>
                </tr>
                <tr>
                    <th><label for=""><?php echo $_smarty_tpl->getVariable('lng_label_new_attach')->value;?>
</label></th>
                    <td><input type="file" name="attach_file" value="" id="attach_file" /></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="send-new-ticket" value="<?php echo $_smarty_tpl->getVariable('lng_label_new_submit_button')->value;?>
" id="send-new-ticket" />
                        <input type="reset"  name="reset-new-ticket" value="<?php echo $_smarty_tpl->getVariable('lng_label_new_resut_button')->value;?>
" id="reset-new-ticket" />
                    </td>
                </tr>
            </table>
        </form>
    </fieldset>
</div>
<?php $_template = new Smarty_Internal_Template('footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>