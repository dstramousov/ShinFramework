<?php /* Smarty version 2.6.26, created on 2010-07-01 16:41:49
         compiled from dimas_test.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<body id="page">


<h1>Project Personal Finance Manager.</h1>
<h3>ver. <?php  echo SHIN_Core::version();  ?> </h3><br/>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "menu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<br/>
<br/>

Form test generation for "ppfm_entry" mapper object.
<br/>

Entry type: <?php echo $this->_tpl_vars['ppfm_entry_type_input']; ?>
<br/>

Holder name: <?php echo $this->_tpl_vars['ppfm_entry_idHolder_input']; ?>
<br/>
Category name: <?php echo $this->_tpl_vars['ppfm_entry_idCat_input']; ?>
<br/>
Text: <?php echo $this->_tpl_vars['ppfm_entry_text_input']; ?>
<br/>
Account name: <?php echo $this->_tpl_vars['ppfm_entry_idAccount_input']; ?>
<br/>
Ammount summ: <?php echo $this->_tpl_vars['ppfm_entry_amount_input']; ?>
<br/>
Entry date: <?php echo $this->_tpl_vars['ppfm_entry_date_input']; ?>
<br/>
User: <?php echo $this->_tpl_vars['ppfm_entry_idUser_input']; ?>
<br/>


</body>

</html>