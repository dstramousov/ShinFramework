{include file="header.tpl"}

<body id="page">

<fieldset>
	<legend>&nbsp;&nbsp;<b>{$lng_label_tools_fw_menu}</b>&nbsp;&nbsp;</legend>
	{include file="main_menu.tpl"}

</fieldset>

<br/>

<fieldset>
	<legend>&nbsp;&nbsp;<b>{$lng_label_tools_ppfm_menu}</b>&nbsp;&nbsp;</legend>
	{include file="ppfm_menu.tpl"}

</fieldset>

<br/>

    <br/>
        <div id="page-errors">
            <div class="b-messages">{$messages}</div>
            <div class="b-errors">{$errors}</div>
            <div class="b-messages">{$jsMessages}</div>
            <div class="b-errors">{$jsErrors}</div>
        </div>
        <br />
        <div id="tabs">
            <ul>
                <li><a href="#tabs-1">{$lng_label_user_tab}</a></li>
                {if $user->name == 'admin'}
                <li><a href="#tabs-2">{$lng_label_system_tab}</a></li>
                {/if}
            </ul>
            <div id="tabs-1">
                <form method="post" id="generalInfo">
                    <input type="hidden" name="action" value="general-info">
                    <fieldset>
                        <legend>{$lng_label_managment_general_info}</legend>
                            <table>
                                <tr>
                                    <td>{$lng_label_managment_current_theme}</td>
                                    <td>
                                        <select name="user_theme">
                                            {html_options values=$themes output=$themes selected=$user->theme}
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>{$lng_label_managment_current_lang}</td>
                                    <td>
                                        <select name="user_lang">
                                            {html_options values=$langs output=$langs selected=$user->lang}
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <input type="submit" value="{$lng_label_usermanage_page_save_btn}">
                                    </td>
                                </tr>
                            </table>
                    </fieldset>
                </form>
                <form method="post" id="userPass" name="user-pass">
                    <input type="hidden" name="action" value="user-pass">
                    <fieldset>
                        <legend>{$lng_label_managment_change_pass}</legend>
                        <table>
                            <tr>
                                <td>{$lng_label_managment_old_pass}</td>
                                <td><input type="password" value="" name="user_old_pass" id="user_old_pass" /></td>
                            </tr>
                            <tr>
                                <td>{$lng_label_managment_new_pass}</td>
                                <td><input type="password" value="" name="user_new_pass" id="user_new_pass" /></td>
                            </tr>
                            <tr>
                                <td>{$lng_label_managment_re_pass}</td>
                                <td><input type="password" value="" name="user_re_pass" id="user_re_pass" /></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="submit" value="{$lng_label_usermanage_page_save_btn}" id="" />
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                </form>
            </div>
            {if $user->name == 'admin'}
            <div id="tabs-2">
                <fieldset>
                    <legend>{$lng_label_managment_account_table}</legend>
                    <input type="button" name="add-new-record" value="{$lng_label_usermanage_page_add_new_btn}" onclick="addNewRecord('ppfm_account')" />
                    {$ppfm_account_model}
                </fieldset>
                <fieldset>
                    <legend>{$lng_label_managment_category_table}</legend>
                    <input type="button" name="add-new-record" value="{$lng_label_usermanage_page_add_new_btn}" onclick="addNewRecord('ppfm_category')" />
                    {$ppfm_category_model}
                </fieldset>    
                <fieldset>
                    <legend>{$lng_label_managment_holder_table}</legend>
                    <input type="button" name="add-new-record" value="{$lng_label_usermanage_page_add_new_btn}" onclick="addNewRecord('ppfm_holder')" />
                    {$ppfm_holder_model}
                </fieldset>
                <fieldset>
                    <legend>{$lng_label_managment_user_table}</legend>
                    <input type="button" name="add-new-record" value="{$lng_label_usermanage_page_add_new_btn}" onclick="addNewRecord('sys_user')" />
                    {$sys_user_model}
                </fieldset>
             </div>
            {/if} 
         </div>
         
         <div class="delete-dialog" id="delete-dialog">
            {$lng_label_delete_record}
         </div>
         
         <div class="edit-dialog" id="edit-dialog">
            <form action="" method="post">
                
            </form>
         </div>
         
         <div class="add-dialog" id="add-dialog">
            <form action="" method="post">
                
            </form>
         </div>
         
         <div class="" style="display: none;">
            <input type="hidden" id="active_record_id" name="active_record_id" value="" />
            <input type="hidden" id="active_table"     name="active_table" value="" />
         </div>
         
         {literal}
            <script type="text/javascript">
                $(document).ready(function(){
                
                    // validate signup form on keyup and submit
                    $("#userPass").validate({
                        rules: {
                            user_new_pass: {
                                required: true,
                                minlength: 8
                            },
                            user_re_pass: {
                                required: true,
                                minlength: 8,
                                equalTo: "#user_new_pass"
                            },
                        },
                        messages: {
                            password: {
                                required: "Please provide a password",
                                minlength: "Your password must be at least 8 characters long"
                            },
                            confirm_password: {
                                required: "Please provide a password",
                                minlength: "Your password must be at least 8 characters long",
                                equalTo: "Please enter the same password as above"
                            },
                        }
                    });
                })
            
                var activeTable    =   null;
                
                function openDialog(id, type, table) {
                    activeTable    =   table;
                    
                    $('#active_record_id').val(id);
                    $('#active_table').val(table);
                    
                    if(type == 'edit') {
                        openEditDialog(id, table);
                    } else {
                        $('#delete-dialog').dialog('open');    
                    }
                }
                
                function openEditDialog(id, table) {
                    
                    makeAjaxRequest('{/literal}{php}echo base_url();{/php}{literal}/index.php/usermanage/get', {
                        active_record_id:   id,
                        active_table:       table
                    }, function(html){
                        $('#edit-dialog form').empty().append(html);
                        $('#edit-dialog').dialog('open');
                        $('#edit-dialog :input:first').focus();
                    }, 'html')
                }
                
                function closeDeleteDialog(){
                    $('#delete-dialog').dialog('close');
                }
                
                function closeEditDialog(){
                    $('#edit-dialog').dialog('close');    
                }
                
                
                function deleteRecord(){
                    
                    var id      =   $('#active_record_id').val();
                    var table   =   $('#active_table').val();
                    
                    
                    makeAjaxRequest('{/literal}{php}echo base_url();{/php}{literal}/index.php/usermanage/delete', {
                        active_record_id:   id,
                        active_table:       table
                    }, function(json){
                        
                        if(json.result){
                            closeDeleteDialog();
                            reloadDataSet(activeTable);
                            showActionMessages(json.message, 'page-errors');    
                        } else {
                            showActionErrors(json.errors, 'page-errors');
                        }    
                    })            
                }
                
                function saveChanges(){
                    
                    var id      =   $('#active_record_id').val();
                    var table   =   $('#active_table').val();
                    var data    =   {active_record_id: id, active_table: table};
                    
                    $('#edit-dialog form :input').each(function(){
                        data[$(this).attr("name")] = $(this).val();    
                    })
                    
                    makeAjaxRequest('{/literal}{php}echo base_url();{/php}{literal}/index.php/usermanage/update', data, function(json){
                        
                        if(json.result) {
                            reloadDataSet(table);
                            closeEditDialog();
                            showActionMessages(json.message, 'page-errors');    
                        } else {
                            showErrors(json.errors);
                        }
                    })
                    
                }
                
                function addNewRecord(table){
                    
                   $('#active_table').val(table);
                    
                    makeAjaxRequest('{/literal}{php}echo base_url();{/php}{literal}/index.php/usermanage/new', {
                        active_table:       table
                    }, function(html){
                        
                        $('#add-dialog form').empty().append(html);
                        $('#add-dialog').dialog('open');
                        $('#add-dialog :input:first').focus();
                        
                    }, 'html')        
                }
                
                function closeAddDialog(){
                    $('#add-dialog').dialog('close');    
                }
                
                function saveNewRecord() {
                    var table   =   $('#active_table').val();
                    
                    var data    =   {active_table: table};
                    
                    $('#add-dialog form :input').each(function(){
                        data[$(this).attr("name")] = $(this).val();    
                    })
                    
                    makeAjaxRequest('{/literal}{php}echo base_url();{/php}{literal}/index.php/usermanage/savenew', data, function(json){
                        
                        if(json.result) {
                            reloadDataSet(table);
                            closeAddDialog();
                            showActionMessages(json.message, 'page-errors');    
                        } else {
                            if(json.errors) {
                                showErrors(json.errors);
                            } else if(json.generalErrors) {
                                showActionErrors(json.generalErrors, 'dialog-errors');
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
                                    blockUI()         
                               },
                               complete:    function(){
                                    unBlockUI();                
                               }
                           });
                }
                
                function reloadDataSet(table){
                    switch(table) {
                        case 'ppfm_account':
                            ppfm_account_model.fnDraw();
                            break;
                        case 'ppfm_category':
                            ppfm_category_model.fnDraw();
                            break;
                        case 'ppfm_holder':
                            ppfm_holder_model.fnDraw();
                            break;
                        case 'sys_user':
                            sys_user_model.fnDraw();
                            break;
                    }
                }
                
                function showErrors(errors){
                    hideErrors();
                    for(key in errors) {
                        $div = $('tr td #' + key).parent().find('div');
                               
                               $($div).text(errors[key]);
                               $($div).show();     
                    }
                }
                
                function hideErrors(){
                    $('tr td div').hide();
                }
                
                function showActionMessages(message, blockId){
                    //transfer to global scope
                    window.blockId = blockId
                     
                    $('#' + blockId + ' #js-message p').text(message);
                    $('#' + blockId + ' #js-message').show();
                    
                    setTimeout(hideActionMessages, 5000);
                }
                
                function showActionErrors(message, blockId){
                    //transfer to global scope
                    window.blockId = blockId
                    
                    $('#' + blockId + ' #js-error p').text(message);
                    $('#' + blockId + ' #js-error').show();
                    
                    setTimeout(hideActionMessages, 5000);
                }
                
                function hideActionMessages(){
                     $('#' + window.blockId + ' #js-message').fadeOut('normal');       
                     $('#' + window.blockId + ' #js-error').fadeOut('normal');       
                }
            </script>
         {/literal}

		{include file='tech_info.tpl'}
</body>

</html>
