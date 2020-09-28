{include file="header.tpl"}

<body id="page">

	{include file="back_url.tpl"}

	<h1>Datatables demo</h1>
    
    {literal}
        <script type="text/javascript">
            function fnShowHide( iCol ) {
            
                var bVis = sample_element.fnSettings().aoColumns[iCol].bVisible;
                           sample_element.fnSetColumnVis( iCol, bVis ? false : true );
            }

        </script>
    {/literal}
    
    <a href="javascript:void(0);" onclick="fnShowHide(0);">Toggle column 1<br></a>
    <a href="javascript:void(0);" onclick="fnShowHide(1);">Toggle column 2<br></a>
    <a href="javascript:void(0);" onclick="fnShowHide(2);">Toggle column 3<br></a>

	<br/>
	<h3>Server side DOM structure initialization sample:</h3>
	{$domstylemustbehere}
	
	<br/><br/>
	<h3>Server side JS style initialization sample:</h3>
	<div id="jsstylemustbehere"></div>
		
	<br/><br/>
	<h3>Server side with SHIN_Connectors style initialization sample:</h3>
	{$ssstylemustbehere}

	<!--
	<br/><br/>
	<h3>Server side AJAX style initialization sample:</h3>
	<div id="sample_element3"></div>
	-->

</body>

</html>