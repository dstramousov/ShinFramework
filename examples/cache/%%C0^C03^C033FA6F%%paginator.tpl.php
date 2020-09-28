<?php /* Smarty version 2.6.26, created on 2011-05-20 12:42:21
         compiled from paginator.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

    <body id="page">

	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "back_url.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<?php echo $this->_tpl_vars['pager1_src_code']; ?>

        
    </body>
    
    <?php echo '
        <style type="text/css">
            .custom-style{
                max-width: 500px !important;
                width: 500px !important;
            }
            
            .image-style {
                max-width: 300px !important;
                width: 300px !important;
            }
        </style>
    '; ?>


</html>