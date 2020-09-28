<?php /* Smarty version 2.6.26, created on 2010-10-13 15:42:08
         compiled from sys_manage/list/sys_sub_area_manage.tpl */ ?>
    <div class="js-includes">
        <?php echo $this->_tpl_vars['cssincludes']; ?>

        <?php echo $this->_tpl_vars['jsincludes']; ?>

        <?php echo $this->_tpl_vars['jsdocready']; ?>

        <?php echo $this->_tpl_vars['jsnondocready']; ?>

    </div>
    
    <div class="sys-manage-controls">
        <a href="" id="add-sub-area-button"></a>
    </div>
        
    <div class="sys-manage-datatable">
        <?php echo $this->_tpl_vars['sysSubAreaList']; ?>

    </div>
    
    <div id="delete-sys-sub-area-dialog" class="dialog-template">
        <form action="<?php echo prep_url(base_url().'/index.php/subareamanage/deletesubarea'); ?>" method="post" id="delete-sys-sub-area-form">
            <input type="hidden" name="sys-sub-area-id" value="" id="sys-sub-area-id" />
            <input type="hidden" name="sys-area-id" value="" id="sys-area-id" />
        </form>
        <center><?php echo $this->_tpl_vars['lng_label_sys_user_delete_really']; ?>
</center>
    </div>
    
    <div id="edit-sys-sub-area-dialog" class="dialog-template"></div>
    <div id="add-sys-sub-area-dialog" class="dialog-template"></div>
    
    <?php echo '
        <script type="text/javascript">
            function deleteSysSubArea(areaId, subAreaId){
                $(\'#sys-area-id\').val(areaId);
                $(\'#sys-sub-area-id\').val(subAreaId);
                $(\'#delete-sys-sub-area-dialog\').dialog(\'open\');
            }
            
            function editSysSubArea(areaId, subAreaId) {
                $(\'#edit-sys-sub-area-dialog\').load(\''; ?>
<?php echo prep_url(base_url().'/index.php/subareamanage/loadsubareadata'); ?><?php echo '\', {
                    areaId:    areaId, 
                    subAreaId: subAreaId
                }, function(){
                    $(\'#edit-sys-sub-area-dialog\').dialog(\'open\');    
                });    
            }
            
            function closeSysSubAreaDeleteDialog(){
                $(\'#delete-sys-sub-area-dialog\').dialog(\'close\');
            }
            
            function deleteSysSubAreaRecord(){
                $(\'#delete-sys-sub-area-form\').submit();        
            }
            
            function closeSysSubAreaEditDialog () {
                $(\'#edit-sys-sub-area-dialog\').dialog(\'close\');    
            }
            
            function saveSysSubAreaInfo() {
                var data    =   {};
                $(\'#edit-sys-sub-area-dialog :input, select\').each(function(){
                    data[$(this).attr(\'name\')] = $(this).val();
                })
                
                makeAjaxRequest(\''; ?>
<?php echo prep_url(base_url().'/index.php/subareamanage/savesubareainfo'); ?><?php echo '\', data, function(json){
                    if(json.result) {
                        window.location = \''; ?>
<?php echo prep_url(base_url().'/index.php/sysmanage?tab=ui-tabs-4'); ?><?php echo '\';   
                    } else {
                        $(\'#edit-sys-sub-area-dialog .validatetion-error\').text(\'\');
                        for(index in json.errors) {
                            $(\'#edit-sys-sub-area-dialog #\' + index + \'_error\').text(json.errors[index]).show();    
                        }
                    }
                })        
            }
            
            function showAddSysSubAreaDialog(){
                $(\'#add-sys-sub-area-dialog\').load(\''; ?>
<?php echo prep_url(base_url().'/index.php/subareamanage/loadnewsubareadata'); ?><?php echo '\', {}, 
                function(){
                    $(\'#add-sys-sub-area-dialog\').dialog(\'open\');    
                });
                
                return false;
            }
            
            function closeSysSubAreaAddDialog(){
                $(\'#add-sys-sub-area-dialog\').dialog(\'close\');
            }
            
            function saveNewSysSubAreaInfo(){
                var data    =   {};
                $(\'#add-sys-sub-area-dialog :input, select\').each(function(){
                    data[$(this).attr(\'name\')] = $(this).val();
                })
                
                makeAjaxRequest(\''; ?>
<?php echo prep_url(base_url().'/index.php/subareamanage/savenewsubareainfo'); ?><?php echo '\', data, function(json){
                    if(json.result) {
                        window.location = \''; ?>
<?php echo prep_url(base_url().'/index.php/sysmanage?tab=ui-tabs-4'); ?><?php echo '\';   
                    } else {
                        $(\'#add-sys-sub-area-dialog .validatetion-error\').text(\'\');
                        for(index in json.errors) {
                            $(\'#add-sys-sub-area-dialog #\' + index + \'_error\').text(json.errors[index]).show();    
                        }
                    }
                })    
            }
        </script>
    '; ?>
