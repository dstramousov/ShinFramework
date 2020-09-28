<?php /* Smarty version 2.6.26, created on 2011-08-25 11:17:34
         compiled from sys_manage/dialog/role-info.tpl */ ?>
<form action="" method="post" class="sys-role-edit-form sys-dialog" >
    <table>
        <tr>
            <th></th>
            <td><input type="hidden" name="sys_userrole_idRole_old" value="<?php echo $this->_tpl_vars['sys_userrole_idRole']; ?>
" id="sys_userrole_idRole_old" /></td>
        </tr>
        <tr>
            <th><?php echo $this->_tpl_vars['lng_label_sys_role_id']; ?>
</th>
            <td>
                <?php echo $this->_tpl_vars['sys_userrole_idRole_input']; ?>
<br />
                <span class="validatetion-error" id="sys_userrole_idRole_error"></span>
            </td>
        </tr>
        <tr>
            <th><?php echo $this->_tpl_vars['lng_label_sys_role_name']; ?>
:</th>
            <td>
                <?php echo $this->_tpl_vars['sys_userrole_role_input']; ?>
<br />
                <span class="validatetion-error" id="sys_userrole_role_error"></span>
            </td>
        </tr>
        <tr>
            <th><?php echo $this->_tpl_vars['lng_label_sys_user_name']; ?>
:</th>
            <td><?php echo $this->_tpl_vars['sys_userrole_grp_input']; ?>
</td>
        </tr>
    </fieldset>
</form>