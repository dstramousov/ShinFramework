{foreach from=$appInfo item=app}
    <div class="info-block">
        <table>
            <tr>
                <th>{$lng_label_sys_app_path}</th>
                <td style="width: 100px;">{$app.path}</td>
                <th>{$lng_label_sys_app_size}</th>
                <td style="width:80px;">{$app.size}</td>
                <th>{$lng_label_sys_app_files_count}</th>
                <td style="width:50px;">{$app.count}</td>
                <th>{$lng_label_sys_app_dirs_count}</th>
                <td style="width:50px;">{$app.dircount}</td>
            </tr>
        </table>
    </div>
{/foreach}