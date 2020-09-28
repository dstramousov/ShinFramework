{include file="header.tpl"}

    <body id="page">
    	
    	<h4>Private room</h4>

        <br/>
	    <a href="{php} echo prep_url(base_url()).'/main'; {/php}">{$lng_label_back_to_the_site}</a>
        <br/>
        <br/>
        
        <div id="tabs">
            <ul>
                <li><a href="{php}echo prep_url(base_url().'/profile');{/php}">{$lng_label_private_page_profile_tab}</a></li>
                <li><a href="{php}echo prep_url(base_url().'/tools');{/php}">{$lng_label_private_page_tools_tab}</a></li>
                <li><a href="{php}echo prep_url(base_url().'/image');{/php}">{$lng_label_private_page_image_tab}</a></li>
                <li><a href="{php}echo prep_url(base_url().'/statistic/index');{/php}">{$lng_label_statistic_tab_name}</a></li>
            </ul>
        </div>

        {include file='footer.tpl'}
        
        {literal}
            <script type="text/javascript">
                $("#tabs" ).bind("tabsselect", function(event, ui) {
                    $('.change-pwd-dialog, .ui-dialog, .crud-dialog').remove();
                });
            </script>
        {/literal}
    </body>
</html>