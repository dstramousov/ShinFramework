{include file="header.tpl"}

<body id="page">

<a href="{php} echo prep_url(shinfw_base_url().'/index.php/main'); {/php}">Back to Main page</a>
<br/>

<h1>CRM. secure link.</h1>
<h4>ver. {php} echo SHIN_Core::version(); {/php} </h4>
{$timerun}<br/>{$memory}


<fieldset>
	<legend>&nbsp;&nbsp;<b>{$lng_label_tools_fw_menu}</b>&nbsp;&nbsp;</legend>
	{include file="main_menu.tpl"}

</fieldset>

</body>

</html>