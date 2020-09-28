<?php /* Smarty version 2.6.26, created on 2011-05-20 12:37:37
         compiled from tooltip.tpl */ ?>
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

        To see tooltip move mouse over <b><span id="tooltip1">this text block</span></b>
        <br><br>
        To see image tooltip move mouse over <b><span id="tooltip2">this text block</span></b>
        <br><br>
        To see tooltip with attributes move mouse over <b><span id="tooltip3">this text block</span></b>
        <br><br>
        To see ajax tooltip move mouse over <b><span id="tooltip4">this text block</span></b>
        <br><br>
        To see youtube tooltip click on <b><span id="tooltip5">this text block</span></b>
        <br><br>
        <div id="tooltip6" style="width: 350px; height: 150px; border: 1px solid black; padding: 3px;">To see positioned tooltip<br> move mouse over this text block</div>
        
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