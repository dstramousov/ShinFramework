{include file="header.tpl"}

<body id="page">


    <a href="{php} echo prep_url(shinfw_base_url().'/index.php/main'); {/php}">Back to Main page</a>
    <br><br>

    <h1>Basic Map demo:</h1>
    <h3>Basic example that show only map without any actions. Example need internat connection.</h3>

    <div class="demo">
        {$gmaps}
    </div>
    
    
</body>
</html>