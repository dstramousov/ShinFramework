{$jsdocready}
<form action="" method="post" class="sys-policy-edit-form sys-dialog" >
    <table>
        <tr>
            <td colspan="2">
                <input type="hidden" name="sys_policysubarea_idSubArea_old" value="{$sys_policysubarea_idSubArea}" id="sys_policysubarea_idSubArea_old" />
                <input type="hidden" name="sys_policysubarea_idArea_old" value="{$sys_policysubarea_idArea}" id="sys_policysubarea_idArea_old" />
                <input type="hidden" name="sys_policysubarea_idElem_old" value="{$sys_policysubarea_idElem}" id="sys_policysubarea_idElem_old" />
            </td>
        </tr>
        <tr>
            <th>{$lng_label_sys_policy_sub_id}</th>
            <td>
                {$sys_policysubarea_idElem_input}<br />
                <span class="validatetion-error" id="sys_policysubarea_idElem_error"></span>
            </td>
        </tr>
        <tr>
            <th>{$lng_label_sys_policy_sub_type}:</th>
            <td>
                {$sys_policysubarea_type_input}<br />
                <span class="validatetion-error" id="sys_policysubarea_type_error"></span>
            </td>
        </tr>
        <tr>
            <th>{$lng_label_sys_policy_sub_area}:</th>
            <td>
                {$sys_policysubarea_idArea_input}<br />
                <span class="validatetion-error" id="sys_policysubarea_idArea_error"></span>
            </td>
        </tr>
        <tr>
            <th>{$lng_label_sys_policy_sub_sub_area}:</th>
            <td>
                {$sys_policysubarea_idSubArea_input}<br />
                <span class="validatetion-error" id="sys_policysubarea_idSubArea_error"></span>
            </td>
        </tr>
        <tr>
            <th>{$lng_label_sys_policy_sub_mode}:</th>
            <td>
                {$sys_policysubarea_mode_input}<br />
                <span class="validatetion-error" id="sys_policysubarea_mode_error"></span>
            </td>
        </tr>
    </fieldset>
</form>

{literal}
    <script type="text/javascript">
        $(document).ready(function(){
            $('#sys_policysubarea_idArea').change(function(){
                $.getJSON('{/literal}{php}echo prep_url(base_url().'/policysubareamanage/getsubarealist');{/php}{literal}', {
                    areaId: $(this).val()
                }, function(json) {
                    $('#sys_policysubarea_idSubArea').empty();
                    $('#sys_policysubarea_idSubArea').append('<option value=""></option>');    
                    for(index in json) {
                        $('#sys_policysubarea_idSubArea').append('<option value="' + index + '">' +  json[index] + '</option>');    
                    }
                })
            })
            
            $('#sys_policysubarea_type').attr('disabled', 'disabled');
        })
        
        $('#sys_policysubarea_idElem').change(function(){
            var type = $('#sys_policysubarea_idElem option:selected').attr('type');
                       $('#sys_policysubarea_type option[value=' + type + ']').attr('selected', 'selected');
        })
    </script>
{/literal}