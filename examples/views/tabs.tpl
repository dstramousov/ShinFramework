{include file="header.tpl"}

<body id="page">

	{include file="back_url.tpl"}
    
    {literal}
     <style type="text/css">
        /* Vertical Tabs
        ----------------------------------*/
        .ui-tabs-vertical { width: 55em; }
        .ui-tabs-vertical .ui-tabs-nav { padding: .2em .1em .2em .2em; float: left; width: 12em; }
        .ui-tabs-vertical .ui-tabs-nav li { clear: left; width: 100%; border-bottom-width: 1px !important; border-right-width: 0 !important; margin: 0 -1px .2em 0; }
        .ui-tabs-vertical .ui-tabs-nav li a { display:block; width: 80%; }
        .ui-tabs-vertical .ui-tabs-nav li.ui-tabs-selected { padding-bottom: 0; padding-right: .1em; border-right-width: 1px; border-right-width: 1px; }
        .ui-tabs-vertical .ui-tabs-panel { padding: 1em; float: right; width: 40em;}
     </style>
    {/literal}


     <div id="tabs">
        <ul>
            <li><a href="#tabs-1">Example tab 1</a></li>
            <li><a href="#tabs-2">Example tab 2</a></li>
            <li><a href="#tabs-3">Example tab 3</a></li>
        </ul>
        <div id="tabs-1">
            <p>Text of example tab 1</p>
        </div>
        <div id="tabs-2">
            <p>Text of example tab 2</p>
        </div>
        <div id="tabs-3">
            <p>Text of example tab 3</p>
        </div>
    </div>
    <br>
    <br>

    {$tabs1}
    <br>
    <br>

    {$tabs2}
    <br>
    <br>

    {$tabs3}
    <br>
    <br>

    {$tabs4}
</body>

</html>