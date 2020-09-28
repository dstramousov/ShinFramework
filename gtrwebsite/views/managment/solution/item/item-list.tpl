    <div id="list">
        <div class="{$tabName}-js-includes">
            {$jsdocready}
            {$jsnondocready}
        </div>
        
        <div class="{$tabName}-controls">
            <a href="" id="add_{$tabName}_button"></a>
        </div>
        
        <div class="{$tabName}-datatable">
            <br />
            <strong>{$lng_label_solutionitem_current}</strong> {$solutionInfo.idSolution} - {$solutionInfo.description}
            <br />
            {$ssstylemustbehere}
        </div>
        
        <!-- init block of crud -->
        {$crudData}
        <!-- init block of crud -->
            
    </div>