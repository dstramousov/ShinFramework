<?php /* Smarty version 2.6.26, created on 2011-05-10 14:23:45
         compiled from maps/map_ajax_markers.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<body id="page">

    <a href="<?php  echo prep_url(shinfw_base_url().'/index.php/main');  ?>">Back to Main page</a>
    <br><br>

    <h1>Map with ajax markers demo</h1>
    <h3>Coordinates of all markers are stored in the database. After reloading the page all markers recovered. Example need internat connection.</h3>
    
    <div class="demo">
        <?php echo $this->_tpl_vars['gmaps']; ?>

        <input type="button" name="" value="Reset" onclick="resetMarkers();"> 
    </div>
    
    
</body>
</html>