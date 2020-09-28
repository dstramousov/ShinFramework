<form action="{php}echo prep_url(base_url().'/menumanage/savemenuinfo');{/php}" method="post" class="sys-dialog">
    <table>
        <tr>
            <th></th>
            <td>
                <input type="hidden" name="sys_menu_idMenu_old"  value="{$sys_menu_idMenu}" id="sys_menu_idMenu_old" />
                <input type="hidden" name="sys_menu_idPanel_old" value="{$sys_menu_idPanel}" id="sys_menu_idPanel_old" />
                <input type="hidden" name="sys_menu_ico_old" value="{$sys_menu_ico}" id="sys_menu_ico_old"/>
            </td>
        </tr>
        <tr>
            <th>{$lng_label_sys_menu_id_menu}</th>
            <td>
                {$sys_menu_idMenu_input}&nbsp;<span class="last-rec">{$lng_label_sys_menu_last_rec}{$lastRec.idMenu}</span><br />
                <span class="validatetion-error" id="sys_menu_idMenu_error"></span> 
            </td>
        </tr>
        <tr>
            <th>{$lng_label_sys_menu_id_pabel}</th>
            <td>
                {$sys_menu_idPanel_input}&nbsp;<span class="last-rec">{$lng_label_sys_menu_last_rec}{$lastRec.idPanel}</span><br />
                <span class="validatetion-error" id="sys_menu_idPanel_error"></span>
            </td>
        </tr>
        {if !empty($sys_menu_ico)}
        <tr>
            <th>{$lng_label_sys_menu_old_ico}</th>
            <td><img src="{php}echo prep_url(SHIN_Core::$_config['core']['app_base_url'] . '/' . shinfw_folder() . '/images/');{/php}{$sys_menu_ico}" alt="{$sys_menu_ico}" title="{$sys_menu_ico}" width="16" height="16" /></td>
        </tr>
        {/if}
        <tr>
            <th>{$lng_label_sys_menu_new_ico}:</th>
            <td>
                <div id="imgUploader"></div>
            </td>
        </tr>
        <tr>
            <th>{$lng_label_sys_menu_panel_header}:</th>
            <td>
                {$sys_menu_panel_header_input}<br />
                <span class="validatetion-error" id="sys_menu_panel_header_error"></span>
            </td>
        </tr>
        <tr>
            <th>{$lng_label_sys_menu_panel_collapsed}:</th>
            <td>
                {$sys_menu_collapsed_input}<br />
                <span class="validatetion-error" id="sys_menu_collapsed_error"></span> 
            </td>
        </tr>
        <tr>
            <th>{$lng_label_sys_menu_panel_maximized}:</th>
            <td>
                {$sys_menu_maximized_input}<br />
                <span class="validatetion-error" id="sys_menu_maximized_error"></span>
            </td>
        </tr>
        <tr>
            <th>{$lng_label_sys_menu_panel_order_menu}:</th>
            <td>
                {$sys_menu_order_menu_input}<br />
                <span class="validatetion-error" id="sys_menu_order_menu_error"></span>
            </td>
        </tr>
        <tr>
            <th>{$lng_label_sys_menu_panel_column_menu}:</th>
            <td>
                {$sys_menu_column_menu_input}<br />
                <span class="validatetion-error" id="sys_menu_column_menu_error"></span> 
            </td>
        </tr>
        <tr>
            <th>{$lng_label_sys_menu_panel_color_class}:</th>
            <td>
                {$sys_menu_color_class_input}<br />
                <span class="validatetion-error" id="sys_menu_color_class_error"></span> 
            </td>
        </tr>
        <tr>
            <th>{$lng_label_sys_menu_panel_color_border}:</th>
            <td>
                {$sys_menu_color_border_class_input}<br />
                <span class="validatetion-error" id="sys_menu_color_border_class_error"></span> 
            </td>
        </tr>
        <tr>
            <th>{$lng_label_sys_menu_panel_color_bg}:</th>
            <td>
                {$sys_menu_color_bg_class_input}<br />
                <span class="validatetion-error" id="sys_menu_color_bg_class_error"></span>
            </td>
        </tr>
        <tr>
            <th>{$lng_label_sys_menu_panel_show}:</th>
            <td>
                {$sys_menu_show_close_input}<br />
                <span class="validatetion-error" id="sys_menu_show_close_error"></span>
            </td>
        </tr>
        <tr>
            <th>{$lng_label_sys_menu_panel_show_max}:</th>
            <td>
                {$sys_menu_show_maximize_input}<br />
                <span class="validatetion-error" id="sys_menu_show_maximize_error"></span>
            </td>
        </tr>
        <tr>
            <th>{$lng_label_sys_menu_panel_show_turn}:</th>
            <td>
                {$sys_menu_show_turn_input}<br />
                <span class="validatetion-error" id="sys_menu_show_turn_error"></span>
            </td>
        </tr>
        <tr>
            <th>{$lng_label_sys_menu_panel_show_info}:</th>
            <td>
                {$sys_menu_show_info_input}<br />
                <span class="validatetion-error" id="sys_menu_show_info_error"></span>
            </td>
        </tr>
    </fieldset>
</form>

{$jsdocready}