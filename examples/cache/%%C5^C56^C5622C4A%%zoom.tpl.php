<?php /* Smarty version 2.6.26, created on 2011-03-09 09:45:34
         compiled from zoom.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<body id="page">

    <a href="<?php  echo prep_url(shinfw_base_url().'main');  ?>">Back to Main page</a>
    <br><br>

    <fieldset style="float: left; margin-right: 250px;">
        <legend>Basic Zoom</legend>
        <?php echo $this->_tpl_vars['zoom1']; ?>

    </fieldset>
    
    <fieldset style="float: left; margin-right: 250px;">
        <legend>Zoom with Gallery</legend>
        <?php echo $this->_tpl_vars['zoom2']; ?>

        <br />
        <?php echo $this->_tpl_vars['zoom2Gallery']; ?>

    </fieldset>
    
    <br />
    
    <fieldset style="float: left; margin-right: 500px;">
        <legend>Zoom with Tints</legend>
        <?php echo $this->_tpl_vars['zoom3']; ?>

    </fieldset>
    
    <fieldset style="float: left;">
        <legend>Zoom with Inner Zoomer</legend>
        <?php echo $this->_tpl_vars['zoom4']; ?>

    </fieldset>
    
    <fieldset style="float: left;">
        <legend>Zoom with Soft Focus</legend>
        <?php echo $this->_tpl_vars['zoom5']; ?>

        <div id="anypos" style="position:absolute;top: 900px; left: 298px;width:256px; height:256px;"></div>

    </fieldset>
   
    
</body>

</html>