    <div class="js-includes">
        {$cssincludes}
        {$jsincludes}
        {$jsdocready}
        {$jsnondocready}
    </div>
    
    <div class="sys-manage-controls">
        <a href="" id="add-shin-user-button"></a>
    </div>
        
    <div class="sys-manage-datatable">
        {$shinTicketList}
    </div>
    
    <div id="delete-shinticket-user-dialog" class="dialog-template">
        <form action="{php}echo prep_url(base_url().'/index.php/shinticketusermanage/deleteuser');{/php}" method="post" id="delete-shinticket-user-form">
            <input type="hidden" name="sys-user-id" value="" id="sys-user-id" />
            <input type="hidden" name="shinticket-customer-id" value="" id="shinticket-customer-id" />
        </form>
        <center>{$lng_label_sys_user_delete_really}</center>
    </div>
    
    <div id="edit-shinticket-user-dialog" class="dialog-template"></div>
    <div id="add-shinticket-user-dialog" class="dialog-template"></div>
    
    {literal}
        <script type="text/javascript">
            function deleteShinticketUser(userId, customerId){
                $('#sys-user-id').val(userId);
                $('#shinticket-customer-id').val(customerId);
                $('#delete-shinticket-user-dialog').dialog('open');
            }
            
            function editShinticketUser(userId, customerId) {
                $('#edit-shinticket-user-dialog').load('{/literal}{php}echo prep_url(base_url().'/index.php/shinticketusermanage/loaduserdata');{/php}{literal}', {
                    userId:     userId,
                    customerId: customerId
                }, function(){
                    $('#edit-shinticket-user-dialog').dialog('open');    
                });    
            }
            
            function closeDeleteDialog(){
                $('#delete-shinticket-user-dialog').dialog('close');
            }
            
            function deleteShinticketUserRecord(){
                $('#delete-shinticket-user-form').submit();        
            }
            
            function closeShinticketUserEditDialog () {
                $('#edit-shinticket-user-dialog').dialog('close');    
            }
            
            function saveShinticketUserInfo() {
                var data    =   {};
                $('#edit-shinticket-user-dialog :input, select').each(function(){
                    data[$(this).attr('name')] = $(this).val();
                })
                
                makeAjaxRequest('{/literal}{php}echo prep_url(base_url().'/index.php/shinticketusermanage/saveuserinfo');{/php}{literal}', data, function(json){
                    if(json.result) {
                        window.location = '{/literal}{php}echo prep_url(base_url().'/index.php/sysmanage?tab=ui-tabs-13');{/php}{literal}';   
                    } else {
                        $('#edit-shinticket-user-dialog .validatetion-error').text('');
                        for(index in json.errors) {
                            $('#edit-shinticket-user-dialog #' + index + '_error').text(json.errors[index]).show();    
                        }
                    }
                })        
            }
            
            function showAddShinticketUserDialog(){
                $('#add-shinticket-user-dialog').load('{/literal}{php}echo prep_url(base_url().'/index.php/shinticketusermanage/loadnewuserdata');{/php}{literal}', {}, 
                function(){
                    $('#add-shinticket-user-dialog').dialog('open');    
                });
                
                return false;
            }
            
            function closeShinticketUserAddDialog(){
                $('#add-shinticket-user-dialog').dialog('close');
            }
            
            function saveNewShinticketUserInfo(){
                var data    =   {};
                $('#add-shinticket-user-dialog :input, select').each(function(){
                    data[$(this).attr('name')] = $(this).val();
                })
                
                makeAjaxRequest('{/literal}{php}echo prep_url(base_url().'/index.php/shinticketusermanage/saveuserinfo');{/php}{literal}', data, function(json){
                    if(json.result) {
                        window.location = '{/literal}{php}echo prep_url(base_url().'/index.php/sysmanage?tab=ui-tabs-13');{/php}{literal}';   
                    } else {
                        $('#add-shinticket-user-dialog .validatetion-error').text('');
                        for(index in json.errors) {
                            $('#add-shinticket-user-dialog #' + index + '_error').text(json.errors[index]).show();    
                        }
                    }
                })    
            }
        </script>
    {/literal}
