<form action="" method="post" class="sys-user-edit-form sys-dialog">
    <table>
        <tr>
            <th>&nbsp;</th>
            <td>{$sys_user_idUser_hidden}</td>
        </tr>
        <tr>
            <th>{$lng_label_sys_user_lang}:</th>
            <td>{$sys_user_lang_input}</td>
        </tr>
        <tr>
            <th>{$lng_label_sys_user_status}:</th>
            <td>{$sys_user_status_input}</td>
        </tr>
        <tr>
            <th>{$lng_label_sys_user_name}:</th>
            <td>
                {$sys_user_name_input}<br />
                <span class="validatetion-error" id="sys_user_name_error"></span>
            </td>
        </tr>
        <tr>
            <th>{$lng_label_sys_user_lastname}:</th>
            <td>
                {$sys_user_lastname_input}<br />
                <span class="validatetion-error" id="sys_user_lastname_error"></span>
            </td>
        </tr>
        <tr>
            <th>{$lng_label_sys_user_email}:</th>
            <td>
                {$sys_user_email_input}<br />
                <span class="validatetion-error" id="sys_user_email_error"></span>
            </td>
        </tr>
        <tr>
            <th>{$lng_label_sys_user_username}:</th>
            <td>
                {$sys_user_username_input}<br />
                <span class="validatetion-error" id="sys_user_username_error"></span>
            </td>
        </tr>
        <tr>
            <th>{$lng_label_sys_user_pass}:</th>
            <td>
                {$sys_user_pwd_input}<br />
                <span class="validatetion-error" id="sys_user_pwd_error"></span>
            </td>
        </tr>
        <tr>
            <th>{$lng_label_sys_user_confirm_pass}:</th>
            <td>
                <input type="password" name="sys_user_pwd_confirm" value="" id="sys_user_pwd_confirm" />
            </td>
        </tr>
        <tr>
            <th>{$lng_label_sys_user_theme}:</th>
            <td>{$sys_user_theme_input}</td>
        </tr>
        <tr>
            <th>{$lng_label_sys_user_host}:</th>
            <td>
                {$sys_user_host_ro}<br />
                <span class="validatetion-error" id="sys_user_host_error"></span>
            </td>
        </tr>
        <tr>
            <th>{$lng_label_sys_user_updated}:</th>
            <td>
                {$sys_user_updated_ro}
            </td>
        </tr>
        <tr>
            <th>{$lng_label_sys_user_added}:</th>
            <td>
                {$sys_user_added_ro}
            </td>
        </tr>
        <tr>
            <th>{$lng_label_sys_user_lastlogin}:</th>
            <td>
                {$sys_user_lastlogin_ro}
            </td>
        </tr>
    </table>
    <fieldset>
        <legend>{$lng_label_sys_user_roles}</legend>
        <table>
            <tr>
                <th>{$lng_label_sys_user_role_1}:</th>
                <td>
                    {$sys_user_role_1_input}<br />
                    <span class="validatetion-error" id="sys_user_role_1_error"></span>
                </td>
            </tr>
            <tr>
                <th>{$lng_label_sys_user_role_2}:</th>
                <td>{$sys_user_role_2_input}</td>
            </tr>
            <tr>
                <th>{$lng_label_sys_user_role_3}:</th>
                <td>{$sys_user_role_3_input}</td>
            </tr>
            <tr>
                <th>{$lng_label_sys_user_role_4}:</th>
                <td>{$sys_user_role_4_input}</td>
            </tr>
            <tr>
                <th>{$lng_label_sys_user_role_5}:</th>
                <td>{$sys_user_role_5_input}</td>
            </tr>
            <tr>
                <th>{$lng_label_sys_user_role_6}:</th>
                <td>{$sys_user_role_6_input}</td>
            </tr>
            <tr>
                <th>{$lng_label_sys_user_role_7}:</th>
                <td>{$sys_user_role_7_input}</td>
            </tr>
            <tr>
                <th>{$lng_label_sys_user_role_8}:</th>
                <td>{$sys_user_role_8_input}</td>
            </tr>
            <tr>
                <th>{$lng_label_sys_user_role_9}:</th>
                <td>{$sys_user_role_9_input}</td>
            </tr>
            <tr>
                <th>{$lng_label_sys_user_role_10}:</th>
                <td>{$sys_user_role_10_input}</td>
            </tr>
        </table>
    </fieldset>
</form>