    <div id="list">
        <div class="{$tabName}-js-includes">
            {$jsdocready}
            {$jsnondocready}
        </div>
        
        <div class="{$tabName}-controls">
            <a href="" id="add_{$tabName}_button"></a>
        </div>
        
        <fieldset>
            <legend>{$lng_label_solution_legend}</legend>
            <div class="messages">
                {$jsMessages}
                {$jsErrors}
            </div>
            {$messages}
            <br />    
            <div class="{$tabName}-datatable">
                {$ssstylemustbehere}
            </div>
        </fieldset>
        
        <fieldset>
            <legend>{$lng_label_solutionitem_legend}</legend>    
            <div class="item-datatable"></div>
        </fieldset>
        
        <!-- init block of crud -->
        {$crudData}
        <!-- init block of crud -->
        
        {literal}
            <script type="text/javascript">
            
                $(document).ready(function(){
                    
                    // load items by default for first category
                    $('.item-datatable').load('{/literal}{php}echo prep_url(base_url().'/solutionitemmanagment/index');{/php}{literal}', {
                        idSolution:  $('#dataListSolution tr td:first').html(),
                        first:       true
                    });
                })
                
                /**
                *  callback after loading edit data contain
                *  some additional information for each
                *  of the screen
                */
                function afterShowDialog(){
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
                
                function loadItems(idSolution){
                    
                    //destroy all dialogs
                    $('#add_solutionitem_dialog').remove();
                    $('#edit_solutionitem_dialog').remove();
                    $('#delete_solutionitem_dialog').remove();
                    
                    $('.item-datatable').load('{/literal}{php}echo prep_url(base_url().'/solutionitemmanagment/index');{/php}{literal}', {
                        idSolution:  idSolution,
                        first:       false
                    });    
                }
                
                /**
                * this is collback of collecting additional data from
                * different libraries like: tinyMCE, Uploadify and others  
                */
                function collectAdditionalData(){
                    
                    additionalData  =   {
                        gtrwebsite_solution_img:      window.imgselected != undefined && window.imgselected.selected ? window.imgselected.name : ''   
                    };
                    
                    return additionalData;
                }
                
                function onSelect(event, ID, fileObj){
                    window.imgselected  = {
                        selected:  true,
                        name:      fileObj.name 
                    };
                }
                
                function onCancel(){
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
                        onCancel();
                        return true;
                    } else {
                        return false;    
                    }
                }
                
                function onAllComplete(){
                    solutionCrudObj.save();
                }
            </script>
        {/literal}
    </div>
