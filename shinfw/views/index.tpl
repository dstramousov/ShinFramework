{include file="header.tpl"}

<body id="page">


<div class="ui-widget">Main page of the SHIN framework project 12121.</div>
<h3>ver. {php} echo SHIN_Core::version(); {/php} </h3><br/>

<fieldset>
	<legend>&nbsp;&nbsp;<b>Garaventa customer sample</b>&nbsp;&nbsp;</legend>
		<a href="{php} echo base_url().'/testapp'; {/php}">Part of application 1</a>
		<br/>
		<a href="{php} echo base_url().'/testapp'; {/php}">Part of application 2</a>
		<br/>
		<a href="{php} echo base_url().'/testapp'; {/php}">Part of application 3</a>
</fieldset>


<br/>
<br/>

<fieldset>
	<legend>&nbsp;&nbsp;<b>Another samples</b>&nbsp;&nbsp;</legend>
		<a href="{php} echo base_url().'/testapp'; {/php}">Test application. (all SHIN_Charts samples)</a>
		<br/>
		<a href="{php} echo base_url().'/examples'; {/php}">Examples folder. (Examples off all components)</a>
		<br/>
		<a href="{php} echo base_url().'/ppfm'; {/php}">Personal Finance Manager. (Test PPFM application)</a>
</fieldset>

<br/>
<br/>
<br/>

{$timerun}<br/>
{$memory}

</body>

</html>