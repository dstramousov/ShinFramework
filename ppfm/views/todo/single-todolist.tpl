{foreach from=$todoListSingle item=todoItem}
   <li id="item_{$todoItem.idList}" class="b-single-todo-item {if $todoItem.status == 'c'} strikeItem {/if}" position="{$todoItem.position}" >
       <div class="b-single-todo-checkbox">
            <input type="checkbox" name="" id="" value="" onclick="clickOnCheckbox(this, {$todoItem.idList}, 'item')" {if $todoItem.status == 'c'} checked="checked" {/if}>
       </div>
       
       
       <div class="b-single-todo-item-name {if $todoItem.status == 'c'} strikeItem {/if}">
            <div class="b-todo-item-name-inner" onclick="loadTodoItems({$todoItem.idList})">{$todoItem.title}</div>
       </div>
       
       <div class="b-todo-percentage">
            <div class="b-inner">
                <div class="b-progress">{$todoItem.progress}%</div>
                <div class="b-inner-percentage" style="width: {$todoItem.progress}%;"></div>
            </div>
        </div>
       
       <div class="single-todo-actions">
            <a href="javascript:void(0);" onclick="openDeleteDialog({$todoItem.idList}, 'item');" class="delete"></a>
            <div class="clear"></div>
       </div>
       <div class="clear"></div>
   </li>    
{/foreach}

{literal}
    <script type="text/javascript">
        $(document).ready(function(){
    
            $('ul.b-single-todo-list li').mouseover(function(){
                if(this != undefined) {
                    highlightTodoItem(this);
                }    
            }).mouseout(function(){
                if(this != undefined) {
                    highlightTodoItem(this);
                }    
            }).click(function(){
                if(this != undefined) {
                    highlightCelectedItem(this);
                }    
            })
            
            $('ul.b-single-todo-list').sortable({
                stop: function(event, ui){
                    todoList.dropTodoList(event, ui, 'item');
                    
                    $('.b-single-todo-list li').removeClass('highlight-todo-item');         
                }
            });
            
            $('ul.b-single-todo-list-items').sortable({
                stop: function(event, ui){
                    todoList.dropTodoList(event, ui, 'sub_item');
                }
            });
            
            
            activeTodo = todoList.getAndMarkFirstLine();
            
            // load todo items for first todo list
            todoList.loadToDoItems(activeTodo);
            // get information about todo list
            todoList.getTodoData(activeTodo);
        })
    </script>

{/literal}
