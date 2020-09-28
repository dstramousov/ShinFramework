<?php /* Smarty version 2.6.26, created on 2010-10-20 11:07:12
         compiled from sys_manage/list/sys_menu_grp_manage.tpl */ ?>
    <div class="js-includes">
        <?php echo $this->_tpl_vars['cssincludes']; ?>

        <?php echo $this->_tpl_vars['jsincludes']; ?>

        <?php echo $this->_tpl_vars['jsdocready']; ?>

        <?php echo $this->_tpl_vars['jsnondocready']; ?>

    </div>
    
    <div class="sys-manage-controls">
        <a href="" id="add-sys-menu-grp-button"></a>
    </div>
        
    <div class="sys-manage-datatable">
        <?php echo $this->_tpl_vars['menuGrpList']; ?>

    </div>
    
    <div id="delete-sys-menu-grp-dialog" class="dialog-template">
        <form action="<?php echo prep_url(base_url().'/index.php/menugrpmanage/deletemenugrp'); ?>" method="post" id="delete-sys-menu-grp-form">
            <input type="hidden" name="sys-menu-id" value="" id="sys-menu-id" />
            <input type="hidden" name="sys-grp-id" value="" id="sys-grp-id" />
            <input type="hidden" name="sys-panel-id" value="" id="sys-panel-id" />
        </form>
        <center><?php echo $this->_tpl_vars['lng_label_sys_user_delete_really']; ?>
</center>
    </div>
    
    <div id="edit-sys-menu-grp-dialog" class="dialog-template"></div>
    <div id="add-sys-menu-grp-dialog" class="dialog-template"></div>
    
    <?php echo '
        <script type="text/javascript">
            function deleteSysMenuGrp(menuId, grpId, panelId){
                $(\'#sys-menu-id\').val(menuId);
                $(\'#sys-grp-id\').val(grpId);
                $(\'#sys-panel-id\').val(panelId);
                $(\'#delete-sys-menu-grp-dialog\').dialog(\'open\');
            }
            
            function editSysMenuGrp(menuId, grpId, panelId) {
                $(\'#add-sys-menu-grp-dialog\').empty();
                $(\'#edit-sys-menu-grp-dialog\').load(\''; ?>
<?php echo prep_url(base_url().'/index.php/menugrpmanage/loadmenugrpdata'); ?><?php echo '\', {
                    menuId:  menuId,
                    grpId:   grpId,
                    panelId: panelId
                }, function(){
                    $(\'#edit-sys-menu-grp-dialog\').dialog(\'open\');    
                });    
            }
            
            function closeSysMenuGrpDeleteDialog(){
                $(\'#delete-sys-menu-grp-dialog\').dialog(\'close\');
            }
            
            function deleteSysMenuGrpRecord(){
                $(\'#delete-sys-menu-grp-form\').submit();        
            }
            
            function closeSysMenuGrpEditDialog () {
                $(\'#edit-sys-menu-grp-dialog\').dialog(\'close\');    
            }
            
            function saveSysMenuGrpInfo() {
                
                var data    =   {};
                $(\'#edit-sys-menu-grp-dialog :input, select\').each(function(){
                    data[$(this).attr(\'name\')] = $(this).val();
                })
                
                makeAjaxRequest(\''; ?>
<?php echo prep_url(base_url().'/index.php/menugrpmanage/checkmenugrpdata'); ?><?php echo '\', data, function(json){
                    if(json.result) {
                        $(\'#edit-sys-menu-grp-dialog form\').submit();
                    } else {
                        $(\'#edit-sys-menu-grp-dialog .validatetion-error\').text(\'\');
                        for(index in json.errors) {
                            $(\'#edit-sys-menu-grp-dialog #\' + index + \'_error\').text(json.errors[index]).show();    
                        }
                    }
                })        
            }
            
            function showAddSysMenuGrpDialog(){
                $(\'#edit-sys-menu-grp-dialog\').empty();
                $(\'#add-sys-menu-grp-dialog\').load(\''; ?>
<?php echo prep_url(base_url().'/index.php/menugrpmanage/loadnewmenugrpdata'); ?><?php echo '\', {}, 
                function(){
                    $(\'#add-sys-menu-grp-dialog\').dialog(\'open\');    
                });
                
                return false;
            }
            
            function closeSysMenuGrpAddDialog(){
                $(\'#add-sys-menu-grp-dialog\').dialog(\'close\');
            }
            
            function saveNewSysMenuGrpInfo(){
                var data    =   {};
                $(\'#add-sys-menu-grp-dialog :input, select\').each(function(){
                    data[$(this).attr(\'name\')] = $(this).val();
                })
                
                makeAjaxRequest(\''; ?>
<?php echo prep_url(base_url().'/index.php/menugrpmanage/checkmenugrpdata'); ?><?php echo '\', data, function(json){
                    if(json.result) {
                        $(\'#add-sys-menu-grp-dialog form\').submit();
                    } else {
                        $(\'#add-sys-menu-grp-dialog .validatetion-error\').text(\'\');
                        for(index in json.errors) {
                            $(\'#add-sys-menu-grp-dialog #\' + index + \'_error\').text(json.errors[index]).show();    
                        }
                    }
                })    
            }
        </script>
    '; ?>
