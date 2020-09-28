<form action="" method="post" class="sys-policy-edit-form sys-dialog" >
    <table>
        <tr>
            <th></th>
            <td>
                <input type="hidden" name="sys_policyarea_idElem_old" value="{$sys_policyarea_idElem}" id="sys_policyarea_idElem_old" />
                <input type="hidden" name="sys_policyarea_idArea_old" value="{$sys_policyarea_idArea}" id="sys_policyarea_idArea_old" />
            </td>
        </tr>
        <tr>
            <th>{$lng_label_sys_policy_id}</th>
            <td>
                {$sys_policyarea_idElem_input}<br />
                <span class="validatetion-error" id="sys_policyarea_idElem_error"></span>
            </td>
        </tr>
        <tr>
            <th>{$lng_label_sys_policy_type}:</th>
            <td>
                {$sys_policyarea_type_input}<br />
                <span class="validatetion-error" id="sys_policyarea_type_error"></span>
            </td>
        </tr>
        <tr>
            <th>{$lng_label_sys_policy_area}:</th>
            <td>
                {$sys_policyarea_idArea_input}<br />
                <span class="validatetion-error" id="sys_policyarea_idArea_error"></span>
            </td>
        </tr>
        <tr>
            <th>{$lng_label_sys_policy_mode}:</th>
            <td>
                {$sys_policyarea_mode_input}<br />
                <span class="validatetion-error" id="sys_policyarea_mode_error"></span>
            </td>
        </tr>
    </fieldset>
</form>

{literal}
    <script type="text/javascript">
        $(document).ready(function(){
            $('#sys_policyarea_type').attr('disabled', 'disabled');
        })
        
        $('#sys_policyarea_idElem').change(function(){
            var type = $('#sys_policyarea_idElem option:selected').attr('type');
                       $('#sys_policyarea_type option[value=' + type + ']').attr('selected', 'selected');
        })
    </script>
{/literal}