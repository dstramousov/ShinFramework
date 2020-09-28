{include file='header.tpl'}

<div class="show-form">
    <fieldset>
        
        <legend>{$lng_label_ticket_information}</legend>
            <table>
                <tr>
                    <th><label for="">{$lng_label_ticket_application_name}</label></th>
                    <td><i>{$shinticket_ticket_application_name}</i></td>
                </tr>
                <tr>
                    <th><label for="">{$lng_label_ticket_created}</label></th>
                    <td><i>{$shinticket_ticket_created}</i></td>
                </tr>
                <tr>
                    <th><label for="">{$lng_label_new_title}:</label></th>
                    <td>{$shinticket_ticket_title}</td>
                </tr>
                <tr>
                    <th><label for="">{$lng_label_new_message}:</label></th>
                    <td>
                        <div class="ticket-body-html">{$shinticket_ticket_body_html}</div>
                    </td>
                </tr>
                <tr>
                    <th><label for="">{$lng_label_new_priority}:</label></th>
                    <td>{$shinticket_ticket_priority}</td>
                </tr>
                <tr>
                    <th><label for="">{$lng_label_new_status}:</label></th>
                    <td>{$shinticket_ticket_status}</td>
                </tr>
                {if !empty($shinticket_ticket_attachPath)}
                <tr>
                    <th><label for="">{$lng_label_attachment}:</label></th>
                    <td><a href="{php}echo prep_url(base_url());{/php}/ticket/download?path={$shinticket_ticket_attachPath}&name={$shinticket_ticket_realAttachFileName}" class="attachment-link">{$shinticket_ticket_realAttachFileName}</a></td>
                </tr>
                {/if}
            </table>
    </fieldset>
    

	{if !empty($ticketDetailList)}

    <fieldset>
        <legend>{$lng_label_ticket_details}</legend>
        {foreach from=$ticketDetailList item=detail}
            <table>
                <tr>
                    <td colspan="2" align="left">
                        {if $detail.owner == 'user'}
                            <img src="{php} echo SHIN_Core::$_config['core']['app_base_url'].'/images/datatable/';{/php}user.png" />&nbsp;{$userFirstName}&nbsp;{$userLastName}&nbsp;{$lng_label_user_wrote}
                        {else}
                            <img src="{php} echo SHIN_Core::$_config['core']['app_base_url'].'/images/datatable/';{/php}user_red.png" />&nbsp;&nbsp;{$lng_label_support_wrote}
                        {/if}
                    </td>
                </tr>
                <tr>
                    <th>{$lng_label_datatable_details_updated}</label></th>
                    <td><i>{$detail.created}</i></td>
                </tr>
                <tr>
                    <th>{$lng_label_datatable_details_body}</label></th>
                    <td>
                        {$detail.bodyparced}
                    </td>
                </tr>
                {if !empty($detail.attachPath)}
                <tr>
                    <th>{$lng_label_attachment}:</th>
                    <td><a href="{php}echo SHIN_Core::$_config['core']['app_base_url'];{/php}/ticket/download?path={$detail.attachPath}&name={$detail.realAttachFileName}" class="attachment-link">{$detail.realAttachFileName}</a></td>
                </tr>
                {/if}
            </table>
            <hr />
        {/foreach}
    </fieldset>

	{/if}
    
    <fieldset>
        <legend>{$lng_label_ticket_new_detail}</legend>
        <form action="{php}echo SHIN_Core::$_config['core']['app_base_url'].'/ticket/savereply';{/php}" method="post" enctype="multipart/form-data" id="add_ticketdetail_form">
            <input type="hidden" name="shinticket_ticketdetails_idTicket" value="{$shinticket_ticket_idTicket}" id="shinticket_ticketdetails_idTicket" />
            <table class="new-detail">
                <tr>
                    <th valign="top"><label for="">{$lng_label_new_message}:</label></th>
                    <td colspan="2" nowrap="nowrap">
                        {$shinticket_ticketdetails_body_input}
                        {if $ticketdetails_errors.shinticket_ticketdetails_body}
                            <span class="errors">{$ticketdetails_errors.shinticket_ticketdetails_body}</span>
                        {/if}
                    </td>
                </tr>
                <tr>
                    <th valign="top"><label for="">{$lng_label_new_attach}</label></th>
                    <td><input type="file" name="attach_file" value="" id="attach_file" /></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td align="center" colspan="2">
                        <input type="submit" name="send-new-ticket" value="{$lng_label_new_reply_submit_button}" id="send-new-detail" onclick="sendData();"/>
                        <input type="reset"  name="reset-new-ticket" value="{$lng_label_new_resut_button}" id="reset-new-detail" />
                    </td>
                </tr>
            </table>
        </form>
    </fieldset>
</div>

{literal}
    <script type="text/javascript">
        function sendData(){
            $('#add_ticketdetail_form').append('<input type="hidden" name="shinticket_ticketdetails_body" value="' + tinyMCE.activeEditor.getContent() + '">')
            $('#add_ticketdetail_form').submit();    
        }
    </script>    
{/literal}


{if $scroolToBottom == 'true'} 
    {literal}
        <script type="text/javascript">
            $(document).ready(function(){
                $.scrollTo('.new-detail');    
            })
        </script>
    {/literal}
{/if}

{include file='footer.tpl'}