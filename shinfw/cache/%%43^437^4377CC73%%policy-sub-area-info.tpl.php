<?php /* Smarty version 2.6.26, created on 2010-10-22 10:01:31
         compiled from sys_manage/dialog/policy-sub-area-info.tpl */ ?>
<?php echo $this->_tpl_vars['jsdocready']; ?>

<form action="" method="post" class="sys-policy-edit-form sys-dialog" >
    <table>
        <tr>
            <td colspan="2">
                <input type="hidden" name="sub_area_old" value="<?php echo $this->_tpl_vars['sys_policysubarea_idSubArea']; ?>
" />
                <input type="hidden" name="area_old" value="<?php echo $this->_tpl_vars['sys_policysubarea_idArea']; ?>
" />
                <input type="hidden" name="id_elem_old" value="<?php echo $this->_tpl_vars['sys_policysubarea_idElem']; ?>
" />
            </td>
        </tr>
        <tr>
            <th><?php echo $this->_tpl_vars['lng_label_sys_policy_sub_id']; ?>
</th>
            <td>
                <?php echo $this->_tpl_vars['sys_policysubarea_idElem_input']; ?>
<br />
                <span class="validatetion-error" id="sys_policysubarea_idElem_error"></span>
            </td>
        </tr>
        <tr>
            <th><?php echo $this->_tpl_vars['lng_label_sys_policy_sub_type']; ?>
:</th>
            <td>
                <?php echo $this->_tpl_vars['sys_policysubarea_type_input']; ?>
<br />
                <span class="validatetion-error" id="sys_policysubarea_type_error"></span>
            </td>
        </tr>
        <tr>
            <th><?php echo $this->_tpl_vars['lng_label_sys_policy_sub_area']; ?>
:</th>
            <td>
                <?php echo $this->_tpl_vars['sys_policysubarea_idArea_input']; ?>
<br />
                <span class="validatetion-error" id="sys_policysubarea_idArea_error"></span>
            </td>
        </tr>
        <tr>
            <th><?php echo $this->_tpl_vars['lng_label_sys_policy_sub_sub_area']; ?>
:</th>
            <td>
                <?php echo $this->_tpl_vars['sys_policysubarea_idSubArea_input']; ?>
<br />
                <span class="validatetion-error" id="sys_policysubarea_idSubArea_error"></span>
            </td>
        </tr>
        <tr>
            <th><?php echo $this->_tpl_vars['lng_label_sys_policy_sub_mode']; ?>
:</th>
            <td>
                <?php echo $this->_tpl_vars['sys_policysubarea_mode_input']; ?>
<br />
                <span class="validatetion-error" id="sys_policysubarea_mode_error"></span>
            </td>
        </tr>
    </fieldset>
</form>

<?php echo '
    <script type="text/javascript">
        $(document).ready(function(){
            $(\'#sys_policysubarea_idArea\').change(function(){
                $.getJSON(\''; ?>
<?php echo prep_url(base_url().'/index.php/policysubareamanage/getsubarealist'); ?><?php echo '\', {
                    areaId: $(this).val()
                }, function(json) {
                    $(\'#sys_policysubarea_idSubArea\').empty();
                    $(\'#sys_policysubarea_idSubArea\').append(\'<option value=""></option>\');    
                    for(index in json) {
                        $(\'#sys_policysubarea_idSubArea\').append(\'<option value="\' + index + \'">\' +  json[index] + \'</option>\');    
                    }
                })
            })
        })
    </script>
'; ?>