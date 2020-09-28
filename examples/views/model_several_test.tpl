{include file="header.tpl"}

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

	{include file="back_url.tpl"}

    <h1>SHIN_Model printCollectionObjects function test page:</h1>
    <h3>data from examples_tag table:</h3>
    <br/>

    <h4>code from server side:</h4>
	<i>
    $m = SHIN_Core::$_models['examples_tag']->get_instance();<br/>
    $m->printCollectionObjects();
	</i>

    <br/>
    <br/>
    <h4>code from template side:</h4>
	<i>
	{literal}
		<br/>
		{ section name=id loop=$examples_tags_id }<br/>
			&nbsp;&nbsp;&nbsp;Tag -> <b>{ $examples_tags_tag[id] }</b>   <br/>
		{ /section }<br/>
	{/literal}
	</i>

	<br/><br/>This is all :)

<table width="780" border="0" cellpadding="0" cellspacing="0" style="height: 100%;" align="center">
	<tr>
		<td colspan="2"  align="center">
			<br>
			<table width="990" border="1" cellpadding="0" cellspacing="10" align="center">
				<tr valign="top">
					<td align="center">
						{$nav_str_up}
					</td>
				</tr>
				<tr valign="top">
					<td align="center">
					<!-- main loop for assigned tags object`s -->
                    <ul class="gallery-list">
                    { section name=id loop=$examples_tags_id }
                        <li>
                            <table>
                                <tr>
                                    <td valign="top" width="150">
                                    Tag -> <b>{ $examples_tags_tag[id] }</b>
                                    </td>
                                </tr>
                            </table>
					   </li>
                    { /section }
                    <div class="clear"></div>
                    </ul>
					<!-- end loop -->
					</td>
				</tr>
				<tr valign="top">
					<td align="center">
						{$nav_str_down}
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

</body></html>