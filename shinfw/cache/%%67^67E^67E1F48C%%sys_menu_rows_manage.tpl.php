<?php /* Smarty version 2.6.26, created on 2010-10-20 11:07:29
         compiled from sys_manage/list/sys_menu_rows_manage.tpl */ ?>
    <div class="js-includes">
        <?php echo $this->_tpl_vars['cssincludes']; ?>

        <?php echo $this->_tpl_vars['jsincludes']; ?>

        <?php echo $this->_tpl_vars['jsdocready']; ?>

        <?php echo $this->_tpl_vars['jsnondocready']; ?>

    </div>
    
    <div class="sys-manage-controls">
        <a href="" id="add-sys-menu-rows-button"></a>
    </div>
        
    <div class="sys-manage-datatable">
        <?php echo $this->_tpl_vars['menuRowsList']; ?>

    </div>
    
    <div id="delete-sys-menu-rows-dialog" class="dialog-template">
        <form action="<?php echo prep_url(base_url().'/index.php/menurowsmanage/deletemenurows'); ?>" method="post" id="delete-sys-menu-rows-form">
            <input type="hidden" name="sys-menu-id" value="" id="sys-menu-id" />
            <input type="hidden" name="sys-application-id" value="" id="sys-application-id" />
        </form>
        <center><?php echo $this->_tpl_vars['lng_label_sys_user_delete_really']; ?>
</center>
    </div>
    
    <div id="edit-sys-menu-rows-dialog" class="dialog-template"></div>
    <div id="add-sys-menu-rows-dialog" class="dialog-template"></div>
    
    <?php echo '
        <script type="text/javascript">
            function deleteSysMenuRows(menuId, applicationId){
                $(\'#sys-menu-id\').val(menuId);
                $(\'#sys-application-id\').val(applicationId);
                $(\'#delete-sys-menu-rows-dialog\').dialog(\'open\');
            }
            
            function editSysMenuRows(menuId, applicationId) {
                $(\'#add-sys-menu-rows-dialog\').empty();
                $(\'#edit-sys-menu-rows-dialog\').load(\''; ?>
<?php echo prep_url(base_url().'/index.php/menurowsmanage/loadmenurowsdata'); ?><?php echo '\', {
                    menuId:          menuId,
                    applicationId:   applicationId
                }, function(){
                    $(\'#edit-sys-menu-rows-dialog\').dialog(\'open\');    
                });    
            }
            
            function closeSysMenuRowsDeleteDialog(){
                $(\'#delete-sys-menu-rows-dialog\').dialog(\'close\');
            }
            
            function deleteSysMenuRowsRecord(){
                $(\'#delete-sys-menu-rows-form\').submit();        
            }
            
            function closeSysMenuRowsEditDialog () {
                $(\'#edit-sys-menu-rows-dialog\').dialog(\'close\');    
            }
            
            function saveSysMenuRowsInfo() {
                
                var data    =   {};
                $(\'#edit-sys-menu-rows-dialog :input, select\').each(function(){
                    data[$(this).attr(\'name\')] = $(this).val();
                })
                
                makeAjaxRequest(\''; ?>
<?php echo prep_url(base_url().'/index.php/menurowsmanage/checkmenurowsdata'); ?><?php echo '\', data, function(json){
                    if(json.result) {
                        $(\'#edit-sys-menu-rows-dialog form\').submit();
                    } else {
                        $(\'#edit-sys-menu-rows-dialog .validatetion-error\').text(\'\');
                        for(index in json.errors) {
                            $(\'#edit-sys-menu-rows-dialog #\' + index + \'_error\').text(json.errors[index]).show();    
                        }
                    }
                })        
            }
            
            function showAddSysMenuRowsDialog(){
                $(\'#edit-sys-menu-rows-dialog\').empty();
                $(\'#add-sys-menu-rows-dialog\').load(\''; ?>
<?php echo prep_url(base_url().'/index.php/menurowsmanage/loadnewmenurowsdata'); ?><?php echo '\', {}, 
                function(){
                    $(\'#add-sys-menu-rows-dialog\').dialog(\'open\');    
                });
                
                return false;
            }
            
            function closeSysMenuRowsAddDialog(){
                $(\'#add-sys-menu-rows-dialog\').dialog(\'close\');
            }
            
            function saveNewSysMenuRowsInfo(){
                var data    =   {};
                $(\'#add-sys-menu-rows-dialog :input, select\').each(function(){
                    data[$(this).attr(\'name\')] = $(this).val();
                })
                
                makeAjaxRequest(\''; ?>
<?php echo prep_url(base_url().'/index.php/menurowsmanage/checkmenurowsdata'); ?><?php echo '\', data, function(json){
                    if(json.result) {
                        $(\'#add-sys-menu-rows-dialog form\').submit();
                    } else {
                        $(\'#add-sys-menu-rows-dialog .validatetion-error\').text(\'\');
                        for(index in json.errors) {
                            $(\'#add-sys-menu-rows-dialog #\' + index + \'_error\').text(json.errors[index]).show();    
                        }
                    }
                })    
            }
        </script>
    '; ?>
