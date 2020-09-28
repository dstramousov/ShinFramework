<?php /* Smarty version 2.6.26, created on 2010-10-19 09:07:08
         compiled from sys_manage/dialog/area-info.tpl */ ?>
<form action="" method="post" class="sys-area-edit-form sys-dialog" >
    <table>
        <tr>
            <th></th>
            <td><input type="hidden" name="sys_area_id_hidden_old" value="<?php echo $this->_tpl_vars['sys_structarea_idArea']; ?>
" /></td>
        </tr>
        <tr>
            <th><?php echo $this->_tpl_vars['lng_label_sys_role_id']; ?>
</th>
            <td>
                <?php echo $this->_tpl_vars['sys_structarea_idArea_input']; ?>
<br />
                <span class="validatetion-error" id="sys_structarea_idArea_error"></span>
            </td>
        </tr>
        <tr>
            <th><?php echo $this->_tpl_vars['lng_label_sys_area_area']; ?>
:</th>
            <td>
                <?php echo $this->_tpl_vars['sys_structarea_area_input']; ?>
<br />
                <span class="validatetion-error" id="sys_structarea_area_error"></span>
            </td>
        </tr>
    </fieldset>
</form>