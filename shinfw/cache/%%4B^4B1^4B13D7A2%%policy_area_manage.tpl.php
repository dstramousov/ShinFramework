<?php /* Smarty version 2.6.26, created on 2010-10-15 08:30:12
         compiled from sys_manage/list/policy_area_manage.tpl */ ?>
    <div class="js-includes">
        <?php echo $this->_tpl_vars['cssincludes']; ?>

        <?php echo $this->_tpl_vars['jsincludes']; ?>

        <?php echo $this->_tpl_vars['jsdocready']; ?>

        <?php echo $this->_tpl_vars['jsnondocready']; ?>

    </div>
    
    <div class="sys-manage-controls">
        <a href="" id="add-policy-button"></a>
    </div>
        
    <div class="sys-manage-datatable">
        <?php echo $this->_tpl_vars['policyAreaList']; ?>

    </div>
    
    <div id="delete-policy-dialog" class="dialog-template">
        <form action="<?php echo prep_url(base_url().'/index.php/policyareamanage/deletepolicy'); ?>" method="post" id="delete-policy-form">
            <input type="hidden" name="role-id" value="" id="role-id" />
            <input type="hidden" name="area-id" value="" id="area-id" />
        </form>
        <center><?php echo $this->_tpl_vars['lng_label_sys_user_delete_really']; ?>
</center>
    </div>
    
    <div id="edit-policy-dialog" class="dialog-template"></div>
    <div id="add-policy-dialog" class="dialog-template"></div>
    
    <?php echo '
        <script type="text/javascript">
            function deletePolicy(roleId, areaId){
                $(\'#role-id\').val(roleId);
                $(\'#area-id\').val(areaId);
                $(\'#delete-policy-dialog\').dialog(\'open\');
            }
            
            function editPolicy(roleId, areaId) {
                $(\'#edit-policy-dialog\').load(\''; ?>
<?php echo prep_url(base_url().'/index.php/policyareamanage/loadpolicydata'); ?><?php echo '\', {
                    roleId: roleId,
                    areaId: areaId
                }, function(){
                    $(\'#edit-policy-dialog\').dialog(\'open\');    
                });    
            }
            
            function closePolicyDeleteDialog(){
                $(\'#delete-policy-dialog\').dialog(\'close\');
            }
            
            function deletePolicyRecord(){
                $(\'#delete-policy-form\').submit();        
            }
            
            function closePolicyEditDialog () {
                $(\'#edit-policy-dialog\').dialog(\'close\');    
            }
            
            function savePolicyInfo() {
                var data    =   {};
                $(\'#edit-policy-dialog :input, select\').each(function(){
                    data[$(this).attr(\'name\')] = $(this).val();
                })
                
                makeAjaxRequest(\''; ?>
<?php echo prep_url(base_url().'/index.php/policyareamanage/savepolicyinfo'); ?><?php echo '\', data, function(json){
                    if(json.result) {
                        window.location = \''; ?>
<?php echo prep_url(base_url().'/index.php/sysmanage?tab=ui-tabs-6'); ?><?php echo '\';   
                    } else {
                        $(\'#edit-policy-dialog .validatetion-error\').text(\'\');
                        for(index in json.errors) {
                            $(\'#edit-policy-dialog #\' + index + \'_error\').text(json.errors[index]).show();    
                        }
                    }
                })        
            }
            
            function showAddPolicyDialog(){
                $(\'#add-policy-dialog\').load(\''; ?>
<?php echo prep_url(base_url().'/index.php/policyareamanage/loadnewpolicydata'); ?><?php echo '\', {}, 
                function(){
                    $(\'#add-policy-dialog\').dialog(\'open\');    
                });
                
                return false;
            }
            
            function closePolicyAddDialog(){
                $(\'#add-policy-dialog\').dialog(\'close\');
            }
            
            function saveNewPolicyInfo(){
                var data    =   {};
                $(\'#add-policy-dialog :input, select\').each(function(){
                    data[$(this).attr(\'name\')] = $(this).val();
                })
                
                makeAjaxRequest(\''; ?>
<?php echo prep_url(base_url().'/index.php/policyareamanage/savepolicyinfo'); ?><?php echo '\', data, function(json){
                    if(json.result) {
                        window.location = \''; ?>
<?php echo prep_url(base_url().'/index.php/sysmanage?tab=ui-tabs-6'); ?><?php echo '\';   
                    } else {
                        $(\'#add-policy-dialog .validatetion-error\').text(\'\');
                        for(index in json.errors) {
                            $(\'#add-policy-dialog #\' + index + \'_error\').text(json.errors[index]).show();    
                        }
                    }
                })    
            }
        </script>
    '; ?>
