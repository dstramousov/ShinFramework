<?php /* Smarty version 2.6.26, created on 2011-03-02 21:07:03
         compiled from index.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

    <body id="page">

        <fieldset>
	        <legend>&nbsp;&nbsp;<b><?php echo $this->_tpl_vars['lng_label_tools_fw_menu']; ?>
</b>&nbsp;&nbsp;</legend>
	        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main_menu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

        </fieldset>

        <br/>

        <fieldset>
	        <legend>&nbsp;&nbsp;<b><?php echo $this->_tpl_vars['lng_label_managment_part']; ?>
</b>&nbsp;&nbsp;</legend>
	        <div id="tabs">
                <ul>
                    <li><a href="<?php echo prep_url(base_url().'/news/index'); ?>"><?php echo $this->_tpl_vars['lng_label_news_tab']; ?>
</a></li>
                    <li><a href="<?php echo prep_url(base_url().'/partner/index'); ?>"><?php echo $this->_tpl_vars['lng_label_partners_tab']; ?>
</a></li>
                    <li><a href="<?php echo prep_url(base_url().'/contact/index'); ?>"><?php echo $this->_tpl_vars['lng_label_contacts_tab']; ?>
</a></li>
                    <li><a href="<?php echo prep_url(base_url().'/contact/test'); ?>"><?php echo $this->_tpl_vars['lng_label_contact_test_tab']; ?>
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
                    $("#tabs").tabs(\'select\', \''; ?>
<?php echo $this->_tpl_vars['active_tab']; ?>
<?php echo '\');
                    $("#tabs").tabs({
                        select: function(event, ui) {
                            $(\'#list\').remove();
                        }
                    })    
                })
            </script>
        '; ?>

    </body>
</html>