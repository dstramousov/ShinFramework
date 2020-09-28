<?php /* Smarty version 2.6.26, created on 2010-10-13 15:42:07
         compiled from sys_manage/list/sys_application_manage.tpl */ ?>
    <div class="js-includes">
        <?php echo $this->_tpl_vars['cssincludes']; ?>

        <?php echo $this->_tpl_vars['jsincludes']; ?>

        <?php echo $this->_tpl_vars['jsdocready']; ?>

        <?php echo $this->_tpl_vars['jsnondocready']; ?>

    </div>
    
    <div class="sys-manage-controls">
        <a href="" id="add-struct-application-button"></a>
    </div>
        
    <div class="sys-manage-datatable">
        <?php echo $this->_tpl_vars['applicationList']; ?>

    </div>
    
    <div id="delete-struct-application-dialog" class="dialog-template">
        <form action="<?php echo prep_url(base_url().'/index.php/applicationmanage/deleteapplication'); ?>" method="post" id="delete-struct-application-form">
            <input type="hidden" name="application-id" value="" id="application-id" />
        </form>
        <center><?php echo $this->_tpl_vars['lng_label_sys_user_delete_really']; ?>
</center>
    </div>
    
    <div id="edit-struct-application-dialog" class="dialog-template"></div>
    <div id="add-struct-application-dialog" class="dialog-template"></div>
    
    <?php echo '
        <script type="text/javascript">
        
            function deleteStructApplication(applicationId){
                $(\'#application-id\').val(applicationId);
                $(\'#delete-struct-application-dialog\').dialog(\'open\');
            }
            
            function editStructApplication(applicationId) {
                $(\'#add-struct-application-dialog\').empty();
                $(\'#edit-struct-application-dialog\').load(\''; ?>
<?php echo prep_url(base_url().'/index.php/applicationmanage/loadapplicationdata'); ?><?php echo '\', {
                    applicationId: applicationId
                }, function(){
                    $(\'#edit-struct-application-dialog\').dialog(\'open\');    
                });    
            }
            
            function closeStructApplicationDeleteDialog(){
                $(\'#delete-struct-application-dialog\').dialog(\'close\');
            }
            
            function deleteStructApplicationRecord(){
                $(\'#delete-struct-application-form\').submit();        
            }
            
            function closeStructApplicationEditDialog () {
                $(\'#edit-struct-application-dialog\').dialog(\'close\');    
            }
            
            function saveStructApplicationInfo() {
                var data    =   {};
                $(\'#edit-struct-application-dialog :input, select\').each(function(){
                    data[$(this).attr(\'name\')] = $(this).val();
                })
                
                makeAjaxRequest(\''; ?>
<?php echo prep_url(base_url().'/index.php/applicationmanage/saveapplicationinfo'); ?><?php echo '\', data, function(json){
                    if(json.result) {
                        window.location = \''; ?>
<?php echo prep_url(base_url().'/index.php/sysmanage?tab=ui-tabs-5'); ?><?php echo '\';   
                    } else {
                        $(\'#edit-struct-application-dialog .validatetion-error\').text(\'\');
                        for(index in json.errors) {
                            $(\'#edit-struct-application-dialog #\' + index + \'_error\').text(json.errors[index]).show();    
                        }
                    }
                })        
            }
            
            function showAddStructApplicationDialog(){
                $(\'#edit-struct-application-dialog\').empty();
                $(\'#add-struct-application-dialog\').load(\''; ?>
<?php echo prep_url(base_url().'/index.php/applicationmanage/loadnewapplicationdata'); ?><?php echo '\', {}, 
                function(){
                    $(\'#add-struct-application-dialog\').dialog(\'open\');    
                });
                
                return false;
            }
            
            function closeStructApplicationAddDialog(){
                $(\'#add-struct-application-dialog\').dialog(\'close\');
            }
            
            function saveNewStructApplicationInfo(){
                var data    =   {};
                $(\'#add-struct-application-dialog :input, select\').each(function(){
                    data[$(this).attr(\'name\')] = $(this).val();
                })
                
                makeAjaxRequest(\''; ?>
<?php echo prep_url(base_url().'/index.php/applicationmanage/saveapplicationinfo'); ?><?php echo '\', data, function(json){
                    if(json.result) {
                        window.location = \''; ?>
<?php echo prep_url(base_url().'/index.php/sysmanage?tab=ui-tabs-5'); ?><?php echo '\';   
                    } else {
                        $(\'#add-struct-application-dialog .validatetion-error\').text(\'\');
                        for(index in json.errors) {
                            $(\'#add-struct-application-dialog #\' + index + \'_error\').text(json.errors[index]).show();    
                        }
                    }
                })    
            }
        </script>
    '; ?>
