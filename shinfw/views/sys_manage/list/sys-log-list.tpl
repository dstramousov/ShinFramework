<div id="list">
    <div class="{$tabName}-js-includes">
        {$jsdocready}
        {$jsnondocready}
    </div>
    
    <div class="messages">
        {$jsMessages}
        {$jsErrors}
    </div>
    
    <div class="actions">
        <a href="" id="delete_all_{$tabName}_button"></a>
        <a href="" id="delete_selected_{$tabName}_button"></a>
    </div>
    
    <br/ >
    
    <div class="{$tabName}-datatable">
        {$ssstylemustbehere}
    </div>
    
    <br />
    
    <fieldset>
        <legend>{$lng_label_sys_dir_info}</legend>
        <div class="dir-info"></div>
    </fieldset>
    
    <!-- dialogs -->
    <div id="{$tabName}-delete-dialog" class="crud-dialog-class-delete-dialog">
        <div class="inner">
            <center>{$lng_label_sys_user_delete_really}</center>
        </div>
    </div>
    
    <div id="{$tabName}-edit-dialog" class=""></div>
    <div id="{$tabName}-add-dialog"  class=""></div>
    <!-- dialogs -->
    
    <!-- init block of crud -->
    {literal}
        <script type="text/javascript" language="javascript">
                
                var intervalId = setInterval(function(){
                    if($('#dataListSys_log_processing').css('visibility') == 'hidden') {
                        clearInterval(intervalId);
                        
                        $('.dir-info').block({message: '{/literal}{$lng_label_sys_app_wait}{literal}'});
                    
                        $('.dir-info').load('{/literal}{php}echo SHIN_Core::$_config['core']['app_base_url'] . '/' . shinfw_folder();{/php}{literal}/logmanage/loaddirinfo', null, function(){
                            $('.dir-info').unblock();
                        });    
                    }
                }, 1000);
        
                var sysLogCrudObj     =   new crudClass({
                
                general: {
                    tabName         : '{/literal}{$tabName}{literal}',
                    datatableName   : 'dataListSys_log',
                    messageObj      : new messageClass('#js-message', '#js-error'),
                    dialogObj       : new dialogClass({tabName: '{/literal}{$tabName}{literal}'}),
                    dialogMessageObj: new validationClass({errorContainerPrefix: '_error', 
                                                           errorClassContainer: '.validatetion-error'})    
                },dialogs: {
                    read    :   {
                        url: '{/literal}{php}echo base_url();{/php}{literal}/logmanage/read'    
                    },
                    validate:   {
                        url: '{/literal}{php}echo base_url();{/php}{literal}/logmanage/validate'
                    },
                    write   :   {
                        url: '{/literal}{php}echo base_url();{/php}{literal}/logmanage/create'
                    },
                    del     :   {
                        url:  '{/literal}{php}echo base_url();{/php}{literal}/logmanage/delete'
                    }
                }});
                
                function deleteAll(){
                    
                   // 1. collect data
                   var all =   new Array;
                   $.each($('input:checkbox'), function(){
                    all.push($(this).val()); 
                   })
                   
                   // 2. send data to the server
                   $.getJSON('{/literal}{php}echo base_url();{/php}{literal}/logmanage/deleteall', {
                     all: all
                   }, function(json){
                        if(json.result) {
                            dataListSys_log.fnDraw();
                        } 
                   })    
                }
                
                function deleteSelected(){
                    var count = $('input:checked').length;
                    
                    if(count > 0) {
                       // 1. collect data
                       var selected =   new Array;
                       $.each($('input:checked'), function(){
                        selected.push($(this).val()); 
                       })
                       
                       // 2. send data to the server
                       $.getJSON('{/literal}{php}echo base_url();{/php}{literal}/logmanage/deleteselected', {
                         selected: selected
                       }, function(json){
                            if(json.result) {
                                dataListSys_log.fnDraw();
                            } 
                       })
                      
                    } else {
                        alert('{/literal}{$lng_label_sys_please_select}{literal}')
                    }
                }
        </script>

    {/literal}
    <!-- init block of crud -->
</div>