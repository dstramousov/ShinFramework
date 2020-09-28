{include file="header.tpl"}

<body id="page">

    <a href="{php} echo prep_url(shinfw_base_url().'/index.php/main'); {/php}">Back to Main page</a>
    <br><br>

    <h1>Map with street view:</h1>
    <h3>The example shows how you can use google street view. Example need internat connection.</h3> 
    
    <div class="demo">
        <div style="float: left;">
        {$gmaps}
        </div>
        <div style="float: left;">
        {$pano}
        </div>
    </div>
    
    
</body>
</html>
