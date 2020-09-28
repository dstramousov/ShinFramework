{include file='header.tpl'}
    <div id="tabs">
        <ul>
            <li><a href="#tabs-1">{$lng_label_customer_manage_page}</a></li>
            <li><a href="#tabs-2">{$lng_label_application_manage_page}</a></li>
            <li><a href="#tabs-3">{$lng_label_customer_application_list}</a></li>
            <li><a href="#tabs-4">{$lng_label_sys_shinticket_user}</a></li>
        </ul>
        <div id="tabs-1">
            {include file='admin/customer/customer_manage.tpl'}
        </div>
        <div id="tabs-2">
            {include file='admin/application/application_manage.tpl'}
        </div>
        <div id="tabs-3">
            {include file='admin/relation/relation_manage.tpl'}
        </div>
        <div id="tabs-4">
            {include file='admin/user/user_manage.tpl'}
        </div>
    </div>

{literal}
    <script type="text/javascript">
    $(document).ready(function(){
        $("#tabs").tabs('select', '{/literal}{$active_tab}{literal}');    
    })
    </script>
{/literal}
{include file='footer.tpl'} 