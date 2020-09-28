<?php /* Smarty version 2.6.26, created on 2010-10-19 09:05:16
         compiled from sys_manage/list/policy_sub_area_manage.tpl */ ?>
    <div class="js-includes">
        <?php echo $this->_tpl_vars['cssincludes']; ?>

        <?php echo $this->_tpl_vars['jsincludes']; ?>

        <?php echo $this->_tpl_vars['jsdocready']; ?>

        <?php echo $this->_tpl_vars['jsnondocready']; ?>

    </div>
    
    <div class="sys-manage-controls">
        <a href="" id="add-sub-policy-button"></a>
    </div>
        
    <div class="sys-manage-datatable">
        <?php echo $this->_tpl_vars['policySubAreaList']; ?>

    </div>
    
    <div id="delete-sub-policy-dialog" class="dialog-template">
        <form action="<?php echo prep_url(base_url().'/index.php/policysubareamanage/deletesubpolicy'); ?>" method="post" id="delete-sub-policy-form">
            <input type="hidden" name="role-id" value="" id="role-id" />
            <input type="hidden" name="area-id" value="" id="area-id" />
            <input type="hidden" name="sub-area-id" value="" id="sub-area-id" />
        </form>
        <center><?php echo $this->_tpl_vars['lng_label_sys_user_delete_really']; ?>
</center>
    </div>
    
    <div id="edit-sub-policy-dialog" class="dialog-template"></div>
    <div id="add-sub-policy-dialog" class="dialog-template"></div>
    
    <?php echo '
        <script type="text/javascript">
            function deleteSubPolicy(roleId, areaId, subAreaId){
                $(\'#role-id\').val(roleId);
                $(\'#area-id\').val(areaId);
                $(\'#sub-area-id\').val(subAreaId);
                
                $(\'#delete-sub-policy-dialog\').dialog(\'open\');
            }
            
            function editSubPolicy(roleId, areaId, subAreaId) {
                $(\'#add-sub-policy-dialog\').empty();
                $(\'#edit-sub-policy-dialog\').load(\''; ?>
<?php echo prep_url(base_url().'/index.php/policysubareamanage/loadpolicydata'); ?><?php echo '\', {
                    roleId:     roleId,
                    areaId:     areaId,
                    subAreaId:  subAreaId
                }, function(){
                    $(\'#edit-sub-policy-dialog\').dialog(\'open\');    
                });    
            }
            
            function closeSubPolicyDeleteDialog(){
                $(\'#delete-sub-policy-dialog\').dialog(\'close\');
            }
            
            function deleteSubPolicyRecord(){
                $(\'#delete-sub-policy-form\').submit();        
            }
            
            function closeSubPolicyEditDialog () {
                $(\'#edit-sub-policy-dialog\').dialog(\'close\');    
            }
            
            function saveSubPolicyInfo() {
                var data    =   {};
                $(\'#edit-sub-policy-dialog :input, select\').each(function(){
                    data[$(this).attr(\'name\')] = $(this).val();
                })
                
                makeAjaxRequest(\''; ?>
<?php echo prep_url(base_url().'/index.php/policysubareamanage/savepolicyinfo'); ?><?php echo '\', data, function(json){
                    if(json.result) {
                        window.location = \''; ?>
<?php echo prep_url(base_url().'/index.php/sysmanage?tab=ui-tabs-7'); ?><?php echo '\';   
                    } else {
                        $(\'#edit-sub-policy-dialog .validatetion-error\').text(\'\');
                        for(index in json.errors) {
                            $(\'#edit-sub-policy-dialog #\' + index + \'_error\').text(json.errors[index]).show();    
                        }
                    }
                })        
            }
            
            function showAddSubPolicyDialog(){
                $(\'#edit-sub-policy-dialog\').empty();
                $(\'#add-sub-policy-dialog\').load(\''; ?>
<?php echo prep_url(base_url().'/index.php/policysubareamanage/loadnewpolicydata'); ?><?php echo '\', {}, 
                function(){
                    $(\'#add-sub-policy-dialog\').dialog(\'open\');    
                });
                
                return false;
            }
            
            function closeSubPolicyAddDialog(){
                $(\'#add-sub-policy-dialog\').dialog(\'close\');
            }
            
            function saveNewSubPolicyInfo(){
                var data    =   {};
                $(\'#add-sub-policy-dialog :input, select\').each(function(){
                    data[$(this).attr(\'name\')] = $(this).val();
                })
                
                makeAjaxRequest(\''; ?>
<?php echo prep_url(base_url().'/index.php/policysubareamanage/savepolicyinfo'); ?><?php echo '\', data, function(json){
                    if(json.result) {
                        window.location = \''; ?>
<?php echo prep_url(base_url().'/index.php/sysmanage?tab=ui-tabs-7'); ?><?php echo '\';   
                    } else {
                        $(\'#add-sub-policy-dialog .validatetion-error\').text(\'\');
                        for(index in json.errors) {
                            $(\'#add-sub-policy-dialog #\' + index + \'_error\').text(json.errors[index]).show();    
                        }
                    }
                })    
            }
        </script>
    '; ?>
