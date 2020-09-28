{include file="header.tpl"}

<body id="page">

	{include file="back_url.tpl"}

    {literal}
    <style type="text/css">
        body { font-size: 62.5%; }
        label, input { display:block; }
        input.text { margin-bottom:12px; width:95%; padding: .4em; }
        h1 { font-size: 1.2em; margin: .6em 0; }
        div#users-contain { width: 350px; margin: 20px 0; }
        div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
        div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
        .ui-dialog .ui-state-error { padding: .3em; }
        .validateTips { border: 1px solid transparent; padding: 0.3em; }
        
    </style>
    {/literal}
    
    <fieldset>
        <legend>Errors examples</legend>
        {$errors}
    </fieldset>
    
    <fieldset>
        <legend>Messages examples</legend>
        {$messages}
    </fieldset>
    
    <fieldset>
        <legend>Messages by type</legend>
        {$getMessages}
    </fieldset>

</body>

</html>