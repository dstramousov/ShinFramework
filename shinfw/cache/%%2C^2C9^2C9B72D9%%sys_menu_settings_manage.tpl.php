<?php /* Smarty version 2.6.26, created on 2010-10-21 15:04:47
         compiled from sys_manage/list/sys_menu_settings_manage.tpl */ ?>
    <div class="js-includes">
        <?php echo $this->_tpl_vars['cssincludes']; ?>

        <?php echo $this->_tpl_vars['jsincludes']; ?>

        <?php echo $this->_tpl_vars['jsdocready']; ?>

        <?php echo $this->_tpl_vars['jsnondocready']; ?>

    </div>
    
    <div class="sys-manage-controls">
        <a href="" id="add-sys-menu-settings-button"></a>
    </div>
        
    <div class="sys-manage-datatable">
        <?php echo $this->_tpl_vars['settingsMenuList']; ?>

    </div>
    
    <div id="delete-sys-menu-settings-dialog" class="dialog-template">
        <form action="<?php echo prep_url(base_url().'/index.php/menusettingsmanage/deletemenu'); ?>" method="post" id="delete-sys-menu-settings-form">
            <input type="hidden" name="sys-menu-id" value="" id="sys-menu-id" />
            <input type="hidden" name="sys-user-id" value="" id="sys-user-id" />
            <input type="hidden" name="sys-panel-id" value="" id="sys-panel-id" />
        </form>
        <center><?php echo $this->_tpl_vars['lng_label_sys_user_delete_really']; ?>
</center>
    </div>
    
    <div id="edit-sys-menu-settings-dialog" class="dialog-template"></div>
    <div id="add-sys-menu-settings-dialog" class="dialog-template"></div>
    
    <?php echo '
        <script type="text/javascript">
            function deleteSysMenuSettings(menuId, userId, panelId){
                $(\'#sys-menu-id\').val(menuId);
                $(\'#sys-user-id\').val(userId);
                $(\'#sys-panel-id\').val(panelId);
                $(\'#delete-sys-menu-settings-dialog\').dialog(\'open\');
            }
            
            function editSysMenuSettings(menuId, userId, panelId) {
                $(\'#edit-sys-menu-settings-dialog\').load(\''; ?>
<?php echo prep_url(base_url().'/index.php/menusettingsmanage/loadmenudata'); ?><?php echo '\', {
                    menuId:  menuId,
                    userId:  userId,
                    panelId: panelId
                }, function(){
                    $(\'#edit-sys-menu-settings-dialog\').dialog(\'open\');    
                });    
            }
            
            function closeSysMenuSettingsDeleteDialog(){
                $(\'#delete-sys-menu-settings-dialog\').dialog(\'close\');
            }
            
            function deleteSysMenuSettingsRecord(){
                $(\'#delete-sys-menu-settings-form\').submit();        
            }
            
            function closeSysMenuSettingsEditDialog () {
                $(\'#edit-sys-menu-settings-dialog\').dialog(\'close\');    
            }
            
            function saveSysMenuSettingsInfo() {
                
                var data    =   {};
                $(\'#edit-sys-menu-settings-dialog :input, select\').each(function(){
                    data[$(this).attr(\'name\')] = $(this).val();
                })
                
                makeAjaxRequest(\''; ?>
<?php echo prep_url(base_url().'/index.php/menusettingsmanage/checkmenudata'); ?><?php echo '\', data, function(json){
                    if(json.result) {
                        window.location = \''; ?>
<?php echo prep_url(base_url().'/index.php/sysmanage?tab=ui-tabs-12'); ?><?php echo '\';   
                    } else {
                        $(\'#edit-sys-menu-settings-dialog .validatetion-error\').text(\'\');
                        for(index in json.errors) {
                            $(\'#edit-sys-menu-settings-dialog #\' + index + \'_error\').text(json.errors[index]).show();    
                        }
                    }
                })        
            }
            
            function showAddSysMenuSettingsDialog(){
                $(\'#add-sys-menu-settings-dialog\').load(\''; ?>
<?php echo prep_url(base_url().'/index.php/menusettingsmanage/loadnewmenudata'); ?><?php echo '\', {}, 
                function(){
                    $(\'#add-sys-menu-settings-dialog\').dialog(\'open\');    
                });
                
                return false;
            }
            
            function closeSysMenuSettingsAddDialog(){
                $(\'#add-sys-menu-settings-dialog\').dialog(\'close\');
            }
            
            function saveNewSysMenuSettingsInfo(){
                var data    =   {};
                $(\'#add-sys-menu-settings-dialog :input, select\').each(function(){
                    data[$(this).attr(\'name\')] = $(this).val();
                })
                
                makeAjaxRequest(\''; ?>
<?php echo prep_url(base_url().'/index.php/menusettingsmanage/checkmenudata'); ?><?php echo '\', data, function(json){
                    if(json.result) {
                        window.location = \''; ?>
<?php echo prep_url(base_url().'/index.php/sysmanage?tab=ui-tabs-12'); ?><?php echo '\';   
                    } else {
                        $(\'#add-sys-menu-settings-dialog .validatetion-error\').text(\'\');
                        for(index in json.errors) {
                            $(\'#add-sys-menu-settings-dialog #\' + index + \'_error\').text(json.errors[index]).show();    
                        }
                    }
                })    
            }
        </script>
    '; ?>
