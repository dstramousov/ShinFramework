{include file='header.tpl'}

<div class="new-form">
    <fieldset>
        <legend>{$lng_label_new_ticket}</legend>
        <form id="add_ticket_form" method="post" action="{php}echo prep_url(base_url().'/ticket/save');{/php}" enctype="multipart/form-data">
		
            <table>
                <tr>
                    <th><label for="">{$lng_label_new_title}:</label></th>
                    <td>
                        {$shinticket_ticket_title_input}
                        {if $ticket_errors.shinticket_ticket_title}
                            <div class="shin-clear"></div>
                            <span class="errors">{$ticket_errors.shinticket_ticket_title}</span>
                        {/if}
                    </td>
                </tr>
                <tr>
                    <th><label for="">{$lng_label_new_priority}</label></th>
                    <td>{$shinticket_ticket_priority_input}</td>
                </tr>
                <tr>
                    <th><label for="">{$lng_label_ticket_application_name}</label></th>
                    <td>
                        {$shinticket_ticket_applicationId_input}<br />
                        {if $ticket_errors.shinticket_ticket_applicationId}
                            <span class="errors">{$ticket_errors.shinticket_ticket_applicationId}</span>
                        {/if}
                    </td>
                </tr>
                <tr>
                    <th><label for="">{$lng_label_new_message}:</label></th>
                    <td nowrap="nowrap">
                        {$shinticket_ticket_body_input}
                        {if $ticket_errors.shinticket_ticket_body}
                            <span class="errors">{$ticket_errors.shinticket_ticket_body}</span>
                        {/if}
                    </td>
                </tr>
                <tr>
                    <th><label for="">{$lng_label_new_attach}</label></th>
                    <td><input type="file" name="attach_file" value="" id="attach_file" /></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="send-new-ticket" value="{$lng_label_new_submit_button}" id="send-new-ticket" onclick="sendData();" />
                        <input type="reset"  name="reset-new-ticket" value="{$lng_label_new_resut_button}" id="reset-new-ticket" />
                    </td>
                </tr>
            </table>
        </form>
    </fieldset>

    {literal}
    <script type="text/javascript">
        function sendData(){
            $('#add_ticket_form').append('<input type="hidden" name="shinticket_ticket_body" value="' + tinyMCE.activeEditor.getContent() + '">')
            $('#add_ticket_form').submit();    
        }
    </script>    
    {/literal}

</div>
{include file='footer.tpl'}