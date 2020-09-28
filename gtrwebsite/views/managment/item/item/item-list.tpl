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
            <br />
            <strong>{$lng_label_category_current}</strong> {$categoryInfo.idItemCat} - {$categoryInfo.description}
            <br />
            {$ssstylemustbehere}
        </div>
        
        <!-- init block of crud -->
        {$crudData}
        <!-- init block of crud -->
        
        {literal}
            <script type="text/javascript">
                
                /**
                *  callback after loading edit data contain
                *  some additional information for each
                *  of the screen
                */
                function afterShowEditDialog(){
                    /**
                    *  this is unique part of each screen for init some
                    *  additional JS libraries. In current case we init
                    *  tinyMCE after dialog opening
                    */
                    
                    tinyMCE.init({
                                    theme: "simple", 
                                    mode:  "textareas"
                                });    
                }

                /**
                * this is collback of collecting additional data from
                * different libraries like: tinyMCE, Uploadify and others  
                */
                function collectItemAdditionalData(){
                    
                    additionalData  =   {
                        gtrwebsite_items_img:      typeof window.imgselected != 'undefined' && window.imgselected.selected ? window.imgselected.name : ''   
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
                    itemCrudObj.save();
                }
            </script>
        {/literal}
    </div>