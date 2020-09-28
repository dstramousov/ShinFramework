<?php /* Smarty version 2.6.26, created on 2011-08-25 11:22:57
         compiled from model_test.tpl */ ?>
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

    <h1>SHIN_Model::write_form() functionality class test page:</h1>
    <h2>Tested functionality:</h2>
    <h4>&nbsp;Tooltip</h4>
    <h4>&nbsp;Mandatory fields</h4>
    <h4>&nbsp;Join table</h4>
    <h4>&nbsp;Several input values</h4>
    <h4>&nbsp;Masked input</h4>
    <br/>
    <br/>


	<table border="0" cellpadding="40" cellspacing="40">

		<tr>
			<td>Insert data: &nbsp;&nbsp;</td>
			<td><?php echo $this->_tpl_vars['examples_crmmasterdata_testdatetimefield_input']; ?>
</td>
		</tr>

		<tr>
			<td>Company name: &nbsp;&nbsp;</td>
			<td><?php echo $this->_tpl_vars['examples_crmmasterdata_company_input']; ?>
</td>
		</tr>
		<tr>
			<td>FirstName: &nbsp;&nbsp;</td>
			<td><?php echo $this->_tpl_vars['examples_crmmasterdata_contactName_input']; ?>
</td>
		</tr>
		<tr>
			<td>SurName: &nbsp;&nbsp;</td>
			<td><?php echo $this->_tpl_vars['examples_crmmasterdata_contactSurname_input']; ?>
</td>
		</tr>
		<tr>
			<td>Tel: &nbsp;&nbsp;</td>
			<td><?php echo $this->_tpl_vars['examples_crmmasterdata_tel_input']; ?>
</td>
		</tr>
		<tr>
			<td>Fax: &nbsp;&nbsp;</td>
			<td><?php echo $this->_tpl_vars['examples_crmmasterdata_fax_input']; ?>
</td>
		</tr>
		<tr>
			<td>Email: &nbsp;&nbsp;</td>
			<td><?php echo $this->_tpl_vars['examples_crmmasterdata_email_input']; ?>
</td>
		</tr>
		<tr>
			<td>Website: &nbsp;&nbsp;</td>
			<td><?php echo $this->_tpl_vars['examples_crmmasterdata_website_input']; ?>
</td>
		</tr>
	</table>
	
</body>

</html>