{include file="header.tpl"}

<body id="page">

	{include file="back_url.tpl"}

    <h1>SHIN_Model delete cascading test page:</h1>

	
    <h4>Requested models:</h4>
	<h4>array('gtrwebsite_answers_model', 'gtrwebsite_answers'),</h4>
	<h4>array('gtrwebsite_question_model', 'gtrwebsite_question'),</h4>
	<h4>array('gtrwebsite_tree_model', 'gtrwebsite_tree'),</h4>

	<h4>I try to delete information from "gtrwebsite_tree", follow instruction: <b>$ret = $model->delCascading(5);</b></h4>
	<br/>

	<h4>Result of this operation follow:</h4>
	<h4>1 record from "gtrwebsite_answers"</h4>
	<h4>1 record from "gtrwebsite_question"</h4>
	<h4>1 record from "gtrwebsite_tree"</h4>
	<br/>
	<h4>Total removed records = {$count_deleted_record}</h4>
	
</body>

</html>