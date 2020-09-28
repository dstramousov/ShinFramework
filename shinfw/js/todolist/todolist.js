

function todoListClass(options){
    
    var options =   options;
    
    _makeAjaxRequest = function(data, callback, dataType){
        
        if(dataType == undefined) {
            dataType = 'json';
        }
        
        $.ajax({
           type:        "POST",
           url:         options.url,
           data:        data,
           dataType:    dataType,
           success:     callback,
           beforeSend:  function(){
                blockUI()         
           },
           complete:    function(){
                unBlockUI();                
           }
         });
    }
    
    
    /**
     *  Supply a callback function to handle the stop event as an init option. 
     */
    this.dropTodoList = function(event, ui, type){
        
        var items   =   new Array();
        
        if(options.mode == 'tree') {
            $('ul.b-todo-list li.b-todo-item').each(function(){
                var idData  =   $(this).attr('id').split('_');
                var index   =   $(this).index();
                
                items.push({
                    item:   idData[1],
                    index:  index
                })
            })    
        } else {
            
            if(type == 'item') {
                $('ul.b-single-todo-list li').each(function(){
                    var idData  =   $(this).attr('id').split('_');
                    var index   =   $(this).index();
                    
                    items.push({
                        item:   idData[1],
                        index:  index
                    })
                })
            } else {
                $('ul.b-single-todo-list-items li').each(function(){
                    var idData  =   $(this).attr('id').split('_');
                    var index   =   $(this).index();
                    
                    items.push({
                        item:   idData[1],
                        index:  index
                    })
                })    
            }    
        }
         
        
        data    =   {
            action: 'save-position',
            data:   items,
            type:   type
        }
        
        _makeAjaxRequest(data, function(json){
            
            if(!json.result) {
                _showError(json.message);    
            }
        })  
        
    }
    
    /**
     *  add one Todo list 
     */
    this.addTodoList = function(title, callback) {
        
        if(isDebug) {
            console.debug('action: add', 'title:' + title);
        }
        
        data    =   {
            action: 'add-todo',
            title:   title
        }
        
        _makeAjaxRequest(data, function(json){
            
            if(json.result) {
                callback();
                _showMessage(json.message);
                _loadToDoList();
            } else {
                _showError(json.message);    
            }
        })
        
    }
    
    /**
     *  add one Todo Item 
     */
    this.addTodoItem = function(params, callback) {
        
        if(isDebug) {
            console.debug('action: add item', 'title:' + title);
        }
        
        data    =   {
            action:                 'add-todo-item',
            title:                  params.title,
            percantage:             params.percantage,
            completition_date:      params.completition_date,
            real_completition:      params.real_completition,
            priority:               params.priority,
            note:                   params.note,
            todo_id:                activeTodo   
        }
        
        _makeAjaxRequest(data, function(json){
            
            if(json.result) {
                callback();
                _showMessage(json.message);
                // reload todo items and todo list
                if(options.mode != 'tree') {
                    _loadToDoItems(activeTodo);
                    _loadToDoList();
                } else {
                    _loadToDoList();
                }
            } else {
                _showError(json.message);
            }
        })
        
    }
    
    /**
     * delete one Todo list or Item
     * 
     * @param id - elemet id
     * @param elemt type - item|subitem
     */
    this.deleteTodoListOrItem = function(id, type){
        
        if(isDebug) {
            console.debug('action: delete', 'item:' + id, 'type:' + type);
        }
        
        data    =   {
            action: 'delete',
            type:   type,
            id:     id
        }
        
        _makeAjaxRequest(data, function(json){
            
            if(json.result) {
                _showMessage(json.message);
            } else {
                _showError(json.message);    
            }        
        });
        
        return true;    
    }
    
    /**
     * close Todo list or Todo Item
     * 
     * @param id - elemet id
     * @param elemt type - item|subitem
     */
    this.closeTodoListOrItem = function(state, id, type){
        
        if(isDebug) {
            console.debug('action: close', 'state:' + state, 'item:' + id, 'type:' + type);
        }
        
        data = {
            action: 'close-item',
            type:   type,
            id:     id,
            state:  state
        }
        
        _makeAjaxRequest(data, function(json){
            
            if(json.result){
                _showMessage(json.message);
                
                if(type == 'item') {
                    _getTodoData(id);
                    _loadToDoItems(id); 
                } else {
                    _getTodoItemData(id);    
                }
            } else {
                _showError(json.message);        
            }    
        })
        
    }
    
    /**
     * change one Todo list or Item
     * 
     * @param id - elemet id
     * @param elemt type - item|subitem
     * @params all params in object
     */
    this.modifyTodoListOrItem = function(id, type, params, callback){
        if(isDebug) {
            console.debug('action: modify', 'id:' + id, 'type:' + type);
        }
        
        if(type == 'item') {
            data = {
                action: 'change',
                id:             id,
                type:           type,
                title:          params.title
            }
            _makeAjaxRequest(data, function(json){
                
                if(json.result){
                    callback();
                    _showMessage(json.message);
                    
                    _loadToDoList();
                    
                    if(options.mode == 'single') {
                        _loadToDoItems(activeTodo);
                        _getTodoData(activeTodo);
                    }
                    
                } else {
                    _showError(json.message);    
                }    
            });    
        } else {
            
            data = {
                action: 'change',
                id:             id,
                type:           type,
                title:          params.title,
                per:            params.per,
                date_complete:  params.date_complete,
                r_date_complete:params.r_date_complete,
                priority:       params.priority,
                note:           params.note
            
            }
            _makeAjaxRequest(data, function(json){
                
                if(json.result){
                    callback();
                    _showMessage(json.message);
                    
                    if(options.mode == 'single') {
                        _loadToDoList();
                        _loadToDoItems(activeTodo);
                    } else {
                        _getTodoItemData(id);
                    }    
                } else {
                    _showError(json.message);    
                }    
            });    
                
        }
        
        
        return true;   
    }
    
    /**
     * load todo items list
     * 
     * @oaram id - todo list id
     */
    this.loadToDoItems = _loadToDoItems = function(id){
        
        //save active id
        
        data    =   {
            action: 'load-items',
            id:     id
        }
        
        _makeAjaxRequest(data, function(html){
            if(options.mode == 'tree') {
                        
            } else {
                $('ul.b-single-todo-list-items li').remove();
                $(html).appendTo('ul.b-single-todo-list-items');
            }
        }, 'html');                
    }
    
    /**
     * load todo list
     */
    this.loadToDoList  = _loadToDoList = function(){
        
        data    =   {
            action: 'load-todo-list',
            mode:   options.mode
        }
               
        _makeAjaxRequest(data, function(html){
            
            if(options.mode == 'tree') {
                
                $('ul.b-todo-list  li').remove();
                $(html).appendTo('ul.b-todo-list');
                
                _markTodoLineById(activeTodo);
                
                toggleSubItems(activeTodo);
            
            } else {
                
                $('ul.b-single-todo-list li').remove();
                $(html).appendTo('ul.b-single-todo-list');
                
                _markTodoLineById(activeTodo);
                
            }
        }, 'html');    
    } 
    
    /**
     * get information about todo list
     * 
     * @param id - todo list id
     */
    this.getTodoData   = _getTodoData =    function(id, dialogFunc) {
        
        var result    =   null;
        
        data    =   {
            action: 'get-todo-info',
            id:     id
        }
        
        _makeAjaxRequest(data, function(json){
            
            if(options.mode == 'tree') {
                $('#title_edit').val(json.data.title);    
                $('#percantage_edit').text(json.data.progress);
                
                $('#dialog_title_edit').text(json.data.title);
                
                $('#dialog_todo_item_type_edit').val('item');
                $('#dialog_todo_item_id_edit').val(json.data.idList);
                
                if(dialogFunc != undefined) {
                    dialogFunc();
                }
                
            } else {
                if(json.result) {
                    $('#title_edit').text(json.data.title);    
                    $('#percantage_edit').text(json.data.progress);
                    
                    $('#dialog_title_edit').val(json.data.title);
                    $('#dialog_todo_item_type_edit').val('item');
                    $('#dialog_todo_item_id_edit').val(id);
                        
                
                    if(dialogFunc != undefined) {
                        dialogFunc();
                    }
                
                } else {
                    _showMessage(json.message);        
                }    
            }
        });
            
    }
    
    this.getTodoItemData = _getTodoItemData = function(id, target, dialogId){
        
        data    =   {
            action: 'get-todoitem-info',
            id:     id
        }
        
        _makeAjaxRequest(data, function(json){
            
            if(options.mode == 'tree') {
                    
                if(target == undefined) {
                    
                    $('#subitem_' + id + ' .b-todo-item-name-inner').text(json.data.todoItem.item);
                    $('#subitem_' + id + ' .b-progress').text(json.data.todoItem.progress + '%');
                    $('#subitem_' + id + ' .b-sub-inner-percentage').css('width', json.data.todoItem.progress + '%');
                    
                    // update details informtion
                    
                    $('#subitem_' + id + ' .todo-item-details #detailsCompletitionDate').val(json.data.todoItem.completitionDate);
                    $('#subitem_' + id + ' .todo-item-details #detailsRealCompletitionDate').val(json.data.todoItem.realCompletitionDate);
                    $('#subitem_' + id + ' .todo-item-details #priority').val(json.data.todoItem.detailsPriority);
                    $('#subitem_' + id + ' .todo-item-details #detailsNote').val(json.data.todoItem.note);
                    
                    if(json.data.todoItem.progress == 100) {
                        $('#subitem_' + id).addClass('strikeItem');    
                        $('#subitem_' + id + ' .b-todo-subitem-name').addClass('strikeItem');
                        
                        $('#subitem_' + id).find(':checkbox').attr('checked', true);     
                    } else {
                        $('#subitem_' + id).removeClass('strikeItem');
                        $('#subitem_' + id + ' .b-todo-subitem-name').removeClass('strikeItem');
                        
                        $('#subitem_' + id).find(':checkbox').attr('checked', false);
                    }
                    
                    $('#item_' + json.data.todoList.idList + ' .todolist .b-progress').text(json.data.todoList.progress);
                    $('#item_' + json.data.todoList.idList + ' .todolist .b-inner-percentage').css('width', json.data.todoList.progress + '%');
                    
                    if(json.data.todoList.progress == 100) {
                        $('#item_' + json.data.todoList.idList).addClass('strikeItem');
                        $('#item_' + json.data.todoList.idList + ' .b-todo-item-name').addClass('strikeItem');
                        $('#item_' + json.data.todoList.idList + ' .b-count-sub-items').addClass('strikeItem');
                        
                        $('#item_' + json.data.todoList.idList).find(':checkbox').attr('checked', true);     
                    } else {
                        
                        $('#item_' + json.data.todoList.idList).removeClass('strikeItem');    
                        $('#item_' + json.data.todoList.idList + ' .b-todo-item-name').removeClass('strikeItem');
                        $('#item_' + json.data.todoList.idList + ' .b-count-sub-items').removeClass('strikeItem');
                        
                        
                        $('#item_' + json.data.todoList.idList).find(':checkbox:first').attr('checked', false);     
                    }
                
                } else if(target != undefined) {
                    
                    $('#title_item_edit').val(json.data.todoItem.item);
                    $('#percantage_item_edit').val(json.data.todoItem.progress);
                    $('#completition_date_item_edit').val(json.data.todoItem.completitionDate);
                    $('#real_completition_date_item_edit').val(json.data.todoItem.realCompletitionDate);
                    $('#priority_item_edit').val(json.data.todoItem.priority);
                    $('#note_item_edit').val(json.data.todoItem.note);
                    
                    $('#' + dialogId).dialog('open');
                } 
            } else {
                
                if(target == undefined) {
                    
                    $('#item_' + json.data.todoList.idList + ' .b-progress').text(json.data.todoList.progress + '%');
                    $('#item_' + json.data.todoList.idList + ' .b-inner-percentage').css('width', json.data.todoList.progress + '%');
                    
                    
                    if(json.data.todoList.progress == 100) {
                        $('#item_' + json.data.todoList.idList).addClass('strikeItem');
                        $('#item_' + json.data.todoList.idList + ' .b-single-todo-item-name').addClass('strikeItem');
                        
                        $('#item_' + json.data.todoList.idList).find(':checkbox').attr('checked', true);    
                    } else {
                        
                        $('#item_' + json.data.todoList.idList).removeClass('strikeItem');    
                        $('#item_' + json.data.todoList.idList + ' .b-single-todo-item-name').removeClass('strikeItem');
                        
                        $('#item_' + json.data.todoList.idList).find(':checkbox:first').attr('checked', false)    
                    }
                } else {
                    
                    $('#title_item_edit').val(json.data.todoItem.item);
                    $('#percantage_item_edit').val(json.data.todoItem.progress);
                    $('#completition_date_item_edit').val(json.data.todoItem.completitionDate);
                    $('#real_completition_date_item_edit').val(json.data.todoItem.realCompletitionDate);
                    $('#priority_item_edit').val(json.data.todoItem.priority);
                    $('#note_item_edit').val(json.data.todoItem.note);
                    
                    $('#' + dialogId).dialog('open');    
                }    
            }
        });
    } 
    
    /**
     * get first line id and mark this first line
     */
    this.getAndMarkFirstLine =    function(){
        
        if(options.mode == 'single') {
            var attrData = $('.b-single-todo-list li:first-child').addClass('highlight-selected-todo-item').attr('id').split('_');
        } else {
            var attrData = $('.b-todo-list > li:first-child').addClass('highlight-selected-todo-item').attr('id').split('_');    
        }
        
        return attrData[1];    
    }
    
    /**
     * mark todo line by id
     * 
     * @param id - todo list id
     */
    _markTodoLineById =   function(id) {
        if(options.mode == 'single') {
            $('.b-single-todo-list #item_' + id).addClass('highlight-selected-todo-item');
        } else {
            $('.b-todo-list #item_' + id).addClass('highlight-selected-todo-item');    
        }    
    }
    
    
    _showError  =   function(message){
        $('tr td div').hide();
        
        var error   =   '';
        
        for(index in message) {
            $div = $('tr td #' + index).parent().find('div');
                           
                   $($div).text(message[index]);
                   $($div).show();
        }
    }
    
    _showMessage = function(message){
        $('tr td div').hide();
        alert(message);    
    }

}
