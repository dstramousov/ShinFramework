<?php /* Smarty version 2.6.26, created on 2011-05-04 08:13:28
         compiled from proom/index.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

    <body id="page">
    	
    	<h4>Private room</h4>

        <br/>
	    <a href="<?php  echo prep_url(base_url()).'/main';  ?>"><?php echo $this->_tpl_vars['lng_label_back_to_the_site']; ?>
</a>
        <br/>
        <br/>
        
        <div id="tabs">
            <ul>
                <li><a href="<?php echo prep_url(base_url().'/profile'); ?>"><?php echo $this->_tpl_vars['lng_label_private_page_profile_tab']; ?>
</a></li>
                <li><a href="<?php echo prep_url(base_url().'/tools'); ?>"><?php echo $this->_tpl_vars['lng_label_private_page_tools_tab']; ?>
</a></li>
                <li><a href="<?php echo prep_url(base_url().'/image'); ?>"><?php echo $this->_tpl_vars['lng_label_private_page_image_tab']; ?>
</a></li>
                <li><a href="<?php echo prep_url(base_url().'/statistic/index'); ?>"><?php echo $this->_tpl_vars['lng_label_statistic_tab_name']; ?>
</a></li>
            </ul>
        </div>

        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        
        <?php echo '
            <script type="text/javascript">
                $("#tabs" ).bind("tabsselect", function(event, ui) {
                    $(\'.change-pwd-dialog, .ui-dialog, .crud-dialog\').remove();
                });
            </script>
        '; ?>

    </body>
</html>