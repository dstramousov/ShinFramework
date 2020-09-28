function closeDlg()
{
	$('#dialog-form').dialog('close');
}

function openDialog(e, data)
{
	$('#dialog-form').dialog('open');
}


function createNode(e, data, url, message)  {
	
    $.getJSON(url, {
        parent:    data.rslt.parent.attr("id").replace("elem_", "")
    }, function(json){
    	
        if(json.status) {
            $(data.rslt.obj).attr("id", json.id);
            $(data.rslt.obj).find('a').attr('id', json.id);
            $(data.rslt.obj).find('a').html('<ins class="jstree-icon">&nbsp;</ins>' + message);
        } else {
            $.jstree.rollback(data.rlbk);
        }    
    })
}

function removeNode(e, data, url, message){
    if(data != undefined) {
        if(data.rslt != undefined && $(data.rslt.obj[0]).attr('root') == 'true') {
            if(confirm(message)) {
                data.rslt.obj.each(function () {
                    $.getJSON(url, {
                        root:    true,
                        idNode:  this.id.replace("elem_","")
                    }, function(json){
                        if(!json.status) {
                            data.inst.refresh();
                        } else {
                            resetQAInfo();
                        }    
                    })
                });
                
                // disable all butons
                $('#menulist input').attr('disabled', 'disabled');
            } else {
                $.jstree.rollback(data.rlbk);    
            }
        } else {
            data.rslt.obj.each(function () {
        
                $.getJSON(url, {
                    idNode:    this.id.replace("elem_","")
                }, function(json){
                    if(!json.status) {
                        data.inst.refresh();
                    } else {
                        resetQAInfo();
                    }    
                })
            });
        }
    }    
}