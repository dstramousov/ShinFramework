{include file="header.tpl"}

<body id="page">

    <a href="{php} echo prep_url(shinfw_base_url().'/index.php/main'); {/php}">Back to Main page</a>
    <br><br>

    <h1>Map with user icon markers:</h1>
    <h3>The example shows how you can use own markers icons. Example need internat connection.</h3> 
    

    <div class="demo">
        {$gmaps}
    </div>
    
    
</body>
</html>
