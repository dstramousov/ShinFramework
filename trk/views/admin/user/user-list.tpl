    <div id="list">
        <div class="{$tabName}-js-includes">
            {$jsdocready}
            {$jsnondocready}
        </div>
        
        <div class="messages">
            {$jsMessages}
            {$jsErrors}
        </div>
        
        <br />
        
        <div class="controls">
            <a href="" id="add_user_button"></a>
        </div>
        
        <br />
        
        <div class="{$tabName}-datatable">
            {$ssstylemustbehere}
        </div>
        
        <br />

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
                        trk_user_wtm_file_name: window.imgselected != undefined && window.imgselected.selected ? window.imgselected.name : ''   
                       
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
                    $('#imgUploader').uploadifyUpload();
                    onCancelCallback();
                }
            </script>
        {/literal}
    </div>