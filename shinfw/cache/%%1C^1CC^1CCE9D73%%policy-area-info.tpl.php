<?php /* Smarty version 2.6.26, created on 2010-10-22 11:20:38
         compiled from sys_manage/dialog/policy-area-info.tpl */ ?>
<form action="" method="post" class="sys-policy-edit-form sys-dialog" >
    <table>
        <tr>
            <th></th>
            <td>
                <input type="hidden" name="sys_policy_id_elem_old" value="<?php echo $this->_tpl_vars['sys_policyarea_idElem']; ?>
" />
                <input type="hidden" name="sys_policy_id_area_old" value="<?php echo $this->_tpl_vars['sys_policyarea_idArea']; ?>
" />
            </td>
        </tr>
        <tr>
            <th><?php echo $this->_tpl_vars['lng_label_sys_policy_id']; ?>
</th>
            <td>
                <?php echo $this->_tpl_vars['sys_policyarea_idElem_input']; ?>
<br />
                <span class="validatetion-error" id="sys_policyarea_idElem_error"></span>
            </td>
        </tr>
        <tr>
            <th><?php echo $this->_tpl_vars['lng_label_sys_policy_type']; ?>
:</th>
            <td>
                <?php echo $this->_tpl_vars['sys_policyarea_type_input']; ?>
<br />
                <span class="validatetion-error" id="sys_policyarea_type_error"></span>
            </td>
        </tr>
        <tr>
            <th><?php echo $this->_tpl_vars['lng_label_sys_policy_area']; ?>
:</th>
            <td>
                <?php echo $this->_tpl_vars['sys_policyarea_idArea_input']; ?>
<br />
                <span class="validatetion-error" id="sys_policyarea_idArea_error"></span>
            </td>
        </tr>
        <tr>
            <th><?php echo $this->_tpl_vars['lng_label_sys_policy_mode']; ?>
:</th>
            <td>
                <?php echo $this->_tpl_vars['sys_policyarea_mode_input']; ?>
<br />
                <span class="validatetion-error" id="$sys_policyarea_mode_error"></span>
            </td>
        </tr>
    </fieldset>
</form>

<?php echo '
    <script type="text/javascript">
        $(document).ready(function(){
            $(\'#sys_policyarea_type\').attr(\'disabled\', \'disabled\');
        })
        
        $(\'#sys_policyarea_idElem\').change(function(){
            var type = $(\'#sys_policyarea_idElem option:selected\').attr(\'type\');
                       $(\'#sys_policyarea_type option[value=\' + type + \']\').attr(\'selected\', \'selected\');
        })
    </script>
'; ?>