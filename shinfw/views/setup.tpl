{include file="header.tpl"}

<body id="page">

    <a href="{php} echo prep_url(shinfw_base_url().'/main'); {/php}">Go to project main page.</a>
    <br><br>

    <div class="demo">
	    <form action="{php} echo prep_url(base_url().'/setup'); {/php}" method="post" id="action_form" enctype="multipart/form-data">
        <table border="0" cellpadding="0" cellspacing="0" align="center" id="control_table">
			<tr valign="middle">
				<td>
					<input type="image" src="{php} echo prep_url(SHIN_Core::$_config['core']['app_base_url']);{/php}/shinfw/images/delete_table.jpg" height="115" width="127" style="border:none;" onclick="sendForm('delete_tables');" id="delete_tables"> 
				</td>
				<td>
					<input type="image" src="{php} echo prep_url(SHIN_Core::$_config['core']['app_base_url']);{/php}/shinfw/images/create_table.jpg" height="115" width="121" style="border:none;" onclick="sendForm('create_tables');" id="create_tables"> 
				</td>
				<td>                                                                                             	
                    <input type="image" src="{php} echo prep_url(SHIN_Core::$_config['core']['app_base_url']);{/php}/shinfw/images/insert_test.jpg" height="115" width="117" style="border:none;" onclick="sendForm('insert_test');" id="insert_test">
                </td>
                <td>
                    <input type="image" src="{php} echo prep_url(SHIN_Core::$_config['core']['app_base_url']);{/php}/shinfw/images/insert_init.jpg" height="115" width="117" style="border:none;" onclick="sendForm('insert_init');" id="insert_init">
                </td>
                <td>
					<input type="image" src="{php} echo prep_url(SHIN_Core::$_config['core']['app_base_url']);{/php}/shinfw/images/update_tables.jpg" height="115" width="117" style="border:none;" onclick="sendForm('update_tables');" id="update_tables">
				</td>
            </tr>
            <!--
            <tr>
                <td colspan="5">
					{include file="setup_add_application.tpl"}
                </td>
            </tr>
            -->
            <tr>
                <td colspan="5">
					{$custom_setup_block_for_application}
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <fieldset>
                        <legend>&nbsp;&nbsp;<b>Manage CACHE folders</b>&nbsp;&nbsp;</legend>
                        <input type="submit" tabindex="6" value="Create and set permissions for this folders." name="cachecreation">
                    </fieldset>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    {$errors}
                    {$messages}
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <fieldset>
                        <legend>&nbsp;&nbsp;<b>Manipulate DB shema for each/all application</b>&nbsp;&nbsp;</legend>
                        <table id="app-list">
                            <thead>
                                <tr>
                                    <td><input type="checkbox" name="select-all" value="" id="select-all" onclick="selectAll(this);" /></td>
                                    <td>&nbsp;Select/Deselect all applications</td>
                                </tr>
                            </thead>
                            <tbody>
                            {foreach from=$applicationList item=app}
                                {if $app != 'sys'}
                                    <tr>
                                        <td><input type="checkbox" name="app-name[]" value="{$app}" id="select-all" onclick="selectApp(this);" {if in_array($app, $selected)} checked="checked" {/if} /></td>    
                                        <td>&nbsp;{$app}</td>
                                    </tr>
                                {/if}    
                            {/foreach}
                            </tbody>
                        </table>
                    </fieldset>
                </td>
            </tr>            
			<tr><td colspan="4"><div align="center">{$msg}</div></td></tr>
		</table>
        </form>
	</div>
    {literal}
    <script type="text/javascript">
        /* <![CDATA[ */
        $(document).ready(function(){
            var total    = $('#app-list tbody :checkbox').size();
            var selected = $('#app-list tbody :checked').size();
            
            if(total != selected) {
                $('#select-all').removeAttr("checked");
            } else {
                $('#select-all').attr("checked", "checked");
            }        
        })
        
        function selectAll(target) {
            if($(target).attr('checked')) {
                $('#app-list tbody :checkbox').each(function(){
                    $(this).attr("checked", "checked");
                })
            } else {
                $('#app-list tbody :checkbox').each(function(){
                    $(this).removeAttr("checked");
                })
            }        
        }
        
        function selectApp(target){
            var total    = $('#app-list tbody :checkbox').size();
            var selected = $('#app-list tbody :checked').size();
            
            if(total != selected) {
                $('#select-all').removeAttr("checked");
            } else {
                $('#select-all').attr("checked", "checked");
            }
        }
        
        function sendForm(action) {
            $('#control_table input[type=image]').attr('disabled', 'disabled');
            $('#control_table input[type=image]:not(input[id=' + action + '])').css('opacity', 0.3);
            $('#action_form').append('<input type="hidden" name="action" value="' + action + '">').submit();
        }
        /* ]]> */
    </script>
    {/literal}

</body>

</html>
