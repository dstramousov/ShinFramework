<?php /* Smarty version 2.6.26, created on 2011-05-10 14:25:35
         compiled from tabs.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<body id="page">

    <a href="<?php  echo prep_url(shinfw_base_url().'main');  ?>">Back to Main page</a>
    <br><br>
    
    <?php echo '
     <style type="text/css">
        /* Vertical Tabs
        ----------------------------------*/
        .ui-tabs-vertical { width: 55em; }
        .ui-tabs-vertical .ui-tabs-nav { padding: .2em .1em .2em .2em; float: left; width: 12em; }
        .ui-tabs-vertical .ui-tabs-nav li { clear: left; width: 100%; border-bottom-width: 1px !important; border-right-width: 0 !important; margin: 0 -1px .2em 0; }
        .ui-tabs-vertical .ui-tabs-nav li a { display:block; width: 80%; }
        .ui-tabs-vertical .ui-tabs-nav li.ui-tabs-selected { padding-bottom: 0; padding-right: .1em; border-right-width: 1px; border-right-width: 1px; }
        .ui-tabs-vertical .ui-tabs-panel { padding: 1em; float: right; width: 40em;}
     </style>
    '; ?>



     <div id="tabs">
        <ul>
            <li><a href="#tabs-1">Example tab 1</a></li>
            <li><a href="#tabs-2">Example tab 2</a></li>
            <li><a href="#tabs-3">Example tab 3</a></li>
        </ul>
        <div id="tabs-1">
            <p>Text of example tab 1</p>
        </div>
        <div id="tabs-2">
            <p>Text of example tab 2</p>
        </div>
        <div id="tabs-3">
            <p>Text of example tab 3</p>
        </div>
    </div>
    <br>
    <br>

    <?php echo $this->_tpl_vars['tabs1']; ?>

    <br>
    <br>

    <?php echo $this->_tpl_vars['tabs2']; ?>

    <br>
    <br>

    <?php echo $this->_tpl_vars['tabs3']; ?>

    <br>
    <br>

    <?php echo $this->_tpl_vars['tabs4']; ?>

</body>

</html>