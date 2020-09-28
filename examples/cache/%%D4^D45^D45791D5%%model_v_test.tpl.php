<?php /* Smarty version 2.6.26, created on 2010-12-10 15:18:04
         compiled from model_v_test.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<body id="page">

    <a href="<?php  echo prep_url(shinfw_base_url().'/index.php/main');  ?>">Back to Main page</a>
    <br><br>

    <h1>SHIN_Model virtual behaviour class test page:</h1><br/>


    <?php echo $this->_tpl_vars['model_description']; ?>

		
</body>

</html>