<?php /* Smarty version 2.6.26, created on 2011-04-30 07:09:18
         compiled from setup.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<body id="page">

    <a href="<?php  echo prep_url(shinfw_base_url().'/main');  ?>">Go to project main page.</a>
    <br><br>

    <div class="demo">
	    <form action="<?php  echo prep_url(base_url().'/setup');  ?>" method="post" id="action_form" enctype="multipart/form-data">
        <table border="0" cellpadding="0" cellspacing="0" align="center" id="control_table">
			<tr valign="middle">
				<td>
					<input type="image" src="<?php  echo prep_url(SHIN_Core::$_config['core']['app_base_url']); ?>/shinfw/images/delete_table.jpg" height="115" width="127" style="border:none;" onclick="sendForm('delete_tables');" id="delete_tables"> 
				</td>
				<td>
					<input type="image" src="<?php  echo prep_url(SHIN_Core::$_config['core']['app_base_url']); ?>/shinfw/images/create_table.jpg" height="115" width="121" style="border:none;" onclick="sendForm('create_tables');" id="create_tables"> 
				</td>
				<td>                                                                                             	
                    <input type="image" src="<?php  echo prep_url(SHIN_Core::$_config['core']['app_base_url']); ?>/shinfw/images/insert_test.jpg" height="115" width="117" style="border:none;" onclick="sendForm('insert_test');" id="insert_test">
                </td>
                <td>
                    <input type="image" src="<?php  echo prep_url(SHIN_Core::$_config['core']['app_base_url']); ?>/shinfw/images/insert_init.jpg" height="115" width="117" style="border:none;" onclick="sendForm('insert_init');" id="insert_init">
                </td>
                <td>
					<input type="image" src="<?php  echo prep_url(SHIN_Core::$_config['core']['app_base_url']); ?>/shinfw/images/update_tables.jpg" height="115" width="117" style="border:none;" onclick="sendForm('update_tables');" id="update_tables">
				</td>
            </tr>
            <!--
            <tr>
                <td colspan="5">
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "setup_add_application.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                </td>
            </tr>
            -->
            <tr>
                <td colspan="5">
					<?php echo $this->_tpl_vars['custom_setup_block_for_application']; ?>

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
                    <?php echo $this->_tpl_vars['errors']; ?>

                    <?php echo $this->_tpl_vars['messages']; ?>

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
                            <?php $_from = $this->_tpl_vars['applicationList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['app']):
?>
                                <?php if ($this->_tpl_vars['app'] != 'sys'): ?>
                                    <tr>
                                        <td><input type="checkbox" name="app-name[]" value="<?php echo $this->_tpl_vars['app']; ?>
" id="select-all" onclick="selectApp(this);" <?php if (in_array ( $this->_tpl_vars['app'] , $this->_tpl_vars['selected'] )): ?> checked="checked" <?php endif; ?> /></td>    
                                        <td>&nbsp;<?php echo $this->_tpl_vars['app']; ?>
</td>
                                    </tr>
                                <?php endif; ?>    
                            <?php endforeach; endif; unset($_from); ?>
                            </tbody>
                        </table>
                    </fieldset>
                </td>
            </tr>            
			<tr><td colspan="4"><div align="center"><?php echo $this->_tpl_vars['msg']; ?>
</div></td></tr>
		</table>
        </form>
	</div>
    <?php echo '
    <script type="text/javascript">
        /* <![CDATA[ */
        $(document).ready(function(){
            var total    = $(\'#app-list tbody :checkbox\').size();
            var selected = $(\'#app-list tbody :checked\').size();
            
            if(total != selected) {
                $(\'#select-all\').removeAttr("checked");
            } else {
                $(\'#select-all\').attr("checked", "checked");
            }        
        })
        
        function selectAll(target) {
            if($(target).attr(\'checked\')) {
                $(\'#app-list tbody :checkbox\').each(function(){
                    $(this).attr("checked", "checked");
                })
            } else {
                $(\'#app-list tbody :checkbox\').each(function(){
                    $(this).removeAttr("checked");
                })
            }        
        }
        
        function selectApp(target){
            var total    = $(\'#app-list tbody :checkbox\').size();
            var selected = $(\'#app-list tbody :checked\').size();
            
            if(total != selected) {
                $(\'#select-all\').removeAttr("checked");
            } else {
                $(\'#select-all\').attr("checked", "checked");
            }
        }
        
        function sendForm(action) {
            $(\'#control_table input[type=image]\').attr(\'disabled\', \'disabled\');
            $(\'#control_table input[type=image]:not(input[id=\' + action + \'])\').css(\'opacity\', 0.3);
            $(\'#action_form\').append(\'<input type="hidden" name="action" value="\' + action + \'">\').submit();
        }
        /* ]]> */
    </script>
    '; ?>


</body>

</html>