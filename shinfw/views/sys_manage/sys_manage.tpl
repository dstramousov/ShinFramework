    <div class="sys-user-messages">
        {$jsSysUserMessages}
        {$jsSysUserErrors}
    </div>
    
    <div class="sys-manage-controls">
        <a href="" id="add-button"></a>
    </div>
        
    <div class="sys-manage-datatable">
        {$sysUserList}
    </div>
    
    <div id="delete-sys-user-dialog">
        <form action="{php}echo prep_url(base_url().'/usermanage/deleteuser');{/php}" method="post" id="delete-sys-user-form">
            <input type="hidden" name="sys-user-id" value="" id="sys-user-id" />
        </form>
        <center>{$lng_label_sys_user_delete_really}</center>
    </div>
    
    <div id="edit-sys-user-dialog"></div>
    <div id="add-sys-user-dialog"></div>
    
    {literal}
        <script type="text/javascript">
            function deleteSysUser(userId){
                $('#sys-user-id').val(userId);
                $('#delete-sys-user-dialog').dialog('open');
            }
            
            function editSysUser(userId) {
                $('#edit-sys-user-dialog').load('{/literal}{php}echo prep_url(base_url().'/usermanage/loaduserdata');{/php}{literal}', {
                    userId: userId
                }, function(){
                    $('#edit-sys-user-dialog').dialog('open');    
                });    
            }
            
            function closeDeleteDialog(){
                $('#delete-sys-user-dialog').dialog('close');
            }
            
            function deleteSysUserRecord(){
                $('#delete-sys-user-form').submit();        
            }
            
            function closeSysUserEditDialog () {
                $('#edit-sys-user-dialog').dialog('close');    
            }
            
            function saveSysUserInfo() {
                var data    =   {};
                $('#edit-sys-user-dialog :input, select').each(function(){
                    data[$(this).attr('name')] = $(this).val();
                })
                
                makeAjaxRequest('{/literal}{php}echo prep_url(base_url().'/usermanage/saveuserinfo');{/php}{literal}', data, function(json){
                    if(json.result) {
                        window.location = '{/literal}{php}echo prep_url(base_url().'/usermanage?tab=tabs-1');{/php}{literal}';   
                    } else {
                        $('#edit-sys-user-dialog .validatetion-error').text('');
                        for(index in json.errors) {
                            $('#edit-sys-user-dialog #' + index + '_error').text(json.errors[index]).show();    
                        }
                    }
                })        
            }
            
            function showAddSysUserDialog(){
                $('#add-sys-user-dialog').load('{/literal}{php}echo prep_url(base_url().'/usermanage/loadnewuserdata');{/php}{literal}', {}, 
                function(){
                    $('#add-sys-user-dialog').dialog('open');    
                });
                
                return false;
            }
            
            function closeSysUserAddDialog(){
                $('#add-sys-user-dialog').dialog('close');
            }
            
            function saveNewSysUserInfo(){
                var data    =   {};
                $('#add-sys-user-dialog :input, select').each(function(){
                    data[$(this).attr('name')] = $(this).val();
                })
                
                makeAjaxRequest('{/literal}{php}echo prep_url(base_url().'/usermanage/saveuserinfo');{/php}{literal}', data, function(json){
                    if(json.result) {
                        window.location = '{/literal}{php}echo prep_url(base_url().'/usermanage?tab=tabs-1');{/php}{literal}';   
                    } else {
                        $('#add-sys-user-dialog .validatetion-error').text('');
                        for(index in json.errors) {
                            $('#add-sys-user-dialog #' + index + '_error').text(json.errors[index]).show();    
                        }
                    }
                })    
            }
            
            function makeAjaxRequest(url, data, callback, type){
                    
                    var type = type != undefined ? type : 'json';
                     
                    $.ajax({
                               type:        "POST",
                               url:         url,
                               data:        data,
                               dataType:    type,
                               success:     callback,
                               beforeSend:  function(){
                                             
                               },
                               complete:    function(){
                                                    
                               }
                           });
                }
        </script>
    {/literal}
