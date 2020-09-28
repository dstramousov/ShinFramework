<div id="list">
    <div class="contact-js-includes">
        {$jsdocready}
        {$jsnondocready}
    </div>
    
    <div class="contact-datatable">
        {$ssstylemustbehere}
    </div>
    
    <!-- init block of crud -->
    {$crudData}
    <!-- init block of crud -->
    
    {literal}
        <script type="text/javascript">
            $('#dataListContact tr').live('dblclick', function(){
                // 1. get id
                var id = $(this).find('td:first').text();
                
                // send CRUD request
                contactCrudObj.openDialog({id : id}, 'edit');
            })
        </script>
    {/literal}
</div>