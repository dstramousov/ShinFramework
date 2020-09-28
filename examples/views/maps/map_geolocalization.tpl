{include file="header.tpl"}

<body id="page">

    <a href="{php} echo prep_url(shinfw_base_url().'/index.php/main'); {/php}">Back to Main page</a>
    <br><br>

    <h1>Map geolocalization demo:</h1>
    <h3>This example shows how you can load the coordinates from a file previously using google batch geolocalization. Example need internat connection.</h3> 

    <div class="demo">
        {$gmaps}
    </div>
    
    
</body>
</html>