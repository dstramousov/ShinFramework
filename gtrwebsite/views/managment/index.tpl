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
                    <li><a href="{php}echo prep_url(base_url().'/categorymanagment/index');{/php}">{$lng_label_item_item_managment_tab_name}</a></li>
                    <li><a href="{php}echo prep_url(base_url().'/solutionmanagment/index');{/php}">{$lng_label_item_solution_managment_tab_name}</a></li>
                    <li><a href="{php}echo prep_url(base_url().'/treemanagment/index');{/php}">{$lng_label_item_tree_managment_tab_name}</a></li>
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
                            // remova previous tab html
                            $('#list').remove();
                            
                            // delete crud JS object
                            delete crudObj;
                            
                            //destroy all dialogs
                            $('div[id*=_dialog]').remove();
                        },
                        cache: false
                    })    
                })
            </script>
        {/literal}
    </body>
</html>