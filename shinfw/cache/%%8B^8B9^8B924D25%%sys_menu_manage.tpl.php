<?php /* Smarty version 2.6.26, created on 2010-10-14 13:42:49
         compiled from sys_manage/list/sys_menu_manage.tpl */ ?>
    <div class="js-includes">
        <?php echo $this->_tpl_vars['cssincludes']; ?>

        <?php echo $this->_tpl_vars['jsincludes']; ?>

        <?php echo $this->_tpl_vars['jsdocready']; ?>

        <?php echo $this->_tpl_vars['jsnondocready']; ?>

    </div>
    
    <div class="sys-manage-controls">
        <a href="" id="add-sys-menu-button"></a>
    </div>
        
    <div class="sys-manage-datatable">
        <?php echo $this->_tpl_vars['menuList']; ?>

    </div>
    
    <div id="delete-sys-menu-dialog" class="dialog-template">
        <form action="<?php echo prep_url(base_url().'/index.php/menumanage/deletemenu'); ?>" method="post" id="delete-sys-menu-form">
            <input type="hidden" name="sys-menu-id" value="" id="sys-menu-id" />
            <input type="hidden" name="sys-panel-id" value="" id="sys-panel-id" />
        </form>
        <center><?php echo $this->_tpl_vars['lng_label_sys_user_delete_really']; ?>
</center>
    </div>
    
    <div id="edit-sys-menu-dialog" class="dialog-template"></div>
    <div id="add-sys-menu-dialog" class="dialog-template"></div>
    
    <?php echo '
        <script type="text/javascript">
            function deleteSysMenu(menuId, panelId){
                $(\'#sys-menu-id\').val(menuId);
                $(\'#sys-panel-id\').val(panelId);
                $(\'#delete-sys-menu-dialog\').dialog(\'open\');
            }
            
            function editSysMenu(menuId, panelId) {
                $(\'#edit-sys-menu-dialog\').load(\''; ?>
<?php echo prep_url(base_url().'/index.php/menumanage/loadmenudata'); ?><?php echo '\', {
                    menuId:  menuId,
                    panelId: panelId
                }, function(){
                    $(\'#edit-sys-menu-dialog\').dialog(\'open\');    
                });    
            }
            
            function closeSysMenuDeleteDialog(){
                $(\'#delete-sys-menu-dialog\').dialog(\'close\');
            }
            
            function deleteSysMenuRecord(){
                $(\'#delete-sys-menu-form\').submit();        
            }
            
            function closeSysMenuEditDialog () {
                $(\'#edit-sys-menu-dialog\').dialog(\'close\');    
            }
            
            function saveSysMenuInfo() {
                
                var data    =   {};
                $(\'#edit-sys-menu-dialog :input, select\').each(function(){
                    data[$(this).attr(\'name\')] = $(this).val();
                })
                
                makeAjaxRequest(\''; ?>
<?php echo prep_url(base_url().'/index.php/menumanage/checkmenudata'); ?><?php echo '\', data, function(json){
                    if(json.result) {
                        $(\'#edit-sys-menu-dialog form\').submit();
                    } else {
                        $(\'#edit-sys-menu-dialog .validatetion-error\').text(\'\');
                        for(index in json.errors) {
                            $(\'#edit-sys-menu-dialog #\' + index + \'_error\').text(json.errors[index]).show();    
                        }
                    }
                })        
            }
            
            function showAddSysMenuDialog(){
                $(\'#add-sys-menu-dialog\').load(\''; ?>
<?php echo prep_url(base_url().'/index.php/menumanage/loadnewmenudata'); ?><?php echo '\', {}, 
                function(){
                    $(\'#add-sys-menu-dialog\').dialog(\'open\');    
                });
                
                return false;
            }
            
            function closeSysMenuAddDialog(){
                $(\'#add-sys-menu-dialog\').dialog(\'close\');
            }
            
            function saveNewSysMenuInfo(){
                var data    =   {};
                $(\'#add-sys-menu-dialog :input, select\').each(function(){
                    data[$(this).attr(\'name\')] = $(this).val();
                })
                
                makeAjaxRequest(\''; ?>
<?php echo prep_url(base_url().'/index.php/menumanage/checkmenudata'); ?><?php echo '\', data, function(json){
                    if(json.result) {
                        $(\'#add-sys-menu-dialog form\').submit();
                    } else {
                        $(\'#add-sys-menu-dialog .validatetion-error\').text(\'\');
                        for(index in json.errors) {
                            $(\'#add-sys-menu-dialog #\' + index + \'_error\').text(json.errors[index]).show();    
                        }
                    }
                })    
            }
        </script>
    '; ?>
