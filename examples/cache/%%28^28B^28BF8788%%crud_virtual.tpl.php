<?php /* Smarty version 2.6.26, created on 2011-11-23 08:00:46
         compiled from crud_virtual.tpl */ ?>
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
        <legend style="font-size: 30px; font-weight: bold;">CRUD Virtual Example</legend>
        
        <div class="messages">
            <?php echo $this->_tpl_vars['jsMessages']; ?>

            <?php echo $this->_tpl_vars['jsErrors']; ?>

        </div>

        <br />

        <div class="controls">
            <a href="#" id="add_user_button"></a>
        </div>


        <!-- init block of crud -->
        <?php echo $this->_tpl_vars['crudData']; ?>

        <!-- init block of crud -->
        
        <fieldset>
            <legend>User List</legend>
            <?php echo $this->_tpl_vars['ssstylemustbehere']; ?>

        </fieldset>
        
    </fieldset>
    
    <?php echo '
     <style type="text/css">
        th{
            text-align: left;
        }
        
        th, td{
            padding-top: 5px;
            padding-bottom: 5px;
            padding-left: 2px;
            padding-right: 2px;
        }
        
        input {
            width: 250px !important;
        }
     </style>
    '; ?>

    
</body>
</html>