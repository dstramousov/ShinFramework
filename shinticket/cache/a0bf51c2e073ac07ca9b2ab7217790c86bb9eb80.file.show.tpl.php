<?php /* Smarty version Smarty3-SVN$Rev: 3286 $, created on 2010-09-27 11:10:24
         compiled from "D:\Work\web\shinframework\shinticket/views/ticket/show.tpl" */ ?>
<?php /*%%SmartyHeaderCode:115934ca05170d950f2-16878821%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a0bf51c2e073ac07ca9b2ab7217790c86bb9eb80' => 
    array (
      0 => 'D:\\Work\\web\\shinframework\\shinticket/views/ticket/show.tpl',
      1 => 1285575015,
    ),
  ),
  'nocache_hash' => '115934ca05170d950f2-16878821',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_block_php')) include 'D:\Work\web\shinframework\shinfw\libraries\smarty\plugins\block.php.php';
?><?php $_template = new Smarty_Internal_Template('header.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<div class="show-form">
    <fieldset>
        
        <legend><?php echo $_smarty_tpl->getVariable('lng_label_ticket_information')->value;?>
</legend>
            <table>
                <tr>
                    <th><label for=""><?php echo $_smarty_tpl->getVariable('lng_label_ticket_application_name')->value;?>
</label></th>
                    <td><i><?php echo $_smarty_tpl->getVariable('shinticket_ticket_application_name')->value;?>
</i></td>
                </tr>
                <tr>
                    <th><label for=""><?php echo $_smarty_tpl->getVariable('lng_label_ticket_created')->value;?>
</label></th>
                    <td><i><?php echo $_smarty_tpl->getVariable('shinticket_ticket_created')->value;?>
</i></td>
                </tr>
                <tr>
                    <th><label for=""><?php echo $_smarty_tpl->getVariable('lng_label_new_title')->value;?>
:</label></th>
                    <td><?php echo $_smarty_tpl->getVariable('shinticket_ticket_title')->value;?>
</td>
                </tr>
                <tr>
                    <th><label for=""><?php echo $_smarty_tpl->getVariable('lng_label_new_message')->value;?>
:</label></th>
                    <td>
                        <div class="ticket-body-html"><?php echo $_smarty_tpl->getVariable('shinticket_ticket_body_html')->value;?>
</div>
                    </td>
                </tr>
                <tr>
                    <th><label for=""><?php echo $_smarty_tpl->getVariable('lng_label_new_priority')->value;?>
:</label></th>
                    <td><?php echo $_smarty_tpl->getVariable('shinticket_ticket_priority')->value;?>
</td>
                </tr>
                <tr>
                    <th><label for=""><?php echo $_smarty_tpl->getVariable('lng_label_new_status')->value;?>
:</label></th>
                    <td><?php echo $_smarty_tpl->getVariable('shinticket_ticket_status')->value;?>
</td>
                </tr>
                <?php if (!empty($_smarty_tpl->getVariable('shinticket_ticket_attachPath')->value)){?>
                <tr>
                    <th><label for=""><?php echo $_smarty_tpl->getVariable('lng_label_attachment')->value;?>
:</label></th>
                    <td><a href="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo prep_url(base_url());<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
/index.php/ticket/download?path=<?php echo $_smarty_tpl->getVariable('shinticket_ticket_attachPath')->value;?>
&name=<?php echo $_smarty_tpl->getVariable('shinticket_ticket_realAttachFileName')->value;?>
" class="attachment-link"><?php echo $_smarty_tpl->getVariable('shinticket_ticket_realAttachFileName')->value;?>
</a></td>
                </tr>
                <?php }?>
            </table>
    </fieldset>
    

	<?php if (!empty($_smarty_tpl->getVariable('ticketDetailList')->value)){?>

    <fieldset>
        <legend><?php echo $_smarty_tpl->getVariable('lng_label_ticket_details')->value;?>
</legend>
        <?php  $_smarty_tpl->tpl_vars['detail'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('ticketDetailList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['detail']->key => $_smarty_tpl->tpl_vars['detail']->value){
?>
            <table>
                <tr>
                    <td colspan="2" align="left">
                        <?php if ($_smarty_tpl->tpl_vars['detail']->value['owner']=='user'){?>
                            <img src="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
 echo prep_url(base_url().'/images/datatable/');<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
user.png" />&nbsp;<?php echo $_smarty_tpl->getVariable('userFirstName')->value;?>
&nbsp;<?php echo $_smarty_tpl->getVariable('userLastName')->value;?>
&nbsp;<?php echo $_smarty_tpl->getVariable('lng_label_user_wrote')->value;?>

                        <?php }else{ ?>
                            <img src="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
 echo prep_url(base_url().'/images/datatable/');<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
user_red.png" />&nbsp;&nbsp;<?php echo $_smarty_tpl->getVariable('lng_label_support_wrote')->value;?>

                        <?php }?>
                    </td>
                </tr>
                <tr>
                    <th><?php echo $_smarty_tpl->getVariable('lng_label_datatable_details_updated')->value;?>
</label></th>
                    <td><i><?php echo $_smarty_tpl->tpl_vars['detail']->value['created'];?>
</i></td>
                </tr>
                <tr>
                    <th><?php echo $_smarty_tpl->getVariable('lng_label_datatable_details_body')->value;?>
</label></th>
                    <td>
                        <?php echo $_smarty_tpl->tpl_vars['detail']->value['bodyparced'];?>

                    </td>
                </tr>
                <?php if (!empty($_smarty_tpl->tpl_vars['detail']->value['attachPath'])){?>
                <tr>
                    <th><?php echo $_smarty_tpl->getVariable('lng_label_attachment')->value;?>
:</th>
                    <td><a href="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo prep_url(base_url());<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
/index.php/ticket/download?path=<?php echo $_smarty_tpl->tpl_vars['detail']->value['attachPath'];?>
&name=<?php echo $_smarty_tpl->tpl_vars['detail']->value['realAttachFileName'];?>
" class="attachment-link"><?php echo $_smarty_tpl->tpl_vars['detail']->value['realAttachFileName'];?>
</a></td>
                </tr>
                <?php }?>
            </table>
            <hr />
        <?php }} ?>
    </fieldset>

	<?php }?>
    
    <fieldset>
        <legend><?php echo $_smarty_tpl->getVariable('lng_label_ticket_new_detail')->value;?>
</legend>
        <form action="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo prep_url(base_url().'/index.php/ticket/savereply');<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
" method="post" enctype="multipart/form-data">
            <input type="hidden" name="shinticket_ticketdetails_idTicket" value="<?php echo $_smarty_tpl->getVariable('shinticket_ticket_idTicket')->value;?>
" id="shinticket_ticketdetails_idTicket" />
            <table class="new-detail">
                <tr>
                    <th valign="top"><label for=""><?php echo $_smarty_tpl->getVariable('lng_label_new_message')->value;?>
:</label></th>
                    <td colspan="2">
                        <?php echo $_smarty_tpl->getVariable('shinticket_ticketdetails_body_input')->value;?>

                        <?php if ($_smarty_tpl->getVariable('ticketdetails_errors')->value['shinticket_ticketdetails_body']){?>
                            <span class="errors"><?php echo $_smarty_tpl->getVariable('ticketdetails_errors')->value['shinticket_ticketdetails_body'];?>
</span>
                        <?php }?>
                    </td>
                </tr>
                <tr>
                    <th valign="top"><label for=""><?php echo $_smarty_tpl->getVariable('lng_label_new_attach')->value;?>
</label></th>
                    <td><input type="file" name="attach_file" value="" id="attach_file" /></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td align="center" colspan="2">
                        <input type="submit" name="send-new-ticket" value="<?php echo $_smarty_tpl->getVariable('lng_label_new_reply_submit_button')->value;?>
" id="send-new-detail" />
                        <input type="reset"  name="reset-new-ticket" value="<?php echo $_smarty_tpl->getVariable('lng_label_new_resut_button')->value;?>
" id="reset-new-detail" />
                    </td>
                </tr>
            </table>
        </form>
    </fieldset>
</div>

<?php if ($_smarty_tpl->getVariable('scroolToBottom')->value=='true'){?> 
    
        <script type="text/javascript">
            $(document).ready(function(){
                $.scrollTo('.new-detail');    
            })
        </script>
    
<?php }?>

<?php $_template = new Smarty_Internal_Template('footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>