<?php /* Smarty version 2.6.26, created on 2010-10-13 13:05:09
         compiled from main_page.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<body>


	<fieldset>
		<legend>&nbsp;&nbsp;<b><?php echo $this->_tpl_vars['lng_label_tools_fw_menu']; ?>
</b>&nbsp;&nbsp;</legend>
		<div class="shin-general-menu">
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main_menu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <div class="shin-clear"></div>
        </div>
	</fieldset>

	<br/>

	<fieldset>
		<legend style="font-size: 20px; font-weight: bold;"><?php echo $this->_tpl_vars['lng_label_main_fw_menu']; ?>
</legend>
							
		<!-- main menu visualization -->
		<?php echo $this->_tpl_vars['GeneralMenu']; ?>

		<!-- end of main menu visualization -->

		<?php 
			// this is another way for integrate widgets in to the page. i mean "Directly call".
			// echo SHIN_Core::runWidget('clock', array('mode'=>'AM'));
		 ?>
		        
	</fieldset>

	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'tech_info.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    
</body>
</html>