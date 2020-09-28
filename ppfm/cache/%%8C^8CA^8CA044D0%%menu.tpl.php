<?php /* Smarty version 2.6.26, created on 2010-08-30 10:01:38
         compiled from menu.tpl */ ?>
<a href="<?php  echo base_url().'/index.php/main';  ?>"><?php echo $this->_tpl_vars['lng_label_main_page']; ?>
</a>&nbsp;|&nbsp;<a href="<?php  echo base_url().'/index.php/registration';  ?>"><?php echo $this->_tpl_vars['lng_label_register']; ?>
</a>&nbsp;|&nbsp;<a href="<?php  echo base_url().'/index.php/todo';  ?>"><?php echo $this->_tpl_vars['lng_label_todo']; ?>
</a>&nbsp;|&nbsp;<a href="<?php  echo base_url().'/index.php/statistic';  ?>"><?php echo $this->_tpl_vars['lng_label_statistic']; ?>
</a>&nbsp;|&nbsp;<a href="<?php  echo base_url().'/index.php/usermanage';  ?>"><?php echo $this->_tpl_vars['lng_label_usermanage']; ?>
</a>&nbsp;|&nbsp;<a href="<?php  echo base_url().'/index.php/logout';  ?>"><?php echo $this->_tpl_vars['lng_label_login']; ?>
</a>&nbsp;|&nbsp;
<br/>
lang:&nbsp;<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "lang.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 

&nbsp;&nbsp;&nbsp;theme:&nbsp;<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "theme.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

&nbsp;&nbsp;&nbsp;<a href="<?php  echo shinfw_base_url().'/index.php/main';  ?>">Main page</a>