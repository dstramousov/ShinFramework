
/**
 *  toggle sub item list
 * 
 *  @param itemId - id of todo list 
 */
function toggleSubItems(itemId){
    
    if($('.b-todo-list li#item_' + itemId + ' .b-todo-item-subitems').css('display') == 'none') {
        $('.b-todo-list li#item_' + itemId + ' .b-todo-item-subitems').show();
        $('.b-todo-list li#item_' + itemId + ' .b-toggle-todo-item').addClass('item-toogle');
    } else {
        $('.b-todo-list li#item_' + itemId + ' .b-todo-item-subitems').hide();
        $('.b-todo-list li#item_' + itemId + ' .b-toggle-todo-item').removeClass('item-toogle'); 
    }    
}

/**
 *  toggle information for each sub item
 * 
 *  @param itemId - id of todo list 
 */
function toggleInformation(itemId){
    
    if(mode == 'tree') {
        if($('.b-todo-item-subitems li#subitem_' + itemId + ' .todo-item-details').css('display') == 'none') {
            $('.b-todo-item-subitems li#subitem_' + itemId + ' .todo-item-details').show();
            $('.b-todo-item-subitems li#subitem_' + itemId + ' .b-toggle-todolist-item').addClass('item-toogle');
        } else {
            $('.b-todo-item-subitems li#subitem_' + itemId + ' .todo-item-details').hide();
            $('.b-todo-item-subitems li#subitem_' + itemId + ' .b-toggle-todolist-item').removeClass('item-toogle'); 
        }
    } else {
        if($('.b-single-todo-list-items li#subitem_' + itemId + ' .todo-item-details').css('display') == 'none') {
            $('.b-single-todo-list-items li#subitem_' + itemId + ' .todo-item-details').show();
            $('.b-single-todo-list-items li#subitem_' + itemId + ' .b-toggle-todolist-item').addClass('item-toogle');
        } else {
            $('.b-single-todo-list-items li#subitem_' + itemId + ' .todo-item-details').hide();
            $('.b-single-todo-list-items li#subitem_' + itemId + ' .b-toggle-todolist-item').removeClass('item-toogle'); 
        }    
    }    
}

/**
 * highlight one todo list item
 * 
 * @param - element that need to highlight 
 */
function highlightTodoItem(target){
    if($(target).hasClass('highlight-todo-item')){
        $(target).removeClass('highlight-todo-item');
    } else {
        $(target).addClass('highlight-todo-item'); 
    }        
}

/**
 * highlight one selected todo list item
 * 
 * @param - element that need to highlight 
 */
function highlightCelectedItem(target){
    
    var idData      =   $(target).attr('id').split('_');
        activeTodo  =   idData[1];
    
    if(mode == 'single') {
        $('.b-single-todo-list li').removeClass('highlight-selected-todo-item');
        $(target).toggleClass("highlight-selected-todo-item");
    } else {
        
        $('.b-todo-list li').removeClass('highlight-selected-todo-item');
        $(target).toggleClass("highlight-selected-todo-item");    
    }

}

/**
 * added stroke class to some elements
 * 
 * @target - checkbox element
 * @id - todo id or todo item id
 * @type - type of element - item|sub_item 
 */
function clickOnCheckbox(target, id, type) {
    
    var state = $(target).attr('checked'); 
    
    switch(type) {
        case 'item':
            
            if(mode == 'tree') {
                if(state) {
                    $('#item_' + id + ' .b-todo-item-name').addClass('strikeItem');
                    $('#item_' + id + ' .b-count-sub-items').addClass('strikeItem');
                    
                    $('#item_' + id + ' .b-progress').text('100%');
                    $('#item_' + id + ' .b-inner-percentage').css('width', '100%');
                
                    /* close all sub items */
                    $('#item_' + id + ' li').each(function(){
                        $(this).find('.b-todo-subitem-name').addClass('strikeItem');
                        $(this).find('.b-sub-inner-percentage').css('width', '100%');
                        
                        $(this).find(':checkbox').attr('checked', state);
                        
                        
                    })
                } else {
                    
                    $('#item_' + id + ' .b-todo-item-name').removeClass('strikeItem');
                    $('#item_' + id + ' .b-count-sub-items').removeClass('strikeItem');
                    
                    $('#item_' + id + ' .b-progress').text('0%');
                    $('#item_' + id + ' .b-inner-percentage').css('width', '0%');
                
                    /* close all sub items */
                    $('#item_' + id + ' li').each(function(){
                        $(this).removeClass('strikeItem');
                        $(this).find('.b-todo-subitem-name').removeClass('strikeItem');
                        $(this).find('.b-sub-inner-percentage').css('width', '0%');
                        
                        $(this).find(':checkbox').attr('checked', state);
                    })    
                }
                
                /* update server side state */
                todoList.closeTodoListOrItem(state, id, type);
            
            } else {
            
                /* update server side state */
                todoList.closeTodoListOrItem(state, id, type);    
            
                if(state) {
                    
                    $('ul.b-single-todo-list #item_' + id + ' .b-single-todo-item-name ').addClass('strikeItem');
                    
                    $('ul.b-single-todo-list #item_' + id + ' .b-inner-percentage').css('width', '100%');
                    $('ul.b-single-todo-list #item_' + id + ' .b-progress').text('100%');
                } else {
                    
                    $('ul.b-single-todo-list #item_' + id + ' .b-single-todo-item-name ').removeClass('strikeItem');
                    
                    $('ul.b-single-todo-list #item_' + id + ' .b-inner-percentage').css('width', '0%');
                    $('ul.b-single-todo-list #item_' + id + ' .b-progress').text('0%');    
                }
                
            }
            break;
        
        case 'sub_item':
        
            if(mode == 'tree') {
                
                if(state) {
                    $('#subitem_' + id + ' .b-todo-subitem-name').addClass('strikeItem');
                    $('#subitem_' + id + ' .b-progress').text('100%');
                    $('#subitem_' + id + ' .b-sub-inner-percentage').css('width', '100%');
                    
                } else {
                    $('#subitem_' + id + ' .b-todo-subitem-name').removeClass('strikeItem');
                    $('#subitem_' + id + ' .b-progress').text('0%');
                    $('#subitem_' + id + ' .b-sub-inner-percentage').css('width', '0%');
                }
                
                /* if this is last sub item close all task */
                
                if(state) {
                    
                    var countVisibleElements = $('#subitem_' + id).parent().find('.b-todo-subitem-name').not('.strikeItem').length;
                    var parentLi             = $('#subitem_' + id ).parent().parent().parent();
                    var idData               = $(parentLi).attr('id').split('_');
                    
                    if(countVisibleElements == 0) {
                    
                        $('#item_' + idData[1] + ' .b-todo-item-name').addClass('strikeItem');
                        $('#item_' + idData[1] + ' .b-count-sub-items').addClass('strikeItem');
                        $('#item_' + idData[1] + ' :checkbox').attr('checked', 'checked');
                        /* update server side state */
                        todoList.closeTodoListOrItem(true, idData[1], 'item');
                        
                    } 
                    
                    /* update server side state */
                    todoList.closeTodoListOrItem(state, id, type);
                    
                } else {
                    
                    /* update server side state */
                    todoList.closeTodoListOrItem(state, id, type);
                        
                }
            } else {
                
                if(state) {
                    $('ul.b-single-todo-list-items #subitem_' + id + ' .b-single-todo-item-name').addClass('strikeItem');
                    
                    $('ul.b-single-todo-list-items #subitem_' + id + ' .b-sub-inner-percentage').css('width', '100%');
                    $('ul.b-single-todo-list-items #subitem_' + id + ' .b-progress').text('100%');
                    
                } else {
                    $('ul.b-single-todo-list-items #subitem_' + id + ' .b-sub-inner-percentage').css('width', '0%');
                    $('ul.b-single-todo-list-items #subitem_' + id + ' .b-progress').text('0%');
                    
                    $('ul.b-single-todo-list-items #subitem_' + id + ' .b-single-todo-item-name').removeClass('strikeItem');
                    
                    
                }
                
                /* update server side state */
                todoList.closeTodoListOrItem(state, id, type);
                
            }
            
            
            break;
    }
    
}

/**
 * show edit dialog
 * 
 * @param id - elemt id that was edited
 * @param type - element type - item|subitem
 */
function showEditDialog(id, type){
    
    if(type == 'item') {
        todoList.getTodoData(id, openTodoEditDialog);
    } else {
                
    }
    
}


/**
 * hide edit dialog
 * 
 * @param id - element id that was edited
 * @param type - element type - item|subitem
 */
function closeEditDialog(id, type){
    
    if(type == 'item') {
        $('#item_' + id + ' .b-todo-item-name .b-todo-item-name-inner').show();
        $('#item_' + id + ' .b-todo-item-name .b-edit-todo').hide();
    } else {
        $('#subitem_' + id + ' .b-todo-subitem-name .b-todo-item-name-inner').show();
        $('#subitem_' + id + ' .b-todo-subitem-name .b-edit-todo').hide();    
    }    
}

/**
 * call todolist method to save new data
 * 
 * @param id - element id
 * @param type - element type - item|subitem
 */ 
function saveEditedData(id, type){
    
    if(type == 'item') {
        var newTitle = $('#item_' + id + ' .b-edit-todo input[type=text]').val();
    } else {
        var newTitle = $('#subitem_' + id + ' .b-edit-todo input[type=text]').val();    
    }
    
    todoList.modifyTodoListOrItem(id, type, newTitle, function(){
        if(type == 'item') {
            $('#item_' + id + ' .b-todo-item-name .b-todo-item-name-inner').text(newTitle);
        } else {
            $('#subitem_' + id + ' .b-todo-subitem-name .b-todo-item-name-inner').text(newTitle);    
        }
        
        closeEditDialog(id, type);    
    });
}

/**
 * call todolist method to delete data
 * 
 */
 
function deleteItem(){
    
    var id      = $('#deleted_item_id').val();
    var type    = $('#deleted_item_type').val();
    
    todoList.deleteTodoListOrItem(id, type);
    
    /*remove item from DOM */
    if(type == 'item') {
        $('#item_' + id).hide(300);    
    } else {
        $('#subitem_' + id).hide(300);        
    }
    
    closeDeleteDialog();
        
}


/**
 * open add ToDo list dialog
 */
function openAddDialog() {
    $('#dialog-add').dialog('open');
    $('#title_add').focus();    
}

/**
 * add new ToDo list record
 */
function addNewRecord(){
    
    var title = $('#title_add').val();
    
    if(mode == 'tree') {
        if(title != '') {
            todoList.addTodoList(title);
            closeAddDialog();
            
            $('#title_add').val('');    
        } else {
            $('#title_add').focus();    
        }
            
    } else {
        if(title != '') {
            todoList.addTodoList(title, function(){
                closeAddDialog();
            
                var attrData   =   $('.b-single-todo-list li:first-child').attr('id').split('_');
                
                // load todo items for first todo list
                todoList.loadToDoItems(attrData[1]);
                
                $('#title_add').val('');    
            });
        } else {
            $('#title_add').focus();    
        }    
    }
}

/**
 * close add ToDo list dialog
 */
function closeAddDialog(){
    $('#dialog-add').dialog('close');       
}


/**
 * close delete dialog
 */
function closeDeleteDialog(){
    $('#dialog-delete').dialog('close');
}

/**
 * open delete dialog
 * 
 * @param id - element id
 * @param type - element type - item|subitem
 */
function openDeleteDialog(id, type){
    
    $('#deleted_item_id').val(id);
    $('#deleted_item_type').val(type);
    
    $('#dialog-delete').dialog('open');
}

/**
 * open add item dialog
 */
function openAddItemDialog(){
    $('#dialog-add-item').dialog('open');    
    $('#item_title_add').focus();
    
}

/**
 * close add item dialog
 */
function closeAddItemDialog(){
    $('#dialog-add-item :input').val('');
    $('#dialog-add-item').dialog('close');           
}

/**
 * add new ToDo Item record
 */
function addNewItemRecord(){
    
    params  =   {
        title:              $('#item_title_add').val(),
        percantage:         $('#item_percantage_add').val(),   
        completition_date:  $('#item_completition_date_add').val(),   
        real_completition:  $('#item_real_completition_date_add').val(),   
        priority:           $('#item_priority_item_add').val(),   
        note:               $('#item_note_item_add').val()   
    }
    
    if(params.title != '') {
        todoList.addTodoItem(params, closeAddItemDialog);
        
    } else {
        $('#item_title_add').focus();    
    }        
}

/**
 * open edit todo dialog
 * 
 * @param id - element id
 * @param type - element type - item|subitem
 */
function openTodoEditDialog(){
    
    $('#dialog-edit').dialog('open');
    
    $('#dialog_title_edit').focus();    
}

function saveTodoEditDialogInfo(){
    
    var id      = $('#dialog_todo_item_id_edit').val();     
    var type    = $('#dialog_todo_item_type_edit').val();
    var title   = $('#dialog_title_edit').val();    
    
    if(title != '') {
        data = {
            title:  title
        };
        
        todoList.modifyTodoListOrItem(id, type, data, function(){
            closeTodoEditDialog();
        });
    } else {
        $('#dialog_title_edit').focus();    
    }
    
}

function hideEditButtons(){
    $('.dialog-edit-btns').hide();
    $('.ui-dialog-buttonpane').show();    
}

/**
 * save todo data
 */
function saveTodoListChanges(){
    
    var id      = $('#todo_item_id_edit').val();     
    var type    = $('#todo_item_type_edit').val();
    var title   = $('#title_edit').val();    
    var per     = $('#percantage_edit').val();
    
    if(title != '' && per != '') {
        data = {
            title:  title,
            per:    per    
        };
        
        todoList.modifyTodoListOrItem(id, type, data, function(){
            cancelEditing();    
        });
    } else {
        $('#title_edit').focus();    
    }
 }

/**
 * close add todo dialog
 */
function closeTodoEditDialog(){
    $('#dialog-edit').dialog('close');    
}


/**
 * open edit todo item dialog
 * 
 * @param id - element id
 * @param type - element type - item|subitem
 */
function openTodoItemEditDialog(id , type){
    
    todoList.getTodoItemData(id, 'dialog', 'dialog-item-edit');
    
    $('#todo_sub_item_id_edit').val(id);    
    $('#todo_sub_item_type_edit').val(type);
    
    $('#title_item_edit').focus();    
}

/**
 * save todo data
 */
function saveTodoItemChanges(){
    
    var id              = $('#todo_sub_item_id_edit').val();     
    var type            = $('#todo_sub_item_type_edit').val();
    var title           = $('#title_item_edit').val();    
    var per             = $('#percantage_item_edit').val();
    var dateComplete    = $('#completition_date_item_edit').val();
    var rDateComplete   = $('#real_completition_date_item_edit').val();
    var priority        = $('#priority_item_edit').val();
    var note            = $('#note_item_edit').val();
    
    if(title != '') {
        data = {
            title:          title,
            per:            per,
            date_complete:  dateComplete,
            r_date_complete:rDateComplete,
            priority:       priority,
            note:           note 
        };
        
        todoList.modifyTodoListOrItem(id, type, data, function(){
            closeTodoItemEditDialog();    
        });
    } else {
        $('#percantage_item_edit').focus();    
    }    
}  

/**
 * close todo item edit dialog
 */
function closeTodoItemEditDialog(){
    $('#dialog-item-edit').dialog('close');    
}

/**
 * laod todo items list
 */
function loadTodoItems(id){
    todoList.loadToDoItems(id);
    
    todoList.getTodoData(id);
    
}

function enableEditing() {
    todoList.getTodoData(activeTodo, openTodoEditDialog);    
}

function cancelEditing(){

    $('.show-btn').show();    
    $('.edit-btn').hide();    

    $('.b-todo-information input[type=text]').attr('disabled', 'disabled');
}










