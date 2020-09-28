{include file="header.tpl"}

<body id="page">

	{include file="back_url.tpl"}

	<h1>DB usage demo:</h1>

	<h3>sample 1:</h3>
	<h4>SELECT * FROM fsh_folders LIMIT 20, 10</h4>
	<table>
		{section name=mysec loop=$sample1_res}
			{strip}
   				<tr bgcolor="{cycle values="#aaaaaa,#bbbbbb"}">
      				<td>{$sample1_res[mysec].id}</td>
      				<td>{$sample1_res[mysec].file_id}</td>
      				<td>{$sample1_res[mysec].count}</td>
      				<td>{$sample1_res[mysec].created}</td>
   				</tr>
			{/strip}
		{/section}
	</table>

	<h3>sample 2:</h3>
	<h4>SELECT id, file_id, tag FROM fsh_tags LIMIT 20</h4>
	<table>
		{section name=mysec2 loop=$sample2_res}
			{strip}
   				<tr bgcolor="{cycle values="#aaaaaa,#bbbbbb"}">
      				<td>{$sample2_res[mysec2].id}</td>
      				<td>{$sample2_res[mysec2].file_id}</td>
      				<td>{$sample2_res[mysec2].count}</td>
      				<td>{$sample2_res[mysec2].created}</td>
   				</tr>
			{/strip}
		{/section}
	</table>

	<h3>sample 3:</h3>
	<h4>SELECT * FROM fsh_files WHERE id="2"</h4>
	<table cellpadding="1" cellspacing="1" border="1">
   		<tr>
			<td>{$sample3_res.id}</td>
			<td>{$sample3_res.file_id}</td>
			<td>{$sample3_res.count}</td>
			<td>{$sample3_res.created}</td>
		</tr>
	</table>

</body>

</html>