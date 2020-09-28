<?php /* Smarty version 2.6.26, created on 2011-05-16 08:39:08
         compiled from datatables.tpl */ ?>
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

	<h1>Datatables demo</h1>
    
    <?php echo '
        <script type="text/javascript">
            function fnShowHide( iCol ) {
            
                var bVis = sample_element.fnSettings().aoColumns[iCol].bVisible;
                           sample_element.fnSetColumnVis( iCol, bVis ? false : true );
            }

        </script>
    '; ?>

    
    <a href="javascript:void(0);" onclick="fnShowHide(0);">Toggle column 1<br></a>
    <a href="javascript:void(0);" onclick="fnShowHide(1);">Toggle column 2<br></a>
    <a href="javascript:void(0);" onclick="fnShowHide(2);">Toggle column 3<br></a>

	<br/>
	<h3>Server side DOM structure initialization sample:</h3>
	<?php echo $this->_tpl_vars['domstylemustbehere']; ?>

	
	<br/><br/>
	<h3>Server side JS style initialization sample:</h3>
	<div id="jsstylemustbehere"></div>
		
	<br/><br/>
	<h3>Server side with SHIN_Connectors style initialization sample:</h3>
	<?php echo $this->_tpl_vars['ssstylemustbehere']; ?>


	<!--
	<br/><br/>
	<h3>Server side AJAX style initialization sample:</h3>
	<div id="sample_element3"></div>
	-->

</body>

</html>