{include file="header.tpl"}

<body id="page">

    <a href="{php} echo prep_url(shinfw_base_url().'/index.php/main'); {/php}">Back to Main page</a>
    <br><br>

    <h1>Map with markers demo:</h1>
    <h3>This simple example that show map and allow to user to set up markers. Example need internat connection.</h3> 


    <div class="demo">
        {$gmaps}
    </div>
    
    
</body>
</html>