{$jsdocready}
<form action="" method="post" class="sys-area-edit-form sys-dialog" >
    <table>
        <tr>
            <td colspan="2">{$sys_structapplication_idApplication_hidden}</td>
        </tr>
        <tr>
            <th>{$lng_label_sys_struct_application_area}:</th>
            <td>
                {$sys_structapplication_idArea_input}<br />
                <span class="validatetion-error" id="sys_structapplication_idArea_error"></span>
            </td>
        </tr>
        <tr>
            <th>{$lng_label_sys_struct_application_sub_area}:</th>
            <td>
                {$sys_structapplication_idSubArea_input}<br />
                <span class="validatetion-error" id="sys_structapplication_idSubArea_error"></span>
            </td>
        </tr>
        <tr>
            <th>{$lng_label_sys_struct_application_application}:</th>
            <td>
                {$sys_structapplication_application_input}<br />
                <span class="validatetion-error" id="sys_structapplication_application_error"></span>
            </td>
        </tr>
        <tr>
            <th>{$lng_label_sys_struct_application_file}:</th>
            <td>
                {$sys_structapplication_file_input}<br />
                <span class="validatetion-error" id="sys_structapplication_file_error"></span>
            </td>
        </tr>
        <tr>
            <th>{$lng_label_sys_struct_application_show_menu}:</th>
            <td>
                {$sys_structapplication_showMenu_input}<br />
                <span class="validatetion-error" id="sys_structapplication_showMenu_error"></span>
            </td>
        </tr>
    </fieldset>
</form>

{literal}
    <script type="text/javascript">
        $(document).ready(function(){
            $('#sys_structapplication_idArea').change(function(){
                $.getJSON('{/literal}{php}echo prep_url(base_url().'/applicationmanage/getsubarealist');{/php}{literal}', {
                    areaId: $(this).val()
                }, function(json) {
                    $('#sys_structapplication_idSubArea').empty();
                    for(index in json) {
                        $('#sys_structapplication_idSubArea').append('<option value="' + index + '">' +  json[index] + '</option>');    
                    }
                })
            })
        })
    </script>
{/literal}