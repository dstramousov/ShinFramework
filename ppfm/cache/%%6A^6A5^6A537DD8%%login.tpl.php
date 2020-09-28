<?php /* Smarty version 2.6.26, created on 2010-06-16 15:53:05
         compiled from login.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<body>

<form action="<?php  echo base_url().'/index.php/trylogin';  ?>" method="post" enctype="multipart/form-data" >

<title>Login page</title>
<div style="padding:130px; text-align: center;">
<table border="0" align="center" cellpadding="5" cellspacing="5">
 <tr bgcolor="#FF0000" class="bodyText">
  <td colspan="2"><div align="center" class="bodyReverse">
   Please login</div></td>
 </tr>
 <tr class="bodyText">
  <td><div align="right">Username:</div></td>
  <td><input name="user_login" id="emailtop" type="text" runat="server"/></td>
 </tr>
 <tr class="bodyText"> 
  <td><div align="right">Password:</div></td> 
  <td><input name="user_password" id="password" type=password runat="server"/></td> 
 </tr>
 <tr class="bodyText"> 
  <td><div align="right"><?php echo '<?php'; ?>
 echo $error_msg;<?php echo '?>'; ?>
</div></td> 
  <td></td> 
 </tr>

<tr>
  <td colspan="2"><div align="center">
    <input id="submitButton" class="inputButtonActive" type="submit" value="Submit" name="submitButton"/>
  </td>
 </tr> 
<tr>
  <td colspan="2">
  </td>
  </tr>
</table>
</div>

</form>

</body>
</html>
