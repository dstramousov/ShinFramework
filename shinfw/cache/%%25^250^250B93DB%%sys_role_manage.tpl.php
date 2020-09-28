<?php /* Smarty version 2.6.26, created on 2010-10-13 15:42:28
         compiled from sys_manage/list/sys_role_manage.tpl */ ?>
    <div class="js-includes">
        <?php echo $this->_tpl_vars['cssincludes']; ?>

        <?php echo $this->_tpl_vars['jsincludes']; ?>

        <?php echo $this->_tpl_vars['jsdocready']; ?>

        <?php echo $this->_tpl_vars['jsnondocready']; ?>

    </div>
    
    <div class="sys-manage-controls">
        <a href="" id="add-role-button"></a>
    </div>
        
    <div class="sys-manage-datatable">
        <?php echo $this->_tpl_vars['sysRoleList']; ?>

    </div>
    
    <div id="delete-sys-role-dialog" class="dialog-template">
        <form action="<?php echo prep_url(base_url().'/index.php/rolemanage/deleterole'); ?>" method="post" id="delete-sys-role-form">
            <input type="hidden" name="sys-role-id" value="" id="sys-role-id" />
        </form>
        <center><?php echo $this->_tpl_vars['lng_label_sys_user_delete_really']; ?>
</center>
    </div>
    
    <div id="edit-sys-role-dialog" class="dialog-template"></div>
    <div id="add-sys-role-dialog" class="dialog-template"></div>
    
    <?php echo '
        <script type="text/javascript">
            function deleteSysRole(roleId){
                $(\'#sys-role-id\').val(roleId);
                $(\'#delete-sys-role-dialog\').dialog(\'open\');
            }
            
            function editSysRole(roleId) {
                $(\'#edit-sys-role-dialog\').load(\''; ?>
<?php echo prep_url(base_url().'/index.php/rolemanage/loadroledata'); ?><?php echo '\', {
                    roleId: roleId
                }, function(){
                    $(\'#edit-sys-role-dialog\').dialog(\'open\');    
                });    
            }
            
            function closeSysRoleDeleteDialog(){
                $(\'#delete-sys-role-dialog\').dialog(\'close\');
            }
            
            function deleteSysRoleRecord(){
                $(\'#delete-sys-role-form\').submit();        
            }
            
            function closeSysRoleEditDialog () {
                $(\'#edit-sys-role-dialog\').dialog(\'close\');    
            }
            
            function saveSysRoleInfo() {
                var data    =   {};
                $(\'#edit-sys-role-dialog :input, select\').each(function(){
                    data[$(this).attr(\'name\')] = $(this).val();
                })
                
                makeAjaxRequest(\''; ?>
<?php echo prep_url(base_url().'/index.php/rolemanage/saveroleinfo'); ?><?php echo '\', data, function(json){
                    if(json.result) {
                        window.location = \''; ?>
<?php echo prep_url(base_url().'/index.php/sysmanage?tab=ui-tabs-2'); ?><?php echo '\';   
                    } else {
                        $(\'#edit-sys-user-dialog .validatetion-error\').text(\'\');
                        for(index in json.errors) {
                            $(\'#edit-sys-role-dialog #\' + index + \'_error\').text(json.errors[index]).show();    
                        }
                    }
                })        
            }
            
            function showAddSysRoleDialog(){
                $(\'#add-sys-role-dialog\').load(\''; ?>
<?php echo prep_url(base_url().'/index.php/rolemanage/loadnewroledata'); ?><?php echo '\', {}, 
                function(){
                    $(\'#add-sys-role-dialog\').dialog(\'open\');    
                });
                
                return false;
            }
            
            function closeSysRoleAddDialog(){
                $(\'#add-sys-role-dialog\').dialog(\'close\');
            }
            
            function saveNewSysRoleInfo(){
                var data    =   {};
                $(\'#add-sys-role-dialog :input, select\').each(function(){
                    data[$(this).attr(\'name\')] = $(this).val();
                })
                
                makeAjaxRequest(\''; ?>
<?php echo prep_url(base_url().'/index.php/rolemanage/savenewroleinfo'); ?><?php echo '\', data, function(json){
                    if(json.result) {
                        window.location = \''; ?>
<?php echo prep_url(base_url().'/index.php/sysmanage?tab=ui-tabs-2'); ?><?php echo '\';   
                    } else {
                        $(\'#add-sys-role-dialog .validatetion-error\').text(\'\');
                        for(index in json.errors) {
                            $(\'#add-sys-role-dialog #\' + index + \'_error\').text(json.errors[index]).show();    
                        }
                    }
                })    
            }
        </script>
    '; ?>
