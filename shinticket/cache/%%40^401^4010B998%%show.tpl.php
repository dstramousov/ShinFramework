<?php /* Smarty version 2.6.26, created on 2010-12-02 08:34:35
         compiled from ticket/show.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="show-form">
    <fieldset>
        
        <legend><?php echo $this->_tpl_vars['lng_label_ticket_information']; ?>
</legend>
            <table>
                <tr>
                    <th><label for=""><?php echo $this->_tpl_vars['lng_label_ticket_application_name']; ?>
</label></th>
                    <td><i><?php echo $this->_tpl_vars['shinticket_ticket_application_name']; ?>
</i></td>
                </tr>
                <tr>
                    <th><label for=""><?php echo $this->_tpl_vars['lng_label_ticket_created']; ?>
</label></th>
                    <td><i><?php echo $this->_tpl_vars['shinticket_ticket_created']; ?>
</i></td>
                </tr>
                <tr>
                    <th><label for=""><?php echo $this->_tpl_vars['lng_label_new_title']; ?>
:</label></th>
                    <td><?php echo $this->_tpl_vars['shinticket_ticket_title']; ?>
</td>
                </tr>
                <tr>
                    <th><label for=""><?php echo $this->_tpl_vars['lng_label_new_message']; ?>
:</label></th>
                    <td>
                        <div class="ticket-body-html"><?php echo $this->_tpl_vars['shinticket_ticket_body_html']; ?>
</div>
                    </td>
                </tr>
                <tr>
                    <th><label for=""><?php echo $this->_tpl_vars['lng_label_new_priority']; ?>
:</label></th>
                    <td><?php echo $this->_tpl_vars['shinticket_ticket_priority']; ?>
</td>
                </tr>
                <tr>
                    <th><label for=""><?php echo $this->_tpl_vars['lng_label_new_status']; ?>
:</label></th>
                    <td><?php echo $this->_tpl_vars['shinticket_ticket_status']; ?>
</td>
                </tr>
                <?php if (! empty ( $this->_tpl_vars['shinticket_ticket_attachPath'] )): ?>
                <tr>
                    <th><label for=""><?php echo $this->_tpl_vars['lng_label_attachment']; ?>
:</label></th>
                    <td><a href="<?php echo prep_url(base_url()); ?>/index.php/ticket/download?path=<?php echo $this->_tpl_vars['shinticket_ticket_attachPath']; ?>
&name=<?php echo $this->_tpl_vars['shinticket_ticket_realAttachFileName']; ?>
" class="attachment-link"><?php echo $this->_tpl_vars['shinticket_ticket_realAttachFileName']; ?>
</a></td>
                </tr>
                <?php endif; ?>
            </table>
    </fieldset>
    

	<?php if (! empty ( $this->_tpl_vars['ticketDetailList'] )): ?>

    <fieldset>
        <legend><?php echo $this->_tpl_vars['lng_label_ticket_details']; ?>
</legend>
        <?php $_from = $this->_tpl_vars['ticketDetailList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['detail']):
?>
            <table>
                <tr>
                    <td colspan="2" align="left">
                        <?php if ($this->_tpl_vars['detail']['owner'] == 'user'): ?>
                            <img src="<?php  echo prep_url(base_url().'/images/datatable/'); ?>user.png" />&nbsp;<?php echo $this->_tpl_vars['userFirstName']; ?>
&nbsp;<?php echo $this->_tpl_vars['userLastName']; ?>
&nbsp;<?php echo $this->_tpl_vars['lng_label_user_wrote']; ?>

                        <?php else: ?>
                            <img src="<?php  echo prep_url(base_url().'/images/datatable/'); ?>user_red.png" />&nbsp;&nbsp;<?php echo $this->_tpl_vars['lng_label_support_wrote']; ?>

                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <th><?php echo $this->_tpl_vars['lng_label_datatable_details_updated']; ?>
</label></th>
                    <td><i><?php echo $this->_tpl_vars['detail']['created']; ?>
</i></td>
                </tr>
                <tr>
                    <th><?php echo $this->_tpl_vars['lng_label_datatable_details_body']; ?>
</label></th>
                    <td>
                        <?php echo $this->_tpl_vars['detail']['bodyparced']; ?>

                    </td>
                </tr>
                <?php if (! empty ( $this->_tpl_vars['detail']['attachPath'] )): ?>
                <tr>
                    <th><?php echo $this->_tpl_vars['lng_label_attachment']; ?>
:</th>
                    <td><a href="<?php echo prep_url(base_url()); ?>/index.php/ticket/download?path=<?php echo $this->_tpl_vars['detail']['attachPath']; ?>
&name=<?php echo $this->_tpl_vars['detail']['realAttachFileName']; ?>
" class="attachment-link"><?php echo $this->_tpl_vars['detail']['realAttachFileName']; ?>
</a></td>
                </tr>
                <?php endif; ?>
            </table>
            <hr />
        <?php endforeach; endif; unset($_from); ?>
    </fieldset>

	<?php endif; ?>
    
    <fieldset>
        <legend><?php echo $this->_tpl_vars['lng_label_ticket_new_detail']; ?>
</legend>
        <form action="<?php echo prep_url(base_url().'/index.php/ticket/savereply'); ?>" method="post" enctype="multipart/form-data" id="add_ticketdetail_form">
            <input type="hidden" name="shinticket_ticketdetails_idTicket" value="<?php echo $this->_tpl_vars['shinticket_ticket_idTicket']; ?>
" id="shinticket_ticketdetails_idTicket" />
            <table class="new-detail">
                <tr>
                    <th valign="top"><label for=""><?php echo $this->_tpl_vars['lng_label_new_message']; ?>
:</label></th>
                    <td colspan="2" nowrap="nowrap">
                        <?php echo $this->_tpl_vars['shinticket_ticketdetails_body_input']; ?>

                        <?php if ($this->_tpl_vars['ticketdetails_errors']['shinticket_ticketdetails_body']): ?>
                            <span class="errors"><?php echo $this->_tpl_vars['ticketdetails_errors']['shinticket_ticketdetails_body']; ?>
</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <th valign="top"><label for=""><?php echo $this->_tpl_vars['lng_label_new_attach']; ?>
</label></th>
                    <td><input type="file" name="attach_file" value="" id="attach_file" /></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td align="center" colspan="2">
                        <input type="submit" name="send-new-ticket" value="<?php echo $this->_tpl_vars['lng_label_new_reply_submit_button']; ?>
" id="send-new-detail" onclick="sendData();"/>
                        <input type="reset"  name="reset-new-ticket" value="<?php echo $this->_tpl_vars['lng_label_new_resut_button']; ?>
" id="reset-new-detail" />
                    </td>
                </tr>
            </table>
        </form>
    </fieldset>
</div>

<?php echo '
    <script type="text/javascript">
        function sendData(){
            $(\'#add_ticketdetail_form\').append(\'<input type="hidden" name="shinticket_ticketdetails_body" value="\' + tinyMCE.activeEditor.getContent() + \'">\')
            $(\'#add_ticketdetail_form\').submit();    
        }
    </script>    
'; ?>



<?php if ($this->_tpl_vars['scroolToBottom'] == 'true'): ?> 
    <?php echo '
        <script type="text/javascript">
            $(document).ready(function(){
                $.scrollTo(\'.new-detail\');    
            })
        </script>
    '; ?>

<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>