<table align="left" width="100%">
    <tr>
		<td style="background-color: #f4f1a6;" width="90%">{$lng_label_main_page_todo_panel_title_field}</td>
        <td style="background-color: #f4f1a6;" width="10%">{$lng_label_main_page_todo_panel_progress_field}</td>
    </tr>
{foreach from=$todoListData item=todoIten}
    <tr>
        <td>{$todoIten.title}</td>
        <td>{$todoIten.progress} %</td>
    </tr>
{/foreach}
</table>