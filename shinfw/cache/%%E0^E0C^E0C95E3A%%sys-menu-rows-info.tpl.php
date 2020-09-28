<?php /* Smarty version 2.6.26, created on 2010-10-20 11:07:30
         compiled from sys_manage/dialog/sys-menu-rows-info.tpl */ ?>
<form action="<?php echo prep_url(base_url().'/index.php/menurowsmanage/savemenurowsinfo'); ?>" method="post" class="sys-dialog" enctype="multipart/form-data">
    <table>
        <tr>
            <th></th>
            <td>
                <input type="hidden" name="sys_menu_old_menu_id"  value="<?php echo $this->_tpl_vars['sys_menurows_idMenu']; ?>
" />
                <input type="hidden" name="sys_menu_old_application_id" value="<?php echo $this->_tpl_vars['sys_menurows_idApplication']; ?>
" />
            </td>
        </tr>
        <tr>
            <th><?php echo $this->_tpl_vars['lng_label_menu_rows_id_menu']; ?>
:</th>
            <td>
                <?php echo $this->_tpl_vars['sys_menurows_idMenu_input']; ?>
<br />
                <span class="validatetion-error" id="sys_menurows_idMenu_error"></span> 
            </td>
        </tr>
        <tr>
            <th><?php echo $this->_tpl_vars['lng_label_menu_rows_id_panel']; ?>
:</th>
            <td>
                <?php echo $this->_tpl_vars['sys_menurows_idPanel_input']; ?>
<br />
                <span class="validatetion-error" id="sys_menurows_idPanel_error"></span>
            </td>
        </tr>
        <tr>
            <th><?php echo $this->_tpl_vars['lng_label_menu_rows_id_grp']; ?>
:</th>
            <td>
                <?php echo $this->_tpl_vars['sys_menurows_idGrp_input']; ?>
<br />
                <span class="validatetion-error" id="sys_menurows_idGrp_error"></span>
            </td>
        </tr>
        <tr>
            <th><?php echo $this->_tpl_vars['lng_label_menu_rows_id_app']; ?>
:</th>
            <td>
                <?php echo $this->_tpl_vars['sys_menurows_idApplication_input']; ?>
<br />
                <span class="validatetion-error" id="sys_menurows_idApplication_error"></span>
            </td>
        </tr>
        <tr>
            <th><?php echo $this->_tpl_vars['lng_label_menu_rows_label']; ?>
:</th>
            <td>
                <?php echo $this->_tpl_vars['sys_menurows_label_input']; ?>
<br />
                <span class="validatetion-error" id="sys_menurows_label_error"></span> 
            </td>
        </tr>
        <tr>
            <th><?php echo $this->_tpl_vars['lng_label_menu_rows_new_page']; ?>
:</th>
            <td>
                <?php echo $this->_tpl_vars['sys_menurows_newPage_input']; ?>
<br />
                <span class="validatetion-error" id="sys_menurows_newPage_error"></span>
            </td>
        </tr>
        <tr>
            <th><?php echo $this->_tpl_vars['lng_label_menu_rows_type']; ?>
:</th>
            <td>
                <?php echo $this->_tpl_vars['sys_menurows_type_input']; ?>
<br />
                <span class="validatetion-error" id="sys_menurows_type_error"></span>
            </td>
        </tr>
        <tr>
            <th><?php echo $this->_tpl_vars['lng_label_menu_rows_position']; ?>
:</th>
            <td>
                <?php echo $this->_tpl_vars['sys_menurows_position_input']; ?>
<br />
                <span class="validatetion-error" id="sys_menurows_position_error"></span>
            </td>
        </tr>
        <tr>
            <th><?php echo $this->_tpl_vars['lng_label_menu_rows_active']; ?>
:</th>
            <td>
                <?php echo $this->_tpl_vars['sys_menurows_active_input']; ?>
<br />
                <span class="validatetion-error" id="sys_menurows_active_error"></span>
            </td>
        </tr>
    </fieldset>
</form>

<?php echo '
    <script type="text/javascript">
        $(document).ready(function(){
            $(\'#sys_menurows_idMenu\').change(function(){
                $.getJSON(\''; ?>
<?php echo prep_url(base_url().'/index.php/menumanage/getpanellist'); ?><?php echo '\', {
                    menuId: $(this).val()
                }, function(json) {
                    $(\'#sys_menurows_idPanel\').empty();
                    $(\'#sys_menurows_idGrp\').empty();
                    $(\'#sys_menurows_idPanel\').append(\'<option value=""></option>\');    
                    for(index in json) {
                        $(\'#sys_menurows_idPanel\').append(\'<option value="\' + index + \'">\' +  json[index] + \'</option>\');    
                    }
                })
            })
            
            $(\'#sys_menurows_idPanel\').change(function(){
                $.getJSON(\''; ?>
<?php echo prep_url(base_url().'/index.php/menugrpmanage/getgrplist'); ?><?php echo '\', {
                    panelId:   $(this).val(),
                    menuId:    $(\'#sys_menurows_idMenu\').val()
                }, function(json) {
                    $(\'#sys_menurows_idGrp\').empty();
                    $(\'#sys_menurows_idGrp\').append(\'<option value=""></option>\');    
                    for(index in json) {
                        $(\'#sys_menurows_idGrp\').append(\'<option value="\' + index + \'">\' +  json[index] + \'</option>\');    
                    }
                })
            })
        })
    </script>
'; ?>