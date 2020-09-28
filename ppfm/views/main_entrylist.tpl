<table align="left" width="100%">
    <tr>
        <td style="background-color: #aad5eb;" width="90%">{$lng_label_main_page_entry_panel_text_field}</td>    
        <td style="background-color: #aad5eb;" width="10%">{$lng_label_main_page_entry_panel_amount_field}</td>    
    </tr>
{foreach from=$entryData item=entryIten}
    <tr>
        <td>{$entryIten.text}</td>
        <td>{$entryIten.amount}</td>
    </tr>
{/foreach}
</table>