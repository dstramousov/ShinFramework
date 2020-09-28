        {include file="web/header.tpl"}
        <div class="b-content">
            <!-- header block -->
            <div class="b-header-bar">
                {$proomblock}{$toprightblock}
                <div class="clear"></div>
            </div>
            {include file="web/header_rand_photo.tpl"}
            <!-- .header block -->
	        {include file="web/common/ganalyt.tpl"}
            <!-- content block -->
            <div class="b-content-inner">
                <!-- search form-->
                <div class="search-form with-header-photo">
                    {include file="web/common/search-form.tpl"}
                </div>
                <!-- .search form -->
                <div class="joinus search-form">
                    <span class="form-header-red-text">{$lng_label_registation_header}</span><br /><br />
                    <span class="form-header-title">{$lng_label_registation_title}</span>
                    <br />
                    <br />
                    <!-- registration form -->
                    <form action="{php} echo base_url().'/tryjoin'; {/php}" id="registration" method="post">
                        <table align="center" class="registration-from">
                            <tr>
                                <th><label for="user-type">{$lng_label_datatable_user_type}</label></th>
                                <td>
                                    <select name="user-type" id="user-type">
                                        <option value="p">{$lng_label_snaptrack_usertype_user}</option>
                                        <option value="v">{$lng_label_snaptrack_usertype_viewer}</option>
                                    </select>&nbsp;&nbsp;<span style="color:red">{$usertype_err_mess}</span>
                                </td>
                            </tr>
                            <tr>
                                <th><label for="user-nickname">{$lng_label_user_nickname}</label></th>
                                <td>
                                    <input type="text" name="user-nicknamenickname" id="user-nickname" value="{$user_nickname}" /><br /><span style="color:red">{$usernickname_err_mess}</span>
                                </td>
                            </tr>
                            <tr>
                                <th><label for="user-pwd">{$lng_label_sys_user_pass}</label></th>
                                <td>
                                    <input type="password" name="user-pwd" id="user-pwd" value="" /><br /><span style="color:red">{$userpass_err_mess}</span>
                                </td>
                            </tr>
                            <tr>
                                <th><label for="confirm-pwd">{$lng_label_sys_user_confirm_pass}</label></th>
                                <td>
                                    <input type="password" name="confirm-pwd" id="confirm-pwd" value="" /><br /><span style="color:red">{$userpass_err_mess}</span>
                                </td>
                            </tr>
                            <tr>
                                <th><label for="name">{$lng_label_prifle_photograper_first_name}</label></th>
                                <td>
                                    <input type="text" name="user-firstname" id="user-firstname" value="{$user_firstname}" /><br /><span style="color:red">{$username_err_mess}</span>
                                </td>
                            </tr>
                            <tr>
                                <th><label for="surname">{$lng_label_prifle_photograper_last_name}</label></th>
                                <td>
                                    <input type="text" name="user-surname" id="user-surname" value="{$user_lastname}" /><br /><span style="color:red">{$userlastname_err_mess}</span>
                                </td>
                            </tr>
                            <tr>
                                <th><label for="email">{$lng_label_prifle_photograper_email}</label></th>
                                <td>
                                    <input type="text" name="email" id="email" value="{$user_email}" /><br /><span style="color:red">{$useremail_err_mess}</span>
                                </td>
                            </tr>
                            <tr>
                                <th><label for="accept-eula">{$lng_label_accept_eula}</label></th>
                                <td>
                                    <input type="checkbox" name="accept-eula" id="accept-eula" {if $user_eula == 'on'}checked="checked"{/if} />
                                    <a href="{php} echo SHIN_Core::$_config['core']['app_base_url'];{/php}/EULA.txt" target="_blank">{$lng_label_view_eula}</a><br /><span id="eula_error" style="color:red">{$eula_err_mess}</span>
                                </td>
                            </tr>
                            <tr>
                                <th><label for="accept-privacy">{$lng_label_accept_privacy_policy}</label></th>
                                <td>
                                    <input type="checkbox" name="accept-privacy" id="accept-privacy" {if $user_privacy == 'on'}checked="checked"{/if} />
                                    <a href="{php} echo SHIN_Core::$_config['core']['app_base_url'];{/php}/PRIVACY.txt" target="_blank">{$lng_label_view_privacy_policy}</a><br /><span id="privacy_error" style="color:red">{$privacy_err_mess}</span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" align="right" class="without-bottom-border">
                                    <input type="submit" class="search-btn left" name="registrate" value="{$lng_label_user_join}" id="registrate" onclick="return validateForm();" />
                                    <input type="reset" class="reset-btn right" name="reset" value="{$lng_label_search_reset}" id="reset" />
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
            {include file="web/footer.tpl"}
            <!-- .footer block -->
        </div>
        {literal}
            <script type="text/javascript">
                function validateForm(){
                    
                    var result  =   false;
                    var eula    =   $('#accept-eula').attr('checked');
                    var privacy =   $('#accept-privacy').attr('checked');
                    
                    if(!eula) {
                        $('#eula_error').text('{/literal}{$lng_label_eula_error}{literal}');    
                    } else {
                        $('#eula_error').text('');    
                    }
                    
                    if(!privacy) {
                        $('#privacy_error').text('{/literal}{$lng_label_accept_privacy_error}{literal}');
                    } else {
                        $('#privacy_error').text('');
                    }
                    
                    if(eula && privacy) {
                        result = true;    
                    }
                    
                    return result;
                    
                }
            </script>
        {/literal}
    </body>
</html>
