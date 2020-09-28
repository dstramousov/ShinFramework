<?php /* Smarty version 2.6.26, created on 2011-05-10 14:24:32
         compiled from progressbar_server_side.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<body id="page">

    <a href="<?php  echo prep_url(shinfw_base_url().'main');  ?>">Back to Main page</a>
    <br><br>
    
    <?php echo $this->_tpl_vars['messages']; ?>

    
    <fieldset>
        <legend>Progress Options</legend>
        <table class="progress-options">
            <tr>
                <th>Interval in seconds:</th>
                <td><input type="text" value="1" name="interval" id="intarval" /></td>
            </tr>
            <tr>
                <th>Progress step in %:</th>
                <td><input type="text" value="5" name="step" id="step" onchange="<?php echo 'if($(this).val() > 100) { $(this).val(100);}'; ?>
" /></td>
            </tr>
        </table>
    </fieldset>
    
    <br />

    <?php echo $this->_tpl_vars['progressbar_container']; ?>

    
    <input type="button" name="start-progress" id="start-progress" value="Start Progress" onclick="startProgress();" />
    
    <?php echo '
        <script type="text/javascript">
            
            var timerId =   0;
            
            function startProgress(){
                // 1. disable button
                $(\'#start-progress\').attr(\'disabled\', \'disabled\');
                $(\'.progress-options :input\').attr(\'disabled\', \'disabled\');
                
                // 2. make first call
                callProgress();
                
                // 3. save timer id
                timerId = setInterval(callProgress, $(\'#intarval\').val() == \'\' ? 1000 : $(\'#intarval\').val() * 1000);
                
                // 4. clear message box
                $(\'#js-message p\').text(\'\');
                $(\'#js-message\').hide(\'normal\');
                
                // 5 clear progress bar
                $(\'.ui-progressbar-value\').css(\'width\', \'0%\');
                $(\'.ui-progressbar-value\').text(\'0%\');        
            }
            
            function callProgress(){
                $.getJSON(\''; ?>
<?php echo base_url(); ?><?php echo '/server/server_progress.php\', {
                    step:   $(\'#step\').val == \'\' ? 5 : $(\'#step\').val()    
                }, function(json){
                    if(json.progress >= 100) {
                    
                        json.progress = 100;
                        
                        // 1. clear timer
                        clearTimeout(timerId);
                        
                        // 2. enable button
                        $(\'#start-progress\').removeAttr(\'disabled\');
                        $(\'.progress-options :input\').removeAttr(\'disabled\');
                        
                        // 3. show message
                        $(\'#js-message p\').text(\'Work completed\');
                        $(\'#js-message\').show(\'normal\');
                    }
                    
                    // update progress
                    $(\'.ui-progressbar-value\').css(\'width\', json.progress + \'%\');
                    $(\'.ui-progressbar-value\').text(json.progress + \'%\');
                })
            }
        </script>
    '; ?>


</body>

</html>