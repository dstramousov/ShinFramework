<?php /* Smarty version 2.6.26, created on 2011-08-02 11:11:34
         compiled from web/common/joinus.tpl */ ?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "web/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <div class="b-content">
            <!-- header block -->
            <div class="b-header-bar">
                <?php echo $this->_tpl_vars['proomblock']; ?>
<?php echo $this->_tpl_vars['toprightblock']; ?>

                <div class="clear"></div>
            </div>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "web/header_rand_photo.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <!-- .header block -->
	        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "web/common/ganalyt.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <!-- content block -->
            <div class="b-content-inner">
                <!-- search form-->
                <div class="search-form with-header-photo">
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "web/common/search-form.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                </div>
                <!-- .search form -->
                <div class="joinus search-form">
                    <span class="form-header-red-text"><?php echo $this->_tpl_vars['lng_label_registation_header']; ?>
</span><br /><br />
                    <span class="form-header-title"><?php echo $this->_tpl_vars['lng_label_registation_title']; ?>
</span>
                    <br />
                    <br />
                    <!-- registration form -->
                    <form action="<?php  echo base_url().'/tryjoin';  ?>" id="registration" method="post">
                        <table align="center" class="registration-from">
                            <tr>
                                <th><label for="user-type"><?php echo $this->_tpl_vars['lng_label_datatable_user_type']; ?>
</label></th>
                                <td>
                                    <select name="user-type" id="user-type">
                                        <option value="p"><?php echo $this->_tpl_vars['lng_label_snaptrack_usertype_user']; ?>
</option>
                                        <option value="v"><?php echo $this->_tpl_vars['lng_label_snaptrack_usertype_viewer']; ?>
</option>
                                    </select>&nbsp;&nbsp;<span style="color:red"><?php echo $this->_tpl_vars['usertype_err_mess']; ?>
</span>
                                </td>
                            </tr>
                            <tr>
                                <th><label for="user-nickname"><?php echo $this->_tpl_vars['lng_label_user_nickname']; ?>
</label></th>
                                <td>
                                    <input type="text" name="user-nicknamenickname" id="user-nickname" value="<?php echo $this->_tpl_vars['user_nickname']; ?>
" /><br /><span style="color:red"><?php echo $this->_tpl_vars['usernickname_err_mess']; ?>
</span>
                                </td>
                            </tr>
                            <tr>
                                <th><label for="user-pwd"><?php echo $this->_tpl_vars['lng_label_sys_user_pass']; ?>
</label></th>
                                <td>
                                    <input type="password" name="user-pwd" id="user-pwd" value="" /><br /><span style="color:red"><?php echo $this->_tpl_vars['userpass_err_mess']; ?>
</span>
                                </td>
                            </tr>
                            <tr>
                                <th><label for="confirm-pwd"><?php echo $this->_tpl_vars['lng_label_sys_user_confirm_pass']; ?>
</label></th>
                                <td>
                                    <input type="password" name="confirm-pwd" id="confirm-pwd" value="" /><br /><span style="color:red"><?php echo $this->_tpl_vars['userpass_err_mess']; ?>
</span>
                                </td>
                            </tr>
                            <tr>
                                <th><label for="name"><?php echo $this->_tpl_vars['lng_label_prifle_photograper_first_name']; ?>
</label></th>
                                <td>
                                    <input type="text" name="user-firstname" id="user-firstname" value="<?php echo $this->_tpl_vars['user_firstname']; ?>
" /><br /><span style="color:red"><?php echo $this->_tpl_vars['username_err_mess']; ?>
</span>
                                </td>
                            </tr>
                            <tr>
                                <th><label for="surname"><?php echo $this->_tpl_vars['lng_label_prifle_photograper_last_name']; ?>
</label></th>
                                <td>
                                    <input type="text" name="user-surname" id="user-surname" value="<?php echo $this->_tpl_vars['user_lastname']; ?>
" /><br /><span style="color:red"><?php echo $this->_tpl_vars['userlastname_err_mess']; ?>
</span>
                                </td>
                            </tr>
                            <tr>
                                <th><label for="email"><?php echo $this->_tpl_vars['lng_label_prifle_photograper_email']; ?>
</label></th>
                                <td>
                                    <input type="text" name="email" id="email" value="<?php echo $this->_tpl_vars['user_email']; ?>
" /><br /><span style="color:red"><?php echo $this->_tpl_vars['useremail_err_mess']; ?>
</span>
                                </td>
                            </tr>
                            <tr>
                                <th><label for="accept-eula"><?php echo $this->_tpl_vars['lng_label_accept_eula']; ?>
</label></th>
                                <td>
                                    <input type="checkbox" name="accept-eula" id="accept-eula" <?php if ($this->_tpl_vars['user_eula'] == 'on'): ?>checked="checked"<?php endif; ?> />
                                    <a href="<?php  echo SHIN_Core::$_config['core']['app_base_url']; ?>/EULA.txt" target="_blank"><?php echo $this->_tpl_vars['lng_label_view_eula']; ?>
</a><br /><span id="eula_error" style="color:red"><?php echo $this->_tpl_vars['eula_err_mess']; ?>
</span>
                                </td>
                            </tr>
                            <tr>
                                <th><label for="accept-privacy"><?php echo $this->_tpl_vars['lng_label_accept_privacy_policy']; ?>
</label></th>
                                <td>
                                    <input type="checkbox" name="accept-privacy" id="accept-privacy" <?php if ($this->_tpl_vars['user_privacy'] == 'on'): ?>checked="checked"<?php endif; ?> />
                                    <a href="<?php  echo SHIN_Core::$_config['core']['app_base_url']; ?>/PRIVACY.txt" target="_blank"><?php echo $this->_tpl_vars['lng_label_view_privacy_policy']; ?>
</a><br /><span id="privacy_error" style="color:red"><?php echo $this->_tpl_vars['privacy_err_mess']; ?>
</span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" align="right" class="without-bottom-border">
                                    <input type="submit" class="search-btn left" name="registrate" value="<?php echo $this->_tpl_vars['lng_label_user_join']; ?>
" id="registrate" onclick="return validateForm();" />
                                    <input type="reset" class="reset-btn right" name="reset" value="<?php echo $this->_tpl_vars['lng_label_search_reset']; ?>
" id="reset" />
                                </td>
                            </tr>
                        </table>
                    </form>
                    <!-- preview image box -->
                </div>
            </div>
            <!-- .content block -->
            <div class="white-delimiter"></div>
            <!-- footer block -->
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "web/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <!-- .footer block -->
        </div>
        <?php echo '
            <script type="text/javascript">
                function validateForm(){
                    
                    var result  =   false;
                    var eula    =   $(\'#accept-eula\').attr(\'checked\');
                    var privacy =   $(\'#accept-privacy\').attr(\'checked\');
                    
                    if(!eula) {
                        $(\'#eula_error\').text(\''; ?>
<?php echo $this->_tpl_vars['lng_label_eula_error']; ?>
<?php echo '\');    
                    } else {
                        $(\'#eula_error\').text(\'\');    
                    }
                    
                    if(!privacy) {
                        $(\'#privacy_error\').text(\''; ?>
<?php echo $this->_tpl_vars['lng_label_accept_privacy_error']; ?>
<?php echo '\');
                    } else {
                        $(\'#privacy_error\').text(\'\');
                    }
                    
                    if(eula && privacy) {
                        result = true;    
                    }
                    
                    return result;
                    
                }
            </script>
        '; ?>

    </body>
</html>