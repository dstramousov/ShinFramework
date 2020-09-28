/**
* callback function that send requests to the server, if
* user resize panel
* 
* @target  - current panek object
* @action  - resize|init
* @options - array of the config params
*/
function ajaxCollbackFunction(target, action, options) {
    
    if(action == 'init') {
        for(key in options) {
            if(options[key] != undefined || options[key] != '') {
                var height = $('#' + key + ' .portlet-content').height(); 
                var width  = $('#' + key + ' .portlet-content').width(); 
                
                $('#' + key + ' .portlet-content').load(options[key], {
                    height:     height,
                    width:      width,
                    panel_id:   key
                }, function(data){})
            }    
        }    
    } else {
        var panelId = $(target).parent().parent().attr('id');
        
        if(options[panelId] != undefined) {
            
            var height = $('#' + panelId + ' .portlet-content').height(); 
            var width = $('#' + panelId + ' .portlet-content').width();
            
            $('#' + panelId + ' .portlet-content').load(options[panelId], {
                height:     height,
                width:      width,
                panel_id:   panelId
            }, function(){})    
        }
    }
}