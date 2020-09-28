<?php /* Smarty version 2.6.26, created on 2011-04-05 10:47:31
         compiled from pc_example.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 
    <div class="action-input">
        <a href="" id="add_example_button"></a>
    </div>
    <div class="messages">
        <?php echo $this->_tpl_vars['jsMessages']; ?>

        <?php echo $this->_tpl_vars['jsErrors']; ?>

    </div>
    <div class="data-list">
        <?php echo $this->_tpl_vars['domelement']; ?>

    </div>
    <!-- crudd  data -->
    <?php echo $this->_tpl_vars['crudData']; ?>

    <!-- crudd data -->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>