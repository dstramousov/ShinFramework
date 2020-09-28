{include file="header.tpl"}

<body id="page">

	{include file="back_url.tpl"}
    
    {$messages}
    
    <fieldset>
        <legend>Progress Options</legend>
        <table class="progress-options">
            <tr>
                <th>Interval in seconds:</th>
                <td><input type="text" value="1" name="interval" id="intarval" /></td>
            </tr>
            <tr>
                <th>Progress step in %:</th>
                <td><input type="text" value="5" name="step" id="step" onchange="{literal}if($(this).val() > 100) { $(this).val(100);}{/literal}" /></td>
            </tr>
        </table>
    </fieldset>
    
    <br />

    {$progressbar_container}
    
    <input type="button" name="start-progress" id="start-progress" value="Start Progress" onclick="startProgress();" />
    
    {literal}
        <script type="text/javascript">
            
            var timerId =   0;
            
            function startProgress(){
                // 1. disable button
                $('#start-progress').attr('disabled', 'disabled');
                $('.progress-options :input').attr('disabled', 'disabled');
                
                // 2. make first call
                callProgress();
                
                // 3. save timer id
                timerId = setInterval(callProgress, $('#intarval').val() == '' ? 1000 : $('#intarval').val() * 1000);
                
                // 4. clear message box
                $('#js-message p').text('');
                $('#js-message').hide('normal');
                
                // 5 clear progress bar
                $('.ui-progressbar-value').css('width', '0%');
                $('.ui-progressbar-value').text('0%');        
            }
            
            function callProgress(){
                $.getJSON('{/literal}{php}echo base_url();{/php}{literal}/server/server_progress.php', {
                    step:   $('#step').val == '' ? 5 : $('#step').val()    
                }, function(json){
                    if(json.progress >= 100) {
                    
                        json.progress = 100;
                        
                        // 1. clear timer
                        clearTimeout(timerId);
                        
                        // 2. enable button
                        $('#start-progress').removeAttr('disabled');
                        $('.progress-options :input').removeAttr('disabled');
                        
                        // 3. show message
                        $('#js-message p').text('Work completed');
                        $('#js-message').show('normal');
                    }
                    
                    // update progress
                    $('.ui-progressbar-value').css('width', json.progress + '%');
                    $('.ui-progressbar-value').text(json.progress + '%');
                })
            }
        </script>
    {/literal}

</body>

</html>