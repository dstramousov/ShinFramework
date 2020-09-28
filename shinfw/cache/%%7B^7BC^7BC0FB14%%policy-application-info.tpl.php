<?php /* Smarty version 2.6.26, created on 2010-10-21 10:25:10
         compiled from sys_manage/dialog/policy-application-info.tpl */ ?>
<form action="" method="post" class="sys-area-edit-form sys-dialog" >
    <table>
        <tr>
            <td colspan="2">
                <input type="hidden" name="oldElemId" id="oldElemId" value="<?php echo $this->_tpl_vars['sys_policyapplication_idElem']; ?>
" />
            </td>
        </tr>
        <tr>
            <th><?php echo $this->_tpl_vars['lng_label_policy_application_id_elem']; ?>
:</th>
            <td>
                <?php echo $this->_tpl_vars['sys_policyapplication_idElem_input']; ?>
<br />
                <span class="validatetion-error" id="sys_policyapplication_idElem_error"></span>
            </td>
        </tr>
        <tr>
            <th><?php echo $this->_tpl_vars['lng_label_policy_application_type']; ?>
:</th>
            <td>
                <?php echo $this->_tpl_vars['sys_policyapplication_type_input']; ?>
<br />
                <span class="validatetion-error" id="sys_policyapplication_type_error"></span>
            </td>
        </tr>
        <tr>
            <th><?php echo $this->_tpl_vars['lng_label_policy_application_id_area']; ?>
:</th>
            <td>
                <?php echo $this->_tpl_vars['sys_policyapplication_idArea_input']; ?>
<br/>
                <span class="validatetion-error" id="sys_policyapplication_idArea_error"></span>
            </td>
        </tr>
        <tr>
            <th><?php echo $this->_tpl_vars['lng_label_policy_application_id_sub_area']; ?>
:</th>
            <td>
                <?php echo $this->_tpl_vars['sys_policyapplication_idSubArea_input']; ?>
</br >
                <span class="validatetion-error" id="sys_policyapplication_idSubArea_error"></span>
            </td>
        </tr>
        <tr>
            <th><?php echo $this->_tpl_vars['lng_label_policy_application_id_application']; ?>
:</th>
            <td>
                <?php echo $this->_tpl_vars['sys_policyapplication_idApplication_input']; ?>

                <br />
                <span class="validatetion-error" id="sys_policyapplication_idApplication_error"></span>
            </td>
        </tr>
        <tr>
            <th><?php echo $this->_tpl_vars['lng_label_policy_application_mode']; ?>
:</th>
            <td>
                <?php echo $this->_tpl_vars['sys_policyapplication_mode_input']; ?>
</br >
                <span class="validatetion-error" id="sys_policyapplication_mode_error"></span>
            </td>
        </tr>
    </fieldset>
</form>

<?php echo '
    <script type="text/javascript">
        $(document).ready(function(){
            $(\'#sys_policyapplication_idArea\').change(function(){
                $.getJSON(\''; ?>
<?php echo prep_url(base_url().'/index.php/policysubareamanage/getsubarealist'); ?><?php echo '\', {
                    areaId: $(this).val()
                }, function(json) {
                    $(\'#sys_policyapplication_idSubArea\').empty();
                    $(\'#sys_policyapplication_idApplication\').empty();
                    $(\'#sys_policyapplication_idSubArea\').append(\'<option value=""></option>\');    
                    for(index in json) {
                        $(\'#sys_policyapplication_idSubArea\').append(\'<option value="\' + index + \'">\' +  json[index] + \'</option>\');    
                    }
                });
             })
            
            $(\'#sys_policyapplication_idSubArea\').change(function(){
            
                var subAreaId   =   $(this).val();
                var areaId      =   $(\'#sys_policyapplication_idArea\').val();
                
                if(subAreaId != \'\' && areaId != \'\') {   
                    $.getJSON(\''; ?>
<?php echo prep_url(base_url().'/index.php/policyapplicationmanage/getapplist'); ?><?php echo '\', {
                        areaId:    areaId, 
                        subAreaId: subAreaId
                    }, function(json) {
                        $(\'#sys_policyapplication_idApplication\').empty();
                        for(index in json) {
                            $(\'#sys_policyapplication_idApplication\').append(\'<option value="\' + index + \'">\' +  json[index] + \'</option>\');    
                        }
                    });
                } else {
                    $(\'#sys_policyapplication_idApplication\').empty();
                }
            })
        })
    </script>
'; ?>