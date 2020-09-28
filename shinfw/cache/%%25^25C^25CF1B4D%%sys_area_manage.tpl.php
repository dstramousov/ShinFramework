<?php /* Smarty version 2.6.26, created on 2010-10-15 12:53:54
         compiled from sys_manage/list/sys_area_manage.tpl */ ?>
    <div class="js-includes">
        <?php echo $this->_tpl_vars['cssincludes']; ?>

        <?php echo $this->_tpl_vars['jsincludes']; ?>

        <?php echo $this->_tpl_vars['jsdocready']; ?>

        <?php echo $this->_tpl_vars['jsnondocready']; ?>

    </div>
    
    <div class="sys-manage-controls">
        <a href="" id="add-area-button"></a>
    </div>
        
    <div class="sys-manage-datatable">
        <?php echo $this->_tpl_vars['sysAreaList']; ?>

    </div>
    
    <div id="delete-sys-area-dialog" class="dialog-template">
        <form action="<?php echo prep_url(base_url().'/index.php/areamanage/deletearea'); ?>" method="post" id="delete-sys-area-form">
            <input type="hidden" name="sys-area-id" value="" id="sys-area-id" />
        </form>
        <center><?php echo $this->_tpl_vars['lng_label_sys_user_delete_really']; ?>
</center>
    </div>
    
    <div id="edit-sys-area-dialog" class="dialog-template"></div>
    <div id="add-sys-area-dialog" class="dialog-template"></div>
    
    <?php echo '
        <script type="text/javascript">
            function deleteSysArea(areaId){
                $(\'#sys-area-id\').val(areaId);
                $(\'#delete-sys-area-dialog\').dialog(\'open\');
            }
            
            function editSysArea(areaId) {
                $(\'#edit-sys-area-dialog\').load(\''; ?>
<?php echo prep_url(base_url().'/index.php/areamanage/loadareadata'); ?><?php echo '\', {
                    areaId: areaId
                }, function(){
                    $(\'#edit-sys-area-dialog\').dialog(\'open\');    
                });    
            }
            
            function closeSysAreaDeleteDialog(){
                $(\'#delete-sys-area-dialog\').dialog(\'close\');
            }
            
            function deleteSysAreaRecord(){
                $(\'#delete-sys-area-form\').submit();        
            }
            
            function closeSysAreaEditDialog () {
                $(\'#edit-sys-area-dialog\').dialog(\'close\');    
            }
            
            function saveSysAreaInfo() {
                var data    =   {};
                $(\'#edit-sys-area-dialog :input, select\').each(function(){
                    data[$(this).attr(\'name\')] = $(this).val();
                })
                
                makeAjaxRequest(\''; ?>
<?php echo prep_url(base_url().'/index.php/areamanage/saveareainfo'); ?><?php echo '\', data, function(json){
                    if(json.result) {
                        window.location = \''; ?>
<?php echo prep_url(base_url().'/index.php/sysmanage?tab=ui-tabs-3'); ?><?php echo '\';   
                    } else {
                        $(\'#edit-sys-area-dialog .validatetion-error\').text(\'\');
                        for(index in json.errors) {
                            $(\'#edit-sys-area-dialog #\' + index + \'_error\').text(json.errors[index]).show();    
                        }
                    }
                })        
            }
            
            function showAddSysAreaDialog(){
                $(\'#add-sys-area-dialog\').load(\''; ?>
<?php echo prep_url(base_url().'/index.php/areamanage/loadnewareadata'); ?><?php echo '\', {}, 
                function(){
                    $(\'#add-sys-area-dialog\').dialog(\'open\');    
                });
                
                return false;
            }
            
            function closeSysAreaAddDialog(){
                $(\'#add-sys-area-dialog\').dialog(\'close\');
            }
            
            function saveNewSysAreaInfo(){
                var data    =   {};
                $(\'#add-sys-area-dialog :input, select\').each(function(){
                    data[$(this).attr(\'name\')] = $(this).val();
                })
                
                makeAjaxRequest(\''; ?>
<?php echo prep_url(base_url().'/index.php/areamanage/savenewareainfo'); ?><?php echo '\', data, function(json){
                    if(json.result) {
                        window.location = \''; ?>
<?php echo prep_url(base_url().'/index.php/sysmanage?tab=ui-tabs-3'); ?><?php echo '\';   
                    } else {
                        $(\'#add-sys-area-dialog .validatetion-error\').text(\'\');
                        for(index in json.errors) {
                            $(\'#add-sys-area-dialog #\' + index + \'_error\').text(json.errors[index]).show();    
                        }
                    }
                })    
            }
        </script>
    '; ?>
