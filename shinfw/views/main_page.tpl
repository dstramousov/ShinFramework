{include file="header.tpl"}

<body>


	<fieldset>
		<legend>&nbsp;&nbsp;<b>{$lng_label_tools_fw_menu}</b>&nbsp;&nbsp;</legend>
		<div class="shin-general-menu">
            {include file="main_menu.tpl"}
            <div class="shin-clear"></div>
        </div>
	</fieldset>

	<br/>

	<fieldset>
		<legend style="font-size: 20px; font-weight: bold;">{$lng_label_main_fw_menu}</legend>
							
		<!-- main menu visualization -->
		{$GeneralMenu}
		<!-- end of main menu visualization -->

		{php}
			// this is another way for integrate widgets in to the page. i mean "Directly call".
			// echo SHIN_Core::runWidget('clock', array('mode'=>'AM'));
		{/php}
		        
	</fieldset>

	{include file='tech_info.tpl'}
    
</body>
</html>