<?php /* Smarty version 2.6.26, created on 2010-10-13 15:41:42
         compiled from sys_manage/list/sys_user_manage.tpl */ ?>
    <div class="js-includes">
        <?php echo $this->_tpl_vars['cssincludes']; ?>

        <?php echo $this->_tpl_vars['jsincludes']; ?>

        <?php echo $this->_tpl_vars['jsdocready']; ?>

        <?php echo $this->_tpl_vars['jsnondocready']; ?>

    </div>
    
    <div class="sys-manage-controls">
        <a href="" id="add-user-button"></a>
    </div>
        
    <div class="sys-manage-datatable">
        <?php echo $this->_tpl_vars['sysUserList']; ?>

    </div>
    
    <div id="delete-sys-user-dialog" class="dialog-template">
        <form action="<?php echo prep_url(base_url().'/index.php/usermanage/deleteuser'); ?>" method="post" id="delete-sys-user-form">
            <input type="hidden" name="sys-user-id" value="" id="sys-user-id" />
        </form>
        <center><?php echo $this->_tpl_vars['lng_label_sys_user_delete_really']; ?>
</center>
    </div>
    
    <div id="edit-sys-user-dialog" class="dialog-template"></div>
    <div id="add-sys-user-dialog" class="dialog-template"></div>
    
    <?php echo '
        <script type="text/javascript">
            function deleteSysUser(userId){
                $(\'#sys-user-id\').val(userId);
                $(\'#delete-sys-user-dialog\').dialog(\'open\');
            }
            
            function editSysUser(userId) {
                $(\'#edit-sys-user-dialog\').load(\''; ?>
<?php echo prep_url(base_url().'/index.php/usermanage/loaduserdata'); ?><?php echo '\', {
                    userId: userId
                }, function(){
                    $(\'#edit-sys-user-dialog\').dialog(\'open\');    
                });    
            }
            
            function closeDeleteDialog(){
                $(\'#delete-sys-user-dialog\').dialog(\'close\');
            }
            
            function deleteSysUserRecord(){
                $(\'#delete-sys-user-form\').submit();        
            }
            
            function closeSysUserEditDialog () {
                $(\'#edit-sys-user-dialog\').dialog(\'close\');    
            }
            
            function saveSysUserInfo() {
                var data    =   {};
                $(\'#edit-sys-user-dialog :input, select\').each(function(){
                    data[$(this).attr(\'name\')] = $(this).val();
                })
                
                makeAjaxRequest(\''; ?>
<?php echo prep_url(base_url().'/index.php/usermanage/saveuserinfo'); ?><?php echo '\', data, function(json){
                    if(json.result) {
                        window.location = \''; ?>
<?php echo prep_url(base_url().'/index.php/sysmanage?tab=ui-tabs-1'); ?><?php echo '\';   
                    } else {
                        $(\'#edit-sys-user-dialog .validatetion-error\').text(\'\');
                        for(index in json.errors) {
                            $(\'#edit-sys-user-dialog #\' + index + \'_error\').text(json.errors[index]).show();    
                        }
                    }
                })        
            }
            
            function showAddSysUserDialog(){
                $(\'#add-sys-user-dialog\').load(\''; ?>
<?php echo prep_url(base_url().'/index.php/usermanage/loadnewuserdata'); ?><?php echo '\', {}, 
                function(){
                    $(\'#add-sys-user-dialog\').dialog(\'open\');    
                });
                
                return false;
            }
            
            function closeSysUserAddDialog(){
                $(\'#add-sys-user-dialog\').dialog(\'close\');
            }
            
            function saveNewSysUserInfo(){
                var data    =   {};
                $(\'#add-sys-user-dialog :input, select\').each(function(){
                    data[$(this).attr(\'name\')] = $(this).val();
                })
                
                makeAjaxRequest(\''; ?>
<?php echo prep_url(base_url().'/index.php/usermanage/saveuserinfo'); ?><?php echo '\', data, function(json){
                    if(json.result) {
                        window.location = \''; ?>
<?php echo prep_url(base_url().'/index.php/sysmanage?tab=ui-tabs-1'); ?><?php echo '\';   
                    } else {
                        $(\'#add-sys-user-dialog .validatetion-error\').text(\'\');
                        for(index in json.errors) {
                            $(\'#add-sys-user-dialog #\' + index + \'_error\').text(json.errors[index]).show();    
                        }
                    }
                })    
            }
        </script>
    '; ?>
