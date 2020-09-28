{include file="header.tpl"}

<body id="page">

	{include file="back_url.tpl"}
    
    <fieldset>
        <legend style="font-size: 30px; font-weight: bold;">CRUD Virtual Example</legend>
        
        <div class="messages">
            {$jsMessages}
            {$jsErrors}
        </div>

        <br />

        <div class="controls">
            <a href="#" id="add_user_button"></a>
        </div>


        <!-- init block of crud -->
        {$crudData}
        <!-- init block of crud -->
        
        <fieldset>
            <legend>User List</legend>
            {$ssstylemustbehere}
        </fieldset>
        
    </fieldset>
    
    {literal}
     <style type="text/css">
        th{
            text-align: left;
        }
        
        th, td{
            padding-top: 5px;
            padding-bottom: 5px;
            padding-left: 2px;
            padding-right: 2px;
        }
        
        input {
            width: 250px !important;
        }
     </style>
    {/literal}
    
</body>
</html>
