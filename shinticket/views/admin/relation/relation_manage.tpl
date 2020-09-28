<div class="customer-new">
    
    <fieldset>
        <legend>{$lng_label_customer_application_list}</legend>
        <div class="relation-messages">
            {$jsMessages}
            {$jsErrors}
        </div>
        <div class="relation-list list">
            {$customerListRel}
        </div>
    </fieldset>
    
    <div id="manage-relations">
        <input type="hidden" name="current-customer" value="" id="current-customer" />
        <table>
            {foreach from=$allApplicationList item=application}
                <tr>
                    <td><input type="checkbox" name="application[]" value="{$application.idApplication}" id="{$application.idApplication}"></td>
                    <td><label for="{$application.idApplication}">{$application.applicationName}</label></td>
                </tr>
            {/foreach}
        </table>
    </div>
    
</div>
{literal}
    <script type="text/javascript">
        function closeDialog(customerId){
            $('#manage-relations').dialog('close');    
        }
        
        function saveRelations(){
            var customerId      = $('#manage-relations #current-customer').val(customerId);
            var applicationList = new Array;
            
            
            $('#manage-relations input:checkbox:checked').each(function(){
                applicationList.push($(this).val());       
            });
            
            $.getJSON({/literal}'{php}echo prep_url(base_url().'/lists/ajaxsaveapplicationlist');{/php}'{literal}, {
                customerId:         customerId,
                applicationList:    applicationList.join(',') 
            }, function(json){
                if(json.result) {
                    showMessages(json.message);
                } else {
                    showErrors(json.message);
                }
                
                $('#manage-relations').dialog('close');
            });        
        }
        
        function loadRelations(customerId){
            $.getJSON({/literal}'{php}echo prep_url(base_url().'/lists/ajaxapplicationlist');{/php}'{literal}, {
                customerId: customerId 
            }, function(json){
                $('#manage-relations #current-customer').val(customerId);
                $('#manage-relations input:checked').removeAttr('checked');
                for(index in json.data) {
                    $('#manage-relations input[value=' + json.data[index]  + ']').attr('checked', 'checked');
                }
                
                $('#manage-relations').dialog('open');    
            });
        }
        
        function showMessages(message){
            $('.relation-messages #js-message p').text(message);
            $('.relation-messages #js-message').show();
            
            setTimeout(hideActionMessages, 5000);
        }
        
        function showErrors(message){
            
            $('.relation-messages #js-error p').text(message);
            $('.relation-messages #js-error').show();
            
            setTimeout(hideActionMessages, 5000);
        }
        
        function hideActionMessages(){
             $('.relation-messages #js-message').fadeOut('normal');       
             $('.relation-messages #js-error').fadeOut('normal');       
        }         
    </script>
{/literal}
   