<div class="sys-dialog">
    <table>
        <tr>
            <th></th>
            <td>
                <input type="hidden" name="sys_menusettings_idMenu_old"  value="{$sys_menusettings_idMenu}" id="sys_menusettings_idMenu_old" />
                <input type="hidden" name="sys_menusettings_idUser_old"  value="{$sys_menusettings_idUser}" id="sys_menusettings_idUser_old" />
                <input type="hidden" name="sys_menusettings_idPanel_old" value="{$sys_menusettings_idPanel}" id="sys_menusettings_idPanel_old" />
            </td>
        </tr>
        <tr>
            <th>{$lng_label_sys_menu_id_menu}</th>
            <td>
                {$sys_menusettings_idMenu_input}<br />
                <span class="validatetion-error" id="sys_menusettings_idMenu_error"></span> 
            </td>
        </tr>
        <tr>
            <th>{$lng_label_sys_menu_user_name}</th>
            <td>
                {$sys_menusettings_idUser_input}<br />
                <span class="validatetion-error" id="sys_menusettings_idUser_error"></span> 
            </td>
        </tr>
        <tr>
            <th>{$lng_label_sys_menu_id_pabel}</th>
            <td>
                {$sys_menusettings_idPanel_input}{$lng_label_sys_menu_last_rec}{$lastRec.idPanel}<br />
                <span class="validatetion-error" id="sys_menusettings_idPanel_error"></span>
            </td>
        </tr>
        <tr>
            <th>{$lng_label_sys_menu_panel_collapsed}:</th>
            <td>
                {$sys_menusettings_collapsed_input}<br />
                <span class="validatetion-error" id="sys_menusettings_collapsed_error"></span>
            </td>
        </tr>
        <tr>
            <th>{$lng_label_sys_menu_panel_maximized}:</th>
            <td>
                {$sys_menusettings_maximized_input}<br />
                <span class="validatetion-error" id="sys_menusettings_maximized_error"></span> 
            </td>
        </tr>
        <tr>
            <th>{$lng_label_sys_menu_panel_order_menu}:</th>
            <td>
                {$sys_menusettings_order_menu_input}<br />
                <span class="validatetion-error" id="sys_menusettings_order_menu_error"></span>
            </td>
        </tr>
        <tr>
            <th>{$lng_label_sys_menu_panel_column_menu}:</th>
            <td>
                {$sys_menusettings_column_menu_input}<br />
                <span class="validatetion-error" id="sys_menusettings_column_menu_error"></span>
            </td>
        </tr>
        <tr>
            <th>{$lng_label_sys_menu_panel_color_class}:</th>
            <td>
                {$sys_menusettings_color_class_input}<br />
                <span class="validatetion-error" id="sys_menusettings_color_class_error"></span> 
            </td>
        </tr>
        <tr>
            <th>{$lng_label_sys_menu_panel_color_border}:</th>
            <td>
                {$sys_menusettings_color_border_class_input}<br />
                <span class="validatetion-error" id="sys_menusettings_color_border_class_error"></span> 
            </td>
        </tr>
        <tr>
            <th>{$lng_label_sys_menu_panel_color_bg}:</th>
            <td>
                {$sys_menusettings_color_bg_class_input}<br />
                <span class="validatetion-error" id="sys_menusettings_color_bg_class_error"></span> 
            </td>
        </tr>
        <tr>
            <th>{$lng_label_sys_menu_panel_show}:</th>
            <td>
                {$sys_menusettings_show_close_input}<br />
                <span class="validatetion-error" id="sys_menusettings_show_close_error"></span>
            </td>
        </tr>
        <tr>
            <th>{$lng_label_sys_menu_panel_show_max}:</th>
            <td>
                {$sys_menusettings_show_maximize_input}<br />
                <span class="validatetion-error" id="sys_menusettings_show_maximize_error"></span>
            </td>
        </tr>
        <tr>
            <th>{$lng_label_sys_menu_panel_show_turn}:</th>
            <td>
                {$sys_menusettings_show_turn_input}<br />
                <span class="validatetion-error" id="sys_menusettings_show_turn_error"></span>
            </td>
        </tr>
        <tr>
            <th>{$lng_label_sys_menu_panel_show_info}:</th>
            <td>
                {$sys_menusettings_show_info_input}<br />
                <span class="validatetion-error" id="sys_menusettings_show_info_error"></span>
            </td>
        </tr>
    </fieldset>
</div>