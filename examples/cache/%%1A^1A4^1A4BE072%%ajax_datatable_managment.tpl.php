<?php /* Smarty version 2.6.26, created on 2011-05-20 12:37:19
         compiled from ajax_datatable_managment.tpl */ ?>
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
    
    <fieldset>
        <legend style="font-size: 30px; font-weight: bold;">Ajax Datatable Managment</legend>
        <div class="messages">
            <?php echo $this->_tpl_vars['jsMessages']; ?>

            <?php echo $this->_tpl_vars['jsErrors']; ?>

        </div>
        <div class="action-input">
            <a href="" id="add_example_button"></a>
        </div>
        <div class="data-list">
            <?php echo $this->_tpl_vars['ssstylemustbehere']; ?>

        </div>
    </fieldset>
    
    <!-- crudd  data -->
    <?php echo $this->_tpl_vars['crudData']; ?>

    <!-- crudd data -->
    
    <?php echo '
    <style type="text/css">
        table td,th{
            padding: 2px;
        }
        
        th{
            text-align: left;
        }
        
        td input {
            width: 200px !important;
        }
        
        .validatetion-error {
           font-size: 10px;
        }
    </style>
    '; ?>

</body>
</html>