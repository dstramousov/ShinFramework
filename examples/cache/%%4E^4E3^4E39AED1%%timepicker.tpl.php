<?php /* Smarty version 2.6.26, created on 2011-01-11 15:15:31
         compiled from timepicker.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<body id="page">

    <a href="<?php  echo prep_url(shinfw_base_url().'/index.php/main');  ?>">Back to Main page</a>
    <br><br>

    <h1>Time picker demo:</h1>

    <div class="demo">

    <p>Date: <input id="timepicker" type="text" value="03:15PM"/></p>

    </div>

</body>

</html>