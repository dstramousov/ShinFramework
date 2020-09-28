{include file="header.tpl"}

<body id="page">

	{include file="back_url.tpl"}

	<h1>Database/Tables manipulation:</h1>

	<div class="demo">
		<table border="0" cellpadding="0" cellspacing="0" align="left">
			<tr valign="middle">
				<td>
					<form action="{php} echo prep_url(base_url().'/examples'); {/php}/dbforge.php" method="post">
						<input type="hidden" name="requestaction" value="delete_table" />
        				<input type="image" src="{php} echo prep_url(base_url());{/php}/examples/images/delete_table.jpg" height="115" width="127" style="border:none;"> 
					</form>
				</td>
				<td>
					<form action="{php} echo prep_url(base_url().'/examples'); {/php}/dbforge.php" method="post">
						<input type="hidden" name="requestaction" value="create_table" />
						<input type="image" src="{php} echo prep_url(base_url());{/php}/examples/images/create_table.jpg" height="115" width="121" style="border:none;"> 
					</form>
				</td>
				<td>
					<form action="{php} echo prep_url(base_url().'/examples'); {/php}/dbforge.php" method="post">
						<input type="hidden" name="requestaction" value="insert_test" />
						<input type="image" src="{php} echo prep_url(base_url());{/php}/examples/images/insert_test.jpg" height="115" width="117" style="border:none;"> 
					</form>
				</td>
			</tr>            
			<tr><td colspan="4"><div align="center">{$msg}</div></td></tr>
		</table>
	</div>

</body>

</html>