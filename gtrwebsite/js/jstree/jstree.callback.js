
function createNode(e, data, url, message)  {
    $.getJSON(url, {
        parent:    data.rslt.parent.attr("id").replace("elem_", "")
    }, function(json){
        if(json.status) {
            $(data.rslt.obj).attr("id", "elem_" + json.id);
            $(data.rslt.obj).find('a').attr('id', json.id);
            $(data.rslt.obj).find('a').html('<ins class="jstree-icon">&nbsp;</ins>' + json.id + ' | ' + message);
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

function moveNode(e, data, url, message){
    data.rslt.o.each(function (i) {
        if(data.rslt.np.attr("id") != 'gtrwebsite_tree_dom_structure') {
            $.getJSON(url, {
                "id"   : $(this).attr("id").replace("elem_",""), 
                "ref"  : data.rslt.np.attr("id").replace("elem_",""),
                "copy" : data.rslt.cy ? 1 : 0
            }, function(json){
                if(!json.status) {
                    $.jstree.rollback(data.rlbk);
                } else {
                    $(data.rslt.oc).attr("id", "elem_" + json.id);
                    if(data.rslt.cy) {
                        data.inst.refresh();        
                    }
                }    
            })
        } else {
            alert(message);
        }    
    });
}
