<form action="" method="post" class="sys-role-edit-form sys-dialog" >
    <table>
        <tr>
            <th></th>
            <td><input type="hidden" name="sys_userrole_idRole_old" value="{$sys_userrole_idRole}" id="sys_userrole_idRole_old" /></td>
        </tr>
        <tr>
            <th>{$lng_label_sys_role_id}</th>
            <td>
                {$sys_userrole_idRole_input}<br />
                <span class="validatetion-error" id="sys_userrole_idRole_error"></span>
            </td>
        </tr>
        <tr>
            <th>{$lng_label_sys_role_name}:</th>
            <td>
                {$sys_userrole_role_input}<br />
                <span class="validatetion-error" id="sys_userrole_role_error"></span>
            </td>
        </tr>
        <tr>
            <th>{$lng_label_sys_user_name}:</th>
            <td>{$sys_userrole_grp_input}</td>
        </tr>
    </fieldset>
</form>