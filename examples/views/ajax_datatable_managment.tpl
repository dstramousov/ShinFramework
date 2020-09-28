{include file="header.tpl"}

<body id="page">

	{include file="back_url.tpl"}
    
    <fieldset>
        <legend style="font-size: 30px; font-weight: bold;">Ajax Datatable Managment</legend>
        <div class="messages">
            {$jsMessages}
            {$jsErrors}
        </div>
        <div class="action-input">
            <a href="" id="add_example_button"></a>
        </div>
        <div class="data-list">
            {$ssstylemustbehere}
        </div>
    </fieldset>
    
    <!-- crudd  data -->
    {$crudData}
    <!-- crudd data -->
    
    {literal}
    <style type="text/css">
        table td,th{
            padding: 2px;
        }
        
        th{
            text-align: left;
        }
        
        td input {
            width: 200px !important;
        }
        
        .validatetion-error {
           font-size: 10px;
        }
    </style>
    {/literal}
</body>
</html>
