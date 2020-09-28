    <div id="list"> 
        <div class="{$tabName}-js-includes">
            {$jsdocready}
            {$jsnondocready}
        </div>
         
        
        <div class="{$tabName}-controls">
            <a href="" id="add_{$tabName}_button"></a>
        </div>
        
        <fieldset>
            <legend>{$lng_label_item_category_legend}</legend>
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
            <legend>{$lng_label_item_item_legend}</legend>    
            <div class="item-datatable"></div>
        </fieldset>
        
        <!-- init block of crud -->
        {$crudData}
        <!-- init block of crud -->
        
        {literal}
            <script type="text/javascript">
                
                $(document).ready(function(){
                    data = dataListCategory.fnGetData();
                    // load items by default for first category
                    $('.item-datatable').load('{/literal}{php}echo prep_url(base_url().'/itemmanagment/index');{/php}{literal}', {
                        idItemCat:  $('#dataListCategory tr td:first').html(),
                        first:      true
                    });
                })
                
                /**
                * load slave datatable
                */
                function loadItems(idCategory){
                    
                    //destroy all dialogs
                    $('.item-datatable').load('{/literal}{php}echo prep_url(base_url().'/itemmanagment/index');{/php}{literal}', {
                        idItemCat:  idCategory,
                        first:      false
                    });    
                }
                
            </script>
        {/literal}
    </div>