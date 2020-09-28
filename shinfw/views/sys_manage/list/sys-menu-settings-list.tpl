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
                        sys_menusettings_idMenu_old:  $('#sys_menusettings_idMenu_old').val(),   
                        sys_menusettings_idUser_old:  $('#sys_menusettings_idUser_old').val(),   
                        sys_menusettings_idPanel_old: $('#sys_menusettings_idPanel_old').val()   
                    };
                    
                    return additionalData;
                }
            </script>
        {/literal}
</div>