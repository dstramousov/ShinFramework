<?php /* Smarty version 2.6.26, created on 2011-03-04 09:57:03
         compiled from managment/index.tpl */ ?>
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
                    <li><a href="<?php echo prep_url(base_url().'/categorymanagment/index'); ?>"><?php echo $this->_tpl_vars['lng_label_item_item_managment_tab_name']; ?>
</a></li>
                    <li><a href="<?php echo prep_url(base_url().'/solutionmanagment/index'); ?>"><?php echo $this->_tpl_vars['lng_label_item_solution_managment_tab_name']; ?>
</a></li>
                    <li><a href="<?php echo prep_url(base_url().'/treemanagment/index'); ?>"><?php echo $this->_tpl_vars['lng_label_item_tree_managment_tab_name']; ?>
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
                            // remova previous tab html
                            $(\'#list\').remove();
                            
                            // delete crud JS object
                            delete crudObj;
                            
                            //destroy all dialogs
                            $(\'div[id*=_dialog]\').remove();
                        },
                        cache: false
                    })    
                })
            </script>
        '; ?>

    </body>
</html>