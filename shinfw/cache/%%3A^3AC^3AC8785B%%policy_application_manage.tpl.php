<?php /* Smarty version 2.6.26, created on 2010-10-19 09:05:18
         compiled from sys_manage/list/policy_application_manage.tpl */ ?>
    <div class="js-includes">
        <?php echo $this->_tpl_vars['cssincludes']; ?>

        <?php echo $this->_tpl_vars['jsincludes']; ?>

        <?php echo $this->_tpl_vars['jsdocready']; ?>

        <?php echo $this->_tpl_vars['jsnondocready']; ?>

    </div>
    
    <div class="sys-manage-controls">
        <a href="" id="add-policy-application-button"></a>
    </div>
        
    <div class="sys-manage-datatable">
        <?php echo $this->_tpl_vars['policyApplicationList']; ?>

    </div>
    
    <div id="delete-policy-application-dialog" class="dialog-template">
        <form action="<?php echo prep_url(base_url().'/index.php/policyapplicationmanage/deleteapplication'); ?>" method="post" id="delete-policy-application-form">
            <input type="hidden" name="elem-id" value="" id="elem-id" />
        </form>
        <center><?php echo $this->_tpl_vars['lng_label_sys_user_delete_really']; ?>
</center>
    </div>
    
    <div id="edit-policy-application-dialog" class="dialog-template"></div>
    <div id="add-policy-application-dialog" class="dialog-template"></div>
    
    <?php echo '
        <script type="text/javascript">
            function deletePolicyApplication(elemId){
                $(\'#elem-id\').val(elemId);
                $(\'#delete-policy-application-dialog\').dialog(\'open\');
            }
            
            function editPolicyApplication(elemId) {
                $(\'#add-policy-application-dialog\').empty();
                $(\'#edit-policy-application-dialog\').load(\''; ?>
<?php echo prep_url(base_url().'/index.php/policyapplicationmanage/loadapplicationdata'); ?><?php echo '\', {
                    elemId:     elemId,
                }, function(){
                    $(\'#edit-policy-application-dialog\').dialog(\'open\');    
                });    
            }
            
            function closePolicyApplicationDeleteDialog(){
                $(\'#delete-policy-application-dialog\').dialog(\'close\');
            }
            
            function deletePolicyApplicationRecord(){
                $(\'#delete-policy-application-form\').submit();        
            }
            
            function closePolicyApplicationEditDialog () {
                $(\'#edit-policy-application-dialog\').dialog(\'close\');    
            }
            
            function savePolicyApplicationInfo() {
                var data    =   {};
                $(\'#edit-policy-application-dialog :input, select\').each(function(){
                    data[$(this).attr(\'name\')] = $(this).val();
                })
                
                makeAjaxRequest(\''; ?>
<?php echo prep_url(base_url().'/index.php/policyapplicationmanage/saveapplicationinfo'); ?><?php echo '\', data, function(json){
                    if(json.result) {
                        window.location = \''; ?>
<?php echo prep_url(base_url().'/index.php/sysmanage?tab=ui-tabs-8'); ?><?php echo '\';   
                    } else {
                        $(\'#edit-policy-application-dialog .validatetion-error\').text(\'\');
                        for(index in json.errors) {
                            $(\'#edit-policy-application-dialog #\' + index + \'_error\').text(json.errors[index]).show();    
                        }
                    }
                })        
            }
            
            function showAddPolicyApplicationDialog(){
                $(\'#edit-policy-application-dialog\').empty();
                $(\'#add-policy-application-dialog\').load(\''; ?>
<?php echo prep_url(base_url().'/index.php/policyapplicationmanage/loadnewapplicationdata'); ?><?php echo '\', {}, 
                function(){
                    $(\'#add-policy-application-dialog\').dialog(\'open\');    
                });
                
                return false;
            }
            
            function closePolicyApplicationAddDialog(){
                $(\'#add-policy-application-dialog\').dialog(\'close\');
            }
            
            function saveNewPolicyApplicationInfo(){
                var data    =   {};
                $(\'#add-policy-application-dialog :input, select\').each(function(){
                    data[$(this).attr(\'name\')] = $(this).val();
                })
                
                makeAjaxRequest(\''; ?>
<?php echo prep_url(base_url().'/index.php/policyapplicationmanage/saveapplicationinfo'); ?><?php echo '\', data, function(json){
                    if(json.result) {
                        window.location = \''; ?>
<?php echo prep_url(base_url().'/index.php/sysmanage?tab=ui-tabs-8'); ?><?php echo '\';   
                    } else {
                        $(\'#add-policy-application-dialog .validatetion-error\').text(\'\');
                        for(index in json.errors) {
                            $(\'#add-policy-application-dialog #\' + index + \'_error\').text(json.errors[index]).show();    
                        }
                    }
                })    
            }
        </script>
    '; ?>
