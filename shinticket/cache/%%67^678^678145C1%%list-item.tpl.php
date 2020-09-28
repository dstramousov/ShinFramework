<?php /* Smarty version 2.6.26, created on 2010-10-19 08:59:45
         compiled from admin/list-item.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <div id="tabs">
        <ul>
            <li><a href="#tabs-1"><?php echo $this->_tpl_vars['lng_label_customer_manage_page']; ?>
</a></li>
            <li><a href="#tabs-2"><?php echo $this->_tpl_vars['lng_label_application_manage_page']; ?>
</a></li>
            <li><a href="#tabs-3"><?php echo $this->_tpl_vars['lng_label_customer_application_list']; ?>
</a></li>
            <li><a href="#tabs-4"><?php echo $this->_tpl_vars['lng_label_sys_shinticket_user']; ?>
</a></li>
        </ul>
        <div id="tabs-1">
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/customer/customer_manage.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </div>
        <div id="tabs-2">
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/application/application_manage.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </div>
        <div id="tabs-3">
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/relation/relation_manage.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </div>
        <div id="tabs-4">
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/user/user_manage.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </div>
    </div>

<?php echo '
    <script type="text/javascript">
    $(document).ready(function(){
        $("#tabs").tabs(\'select\', \''; ?>
<?php echo $this->_tpl_vars['active_tab']; ?>
<?php echo '\');    
    })
    </script>
'; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 