{include file="header.tpl"}

<body id="page">

	{include file="back_url.tpl"}
    
    <fieldset>
        <legend style="font-size: 30px; font-weight: bold;">Context Menu example</legend>
        
        <fieldset style="width: 370px; float: left;">
            <legend style="font-size: 30px; font-weight: bold;">Basic Menu example</legend>
            <div id="with-context-menu" style="float: left; width: 300px; height: 300px; background-color: #6CC8EF;">Right click to view the context menu </div>
        </fieldset>
        
        <fieldset style="width: 370px; float: left;">
            <legend style="font-size: 30px; font-weight: bold;">Menu  with callback example</legend>
            <div id="with-context-menu2" style="float: left; width: 300px; height: 300px; background-color: #6CC8EF;">Right click to view the context menu </div>
        </fieldset>
        
        <fieldset style="width: 370px; float: left;">
            <legend style="font-size: 30px; font-weight: bold;">Menu  with disabled items</legend>
            <div id="with-context-menu3" style="float: left; width: 300px; height: 300px; background-color: #6CC8EF;">Right click to view the context menu </div>
        </fieldset>
        
        <ul id="myMenu" class="contextMenu">
            <li class="edit"><a href="#edit">Edit</a></li>
            <li class="cut separator"><a href="#cut">Cut</a></li>
            <li class="copy"><a href="#copy">Copy</a></li>
            <li class="paste"><a href="#paste">Paste</a></li>
            <li class="delete"><a href="#delete">Delete</a></li>
            <li class="quit separator"><a href="#quit">Quit</a></li>
        </ul>
        
        <ul id="myMenu2" class="contextMenu">
            <li class="edit"><a href="#edit">Edit</a></li>
            <li class="cut separator"><a href="#cut">Cut</a></li>
            <li class="copy"><a href="#copy">Copy</a></li>
            <li class="paste"><a href="#paste">Paste</a></li>
            <li class="delete"><a href="#delete">Delete</a></li>
            <li class="quit separator"><a href="#quit">Quit</a></li>
        </ul>
        
    </fieldset>
    
</body>

</html>