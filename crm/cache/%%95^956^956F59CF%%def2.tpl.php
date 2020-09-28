<?php /* Smarty version 2.6.26, created on 2010-10-18 16:14:13
         compiled from def2.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<body id="page">

<a href="<?php  echo prep_url(shinfw_base_url().'/index.php/main');  ?>">Back to Main page</a>
<br/>

<h1>CRM. secure link.</h1>
<h4>ver. <?php  echo SHIN_Core::version();  ?> </h4>
<?php echo $this->_tpl_vars['timerun']; ?>
<br/><?php echo $this->_tpl_vars['memory']; ?>



<fieldset>
	<legend>&nbsp;&nbsp;<b><?php echo $this->_tpl_vars['lng_label_tools_fw_menu']; ?>
</b>&nbsp;&nbsp;</legend>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main_menu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

</fieldset>

</body>

</html>