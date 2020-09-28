{foreach from=$todoList item=todoItem}
     <li id="item_{$todoItem.idList}" class="b-todo-item" position="{$todoItem.position}">
        {if count($todoItem.items) > 0}
            <div class="b-toggle-todo-item" onclick="toggleSubItems({$todoItem.idList});"></div>
        {else}
            <div class="b-toggle-todo-item-empty">&nbsp;</div>
        {/if}
            <div class="b-todo-checkbox">
                <input type="checkbox" name="" id="" value="" onclick="clickOnCheckbox(this, {$todoItem.idList}, 'item')" {if $todoItem.status == 'c'} checked="checked" {/if}>
            </div>
            
            <div class="b-todo-item-name {if $todoItem.status == 'c'} strikeItem {/if}">
                <div class="b-todo-item-name-inner" onclick="todoList.getTodoData({$todoItem.idList});">{$todoItem.title}</div>
            </div>
            
            <div class="b-count-sub-items {if $todoItem.status == 'c'} strikeItem {/if}">{$todoItem.count} tasks</div>
            
            <div class="b-todo-percentage todolist">
                <div class="b-inner">
                    <div class="b-progress">{$todoItem.progress}%</div>
                    <div class="b-inner-percentage" style="width: {$todoItem.progress}%;"></div>
                </div>
            </div>
            
            <div class="todo-actions">
                <a href="javascript:void(0);" onclick="showEditDialog({$todoItem.idList}, 'item')" class="edit"></a>
                <a href="javascript:void(0);" onclick="openDeleteDialog({$todoItem.idList}, 'item');" class="delete"></a>
                <a href="javascript:void(0);" onclick="openAddItemDialog();" class="add"></a>
                <div class="clear"></div>
            </div>
            
            {if count($todoItem.items) > 0}
                <div class="b-todo-item-subitems">
                    <ul class="b-todo-subitem-list">
                        {foreach from=$todoItem.items item=todoSubItem}
                            <li id="subitem_{$todoSubItem.idList}" class="b-todo-subitem">
                                <div class="b-toggle-todolist-item" onclick="toggleInformation({$todoSubItem.idList});"></div>
                                <div class="b-todo-item-checkbox">
                                    <input type="checkbox" name="" id="" value="" onclick="clickOnCheckbox(this, {$todoSubItem.idList}, 'sub_item')" {if $todoSubItem.status == 'c'} checked="checked" {/if}>
                                </div>
                                
                                <div class="b-todo-subitem-name {if $todoSubItem.status == 'c'} strikeItem {/if}">
                                    <div class="b-todo-item-name-inner">{$todoSubItem.item}</div>
                                </div>
                                
                                <div class="b-todo-percentage">
                                    <div class="b-inner">
                                        <div class="b-progress">{$todoSubItem.progress}%</div>
                                        <div class="b-sub-inner-percentage" style="width: {$todoSubItem.progress}%;"></div>
                                    </div>
                                </div>
                                
                                <div class="todo-actions">
                                    <a href="javascript:void(0);" onclick="openTodoItemEditDialog({$todoSubItem.idList}, 'sub_item');" class="edit"></a>
                                    <a href="javascript:void(0);" onclick="openDeleteDialog({$todoSubItem.idList}, 'sub_item');" class="delete"></a>
                                    <div class="clear"></div>
                                </div>
                                
                                <div class="todo-item-details">
                                    <table>
                                        <tr>
                                            <td>{$lng_label_completition_date}</td>
                                            <td>
                                                <input type="text" name="" value="{$todoSubItem.completitionDate}" id="detailsCompletitionDate" disabled="disabled">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>{$lng_label_real_completition_date}</td>
                                            <td>
                                                <input type="text" name="" value="{$todoSubItem.realCompletitionDate}" id="detailsRealCompletitionDate" disabled="disabled">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>{$lng_label_priority}/td>
                                            <td>
                                                <input type="text" name="" value="{$todoSubItem.priority}" id="detailsPriority" disabled="disabled">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>{$lng_label_note}</td>
                                            <td>
                                                <textarea disabled="disabled" id="detailsNote">{$todoSubItem.note}</textarea>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                
                                <div class="clear"></div>
                            </li>
                        {/foreach}
                    </ul>
                </div>
            {/if}
        <div class="clear"></div>
     </li>
{/foreach}

{literal}
    <script type="text/javascript">
        
        $(document).ready(function(){
            $('ul.b-todo-list li').mouseover(function(){
                highlightTodoItem(this);    
            }).mouseout(function(){
                highlightTodoItem(this);    
            }).click(function(){
                highlightCelectedItem(this);    
            })
            
            $('ul.b-todo-list').sortable({
                stop: function(event, ui){
                    todoList.dropTodoList(event, ui, 'item');
                    
                    $('ul.b-todo-list li').removeClass('highlight-todo-item');
                }
            });
            
            activeTodo = todoList.getAndMarkFirstLine();
            
            // get information about todo list
            todoList.getTodoData(activeTodo);
        })
    </script>

{/literal}