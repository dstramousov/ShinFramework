{include file="header.tpl"}

    <body id="page">

	    <a href="{php} echo prep_url(base_url()).'/main'; {/php}" color="#CCCCCC">{$lng_label_back_to_the_site}</a>
        <br/>
        <br/>


        <br/>

        <fieldset>
            <div id="tabs">
                <ul>
                    <li><a href="{php}echo prep_url(base_url().'/user/index');{/php}">{$lng_label_user_tab_name}</a></li>
                    <li><a href="{php}echo prep_url(base_url().'/statistic/usersstat');{/php}">{$lng_label_statistic_tab_name}</a></li>
                    <li><a href="{php}echo prep_url(base_url().'/adminimage/index');{/php}">{$lng_label_private_page_admin_image_tab}</a></li>
                    <li><a href="{php}echo prep_url(base_url().'/adminevent/index');{/php}">{$lng_label_private_page_admin_circuit_tab}</a></li>
                </ul>
            </div>
        </fieldset>

        <br/>

        {include file='footer.tpl'}
        
        {literal}
            <script type="text/javascript">
                $(document).ready(function(){
                    $("#tabs" ).bind("tabsselect", function(event, ui) {
                        $('.ui-dialog, .crud-dialog').remove();
                    });    
                })
            </script>
        {/literal}
    </body>
</html>