{literal}
<script type="text/javascript">
    {/literal}{$datepickerJsCode2}{literal}
</script>
{/literal}

<table>
    <tr>
        <td colspan="2">
        <div id="dialog-errors">
            <div class="b-messages">{$jsMessages}</div>
            <div class="b-errors">{$jsErrors}</div>
        </div>
        </td>
    </tr>
    <tr>
        <td>{$lng_label_managment_account_account}</td>
        <td></td>
        <td>
            {$ppfm_account_account_input}
            <div class="shin-error1"></div>
        </td>
    </tr>
    <tr>
        <td>{$lng_label_managment_account_amount}</td>
        <td>{$currencySymbol}</td>
        <td>
            {$ppfm_account_curAmount_input}
            <div class="shin-error1"></div>
        </td>
    </tr>
    <tr>
        <td>{$lng_label_managment_account_last_update}</td>
        <td></td>
        <td>
            {$ppfm_account_lastUpdate_input}
            <div class="shin-error1"></div>
        </td>
    </tr>
    <tr>
        <td colspan="2">{$ppfm_account_idAccount_hidden}</td>
    </tr>
</table>
 