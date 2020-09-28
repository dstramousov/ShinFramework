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
</div>