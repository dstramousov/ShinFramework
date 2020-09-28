<form action="" method="post" class="sys-area-edit-form sys-dialog" >
    <table>
        <tr>
            <th></th>
            <td><input type="hidden" name="sys_structarea_idArea_old" value="{$sys_structarea_idArea}" id="sys_structarea_idArea_old" /></td>
        </tr>
        <tr>
            <th>{$lng_label_sys_role_id}</th>
            <td>
                {$sys_structarea_idArea_input}<br />
                <span class="validatetion-error" id="sys_structarea_idArea_error"></span>
            </td>
        </tr>
        <tr>
            <th>{$lng_label_sys_area_area}:</th>
            <td>
                {$sys_structarea_area_input}<br />
                <span class="validatetion-error" id="sys_structarea_area_error"></span>
            </td>
        </tr>
    </fieldset>
</form>