{include file="header.tpl"}

<body id="page">

	{include file="back_url.tpl"}

    <h1>SalesForce multiple primary key class extended from <b>"SHIN_MPKModel"</b> test page:</h1>
    <h4>Primary keys:&nbsp;array('year', 'idNetwork', 'idSalesman')</h4>
	<br/>
	Pls attention and review this file:<br/>
	<i>shinframework\examples\models\examples_salesforce_model.php</i><br/>
	function <i>read_form()</i>
    <br><br>	
	<h4>Test 1, fetch by 1 primary key: fetch(2002);</h4>
	<table cellpadding="2" cellspacing="2" border="0">
		<tr><td>Year:</td><td>{$esm1.examples_salesforce_year}</td></tr>
		<tr><td>idNetwork:</td><td>{$esm1.examples_salesforce_idNetwork}</td></tr>
		<tr><td>idSalesman:</td><td>{$esm1.examples_salesforce_idSalesman}</td></tr>
		<tr><td>Label:</td><td>{$esm1.examples_salesforce_label}</td></tr>
		<tr><td>Sort:</td><td>{$esm1.examples_salesforce_sort}</td></tr>
	</table>
    <br><br>	
	<h4>Test 2, fetch by 3 primary key: $h = array('year'=>2002, 'idNetwork'=>747, 'idSalesman'=>1); fetchByID($h);</h4>
	<table cellpadding="2" cellspacing="2" border="0">
		<tr><td>Year:</td><td>{$esm2.examples_salesforce_year}</td></tr>
		<tr><td>idNetwork:</td><td>{$esm2.examples_salesforce_idNetwork}</td></tr>
		<tr><td>idSalesman:</td><td>{$esm2.examples_salesforce_idSalesman}</td></tr>
		<tr><td>Label:</td><td>{$esm2.examples_salesforce_label}</td></tr>
		<tr><td>Sort:</td><td>{$esm2.examples_salesforce_sort}</td></tr>
	</table>
    <br><br>	
	
	<h4>Test 3, fetch by 2 primary key: $h = array('idNetwork'=>987, 'idSalesman'=>2); fetchByID($h);</h4>
	<h4>not show any from update :);</h4>
	<form action="" method="post">
	
	{$esm3.examples_salesforce_year_old}
	{$esm3.examples_salesforce_idNetwork_old}
	{$esm3.examples_salesforce_idSalesman_old}
	
    <div class="demo">
	<table cellpadding="2" cellspacing="2" border="0">
		<tr><td>Year:</td><td>{$esm3.examples_salesforce_year_input}</td></tr>
		<tr><td>idNetwork:</td><td>{$esm3.examples_salesforce_idNetwork_input}</td></tr>
		<tr><td>idSalesman:</td><td>{$esm3.examples_salesforce_idSalesman_input}</td></tr>
		<tr><td>Label:</td><td>{$esm3.examples_salesforce_label_input}</td></tr>
		<tr><td>Sort:</td><td>{$esm3.examples_salesforce_sort_input}</td></tr>
		<tr><td><input type="submit" value="Read form" name="action" id="read_btn"></td><td>&nbsp;</td></tr>
	</table>
    </div>
	</form>
	
</body>

</html>