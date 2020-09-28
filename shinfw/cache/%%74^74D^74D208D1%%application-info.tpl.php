<?php /* Smarty version 2.6.26, created on 2011-03-09 10:33:02
         compiled from sys_manage/dialog/application-info.tpl */ ?>
<?php echo $this->_tpl_vars['jsdocready']; ?>

<form action="" method="post" class="sys-area-edit-form sys-dialog" >
    <table>
        <tr>
            <td colspan="2"><?php echo $this->_tpl_vars['sys_structapplication_idApplication_hidden']; ?>
</td>
        </tr>
        <tr>
            <th><?php echo $this->_tpl_vars['lng_label_sys_struct_application_area']; ?>
:</th>
            <td>
                <?php echo $this->_tpl_vars['sys_structapplication_idArea_input']; ?>
<br />
                <span class="validatetion-error" id="sys_structapplication_idArea_error"></span>
            </td>
        </tr>
        <tr>
            <th><?php echo $this->_tpl_vars['lng_label_sys_struct_application_sub_area']; ?>
:</th>
            <td>
                <?php echo $this->_tpl_vars['sys_structapplication_idSubArea_input']; ?>
<br />
                <span class="validatetion-error" id="sys_structapplication_idSubArea_error"></span>
            </td>
        </tr>
        <tr>
            <th><?php echo $this->_tpl_vars['lng_label_sys_struct_application_application']; ?>
:</th>
            <td>
                <?php echo $this->_tpl_vars['sys_structapplication_application_input']; ?>
<br />
                <span class="validatetion-error" id="sys_structapplication_application_error"></span>
            </td>
        </tr>
        <tr>
            <th><?php echo $this->_tpl_vars['lng_label_sys_struct_application_file']; ?>
:</th>
            <td>
                <?php echo $this->_tpl_vars['sys_structapplication_file_input']; ?>
<br />
                <span class="validatetion-error" id="sys_structapplication_file_error"></span>
            </td>
        </tr>
        <tr>
            <th><?php echo $this->_tpl_vars['lng_label_sys_struct_application_show_menu']; ?>
:</th>
            <td>
                <?php echo $this->_tpl_vars['sys_structapplication_showMenu_input']; ?>
<br />
                <span class="validatetion-error" id="sys_structapplication_showMenu_error"></span>
            </td>
        </tr>
    </fieldset>
</form>

<?php echo '
    <script type="text/javascript">
        $(document).ready(function(){
            $(\'#sys_structapplication_idArea\').change(function(){
                $.getJSON(\''; ?>
<?php echo prep_url(base_url().'/applicationmanage/getsubarealist'); ?><?php echo '\', {
                    areaId: $(this).val()
                }, function(json) {
                    $(\'#sys_structapplication_idSubArea\').empty();
                    for(index in json) {
                        $(\'#sys_structapplication_idSubArea\').append(\'<option value="\' + index + \'">\' +  json[index] + \'</option>\');    
                    }
                })
            })
        })
    </script>
'; ?>