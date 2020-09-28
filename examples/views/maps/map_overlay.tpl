{include file="header.tpl"}

<body id="page">

    <a href="{php} echo prep_url(shinfw_base_url().'/index.php/main'); {/php}">Back to Main page</a>
    <br><br>

    <h1>Map overlay demo:</h1>
    <h3>This example shows how you can draw objects on the map. Example need internat connection.</h3> 

    
    <div class="demo">
        <div style="float: left;">{$gmaps}</div>
        <div id="directionsPanel" style="width:300px; height:500px; overflow: auto"></div> 
    </div>
    
    
</body>
</html>
