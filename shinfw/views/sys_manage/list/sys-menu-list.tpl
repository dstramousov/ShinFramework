<div id="list">
    <div class="{$tabName}-js-includes">
        {$jsdocready}
        {$jsnondocready}
    </div>
    
    <div class="messages">
        {$jsMessages}
        {$jsErrors}
    </div>
    
    <div class="{$tabName}-controls">
        <a href="" id="add_{$tabName}_button"></a>
    </div>
        
    <div class="{$tabName}-datatable">
        {$ssstylemustbehere}
    </div>
    
    <!-- init block of crud -->
    {$crudData}
    <!-- init block of crud -->
    
    {literal}
            <script type="text/javascript">
                /**
                * this is collback of collecting additional data from
                * different libraries like: tinyMCE, Uploadify and others  
                */
                function collectAdditionalData(){
                    additionalData  =   {
                        sys_menu_idMenu_old:    $('#sys_menu_idMenu_old').val(),   
                        sys_menu_idPanel_old:   $('#sys_menu_idPanel_old').val(),   
                        sys_menu_ico_old:       $('#sys_menu_ico_old').val(),
                        sys_menu_ico:           window.imgselected != undefined && window.imgselected.selected ? window.imgselected.name : ''   
                       
                    };
                    
                    return additionalData;
                }
                
                /**
                *  callback for additional field - uploadify select event
                */
                function onSelectCallback(event, ID, fileObj){
                    window.imgselected  = {
                        selected:  true,
                        name:      fileObj.name 
                    };
                }
                
                /**
                *  callback for additional field - uploadify cancel event
                */
                function onCancelCallback(){
                    if(typeof window.imgselected != 'undefined') {
                        window.imgselected.selected = false;
                        window.imgselected.name     = '';
                    }
                }
                
                /**
                * callback for uploading files befor saving data
                */
                function uploadCallback(){
                    if(typeof window.imgselected != 'undefined' && window.imgselected.selected) {
                        $('#imgUploader').uploadifyUpload();
                        onCancelCallback();
                        return true;
                    } else {
                        return false;    
                    }
                }
                
                function onAllComplete(){
                    sysMenuCrudObj.save();
                }
            </script>
        {/literal}
</div>