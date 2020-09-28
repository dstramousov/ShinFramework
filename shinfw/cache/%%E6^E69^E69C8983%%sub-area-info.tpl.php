<?php /* Smarty version 2.6.26, created on 2011-03-09 10:46:10
         compiled from sys_manage/dialog/sub-area-info.tpl */ ?>
<form action="" method="post" class="sys-sub-area-edit-form sys-dialog" >
    <table>
        <tr>
            <th></th>
            <td><input type="hidden" name="sys_structsubarea_idSubArea_old" value="<?php echo $this->_tpl_vars['sys_structsubarea_idSubArea']; ?>
" id="sys_structsubarea_idSubArea_old" /></td>
            <td><input type="hidden" name="sys_structsubarea_idArea_old" value="<?php echo $this->_tpl_vars['sys_structsubarea_idArea']; ?>
" id="sys_structsubarea_idArea_old" /></td>
        </tr>
        <tr>
            <th><?php echo $this->_tpl_vars['lng_label_sys_sub_area_id']; ?>
</th>
            <td>
                <?php echo $this->_tpl_vars['sys_structsubarea_idSubArea_input']; ?>
<br />
                <span class="validatetion-error" id="sys_structsubarea_idSubArea_error"></span>
            </td>
        </tr>
        <tr>
            <th><?php echo $this->_tpl_vars['lng_label_sys_area_id']; ?>
</th>
            <td>
                <?php echo $this->_tpl_vars['sys_structsubarea_idArea_input']; ?>
<br />
                <span class="validatetion-error" id="sys_structsubarea_idArea_error"></span>
            </td>
        </tr>
        <tr>
            <th><?php echo $this->_tpl_vars['lng_label_sys_sub_area']; ?>
:</th>
            <td>
                <?php echo $this->_tpl_vars['sys_structsubarea_subarea_input']; ?>
<br />
                <span class="validatetion-error" id="sys_structsubarea_subarea_error"></span>
            </td>
        </tr>
    </fieldset>
</form>