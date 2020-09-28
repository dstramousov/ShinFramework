<?php /* Smarty version 2.6.26, created on 2011-03-09 10:43:15
         compiled from ticket/new.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="new-form">
    <fieldset>
        <legend><?php echo $this->_tpl_vars['lng_label_new_ticket']; ?>
</legend>
        <form id="add_ticket_form" method="post" action="<?php echo prep_url(base_url().'/ticket/save'); ?>" enctype="multipart/form-data">
		
            <table>
                <tr>
                    <th><label for=""><?php echo $this->_tpl_vars['lng_label_new_title']; ?>
:</label></th>
                    <td>
                        <?php echo $this->_tpl_vars['shinticket_ticket_title_input']; ?>

                        <?php if ($this->_tpl_vars['ticket_errors']['shinticket_ticket_title']): ?>
                            <div class="shin-clear"></div>
                            <span class="errors"><?php echo $this->_tpl_vars['ticket_errors']['shinticket_ticket_title']; ?>
</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <th><label for=""><?php echo $this->_tpl_vars['lng_label_new_priority']; ?>
</label></th>
                    <td><?php echo $this->_tpl_vars['shinticket_ticket_priority_input']; ?>
</td>
                </tr>
                <tr>
                    <th><label for=""><?php echo $this->_tpl_vars['lng_label_ticket_application_name']; ?>
</label></th>
                    <td>
                        <?php echo $this->_tpl_vars['shinticket_ticket_applicationId_input']; ?>
<br />
                        <?php if ($this->_tpl_vars['ticket_errors']['shinticket_ticket_applicationId']): ?>
                            <span class="errors"><?php echo $this->_tpl_vars['ticket_errors']['shinticket_ticket_applicationId']; ?>
</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <th><label for=""><?php echo $this->_tpl_vars['lng_label_new_message']; ?>
:</label></th>
                    <td nowrap="nowrap">
                        <?php echo $this->_tpl_vars['shinticket_ticket_body_input']; ?>

                        <?php if ($this->_tpl_vars['ticket_errors']['shinticket_ticket_body']): ?>
                            <span class="errors"><?php echo $this->_tpl_vars['ticket_errors']['shinticket_ticket_body']; ?>
</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <th><label for=""><?php echo $this->_tpl_vars['lng_label_new_attach']; ?>
</label></th>
                    <td><input type="file" name="attach_file" value="" id="attach_file" /></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="send-new-ticket" value="<?php echo $this->_tpl_vars['lng_label_new_submit_button']; ?>
" id="send-new-ticket" onclick="sendData();" />
                        <input type="reset"  name="reset-new-ticket" value="<?php echo $this->_tpl_vars['lng_label_new_resut_button']; ?>
" id="reset-new-ticket" />
                    </td>
                </tr>
            </table>
        </form>
    </fieldset>

    <?php echo '
    <script type="text/javascript">
        function sendData(){
            $(\'#add_ticket_form\').append(\'<input type="hidden" name="shinticket_ticket_body" value="\' + tinyMCE.activeEditor.getContent() + \'">\')
            $(\'#add_ticket_form\').submit();    
        }
    </script>    
    '; ?>


</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>