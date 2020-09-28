{include file="header.tpl"}

    <body id="page">

        <fieldset>
	        <legend>&nbsp;&nbsp;<b>{$lng_label_tools_fw_menu}</b>&nbsp;&nbsp;</legend>
	        {include file="main_menu.tpl"}

        </fieldset>

        <br/>

        <fieldset>
	        <legend>&nbsp;&nbsp;<b>{$lng_label_managment_part}</b>&nbsp;&nbsp;</legend>
	        <div id="tabs">
                <ul>
                    <li><a href="{php}echo prep_url(base_url().'/news/index');{/php}">{$lng_label_news_tab}</a></li>
                    <li><a href="{php}echo prep_url(base_url().'/partner/index');{/php}">{$lng_label_partners_tab}</a></li>
                    <li><a href="{php}echo prep_url(base_url().'/contact/index');{/php}">{$lng_label_contacts_tab}</a></li>
                    <li><a href="{php}echo prep_url(base_url().'/contact/test');{/php}">{$lng_label_contact_test_tab}</a></li>
                </ul>
            </div>
        </fieldset>

        <br/>

        {include file='footer.tpl'}
        
        {literal}
            <script type="text/javascript">
                $(document).ready(function(){
                    $("#tabs").tabs('select', '{/literal}{$active_tab}{literal}');
                    $("#tabs").tabs({
                        select: function(event, ui) {
                            $('#list').remove();
                        }
                    })    
                })
            </script>
        {/literal}
    </body>
</html>