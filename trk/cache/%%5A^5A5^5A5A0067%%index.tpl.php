<?php /* Smarty version 2.6.26, created on 2011-05-16 10:23:18
         compiled from admin/index.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

    <body id="page">

	    <a href="<?php  echo prep_url(base_url()).'/main';  ?>" color="#CCCCCC"><?php echo $this->_tpl_vars['lng_label_back_to_the_site']; ?>
</a>
        <br/>
        <br/>


        <br/>

        <fieldset>
            <div id="tabs">
                <ul>
                    <li><a href="<?php echo prep_url(base_url().'/user/index'); ?>"><?php echo $this->_tpl_vars['lng_label_user_tab_name']; ?>
</a></li>
                    <li><a href="<?php echo prep_url(base_url().'/statistic/usersstat'); ?>"><?php echo $this->_tpl_vars['lng_label_statistic_tab_name']; ?>
</a></li>
                    <li><a href="<?php echo prep_url(base_url().'/adminimage/index'); ?>"><?php echo $this->_tpl_vars['lng_label_private_page_admin_image_tab']; ?>
</a></li>
                    <li><a href="<?php echo prep_url(base_url().'/adminevent/index'); ?>"><?php echo $this->_tpl_vars['lng_label_private_page_admin_circuit_tab']; ?>
</a></li>
                </ul>
            </div>
        </fieldset>

        <br/>

        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        
        <?php echo '
            <script type="text/javascript">
                $(document).ready(function(){
                    $("#tabs" ).bind("tabsselect", function(event, ui) {
                        $(\'.ui-dialog, .crud-dialog\').remove();
                    });    
                })
            </script>
        '; ?>

    </body>
</html>