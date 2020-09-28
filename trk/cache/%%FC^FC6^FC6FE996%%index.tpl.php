<?php /* Smarty version 2.6.26, created on 2011-05-04 08:13:30
         compiled from proom/profile/index.tpl */ ?>
<?php echo $this->_tpl_vars['jsdocready']; ?>

<div class="profile-tab">
    <div class="b-messages">
        <?php echo $this->_tpl_vars['jsMessages']; ?>

        <?php echo $this->_tpl_vars['jsErrors']; ?>

    </div>
    <fieldset>
        <span style="color:red; font-weight:bold"><?php echo $this->_tpl_vars['lng_label_prifle_legend']; ?>
:</span>
        <br/>
        <table class="photograper-data">
            <tr>
                <td colspan="2"><?php echo $this->_tpl_vars['trk_user_userId_hidden']; ?>
</td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_prifle_photograper_first_name']; ?>
</th>
                <td><?php echo $this->_tpl_vars['trk_user_sys_user_name_input']; ?>
</td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_prifle_photograper_last_name']; ?>
</th>
                <td><?php echo $this->_tpl_vars['trk_user_sys_user_lastname_input']; ?>
</td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_prifle_photograper_email']; ?>
</th>
                <td><?php echo $this->_tpl_vars['trk_user_sys_user_email_input']; ?>
</td>
            </tr>
            <tr>
                <td align="right" colspan="2">
                    <input type="button" name="" value="<?php echo $this->_tpl_vars['lng_label_prifle_photograper_button']; ?>
" id="save-btn" />
                    <input type="button" name="" value="<?php echo $this->_tpl_vars['lng_label_prifle_photograper_change_pwd']; ?>
" id="change-pwd" onclick="$('#change-pwd-dialog').dialog('open');" />
                </td>
            </tr>
        </table>
    </fieldset>
</div>

<div id="change-pwd-dialog" class="change-pwd-dialog">
    <div class="b-messages">
        <?php echo $this->_tpl_vars['jsDialogMessages']; ?>

        <?php echo $this->_tpl_vars['jsDialogErrors']; ?>

    </div>
    <table>
        <tr>
            <th><?php echo $this->_tpl_vars['lng_label_prifle_photograper_old_password']; ?>
</th>
            <td><input type="password" name="password" value="" id="old-password" /></td>
        </tr>
        <tr>
            <th><?php echo $this->_tpl_vars['lng_label_prifle_photograper_new_password']; ?>
</th>
            <td><input type="password" name="password" value="" id="new-password" /></td>
        </tr>
        <tr>
            <th><?php echo $this->_tpl_vars['lng_label_prifle_photograper_confirm_password']; ?>
</th>
            <td><input type="password" name="confirm-password" value="" id="confirm-password" /></td>
        </tr>
    </table>
</div>

<?php echo '
    <script type="text/javascript">
        $(document).ready(function(){
        
            $(\'#save-btn\').click(function(){
                saveInformation();    
            })
        })
        
        function closeDialog(){
            $(\'#change-pwd-dialog\').dialog(\'close\');
            $(\'#change-pwd-dialog :input\').val(\'\');    
        }
        
        function saveInformation(){
            
            var data = {};
            
            $(\'.photograper-data :input\').each(function(){
                data[$(this).attr(\'id\')] = $(this).val();    
            })
            $.getJSON(\''; ?>
<?php echo prep_url(base_url().'/profile/saveinfo'); ?><?php echo '\', data, function(json){
                if(json.result) {
                    showMessage(json.message, \'message\');
                } else {
                    showMessage(json.message, \'error\');
                }
            })    
        }
        
        function savePwd(){
            
            var data = {};
            
            $(\'#change-pwd-dialog :input\').each(function(){
                data[$(this).attr(\'id\')] = $(this).val();
            })
            
            $.getJSON(\''; ?>
<?php echo prep_url(base_url().'/profile/savepwd'); ?><?php echo '\', data, function(json){
                if(json.result) {
                    showDialogMessage(json.message, \'message\');
                } else {
                    showDialogMessage(json.message, \'error\');
                }
            })
        }
        
        function showMessage(messages, type){
            var message = \'\';
            
            for(index in messages) {
                message += messages[index] + \'<br />\';
            }
            
            if(type == \'message\') {
                $(\'#message p\').html(message);
                $(\'#message\').show();
            } else {
                $(\'#error p\').html(message);
                $(\'#error\').show();
            }
            
            setTimeout(hideMessageBoxes, 5000);    
        }
        
        function hideMessageBoxes(){
             $(\'#message\').fadeOut(\'normal\');       
             $(\'#error\').fadeOut(\'normal\');    
        }
        
        function showDialogMessage(messages, type){
            var message = \'\';
            
            for(index in messages) {
                message += messages[index] + \'<br />\';
            }
            
            if(type == \'message\') {
                $(\'#dialogMessage p\').html(message);
                $(\'#dialogMessage\').show();
            } else {
                $(\'#dialogError p\').html(message);
                $(\'#dialogError\').show();
            }
            
            setTimeout(hideDialogMessageBoxes, 5000);    
        }
        
        function hideDialogMessageBoxes(){
             $(\'#dialogMessage\').fadeOut(\'normal\');       
             $(\'#dialogError\').fadeOut(\'normal\');    
        }
    </script>
'; ?>