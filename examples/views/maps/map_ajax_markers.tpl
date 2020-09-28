{include file="header.tpl"}

<body id="page">

    <a href="{php} echo prep_url(shinfw_base_url().'/index.php/main'); {/php}">Back to Main page</a>
    <br><br>

    <h1>Map with ajax markers demo</h1>
    <h3>Coordinates of all markers are stored in the database. After reloading the page all markers recovered. Example need internat connection.</h3>
    
    <div class="demo">
        {$gmaps}
        <input type="button" name="" value="Reset" onclick="resetMarkers();"> 
    </div>
    
    
</body>
</html>