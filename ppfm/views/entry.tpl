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

<div class="b-messages">{$jsMessages}</div>
<div class="b-errors">{$jsErrors}</div>

<br />

<input type="button" name="add-new-record" value="{$lng_label_register_add_new_record}" onclick="addNewRecord('ppfm_entry')" />
{$etrylist}

<div class="delete-dialog" id="delete-dialog">
    {$lng_label_delete_record}
</div>

<div class="add-dialog" id="add-dialog">
    <form action="" method="post">
        
    </form>
</div>

<div class="edit-dialog" id="edit-dialog">
    <form action="" method="post">
        
    </form>
</div>

<div class="" style="display: none;">
    <input type="hidden" id="active_record_id" name="active_record_id" value="" />
    <input type="hidden" id="active_table"     name="active_table" value="" />
</div>

{literal}
    <script type="text/javascript">
        
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
                
            makeAjaxRequest('{/literal}{php}echo base_url();{/php}{literal}/index.php/registration/get', {
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
        
        function addNewRecord(table){
                
               $('#active_table').val(table);
                
                makeAjaxRequest('{/literal}{php}echo base_url();{/php}{literal}/index.php/registration/new', {
                    active_table:       table
                }, function(html){
                    
                    $('#add-dialog form').empty().append(html);
                    $('#add-dialog').dialog('open');
                    $('#add-dialog :input:first').focus();
                    
                }, 'html')        
        }
        
        function saveNewRecord() {
                var table   =   $('#active_table').val();
                
                var data    =   {active_table: table};
                
                $('#add-dialog form :input').each(function(){
                    switch($(this).attr('type')) {
                        case 'select-one':
                            data[$(this).attr("name")] = $(this).find('option:selected').val();
                            break;
                        case 'hidden':
                        case 'text':
                            data[$(this).attr("name")] = $(this).val();
                            break;
                    }
                })
                
                makeAjaxRequest('{/literal}{php}echo base_url();{/php}{literal}/index.php/registration/savenew', data, function(json){
                    
                    if(json.result) {
                        reloadDataSet(table);
                        closeAddDialog();
                        showActionMessages(json.message);    
                    } else {
                        showErrors(json.errors);
                    }
                })   
            }
        
        function closeAddDialog(){
            $('#add-dialog').dialog('close');
        }
        
        function deleteRecord(){
                
                var id      =   $('#active_record_id').val();
                var table   =   $('#active_table').val();
                
                
                makeAjaxRequest('{/literal}{php}echo base_url();{/php}{literal}/index.php/registration/delete', {
                    active_record_id:   id,
                    active_table:       table
                }, function(json){
                    
                    if(json.result){
                        closeDeleteDialog();
                        reloadDataSet();    
                    } else {
                    
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
            
            makeAjaxRequest('{/literal}{php}echo base_url();{/php}{literal}/index.php/registration/update', data, function(json){
                if(json.result) {
                    reloadDataSet(table);
                    closeEditDialog();
                    showActionMessages(json.message);    
                } else {
                    showErrors(json.errors);
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
        
        function reloadDataSet(){
            entry_listing.fnDraw();
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
        
        function showActionMessages(message){
            $('#js-message p').text(message);
            $('#js-message').show();
            
            setTimeout(hideActionMessages, 5000);
        }
        
        function showActionErrors(){
            $('#js-error p').text(message);
            $('#js-error').show();
            
            setTimeout(hideActionMessages, 5000);
        }
        
        function hideActionMessages(){
             $('#js-message').fadeOut('normal');       
             $('#js-error').fadeOut('normal');       
        }
    </script>
{/literal}

{include file='tech_info.tpl'}	
</body>

</html>	
