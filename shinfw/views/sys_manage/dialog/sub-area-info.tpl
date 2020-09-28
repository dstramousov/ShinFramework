<form action="" method="post" class="sys-sub-area-edit-form sys-dialog" >
    <table>
        <tr>
            <th></th>
            <td><input type="hidden" name="sys_structsubarea_idSubArea_old" value="{$sys_structsubarea_idSubArea}" id="sys_structsubarea_idSubArea_old" /></td>
            <td><input type="hidden" name="sys_structsubarea_idArea_old" value="{$sys_structsubarea_idArea}" id="sys_structsubarea_idArea_old" /></td>
        </tr>
        <tr>
            <th>{$lng_label_sys_sub_area_id}</th>
            <td>
                {$sys_structsubarea_idSubArea_input}<br />
                <span class="validatetion-error" id="sys_structsubarea_idSubArea_error"></span>
            </td>
        </tr>
        <tr>
            <th>{$lng_label_sys_area_id}</th>
            <td>
                {$sys_structsubarea_idArea_input}<br />
                <span class="validatetion-error" id="sys_structsubarea_idArea_error"></span>
            </td>
        </tr>
        <tr>
            <th>{$lng_label_sys_sub_area}:</th>
            <td>
                {$sys_structsubarea_subarea_input}<br />
                <span class="validatetion-error" id="sys_structsubarea_subarea_error"></span>
            </td>
        </tr>
    </fieldset>
</form>