
function crudClass(options){
    
    this.params         =   options;
    
    this.pk             =   {};
    
    this.instance       =   this;
    
    this.currentDialog  =   null;
    
    this.collectedData  =   new Array;
    
    
    /**
    *  internal protected ajax function that send all ajax calls
    */
     crudClass.prototype._runAjaxRequest = function(url, data, callback, type){
        
        var dataType = typeof type == 'undefined'      ? 'json'                       : type;
        var before   = 'ajax.before'   in this.params  ? this.params.ajax.before()    : function(){}; 
        var complete = 'ajax.complete' in this.params  ? this.params.ajax.complete()  : function(){}; 
        
        $.ajax({
                url:        url,
                dataType:   dataType,
                data:       data,
                type:       'POST',
                success:    callback,
                beforeSend: before,
                complete:   complete
        })    
    }
    
    /**
    * collect data from add or edit form
    * 
    * @dialogId - dialogId from which we collect data
    * @return array of data
    */
    crudClass.prototype.collectFormData = function(dialogId){
        
        data = {};
        
        with(this.params) {
            $('#' + general.tabName + '-' + dialogId + ' input,select:not(input),textarea').each(function(){
                if($(this).attr('id') != '') {
                    data[$(this).attr('id')] = $(this).val();
                }    
            });
        }
        
        return data;     
    }
    
    this.openDialog =   function(pkObject, dialogType) {
        switch(dialogType) {
            case 'edit':
                this.read('edit-dialog', pkObject, typeof beforeShowDialog   == 'function' ? beforeShowDialog    : null, 
                                                   typeof afterShowDialog    == 'function' ? afterShowDialog     : null, 
                                                   typeof beforeDialogClose  == 'function' ? beforeDialogClose   : null);
                break;
            case 'add':
                this.read('add-dialog', pkObject,  typeof beforeShowDialog   == 'function' ? beforeShowDialog    : null, 
                                                   typeof afterShowDialog    == 'function' ? afterShowDialog     : null, 
                                                   typeof beforeDialogClose  == 'function' ? beforeDialogClose   : null);
                break;
            case 'delete':
                this.params.general.dialogObj.open('delete-dialog', function(){
                    
                    // remove previous hidden inputs
                    $('div[id*="delete-dialog"] input[type=hidden]').remove();
                    
                    for(index in pkObject) {
                        $('div[id*="delete-dialog"]').append('<input type="hidden" name="' + index + '" value="' + pkObject[index] + '" />');
                    }
                    
                    typeof beforeShowDelete   == 'function' ? beforeShowDelete() : null;        
                });
                break;
        }
    }
    
    
    
    /**
    * read data method for adding
    */
    crudClass.prototype.read = function (dialogId, pkData, beforeSend, afterSend, beforeDialogClose){
        
        // 1. save dialog id
        this.currentDialog  =   dialogId;
        
        // run callback befor reading data
        typeof beforeSend == 'function' ? beforeSend() : null;
        
        with(this.params) {
            this._runAjaxRequest(dialogs.read.url, pkData, function(data){
                
                // 1. init callback befor close dialog
                $('#' + general.tabName + '-' + dialogId).dialog({beforeClose: function(){$('#' + general.tabName + '-' + dialogId).empty(); if (typeof beforeDialogClose == 'function') {beforeDialogClose()}}});

                // 2. append needed data
                $('#' + general.tabName + '-' + dialogId).empty().append(data);        
                
                // 4. open dialog
                general.dialogObj.open(dialogId);
                
                // 3. run callback after reading data
                typeof afterSend == 'function' ? afterSend() : null;
                    
            }, 'html');
        } 
    }
    
    /**
    *  write data method
    * 
    * @param dialogId - current dialog id, can be edit or add dialog id
    * @param collectSpecificData - callbacl function for collect specific data from
    *        specific input like tinyMCE, Uploadify and others
    * @param beforeSend - callback function befor sending data
    * @param afterSend - callback function after sending data 
    */
    crudClass.prototype.write  =   function(dialogId, collectSpecificData, beforeSave, afterSave){
        
        // 1. save dialog id
        this.currentDialog  =   dialogId;
        
        // 2. collect data from standard inputs like: input, select, radio, checkboxes and others
        data = this.collectFormData(dialogId);
        
        // 3. collect data from not standard fields
        additionalData = typeof collectSpecificData == 'function' ? collectSpecificData() : {};
        
        // 4. merge standart data and additional data
        data = $.extend(data, additionalData);
        
        // 5. store data in the internal class varoable
        this.collectedData  =   data;
        
        // 6. send data to validation
        with(this.params) {
            // save this value
            var target = this;
            
            this._runAjaxRequest(dialogs.validate.url, data, function(json){
                if(!json.result) {
                   // show validation errors
                   general.dialogMessageObj.showMessages(json.errors);    
                } else {
                    // run callback befor writing
                    result = typeof beforeSave == 'function' ? beforeSave() : null; 
                    // send save
                    if(!result || result == null) { 
                        target.save();
                    }
                }    
            });
        }
    }
    
    crudClass.prototype.save    =   function(){
        
        var target = this;
        
        // send save
        with(this.params) { 
            this._runAjaxRequest(dialogs.write.url, this.collectedData, function(json){
                if(json.result) {
                    // 1. close dialog
                    general.dialogObj.close(target.currentDialog);
                    // 2. show message
                    general.messageObj.showMessages(json.message);
                    // 3. refresh datatable
                    eval(general.datatableName + '.fnDraw()');
                } else {
                    // 2. show error message
                    general.messageObj.showErrors(json.message);    
                }
            })
        }    
    }
    
    /**
    *  delete data method
    * 
    * @beforeSend - befor send function
    * @afterSend- after send function
    */
    crudClass.prototype.del    =   function(beforeSend, afterSend){
        
        // run callback befor deleting
        typeof beforeSend == 'function' ? beforeSend() : null; 
        
        data    =   {};
        
        with(this.params) {
            $('#' + general.tabName + '-delete-dialog input[type=hidden]').each(function(){
                data[$(this).attr('name')] = $(this).attr('value');    
            })
        
            
            this._runAjaxRequest(dialogs.del.url, data, function(json){
                // close dialog
                general.dialogObj.close('delete-dialog');
                    
                if(json.result) {
                    // refresh datatable
                    eval(general.datatableName + '.fnDraw()');
                    // show success message
                    general.messageObj.showMessages(json.message);
                } else {
                    // show error message
                    general.messageObj.showErrors(json.message);
                }    
            });
        }
    }
    
    /**
    * get current dialog id
    * 
    * @access public
    * @return string dialog it
    * @param null
    */
    crudClass.prototype.getCurrentDialogId  =   function(){
        return this.currentDialog; 
    }
}



/**
*  class that close or open any dialog and 
*  run before and after collbacks
*/
function dialogClass(options){
    
    var tabName =   options.tabName;
    
    var currentDialog;   
    
    /**
    * open dialog by dialog ID
    * 
    * @dialog - dialog ID, eg #edit-dialog
    * @beforeOpen - callback befor opening
    * @afterOpen - callback after opening
    */
    this.open   =   function(dialog, beforeOpen, afterOpen){
        
        // save dialog id
        currentDialog = dialog; 
        
        // run callback befor opening
        typeof beforeOpen == 'function' ? beforeOpen() : null; 
        // close dialog
        $('#' + tabName + '-' + dialog).dialog('open');
        // run callback befor opening
        typeof afterOpen == 'function' ? afterOpen() : null;
    }
    
    /**
    * close dialog by dialog ID
    * 
    * @dialog - dialog ID, eg #edit-dialog
    * @beforeClose - callback befor closing
    * @afterClose - callback after closing
    */
    this.close  =   function(dialog, beforeClose, afterClose) {
        // run callback befor closign
        typeof beforeClose == 'function' ? beforeClose() : null; 
        // close dialog
        $('#' + tabName + '-' + dialog).dialog('close');
        // run callback befor closign
        typeof afterClose == 'function' ? afterClose() : null;
    }
    
    /**
    * destroy all dialogs
    */
    this.destroy    =   function(){
        
        // destroy all dialgos
        $('#' + tabName + '-edit-dialog').dialog('destroy');    
        $('#' + tabName + '-add-dialog').dialog('destroy');    
        $('#' + tabName + '-delete-dialog').dialog('destroy');
        
        // remove dialog content
        $('#' + tabName + '-edit-dialog').remove();    
        $('#' + tabName + '-add-dialog').remove();    
        $('#' + tabName + '-delete-dialog').remove();    
    }
    
    this.getDialogId    =   function(){
        return currentDialog; 
    }  
}

/**
* class show error message or success message in the page
*/
function messageClass(messageBlock, errorBlock){
    
    var instance      =   this;  
    var messageBlock  =   messageBlock;
    var errorBlock    =   errorBlock;
   
    /**
    * show success message
    * 
    * @param message - string message  
    */
    this.showMessages = function(message){
        $(messageBlock + ' p').text(message);
        $(messageBlock).show();
        
        setTimeout(this._hideActionMessages, 5000);
    }
    
    /**
    * show error message
    * 
    * @param message - string message
    */
    this.showErrors    = function(message){
        $(errorBlock + ' p').text(message);
        $(errorBlock).show();
        
        setTimeout(this._hideActionMessages, 5000);
    }
    
    /**
    * internal method that hide both blocks 
    */
    this._hideActionMessages = function(){
         $(messageBlock).fadeOut('normal');       
         $(errorBlock).fadeOut('normal');       
    }
}

/**
* class show error validatation message in the dialog 
*/
function validationClass(options){
    
    var errorContainerPrefix = options.errorContainerPrefix;  
    var errorClassContainer  = options.errorClassContainer;
    
    /**
    * show each error message
    */
    this.showMessages = function(messages){
        //1. hide old messages
        _hideMessages();
        //2. show new errors
        for(index in messages) {
            $('#' + index + errorContainerPrefix).text(messages[index]).show();
        } 
    }
    
    /**
    * hide all error messages
    */ 
    function _hideMessages(){
        $(errorClassContainer).hide();    
    }    
}
