<?php /* Smarty version 2.6.26, created on 2011-05-20 11:42:31
         compiled from image.tpl */ ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
    <title>Image</title>
</head>
<body>    

	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "back_url.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    
    <form action="image.php" enctype="multipart/form-data" method="POST">
        <input type="file" name="myimg" /><br/>
        <br/>
        <input type="submit" name="do" value="Upload&resize"><br/>
    </form>    
</body>
</html>