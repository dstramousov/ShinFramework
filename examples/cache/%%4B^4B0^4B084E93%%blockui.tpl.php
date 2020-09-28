<?php /* Smarty version 2.6.26, created on 2011-05-20 12:45:32
         compiled from blockui.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<?php echo '
	<style type="text/css">
		div.blockMe {
			background-color:#FFFFDD;
			border:10px solid #CCCCCC;
			margin:30px;
			padding:30px;
		}
		
		
	div.growlUI { background: url(check48.png) no-repeat 10px 10px }
	div.growlUI h1, div.growlUI h2 { color: white; padding: 5px 5px 5px 75px; text-align: left }
	div.growlUI h2 { font-size: medium }
		
	</style>
'; ?>




<body id="page">

	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "back_url.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<h3> All customization parts you can change in to shinframework\examples\blockui.php </h3>
	<h3> Three params: $css, $overlayCSS, $growlCSS </h3>

	<input type="button" value="Block" id="blockButton" />
	<input type="button" value="Block with Message" id="blockButton2" />
    <input type="button" value="Custom Block" id="blockButton3" />
	<input type="button" value="Custom With Image" id="blockButton4" />
	<input type="button" value="Unblock" id="unblockButton" />
	
	
        <div id="test" class="blockMe">
            <p />

            lorem ipsum dolor sit amet
            consectetuer adipiscing elit
            sed lorem leo
            lorem leo consectetuer adipiscing elit
            sed lorem leo
            lorem ipsum dolor sit amet
            consectetuer adipiscing elit
            sed lorem leo
            lorem leo consectetuer adipiscing elit
            sed lorem leo
            lorem ipsum dolor sit amet
            consectetuer adipiscing elit
            sed lorem leo
            lorem leo consectetuer adipiscing elit
            sed lorem leo
            rhoncus sit amet
            lorem ipsum dolor sit amet
            consectetuer adipiscing elit
            sed lorem leo
            sed lorem leo
            rhoncus sit amet<br />
        </div>
		
		
<br/>		


        <div class="growlUI" style="display:none">
           <h1>Growl Notification</h1>
			<h2>Object updated !</h2>
        </div>


<p />

	    
</body>

</html>