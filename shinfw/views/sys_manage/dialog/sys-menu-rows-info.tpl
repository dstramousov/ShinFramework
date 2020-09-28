<form action="{php}echo prep_url(base_url().'/menurowsmanage/savemenurowsinfo');{/php}" method="post" class="sys-dialog" enctype="multipart/form-data">
    <table>
        <tr>
            <th></th>
            <td>
                <input type="hidden" name="sys_menurows_idMenu_old"  value="{$sys_menurows_idMenu}" id="sys_menurows_idMenu_old" />
                <input type="hidden" name="sys_menurows_idApplication_old" value="{$sys_menurows_idApplication}" id="sys_menurows_idApplication_old" />
            </td>
        </tr>
        <tr>
            <th>{$lng_label_menu_rows_id_menu}:</th>
            <td>
                {$sys_menurows_idMenu_input}<br />
                <span class="validatetion-error" id="sys_menurows_idMenu_error"></span> 
            </td>
        </tr>
        <tr>
            <th>{$lng_label_menu_rows_id_panel}:</th>
            <td>
                {$sys_menurows_idPanel_input}<br />
                <span class="validatetion-error" id="sys_menurows_idPanel_error"></span>
            </td>
        </tr>
        <tr>
            <th>{$lng_label_menu_rows_id_grp}:</th>
            <td>
                {$sys_menurows_idGrp_input}<br />
                <span class="validatetion-error" id="sys_menurows_idGrp_error"></span>
            </td>
        </tr>
        <tr>
            <th>{$lng_label_menu_rows_id_app}:</th>
            <td>
                {$sys_menurows_idApplication_input}<br />
                <span class="validatetion-error" id="sys_menurows_idApplication_error"></span>
            </td>
        </tr>
        <tr>
            <th>{$lng_label_menu_rows_label}:</th>
            <td>
                {$sys_menurows_label_input}<br />
                <span class="validatetion-error" id="sys_menurows_label_error"></span> 
            </td>
        </tr>
        <tr>
            <th>{$lng_label_menu_rows_new_page}:</th>
            <td>
                {$sys_menurows_newPage_input}<br />
                <span class="validatetion-error" id="sys_menurows_newPage_error"></span>
            </td>
        </tr>
        <tr>
            <th>{$lng_label_menu_rows_type}:</th>
            <td>
                {$sys_menurows_type_input}<br />
                <span class="validatetion-error" id="sys_menurows_type_error"></span>
            </td>
        </tr>
        <tr>
            <th>{$lng_label_menu_rows_position}:</th>
            <td>
                {$sys_menurows_position_input}<br />
                <span class="validatetion-error" id="sys_menurows_position_error"></span>
            </td>
        </tr>
        <tr>
            <th>{$lng_label_menu_rows_active}:</th>
            <td>
                {$sys_menurows_active_input}<br />
                <span class="validatetion-error" id="sys_menurows_active_error"></span>
            </td>
        </tr>
    </fieldset>
</form>

{literal}
    <script type="text/javascript">
        $(document).ready(function(){
            $('#sys_menurows_idMenu').change(function(){
                $.getJSON('{/literal}{php}echo prep_url(base_url().'/menumanage/getpanellist');{/php}{literal}', {
                    menuId: $(this).val()
                }, function(json) {
                    $('#sys_menurows_idPanel').empty();
                    $('#sys_menurows_idGrp').empty();
                    $('#sys_menurows_idPanel').append('<option value=""></option>');    
                    for(index in json) {
                        $('#sys_menurows_idPanel').append('<option value="' + index + '">' +  json[index] + '</option>');    
                    }
                })
            })
            
            $('#sys_menurows_idPanel').change(function(){
                $.getJSON('{/literal}{php}echo prep_url(base_url().'/menugrpmanage/getgrplist');{/php}{literal}', {
                    panelId:   $(this).val(),
                    menuId:    $('#sys_menurows_idMenu').val()
                }, function(json) {
                    $('#sys_menurows_idGrp').empty();
                    $('#sys_menurows_idGrp').append('<option value=""></option>');    
                    for(index in json) {
                        $('#sys_menurows_idGrp').append('<option value="' + index + '">' +  json[index] + '</option>');    
                    }
                })
            })
        })
    </script>
{/literal}