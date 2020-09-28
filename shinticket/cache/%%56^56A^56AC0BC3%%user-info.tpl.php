<?php /* Smarty version 2.6.26, created on 2010-10-19 08:59:57
         compiled from admin/user/user-info.tpl */ ?>
<form action="" method="post" class="sys-user-edit-form sys-dialog">
    <table>
        <tr>
            <td colspan="2">
                <input type="hidden" name="old_user_id"  value="<?php echo $this->_tpl_vars['shinticket_user_userId']; ?>
" />
                <input type="hidden" name="old_customer_id" value="<?php echo $this->_tpl_vars['shinticket_user_idCustomer']; ?>
" />
            </td>
        </tr>
        <tr>
            <td><?php echo $this->_tpl_vars['lng_label_sys_shinticket_user_id']; ?>
:</td>
            <td><?php echo $this->_tpl_vars['lng_label_sys_shinticket_customer_id']; ?>
:</td>
        </tr>
        <tr>
            <td>
                <?php echo $this->_tpl_vars['shinticket_user_userId_input']; ?>
<br />
                <span class="validatetion-error" id="shinticket_user_userId_error"></span>
            </td>
            <td>
                <?php echo $this->_tpl_vars['shinticket_user_idCustomer_input']; ?>
<br />
                <span class="validatetion-error" id="shinticket_user_idCustomer_error"></span>
            </td>
        </tr>
</form>