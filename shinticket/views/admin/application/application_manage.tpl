<div class="application-new">
    <fieldset>
        <legend>{$lng_label_application_manage_page}</legend>
        <div class="add-application-form">
            <form action="{php}echo prep_url(base_url().'/lists/applicationadd');{/php}" method="post">
            <table>
                <tr>
                    <td>
                        {$shinticket_applicationlist_applicationName_input}
                    </td>
                    <td>
                        <input type="submit" name="submit-new-application" value="{$lng_label_application_add}">
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </fieldset>
    
    <fieldset>
        <legend>{$lng_label_application_list}</legend>
        <div class="application-list list">
            {$applicationList}
        </div>
    </fieldset>
    
    <form action="{php}echo prep_url(base_url().'/lists/applicationdelete');{/php}" method="post" id="delete-application">
        {$shinticket_applicationlist_idApplication_hidden}
    </form>
    
    <div id="delete-application-dialog" title="{$lng_label_application_delete_really}">
        <center>{$lng_label_application_delete_really}</center>
    </div>
</div>
{literal}
    <script type="text/javascript">
        function deleteApplication(applicationId){
            $('#shinticket_applicationlist_idApplication').val(applicationId);
            
            $('#delete-application-dialog').dialog('open');    
        }
        
        function deleteApplicationRecord(){
            $('#delete-application').submit();
        }
        
        function closeApplicationDialog(){
            $('#delete-application-dialog').dialog('close');    
        }
    </script>
{/literal}

