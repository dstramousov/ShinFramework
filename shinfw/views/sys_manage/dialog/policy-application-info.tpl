<form action="" method="post" class="sys-area-edit-form sys-dialog" >
    <table>
        <tr>
            <td colspan="2">
                <input type="hidden" name="sys_policyapplication_idElem_old" id="sys_policyapplication_idElem_old" value="{$sys_policyapplication_idElem}" />
            </td>
        </tr>
        <tr>
            <th>{$lng_label_policy_application_id_elem}:</th>
            <td>
                {$sys_policyapplication_idElem_input}<br />
                <span class="validatetion-error" id="sys_policyapplication_idElem_error"></span>
            </td>
        </tr>
        <tr>
            <th>{$lng_label_policy_application_type}:</th>
            <td>
                {$sys_policyapplication_type_input}<br />
                <span class="validatetion-error" id="sys_policyapplication_type_error"></span>
            </td>
        </tr>
        <tr>
            <th>{$lng_label_policy_application_id_area}:</th>
            <td>
                {$sys_policyapplication_idArea_input}<br/>
                <span class="validatetion-error" id="sys_policyapplication_idArea_error"></span>
            </td>
        </tr>
        <tr>
            <th>{$lng_label_policy_application_id_sub_area}:</th>
            <td>
                {$sys_policyapplication_idSubArea_input}</br >
                <span class="validatetion-error" id="sys_policyapplication_idSubArea_error"></span>
            </td>
        </tr>
        <tr>
            <th>{$lng_label_policy_application_id_application}:</th>
            <td>
                {$sys_policyapplication_idApplication_input}
                <br />
                <span class="validatetion-error" id="sys_policyapplication_idApplication_error"></span>
            </td>
        </tr>
        <tr>
            <th>{$lng_label_policy_application_mode}:</th>
            <td>
                {$sys_policyapplication_mode_input}</br >
                <span class="validatetion-error" id="sys_policyapplication_mode_error"></span>
            </td>
        </tr>
    </fieldset>
</form>

{literal}
    <script type="text/javascript">
        $(document).ready(function(){
            $('#sys_policyapplication_idArea').change(function(){
                $.getJSON('{/literal}{php}echo prep_url(base_url().'/policysubareamanage/getsubarealist');{/php}{literal}', {
                    areaId: $(this).val()
                }, function(json) {
                    $('#sys_policyapplication_idSubArea').empty();
                    $('#sys_policyapplication_idApplication').empty();
                    $('#sys_policyapplication_idSubArea').append('<option value=""></option>');    
                    for(index in json) {
                        $('#sys_policyapplication_idSubArea').append('<option value="' + index + '">' +  json[index] + '</option>');    
                    }
                });
             })
            
            $('#sys_policyapplication_idSubArea').change(function(){
            
                var subAreaId   =   $(this).val();
                var areaId      =   $('#sys_policyapplication_idArea').val();
                
                if(subAreaId != '' && areaId != '') {   
                    $.getJSON('{/literal}{php}echo prep_url(base_url().'/policyapplicationmanage/getapplist');{/php}{literal}', {
                        areaId:    areaId, 
                        subAreaId: subAreaId
                    }, function(json) {
                        $('#sys_policyapplication_idApplication').empty();
                        for(index in json) {
                            $('#sys_policyapplication_idApplication').append('<option value="' + index + '">' +  json[index] + '</option>');    
                        }
                    });
                } else {
                    $('#sys_policyapplication_idApplication').empty();
                }
            })
            
            $('#sys_policyapplication_type').attr('disabled', 'disabled');
        })
        
        $('#sys_policyapplication_idElem').change(function(){
            var type = $('#sys_policyapplication_idElem option:selected').attr('type');
                       $('#sys_policyapplication_type option[value=' + type + ']').attr('selected', 'selected');
        })
    </script>
{/literal}