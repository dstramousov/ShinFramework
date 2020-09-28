function moveNode(e, data, url, message){
    data.rslt.o.each(function (i) {
        if(data.rslt.np.attr("id") != 'gtrwebsite_tree_dom_structure') {
            $.getJSON(url, {
                "from"   : $(this).attr("id").replace("phtml_",""), 
                "to"  : data.rslt.np.attr("id").replace("phtml_","")
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
