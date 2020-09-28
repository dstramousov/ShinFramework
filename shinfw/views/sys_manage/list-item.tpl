{include file="header.tpl"}
    <div class="">
        <fieldset class="shin-general-menu">
            <legend>&nbsp;&nbsp;<b>{$lng_label_tools_fw_menu}</b>&nbsp;&nbsp;</legend>
            {php}
                echo SHIN_Core::runWidget('main_menu', array());
            {/php}
            {$shinfw_main_menu}
        </fieldset>
    </div>
    
    <div class="shin-clear"></div>
    
    <div id="tabs">
        <ul>
            <li><a href="{php}echo prep_url(base_url().'/usermanage/index');{/php}">{$lng_label_sys_user_manage}</a></li>
            <li><a href="{php}echo prep_url(base_url().'/rolemanage/index');{/php}">{$lng_label_sys_role_manage}</a></li>
            <li><a href="{php}echo prep_url(base_url().'/areamanage/index');{/php}">{$lng_label_sys_struct_area_manage}</a></li>
            <li><a href="{php}echo prep_url(base_url().'/subareamanage/index');{/php}">{$lng_label_sys_struct_subarea_manage}</a></li>
            <li><a href="{php}echo prep_url(base_url().'/applicationmanage/index');{/php}">{$lng_label_sys_struct_application_manage}</a></li>
            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
            <li><a href="{php}echo prep_url(base_url().'/policyareamanage/index');{/php}">{$lng_label_sys_struct_policyarea_manage}</a></li>
            <li><a href="{php}echo prep_url(base_url().'/policysubareamanage/index');{/php}">{$lng_label_sys_struct_policysubarea_manage}</a></li>
            <li><a href="{php}echo prep_url(base_url().'/policyapplicationmanage/index');{/php}">{$lng_label_sys_struct_policyapplication_manage}</a></li>
            <br />
            <br />
            <li><a href="{php}echo prep_url(base_url().'/menumanage/index');{/php}">{$lng_label_sys_struct_policyapplication_menu}</a></li>
            <li><a href="{php}echo prep_url(base_url().'/menugrpmanage/index');{/php}">{$lng_label_sys_struct_policyapplication_menugrp}</a></li>
            <li><a href="{php}echo prep_url(base_url().'/menurowsmanage/index');{/php}">{$lng_label_sys_struct_policyapplication_menurows}</a></li>
            <li><a href="{php}echo prep_url(base_url().'/menusettingsmanage/index');{/php}">{$lng_label_sys_struct_menusettings}</a></li>
            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
            <li><a href="{php}echo prep_url(base_url().'/logmanage/index');{/php}">{$lng_label_sys_log}</a></li>
        </ul>
    </div>
    
    {literal}
        <script type="text/javascript">
            $(document).ready(function(){
                $("#tabs").tabs({
                    select: function(event, ui) {
                        $('.ui-dialog, .crud-dialog').remove();
                    }
                })    
            })
            
            function makeAjaxRequest(url, data, callback, type){
                    
                    var type = type != undefined ? type : 'json';
                     
                    $.ajax({
                               type:        "POST",
                               url:         url,
                               data:        data,
                               dataType:    type,
                               success:     callback,
                               beforeSend:  function(){
                                             
                               },
                               complete:    function(){
                                                    
                               }
                           });
            }
        </script>
    {/literal}
    
{include file="footer.tpl"}
