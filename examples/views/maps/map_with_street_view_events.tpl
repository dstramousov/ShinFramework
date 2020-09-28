{include file="header.tpl"}

<body id="page">

    <a href="{php} echo prep_url(shinfw_base_url().'/index.php/main'); {/php}">Back to Main page</a>
    <br><br>

    <h1>Map with street events:</h1>
    <h3>The example shows how you can use google street view and use info about view. Example need internat connection.</h3> 
    
    <div class="demo">
        <div style="float: left;">
        {$gmaps}
        </div>
        <div style="float: left;">
        {$pano}
        </div>
        <div style="float: left;">
            <table>
              <tr>
                <td><b>Position</b></td><td id="position_cell">&nbsp;</td>
              </tr>
              <tr>
                <td><b>POV Heading</b></td><td id="heading_cell">270</td>
              </tr>
              <tr>
                <td><b>POV Pitch</b></td><td id="pitch_cell">0.0</td>
              </tr>
              <tr>
                <td><b>Pano ID</b></td><td id="pano_cell">&nbsp;</td>
              </tr>
            </table>
            <table id="links_table"></table>
        </div>
    </div>
    
    
</body>
</html>
