{foreach from=$todoItemList item=todoItem}
<li id="subitem_{$todoItem.idList}" class="b-single-todo-item" position="{$todoItem.position}">
    <div class="b-toggle-todolist-item" onclick="toggleInformation({$todoItem.idList});"></div>
                                
    <div class="b-single-todo-checkbox">
        <input type="checkbox" onclick="clickOnCheckbox(this, {$todoItem.idList}, 'sub_item')" value="" id="" name="" {if $todoItem.status == 'c'} checked="checked" {/if}>
    </div>
    
    <div class="b-single-todo-item-name {if $todoItem.status == 'c'} strikeItem {/if}">
        <div class="b-todo-item-name-inner">{$todoItem.item}</div>
    </div>
    
    <div class="b-todo-percentage">
        <div class="b-inner">
            <div class="b-progress">{$todoItem.progress}%</div>
            <div style="width: {$todoItem.progress}%;" class="b-sub-inner-percentage"></div>
        </div>
    </div>
    
    <div class="single-todo-actions">
        <a class="edit" onclick="openTodoItemEditDialog({$todoItem.idList}, 'sub_item', '{$todoItem.item}', {$todoItem.progress})" href="javascript:void(0);"></a>
        <a class="delete" onclick="openDeleteDialog({$todoItem.idList}, 'sub_item');" href="javascript:void(0);"></a>
        <div class="clear"></div>
    </div>
    
    <div class="todo-item-details">
        <table>
            <tr>
                <td>{$lng_label_completition_date}</td>
                <td>
                    {$todoItem.completitionDate}
                </td>
            </tr>
            <tr>
                <td>{$lng_label_real_completition_date}</td>
                <td>
                    {$todoItem.realCompletitionDate}
                </td>
            </tr>
            <tr>
                <td>{$lng_label_priority}</td>
                <td>
                    {$todoItem.priority}
                </td>
            </tr>
            <tr>
                <td>{$lng_label_note}</td>
                <td>
                    {$todoItem.note}
                </td>
            </tr>
        </table>
    </div>
                                
    <div class="clear"></div>
</li>
{/foreach}