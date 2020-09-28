{include file="header.tpl"}

<body id="page">

    <a href="{php} echo prep_url(shinfw_base_url().'/index.php/main'); {/php}">Back to Main page</a>
    <br><br>

    <h1>Map with directions demo:</h1>
    <h3>Example can pave the way from point to point. Example need internat connection.</h3>
    
    <div class="demo">
        <table style="width: 400px">
            <tr>
              <td>
                <select id="mode" onchange="updateMode()">
                  <option value="bicycling">Bicycling</option>
                  <option value="driving">Driving</option>
                  <option value="walking">Walking</option>
                </select>
              </td>
              <td><input type="button" name="" value="Reset" onclick="resetMarkers();"></td>
              <td><input type="button" name="" value="Get Directions!" onclick="calcRoute();"></td>
            </tr>
        </table>
        <div style="float: left;">{$gmaps}</div>
        <div id="directionsPanel" style="width:300px; height:500px; overflow: auto"></div> 
    </div>
    
    
</body>
</html>