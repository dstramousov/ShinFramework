{include file="header.tpl"}

<body id="page">

	{include file="back_url.tpl"}

    <fieldset style="float: left; margin-right: 250px;">
        <legend>Basic Zoom</legend>
        {$zoom1}
    </fieldset>
    
    <fieldset style="float: left; margin-right: 250px;">
        <legend>Zoom with Gallery</legend>
        {$zoom2}
        <br />
        {$zoom2Gallery}
    </fieldset>
    
    <br />
    
    <fieldset style="float: left; margin-right: 500px;">
        <legend>Zoom with Tints</legend>
        {$zoom3}
    </fieldset>
    
    <fieldset style="float: left;">
        <legend>Zoom with Inner Zoomer</legend>
        {$zoom4}
    </fieldset>
    
    <fieldset style="float: left;">
        <legend>Zoom with Soft Focus</legend>
        {$zoom5}
        <div id="anypos" style="position:absolute;top: 900px; left: 298px;width:256px; height:256px;"></div>

    </fieldset>
   
    
</body>

</html>