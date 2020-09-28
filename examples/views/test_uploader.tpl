{include file="header.tpl"}

	{include file="back_url.tpl"}

    <div id="imageUploader"></div>
    <div class="upload-action" id="upload-action"></div>
    
    <fieldset>
        <legend>Original images</legend>
        {foreach from=$files item=file}
            <a href="{php}echo SHIN_Core::$_config['core']['app_base_url'];{/php}/{$baseDir}/original/{$file}">{$file}</a>
        {/foreach}
    </fieldset>
    
    <br /><br />
    
    <fieldset>
        <legend>Thumbs images</legend>
        {foreach from=$thumbs item=thumb}
            <a href="{php}echo SHIN_Core::$_config['core']['app_base_url'];{/php}/{$baseDir}/thumbs/{$thumb}">{$thumb}</a>
        {/foreach}
    </fieldset>
    
    <br /><br />
    
    <fieldset>
        <legend>Log list</legend>
        {foreach from=$logs item=log}
            <a href="../shinfw/logs/{$log}">{$log}</a>
        {/foreach}
    </fieldset>
    
    {literal}
        <script type="text/javascript">
            function reloadWindow(){
                window.location = '{/literal}{php}echo SHIN_Core::$_config['core']['app_base_url'];{/php}{literal}/test_uploader.php'; 
            }
        </script>
    {/literal}