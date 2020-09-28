{include file="header.tpl"}

    <body id="page">

	{include file="back_url.tpl"}

        To see tooltip move mouse over <b><span id="tooltip1">this text block</span></b>
        <br><br>
        To see image tooltip move mouse over <b><span id="tooltip2">this text block</span></b>
        <br><br>
        To see tooltip with attributes move mouse over <b><span id="tooltip3">this text block</span></b>
        <br><br>
        To see ajax tooltip move mouse over <b><span id="tooltip4">this text block</span></b>
        <br><br>
        To see youtube tooltip click on <b><span id="tooltip5">this text block</span></b>
        <br><br>
        <div id="tooltip6" style="width: 350px; height: 150px; border: 1px solid black; padding: 3px;">To see positioned tooltip<br> move mouse over this text block</div>
        
    </body>
    
    {literal}
        <style type="text/css">
            .custom-style{
                max-width: 500px !important;
                width: 500px !important;
            }
            
            .image-style {
                max-width: 300px !important;
                width: 300px !important;
            }
        </style>
    {/literal}

</html>